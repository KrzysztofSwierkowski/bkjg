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

if(isset($_POST['update_row']))
{

  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Błąd krytyczny");
            
        $tableName = $_POST['tableName'];

          $id=$_POST['id'];
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

         
          $query = "UPDATE $tableName SET nazwisko = '$nazwisko[$id]' , imie = '$imie[$id]' , klub = '$klub[$id]' ,
                     seria1 = '$seria1[$id]', seria2 = '$seria2[$id]' , seria3 = '$seria3[$id]' , seria4 = '$seria4[$id]' 
                     , seria5 = '$seria5[$id]' , seria6 = '$seria6[$id]' , dziesiatkiW = '$dziesiatkiW[$id]' 
                     , dziesiatki = '$dziesiatki[$id]' where id= $id[$id] ";	 
       
       echo '<br>q: -------- <br>';
          echo $query;
              
          echo '<br>';
          echo '<br>R2: -------- <br>';

          if ($conn->query($query) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

               

}
 
?>