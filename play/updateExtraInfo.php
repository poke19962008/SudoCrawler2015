<?php
/* AUTHOR: poke19962008 */

  /***
    -1: If not Registered.
    0: nonIET
    1: IET

    HEADER: updateIETcol.php?ID=<...>&userPwd=<...>&isIET=<...>&college=<...>&degree=<...>&year=<...>&tel=<...>&IETid=<...>
  */

  include('config.php');

 // Compulsory
  $ID = $_GET['ID'];
  $userPwd = $_GET['userPwd'];
  $isIET = $_GET['isIET'];

// Not Compulsory
  $college = $_GET['college'];
  $degree = $_GET['degree'];
  $year = $_GET['year'];
  $tel = $_GET['tel'];
  $IETid = $_GET['IETid'];

  function authUser(){
    $query = $GLOBALS["db"]->prepare("SELECT * FROM `User_Details` WHERE `ID` = ? AND  `Password` = ?");
    $query->execute(array($GLOBALS["ID"], $GLOBALS["userPwd"]));
    $query = $query->fetch(PDO::FETCH_ASSOC);

    if($query){ return 1; }
    if(!$query){
      echo json_encode(array("Message"=>"Is it really u?", "Success"=>False));
      return 0;
    }
  }

  if(isset($ID, $userPwd, $isIET)){
    if(authUser()){
      $query = $db->prepare("SELECT `IET` FROM `User_Details` WHERE `ID`=?");
      $query->execute(array($ID));
      $data = $query->fetch(PDO::FETCH_ASSOC)['IET'];

      if($data !== '0'){
        $query = $db->prepare("UPDATE `User_Details` SET `IET`=?, `College`=?, `Degree`=?, `Year`=?, `Tel`=?, `IETid`=? WHERE `ID`=?");
        $query = $query->execute(array($isIET, $college, $degree, $year, $tel, $IETid, $ID));
        echo json_encode(array("Success"=> true));
      }else {
        echo json_encode(array("Message"=>"Already Registered.", "Success"=>false));
      }
    }
  }else {
    echo json_encode(array("Message"=> "Login again.", "Success"=> false));
  }
  ?>
