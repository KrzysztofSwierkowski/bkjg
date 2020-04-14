<?php
require_once 'session_start.php';
require_once 'login.php';




    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");

    $tableName = 'pistolet2';


   $sql = "SELECT id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, wynik, dziesiatki, dziesiatkiW FROM $tableName ORDER BY wynik DESC , dziesiatkiW DESC, dziesiatki DESC"; //ASC - sort malejące
    $result = $conn->query($sql);


    echo '
    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ustawiczne strzelanie Psp60</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="form_style.css" type="text/css" rel="stylesheet"/>
      </head>
      <body>
        <!--[if lt IE 7]>
          <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
     
    
    
    
    <div id="wrapper">
    
    <div class="banner">
    <img src="img\BKJG.png">
    <h3 >Pistolet sportowy bocznego zapłonu – Psp 60<br> sesja 1 / 2020 r.</h3>
    <img src="img\PZSS.png">
    </div>


    
    <table class="cinereousTable" align=center border="1">


  <tr id="row1">;

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
</thead>';




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
echo "<td>" . $row['wynik']. "</td>";
echo "<td>" . $row['dziesiatki']. "</td>";
echo "<td>" . $row['dziesiatkiW']. "</td>";
//echo "<td>" . $row['total']. "</td>"; 
echo "</tr>";

$place++; 

}
echo "</table>";

?>
</div>
</body>
    </html>
