<?php

	require "include/init.php";

    $current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]".explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    $oauth_url = $GLOBALS['oauth_url']."&redirect_uri=$current_url";
    $installed = 0;
	$error = 0;

    if (isset($_GET['code'])){
        $code = $_GET['code'];
				error_log($GLOBALS['client_id']);
        $url=$GLOBALS['base_api_url']."oauth.token?client_id=".$GLOBALS['client_id']."&client_secret=".$GLOBALS['client_secret']."&code=$code&redirect_uri=$current_url";
        $response = curl_get($url);
        if ($response){
            $payload = json_decode($response, true);
            if ($payload['access_token']){
                $qry = app_installs_add($payload['team_id'], $payload['installer_user_id'],null, null, $payload['team_name'], $payload['access_token']);
                $installed = 1;
                $ret = slack_chat_post_message($payload['team_id'], $payload['installer_user_id'], $GLOBALS['install_message']);
                $ret_arr = json_decode($ret, true);
                if($ret_arr["ok"]){
                    app_installs_set_install_message($payload['team_id'], $ret_arr['channel'], $ret_arr['ts']);
                }
            }else{
                $error = 1;
            }
        }else{
            $error = 1;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Lunch Train makes planning lunch outings with your team simple and pleasant (and, dare we say, fun). Want sushi for lunch? Start a Lunch Train with a quick slash command, and your teammates can easily board the train and receive a reminder when it’s time to depart.">
        <meta name="title" content="Lunch Train">
        <meta property="og:title" content="Lunch Train">
        <meta property="og:site_name" content="Lunch Train">
        <meta name='twitter:card' content='summary' />

        <meta property="og:description" content="Lunch Train makes planning lunch outings with your team simple and pleasant (and, dare we say, fun). Want sushi for lunch? Start a Lunch Train with a quick slash command, and your teammates can easily board the train and receive a reminder when it’s time to depart.">
        <meta property="og:image" content="http://www.lunchtrainbot.com/img/Logo%20Header@2x.png">
        <meta name="twitter:image" content="http://www.lunchtrainbot.com/img/Logo%20Header@2x.png">

        <title>Lunch Train</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/lunchtrain.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="img/favicon.png" />
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <!-- Header -->
    <header>
        <div class="banner">
        <?php if ($installed){ ?>
            <div class="page_alert"><div class="alert_text">Lunch Train has been installed on <b><?php echo $payload['team_name'];?></b></div><a class="btn-info open" type="button" href="http://my.slack.com">Open Slack</a></div>
        <?php }elseif ($error){ ?>
            <div class="page_alert"><div class="alert_text">Lunch Train couldn't be installed</div><a class="btn-info open" type="button" href="<?php echo $oauth_url;?>">Try again</a></div>
        <?php } ?>
        </div>
        <div class="container">
            <img class="header-logo" src="img/Logo Header@2x.png"  alt="">
            <h1>Lunch Train</h1>
            <h3>The easiest way to coordinate <br>lunch with your team.</h3>
            <span><a href="<?php echo $oauth_url;?>"><img alt="Add to Slack" height="50" src="https://platform.slack-edge.com/img/add_to_slack.png" srcset="https://platform.slack-edge.com/img/add_to_slack.png 1x, https://platform.slack-edge.com/img/add_to_slack@2x.png 2x"></a></span>
        </div>
    </header>

    <body>
        <div class="container">
            <div class="col">
                <div class="card">
                    <h4>How it works</h4>
                    <p class="instructions">Start a Lunch Train</p>
                    <img src="img/start.png" class="start" alt="Enter the command /lunchtrain">

                    <!-- BEGIN MESSAGES -->
                    <?php require "include/bot_messages.php"; ?>
                    <!-- END MESSAGES -->

                    <h4 class="footer-msg">Try Lunch Train today. Chew choo!</h4>

                    <span>
                        <a href="<?php echo $oauth_url;?>"><img alt="Add to Slack" height="50" src="https://platform.slack-edge.com/img/add_to_slack.png" srcset="https://platform.slack-edge.com/img/add_to_slack.png 1x, https://platform.slack-edge.com/img/add_to_slack@2x.png 2x"></a>
                    </span>
                    <div class="feedback">
                        <div class="line"><div class="feedback-text">Have feedback or questions? <a href="https://www.slack.com/help/requests/new">Contact us</a></div></div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
