<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
  <style>
  h1 {
      position: absolute;
      left: 400px;
      top: 0px;
  }
  h2 {
      position: absolute;
      left: 550px;
      top: 310px;
  }
  h4 {
      position: absolute;
      left: 800px;
      top: 317px;
  }
  h3 {
      position: absolute;
      left: 250px;
      top: 400px;
  }
  </style>
</head>


<body>
  <?php
  if(isset($_GET['id']))
  {
  	$id = $_GET['id'];
  	include ("bd.php");
  	$result = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
  	$myrow = mysqli_fetch_array($result);

  	if(isset($_SESSION["role"]))
  	{
  		if($_SESSION["role"]=="admin")
  		{
        if($_SESSION["id"]==$myrow['id'])
        {
          echo'<form name="save" action="save.php" method="post">';
    			echo'Role:';
    			echo $myrow["role"];
    			echo '<br>';
    			echo'Login:<br>';
    			echo'<input type="text" name="login" id="log" value='.htmlspecialchars($myrow["login"]).'><br>';
    			echo '<br>';
    			echo'First name:<br>';
    			echo'<input type="text" name="fname" id="fname" value='.htmlspecialchars($myrow["fname"]).'><br>';
    			echo '<br>';
    			echo'Last name:<br>';
    			echo'<input type="text" name="lname" id="sname" value='.htmlspecialchars($myrow["lname"]).'><br>';
    			echo '<br>';
    			echo'Password:<br>';
    			echo'<input type="password" name="password" id="pass" value='.htmlspecialchars($myrow["password"]).'><br>';
    			echo'<h3><input type="submit" value="Save"></h3>';
          echo'</form>';
          echo '<form method="POST" action="getphoto.php?id='.$myrow["id"].'" enctype="multipart/form-data">';
          echo '<h2><input type="file" name="myimage"></h2>';
          echo '<h4><input type="submit" name="submit_image" value="Upload"></h4>';
          echo '</form>';
          echo '<h1><img src= "fetch_photo.php?id='.$myrow["id"]. '"width="400" height="250"></h1>';
    			echo'<br>';
        }
        else{
          $_SESSION["someones_id"] = $myrow['id'];
    			echo'<form name="save" action="save.php" method="post">';
    			echo'Role:';
    			echo $myrow["role"];
    			echo '<br>';
    			echo'Login:<br>';
    			echo'<input type="text" name="login" id="log" value='.htmlspecialchars($myrow["login"]).'><br>';
    			echo '<br>';
    			echo'First name:<br>';
    			echo'<input type="text" name="fname" id="fname" value='.htmlspecialchars($myrow["fname"]).'><br>';
    			echo '<br>';
    			echo'Last name:<br>';
    			echo'<input type="text" name="lname" id="sname" value='.htmlspecialchars($myrow["lname"]).'><br>';
    			echo '<br>';
    			echo'Password:<br>';
    			echo'<input type="password" name="password" id="pass" value='.htmlspecialchars($myrow["password"]).'><br>';
    			echo'<h3><input type="submit" value="Save"></h3>';
          echo'</form>';
          echo '<form method="POST" action="getphoto.php?id='.$myrow["id"].'" enctype="multipart/form-data">';
          echo '<h2><input type="file" name="myimage"></h2>';
          echo '<h4><input type="submit" name="submit_image" value="Upload"></h4>';
          echo '</form>';
          echo '<h1><img src= "fetch_photo.php?id='.$myrow["id"]. '"width="400" height="250"></h1>';
    			echo'<br>';
        }
  		}
  		else
  		{
        if($_SESSION["id"]==$myrow['id']){
          echo'<form name="save" action="save.php" method="post">';
    			echo'Role:';
    			echo $myrow["role"];
    			echo '<br>';
    			echo'Login:<br>';
    			echo'<input type="text" name="login" id="log" value='.htmlspecialchars($myrow["login"]).'><br>';
    			echo '<br>';
    			echo'First name:<br>';
    			echo'<input type="text" name="fname" id="fname" value='.htmlspecialchars($myrow["fname"]).'><br>';
    			echo '<br>';
    			echo'Last name:<br>';
    			echo'<input type="text" name="lname" id=\"sname" value='.htmlspecialchars($myrow["lname"]).'><br>';
    			echo '<br>';
    			echo'Password:<br>';
    			echo'<input type="password" name="password" id="pass" value='.htmlspecialchars($myrow["password"]).'><br>';
  			  echo'<h3><input type="submit" value="Save"></h3>';
          echo'</form>';
          echo '<form method="POST" action="getphoto.php?id='.$myrow["id"].'" enctype="multipart/form-data">';
          echo '<h2><input type="file" name="myimage"></h2>';
          echo '<h4><input type="submit" name="submit_image" value="Upload"></h4>';
          echo '</form>';
          echo '<h1><img src= "fetch_photo.php?id='.$myrow["id"]. '"width="400" height="250"></h1>';
    			echo'<br>';
        }
        else{
        echo'Role:';
        echo $myrow["role"];
        echo '<br>';
  			echo'Login:<br>';
  			echo $myrow["login"].'<br>';
  			echo '<br>';
  			echo'Name:<br>';
  			echo $myrow["fname"].'<br>';
  			echo '<br>';
  			echo'Surname:<br>';
  			echo $myrow["lname"].'<br>';
  			echo '<br>';
        echo '<h1><img src= "fetch_photo.php?id='.$myrow["id"]. '"width="400" height="250"></h1>';
      }
  		}
  	}
  }
  ?>

  <form>
  <input type="button" value="Main page" onClick='location.href="http://localhost/laba-one-kenobi/table.php"'>
  </form>

  </body>
  </html>
