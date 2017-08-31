<?php

    // Slack API paths
    $GLOBALS['base_api_url'] = 'https://slack.com/api/';
    $GLOBALS['base_auth_url'] = 'https://slack.com/oauth/authorize';

    // Slack app credentials and db configs are loaded from environmental variables
    $GLOBALS['client_id'] = getenv('SLACK_CLIENT_ID');
    error_log(getenv('SLACK_CLIENT_ID'));
    $GLOBALS['client_secret'] = getenv('SLACK_CLIENT_SECRET');
    $GLOBALS['slack_verification_token'] = getenv('SLACK_VERIFICATION_TOKEN');

    $GLOBALS['db_host'] = getenv('LUNCHTRAIN_DB_HOST');
    $GLOBALS['db_user'] = getenv('LUNCHTRAIN_DB_USER');
    $GLOBALS['db_password'] = getenv('LUNCHTRAIN_DB_PASSWORD');
    $GLOBALS['db_name'] = getenv('LUNCHTRAIN_DB_NAME');
