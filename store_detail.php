<?php

if(isset($_POST['submit_row']))
{

  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Błąd krytyczny");

  $tableName = $_POST['tableName'];
    

  $sql = "CREATE TABLE $tableName (
   
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
   if (!$result) echo "Instrukcja nie powiodła się.<br><br>";
    elseif ($result) echo "Instrukcja powiodła się.<br><br>";
    echo $result;
    echo '<br> -------- <br>';

 $nazwisko=$_POST['nazwisko'];
 $imie=$_POST['imie'];
 $klub=$_POST['klub'];
 $seria1=$_POST['seria1'];
 $seria2=$_POST['seria2'];
 $seria3=$_POST['seria3'];
 $seria4=$_POST['seria4'];
 $seria5=$_POST['seria5'];
 $seria6=$_POST['seria6'];
 $dziesiatkiW=$_POST['dziesiatkiW'];
 $dziesiatki=$_POST['dziesiatki'];

 
 for($i=0;$i<count($nazwisko);$i++)
 {
  if($nazwisko[$i]!="" && $imie[$i]!="" && $seria1[$i]!="")
  {
    $query = "insert into $tableName values('$nazwisko[$i]','$imie[$i]','$klub[$i]','$seria1[$i]','$seria2[$i]','$seria3[$i]','$seria4[$i]','$seria5[$i]','$seria6[$i]','$dziesiatkiW[$i]','$dziesiatki[$i]')";	 
    $result = $conn->query($query);
    echo '<br>R2: -------- <br>';
    echo $result;
    echo '<br>q: -------- <br>';
    echo $query;
    if (!$result) echo "Instrukcja nie powiodła się.<br><br>";
   elseif ($result) echo "Instrukcja powiodła się.<br><br>";
 }
}

}
}
?>