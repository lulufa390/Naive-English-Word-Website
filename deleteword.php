<?php
	session_start();
	$dword = $_POST['dword']; 
	

	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	mysql_query("use vocabulary", $mysql);
	
	
	if(mysql_query("delete from ".$_SESSION['username']." where word = '$dword'", $mysql)){
		echo "true";
	}
	else{
		echo "false";
	}
	

?>