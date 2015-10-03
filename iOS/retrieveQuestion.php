<?
/* AUTHOR: poke19962008 */
	mysql_connect("localhost", "root");
	@mysql_select_db("sudo_crawler") or die("Not Able to connect");

	$query = "SELECT * FROM Question_Bank WHERE Level = '" . $_GET['Level'] . "'";
	$tuple = mysql_query($query);

	$data = array();
	while ($row = mysql_fetch_object($tuple)) {
		array_push($data, $row);
		unset($row);
	}

	echo json_encode($data);
?>
