/* AUTHOR: poke19962008 */

$(document).ready( function() {
  $(".dropdown-button").dropdown();
  $(".button-collapse").sideNav();
});

$("#logout").click( function() {
  document.cookie = "LoginID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "LoginPwd=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  console.log("Cookies Deleted.");

// Redirect to Login Page
  window.location.href = "../login";
});
