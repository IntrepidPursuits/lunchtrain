<?php

function message_channel($id, $destination, $time, $creator, $train_type, $participants = array()){

		$time_formated = getInformalTime($time);

		$train_article = 'a';

		if ($train_type == 'express')  $train_article = 'an';

		if ($train_type) $train_type = " ".$train_type;

		$message = array (
			'response_type' => 'in_channel',
			);
		$main_text = "Chew choo! <@{$creator}> started $train_article"."$train_type train to *$destination* at *$time_formated*.\n";

		$on_board_text = "";

		if ($participants){
			$users_text = "";
			$users_is_or_are = "is";

			$i = 0;

			foreach ($participants as $participant){
				if ($users_text){
					if ($i == count($participants) - 1 ){
						$users_text = $users_text." and ";
					}else{
						$users_text = $users_text.", ";
					}

					$users_is_or_are = "are";
				}
				$i++;

				$users_text = $users_text."<@".$participant['user_id'].">";
			}

			$on_board_text =  "$users_text $users_is_or_are on board. ";
		}

		$attachment = array(
				'text' => $main_text.$on_board_text,
				'fallback' => $main_text,
				'callback_id' => "$id",
				'color' => 'F6B63F',
				'mrkdwn_in' => ['text'],
				);


		$attachment['actions'][] = array(
					'name' => 'join',
					'type' => 'button',
					'value' => 'yes',
					'text' => 'Board the train',
					);

		$message['attachments'][] = $attachment;

		return $message;

	}


	function message_creator($id, $destination, $time, $creator, $participants = array()){

		$time_formated = getInformalTime($time);

		$action_msg_text = "";

		$main_text =  "You started a train to $destination leaving at *{$time_formated}*. ";




		if ($participants){
			$users_text = "";
			$users_is_or_are = "is";

			$i = 0;

			foreach ($participants as $participant){
				if ($users_text){
					if ($i == count($participants) - 1 ){
						$users_text = $users_text." and ";
					}else{
						$users_text = $users_text.", ";
					}

					$users_is_or_are = "are";
				}
				$i++;

				$users_text = $users_text."<@".$participant['user_id'].">";
			}

			$action_msg_text = "$users_text $users_is_or_are on board.";
		}



		$attachment = array(
				'text' => $main_text.$action_msg_text,
				'fallback' => $main_text,
				'callback_id' => "$id",
				'color' => 'F6B63F',
				'mrkdwn_in' => ['text'],

				);


		$action_delay = array(
						'name' => 'delay',
						'type' => 'button',
						'value' => 'yes',
						'text' => 'Delay 10 Min',
						'confirm' => array(
							'title' => '',
							'text' => 'Are you sure you want to delay this train 10 minutes? It will leave at '. getInformalTime($time+600).".",
							'ok_text' => 'Delay Train',
							'dismiss_text' => 'Cancel',
							),
						);

		if (!$participants){
			unset($action_delay['confirm']);
		}

		$attachment['actions'][] =  $action_delay;


		$action_cancel = array(
						'name' => 'cancel',
						'type' => 'button',
						'value' => 'yes',
						'text' => 'Cancel Train',
						'confirm' => array(
							'title' => 'Cancel this lunch train?',
							'text' => count($participants).' riders will be left without lunch plans. :sob:',
							'ok_text' => 'Cancel Train',
							'dismiss_text' => 'Cancel',
							),

						);



		if (!$participants){
			unset($action_cancel['confirm']);
		}


		$attachment['actions'][] =  $action_cancel;




		if (count($participants)){

			/*$attachment['actions'][] =  array(
						'name' => 'leavenow',
						'type' => 'button',
						'value' => 'yes',
						'text' => 'Leave in 2 minutes',
						);

			*/

		}

		$message = array();

		$message['attachments'][] = $attachment;

		return $message;

	}


	function message_ephemeral($msg, $msg_attachments = "", $replace_original = false){
		$message = array (
			'text' => $msg,
			'replace_original' => $replace_original,
			'color' => 'ef5b30',
            'attachments' => $msg_attachments
        );
		print json_encode($message);
	}


	function message_channel_leave($id, $destination, $time, $creator, $train_type, $participants = array()){

		$time_formated = getInformalTime($time);

		$users_text = "";

		$train_article = 'a';

		if ($train_type == 'express')  $train_article = 'an';

		if ($train_type) $train_type = " ".$train_type;

		$main_text = "Chew choo! <@{$creator}> started $train_article"."$train_type train to $destination at {$time_formated}.\n";
		$message = array (
			'text' => $main_text,
		);

		$i = 0;

		$users_is_or_are = "is";

		foreach ($participants as $participant){
			if ($users_text){
				if ($i == count($participants) - 1 ){
					$users_text = $users_text." and ";
				}else{
					$users_text = $users_text.", ";
				}
				$users_is_or_are ="are";
			}
			$i++;

			$users_text = $users_text."<@".$participant['user_id'].">";
		}
		if (!$users_text){
			$users_text = 'some riders';
		}

		$attachment = array(
				'text' => "Good times! The train left with $users_text.",
				'fallback' => "Good times! The train left with $users_text.",
				'color' => 'F6B63F',
			);


		$message['attachments'][] = $attachment;

		return $message;
	}


	function message_creator_leave($id, $destination, $time, $creator, $participants = array()){
		$message = array (
			'text' => "Time to leave for lunch! Everyone to meet by the entrance.",
			'response_type' => 'in_channel',
			);

		if ($participants){
			$users_text = "";
			$users_is_or_are = "is";
			$i = 0;

			foreach ($participants as $participant){
				if ($users_text){
					if ($i == count($participants) - 1 ){
						$users_text = $users_text." and ";
					}else{
						$users_text = $users_text.", ";
					}
					$users_is_or_are ="are";
				}
				$i++;

				$users_text = $users_text."<@".$participant['user_id'].">";
			}


			$attachment = array(
				'text' => "$users_text $users_is_or_are riding the lunch train with you.",
			);

			$message['attachments'][] = $attachment;
		}

		return $message;
	}


	function message_participant($id, $destination, $time, $creator, $participants = array()){
			$time_formated = getInformalTime($time);

			$message = array();
			$message['text'] = "";

			$others = "";
			if (count($participants)>2){
				$others = "and ".(count($participants)-1)." others";
			}

			$action = array(
					'name' => 'disembark',
					'type' => 'button',
					'value' => 'yes',
					'text' => 'Get Off Train',
					'confirm' => array(
							'title' => '',
							'text' => 'Get off this lunch train?',
							'ok_text' => 'Get off',
							'dismiss_text' => 'Stay on',
						),
				);

			$message['attachments']=array(array(
					'text' => "You’ve joined *<@".$creator.">*'s train to *".$destination."*. It will leave at *{$time_formated}*. Meet <@{$creator}> $others by the entrance.",
					'fallback' => "You’ve joined *<@".$creator.">*'s train to ".$destination,
					'actions'=> array($action),
					'callback_id' => $id,
					'color' => 'F6B63F',
					'mrkdwn_in' => ['text'],

				),
			);

			return $message;
	}


	function message_train_link($train){

		#https://tinyspeck.slack.com/archives/sf/p1458791475001405

		$link = "\nhttps://".$train['team_domain'];

		if ($GLOBALS['env'] != 'prod'){
			$link = $link.".dev";
		}

		$link = $link.".slack.com/archives/";

		if (in_array($train['channel_name'], array('directmessage','privategroup'))){
			$link = $link.$train['channel_id'];
		}else{
			$link = $link.$train['channel_name'];
		}
		$link = $link. "/p".str_replace(".", "", $train['channel_message_ts']);

		return $link;
	}


	function message_slash_command($destination){
		$message = array();
		$message['text'] = "";

        $time = floor(time()/900) * (900) + 900;

        $train_type = array ('Bullet', 'Express', 'Local');

        $actions = array();
        $options = array();
        for ($i=0;$i<5;$i++){
            $options[] = array(
                    'value' => strval($time + 900*$i),
                    'text' => getInformalTime($time + 900*$i),
                );
        }
        $actions[] = array(
                        'name' => 'create',
                        'type' => 'select',
                        'text' => 'Pick a time',
                        'options' => $options,
                    );



		$actions[] = array(
                        'name' => 'undo',
                        'type' => 'button',
                        'value' => '0',
                        'text' => 'Cancel',
                    );



		$message['attachments'] = array(array(
					'actions' => $actions,
					'callback_id' => 'train_action',
					'text' => "What time should lunch train to ".$destination." leave?",
					'mrkdwn_in' => ['text'],
				),

		);

		return $message;
	}

	function message_slash_command_with_time($destination, $time){
		$message = array();
		$message['text'] = "Do you want to start a lunch train to *".$destination."* at *".getInformalTime($time)."*?";



		$actions = array();
		$actions[] = array(
				'name' => 'create',
				'type' => 'button',
				'value' => strval($time)."-"."",
				'text' => "Yes, Start Train",
				'style' => 'primary',
			);

		$actions[] = array(
					'name' => 'undo',
					'type' => 'button',
					'value' => '0',
					'text' => 'Cancel',
				);



		$message['attachments'] = array(array(
					'actions' => $actions,
					'callback_id' => $destination,
					'text' => ' ',
				),

		);

		return $message;
	}

	function getInformalTime($time){
		$time_formated = date("g:iA", $time);
		if ($time_formated == "12:00 pm") $time_formated = "12 noon";
		return $time_formated;
	}