<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piccolo payroll";
// Create connection
$conn = mysql_connect($servername, $username, $password);
$db=mysql_select_db($dbname,$conn) or die("Failed to connect to MySQL: " . mysql_error()); 

// Check connection
if (!$conn) {
    die("Connection failed: " . MySQLi_connect_error());
}
?>