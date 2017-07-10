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
  $conn = mysqli_connect("localhost", "root", "devansh2497","library");
    if (!$conn) 
      die("Connection failed: " . mysqli_connect_error());
  include 'header.php';
 ?>
	<head>
    <link rel='shortcut icon' type='image/ico' href='favicon.ico'>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
		<h3 style="text-align:center;color:#fff"> Delete a book!</h3>
	</head>
	<body>
		<div class='cover'></div>
		<div class='loginBox'>
		 <form method="post"  id="form" >
		 	<select name="ids" class="select">
		 		<?php
		 		   $res=mysqli_query($conn,"SELECT * from book");
                    while($row=mysqli_fetch_assoc($res))
                     {
                     	$id=$row['id'];
                     	echo '<option class="backg" value="'.$id.'">'.$id.'</option>';
                     }
		 		  ?>
		 	</select>
		 		
		 	<input type="number" placeholder="no. of copies" name="copies">
		 	<input type="button" value="Submit" onclick="send('book_del1.php')">
		 			 </form>
		 			</div>
	</body>
	  <p>
	  	<div class='goBack'>
           <input type="button" id="go" value="Go Back!" onclick="back()">
       </div>
</html>