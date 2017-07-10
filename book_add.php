<?php
session_start();
if(!(isset($_SESSION["authuser"])) && !(isset($_SESSION["user"])))
  {
      $_SESSION["notlogged"]=1;
      header("Location: index.php");
      exit();
  }
  elseif (!(isset($_SESSION["authuser"])))
  {
  	    header("Location: user_menu.php");
  }
  include 'header.php';
 ?>
	<head><link rel='shortcut icon' type='image/ico' href='favicon.ico'>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
		<h3 style="text-align:center;color:#fff">
				Add a book!</h3>
	</head>
	<style type="text/css">
	#b{
		text-align: center;
	}
	</style>
	<body>
		<div class='cover'></div>
		<div class='loginBox'>
		 <form method="post" id="form">
		 	<input type="text" placeholder="book name" name="name">
		 	<input type="text" placeholder="author" name="author">
		 	<input type="number" placeholder="no. of copies" name="copies">
		    <input type="button" value="Submit" onclick="send('book_add1.php')">
			 </form>
			</div>
		<p>
		<div class='goBack'>
          <input type="button" id="go" value="Go Back!" onclick="back()">
      </div>
	</body>
</html>
