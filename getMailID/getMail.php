<?php
/* AUTHER: poke19962008 */
	include_once('config.php');
	$query = $db->prepare("SELECT `Mail` FROM `User_Details`");
	$query->execute();
	$data = $query->fetchAll(PDO::FETCH_ASSOC);

	for($i=0; $i < count($data); $i++){
		echo $data[$i]["Mail"] . ", ";
	}

?>
