<?php
session_start();
if(!(isset($_SESSION["authuser"])))
  {
      header("Location: user_menu.php");
  }
  elseif (!(isset($_SESSION["authuser"])) && !(isset($_SESSION["user"])))
  {
  	    $_SESSION["notlogged"]=1;
      header("Location: index.php");
      exit();
  }
  include 'header.php';
 ?>
 	<head><link rel='shortcut icon' type='image/ico' href='favicon.ico'><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true"><link rel="stylesheet" type="text/css" href="menu.css">
 		<h2 style="text-align:center;color:#fff"> Menu for the Librarian!</h2>
 	<link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" type="text/css" href="goback.css">
  <link rel="stylesheet" type="text/css" href="table.css">
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
      <div class="menu-item">
 			<a href="book_add.php" id="add"><i class="fa fa-plus" style="font-size:64px"></i></a>
      </div><div class="menu-item">
 			<a href="book_view.php" id="view"><i class="fa fa-book" style="font-size:64px"></i></a>
      </div><div class="menu-item">
 			<a href="book_del.php" id="del"><i class="fa fa-minus" style="font-size:64px"></i></a>
      </div></div><div class='container2'><div class="menu-item2">
 			<a href="view_user.php" id="user"><i class="fa fa-user" style="font-size:64px"></i></a>
    </div>
    <div class="menu-item2">
      <a href="transaction1.php" id="trans"><i class="fa fa-list" style="font-size:64px"></i></a>
    </div>
     </div>
     <div class='add'></div>
     <div class='view'></div>
     <div class='del'></div>
     <div class='user'></div>
     <div class='trans'></div>
     <div class='gob'></div>
    <script type="text/javascript">
    $("#add").click(function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".add").load("book_add.php .loginBox");
       $(".gob").load("book_add.php .goBack");
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
      $("#del").click(function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".del").load("book_del.php .loginBox");
       $(".gob").load("book_del.php .goBack");
       $(".gob").css({"display":"block"});
      });
      $("#user").click(function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".user").load("view_user.php .tbl-header,.tbl-content");
       $(".gob").load("view_user.php .goBack");
       $(".gob").css({"display":"block"});
      });
      $("#trans").click(function(e) 
      {e.preventDefault();
       $(".container2").css({"display":"none"});
       $(".container1").css({"display":"none"});
       $(".trans").load("transaction1.php .tbl-header,.tbl-content");
       $(".gob").load("book_add.php .goBack");
       $(".gob").css({"display":"block"});
      });
    </script>
    <script type="text/javascript" src="ajax.js"></script>
 	</body>
 </html>