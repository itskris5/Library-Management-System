<?php
session_start();
if(!isset($_SESSION["user"]) && !isset($_SESSION["authuser"]))
{
      $_SESSION["notlogged"]=1;
      header("Location: index.php");
      exit();
}
$conn = mysqli_connect("localhost", "root", "devansh2497","library");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$id=$_POST["id"];
$pass=$_POST["password"];
$c=mysqli_query($conn,"SELECT * from user WHERE password='$pass'");
if(mysqli_num_rows($c)==0)
{
	echo "Wrong password";
	exit();
}
$row=mysqli_fetch_assoc($c);
$uid=$row['id'];
$res=mysqli_query($conn,"SELECT * from book WHERE id='$id'");
if(mysqli_num_rows($res)==0)
{
	echo "Wrong id";
	exit();
}
$res2=(mysqli_query($conn,"SELECT * from transaction WHERE book_id='$id' AND user_id='$uid'"));
if(mysqli_num_rows($res2)==1)
{
	echo "You cannot issue more than one copy";
	exit();
}
while($row2=mysqli_fetch_assoc($res))
$onstack=$row2['stack'];
if($onstack==0)
{
	echo "No copies of this book available on stack";
	exit();
}
$onstack-=1;
$res=mysqli_query($conn,"UPDATE book SET stack='$onstack' WHERE id='$id'");
if(!$res)
	exit("Error Encountered: Connection Problems");
$iss=$row['books_issued'];
$iss+=1;
if($iss>4)
{
	echo "You cannot issue more than 4 books!";
	exit();
}
$res2=mysqli_query($conn,"UPDATE user SET books_issued='$iss' WHERE id='$uid'");
if(!$res2)
	exit("Error Encountered: Connection Problems");
$res=mysqli_query($conn,"INSERT into transaction VALUES('$uid','$id')");
echo "Success!";
exit();
?>
