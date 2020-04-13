<?php
require_once 'session_start.php';
require_once 'login.php';
$tableName = $_SESSION['tableName'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Błąd krytyczny");

$i=[0];

for($j=0;$j<10;$j++)
{
    $query = "INSERT INTO pistolet (id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, dziesiatkiW, dziesiatki, wynik) VALUES (NULL, ' ', ' ', ' ', '0', '0', '0', '0', '0', '0', '0', '0', '')" ;
    $result = $conn->query($query);
    if (!$result) echo "Błąd";
           elseif ($result) echo "<script>window.location.href = '/get_scores.php';</script>";
}

?>