<?php


	function profile_init(){
		$current_time = microtime(true);
		$GLOBALS['start_time'] = $current_time;
		$GLOBALS['last_time'] = $current_time;
		$GLOBALS['profile']['start'] = array(0,0);
	}

	function profile_mark($marker){
		$current_time = microtime(true);
		$GLOBALS['profile'][$marker] = array($current_time - $GLOBALS['last_time'], $current_time - $GLOBALS['start_time']);
		$GLOBALS['last_time'] = $current_time;
	}

	function profile_echo(){
		profile_mark('end');
		print_r($GLOBALS['profile']);
	}



