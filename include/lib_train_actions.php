<?php


	function train_actions_messages_update($id){
			$ret = get_train_by_id($id);
			$train = $ret['train'];

			$team_domain = $train['team_domain'];
			$team_id = $train['team_id'];

			$payload = json_decode($train['payload'], true);
			$participants = $payload['participants'];

			if (!is_array($participants)){
				$participants = array();
			}

			$message = message_creator_leave($id, $train['destination'], $train['date_leaving'], $train['creator_id'], $participants);
			$ret = slack_chat_post_message($team_id, $train['creator_dm_channel_id'], $message, $train['creator_message_ts']);
    }

	function train_actions_message_leave_channel_update($id){
			$ret = get_train_by_id($id);

			$train = $ret['train'];

			$payload = json_decode($train['payload'], true);
			$participants = $payload['participants'];

			if (!is_array($participants)){
				$participants = array();
			}

			$message = message_channel_leave($id, $train['destination'], $train['date_leaving'], $train['creator_id'], $train['train_type'], $participants);
			slack_chat_update_message($train['team_id'], $train['channel_id'], $message, $train['channel_message_ts']);

	}