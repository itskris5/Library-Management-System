
         function send(link)
         {
             $.post(link,$("#form").serialize(),function(data) {alert(data);});
         }
         function back()
         {
            $(".tbl-header").css({"display":"none"});
            $(".tbl-content").css({"display":"none"});
            $("#go").css({"display":"none"});
         	$(".loginBox").css({"display":"none"});
           $(".container1").css({"display":"block"});
            $(".container2").css({"display":"block"});
         }
         function back1()
         {
            window.location.href="book_menu.php";
         }
         function back2()
         {
            window.location.href="user_menu.php";
         }