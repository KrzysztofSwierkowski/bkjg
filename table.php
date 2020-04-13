<?php
require_once 'session_start.php';
require_once 'login.php';

echo '<div id="banner">';
echo '<img src="img\BKJG.png">';
echo "<h3 >Ustawiczne strzelanie Psp60 <br> sesja 1 / 2020 r.</h3>";
echo '<img src="img\PZSS.png">';
echo '</div>';
//echo "<h3>Ustawiczne strzelanie Psp60 <br> sesja 1 / 2020 r.</h3>";

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");

    $tableName = 'pistolet';
    //$tableName = $_SESSION['tableName'];
    //Przenieść do update poniższe 
   // $sql ="UPDATE $tableName SET wynik=seria1 + seria2 + seria3 + seria4 + seria5 + seria6";
    //$result = $conn->query($sql);
    //$time = "SELECT update_time FROM information_schema.tables WHERE table_name = 'pistolet'";
    //$sql = "SELECT update_time FROM information_schema.tables WHERE table_name = 'pistolet'";
 // $rtime = $conn->query($sql);

   $sql = "SELECT id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, wynik, dziesiatki, dziesiatkiW FROM $tableName ORDER BY wynik DESC , dziesiatkiW DESC, dziesiatki DESC"; //ASC - sort malejące
    $result = $conn->query($sql);
    echo'<link href="form_style.css" type="text/css" rel="stylesheet"/>';
    echo'<div id="wrapper">';
    //echo '<div id="form_div">';
    

    
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
<th>Wynik</th>
<th>Ilość 10</th>
<th>X</th>

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
//echo "</div>";




?>
</div>

