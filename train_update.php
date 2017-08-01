<?php

	$env = 'dev';
	if ($env == 'dev'){
		$_POST['token'] = "xIVGPETNqq2DeGOBpdvw5kP0";
	}else{
		$_POST['token'] ="rEAhCuS9mzt79Hk5A5KTYwQl";
	}

	echo "Current env is ". $env;


	require "include/init.php";

	$id = 353065131;
	train_actions_message_leave_channel_update($id);

