<?php
/* AUTHOR: poke19962008*/
  if(isset($_GET['email'])) {

    $email_to = "poke19962008@gmail.com";
    $email_subject = "Your email subject line";

    function died($error) {
        echo json_encode(array("Error" => $error, "Success"=> false));
        die();
    }

    // validation expected data exists
    if(!isset($_GET['first_name']) ||!isset($_GET['last_name']) ||!isset($_GET['email']) ||!isset($_GET['telephone']) ||!isset($_GET['comments'])) {
        died('Incomplete Form.');
    }

    $first_name = $_GET['first_name']; // required
    $last_name = $_GET['last_name']; // required
    $email_from = $_GET['email']; // required
    $telephone = $_GET['telephone']; // not required
    $comments = $_GET['comments']; // required

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email_from)) {
      $error_message .= 'Not Valid Email';
    }

    $error_message = "";

    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$first_name)) {
      $error_message = 'Enter valid first name';
    }

    if(!preg_match($string_exp,$last_name)) {
      $error_message = 'Enter valid last name';
    }

    if(strlen($comments) < 2) {
      //TODO: err msg
      $error_message = '';
    }

    if(strlen($error_message) > 0) {
      died($error_message);
    }

    include_once("config.php");

    $query = $db->prepare("INSERT INTO `feedback` SET `First Name` = ? , `Last Name` = ?, `Email` = ? , `Tel` = ? , `Feedback` = ?");
    $query->execute(array($first_name, $last_name, $email_from, $telephone, $comments));

    echo json_encode(array("Success"=> true));
  }
?>
