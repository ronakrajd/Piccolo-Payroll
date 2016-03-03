<?php 
session_start();
if($_SESSION["user_name"]){
echo $_SESSION["user_name"];
}
?>