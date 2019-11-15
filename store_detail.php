<?php
if(isset($_POST['submit_row']))
{
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");	 
 
 $name=$_POST['name'];
 $age=$_POST['age'];
 $point1=$_POST['point1'];
 for($i=0;$i<count($name);$i++)
 {
  if($name[$i]!="" && $age[$i]!="" && $point1[$i]!="")
  {
    $query = "insert into employee_table values('$name[$i]','$age[$i]','$point1[$i]')";	 
    $result = $conn->query($query);
    if (!$result) echo "Instrukcja nie powiodła się.<br><br>";
   elseif ($result) echo "Instrukcja powiodła się.<br><br>";

  }
 }
}
?>


