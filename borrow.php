<?php
session_start();
include 'header.php';
if(!isset($_SESSION["user"]) && !isset($_SESSION["authuser"]))
{
	$_SESSION["notlogged"]=1;
      header("Location: index.php");
      exit();
}
?>
   <head>
    <link rel='shortcut icon' type='image/ico' href='favicon.ico'>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
   	<h2 style="text-align:center;color:#fff">Borrow a book from the library</h2>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="goback.css">
   </head>
   <style type="text/css">
   #go{
  width: 330px;
  height: 45px;
  background: #fff;
  border: 1px solid #fff;
  cursor: pointer;
  border-radius: 2px;
  color: #a18d6c;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 6px;
  margin-top: 10px;
}
#go{
  opacity: 0.8;
}

#go:hover{
  opacity: 0.6;
}

#go:focus{
  outline: none;
}</style>
   <body>
    <div class='cover'></div>
    <div class='loginBox'>
   	  <form method="post" id="form">
   	  	<input type="number" <?php if(isset($_GET['id'])) echo 'value="'.$_GET['id'].'"'; else echo 'placeholder="book id"';?> name="id"><br>
        <input type="password" placeholder="password" name="password">
        <input type="button" value="Submit" name="button" onclick="send('borrow1.php')">
   	  </form>
    </div>
    </div><div class='goBack'>
    <input type="button" id="go" value="Go Back!" <?php if(isset($_GET['id'])) echo 'onclick="back2()"'; else echo 'onclick="back()"';?>>
  </div>
  <script type="text/javascript" src="ajax.js"></script>
   </body>
   </html>