<?php

/*
	Cron config
	* * * * * curl "http://lunchtrainbot-staging.herokuapp.com/cron_leave_now_2_min_warning.php?env=dev"
	* * * * * curl "http://lunchtrainbot.herokuapp.com/cron_leave_now_2_min_warning.php?env=prod"
*/

    require "include/init.php";

	$ids = get_trains_for_2min_warn();
	if (!$ids){
		echo "\nNo trains found to warn";
	}


	foreach ($ids as $id){
        // Update the train record to show that the warning has been sent
        $ret = warning_sent($id);

		// Notify the train's participants
		train_actions_messages_update($id);
	}


	$ids = get_trains_that_are_leaving();
	if (!$ids){
		echo "No trains found to be leaving";
	}


	foreach ($ids as $id){
        // Notify the participants that the train is leaving
		train_actions_message_leave_channel_update($id);
        // Update the train record to show that the train has departed
		train_left($id);
	}
