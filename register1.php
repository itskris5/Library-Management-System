<?php 
session_start();
if(isset($_SESSION["user"]) || isset($_SESSION["authuser"]))
{
  header("Location: book_menu.php");
  exit();
}
include 'header.php';
?>
<style type="text/css">
</style>
<head><link rel='shortcut icon' type='image/ico' href='favicon.ico'><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
  <link rel="stylesheet" type="text/css" href="login.css">
	<h2 style="text-align:center;color:#fff">Register with us now!</h2>
</head>
<body>
  <div class='cover'></div>
  <div class='loginBox'>
        <form method="post" action="register.php">
           <input type="text" placeholder="name" name="name">
           <input type="text" placeholder="email" name="email">
           <input type="password" placeholder="password" name="password">
           <input type="button">
          </form>
        </div>
    <?php
    if(isset($_SESSION["emptyfields"]))
      echo '<script>alert("Empty Fields")</script>';
    if(isset($_SESSION["emailtaken"]))
      echo '<script>alert("Account already exists")</script>';
    unset($_SESSION["emailtaken"]);
    unset($_SESSION["emptyfields"]);
    ?>
</body>
</html>