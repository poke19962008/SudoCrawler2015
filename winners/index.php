<!DOCTYPE html>
<html>
<head>
	<title>Winners</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SudoCrawler: An Intelligent Quest " />
	<meta name="keywords" content="Inquisitive Quest , Intelligent Quest , Quiz , Cryptic Hunt , " />
	<meta name="author" content="Sayan Das" />
       <link rel="shortcut icon" type="img/favico.ico" href="img/favico.ico">


         <!-- CSS -->
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
         <link href="css/style.css" rel="stylesheet">
  

	<style type="text/css">
	  .colori{
	    background-color: #1976d2 !important;
	  }
	  .asd{

	  }
	</style>
</head>

<body>

	<nav>
		<div class="nav-wrapper" style="background-color: #1976d2;">
			<a href="#" data-activates="mobile-side-nav" class="button-collapse"><i class="material-icons">menu</i></a>
			<a href="http://sudocrawler.com/" class="brand-logo center" style="color:white;">Sudo Crawler</a>

			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li class="active"><a href="#" style="color:white;">Winners</a></li>
				<li><a href="../leaderboard" style="color: white;">Leader Board</a></li>
				<li><a href="../aboutus" style="color: white;">About Us</a></li>
			</ul>

			<!-- Mobile Support -->
			<ul class="side-nav" id="mobile-side-nav">
				<li class="active"><a href="#" >Winners</a></li>
				<li  class="active"><a href="../leaderboard" >Leader Board</a></li>
				<li><a href="../aboutus" style="color: white;">About Us</a></li>
			</ul>
		</div>
	</nav>

  <div class="container">
    <br>

		<div class="row">
			<h4 class="center">Winners</h4>
			<table class="centered striped">
				<thead>
					<tr>
							<th data-field="id">Name</th>
							<th data-field="name">ID</th>
							<th data-field="price">Rank</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>Sonam Gairola</td>
						<td>Sonamg5</td>
						<td>1</td>
					</tr>

					<tr>
						<td>Mandeep Singh Kundu</td>
						<td>Mandeep</td>
						<td>2</td>
					</tr>

					<tr>
						<td>Deepanshu Tyagi</td>
						<td>deeptg</td>
						<td>3</td>
					</tr>
				</tbody>
			</table>
		</div>

    <br><br>

    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h4 class="center-align">Feedback Form</h4>
            <div class="row">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="fName" name="first_name" type="text" class="validate">
                            <label for="fName">First Name</label>
                        </div>
                        <div class="input-field col m6 s12">
                           <i class="material-icons prefix">account_circle</i>
                           <input id="lName" type="text" class="validate">
                           <label for="lName">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class="mdi-content-mail prefix"></i>
                            <input id="email" type="email" class="validate" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col m6 s12">
                           <i class="material-icons prefix">phone</i>
                           <input id="tel" type="tel" class="validate">
                           <label for="tel">Telephone</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">mode_edit</i>
                          <textarea id="feedbox" class="materialize-textarea"></textarea>
                          <label for="feedbox">Your valuable feedback</label>
                        </div>
                    </div>

                    <div style="text-align:center">
	                    <button class="colori btn btn-large waves-effect waves-light" type="button" name="action" id="submit_btn"><i class="material-icons right">send</i>Send Message</button></p>
											<!-- <input type="submit" value="Submit"> -->
									  </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>

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
