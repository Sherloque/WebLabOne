<?php
    session_start();
if (isset($_POST['login']))
{
  $login = $_POST['login'];
  if ($login == '')
  {
    unset($login);
  }
}
    if (isset($_POST['password']))
    {
      $password=$_POST['password'];
      if ($password =='')
      {
        unset($password);
      }
    }

if (empty($login) or empty($password))
    {
    exit ("There are empty fields left, proceed to enter meaningless symbols");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    include ("bd.php");

$result = mysqli_query($db,"SELECT * FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    exit ("Sorry, password field is empty *LAUGHS*" );
    }
    else {
    if ($myrow['password']==$password) {
    $_SESSION['login']=$myrow['login'];
    $_SESSION['id']=$myrow['id'];
    $_SESSION['role']=$myrow['role'];
    echo "You finally succeeded, looser! <a href='profile.html'>There is a reserved table for lonely people like you</a>";
    header('Location: http://localhost/laba-one-kenobi/table.php');
    }
 else {

    exit ("Sorry,something is wrong.");
    }
    }
    ?>
