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
$id=$_POST["id"];
$name=$_POST["name"];
$author=$_POST["author"];
$cop=$_POST["copies"];
if(empty($name) || empty($author) || empty($cop))
{
 echo "Empty fields";
  exit();
}
$res=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from book WHERE id='$id'"));
$prevcop=$res['no_of_copies'];
$stack=$res['stack'];
if($cop<0)
{
	echo "Copies cannot be less than zero!";
	exit();
}
elseif ($cop>$prevcop) 
	$stack+=$cop-$prevcop;
elseif($prevcop>$cop)
    $stack-=$prevcop-$cop;
$res=mysqli_query($conn,"UPDATE book SET name='$name',author='$author',no_of_copies='$cop',stack='$stack' WHERE id='$id'");
if(!$res)
{
	echo "Error Encountered: Connection Problems";
	exit();
}
echo "Success!";
exit();
?>
