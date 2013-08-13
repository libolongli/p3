<?php
	require 'task.class.php';
	$task = new task();
	$task->add(array('uid'=>1,'rids'=>'2,3,4','user'=>'李波'));
	echo "已经模拟给用户2,3,4 发送了人任务!";
