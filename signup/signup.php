<?php
error_reporting(0);
 require_once('../connect.php');
//echo "Connected successfully";
function NewUser() { 
$uname = $_POST['username']; 
$email = $_POST['email']; 
$passwd = $_POST['password']; 
$empid = $_POST['empid'];
$accno = $_POST['accno'];
$mno = $_POST['mno'];
$query = mysql_query("SELECT * FROM employeeids WHERE empid = '$_POST[empid]'") or die(mysql_error());
$row = mysql_fetch_array($query);
  if($row['empid']!='') {
$query = "INSERT INTO users (uname,empid,mno,accno,passwd,email) VALUES ('$uname','$empid','$mno','$accno','$passwd','$email')"; 
$data = mysql_query ($query)or die(mysql_error());
if($data) { print "YOUR REGISTRATION IS COMPLETED..."; 
$query = "INSERT INTO dailyattendance (empid) VALUES ('$empid')"; 
$data = mysql_query ($query)or die(mysql_error());
$query = "INSERT INTO attendance (empid) VALUES ('$empid')"; 
$data = mysql_query ($query)or die(mysql_error());
}
}
else{
print "Employee ID doesn't exist... Please contact reception if you have entered correct";
}
 }
  function SignUp() 
  { 
  if(!empty($_POST['username'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
  { $query = mysql_query("SELECT * FROM users WHERE uname = '$_POST[username]'") or die(mysql_error());
   if(!$row = mysql_fetch_array($query) or die(mysql_error())) { newuser();
    } 
    else { 
    	print "SORRY...YOU ARE ALREADY REGISTERED USER...";
    	 }
    } 
} 

 SignUp(); 


 ?>
