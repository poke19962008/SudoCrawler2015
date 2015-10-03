<?php
 /* AUTHOR: poke19962008 */

  //ERROR CODES:
  //1: ID and Password do not match in setRank.php
  //2: Cannot connect with the DB
  //3: Wrong Answer
  //5: Error getting answer from DB
  //6: Cheating

  //DB configs
  include("config.php");

  // PARAMS: ID, Password[md5], Answer  as 'GET' request
  //Get user ID and password from cookies
  //HEADER: setRank.php?ID=<...>&userPwd=<...>&ans=<...>
  //1 index structure
  //SALT: ~$sudorm-rf$~
  $ID = $_GET['ID'];
  $userPwd = $_GET['userPwd'];
  $ans = $_GET['ans'];
  $Level = -1;

  //GLOBAL Properties
  //TODO: TEST
  $TSdiff = 300; //Seconds
  $salt = "~\$sudorm-rf\$~";

  function authUser(){
    $query = $GLOBALS["db"]->prepare("SELECT * FROM `User_Details` WHERE `ID` = ? AND  `Password` = ?");
    $query->execute(array($GLOBALS["ID"], $GLOBALS["userPwd"]));
    $query = $query->fetch(PDO::FETCH_ASSOC);

    if($query){ return 1; }else{ return 0;}
  }

  function authAns(){
    $query = $GLOBALS["db"]->prepare("SELECT `Answer` FROM `Question_Bank` WHERE `Level` = ?");
    $query->execute(array($GLOBALS["Level"]));
    $query = $query->fetch(PDO::FETCH_ASSOC);

    if($query){
      if($query['Answer'] === $GLOBALS["ans"]){ return 1;} else { return 0; }
    }

    if(!$query){ echo json_encode(array("Error"=>5, "Message"=>"Backend Problem. Try Again!", "Success"=>False)); }
  }

  function setRank($timeStamp){
    $query = $GLOBALS["db"]->prepare("SELECT MAX(`Rank`) FROM `User_Details` WHERE `Level` = ?");
    $query->execute(array(intval($GLOBALS["Level"]) + 1));
    $newRank = $query->fetch(PDO::FETCH_ASSOC)["MAX(`Rank`)"];

    $query = $GLOBALS["db"]->prepare("SELECT `Rank` FROM `User_Details` WHERE `ID` = ?");
    $query->execute(array( $GLOBALS['ID'] ));
    $oldRank = $query->fetch(PDO::FETCH_ASSOC)["Rank"];
    if(is_null($newRank)){
      $query = $GLOBALS["db"]->prepare("UPDATE `User_Details` SET `Level` = ?, `Rank` = ? WHERE `ID` = ?");
      $query->execute(array(intval($GLOBALS['Level'])+1, "1", $GLOBALS["ID"]));
    }else{
      $query = $GLOBALS["db"]->prepare("UPDATE `User_Details` SET `Level` = ?, `Rank` = ? WHERE `ID` = ?");
      $query->execute(array(intval($GLOBALS['Level'])+1, intval($newRank)+1, $GLOBALS["ID"]));
    }

    $query = $GLOBALS["db"]->prepare("SELECT `ID` FROM `User_Details` WHERE `Rank` > ? AND `Level` = ?");
    $query->execute(array($oldRank, $GLOBALS["Level"]));
    $users  = $query->fetchAll(PDO::FETCH_ASSOC);

    if($GLOBALS['Level'] ==! '0'){
      for ($i=0; $i < count($users); $i++) {
        $query = $GLOBALS['db']->prepare("UPDATE `User_Details` SET `Rank` = `Rank`-1 WHERE `ID` = ?");
        $query->execute(array($users[$i]['ID']));
      }
    }
  }

  function setTimeStamp($timeStamp){
    $query = $GLOBALS["db"]->prepare("UPDATE `User_Details` SET `TimeStamp` = ? WHERE `ID` = ?");
    $query->execute(array($timeStamp, $GLOBALS["ID"]));
  }

  function ifCheat($TSnew){
    $query = $GLOBALS["db"]->prepare("SELECT `TimeStamp` FROM `User_Details` WHERE `ID` = ?");
    $query->execute(array($GLOBALS["ID"]));
    $TSold = $query->fetch(PDO::FETCH_ASSOC)['TimeStamp'];

    if($TSnew - $TSold < $GLOBALS['TSdiff']){
      $query = $GLOBALS['db']->prepare("INSERT INTO `Cheat_Users` SET `ID` = ?,`LevelOld` = ? ,`IP` = ?, `TSnew` = ?, `TSold` = ?");
      $query->execute(array($GLOBALS['ID'], $GLOBALS['Level'], $_SERVER['REMOTE_ADDR'], $TSnew, $TSold));
    }
    
  }

  //TODO: crypt the DB also
  $ans = crypt($ans, $salt);

  if(authUser()){
    $query = $db->prepare("SELECT `Level` FROM `User_Details` WHERE `ID` = ?");
    $query->execute(array($ID));
    $Level = $query->fetch(PDO::FETCH_ASSOC)['Level'];

    if(authAns()){
      $timeStamp = new DateTime();

        ifCheat($timeStamp->getTimeStamp());
        setTimeStamp($timeStamp->getTimeStamp());
        setRank($timeStamp->getTimeStamp());
        echo json_encode(array("Message"=>"Hooray!!", "Success"=>True));
      

    }else{ echo json_encode(array("Error"=>2, "Message"=>"Wrong Answer.", "Success"=>False)); }
  }else{ echo json_encode(array("Error"=>1, "Message"=>"Is it really u?", "Success"=>False));
	}
?>