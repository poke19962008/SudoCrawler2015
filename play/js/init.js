/*AUTHOR: poke19962008*/

$(document).ready( function() {
  $(".dropdown-button").dropdown();
  $(".button-collapse").sideNav();

  $("#IETradio , #nonIETradio").val(0);
  $("#IETidDiv").css("display", "none");

  $("#AnswerInp").val("");
});

function getValue(cookie, value){
  for (var i = 0; i < cookie.length; i++) {
    var data = cookie[i].split("=");
    if(data[0] == value){
      return data[1];
    }
  }
}

$("#logout").click( function() {
  document.cookie = "LoginID=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  document.cookie = "LoginPwd=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  console.log("Cookies Deleted.");

// Redirect to Login Page
  window.location.href = "../login";
});

var prevInp = "";
$("#InputBtn").click( function() {
  var pattern = new RegExp(/([A-Z$`~!@#%^&*()_\-+=\[\]\{\}\\\|:;'"?>,<])+/);
  var inp = $("#AnswerInp").val();
  var same = false;

  if(prevInp == inp){ same=true; }else{ same=false; prevInp=inp; }

  if(same){
    Materialize.toast("Try something new.", 3000);

  }
  else if(pattern.test(inp)){
    Materialize.toast("Woops! Use lower case only.", 3000);
    $("#AnswerInp").val("");}
  else {
    var data_cookie = document.cookie.split("; ");
    console.log(getValue(data_cookie, "LoginID"));
    console.log(getValue(data_cookie, "LoginPwd"));
    $.ajax({
      method: "GET",
      cache: false,
      url: "auth.php",
      data: {"ID": getValue(data_cookie, "LoginID") , "userPwd": getValue(data_cookie, "LoginPwd"), "ans": inp },
      dataType: "json",
    })
    .done(function (msg) {
      Materialize.toast(msg["Message"], 3000);
      if(msg["Success"]){
        setTimeout(function() {
          location.reload();
        }, 100);
      }
    })
    .fail(function() {
      Materialize.toast("Online? o_O", 3000);
    });
  }
});

$("#IETradio").click(function () {
  if($("#nonIETradio").val()){
    $("#nonIETradio").prop('checked', false);

    $("#IETradio").val(1);
    $("#nonIETradio").val(0);

    $("#IETidDiv").css("display", "block");
  }
});

$("#nonIETradio").click(function () {
  if($("#IETradio").val()){
    $("#IETradio").prop('checked', false);

    $("#nonIETradio").val(1);
    $("#IETradio").val(0);

    $("#IETidDiv").css("display", "none");
  }
});

$("#postIET").click(function () {
  var isIET = $("#IETradio").val();
  var notIET = $("#nonIETradio").val();

  var college = $("#college").val();
  var dept = $("#dept").val();
  var year = $("#year").val();
  var tel = $("#tel").val();
  var IETid = $("#IETid").val();

//TODO: Apply regex on the filled text boxes.

  if((isIET == 1 || notIET == 1) && (college != "") ){
    var data_cookie = document.cookie.split("; ");

    $.ajax({
      method: "GET",
      url: "updateExtraInfo.php",
      data: {
          "ID": getValue(data_cookie, "LoginID"),
          "userPwd": getValue(data_cookie, "LoginPwd"),
          "isIET": isIET,
          "college": college,
          "degree": dept,
          "year": year,
          "tel": tel,
          "IETid": IETid,
            },
      cache: false,
      dataType: "json",
    })
    .done( function (msg) {
      if(msg["Success"]){
        location.reload();
      }else{
        Materialize.toast(msg["Message"], 3000);
      }
    })
    .fail(function () {
      Materialize.toast("Online? o_O", 3000);
    });
  }else{
    Materialize.toast("Oops! Form incomplete.", 3000);
  }
});