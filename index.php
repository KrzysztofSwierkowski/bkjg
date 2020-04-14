<?php
require_once 'session_start.php';
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: logon.php");
    exit;
}

?>

<html>
<head>
<meta charset="utf-8">
<link href="form_style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">


function add_row()
{
 $rowno=$("#score_table tr").length;
 $rowno=$rowno+1;
 $("#score_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='nazwisko[]' placeholder='Nazwisko'></td><td><input type='text' name='imie[]'' placeholder='Imię'></td><td><input type='text' name='klub[]' placeholder='Klub'></td><td><input type='text' name='seria1[]' placeholder='Seria 1'></td><td><input type='text' name='seria2[]' placeholder='Seria 2'></td><td><input type='text' name='seria3[]' placeholder='Seria 3'></td><td><input type='text' name='seria4[]' placeholder='Seria 4'></td><td><input type='text' name='seria5[]' placeholder='Seria 5'></td><td><input type='text' name='seria6[]' placeholder='Seria 6'></td><td><input type='text' name='dziesiatkiW[]' placeholder='Dziesiątki wewn.'></td><td><input type='text' name='dziesiatki[]' placeholder='Dziesiątki'></td><td id='wynik'>Wynik</td><td><input type='button' value='Usuń wiersz' onclick=delete_row('row"+$rowno+"')></td></tr>");
}

function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>

<body>

        <div id="top">TABELA WYNIK&Oacute;W</div>   
        
<div id="wrapper">

<div id="form_div">
 <form method="post" action="store_detail.php">
  <table id="score_table" align=center>
          <tr id="row1">
                <td><label><?PHP $_POST['tableName']?></label></td>
          </tr>
   <tr id="row1">
    <td><input type="text" name="nazwisko[]" placeholder="Nazwisko"></td>
    <td><input type="text" name="imie[]" placeholder="Imię"></td>
    <td><input type="text" name="klub[]" placeholder="Klub"></td>
    <td><input type="text" name="seria1[]" placeholder="Seria 1"></td>
    <td><input type="text" name="seria2[]" placeholder="Seria 2"></td>
    <td><input type="text" name="seria3[]" placeholder="Seria 3"></td>
    <td><input type="text" name="seria4[]" placeholder="Seria 4"></td>
    <td><input type="text" name="seria5[]" placeholder="Seria 5"></td>
    <td><input type="text" name="seria6[]" placeholder="Seria 6"></td>
    <td><input type="text" name="dziesiatkiW[]" placeholder="Dziesiątki wewn."></td>
    <td><input type="text" name="dziesiatki[]" placeholder="Dziesiątki"></td>
        
   </tr>
  </table>

  <input type="button" onclick="add_row();" value="Dodaj pozycje">
  <input type="hidden" name="submit_row" value="<?php $tableName ?>" />
  <input type="submit" name="submit_row" value="ZAPISZ">
 </form>
 <form action="get_scores.php">
 <input type="hidden" name="get_scores" value="<?php $tableName ?>" />
        <input type="submit" name="get_scores" value="Tabela wyników">
      </form>
 
</div>

</div>
</body>
</html>