<?php

	/*
	* Mysql database class - only one connection alowed
	*/
	class MyDB {
		private $_connection;
		private static $_instance; //The single instance

		/*
		Get an instance of the Database
		@return Instance
		*/
		public static function getInstance(){
			if (!self::$_instance){ // If no instance then make one
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		// Constructor
		private function __construct(){

			$this->_connection = new mysqli($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_password'], $GLOBALS['db_name']);

			if (!$this->_connection){
				echo "ERROR DB".mysqli_connect_error();
			}

		}
		// Magic method clone is empty to prevent duplication of connection
		private function __clone(){
		}
		// Get mysqli connection
		public function getConnection(){
			return $this->_connection;
		}
	}




	function _db_get_instance(){

		if (isset($GLOBALS['connection']))
			return  $GLOBALS['connection'];

		$GLOBALS['connection'] = new mysqli($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_password'], $GLOBALS['db_name']);

		return $GLOBALS['connection'];
	}

	function db_run_query($query){

		$db = _db_get_instance();

		if (!$db){
			die ("No connection");
		}


		$ret = mysqli_query($db, $query);
		if (!$ret){
			return array('ok' => false, 'error' => mysqli_error($db));
		}

		$insert_id = mysqli_insert_id($db);

		if ($insert_id){
			return array('ok' => true, 'info' => $insert_id);
		}

		return array('ok' => true, 'info' => $ret);
	}

	function db_fetch_single_row($query){

		$db = _db_get_instance();

		$ret = mysqli_query($db, $query);
		if (!$ret){
			return array('ok' => false, 'error' => mysqli_error($db));
		}

		$row = mysqli_fetch_assoc($ret);

		return array('ok' => true, 'row' => $row);
	}

	function db_fetch_row_ids($query){

		$db = _db_get_instance();

		$ret = mysqli_query($db, $query);
		if (!$ret){
			return array('ok' => false, 'error' => mysqli_error($db));
		}

		$ids = array();

		while ($row = mysqli_fetch_assoc($ret)){

			$ids[] = $row['id'];
		}

		return $ids;
	}


	function db_safe_sql_param($param, $string = false){

		$db = _db_get_instance();


		if ($string){
			return "'".mysqli_real_escape_string($db, $param)."'";
		}else{
			return $param;
		}
	}

