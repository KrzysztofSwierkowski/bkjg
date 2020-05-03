<?php
require_once 'session_start.php';
require_once 'login.php';
$tableName = $_SESSION['tableName'];

?>
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

echo $tableName;
if(isset($_POST['update_row']))
{

  

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Błąd krytyczny");
            
  $tableName = $_SESSION['tableName'];

          $id=$_POST["id"];
          $nazwisko=$_POST['nazwisko'];
          $imie=$_POST['imie'];
          $klub=$_POST['klub'];
          $seria1=$_POST['seria1'];
          $seria2=$_POST['seria2'];
          $seria3=$_POST['seria3'];
          $seria4=$_POST['seria4'];
          $seria5=$_POST['seria5'];
          $seria6=$_POST['seria6'];
          $dziesiatkiW=$_POST['dziesiatkiW'];
          $dziesiatki=$_POST['dziesiatki'];

 
          for($i=0;$i<count($id);$i++)
         {
          
          $query = "UPDATE $tableName SET nazwisko = '$nazwisko[$i]' , imie = '$imie[$i]' , klub = '$klub[$i]' ,
                     seria1 = '$seria1[$i]', seria2 = '$seria2[$i]' , seria3 = '$seria3[$i]' , seria4 = '$seria4[$i]' 
                     , seria5 = '$seria5[$i]' , seria6 = '$seria6[$i]' , dziesiatkiW = '$dziesiatkiW[$i]' 
                     , dziesiatki = '$dziesiatki[$i]' where id=$id[$i] ";
      
          if ($conn->query($query) === TRUE) {
            echo "Record updated successfully";
  
          if (!$result) echo "<br><br>Instrukcja nie powiodła się.<br><br>";
           elseif ($result) echo "Instrukcja powiodła się.<br><br>";
          }
          echo "<script>window.location.href = '/get_scores.php';</script>";
       }

}
$sql ="UPDATE $tableName SET wynik=seria1 + seria2 + seria3 + seria4 + seria5 + seria6";
$result = $conn->query($sql);
file_put_contents('date.txt', date('m/d/Y/g:iA'));

?>