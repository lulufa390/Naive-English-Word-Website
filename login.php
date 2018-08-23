<?php
	session_start();

	$myemail = $_POST['myemail']; 
	$mypassword = $_POST['mypassword']; 

	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	
	mysql_query("use vocabulary", $mysql);
	
	
	
	$result = mysql_query("use vocabulary", $mysql);
	
	$result1 = mysql_query("select password from users where email = '$myemail'", $mysql);
	$result2 = mysql_query("select password from users where name = '$myemail'", $mysql);
	
	if(mysql_num_rows($result1) == 1 or mysql_num_rows($result2) == 1){
		$row1 = mysql_fetch_array($result1, MYSQL_BOTH);
		$row2 = mysql_fetch_array($result2, MYSQL_BOTH);
		if($row1['password'] == $mypassword or $row2['password'] == $mypassword){
			
			$_SESSION['username'] = $myemail;
			echo "true";
		}
		else{
			echo "wrong";
		}

	}
	else{
		echo "nouser";
	}
	
	
	
	
	
	
?>