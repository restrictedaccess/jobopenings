<?php


session_start();
unset($_SESSION['userid']);
unset($_SESSION['_id']);
$_SESSION = array();

header("location:jobopenings.php");

