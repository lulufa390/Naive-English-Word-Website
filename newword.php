<?php
	session_start();
	$nword = $_POST['nword']; 
	$nproperty = $_POST['nproperty'];
	$nexplanation = $_POST['nexplanation']; 

	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	
	mysql_query("use vocabulary", $mysql);
	
	$result = mysql_query("show tables like".$_SESSION['username'] , $mysql);
	
	
	if(!$result){
		mysql_query("create table ".$_SESSION['username']."(
			word varchar(64) not null primary key,
			property varchar(16),
			explanation varchar(256),
			mem int(8)
			)", $mysql);
	}
	
	if(mysql_query("insert into ".$_SESSION['username']." values('$nword', '$nproperty', '$nexplanation', 0)", $mysql)){
		echo "true";
	}
	else{
		echo "false";
	}	

?>