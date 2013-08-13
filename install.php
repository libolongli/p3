<?php
	require 'db.class.php';
	$db = new db();
	$db->connect('localhost','root','root','project');
	$str = file_get_contents('db.sql');
	$arr = explode(';', $str);
	foreach ($arr as $key => $value) {
		if($value){
			$db->query(trim($value));
		}
	}
	echo  "配置成功!</br>";
	echo  '<a href = "send.php">send.php</a></br>';
	echo  '<a href = "update.php">update.php</a>';
