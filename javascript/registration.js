  //user registration
  $(document).ready(function()
  {
  $("button").click(function()
  {
      var data = $("#myform").serialize();
      $.ajax({
        type: "POST",
        url: "../php/registration.php",
        data: data,
        async: false,
        success: function(resp)
        {
          if(resp == "ok")
          {
            alert("Success, click OK and go to login");
            window.history.pushState("", "", "http://localhost/chat/html/login.html");
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
  

      










































// $(document).ready(function(){

// $("button").click(function(){

//     var data = $("#myform").serialize();
//     $.ajax({
//       type: "POST",
//       url: "../php/registration.php",
//       data: data,
//       success: function(resp){
//         if(resp != "nok"){

//         alert("Success, click OK and go to login");
//         location.replace('http://localhost/chat/html/login.html');
        
//         } 

//         else{

//           alert("Try again");
          
//         }
//     }
  

//     });

//   }); 

// });
    