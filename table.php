<link href="form_style.css" type="text/css" rel="stylesheet"/>
<div id="wrapper">
<?php

require_once 'login.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");

    $tableName = 'pistolet';//$_POST['tableName'];
    
    $sql ="UPDATE $tableName SET wynik=seria1 + seria2 + seria3 + seria4 + seria5 + seria6";
    $result = $conn->query($sql);

   $sql = "SELECT id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, dziesiatkiW, dziesiatki, wynik FROM $tableName ORDER BY wynik DESC , dziesiatkiW DESC, dziesiatki DESC"; //ASC - sort malejące
    $result = $conn->query($sql);
    echo "<h1>Ustawiczne strzelanie Psp60 - sesja 1 / 2020 r.</h1>";
    echo '<div id="form_div">';
    echo '<table class="cinereousTable" align=center border="1">';
  echo '<tr id="row1">';
echo "
<thead>
<th>Miejsce</th>
<th>Nazwisko</th>
<th>Imię</th>
<th>Klub</th>
<th>Seria 1</th>
<th>Seria 2</th>
<th>Seria 3</th>
<th>Seria 4</th>
<th>Seria 5</th>
<th>Seria 6</th>
<th>X</th>
<th>Ilość 10</th>
<th>Wynik</th>


</tr>
</thead>";

$place=1;  
while($row = mysqli_fetch_array($result))
{

echo "<tr>";
//echo "<td>" . $row['id']. "</td>" ;
echo "<td>" .$place. "</td>";
echo "<td>" . $row['nazwisko']. "</td>";
echo "<td>" . $row['imie']. "</td>";
echo "<td>" . $row['klub']. "</td>";
echo "<td>" . $row['seria1']. "</td>";
echo "<td>" . $row['seria2']. "</td>";
echo "<td>" . $row['seria3']. "</td>";
echo "<td>" . $row['seria4']. "</td>";
echo "<td>" . $row['seria5']. "</td>";
echo "<td>" . $row['seria6']. "</td>";
echo "<td>" . $row['dziesiatkiW']. "</td>";
echo "<td>" . $row['dziesiatki']. "</td>";
echo "<td>" . $row['wynik']. "</td>";
//echo "<td>" . $row['total']. "</td>"; 
echo "</tr>";

$place++; 

}
echo "</table>";
echo "</div>"

?>
</div>

