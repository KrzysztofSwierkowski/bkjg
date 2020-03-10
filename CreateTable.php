
<?php


require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Błąd krytyczny");

$tableName = 'pistolet';//$_POST['tableName'];

 //$tableName = $_POST['tableName'];


 $sql = "CREATE TABLE IF NOT EXISTS $tableName (
  
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nazwisko varchar(255),
    imie varchar(255),
    klub varchar(255),
    seria1 Tinyint,
    seria2 Tinyint,
    seria3 Tinyint,
    seria4 Tinyint,
    seria5 Tinyint,
    seria6 Tinyint,
    dziesiatkiW Tinyint,
    dziesiatki Tinyint,
    wynik varchar(255));
       ";	

     $result = $conn->query($sql);
   /*    if (!$result) echo "Instrukcja nie powiodła się.<br><br>";
       elseif ($result) echo "Instrukcja powiodła się.<br><br>";
      
*/

$sql = "CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rejestracja` int(10) NOT NULL,
  `logowanie` int(10) NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
$result = $conn->query($sql);

       ?>