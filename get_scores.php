<link href="form_style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#score_table tr").length;
 $rowno=$rowno+1;
 $("#score_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='nazwisko[]' placeholder='Wpisz Nazwisko'></td><td><input type='text' name='imie[]'' placeholder='Wpisz Imię'></td><td><input type='text' name='klub[]' placeholder='Wpisz Klub'></td><td><input type='text' name='seria1[]' placeholder='Seria 1'></td><td><input type='text' name='seria2[]' placeholder='Seria 2'></td><td><input type='text' name='seria3[]' placeholder='Seria 3'></td><td><input type='text' name='seria4[]' placeholder='Seria 4'></td><td><input type='text' name='seria5[]' placeholder='Seria 5'></td><td><input type='text' name='seria6[]' placeholder='Seria 6'></td><td><input type='text' name='dziesiatkiW[]' placeholder='Dziesiątki wewn.'></td><td><input type='text' name='dziesiatki[]' placeholder='Dziesiątki'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}

function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>

<?php
  require_once 'login.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Błąd krytyczny");

    $tableName = 'zawody';//$_POST['tableName'];

   $sql = "SELECT id, nazwisko, imie, klub, seria1, seria2, seria3, seria4, seria5, seria6, dziesiatkiW, dziesiatki FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row

   echo   '<form method="post" action="update_row.php">
      <table id="update_row" align=center>
              <tr id="row1">
             <td><input type="text" name="tableName" placeholder="Wpisz nową nazwę zawodów" value="zawody"></td>';

           while($row = $result->fetch_assoc()) {
        
          echo ' 
            </tr>
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
            <td><input type="text" name="dziesiatki[]" placeholder="Dziesiątki" value = ' . $row['dziesiatki']. '></td>
            
            
            
            </tr>';

      }

    }
    
      echo    '</table>
      <input type="button" onclick="add_row();" value="Dodaj pozycje">
      <input type="submit" name="update_row" value="AKTUALIZUJ">
      </form>
      
      
      
      ';

  ?>