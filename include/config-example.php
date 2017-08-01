<?php
// Slack application credentials and configs
// Make sure this file is in your `.gitignore` file

// Slack app credentials
$GLOBALS['client_id'] = '';
$GLOBALS['client_secret'] = '';
$GLOBALS['slack_verification_token'] = '';

// Slack API paths
$GLOBALS['base_api_url'] = 'https://slack.com/api/';
$GLOBALS['base_auth_url'] = 'https://slack.com/oauth/authorize';

// OAuth install URL
$auth_scopes = Array();
$GLOBALS['oauth_url'] = $GLOBALS['base_auth_url']."?scope=".join(",", $auth_scopes)."&client_id=".$GLOBALS['client_id'];
