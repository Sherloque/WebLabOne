<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$id = $_GET['id'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$photo_name=$_FILES["myimage"]["name"];

$photo=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));


mysqli_query($conn,"UPDATE users SET photo ='$photo', photo_name = '$photo_name' WHERE id='$id' ");
echo "done";
  header ('Refresh: 2; URL=http://localhost/laba-one-kenobi/profile.php?id='.$_GET['id']);

?>
