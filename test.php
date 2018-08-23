<?php
	session_start();

	$list = $_POST['list']; 


	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	
	mysql_query("use vocabulary", $mysql);
	
	
	if($list == 0){
		$result = mysql_query("select * from cet4 join ".$_SESSION['username']."__cet4 where mem >= 3 and ".$_SESSION['username']."__cet4.word = cet4.word", $mysql);
	}
	else if($list == 1){
		$result = mysql_query("select * from cet6 join ".$_SESSION['username']."__cet6 where mem >= 3 and ".$_SESSION['username']."__cet6.word = cet6.word", $mysql);
	}
	else if($list == 2){
		$result = mysql_query("select * from ".$_SESSION['username']." where mem >= 3", $mysql);
	}
	
	
	$tmp = array();
	while($row = mysql_fetch_array($result, MYSQL_BOTH)){
		array_push($tmp, $row);
	}
	

	
	$words = array();
	for($i =0;$i<count($tmp);$i++){
		do{
			$rand1 = rand(0, count($tmp) - 1);
		}while($tmp[$rand1]['explanation'] == $tmp[$i]['explanation']);
		
		do{
			$rand2 = rand(0, count($tmp) - 1);
		}while($tmp[$rand2]['explanation'] == $tmp[$i]['explanation']);
		$aws = rand(0, 2);
		switch($aws){
			case 0: $word = array($tmp[$i]['word'], $tmp[$i]['property'], $tmp[$i]['explanation'], $tmp[$rand1]['explanation'], $tmp[$rand2]['explanation'], 0);break;
			case 1: $word = array($tmp[$i]['word'], $tmp[$i]['property'],  $tmp[$rand1]['explanation'], $tmp[$i]['explanation'],$tmp[$rand2]['explanation'], 1);break;
			case 2: $word = array($tmp[$i]['word'], $tmp[$i]['property'], $tmp[$rand1]['explanation'], $tmp[$rand2]['explanation'],$tmp[$i]['explanation'],  2);break;
		}
		
		array_push($words,$word);
	}
	


	echo json_encode($words);
	
?>