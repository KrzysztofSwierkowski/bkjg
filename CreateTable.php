<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Błąd krytyczny");

$tableName = 'zawody';//$_POST['tableName'];

 //$tableName = $_POST['tableName'];


 $sql = "CREATE TABLE $tableName (
  
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nazwisko varchar(255),
    imie varchar(255),
    klub varchar(255),
    seria1 varchar(255),
    seria2 varchar(255),
    seria3 varchar(255),
    seria4 varchar(255),
    seria5 varchar(255),
    seria6 varchar(255),
    dziesiatkiW varchar(255),
    dziesiatki varchar(255));
       ";	

     $result = $conn->query($sql);
   /*    if (!$result) echo "Instrukcja nie powiodła się.<br><br>";
       elseif ($result) echo "Instrukcja powiodła się.<br><br>";
      
*/
       ?>