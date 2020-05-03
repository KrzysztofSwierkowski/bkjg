<?php
require_once 'session_start.php';
require_once 'login.php';




    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");

    $tableName = 'karabin';


   $sql = "SELECT id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, wynik, dziesiatki, dziesiatkiW FROM $tableName ORDER BY wynik DESC , dziesiatkiW DESC, dziesiatki DESC"; //ASC - sort malejące
    $result = $conn->query($sql);
    $cfg['file'] = "licznik.txt"; // ścieżka z plikiem
    $cfg['read'] = file_get_contents($cfg['file']); // odczytuje plik
    
    if(!isset($_COOKIE['licznik'])) {
        setcookie('licznik', 'licznik', time() + 7*24*3600); // wysyła ciasteczko do przeglądarki użytkownika
        $fp = fopen($cfg['file'], "w"); // otwiera plik
        flock($fp, 2); // blokuje plik
        fwrite($fp, $cfg['read']+1); // zapis do pliku
        flock($fp,3); // blokuje plik
        fclose($fp); // zamyka plik
    }

    echo '
    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Karabin sportowy bocznego zapłonu – Kdw 60</title>
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
    <h3 >Karabin sportowy <br> bocznego zapłonu <br> Kdw 60<br> sesja 1 / 2020 r.</h3>
    <img src="img\PZSS.png">
    </div>';


    echo "Liczba odwiedzin :"; echo $cfg['read']; // wyświetlenie liczby odwiedzin
   echo '<table class="cinereousTable" align=center border="1">


  <tr id="row1">

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
echo '<b>Ostatnia aktualizacja : ' . file_get_contents("date.txt") . '</b>';
?>

</div>
</body>
    </html>
