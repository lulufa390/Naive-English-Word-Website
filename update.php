<?php
	session_start();
	
	$list = $_POST['list']; 
	$thewords = json_decode(stripslashes($_POST['thewords']));
	$thecnt = json_decode(stripslashes($_POST['thecnt']));
	

	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	// echo $list.$thewords[0][0]."#".$thecnt[0]."#";
	
	
	mysql_query("use vocabulary", $mysql);
	
	
	for($i=0;$i<count($thewords);$i++){
		if($list == 0)
			mysql_query("update ".$_SESSION['username']."__cet4 set mem = '$thecnt[$i]' where word = '{$thewords[$i][0]}'", $mysql);
			// mysql_query("update ".$_SESSION['username']."__cet4 set mem =".$thecnt[$i]." where word = ".$thewords[$i][0], $mysql);
		else if($list == 1)
			mysql_query("update ".$_SESSION['username']."__cet6 set mem = '$thecnt[$i]' where word = '{$thewords[$i][0]}'", $mysql);
			// mysql_query("update ".$_SESSION['username']."__cet6 set mem =".$thecnt[$i]." where word = ".$thewords[$i][0], $mysql);
		else if($list == 2){
			
			mysql_query("update ".$_SESSION['username']." set mem = '$thecnt[$i]' where word = '{$thewords[$i][0]}'", $mysql);
		}
			
	}
	
	// echo "true";
	
?>