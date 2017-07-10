<?php
session_start();
if(isset($_SESSION["user"]) || isset($_SESSION["authuser"]))
{
	header("Location: logout.php");
}
?>
<style>
@media(min-width: 1301px){
	form{
		margin-left: 30px;
	}
}
.grid-container{
	padding-top: 150px;
	text-align: center;
	font-family: 'Raleway';
	font-size: 32px;
	background-color: #f1f1f1;
}
.grid{
       width: 100%;
}
@media(min-width: 700px) and (max-width: 1300px){
    .col{
    	width: 30%;
    }
}
.col{
	display: inline-block;
	padding: 60px;
}
.wrapper{
	padding-bottom: 250px;
}
hr{
	margin:10;
	width: 15%;
	display: inline-block;
}
.icon{
	padding-top: 20px;
}
{
	-webkit-transition:0.8s;
	transition:0.8s;
}
</style>
<head><link rel='shortcut icon' type='image/ico' href='favicon.ico'>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<link rel="stylesheet" type="text/css" href="login.css"></head>
<body>
	<div class='wrapper'>
		<div class='cover'></div>
		<?php include 'header.php';?>
	<div class="loginBox">
     <p></p>
	<form action = "welcome.php" method="post" >
		<input type="text" placeholder="email" name="username">
		<input type="password" placeholder="password" name="password"><br>
		<input type="submit" name="button" value="Login">
	</form>
	<a href="#grid" id="link"><i class="fa fa-arrow-down" style="font-size:28px"></i></a>
	<p></p>
	</div>
</div>
	<div class="grid-container" >
		<strong>Welcome to the Library</strong>
		<div class='icon'>
			<hr>
			<i class="fa fa-book" style="font-size:28px"></i>
			<hr>
		</div>
		<p>
			See Our Best Rated Books
		</P>
			<div class="grid" id ="grid">
		<div class="col">
              <img src="download.jpg">
		</div>
		<div class="col">
              <img src="d2.jpg">
		</div>
		<div class="col">
              <img src="d3.jpg">
		</div>
		<div class="col">
              <img src="d4.jpg">
		</div>
	</div>
	</div>
	<script> var aax_size='728x90'; var aax_pubname = 'thelib044-21'; var aax_src='302';</script>
		<script src="http://c.amazon-adsystem.com/aax2/assoc.js"></script>
</body>
<script type="text/javascript">
$("#link").click(function(event){
    event.preventDefault();
    $("html, body").animate({scrollTop: $(this).offset().top +400},2600	);
});
</script>
<?php
if(isset($_SESSION["check"]))
echo '<script>alert("Incorrect Username or Password")</script>';
unset($_SESSION["check"]);
if(isset($_SESSION["notlogged"]))
echo '<script>alert("Error Encountered: You are not logged in")</script>';
unset($_SESSION["notlogged"]);
?>
</html>