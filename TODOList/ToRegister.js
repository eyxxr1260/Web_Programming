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
        if(VALUE=="No repeat account"){
          alert("Registrations completed!");
        }
        else{
          alert("This account has already exsited.");
        }
        history.back();
      }
    }); 
}