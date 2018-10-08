<?php session_start(); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
//including the database connection file
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($conn, "DELETE FROM users WHERE id=$id");

header("Location:table.php");
//redirecting to the display page (view.php in our case)
?>
