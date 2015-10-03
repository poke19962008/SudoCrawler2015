/*AUTHOR: poke19962008*/

$(document).ready( function() {
  $(".dropdown-button").dropdown();
  $(".button-collapse").sideNav();

  $.ajax({
    method: "GET",
    url: "getRank.php",
    data: {},
    cache: false,
    dataType: "json",
  })

  .done( function (msg) {
    $("#loadingDiv").css("visibility", "hidden");
    $("#table").css("visibility", "visible");
    var len = msg.length;

    for(i=0;i<len ;i++){
      // console.log(msg["Rank"]);
      if(msg[i]["Rank"] == -1){
        var data = "<tr> <td>"+ msg[i]["ID"] + "</td> <td>"+ msg[i]["Level"] +"</td> <td>-INF-</td> </tr>"
        $("#tableData").append(data);
      }else{
        var data = "<tr> <td>"+ msg[i]["ID"] + "</td> <td>"+ msg[i]["Level"] +"</td> <td>"+ msg[i]["Rank"] +"</td> </tr>"
        $("#tableData").append(data);
      }
    }
  });
});

$("#logout").click( function() {
  document.cookie = "LoginID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "LoginPwd=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  console.log("Cookies Deleted.");

// Redirect to Login Page
  window.location.href = "../login";
});