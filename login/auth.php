<?php
  /* AUTHOR: poke19962008 */

  include_once('config.php');

  $mail = $_GET['email'];
  $pwd = md5($_GET['pwd']."ALS52KAO09");

  function authUser(){
    $query = $GLOBALS["db"]->prepare("SELECT * FROM `User_Details` WHERE `Mail` = ? AND  `Password` = ?");
    $query->execute(array($GLOBALS["mail"], $GLOBALS["pwd"]));
    $query = $query->fetch(PDO::FETCH_ASSOC);

    if($query){ return 1; } else { return 0; }
  }

  if(isset($pwd, $mail)){
    if(authUser()){

      $query = $GLOBALS["db"]->prepare("SELECT `ID` FROM `User_Details` WHERE `Mail` = ? AND  `Password` = ?");
      $query->execute(array($GLOBALS["mail"], $GLOBALS["pwd"]));
      $LoginID = $query->fetch(PDO::FETCH_ASSOC)["ID"];

      echo json_encode(array("Success"=> True, "LoginID"=> $LoginID, "LoginPwd"=> $pwd));
    }else{
      echo json_encode(array("Success"=> False,"Message"=> "Wrong Email or Password."));
    }
  }else {
    echo json_encode(array("Success"=> False, "Message"=> "Parameters missing."));
  }
?>
