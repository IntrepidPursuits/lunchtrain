<?php

date_default_timezone_set('America/Los_Angeles');

$GLOBALS['_reminders_v2__constants'] = array(
		'snooze_types'	=> array(
			'15'		=> array(
				'message'		=> '15 mins',
				'success_message'	=> "Ok! I'll remind you again in 15 minutes.",
			),
			'60'		=> array(
				'message'		=> '1 hr',
				'success_message'	=> "Ok! I'll remind you again in an hour.",
			),
			'tomorrow'	=> array(
				'message'		=> 'Tomorrow',
				'success_message'	=> "Ok! I'll remind you again at 9am tomorrow.",
			),
			'monday'	=> array(
				'message'		=> 'Monday',
				'success_message'	=> "Ok! I'll remind you again at 9am on Monday.",
			),
		),
		'prepositions'	=> array(
			'to',
			'that',
			'about',
			'on',
		),
		'numbers'	=> array(
			'one'		=> 1,
			'two'		=> 2,
			'three'		=> 3,
			'four'		=> 4,
			'five'		=> 5,
			'six'		=> 6,
			'seven'		=> 7,
			'eight'		=> 8,
			'nine'		=> 9,
			'ten'		=> 10,
			'eleven'	=> 11,
			'twelve'	=> 12,
			'thirteen'	=> 13,
			'fourteen'	=> 14,
			'forteen'	=> 14,
			'fifteen'	=> 15,
			'sixteen'	=> 16,
			'seventeen'	=> 17,
			'eighteen'	=> 18,
			'ninteen'	=> 19,
			'a'		=> 1,
			'an'		=> 1,
		),
		'tens'		=> array(
			'twenty'	=> 20,
			'thirty'	=> 30,
			'forty'		=> 40,
			'fourty'	=> 40,
			'fifty'		=> 50,
			'sixty'		=> 60,
			'seventy'	=> 70,
			'eighty'	=> 80,
			'ninty'		=> 90,
			'ninety'	=> 90,
		),
		'days_of_week'	=> array(
			'monday'	=> 1,
			'mon'		=> 1,
			'tuesday'	=> 2,
			'tues'		=> 2,
			'tue'		=> 2,
			'wednesday'	=> 3,
			'weds'		=> 3,
			'wed'		=> 3,
			'thursday'	=> 4,
			'thu'		=> 4,
			'thurs'		=> 4,
			'friday'	=> 5,
			'fri'		=> 5,
			'saturday'	=> 6,
			'sat'		=> 6,
			'sunday'	=> 0,
			'sun'		=> 0,
			'weekday'	=> array(1, 2, 3, 4, 5),
		),
		'months'	=> array(
			'january'	=> 1,
			'jan'		=> 1,
			'february'	=> 2,
			'febuary'	=> 2,
			'feb'		=> 2,
			'march'		=> 3,
			'mar'		=> 3,
			'april'		=> 4,
			'apr'		=> 4,
			'may'		=> 5,
			'june'		=> 6,
			'jun'		=> 6,
			'july'		=> 7,
			'jul'		=> 7,
			'august'	=> 8,
			'aug'		=> 8,
			'september'	=> 9,
			'sept'		=> 9,
			'sep'		=> 9,
			'october'	=> 10,
			'oct'		=> 10,
			'november'	=> 11,
			'nov'		=> 11,
			'december'	=> 12,
			'dec'		=> 12,
		),
		'ordinals'	=> array(
			'first'		=> 1,
			'second'	=> 2,
			'third'		=> 3,
			'forth'		=> 4,
			'fourth'	=> 4,
			'fifth'		=> 5,
			'sixth'		=> 6,
			'seventh'	=> 7,
			'eighth'	=> 8,
			'nineth'	=> 9,
			'ninth'		=> 9,
			'tenth'		=> 10,
			'eleventh'	=> 11,
			'twelfth'	=> 12,
			'twelveth'	=> 12,
			'thirteenth'	=> 13,
			'forteenth'	=> 14,
			'fourteenth'	=> 14,
			'fifteenth'	=> 15,
			'sixteenth'	=> 16,
			'seventeenth'	=> 17,
			'eighteenth'	=> 18,
			'nineteenth'	=> 19,
			'twentieth'	=> 20,
			'thirtieth'	=> 30,
		),
		'timezones'	=> array(
			'pst'		=> 'America/Los_Angeles',
			'pdt'		=> 'America/Los_Angeles',
			'pt'		=> 'America/Los_Angeles',
			'est'		=> 'America/New_York',
			'edt'		=> 'America/New_York',
			'et'		=> 'America/New_York',
			'cst'		=> 'America/Chicago',
			'cdt'		=> 'America/Chicago',
			'ct'		=> 'America/Chicago',
			'mst'		=> 'America/Phoenix',
			'mdt'		=> 'America/Phoenix',
			'mt'		=> 'America/Phoenix',
			'hst'		=> 'Pacific/Honolulu',
			'akst'		=> 'America/Anchorage',
			'akdt'		=> 'America/Anchorage',
			'cet'		=> 'Europe/Amsterdam',
			'eet'		=> 'EET',
			'kst'		=> 'Asia/Seoul',
			'jst'		=> 'Asia/Tokyo',
			'gmt'		=> 'Europe/London',
			'utc'		=> 'Africa/Monrovia',
			'acst'		=> 'Australia/Adelaide',
			'aest'		=> 'Australia/Brisbane',
		),
		'errors'	=> array(
			'generic_error'			=> "Something went wrong with this reminder. Sorry about that!",
			'cannot_parse'			=> "Sorry, I didn't quite get that. I'm easily confused. Perhaps try the words in a different order? This usually works: `/remind [someone or #channel] [what] [when]`",
			'info_incomplete'		=> "Sorry, I didn't quite get that. I'm easily confused. Perhaps try the words in a different order? This usually works: `/remind [someone or #channel] [what] [when]`",
			'not_found'			=> "I'm sorry! I can't find that reminder. Maybe it was deleted?",
			'user_not_found'		=> "I'm sorry! I can't find that user.",
			'message_not_found'		=> "I'm sorry! I can't find that message.",
			'channel_not_found'		=> "I'm sorry! I can't find that channel.",
			'snooze_type_not_found'		=> "I'm sorry! I don't understand that snooze command.",
			'no_snoozable_found'		=> "I'm sorry! I can't find a reminder that can be snoozed.",
			'cannot_add'			=> "I'm sorry! You can't create a reminder.",
			'cannot_add_mentions'		=> "I'm sorry! That reminder contains a type of group mention that you don't have permission to use.",
			'cannot_add_channel'		=> "Sorry, you cannot create a channel reminder.",
			'cannot_add_channel_not_in'	=> "I'm sorry! You need to join the channel before creating a reminder for it.",
			'cannot_add_general'		=> "I'm sorry! You can’t create a reminder for this channel.",
			'cannot_add_archived'		=> "A reminder can't be set for an archived channel. No one would see it!",
			'cannot_add_dm'			=> "I'm sorry! Reminders can’t be set for direct message conversations.",
			'cannot_add_private'		=> "I'm sorry! Reminders can’t be set for private channels.",
			'cannot_add_bot'		=> "I'm sorry! I’m afraid you can’t send reminders to bots.",
			'cannot_add_slackbot'		=> "Sadly, I can't send reminders to myself. But I will try very hard to remember!",
			'cannot_add_others'		=> "I'm sorry! You can’t set reminders for others on this team. You can remind yourself to remind them, though.",
			'cannot_add_others_recurring'	=> "I'm sorry! Recurring reminders can’t be set for other team members.",
			'cannot_add_usergroup'		=> "I'm sorry! Reminders can’t be set for User Groups. You can create a channel reminder in a channel that has these users, though!",
			'cannot_complete_recurring'	=> "I'm sorry! Recurring reminders can’t be marked complete.",
			'cannot_complete_others'	=> "I'm sorry! You can’t mark reminders for other team members as complete.",
			'cannot_complete_channel'	=> "I'm sorry! Channel reminders can’t be marked complete.",
			'cannot_delete_channel'		=> "I'm sorry! You can’t delete channel reminders.",
			'cannot_delete_general'		=> "I'm sorry! You can’t delete reminders in this channel.",
			'cannot_snooze_channel'		=> "I'm sorry! I can’t snooze channel reminders.",
			'cannot_snooze_others'		=> "I'm sorry! You can’t snooze someone else's reminder.",
			'cannot_snooze_snoozed'		=> "That reminder has already been snoozed.",
			'cannot_snooze_too_far_out'	=> "I'm sorry! I can only snooze a recurring reminder up until the next time it triggers.",
			'cannot_snooze_completed'	=> "I'm sorry! I can’t snooze a completed reminder. ",
		),
	);
	function time_parser_reminders_v2_parse_time($team, $user, $text, $options = array()){
		$default_options = array(
			'int_to_seconds'		=> false, // one can pass in an integer to indicate the number of minutes from now
			'int_to_seconds_max'		=> 86400, // the maximum number of minutes one can use an integer to specify

			'int_to_timestamp'		=> false, // one can pass in a unix timestamp
			'int_to_timestamp_max'		=> 60 * 60 * 24 * 365 * 5, // the maximum number of _seconds_ one can specify using timestamp

			'allow_recurring'		=> true, // expect recurring time objects

			'relative_time_keywords'	=> ['in'], // if $text starts with one of these words, parse it as a relative time description
			'absolute_time_keywords'	=> ['until'], // if $text starts with one of these words, parse it as an absolute time description
		);

		$options = $options + $default_options;

		$ret = time_parser_reminders_v2_preprocess_keywords($text);
		$keywords = $ret['keywords'];

		if (count($keywords) == 0) return array("ok"=>false);

		$time_obj = false;
		$prefs = array();

		#
		# Possibility 1: a single integer
		#

		if (count($keywords) == 1 && preg_match('/^(\d+)$/', $keywords[0], $matches)){
			$integer = intval($matches[1]);
			$ts = false;

			if ($options['int_to_seconds'] && $integer >= 1 && $integer <= $options['int_to_seconds_max']){
				$ts = time() + $integer;
				$prefs = array(
					'duration_text'	=> ceil($integer / 60) . ' minute' . ($integer > 60 ? 's':''),
				);
			}

			if ($options['int_to_timestamp'] && $integer >= time() && $integer <= time() + $options['int_to_timestamp_max']){
				$ts = $integer;
			}

			if ($ts !== false){
				$time_obj = array(
					'type'		=> 'simple',
					'ts'		=> $ts,
					'timezone'	=> _reminders_v2_user_timezone($team, $user),
				);
			}
		}

		#
		# Possibility 2: relative time (in 3 hrs, for 10 seconds, in a month)
		#

		$relative_start_index = in_array($keywords[0], $options['relative_time_keywords']) ? 1 : 0;
		if (!$time_obj){
			$ret = _reminders_v2_parse_time_relative($team, $user, $text, $keywords, array(
				'start_on' => $relative_start_index,
			));
			if (is_ok($ret)){
				$time_obj = $ret['time_obj'];
				$prefs = $ret['prefs'];
			}
		}

		#
		# Possibility 3: absolute time (until friday, 12pm, tomorrow morning...)
		#
		# Decide where to start the absolute parsing. If the first word is one of the strings, 
		#

		$absolute_start_index = in_array($keywords[0], $options['absolute_time_keywords']) ? 1 : 0;
		if (!$time_obj){
			$ret = time_parser_reminders_v2_parse_time_absolute($team, $user, $text, $keywords, array(
				'start_on' => $absolute_start_index,
			));
			if (is_ok($ret)){
				$time_obj = $ret['time_obj'];
				$prefs = $ret['prefs'];
			}
		}

		if (!$time_obj || ($time_obj['type'] == 'recurring' && !$options['allow_recurring'])){
			return _reminders_v2_error('cannot_parse');
		}

		return ret_ok(array(
			'time_obj'	=> $time_obj,
			'prefs'		=> $prefs ?: array(),
		));
	}

	function reminders_v2_parse_time_api($team, $user, $text){
		return _reminders_v2_parse_time($team, $user, $text, array(
			'int_to_seconds'		=> true,
			'int_to_timestamp'		=> true,
			'allow_recurring'		=> true,
			'relative_time_keywords'	=> ['in'],
			'absolute_time_keywords'	=> [],
		));
	}

	function reminders_v2_parse_time_snooze($team, $user, $text){
		$ret = _reminders_v2_parse_time($team, $user, $text, array(
			'int_to_seonds'			=> true,
			'int_to_timestamp'		=> false,
			'allow_recurring'		=> false,
			'relative_time_keywords'	=> ['for'],
			'absolute_time_keywords'	=> ['until'],
		));

		if (not_ok($ret)) return $ret;

		$ret['confirmation_text'] = ($ret['prefs']['duration_text'] ? 'for ' . $ret['prefs']['duration_text'] . ' ' : '')
			. 'until' . _reminders_v2_time_str($team, $user, 'user', $ret['time_obj'])
			. time_parser_reminders_v2_date_str($team, $user, 'user', $ret['time_obj']) . '.';
		return $ret;
	}

	#
	# Given a string that contains time and text info, extract the time info, turn that into a time_obj,
	# and return it along with rest of the string (the text).
	#

	function time_parser_reminders_v2_parse_time_with_text($input){

		$ret = time_parser_reminders_v2_preprocess_keywords($input);

		$keywords = $ret['keywords'];
		$indices = $ret['indices'];

		#
		# Case 0: there are quotes.
		#

		#
		# Unicode left and right quote characters.
		$input = preg_replace("/[\xe2\x80\x9c\xe2\x80\x9d]/u", '"', $input);
		$first_quote = strpos($input, '"');
		$last_quote = strrpos($input, '"');

		if ($first_quote !== false && $last_quote !== false && $first_quote + 1 < $last_quote){
			$text = substr($input, $first_quote + 1, $last_quote - $first_quote - 1);
			$input_quotes = trim(substr($input, 0, $first_quote) . " " . substr($input, $last_quote + 1));
			$prefs = array();
			foreach ($GLOBALS['_reminders_v2__constants']['prepositions'] as $preposition){
				if (substr($input_quotes, 0, strlen($preposition) + 1) == $preposition . ' '){
					$prefs['preposition'] = $preposition;
					$input_quotes = substr($input_quotes, strlen($preposition) + 1);
					break;
				}
				if (substr($input_quotes, strlen($input_quotes) - strlen($preposition) - 1) == ' ' . $preposition){
					$prefs['preposition'] = $preposition;
					$input_quotes = substr($input_quotes, 0, strlen($input_quotes) - strlen($preposition) - 1);
					break;
				}
			}

			$ret_quotes = time_parser_reminders_v2_preprocess_keywords($input_quotes);
			$keywords_quotes = $ret_quotes['keywords'];

			$absolute_ret = time_parser_reminders_v2_parse_time_absolute($input_quotes, $keywords_quotes);
			if ($absolute_ret['ok'] && $absolute_ret['stopped_on'] == count($keywords_quotes)){
				return array(
					'ok'		=> true,
					'text'		=> $text,
					'time_obj'	=> $absolute_ret['time_obj'],
					'prefs'		=> $prefs,
					'no_parse_text'	=> true,
				);
			}
		}



		#
		# Case 2: absolute time.
		#

		$absolute_ret = time_parser_reminders_v2_parse_time_absolute($input, $keywords, array(
			'direction'	=> 'forward',
		));

		if ($absolute_ret['ok']){
			$ret = time_parser_reminders_v2_get_parse_text($input, $keywords, $indices, 0, $absolute_ret['stopped_on'] - 1);
			if ($ret['ok']){
				return array(
					'ok'		=> true,
					'time_obj'	=> $absolute_ret['time_obj'],
					'text'		=> $ret['text'],
				);
			}
		}

		$absolute_ret = time_parser_reminders_v2_parse_time_absolute($input, $keywords, array(
			'direction'	=> 'backward',
		));

		if ($absolute_ret['ok']){
			$ret = time_parser_reminders_v2_get_parse_text($input, $keywords, $indices, $absolute_ret['stopped_on'] + 1, count($keywords) - 1);
			if ($ret['ok']){
				return array(
					'ok'		=> true,
					'time_obj'	=> $absolute_ret['time_obj'],
					'text'		=> $ret['text'],
				);
			}
		}

		return array(
			'ok'		=> false,
		);
	}

	#
	# Try to parse a given string to extract an absolute time description: 'everyday', 'Nov 4th',
	# 'tomorrow morning', 'on Fridays', 'at 9:03am on 7/9/15', 'midnight next thurs', '1900'
	#
	# $prefs : 'direction' = 'forward' (default) or 'backward'
	#	'time_only' = only try to parse time info
	#	'start_on' = give a start index
	#
	# on 'ok' => true, an extra parameter 'stopped_on' (in addition to `time_obj`) will be passed to
	# inform the caller the index of the index of the word we stopped on.
	#

	function time_parser_reminders_v2_parse_time_absolute($input, $keywords, $prefs = array()){

		$time_only = $prefs['time_only'] ? $prefs['time_only'] : false;
		$direction = $prefs['direction'] ? $prefs['direction'] : 'forward';

		#
		# Try to fill in the info as we go along.
		#

		$hour = false;

		$minute = false;
		$second = false;

		$am_or_pm = false;

		$month = false;
		$day = false;
		$year = false;

		$days_of_week = array();
		$is_recurring = false;

		$interval = false;

		#
		# This parameter is used as the last resort to get which kind of recurring type
		# we should use: day, week, month, year. 'day' is converted to 'week' when put into time
		# object.
		#

		$pattern = false;

		$timezone = false;

		$days_of_week_array = $GLOBALS['_reminders_v2__constants']['days_of_week'];
		$month_array = $GLOBALS['_reminders_v2__constants']['months'];
		$ordinal_array = $GLOBALS['_reminders_v2__constants']['ordinals'];
		$tens_array = $GLOBALS['_reminders_v2__constants']['tens'];

		#
		# Currently only support a subset of existing timezones.
		#

		$timezone_array = $GLOBALS['_reminders_v2__constants']['timezones'];

		#
		# Step 1: Go through each word in the string (either forward or backward)
		# and try to pull the information.
		#

		if ($prefs['start_on']){
			$i = $direction == 'forward' ? $prefs['start_on'] - 1 : $prefs['start_on'] + 1;
		}else{
			$i = $direction == 'forward' ? -1 : count($keywords);
		}

		while (true){
			$i += $direction == 'forward' ? 1 : -1;

			#
			# Section 1: if the current keyword is in one of the various pre-defined arrays, such as "everyday", "tuesday"
			# "on", or "pm".
			#

			if (!$time_only && in_array($keywords[$i], array('everyday', 'daily'))){
				$is_recurring = true;
				$days_of_week = array(0, 1, 2, 3, 4, 5, 6);
			}elseif (!$time_only && $keywords[$i] == 'monthly'){
				$is_recurring = true;
				$pattern = 'month';
			}elseif (!$time_only && $keywords[$i] == 'yearly'){
				$is_recurring = true;
				$pattern = 'year';
			}elseif (!$time_only && $keywords[$i] == 'weekly'){
				$is_recurring = true;
				$pattern = 'week';
			}elseif (!$time_only && in_array($keywords[$i], ['biweekly', 'fortnightly',])){
				$is_recurring = true;
				$pattern = 'week';
				$interval = 2;
			}elseif (!$time_only && in_array($keywords[$i], array('each', 'every'))){
				$is_recurring = true;
			}elseif (in_array($keywords[$i], array('noon', 'midday', 'mid-day', 'midnight'))){
				$hour = ($keywords[$i] == 'midnight' ? 0 : 12);
				$minute = 0;
				$second = 0;
				$am_or_pm = 'known';
			}elseif (in_array($keywords[$i], array('day', 'morning', 'afternoon', 'evening', 'night'))){
				$pattern = in_array($keywords[$i - 1], array('a', 'an', 'each', 'every')) ? 'day' : $pattern;
				if ($keywords[$i] == 'morning'){
					$am_or_pm = 'am';
				}
				if (in_array($keywords[$i], array('afternoon', 'evening', 'night'))){
					$am_or_pm = 'pm';
				}
			}elseif (in_array($keywords[$i], array('am', 'a.m.', 'a.m'))){
				$am_or_pm = 'am';
			}elseif (in_array($keywords[$i], array('pm', 'p.m.', 'p.m'))){
				$am_or_pm = 'pm';
			}elseif (!$time_only && in_array($keywords[$i], array('today', 'tonight', 'tomorrow'))){
				$month = intval(time_parser_reminders_v2_date('n'));
				$day = intval(time_parser_reminders_v2_date('j')) + ($keywords[$i] == 'tomorrow' ? 1 : 0);
				$year = intval(time_parser_reminders_v2_date('Y'));

				if ($keywords[$i] == 'tonight'){
					$am_or_pm = 'pm';
				}
			}elseif (!$time_only && array_key_exists($keywords[$i], $days_of_week_array)){
				if (is_array($days_of_week_array[$keywords[$i]])){
					$days_of_week = $days_of_week_array[$keywords[$i]];
				}elseif ($keywords[$i - 1] == 'next'){
					$month = intval(time_parser_reminders_v2_date('n'));
					$day = intval(time_parser_reminders_v2_date('j'));
					$year = intval(time_parser_reminders_v2_date('Y'));
					$curr_day_of_week = intval(time_parser_reminders_v2_date('w'));

					$day_delta = $days_of_week_array[$keywords[$i]] - $curr_day_of_week + 7;
					$day += $day_delta;
				}elseif (!in_array($days_of_week_array[$keywords[$i]], $days_of_week)){
					$days_of_week[] = $days_of_week_array[$keywords[$i]];
				}
			}elseif (!$time_only && $keywords[$i] == 'once' && in_array($keywords[$i+1], array('1', 'every', 'each'))){
				$is_recurring = true;
			}elseif (!$time_only && $keywords[$i] == 'other' && (array_key_exists($keywords[$i+1], $days_of_week_array) || $keywords[$i + 1] == 'week')){
				$interval = 2;
			}elseif (!$time_only && $keywords[$i] == 'fortnight'){
				$interval = 2;
				$pattern = 'week';
			}elseif (!$time_only && in_array($keywords[$i], array('week', 'month', 'year'))){
				$pattern = $keywords[$i];
				if (in_array($keywords[$i - 1], array('next', 'upcoming'))){
					if ($keywords[$i] == 'week'){
						$month = intval(time_parser_reminders_v2_date('n'));
						$year = intval(time_parser_reminders_v2_date('Y'));
						$curr_day_of_week = intval(time_parser_reminders_v2_date('w'));

						#
						# set it to be the upcoming Monday
						#
						$day = intval(time_parser_reminders_v2_date('j')) + 8 - $curr_day_of_week;
					}elseif ($keywords[$i] == 'month'){
						$month = intval(time_parser_reminders_v2_date('n')) + 1;
						$day = 1;
						$year = intval(time_parser_reminders_v2_date('Y'));
					}else{
						$month = 1;
						$day = 1;
						$year = intval(time_parser_reminders_v2_date('Y')) + 1;
					}
				}
			}elseif (!$time_only && in_array($keywords[$i], array('weeks', 'months', 'years'))){
				$pattern = substr($keywords[$i], 0, -1);
			}elseif (!$time_only && substr($keywords[$i], strlen($keywords[$i]) - 4) == 'days' &&
				array_key_exists(substr($keywords[$i], 0, strlen($keywords[$i])-1), $days_of_week_array)){
				#
				# on Mondays
				#
				$truncated = substr($keywords[$i], 0, strlen($keywords[$i])-1);
				$is_recurring = true;
				if (is_array($days_of_week_array[$truncated])){
					$days_of_week = $days_of_week_array[$truncated];
				}elseif (!in_array($days_of_week_array[$truncated], $days_of_week)){
					$days_of_week[] = $days_of_week_array[$truncated];
				}
			}elseif (!$time_only && $ordinal_array[$keywords[$i]]){
				$day = intval($ordinal_array[$keywords[$i]]);
			}elseif ($timezone_array[$keywords[$i]]){
				$timezone = $timezone_array[$keywords[$i]];
			}elseif (!$time_only && $month_array[$keywords[$i]]){
				$month = $month_array[$keywords[$i]];
			}elseif (in_array($keywords[$i], array('at', "o'clock"))){
				continue;
			}elseif (!$time_only && in_array($keywords[$i], array('in', 'on', 'the', 'next', 'upcoming', 'this', 'following', 'and', 'of', 'a', 'an', 'beginning', 'starting'))){
				continue;

			#
			# Section 2: the keyword is not one of the pre-defined ones, so try different regexes until one matches.
			#

			}elseif (!$time_only && preg_match('/^(\d{1,4})\/(\d{1,2})(\/\d{1,4})?$/', $keywords[$i], $matches)){
				#
				# Matches 3/19, 10/09/10, or 09/09/2019
				# mm/dd, mm/dd/yy, dd/mm, dd/mm/yy, yyyy/mm/dd
				#
				$v1 = intval($matches[1]);
				$v2 = intval($matches[2]);
				$v3 = $matches[3] ? intval(substr($matches[3], 1)) : 0;

				if ($v1 >= 2000){
					$year = $v1;
					$month = $v2;
					$day = $v3;
				}else{
					if ($v3){
						$year = $v3;
						if ($year < 100){
							$year += 2000;
						}
					}

					if ($v1 <= 12 && $v2 <= 31){
						$month = $v1;
						$day = $v2;
					}else{
						$month = $v2;
						$day = $v1;
					}
				}
			}elseif (!$time_only && preg_match('/^(\d{1,4}-)?(\d{1,2})-(\d{1,4})$/', $keywords[$i], $matches)){
				#
				# Matches 01-02, 13-12-13, or 2015-02-09
				# yyyy-mm-dd, dd-mm-yyyy, mm-dd, dd-mm
				#
				$v1 = $matches[1] ? intval(substr($matches[1], 0, -1)) : 0;
				$v2 = intval($matches[2]);
				$v3 = intval($matches[3]);

				if ($v1){
					if ($v3 >= 2000){
						$year = $v3;
						$month = $v2;
						$day = $v1;
					}else{
						$year = $v1 < 100 ? $v1 + 2000 : $v1;
						$month = $v2;
						$day = $v3;
					}

				}else{
					$month = $v2;
					$day = $v3;
				}

				if ($month > 12 && $month <= 31 && $day <= 12){
					$temp = $month;
					$month = $day;
					$day = $temp;
				}
			}elseif (preg_match('/^(\d{1,2})[:\.h](\d{2})([:\.m]\d{2})?([ap]\.?m?\.?)?$/', $keywords[$i], $matches)){
				#
				# 3:05am, 12:08pm, 1.23am, 11pm, 12h30, etc.
				#
				$number1 = intval($matches[1]);
				$number2 = intval($matches[2]);
				$number3 = ($matches[3] ? intval(substr($matches[3], 1)) : 0);

				if ($number1 < 0 || $number1 > 24 || $number2 < 0 || $number2 >= 60 || $number3 < 0 || $number3 >=60){
					break;
				}

				$hour = $number1;
				$minute = $number2;
				$second = $number3;

				if ($matches[4]){
					if ($matches[4][0] == 'a'){
						$am_or_pm = 'am';
					}else{
						$am_or_pm = 'pm';
					}
				}elseif ($am_or_pm === false){
					#
					# If the user set to display 24 hour time, then set $am_or_pm to be known
					#
					$am_or_pm = 'known';
				}
			}elseif (!$time_only && preg_match('/^(\d{1,2})\.(\d{1,2})\.(\d{4})$/', $keywords[$i], $matches)){
				#
				# dd.mm.yyyy is a common way of denoting date in some countries: https://en.wikipedia.org/wiki/Date_format_by_country
				#
				$day = intval($matches[1]);
				$month = intval($matches[2]);
				$year = intval($matches[3]);
			}elseif (preg_match('/^(\d{2})(\d{2})$/', $keywords[$i], $matches)){
				#
				# Four digit string
				#

				$number1 = intval($matches[1]);
				$number2 = intval($matches[2]);

				if ($keywords[$i - 1] == 'in' || $month_array[$keywords[$i - 1]] ||
					intval($keywords[$i - 1]) > 0){
					if ($time_only){
						break;
					}
					$year = $number1 * 100 + $number2;
				}elseif ($keywords[$i - 1] == 'at' && $number1 >= 0 && $number1 <= 24 &&
						$number2 <= 59 && $number2 >= 0){
					#
					# Military hours
					#
					$hour = $number1;
					$minute = $number2;
					$am_or_pm = 'known';
				}else{
					break;
				}
			}elseif (preg_match('/^(\d+)([a-z\.]{1,4})$/', $keywords[$i], $matches)){
				#
				# numbers succeeded by one to four letters or dots
				# used to match 9am, 123am, 12p.m., 22nd
				#
				$number = intval($matches[1]);
				$letters = $matches[2];

				if ($number < 0){
					break;
				}

				if (in_array($letters, array('a', 'a.m', 'am', 'a.m.', 'p', 'p.m', 'pm', 'p.m.')) && $number <= 2400){
					if ($letters[0] == 'a'){
						$am_or_pm = 'am';
					}else{
						$am_or_pm = 'pm';
					}

					if ($number <= 12){
						$hour = $number;
					}else{
						$hour = floor($number / 100);
						$minute = $number - $hour * 100;
					}
				}elseif (in_array($letters, array('st', 'nd', 'rd', 'th')) && $number <= 31){
					if ($time_only){
						break;
					}
					$day = $number;
				}else{
					break;
				}
			}elseif (preg_match('/^(\d{1,2})$/', $keywords[$i], $matches)){
				#
				# matches string with only digits
				#
				$number = intval($matches[1]);

				if ($keywords[$i-1] == 'once' && $number == 1){
					continue;
				}elseif (($keywords[$i-1] == 'at' || in_array($keywords[$i+1], array('am', 'a.m.', 'a.m', 'pm', 'p.m.', 'p.m', "o'clock"))) && $number <= 24){
					$hour = $number;
				}elseif (in_array($keywords[$i-1], ['every', 'each']) && in_array($keywords[$i + 1], ['week', 'weeks'])){
					$interval = $number;
				}elseif ((in_array($keywords[$i-1], array('on', 'the')) || $month_array[$keywords[$i-1]])
						&& $number <= 31){
					if ($time_only){
						break;
					}
					$day = $number;
				}else{
					break;
				}
			}elseif (preg_match('/^([a-z]+)\-([a-z]+)$/', $keywords[$i], $matches)){
				if ($tens_array[$matches[1]] && $ordinal_array[$matches[2]]){
					$number = $tens_array[$matches[1]] + $ordinal_array[$matches[2]];
					if ($number <= 31){
						$day = $number;
					}else{
						break;
					}
				}else{
					break;
				}

			#
			# Nothing works? Time to leave!
			#

			}else{
				break;
			}

		}

		#
		# Step 2: Rewind: if the direction is forward, we try to remind a bit until we hit a non-preposition word.
		#
		if ($direction == 'forward'){
			while ($i && in_array(strtolower($keywords[$i-1][0]), array('in', 'on', 'about', 'the', 'to', 'that', 'this'))){
				$i--;
			}
		}

		#
		# Start of aggregating information to get the time object.
		# There needs to be some sort of date description or hour description.
		#

		if ($time_only && $hour === false && $am_or_pm === false){
			return array('ok' => false);
		}elseif (!$is_recurring && $hour === false && $am_or_pm === false && $day === false && $month === false && $year === false && count($days_of_week) == 0){
			return array('ok' => false);
		}

		if ($hour > 24 || $minute >= 60 || $second >= 60){
			return array('ok' => false);
		}

		#
		# Step 3: time information. What is the hour/minute/second info?
		#

		if ($second === false){
			$second = 0;
		}

		if ($minute === false){
			$minute = 0;
		}

		if ($hour === false){
			$hour = 9 + ($am_or_pm == 'pm' ? 8 : 0);
		}elseif ($am_or_pm == 'am'){
			$hour %= 12;
		}elseif ($am_or_pm == 'pm'){
			$hour = $hour % 12 + 12;
		}elseif ($am_or_pm === false && $hour <= 6 ){
			#
			# If the user doesn't specify am/pm, then we assume hour 0 - 6 to be pm
			# and 7 - 11 to be am, unless they use 24 hour time.
			#
			$hour = $hour % 12 + 12;
		}

		if ($time_only){
			return array(
				'ok'		=> true,
				'time_info'	=> array(
					'hour'		=> $hour,
					'minute'	=> $minute,
					'second'	=> $second,
				),
				'stopped_on'	=> $i,
			);
		}

		#
		# Step 4: determine whether it's a recurring reminder or not, and put together the
		# date information.
		#

		if ($is_recurring){
			$time_obj = array(
				'type'		=> 'recurring',
				'hour'		=> $hour,
				'minute'	=> $minute,
				'second'	=> $second,
				'timezone'	=> ($timezone ? $timezone : date_default_timezone_get()),
			);

			if ($days_of_week || in_array($pattern, ['day', 'week'])){

				$time_obj['pattern'] = 'week';

				if ($days_of_week){
					$allowed_days = array_unique($days_of_week, SORT_NUMERIC);
					sort($allowed_days);
				}elseif ($pattern == 'day'){
					$allowed_days = array(0, 1, 2, 3, 4, 5, 6);
				}else{
					$allowed_days = array(intval(time_parser_reminders_v2_date('w', time())));
				}

				$time_obj['allowed_days'] = $allowed_days;

			}elseif ($month || $pattern == 'year'){

				$time_obj['pattern'] = 'year';
				$time_obj['month'] = $month ? $month : 1;
				$time_obj['day'] = $day ? $day : 1;

			}elseif ($day || $pattern == 'month'){

				$time_obj['pattern'] = 'month';
				$time_obj['day'] = $day ? $day : 1;

			}else{
				return array(
					'ok'	=> false,
				);
			}

			if ($GLOBALS['cfg']['feature_reminders_v3'] && $interval && $time_obj['pattern'] == 'week' && count($time_obj['allowed_days']) == 1){
				$time_obj['interval'] = $interval;
			}else{
				return array(
					'ok'		=> true,
					'time_obj'	=> $time_obj,
					'stopped_on'	=> $i,
				);
			}

		}

		#
		# Step 5: if it's a non-recurring reminder, or if we need date info for interval recurring reminder
		#

		if ($timezone){
			$saved_tz = date_default_timezone_get();
			date_default_timezone_set($timezone);
		}

		if ($month !== false || $year !== false){
			if ($day === false){
				$day = 1;
			}

			if ($month === false){
				$month = 1;
			}

			if ($year === false){
				$year = intval(time_parser_reminders_v2_date('Y'));
				$ts = mktime($hour, $minute, $second, $month, $day, $year);
				if ($ts <= time()){
					$year ++;
				}
			}
		}elseif ($day !== false){
			$month = intval(time_parser_reminders_v2_date('n'));
			$year = intval(time_parser_reminders_v2_date('Y'));

			$ts = mktime($hour, $minute, $second, $month, $day, $year);
			if ($ts <= time()){
				$month ++;
			}
		}else{
			#
			# Nothing is specified
			#
			$month = intval(time_parser_reminders_v2_date('n'));
			$day = intval(time_parser_reminders_v2_date('j'));
			$year = intval(time_parser_reminders_v2_date('Y'));

			if (count($days_of_week) > 0){
				if (count($days_of_week) > 1){
					#
					# Non-recurring event should not have specified more than one
					# day of week.
					#
					return array('ok' => false);
				}
				while (true){
					$day ++;
					$ts = mktime($hour, $minute, $second, $month, $day, $year);
					if (in_array(intval(time_parser_reminders_v2_date('w', $ts)), $days_of_week)){
						break;
					}
				}
			}elseif (!$is_recurring){

				#
				# Recurring reminders don't care if the timestamp has already passed
				#

				$ts = mktime($hour, $minute, $second, $month, $day, $year);
				if ($ts <= time()){
					$day++;
				}
			}
		}

		$ts = mktime($hour, $minute, $second, $month, $day, $year);

		if ($is_recurring){
			$time_obj['allowed_days'] = [intval(time_parser_reminders_v2_date('w', $ts))];
			$time_obj['start'] = $ts;
		}elseif ($hour < 24 && $minute < 60 && $second < 60 && $ts >= time()){
			$time_obj = array(
				'type'		=> 'simple',
				'ts'		=> $ts,
				'timezone'	=> date_default_timezone_get(),
			);
		}else{
			return array('ok' => false);
		}

		if ($timezone){
			date_default_timezone_set($saved_tz);
		}
		return array(
			'ok'		=> true,
			'time_obj'	=> $time_obj,
			'stopped_on'	=> $i,
		);
	}


	function time_parser_reminders_v2_parse_text($text){
		$text = trim($text, " \t\n\r\0\x0B\.\,");
		$parts = preg_split("/[\s,]|\.(?!\w)/", $text, 2, PREG_SPLIT_NO_EMPTY);

		if (in_array(strtolower($parts[0]), $GLOBALS['_reminders_v2__constants']['prepositions'])){
			return array(
				'preposition'	=> strtolower($parts[0]),
				'text'		=> trim($parts[1], " \t\n\r\0\x0B\.\,"),
			);
		}

		return array(
			'text'		=> $text
		);
	}

	function time_parser_reminders_v2_preprocess_keywords($input){
		$number_array = $GLOBALS['_reminders_v2__constants']['numbers'];
		$tens_array = $GLOBALS['_reminders_v2__constants']['tens'];

		$ret = preg_split("/[\s,]|\.(?!\w)/", strtolower($input), -1, PREG_SPLIT_OFFSET_CAPTURE | PREG_SPLIT_NO_EMPTY);

		$keywords = array();
		$indices = array();
		for ($i = 0; $i < count($ret); $i++){
			if ($number_array[$ret[$i][0]]){
				$keywords[] = strval($number_array[$ret[$i][0]]);
			}elseif ($tens_array[$ret[$i][0]]){
				$keywords[] = strval($tens_array[$ret[$i][0]]);
			}else{
				$numbers = explode('-', $ret[$i][0], 2);
				if (count($numbers) == 2 && $tens_array[$numbers[0]] && $number_array[$numbers[1]]){
					$keywords[] = strval($tens_array[$numbers[0]] + $number_array[$numbers[1]]);
				}else{
					$keywords[] = $ret[$i][0];
				}
			}
			$indices[] = $ret[$i][1];
		}

		$half_indices = array_keys($keywords, 'half');
		foreach ($half_indices as $half_index){
			$keywords[$half_index] = '0.5';

			if ($keywords[$half_index - 1] == '1'){
				$keywords[$half_index - 1] = '';
			}elseif ($keywords[$half_index + 1] == '1'){
				$keywords[$half_index + 1] = '';
			}
		}

		return array(
			'keywords' => $keywords,
			'indices' => $indices,
		);
	}

	function time_parser_reminders_v2_get_parse_text($input, $keywords, $indices, $time_info_start, $time_info_end){
		if ($time_info_start == 0 && $time_info_end < count($indices) - 1){
			return array(
				'ok'	=> true,
				'text'	=> substr($input, $indices[$time_info_end + 1]),
			);
		}

		if ($time_info_start > 0 && $time_info_end == count($indices) - 1){
			return array(
				'ok'	=> true,
				'text'	=> substr($input, 0, $indices[$time_info_start - 1] + strlen($keywords[$time_info_start - 1])),
			);
		}

		return array('ok' => false);
	}



	function time_parser_reminders_v2_date($format, $timestamp = false){
		if ($timestamp === false){
			return date($format);
		}
		return date($format, $timestamp);
	}

	