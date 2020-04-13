<?php
require_once 'session_start.php';

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'serwer2051534.home.pl');
define('DB_USERNAME', '32166778_zawody');
define('DB_PASSWORD', '10Bkjg10');
define('DB_NAME', '32166778_zawody');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>