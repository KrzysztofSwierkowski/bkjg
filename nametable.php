<?php
if(isset($_POST['submit_name']))
{
  require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");	 
    
    $tableName = $_POST['tableName'];
    

 $query = "CREATE TABLE $tableName (
  PersonId int,
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

  $result = $conn->query($query);
  if (!$result) echo "Instrukcja nie powiodła się.<br><br>";
   elseif ($result) echo "Instrukcja powiodła się.<br><br>";


}
?>