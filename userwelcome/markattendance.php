<?php
error_reporting(0);
require_once('../connect.php');
session_start();
function markattendance(){

$date='D'.date('dmY');

$month='W'.date('mY');
$id=$_SESSION['id'];
$query="UPDATE dailyattendance SET $date=1 WHERE empid='$id'";
$result=mysql_query($query);
$query="SELECT * from attendance WHERE empid='$id'";
$result=mysql_query($query);
$row1=mysql_fetch_array($result);
$result=$row1[$month];
$query="UPDATE attendance SET $month=$result+1 WHERE empid='$id'";
$result=mysql_query($query);
$_SESSION['today_att']=1;

}
markattendance();
?>