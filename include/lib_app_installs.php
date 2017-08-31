<?php


/*

CREATE TABLE `app_installs` (
  `id` int(11) NOT NULL,
  `team_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `installer_dm_channel_id` varchar(255) DEFAULT NULL,
  `install_message_ts` varchar(20) DEFAULT NULL,
  `team_domain` varchar(1000) NOT NULL,
  `token` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
*/


function app_installs_add($team_id, $user_id, $installer_dm_channel_id, $install_message_ts, $team_name, $token){
  print "Adding to app installs database";

    $query = "REPLACE INTO `app_installs` ( `team_id`, `user_id`, `installer_dm_channel_id`, `install_message_ts`,`team_name`, `token`) values (";
	$query .= db_safe_sql_param($team_id, true) . ", ";
    $query .= db_safe_sql_param($user_id, true) . ", ";
    $query .= db_safe_sql_param($installer_dm_channel_id, true) . ", ";
    $query .= db_safe_sql_param($install_message_ts, true) . ", ";
	$query .= db_safe_sql_param($team_name, true) . ", ";
	$query .= db_safe_sql_param($token, true);
	$query .= ")";

	$ret = db_run_query($query);

	$id = $ret['info'];

	if ($ret['ok']) return array('ok' => true, 'id' => $id);
	return $ret;

}


function app_installs_get($team_id, $user_id = 0){
  print "Fetching app installs database";

	$query = "SELECT * FROM app_installs WHERE `team_id` = '$team_id' and active = 1 order by updated_at desc";
	$ret = db_fetch_single_row($query);
	if (!$ret['ok']) return array('ok' => false, 'error' => "No tokens found");

	return array(
	    'ok' => true,
        'token' => $ret['row']['token'],
        'team_id' => $ret['row']['team_id'],
        'installer_dm_channel_id' =>  $ret['row']['installer_dm_channel_id'],
        'install_message_ts' =>  $ret['row']['install_message_ts']
    );
}



function app_installs_set_inactive($token){
	$query = "UPDATE `app_installs` SET `active` = 0 WHERE `token` = '$token'";

	$ret = db_run_query($query);

	if (!$ret['ok']) return array('ok' => false, 'error' => "Cannot mark token as inactive");

	return $ret;
}


function app_installs_set_install_message($team_id, $dm_channel_id, $message_ts){
    $query = "UPDATE `app_installs` SET `install_message_ts` = '$message_ts', `installer_dm_channel_id` = '$dm_channel_id' WHERE `team_id` = '$team_id'";
    $ret = db_run_query($query);

    if (!$ret['ok']) return array('ok' => false, 'error' => "Cannot set message ts");
    return $ret;
}
