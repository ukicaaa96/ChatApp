
//user login
$(document).ready(function()
{
  $("#btn-login").click(function()
  {
    var data = $("#myform").serialize();
    
    $.ajax({
      type: "POST",
      url: "../php/login.php",
      data: data,
      async: false,
      success: function(resp)
      {
        if(resp == "ok")
        {
          alert("Success, click OK and go to chat room");
          window.history.pushState("", "", "http://localhost/chat/html/chat.html");
          window.location.reload();
        }
        else
        {
          alert("Try again");
        }  
       }
    });
  });
});








    