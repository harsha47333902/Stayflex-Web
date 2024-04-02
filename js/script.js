$("#bt_register").click(function(){
  signup();
});

function signup(){

     if(!$("#regusername").val()){
          alert("Please enter username.")
          return false;
     }

     if(!isEmail($("#reguseremail").val())){
          alert("Please enter correct email.")
          return false;
     }

     // if(!isEmail($("#regmobile").val())){
     //      alert("Please enter mobile number.")
     //      return false;
     // }

     if(!matchPassword($("#regpassword").val(),$("#regcpassword").val())){
          alert("Entered password did not match.")
          return false;
     }

     var data_frm = new FormData($("form#register")[0]);
     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    alert(details["message"]);
                    window.location.replace("login.php");

               } else {
                    alert(details["message"]);
               }
          },
          error: function() {
               alert("E1: Signup Error.");
               return false;
          }
     });
}


function user_logout(){
}

function logout(){
     sessionStorage.removeItem('user_login_status');
     window.location.replace("logout.php");
}

$("#bt_login").click(function(){
  login();
});

function login(){



     if(!isEmail($("#email").val())){
          alert("Please enter correct email.")
          return false;
     }

     if(!$("#password").val()){
          alert("Please enter password.")
          return false;
     }

  var data_frm = new FormData($("form#login")[0]);
  $.ajax({
       url: "api/common.php",
       type: "POST",
       data: data_frm,
       processData: false,
       contentType: false,
       success: function(data) {
            var details = JSON.parse(data);

            if (details["status"] == "200") {
                  alert(details["message"]);
                  window.location.replace("index.php");

            } else {
                 alert(details["message"]);
            }
       },
       error: function() {
            alert("E2: Login Error.");
            return false;
       }
  });
}

function isEmail(email) {
     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     return regex.test(email);
}

function matchPassword(password, confirm_password) {  
     if(password != confirm_password)  
     {   
       return false;  
     } else {  
       return true;  
     }  
}  


function fetchdetails(roomid,roomimg,roomtype,roomprice)
{

     $("#room_img").attr("src", "photo/"+roomimg);
     $("#room_type").text(roomtype);
     $("#room_price").text(roomprice);
     $("#room_id").val(roomid);
     $('#myModal').modal('toggle');

}

$("#bt_book_room").click(function(){
     book_room();
});
   
function book_room(){



     var data_frm = new FormData($("form#book")[0]);
     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    alert(details["message"]);
                    window.location.replace("status.php");

               } else {
                    alert(details["message"]);
               }
          },
          error: function() {
               alert("E1: Signup Error.");
               return false;
          }
     });
}
