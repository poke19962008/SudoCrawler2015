<?php
/* AUTHOR: poke19962008 */

  include 'config.php';

  $query = $db->prepare("SELECT `Level`, `ID`, `Rank`  FROM `User_Details` WHERE `Level` != 0  ORDER BY `Level` DESC, `Rank` ASC LIMIT 50");
  $query->execute();
  $data = $query->fetchAll(PDO::FETCH_ASSOC);

  $rList = array();
  $len = count($data);
  $sameLevel = -1;
  $rankCounter = $len;

  $j=0;

  for($i=0; $i<$len; $i++){
      $rList[$j]["Rank"] = $j + 1;
      $rList[$j]["ID"] = $data[$i]["ID"];
      // $rList[$i]["Name"]= $data[$i]["Name"];
      $rList[$j]["Level"]= $data[$i]["Level"];

      $j++;
      $rankCounter --;
  
  }
  echo json_encode($rList);

?>