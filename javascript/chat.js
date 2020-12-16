    //Get messages without refresh page
    $(document).ready(function()
    {
        var interval = setInterval(function()
        {
            $.ajax({
                url : "../php/chat.php",
                success: function(data){
                    $('#messages').html(data);
                }
            });

        },1000);
    });
    
    //Send message 
    $("button").click(function()
    {
        var data = $("#myform").serialize();

        $.ajax({
        type: "POST",
        url: "../php/chat.php",
        data: data,
        async: false,
        success: function(resp){
            //alert(resp);
        }
        });

    //add permission to chat for user    
    document.getElementById("message").value = "";
    });

    $("#add-btn").click(function()
    {

        var data = $("#add").serialize();

        $.ajax({
          type: "POST",
          url: "../php/add_user.php",
          data: data,
          async: false,
          success: function(resp)
          {
            if(resp == "ok")
            {
                alert("user is add");
            }
            else
            {
                alert("Error, try again");
            }
          }
        });
    });



    // delete permission to chat for users
    $("#delete-btn").click(function()
    {
        var data = $("#delete").serialize();

        $.ajax({
          type: "POST",
          url: "../php/delete_user.php",
          data: data,
          async: false,
          success: function(resp){
            if(resp == "ok")
            {
                alert("user is deleted");
            }
            else
            {
                alert("Error, try again");
            }
          }
        });
    });


    //check if the user has permission for chat
    $(document).ready(function()
    {
        $.ajax({
            type: "GET",
            url: "../php/allow.php",
            success: function(resp)
            {
                if(resp == "ok")
                {
                    document.getElementById("chat").style.visibility = "visible";
                    document.getElementById("messages").style.visibility = "visible";
                }
                else
                {
                    document.getElementById("permission").style.visibility = "visible";
                   
                }
            }
        });
    });

