<?php
	class task{
		private $_db;
		private $_config;
		public function __construct(){
			require 'db.class.php';
			$this->_db = new db();
			$this->_db->connect('localhost','root','root','project');
			$url = 'user/pay';
			$sql = "SELECT * FROM common_config where url = '{$url}' ";
			$this->_config = $this->_db->fetch_first($sql);
		}
		/*
			$map = array(
				'uid' =>
				'rids'=>
			)
		*/
		public function add($map = array()){
			if($this->_config['active']){
				$format = $this->_config['format'];
				$format = str_replace('{user}', $map['user'], $format);
				$now = time();
				$sql = "INSERT INTO flow (uid,rids,content,ts_created,ts_updated,status)  VALUES({$map['uid']},'{$map['rids']}','{$format}',{$now},{$now},1)";
				$this->_db->query($sql);
				foreach (explode(',', $map['rids']) as $key => $value) {
					$sql = "INSERT INTO flow_log (uid,rid,ts_created) VALUES({$map['uid']},{$value},{$now})";
					$this->_db->query($sql);
				}
			}
		}

		/*
			$map = array('percent'=>,'id'=>)
		*/
		public function update($map = array()){
			$now = time();
			//print_r($map);exit;
			$sql = "UPDATE flow set percent={$map['percent']},ts_updated={$now} where id={$map['id']}";
			//echo $sql;exit;
			$this->_db->query($sql);
		}

		// public function get(){

		// }
	}
	
	;