<?php
require_once 'session_start.php';
$tableName = $_SESSION['tableName'];
// Initialize the session

 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: logon.php");
exit;
?>