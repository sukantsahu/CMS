<html>
<?php
$id = $_GET['id'];
//Connect DB
require_once("DB_connection.php");
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method

// Check connection
if (mysqli_connect_errno($conn)) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE  FROM orders WHERE Order_ID like '%$id%'";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: Cargo_view.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
    echo "<a href='Cargo_view.php'>press here to go back previous page</a>";
}
?>
</html>
