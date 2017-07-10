<?php
session_start();
include 'header.php';
if(isset($_SESSION["user"]) || isset($_SESSION["authuser"]))
{
  header("Location: book_menu.php");
  exit();
}
$username="root";
$password="devansh2497";
$servername="localhost";
$dbname="library";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
	die("Connection Failed: ").mysqli_connect_error();
$name=$_POST["name"];
if($name=="root")
$_SESSION["emailtaken"]=1;
$email=$_POST["email"];
$pass=$_POST["password"];
if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]))
{
	$_SESSION["emptyfields"]=1;
	header("Location: register1.php");
	exit();
}
$sql="INSERT into user VALUES (NULL,'$name','$email','$pass',0)";
$res=mysqli_query($conn,$sql);
if(!$res)
   {
   	$_SESSION["emailtaken"]=1;
   	header("Location: register1.php");
   	exit();
   }
   ?>
   <div class='cover'></div>
  <div id='a' style="text-align:center	">
   <?php
echo "Welcome to our library ".$_POST["name"];
$result=mysqli_query($conn,"SELECT * from user WHERE email='$email'");
 while($row = mysqli_fetch_assoc($result))
 {
 	echo "<br><strong> Your User Id no. is: ".$row["id"]."</strong>";
	$_SESSION["user"]=2;
	$_SESSION["username"]=$_POST["name"];
	$_SESSION["password"]=$_POST["password"];
	echo "<br>Go to the User Menu!<br><a href=\"user_menu.php\">Click here for the User Menu</a>";
 }
 ?></div><?php
 echo "</html>";
 mysqli_close($conn);
?>