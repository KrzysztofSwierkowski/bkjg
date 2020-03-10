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
    
    echo '<div id="form_div">';
    echo '<table class="cinereousTable" align=center border="1">';
  echo '<tr id="row1">';
echo "
<thead>
<th>Miejsce</th>
<th>nazwisko</th>
<th>imie</th>
<th>klub</th>
<th>seria1</th>
<th>seria2</th>
<th>seria3</th>
<th>seria4</th>
<th>seria5</th>
<th>seria6</th>
<th>X</th>
<th>ilość 10</th>
<th>Wynik</th>


</tr>
</thead>";
echo "PISTOLET";
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