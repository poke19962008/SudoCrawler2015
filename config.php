<?php
/* AUTHOR: poke19962008 */
  $user="";
  $pass="";
  $hostname = "";

function testdb_connect ($hostname, $user, $pass){
$db = new PDO("mysql:host=$hostname;dbname=", $user, $pass);
    return $db;
}

try {
    $db = testdb_connect ($hostname, $user, $pass);

} catch(PDOException $e) {

}

?>
