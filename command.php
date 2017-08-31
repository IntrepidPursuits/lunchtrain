<?php

	require "include/init.php";
	header('Content-Type: application/json');

	$destination = $_POST['text'];

	if (substr($destination, 0, 3) =="to "){
		$destination = substr($destination, 3);
	}

	if (!$destination){
		$destination = 'somewhere';
	}

	$team_id = $_POST['team_id'];
	$team_domain = $_POST['team_domain'];

	$channel_id = $_POST['channel_id'];
	$channel_name = $_POST['channel_name'];
	$creator_id = $_POST['user_id'];
	$creator_name = $_POST['user_name'];


	if ($destination == 'help'){
		$message = array(
			"text" => 'Typing `/lunchtrain [optional place or food genre] [at optional time]` will start a lunch train.
			Typing `/lunchtrain view all` will show a list of all active lunch trains',
			);

		print json_encode($message);
		exit;
	}

	if ($destination == 'view all') {
		$train_msg = 'Check out these trains before they leave the station!' . "\r\n";
		$train_ids = get_joinable_train_ids();
		error_log('All train ids count = '.count($train_ids).' train ids are: '.$train_ids);
		if (count($train_ids) == 0) {
			error_log('There are no train ids :(');
			$train_msg = 'Chew Hoo! There are no lunch trains yet. You should make one!';
		} else {
			error_log('There are train ids!');
			foreach ($train_ids as $id) {
				error_log('Looking at train id -> '.$id);
				$ret = get_train_by_id($id);
				$train = $ret['train'];
				error_log('Train destination is: '.$train['destination']);
				error_log('Train departure time is: '.getInformalTime($train['date_leaving']));
				$train_destination = 'To ' . $train['destination'] . ' at ' . $train['date_leaving'] . "\r\n";
				$train_msg .= $train_destination;
				error_log('Train message = '.$train_msg);
			}
		}
		$message = array(
			"text" => $train_msg,
		);

		print json_encode($message);
		exit;
	}

	$timezone = slack_get_user_timezone($team_id, $creator_id);

	date_default_timezone_set($timezone);

	$parsed_result = time_parser_reminders_v2_parse_time_with_text($destination);

	if ($parsed_result['ok']){
		$destination = $parsed_result['text'];
		$time = $parsed_result['time_obj']['ts'];

		if ($time > time() + 3600 * 6){


			$new_time = floor(time()/900) * (900) + 900;

			$message = array("text" => "Ouch, we couldn't start this train. Your departure time should be with-in six hours from now. Try `/lunchtrain <destination> at ". date("g:i a", $new_time)."`");
			print json_encode($message);
		}else{
			print json_encode(message_slash_command_with_time($destination, $time));

		}

	}else{
		print json_encode(message_slash_command($destination));
	}


	exit;
