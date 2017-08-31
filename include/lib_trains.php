<?php

	# Public Signatures

	# start_new_train($args)
	# train_leaves_at($id, $time)
	# join_train($id, $user_id, $name)
	# cancel_train($id)
	# delay_train($id, $time)
	# leave_now($id)

	/*

	Schema

	CREATE TABLE `lunch_trains` (
	  `id` int(11) NOT NULL,
	  `team_id` varchar(255) DEFAULT NULL,
	  `creator_id` varchar(255) DEFAULT NULL,
	  `creator_name` varchar(255) DEFAULT NULL,
	  `channel_id` varchar(255) DEFAULT NULL,
	  `channel_name` varchar(255) DEFAULT NULL,
	  `team_domain` varchar(255) DEFAULT NULL,
	  `destination` varchar(255) DEFAULT NULL,
	  `date_leaving` int(11) DEFAULT NULL,
	  `date_cancelled` int(11) DEFAULT NULL,
	  `payload` text,
	  `creator_message_ts` varchar(20) DEFAULT NULL,
	  `channel_message_ts` varchar(20) DEFAULT NULL,
	  `creator_dm_channel_id` varchar(255) DEFAULT NULL,
	  `train_type` varchar(20) DEFAULT NULL,
	  `warning_sent` tinyint(3) DEFAULT NULL,
	  `timezone` varchar(255) DEFAULT NULL,
	  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

	ALTER TABLE `lunch_trains`
  	ADD PRIMARY KEY (`id`),
  	ADD KEY `date_leaving` (`id`);

	ALTER TABLE `lunch_trains`
  	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

	Payload

	{"participants":[
		"U01422" => {
			"name" => kefan,
			"ts_added" => 324234
		}
	]}

	*/

	function start_new_train($args){

        // Insert a new train record
		$query = "INSERT INTO `lunch_trains` ( `team_id`, `creator_id`, `creator_name`, `channel_id`, `channel_name`, `team_domain`, `destination`, `date_leaving`, `date_cancelled`, `payload`, `creator_message_ts`, `channel_message_ts`, `creator_dm_channel_id`, `train_type`, `warning_sent`, `timezone`) values (";
		$query .= db_safe_sql_param($args['team_id'], true) . ", ";
		$query .= db_safe_sql_param($args['creator_id'], true) . ", ";
		$query .= db_safe_sql_param($args['creator_name'], true) . ", ";
		$query .= db_safe_sql_param($args['channel_id'], true) . ", ";
		$query .= db_safe_sql_param($args['channel_name'], true) . ", ";
		$query .= db_safe_sql_param($args['team_domain'], true) . ", ";
		$query .= db_safe_sql_param($args['destination'], true) . ", ";
		$query .= db_safe_sql_param($args['date_leaving']) . ", ";
		$query .= "0, ";
		$query .= db_safe_sql_param('{"participants":{}}', true) . ", 0, 0, 0, ";
		$query .= db_safe_sql_param($args['train_type'], true).", ";
		$query .= "0, ";
        $query .= db_safe_sql_param($args['timezone'], true);
		$query .= ")";


		$ret = db_run_query($query);

		$id = $ret['info'];

		if ($ret['ok']) return array('ok' => true, 'id' => $id);

		return $ret;
	}

	function add_creator_message_ts_and_channel_id($id, $ts, $channel_id) {
		$ret = db_update_train_by_id($id, array(
			'creator_message_ts' => array(
				'data' => $ts,
				'type' => 'string'
			)));


		$ret = db_update_train_by_id($id, array(
			'creator_dm_channel_id' => array(
				'data' => $channel_id,
				'type' => 'string'
			)));

		if (!$ret['ok']) return array('ok' => false, 'error' => "Message timestamp not ok");

		return $ret;
	}

	function add_channel_message_ts($id, $ts) {
		$ret = db_update_train_by_id($id, array(
			'channel_message_ts' => array(
				'data' => $ts,
				'type' => 'string'
			),
		));

		if (!$ret['ok']) return array('ok' => false, 'error' => "Message timestamp not ok");

		return $ret;
	}

	function cancel_train($id){

		$train_ret = get_train_by_id($id);

		if (!$train_ret['ok']) return $train_ret;

		$train = $train_ret['train'];

		if ($train['warning_sent'] == 2){
			return array("ok"=>false, "error"=>"Sorry! This train has already left.");
		}

		if ($train['date_cancelled']){
			return array("ok"=>false, "error"=>"Sorry! This train is cancelled.");
		}


		$ret = db_update_train_by_id($id, array(
			'date_cancelled' => array(
				'data' => time()
			),
		));

		if (!$ret['ok']) return array('ok' => false, 'error' => "Train refuses to cancel!");

		return $ret;
	}

	function delay_train($id, $time){


		$train_ret = get_train_by_id($id);

		if (!$train_ret['ok']) return $train_ret;

		$train = $train_ret['train'];

		if ($train['warning_sent'] == 2){
			return array("ok"=>false, "error"=>"Sorry! This train has already left.");
		}

		if ($train['date_cancelled']){
			return array("ok"=>false, "error"=>"Sorry! This train is cancelled.");
		}



		$ret = db_update_train_by_id($id, array(
			'date_leaving' => array(
				'data' => $time
			),
		));

		if (!$ret['ok']) return array('ok' => false, 'error' => "Train refuses to delay!");

		return $ret;
	}

	function leave_now($id){
		$ret = delay_train($id, time()+120);

		if (!$ret['ok']) return array('ok' => false, 'error' => "Cannot leave now!");

		warning_sent($id);

		return $ret;
	}

	function warning_sent($id){
		$ret = db_update_train_by_id($id, array(
			'warning_sent' => array(
				'data' => 1
			),
		));

		if (!$ret['ok']) return array('ok' => false, 'error' => "Cannot send warning");

		return $ret;
	}


	function train_left($id){
		$ret = db_update_train_by_id($id, array(
			'warning_sent' => array(
				'data' => 2
			),
		));
		if (!$ret['ok']) return array('ok' => false, 'error' => "Cannot send warning");

		return $ret;
	}


	function train_leaves_at($id, $time){
		$query = "UPDATE `lunch_trains` SET `date_leaving` = " . db_safe_sql_param($time) . " WHERE `id` = " . db_safe_sql_param($id) . ";";

		$ret = db_run_query($query);

		if (!$ret['ok']) return array('ok' => false, 'error' => "Train refuses to leave at another time!");

		return $ret;
	}


	function save_participate_dm_ts($id, $user_id, $channel_id, $ts){
		$train_ret = get_train_by_id($id);
		if (!$train_ret['ok']) return $train_ret;
		$train = $train_ret['train'];
		$payload = json_decode($train['payload'], true);
		if (array_key_exists($user_id, $payload['participants'])){
			$payload['participants'][$user_id]['dm_channel'] = $channel_id;
			$payload['participants'][$user_id]['dm_ts'] = $ts;
		}else{
			$payload['participants'][$user_id] = array(
				'dm_channel' => $channel_id,
				'dm_ts' => $ts
			);
		}
		$ret = db_update_train_by_id($id, array(
			'payload' => array(
				'data' => json_encode($payload),
				'type' => 'string'
			),
		));
		if (!$ret['ok']) return array('ok' => false, 'error' => "Did not update successfully");
		return $ret;
	}


	function join_train($id, $user_id, $name){
		$train_ret = get_train_by_id($id);

		if (!$train_ret['ok']) return $train_ret;

		$train = $train_ret['train'];

		if ($train['warning_sent'] == 2){
			return array("ok"=>false, "error"=>"Sorry! Train has already left.");
		}

		if ($train['date_cancelled']){
			return array("ok"=>false, "error"=>"Sorry! This train is cancelled.");
		}

		$payload = json_decode($train['payload'], true);

		if (array_key_exists($user_id, $payload['participants'])){
			return array("ok"=>false, "error"=>"You're already on the train!");
		}

		$payload['participants'][$user_id] = array(
			"user_id" => $user_id,
			"name" => $name,
			"ts_added" => time(),
		);

		$ret = db_update_train_by_id($id, array(
			'payload' => array(
				'data' => json_encode($payload),
				'type' => 'string'
			),
		));

        if (!$ret['ok']) {
            return array('ok' => false, 'error' => "Did not join successfully");
        } else {
            $train_ret = get_train_by_id($id);
            return array('ok' => true, 'train' => $train_ret['train']);
        }
	}


	function disembark_train($id, $user_id){
		$train_ret = get_train_by_id($id);

		if (!$train_ret['ok']) return $train_ret;

		$train = $train_ret['train'];

		if ($train['warning_sent'] == 2){
			return array("ok"=>false, "error"=>"Sorry! This train has already left.");
		}

		if ($train['date_cancelled']){
			return array("ok"=>false, "error"=>"Sorry! This train is cancelled.");
		}

		$payload = json_decode($train['payload'], true);

		if (array_key_exists($user_id, $payload['participants'])){
			unset($payload['participants'][$user_id]);

			$ret = db_update_train_by_id($id, array(
				'payload' => array(
					'data' => json_encode($payload),
					'type' => 'string'
				),
			));

			return $ret;

		}

		return array("ok"=>false, "error"=>"You have already deboarded!");
	}


	function db_update_train_by_id($id, $updates){
		$query = "UPDATE `lunch_trains` SET ";
		$query_updates = array();

		foreach ($updates as $key => $val){
			if ($val['type'] == 'string'){
				$val = db_safe_sql_param($val['data'], true);
			}else{
				$val = db_safe_sql_param($val['data']);
			}
			$query_updates[] = "`" . $key . "` = " . $val;
		}

		$query .= implode(", ", $query_updates);
		$query .= " WHERE `id` = " . db_safe_sql_param($id) . ";";

		$ret = db_run_query($query);

		if (!$ret['ok']) return array('ok' => false, 'error' => "Update unsuccessful");

		return $ret;
	}

	function get_trains_for_2min_warn(){
		$time = time();
		$query = "SELECT * FROM lunch_trains WHERE date_cancelled=0 and warning_sent = 0 and date_leaving >= $time - 300  and date_leaving <= $time + 150";


		$ret = db_fetch_row_ids($query);

		return $ret;
	}

	function get_joinable_train_ids() {
		$time = time();
		$query = "SELECT * FROM lunch_trains WHERE date_leaving >= $time";
		$ret = db_fetch_row_ids($query);
		return $ret;
	}

	function get_trains_that_are_leaving(){
		$time = time();
		$query = "SELECT * FROM lunch_trains WHERE date_cancelled=0 and warning_sent = 1 and date_leaving >= $time - 1500   and date_leaving <= $time - 120";



		$ret = db_fetch_row_ids($query);

		return $ret;
	}


	function get_train_by_id($id){
		$query = "SELECT * FROM lunch_trains WHERE `id` = $id";

		$ret = db_fetch_single_row($query);

		if (!$ret['ok']) return array('ok' => false, 'error' => "You’ve found a ghost train");

		if ($ret['row']['timezone']){
			date_default_timezone_set($ret['row']['timezone']);
		}

		return array('ok' => true, 'train' => $ret['row']);
	}


?>
