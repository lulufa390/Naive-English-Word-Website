<?php
	session_start();


	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	
	mysql_query("use vocabulary", $mysql);
	
	// echo "select * from ".$_SESSION['username']."__cet4";
	$result10 = mysql_query("select * from ".$_SESSION['username']."__cet4", $mysql);
	$result11 = mysql_query("select * from ".$_SESSION['username']."__cet4 where mem = 0", $mysql);
	$result12 = mysql_query("select * from ".$_SESSION['username']."__cet4 where mem > 0 && mem < 3", $mysql);
	$result13 = mysql_query("select * from ".$_SESSION['username']."__cet4 where mem >= 3", $mysql);

	$result20 = mysql_query("select * from ".$_SESSION['username']."__cet6", $mysql);
	$result21 = mysql_query("select * from ".$_SESSION['username']."__cet6 where mem = 0", $mysql);
	$result22 = mysql_query("select * from ".$_SESSION['username']."__cet6 where mem > 0 && mem < 3", $mysql);
	$result23 = mysql_query("select * from ".$_SESSION['username']."__cet6 where mem >= 3", $mysql);

	$result30 = mysql_query("select * from ".$_SESSION['username'], $mysql);
	$result31 = mysql_query("select * from ".$_SESSION['username']." where mem = 0", $mysql);
	$result32 = mysql_query("select * from ".$_SESSION['username']." where mem > 0 && mem < 3", $mysql);
	$result33 = mysql_query("select * from ".$_SESSION['username']." where mem >= 3", $mysql);
	
	$cnt0 = array(mysql_num_rows($result10), mysql_num_rows($result11),mysql_num_rows($result12), mysql_num_rows($result13));
	$cnt1 = array(mysql_num_rows($result20), mysql_num_rows($result21),mysql_num_rows($result22), mysql_num_rows($result23));
	$cnt2 = array(mysql_num_rows($result30), mysql_num_rows($result31),mysql_num_rows($result32), mysql_num_rows($result33));
	
	
	$ret = array($cnt0, $cnt1, $cnt2);
	
	echo json_encode($ret);
	
?>