<?php

header("content-type:image/jpeg");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$id = $_GET['id'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT photo, photo_name FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

if($row=mysqli_fetch_assoc($result))
{
  echo $row["photo"];

}


?>
