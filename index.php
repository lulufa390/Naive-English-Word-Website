<?php
	session_start();
  
	include_once 'sqlhost.php';
	$mysql = mysql_connect($hosting ,$username,$password);
	
	if(!$mysql){
		die("数据库连接失败！");
	}
	
	$result= mysql_query("show databases like 'vocabulary'",$mysql);
	if(!mysql_num_rows($result))
	{
		mysql_query("create database vocabulary",$mysql);
		
	}
	
	mysql_query("use vocabulary",$mysql);
	
	$result= mysql_query("show tables like 'users'",$mysql);
	if(!mysql_num_rows($result))
	{
		mysql_query(
			"create table users(
				email varchar(64) not null,
				name varchar(64) not null,
				password varchar(64) not null,
				primary key (email,name)
			)"
			,$mysql);
	}
  
  
  	$result= mysql_query("show tables like 'cet4'",$mysql);
	if(!mysql_num_rows($result))
	{
		mysql_query("create table cet4 (
			word varchar(64) not null primary key,
			property varchar(16),
			explanation varchar(256)
			
		)"	
		,$mysql);
	}
	
	mysql_query("insert into cet4 values('abandon', 'v.', 'To get away from something.')",$mysql);
	mysql_query("insert into cet4 values('apple', 'n.', 'A sweet fruit')",$mysql);
	mysql_query("insert into cet4 values('car', 'n.', 'A kind of vehicle.')",$mysql);
	mysql_query("insert into cet4 values('cat','n.', 'A lovely animal.')",$mysql);
	mysql_query("insert into cet4 values('data','n.', 'Some information expressed in numbers.')",$mysql);
	mysql_query("insert into cet4 values('flower','n.', 'Grown from a plant, usually have good smell.')",$mysql);
	mysql_query("insert into cet4 values('end','n.', 'Last.')",$mysql);
	mysql_query("insert into cet4 values('hate','v.', 'Dislike something or somebody.')",$mysql);
	mysql_query("insert into cet4 values('rice','n.', 'people eat it every day')",$mysql);
	mysql_query("insert into cet4 values('zoo','n.', 'A place for people to see interesting animals.')",$mysql);	
	
	$result= mysql_query("show tables like 'cet6'",$mysql);
	if(!mysql_num_rows($result))
	{
		mysql_query("create table cet6 (
			word varchar(64) not null primary key,			
			property varchar(16),
			explanation varchar(256)
			
		)"	
		,$mysql);
	}
	
	mysql_query("insert into cet6 values('appreciate', 'v.', 'Thank something or somebody.')",$mysql);
	mysql_query("insert into cet6 values('company', 'n.', 'A group of people working together for money.')",$mysql);
	mysql_query("insert into cet6 values('fit', 'v.', 'Suitable.')",$mysql);
	mysql_query("insert into cet6 values('good','adj.', 'Positive and beneficial.')",$mysql);
	mysql_query("insert into cet6 values('heathy','adj.', 'In good body condition.')",$mysql);
	mysql_query("insert into cet6 values('In','prep.', 'with the body of something.')",$mysql);
	mysql_query("insert into cet6 values('jeep','n.', 'A kind of car.')",$mysql);
	mysql_query("insert into cet6 values('kind','v.', 'Very generous.')",$mysql);
	mysql_query("insert into cet6 values('language','n.', 'people speak every day')",$mysql);
	mysql_query("insert into cet6 values('ocean','n.', 'A lot of water.')",$mysql);
?>

<?php
if (!isset ($_SESSION['username'])) 
{ 
    echo '<script language=javascript>window.location.href="login.html"</script>'; 
}
else{
	echo '<script language=javascript>window.location.href="study1.html"</script>'; 
}
?>


