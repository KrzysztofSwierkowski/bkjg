<?php

require_once 'login.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");

    $tableName = 'zawody';//$_POST['tableName'];

   $sql = "SELECT id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, dziesiatkiW, dziesiatki FROM $tableName";
    $result = $conn->query($sql);
    
echo "<table border='1'>
<tr>
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


</tr>";

while($row = mysqli_fetch_array($result))
{
    
echo "<tr>";
//echo "<td>" . $row['id']. "</td>" ;
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
//echo "<td>" . $row['total']. "</td>";
            
echo "</tr>";
}
echo "</table>";

?>