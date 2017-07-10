<?php
 include 'check.php';
?>
   <head><link rel='shortcut icon' type='image/ico' href='favicon.ico'>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
   	<h2 style="text-align:center;color:#fff">Return a book to the library</h2>
   </head>
   <body>
    <div class='cover'></div>
    <div class='loginBox'>
   	  <form method="post" id="form">
   	  	<select name='ids' class='select'>
          <?php
          if(isset($_GET["id"]))
            echo '<option value="'.$_GET["id"].'">'.$_GET["id"].'</option>';
          else
          {
          $query=mysqli_query($conn,"select * from transaction where user_id='$uid'");
          while($r=mysqli_fetch_assoc($query))
          {
            echo '<option value="'.$r['book_id'].'">'.$r['book_id'].'</option>';
          }
        }
          ?>
        </select>
        <input type="password" placeholder="password" name="password">
        <input type="button" value="Submit" onclick="send('return1.php')">
   	  </form>
    </div>
    <?php
    ob_flush();?>
    <div class='goBack'>
      <input type="button" id="go" value="Go Back!" onclick="back()">
    </div>
   </body>
   </html>