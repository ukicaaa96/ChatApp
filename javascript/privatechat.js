//require a conversation with a user in a private chat
$("#private-btn").click(function()
{
    var data = $("#private").serialize();

    $.ajax({
      type: "POST",
      url: "../php/open_private_chat.php",
      data: data,
      async: false,
      success: function(resp){
        if(resp == "ok")
        {
            alert("start conversation with users");
            window.history.pushState("", "", "http://localhost/chat/html/private_chat.html");
            window.location.reload();
        }
        else
        {
            alert("user not exist");
        }
      }
    });
});

//send private message
$("#private-msg").click(function()
{
    var data = $("#message").serialize();

    $.ajax({
      type: "POST",
      url: "../php/private_message.php",
      data: data,
      async: false,
      success: function(resp){
        //alert(resp);
      }
    });
  });
    