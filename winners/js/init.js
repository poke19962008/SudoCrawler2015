/* AUTHOR: poke19962008*/

$(document).ready( function () {

});

$("#submit_btn").click( function () {

  var first_name = $("#fName").val();
  var last_name = $("#lName").val();
  var email = $("#email").val();
  var tel = $("#tel").val();
  var feedback = $("#feedbox").val();

  if( first_name == "" ||
      last_name == "" ||
      email == "" ||
      tel == "" ||
      feedback == ""
  ){ Materialize.toast("Incomplete Form", 3000); }
  else{
    $.ajax({
      method: "GET",
      url: "send_form_email.php",
      data: {
        "first_name": first_name,
        "last_name": last_name,
        "email": email,
        "telephone": tel,
        "comments" : feedback,
      },
      dataType: "json",
    })
    .done( function (msg) {
      if(msg["Success"]){
        Materialize.toast("Thank You for your feedback", 3000);

        $("#fName").val("");
        $("#lName").val("");
        $("#email").val("");
        $("#tel").val("");
        $("#feedbox").val("");
      }else{
        Materialize.toast(msg["Error"], 3000);
      }
    });
  }

});
