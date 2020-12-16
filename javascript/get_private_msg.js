//get private message without refresh page
$(document).ready(function()
{
    var interval = setInterval(function()
    {
        $.ajax({
              type: "GET",
            url : "../php/get_private_msg.php",
            success: function(data)
            {
                $('#messages').html(data);
            }
        });

    },1000);
});