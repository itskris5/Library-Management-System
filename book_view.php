<?php
session_start();
include 'header.php';
if(!(isset($_SESSION["authuser"])) && !(isset($_SESSION["user"])))
  {
      $_SESSION["notlogged"]=1;
      header("Location: index.php");
      exit();
  }
	 $conn=mysqli_connect("localhost","root","devansh2497","library");
	 if(!$conn)
	      die("Connection Error: ").mysqli_connect_error();
	  ?>
	<head><link rel='shortcut icon' type='image/ico' href='favicon.ico'>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
		<link rel="stylesheet" type="text/css" href="table.css">
		<link rel="stylesheet" type="text/css" href="goback.css">
		<h3 style="text-align:center;color:#fff"> View the books!</h3>
	</head>
	<style type="text/css">
	</style>
	<body>
		<div class='cover'></div>
		<div class='tbl-header'>
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th>Book Id</th>
				<th>Book Name</th>
				<th>Author</th>
				<th>No of Copies</th>
				<th>Currently in Stock</th>
				<th>Action</th>
			</tr>
		</table>
	</div>
	<div class='tbl-content'>
		<table cellpadding="0" cellspacing="0" border="0">
			<?php

			     $sql="SELECT * from book";
			     $res=mysqli_query($conn,$sql);
			     while($row=mysqli_fetch_assoc($res))
			        {
			        	echo "<tr>";
			        	echo "<td>".$row['id']."</td>";
			        	echo "<td>".$row['name']."</td>";
			        	echo "<td>".$row['author']."</td>";
			        	echo "<td>".$row['no_of_copies']."</td>";
			        	echo "<td>".$row['stack']."</td>";
			        	if(isset($_SESSION["authuser"]))
			        	echo '<td><a href="edit.php?id='.$row['id'].'" id="edit">Edit</a></td>';
			            else
			            echo '<td><a href="borrow.php?id='.$row['id'].'" id="borrow">Borrow</a></td>';
			        	echo "</tr>";
			        }
			     ?>
			 </table>
	</div>
	<div class='goBack'>
              <input type="button" id="go" value="Go Back!" onclick="back()">
	</div>
	</body>
</html>