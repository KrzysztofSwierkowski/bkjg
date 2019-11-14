<?php
CREATE TABLE 'zawody' (
 'name' text NOT NULL,
 'club' text NOT NULL,
 'point1' text NOT NULL,
 'point2' text NOT NULL,
 'point3' text NOT NULL,
 'point4' text NOT NULL,
 'point5' text NOT NULL,
 'point6' text NOT NULL,
 'xcount' text NOT NULL,
 'score' text NOT NULL,

) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

<?php
if(isset($_POST['submit_row']))
{
 $host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect=mysql_connect($host,$username,$password);
 $db=mysql_select_db($databasename);	 
 
 $name=$_POST['name'];
 $club=$_POST['club'];
 $point1=$_POST['point1'];
 $point2=$_POST['point2'];
 $point3=$_POST['point3'];
 $point4=$_POST['point4'];
 $point5=$_POST['point5'];
 $point6=$_POST['point6'];
 $xcount=$_POST['xcount'];
 $score=$_POST['score'];
 for($i=0;$i<count($name);$i++)
 {
  if($name[$i]!="" && $age[$i]!="" && $job[$i]!="")
  {
   mysql_query("insert into zawody values('$name[$i]','$club[$i]','$point1[$i]','$point2[$i]','$point3[$i]','$point4[$i]'
   ,'$point5[$i]','$point6[$i]','$xcount[$i]','$score[$i]')");	 
  }
 }
}
?>