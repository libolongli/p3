<?php
	require 'task.class.php';
	$task = new task();
	$task->update(array('percent'=>90,'id'=>1));
	echo "已经将进度修改为90%";