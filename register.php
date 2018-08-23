<?php
	$myemail = $_POST['myemail']; 
	$myname = $_POST['myname'];
	$mypassword = $_POST['mypassword']; 

	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	mysql_query("use vocabulary", $mysql);
	
	$result1 = mysql_query("select * from users where email = '$myemail'", $mysql);
	$result2 = mysql_query("select * from users where name = '$myname'", $mysql);
	
	if(!mysql_num_rows($result1) and !mysql_num_rows($result1)){
		if(mysql_query("insert into users values('$myemail', '$myname', '$mypassword')", $mysql)){
			
			
			if(mysql_query("create table {$myname}__cet4 (
				word varchar(64) not null primary key,
				mem int(8)				
			)", $mysql) && mysql_query("create table {$myname}__cet6 (
				word varchar(64) not null primary key,
				mem int(8)				
			)", $mysql) && mysql_query("create table {$myname} (
				word varchar(64) not null primary key,
				property varchar(16),
				explanation varchar(256),
				mem int(8)
			)", $mysql) ){
				
				$cet4words = mysql_query("select * from cet4",$mysql);
				$cet6words = mysql_query("select * from cet6",$mysql);
				while($row = mysql_fetch_array($cet4words, MYSQL_BOTH)){
					$thiswd = $row['word'];
					 mysql_query("insert into {$myname}__cet4 values('$thiswd', 0)",$mysql);					 
				}
				
				while($row = mysql_fetch_array($cet6words, MYSQL_BOTH)){
					$thiswd = $row['word'];
					 mysql_query("insert into {$myname}__cet6 values('$thiswd', 0)",$mysql);
				}
				
				echo "true";
			}
			else{
				echo "table";
			}
		}
		else{
			echo "false";
		}
	}
	else{
		echo "exist";
	}
	
	
	

?>