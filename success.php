<html>
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="SudoCrawler: An Intelligent Quest " />
  	<meta name="keywords" content="Inquisitive Quest , Intelligent Quest , Quiz , Cryptic Hunt , " />
  	<meta name="author" content="Sayan Das" />
    
		<title>Sudo Crawler</title>

		<link rel="stylesheet" type="text/css" href="css/OpenSan.css" />
		<style type = "text/css">
			html, body {
				height: 100%;
				width: 100%;
				padding: 0;
				margin: 0;
				font-family: 'Open Sans', sans-serif;
				text-align: center;
			}
			.vertical {
				position: relative;
				top: 50%;
				transform: translateY(-50%);
				-webkit-transform: translateY(-50%);
			}
			.name {
				text-align: center;
				font-size: 300%;
			}
			.location {
				text-align: center;
				font-size: 150%;
				margin-top: 2%;
				font-weight: 300;
			}
		</style>
  </head>

	<body>
		<?php
			include("config.php");

			$name = $_POST['name'];
			$email = $_POST['mail'];
			$username = $_POST['username'];
			$password = md5($_POST['password']."ALS52KAO09");
			$confpassword = md5($_POST['confpassword']."ALS52KAO09");

      //Google reCAPTCHA
      if(isset($_POST['g-recaptcha-response'])){
        $secret = "6Ld2TQsTAAAAAGUR8kqqz6EHjvd1RQVI0s0e2H52";
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];

        $url_auth = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
        $data = json_decode(file_get_contents($url_auth));

	if($data->{'success'} === false ){

		header("Location: http://sudocrawler.webarchsrm.com/register.php?error=2");
		die();

        }
      }

			if(isset($name, $email, $username, $password, $confpassword)){
				$query=$db->prepare("SELECT * FROM User_Details WHERE ID =? OR Mail = ?");
			 	 $query->execute(array( $username, $email));
                                 $data = $query->fetchAll(PDO::FETCH_ASSOC);
					if(!$data){
						$query =$db->prepare("INSERT INTO User_Details SET Name = ?, Mail = ?, ID = ?, Password = ?");
						$query = $query->execute(array( $name, $email, $username, $password ));
						if($query){
						header("Location: http://sudocrawler.webarchsrm.com/login");
						}
					}else{
						header('Location: http://sudocrawler.webarchsrm.com/register.php?error=1');
						die();
					}
				}
		?>
	</body>
</html
