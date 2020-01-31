<link href="form_style.css" type="text/css" rel="stylesheet"/>
<?php
require_once 'login.php';
$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "zawody";

  $conn = new mysqli($hn, $un, $pw, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM zawody WHERE id = $id"; 
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo "<script>window.location.href = '/get_scores.php';</script>";
    exit;
} else {
    echo "Error deleting record";
}
?>

