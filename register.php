<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>SudoCrawler Registration</title>

		<link rel="shortcut icon" href="img/favico.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/registerstyle.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />

	</head>

	<body>
	
		<div class="se-pre-con"></div>
		<div class="container">
		<div class="grid_1 main"><a class="headin" href="index.html">SudoCrawler</a></div><br />

				<form id="form_" action="success.php" method="POST">
					<center>

						<?php if($_GET){
						   if($_GET['error'] === '1'){?>
							<div id="notify">
								<div class="alert alert-warning alert-dismissible" role="alert" >
		       		 				   <span id="alert-title"><strong>Oops! :</strong></span> <span id="alert-body">Username or Email is already exist.</span>
		           					</div>
							</div>
						<?php }
						 if($_GET['error'] === '2'){?>
							<div id="notify">
								<div class="alert alert-warning alert-dismissible" role="alert" >
		       		 				   <span id="alert-title"><strong>Oops! :</strong></span> <span id="alert-body">Seems you forgot to enter captcha.</span>
		           					</div>
							</div>
				<?php }} ?>

						<div class="grid_5">
							<input type="text" name="name" id="name" class="input" onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off"/>
							<label for="name" class="label">Full Name</label>
							<span class="error" id="ferror"></span>
						</div>

						<div class="grid_5">
							<input type="text" name="mail" id="mail" class="input" onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off"/>
							<label for="mail" class="label">Email</label>
							<span class="error" id="emailerror"></span>
						</div>

	          <div class="grid_5">
							<input type="password" name="password" id="password" class="input" onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off"/>
							<label for="password" class="label">Password</label>
	            <span class="error" id="passworderror"></span>
						</div>

						<div class="grid_5">
							<input type="text" name="username" id="username" class="input" onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off"/>
							<label for="username" class="label">Username</label>
							<span class="error" id="usererror"></span>
						</div>

	          <div class="grid_5">
							<input type="password" name="confpassword" id="confpassword" class="input" onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off"/>
							<label for="confpassword" class="label">Confirm Password</label>
							<span class="error" id="confpassworderror"></span>
						</div>

						<div class="grid_5">
							<br>Here by I accept all the terms and conditions.
						</div>

						<div class="g-recaptcha" data-sitekey="6Ld2TQsTAAAAAFYfjM518Vw84S63k_ctiY1cu0TI"></div>

						<div class="grid_1"><input type="submit" value="Submit" id="submit"/></div>
					<!--	<span class="signup_link"><a href="index.html">Already have account? Login Here.</a></span>  -->

					</center>
				</form>
		</div>

		<div class="footer">
			<center style="color: White;"><strong>Contact us: </strong><a href="mailto:helpdesk@sudocrawler.com">helpdesk@sudocrawler.com</a></center>
		</div>

		<!-- JS files -->
			<script type="text/javascript" src="js/classie.js"></script>
			<script type="text/javascript" src="js/jquery-ui.js"></script>
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/registerscript.js"></script>
			<script type="text/javascript" src="js/registervalidate.js"></script>
			<script src='https://www.google.com/recaptcha/api.js'></script>

 		<!-- Google Analytics-->
		<script>
  			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 			 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 			 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  			ga('create', 'UA-66389154-1', 'auto');
  			ga('send', 'pageview');

		</script>

	</body>
</html>