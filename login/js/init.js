$(document).ready(function () {

});

$("#login-btn").click( function () {
  var isValidMail = $('.validate').attr('class').split(" ")[1];
  var pwd = $("#password").val();

  if(isValidMail == "valid" && pwd != ""){
    var mail = $("#email").val();

    $.ajax({
      method: "GET",
      cache: false,
      url: "auth.php",
      data: {
        "email": mail,
        "pwd": pwd,
      },
      dataType: "json",
    })
    .done(function (msg) {
      if(msg["Success"]){
        document.cookie = "LoginID="+msg["LoginID"] + "; expires=Thu, 18 Dec 2015 12:00:00 UTC; path=/";
        document.cookie = "LoginPwd="+ msg["LoginPwd"] + "; expires=Thu, 18 Dec 2015 12:00:00 UTC; path=/";

        document.cookie = "_ga=; expires=Thu, 18 Dec 2001 12:00:00 UTC; path=/";
        document.cookie = "color=; expires=Thu, 18 Dec 2001 12:00:00 UTC; path=/";

        window.location.href = "../play";
      }else{
        Materialize.toast(msg["Message"], 3000);
      }
    })
    .fail(function() {
      Materialize.toast("Online? o_O", 3000);
    });

  }else if(isValidMail == "invalid"){
    Materialize.toast("Enter Valid Email ID", 3000);
  } if(pwd == ""){
    Materialize.toast("Enter valid password", 3000);
  }
});

$("#helpdesk").click( function () {
  $('#modal1').openModal();
});

$("#logout").click( function() {
  document.cookie = "LoginID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "LoginPwd=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  console.log("Cookies Deleted.");

// Redirect to Login Page
  window.location.href = "../login";
});
