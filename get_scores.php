<?php
require_once 'session_start.php';
require_once 'login.php';
// Initialize the session

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: logon.php");
    exit;
}

if (isset($_POST['Submit'])) { 
  $_SESSION['tableName'] = $_POST['tableName'];
  
} 

?>



<link href="form_style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

function add_row()
{
 $rowno=$("#update_row tr").length;
 $rowno=$rowno+1;
 $("#update_row tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='nazwisko[]' placeholder='Nazwisko'></td><td><input type='text' name='imie[]'' placeholder='Imię'></td><td><input type='text' name='klub[]' placeholder='Klub'></td><td><input type='text' name='seria1[]' placeholder='Seria 1'></td><td><input type='text' name='seria2[]' placeholder='Seria 2'></td><td><input type='text' name='seria3[]' placeholder='Seria 3'></td><td><input type='text' name='seria4[]' placeholder='Seria 4'></td><td><input type='text' name='seria5[]' placeholder='Seria 5'></td><td><input type='text' name='seria6[]' placeholder='Seria 6'></td><td><input type='text' name='dziesiatkiW[]' placeholder='Dziesiątki wewn.'></td><td><input type='text' name='dziesiatki[]' placeholder='Dziesiątki'></td><td id='wynik'>Wynik</td><td><input type='button' value='Usuń wiersz' onclick=delete_row('row"+$rowno+"')></td></tr>");
}

function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>

<form method="post" action="">
   <input type="radio" name="tableName" value="pistolet"/>Pistolet bocznego zapłonu
   <input type="radio" name="tableName" value="pistolet2"/>Pistolet centralnego zapłonu  
   <input type="radio" name="tableName" value="karabin"/>Karabin   
   <input type="submit" value="Wybierz Tabelę"/>

 </form>
 

<?php
$tableName = $_POST['tableName'];
$_SESSION['tableName'] = $tableName;

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");



   
 
   $sql = "SELECT id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, dziesiatkiW, dziesiatki FROM $tableName";
    $result = $conn->query($sql);

  
    if ($result->num_rows > 0) {
      // output data of each row

      
?>
<div id="form_div">

   <form method="post" action="update_row.php">
      <table class="score_table">
              <tr id="row1">
            
             </tr>
             <th><input type="hidden"></th>
             <th>Nazwisko</th>
             <th>Imię</th>
             <th>Klub</th>
             <th>Seria 1</th>
             <th>Seria 2</th>
             <th>Seria 3</th>
             <th>Seria 4</th>
             <th>Seria 5</th>
             <th>Seria 6</th>
            <th>Dziesiątki wew</th>
            <th>Dziesiątki</th>
<?php
           while($row = $result->fetch_assoc()) {
        
          echo ' 
            
            <tr id="row1">
            <td><input type="hidden" name="id[]" value='. $row['id'].' ></td> 
            <td><input type="text" name="nazwisko[]" placeholder="Wpisz Nazwisko" value = ' . $row['nazwisko']. ' ></td>
            <td><input type="text" name="imie[]" placeholder="Wpisz Imię" value = ' . $row['imie']. '></td>
            <td><input type="text" name="klub[]" placeholder="Wpisz Klub" value = ' . $row['klub']. '></td>
            <td><input type="text" name="seria1[]" placeholder="Seria 1" value = ' . $row['seria1']. '></td>
            <td><input type="text" name="seria2[]" placeholder="Seria 2" value = ' . $row['seria2']. '></td>
            <td><input type="text" name="seria3[]" placeholder="Seria 3" value = ' . $row['seria3']. '></td>
            <td><input type="text" name="seria4[]" placeholder="Seria 4" value = ' . $row['seria4']. '></td>
            <td><input type="text" name="seria5[]" placeholder="Seria 5" value = ' . $row['seria5']. '></td>
            <td><input type="text" name="seria6[]" placeholder="Seria 6" value = ' . $row['seria6']. '></td>
            <td><input type="text" name="dziesiatkiW[]" placeholder="Dziesiątki wewn." value = ' . $row['dziesiatkiW']. '></td>
            <td><input type="text" name="dziesiatki[]" placeholder="Dziesiątki" value = ' . $row['dziesiatki']. '></td>';
            echo "<td><a href='delete.php?id=".$row['id']."'><input type='button' value='USUŃ'></a></td>";
                       
            echo "</tr>";

      }
    //Przenieść do update poniższe 
    $sql ="UPDATE $tableName SET wynik=seria1 + seria2 + seria3 + seria4 + seria5 + seria6";
    $result = $conn->query($sql);
    }

    echo $tableName;
    ?>
      </table>
      <input type="submit" name="update_row" value="AKTUALIZUJ">
      </form>
      
      <a href ='index.php'><input type="submit" name="index.php" value="DODAJ NOWEGO UCZESTNIKA"></a>
  </div>
        
      


  