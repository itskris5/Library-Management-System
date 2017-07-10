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

$conn = mysqli_connect("localhost", "root", "devansh2497","library");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
 ?>
	<head>
		<link rel='shortcut icon' type='image/ico' href='favicon.ico'>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet" type="text/css" href="goback.css">
		<h3 style="text-align:center">Edit a book!</h3>
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
}
	</style>
	<body>
		<div class='cover'></div>
		<div class='loginBox'>
		 <form method="post" id="form">
		 	Book Id:
		  <?php 
		  echo $_GET['id'];$id=$_GET['id'];
		 $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from book where id='$id'"));
		 	?><br>
		 	<input type="hidden" value="<?php echo $id;?>" name="id">
		 	<input type="text"  placeholder="book name"name="name" value="<?php echo $row['name'];?>">
		 	<input type="text" placeholder="author" name="author" value="<?php echo $row['author'];?>">
		 	<input type="number" placeholder="no. of copies" name="copies" value="<?php echo $row['no_of_copies'];?>"><br>
		    <input type="button" value="Submit" onclick="send()">
		 			 </form>
		 			</div>
		</p>
		<div class='goBack'>
          <input type="button" id="go" value="Go Back!" onclick="back1()">
      </div>
	</body>
</html>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript">
         function send()
         {
             $.post("edit1.php",$("#form").serialize(),function(data) {alert(data);});
         }
      </script>