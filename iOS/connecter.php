<?
/* AUTHOR: poke19962008 */
	include("config.php");

	$ID = $_GET["ID"];

	$query = $db->prepare("SELECT * FROM `iOS_User_Details_Test` WHERE `ID` = ?");
	$query->execute(array($_GET['ID']));
	$data = $query->fetch(PDO::FETCH_ASSOC);

	if($data){
		echo json_encode($data);
	}

?>
