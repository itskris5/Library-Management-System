<?php
session_start();include 'header.php';
if(!isset($_SESSION["user"]) && !isset($_SESSION["authuser"]))
{
	$_SESSION["notlogged"]=1;
      header("Location: index.php");
      exit();
}
?>
<style type="text/css">
</style>
     <head>
       <link rel='shortcut icon' type='image/ico' href='favicon.ico'>
       <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
       <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       <meta name="HandheldFriendly" content="true">
       <link rel="stylesheet" type="text/css" href="menu.css">
       <link rel="stylesheet" type="text/css" href="login.css">
       <link rel="stylesheet" type="text/css" href="goback.css">
       <link rel="stylesheet" type="text/css" href="table.css">
          <div class='a'>
     	          <h2 style="text-align:center;color:#fff">Menu for the User!</h2>
          </div>
     	</head>
      <div class="cssload-thecube">
  <div class="cssload-cube cssload-c1"></div>
  <div class="cssload-cube cssload-c2"></div>
  <div class="cssload-cube cssload-c4"></div>
  <div class="cssload-cube cssload-c3"></div>
</div>
        <style type="text/css">
  .select{
  width: 330px;
  height: 40px;
  background: transparent;
  border: 1px solid rgba(255,255,255,0.6);
  border-radius: 2px;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 22px;
  font-weight: 400;
  padding: 4px;
   }
   .select:focus{
    outline: none;
  border: 1px solid rgba(255,255,255,0.9);
   }
.backg{
  background-color: #d39686;
  color: #fff;
}
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
          <div class='container1'>
          <div class='menu-item'>
     	<a href="borrow.php" id="borr"><i class='fa fa-plus' style="font-size:64px"></i></a>
     </div><div class='menu-item'>
     	<a href="book_view.php" id="view"><i class='fa fa-book' style="font-size:64px"></i></a>
     </div><div class='menu-item'>
     	<a href="return.php" id="ret"><i class='fa fa-minus' style="font-size:64px"></i></a>
     </div></div><div class='container2'><div class='menu-item2'>
          <a href="stat.php" id="prof"><i class='fa fa-user' style="font-size:64px"></i></a>
     </div>
     <div class='menu-item2'>
          <a href="transaction.php" id="trans"><i class='fa fa-list' style="font-size:64px"></i></a>
     </div>
     </div>
     <?php
     if(isset($_SESSION["nobooks"]))
          echo '<script>alert("You have no books to return")</script>';
     unset($_SESSION["nobooks"]);
     if(isset($_SESSION["nobook"]))
          echo '<script>alert("You have not borrowed any books!")</script>';
     unset($_SESSION["nobook"]);
     ?>
     <div class='borr'></div>
     <div class='view'></div>
     <div class='ret'></div>
     <div class='prof'></div>
     <div class='trans'></div>
     <div class='gob'></div>
    <script type="text/javascript">
    $("#borr").click(function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".borr").load("borrow.php .loginBox");
       $(".gob").load("borrow.php .goBack");
       $(".gob").css({"display":"block"});
      });
      $("#view").click(function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".view").load("book_view.php .tbl-header,.tbl-content");
       $(".gob").load("book_view.php .goBack");
       $(".gob").css({"display":"block"});
      });
      $("#prof").click(function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".prof").load("stat.php .tbl-header,.tbl-content");
       $(".gob").load("stat.php .goBack");
       $(".gob").css({"display":"block"});
      });
      $("#ret").bind('click',function()
      {
        $.get("check.php",function(data) {alert(data);});
      });
      $("#ret").bind('click',function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".ret").load("return.php .loginBox");
       $(".gob").load("return.php .goBack");
       $(".gob").css({"display":"block"});
      });
      $("#trans").bind('click',function()
      {
        $.get("check1.php",function(data) {alert(data);});
      });
      $("#trans").bind('click',function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".trans").load("transaction.php .tbl-header,.tbl-content");
       $(".gob").load("transaction.php .goBack");
       $(".gob").css({"display":"block"});
      });
    </script>
    <script type="text/javascript" src="ajax.js"></script>
     </body>
     </html>