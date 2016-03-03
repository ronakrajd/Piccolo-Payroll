<?php
//error_reporting(0);

session_start();
require_once('connect.php');
$uname=$_SESSION['user_name'];
$current=$_POST[current_password];
$new=$_POST[new_password];

$query="SELECT * FROM users where uname='$uname' AND passwd='$current'";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	if($row['passwd']!=''){
		$query="UPDATE users SET passwd='$new' WHERE uname='$uname'";
        mysql_query($query);
		print("Password changed successfully.");
	}
		else{
			print("Password didn't match...");
		}

?>
	