<?php
error_reporting(0);
session_start();
unset($_SESSION["id"]);
unset($_SESSION["user_name"]);
unset($_SESSION["first_name"]);
unset($_SESSION["last_name"]);
unset($_SESSION["today_att"]);
header("location:../index.html");
?>
