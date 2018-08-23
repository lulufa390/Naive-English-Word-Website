<?php
	session_start();

	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	
	mysql_query("use vocabulary", $mysql);
	
	
	$result1 = mysql_query("select * from cet4", $mysql);
	

	$result2 = mysql_query("select * from cet6", $mysql);
	

	$result3 = mysql_query("select * from ".$_SESSION['username'], $mysql);
	
	$ret = array();
	
	while($row = mysql_fetch_array($result1)){
		$tmp = array($row['word'], $row['property'], $row['explanation'], "CET4");
		array_push($ret, $tmp);
	}
	
	while($row = mysql_fetch_array($result2)){
		$tmp = array($row['word'], $row['property'], $row['explanation'], "CET6");
		array_push($ret, $tmp);
	}
	
	while($row = mysql_fetch_array($result3)){
		$tmp = array($row['word'], $row['property'], $row['explanation'], "自定义");
		array_push($ret, $tmp);
	}
	
	
	echo json_encode($ret);
	
?>