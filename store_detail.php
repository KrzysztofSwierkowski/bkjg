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

if(isset($_POST['submit_row']))
{

  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Błąd krytyczny");

 //$tableName = $_POST['tableName'];
  $tableName = 'pistolet';

  $sql = "CREATE TABLE $tableName (
   
     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     nazwisko varchar(255),
     imie varchar(255),
     klub varchar(255),
     seria1 varchar(255),
     seria2 varchar(255),
     seria3 varchar(255),
     seria4 varchar(255),
     seria5 varchar(255),
     seria6 varchar(255),
     dziesiatkiW varchar(255),
     dziesiatki varchar(255);
     wynik varchar(255));
        ";	
 
       $result = $conn->query($sql);

        

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
         $wynik=null; 
 
          for($i=0;$i<count($nazwisko);$i++)
          {
          if($nazwisko[$i]!="" && $imie[$i]!="" && $seria1[$i]!="")
          {
          $query = "insert into $tableName values( NULL , '$nazwisko[$i]','$imie[$i]','$klub[$i]','$seria1[$i]','$seria2[$i]','$seria3[$i]','$seria4[$i]','$seria5[$i]','$seria6[$i]','$dziesiatkiW[$i]','$dziesiatki[$i]','$wynik' )";	 
          $result = $conn->query($query);
          if (!$result) echo "Błąd";
           elseif ($result) echo "<script>window.location.href = '/get_scores.php';</script>";;
          }

        }
      
    
}
 
?>