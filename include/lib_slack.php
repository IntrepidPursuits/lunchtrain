<?php
	function slack_chat_post_message($team_id, $channel, $message, $thread_ts=""){

		$ret = app_installs_get($team_id);

		if ($ret['ok']){
			error_log("App installs get went OK");
			$token = $ret['token'];
		}

		$url = $GLOBALS['base_api_url']."chat.postMessage";

		$post = array(
				'token' => $token,
				'text' => $message['text'],
				'channel' => $channel,
                'thread_ts' => $thread_ts,
				'attachments' => json_encode($message['attachments']),
				'username' => 'Lunch Train',
				'unfurl_links' => true,
			);

		$ret= curl_post($url, $post);

		if ($ret['ok']){
			error_log("Curl post went OK");
		}

		return $ret;
	}

	function slack_chat_update_message($team_id, $channel, $message, $ts){

		$url = $GLOBALS['base_api_url']."chat.update";

		$ret = app_installs_get($team_id);

		if ($ret['ok']){
			$token = $ret['token'];
		}



		$post = array(
				'token' => $token,
				'ts' => $ts,
				'text' => $message['text'],
				'attachments' => json_encode($message['attachments']),
				'channel' => $channel,
				'unfurl_links' => true,
			);

		return curl_post($url, $post);
	}

    function slack_chat_remove_message($team_id, $channel, $ts){

        $url = $GLOBALS['base_api_url']."chat.delete";

        $ret = app_installs_get($team_id);

        if ($ret['ok']){
            $token = $ret['token'];
        }

        $post = array(
            'token' => $token,
            'channel' => $channel,
            'ts' => $ts
        );

        return curl_post($url, $post);
    }

    function slack_get_user_timezone($team_id, $user_id){
        $ret = app_installs_get($team_id);

        if ($ret['ok']){
            $token = $ret['token'];
        }


        $url = $GLOBALS['base_api_url']."users.info";

        $post = array(
                'token' => $token,
                'user'  => $user_id,
            );

        $ret =  curl_post($url, $post);

        if ($ret){

            $result = json_decode($ret, true);
            if ($result['ok']){
                $tz = $result['user']['tz'];

                if ($tz) return $tz;

            }elseif ($result['error'] == 'token_revoked'){
                app_installs_set_inactive($token);
                error_log("Darn that token has been revoked: ".$token);
            }
        }

        return "America/Los_Angeles";
    }
