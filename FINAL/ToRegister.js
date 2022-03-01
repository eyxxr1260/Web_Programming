function ToRegister() {
  var PW = $("#PW").val();
  var User = $("#User").val();
  $.ajax({
    url: "register.php",
    data: {
      User:User,
      PW:PW
    },
    type: "POST",
    datatype: "html",
    success: function( VALUE ) {
      switch(VALUE){
        case "No repeat account":
          alert("Registrations completed!");
          break;
        default:
          alert("This account has already exsited.");
      }
      location.href='login.html';
    }
  }); 
}