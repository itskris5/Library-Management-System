<?php
session_start();
if(!(isset($_SESSION["authuser"])) && !(isset($_SESSION["user"])))
  {$_SESSION["notlogged"]=1;
      header("Location: index.php");
      exit();
  }
  elseif (!(isset($_SESSION["authuser"])))
  {
        header("Location: user_menu.php");
  }
$conn = mysqli_connect("localhost", "root", "devansh2497","library");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$name=$_POST["name"];
$author=$_POST["author"];
$cop=$_POST["copies"];
if(empty($name) || empty($author) || empty($cop))
{
 echo "Empty Fields";
  exit();
}
$res=mysqli_query($conn,"SELECT * from book WHERE name='$name' AND author='$author'");
$rows=mysqli_num_rows($res);
if($rows==0)
{
	$res=mysqli_query($conn,"INSERT INTO book VALUES (NULL,'$name','$author','$cop','$cop')");
	if(!$res)
		exit("Error Encountered: Connection Problem");
}
else
{
    while($row=mysqli_fetch_assoc($res))
    	{$prevcop=$row['no_of_copies'];$stack=$row['stack'];}
    $prevcop+=$cop;
    $stack+=$cop;
    $res=mysqli_query($conn,"UPDATE book SET no_of_copies='$prevcop', stack='$stack' WHERE name='$name' AND author='$author'");
    if(!$res)
    	exit("Error Encountered: Connection Problem");
   
}
 echo "Success!";
?>