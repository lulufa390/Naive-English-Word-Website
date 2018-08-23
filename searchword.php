<?php
	session_start();

	$list = $_POST['list']; 
	$number = $_POST['number']; 

	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	
	mysql_query("use vocabulary", $mysql);
	
	
	if($list == 0){
		$result = mysql_query("select * from cet4 join ".$_SESSION['username']."__cet4 where mem < 3 and ".$_SESSION['username']."__cet4.word = cet4.word", $mysql);
	}
	else if($list == 1){
		$result = mysql_query("select * from cet6 join ".$_SESSION['username']."__cet6 where mem < 3 and ".$_SESSION['username']."__cet6.word = cet6.word", $mysql);
	}
	else if($list == 2){
		$result = mysql_query("select * from ".$_SESSION['username']." where mem < 3", $mysql);
	}
	
	
	
	$words = array();
	if(mysql_num_rows($result) < $number){
		echo "false";
	}
	else{
		$numbers = range (0,mysql_num_rows($result)-1); 		
		shuffle ($numbers); 
		$randlist = array_slice($numbers,0,$number); 
		$all = array();
		for($i = 0;$i<mysql_num_rows($result);$i++){
			$row = mysql_fetch_array($result, MYSQL_BOTH);
			array_push($all, $row);	
		}
		
		for($i = 0;$i<$number;$i++){
			if($list == 2){
				$word = array($all[$randlist[$i]]['word'], $all[$randlist[$i]]['property'], $all[$randlist[$i]]['explanation'], $all[$randlist[$i]]['mem']);
				
			}
			else if($list == 0){
				$tmpwd = $all[$randlist[$i]]['word'];
				$thismem = mysql_query("select * from ".$_SESSION['username']."__cet4 where word = '$tmpwd'", $mysql);
				$tmp =  mysql_fetch_array($thismem, MYSQL_BOTH);
				$word = array($all[$randlist[$i]]['word'], $all[$randlist[$i]]['property'], $all[$randlist[$i]]['explanation'], $tmp['mem']);
			}
			else if($list == 1){
				$tmpwd = $all[$randlist[$i]]['word'];
				$thismem = mysql_query("select * from ".$_SESSION['username']."__cet6 where word = '$tmpwd'", $mysql);
				$tmp =  mysql_fetch_array($thismem, MYSQL_BOTH);
				$word = array($all[$randlist[$i]]['word'],$all[$randlist[$i]]['property'], $all[$randlist[$i]]['explanation'], $tmp['mem']);
			}
			array_push($words, $word);
		
		}
		echo json_encode($words);
	}
	
	
?>