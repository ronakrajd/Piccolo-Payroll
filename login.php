<?php
error_reporting(0);
session_start();
require_once('connect.php');
function loginUser(){
	$date='D'.date('dmY');
   $result = mysql_query("SHOW COLUMNS FROM dailyattendance LIKE $date");
if(!(mysql_num_rows($result))){
	mysql_query("ALTER TABLE dailyattendance ADD $date BOOLEAN NOT NULL" );
}
$month='L'.date('mY');
   $result = mysql_query("SHOW COLUMNS FROM attendance LIKE $month");
if(!(mysql_num_rows($result))){
	mysql_query("ALTER TABLE attendance ADD $month int NOT NULL" );
}
$month='W'.date('mY');
   $result = mysql_query("SHOW COLUMNS FROM attendance LIKE $month");
if(!(mysql_num_rows($result))){
	mysql_query("ALTER TABLE attendance ADD $month int NOT NULL" );
}
$month='T'.date('mY');
   $result = mysql_query("SHOW COLUMNS FROM attendance LIKE $month");
if(!(mysql_num_rows($result))){
	mysql_query("ALTER TABLE attendance ADD $month int NOT NULL" );
}
	$query="SELECT * FROM users where uname='$_POST[username]' AND passwd='$_POST[password]'";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	if($row['uname']!=''){
		print("Login Successful");
		$lid=$row['empid'];
		$_SESSION["user_name"] = $row['uname'];
         $_SESSION["id"] = $row['empid'];
         $_SESSION["first_name"] = $row['fname'];
         $_SESSION["last_name"] = $row['lname'];
         $query="SELECT * FROM dailyattendance WHERE empid='$lid'";
         $result=mysql_query($query);
         $row1=mysql_fetch_array($result);
         if($row1[$date]==1)
         	$_SESSION['today_att']=1;	
	}
	else
		print("Login Failed");
	
}
loginUser();
?>