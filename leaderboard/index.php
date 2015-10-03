<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>LeaderBoard: SudoCrawler</title>

    <!-- Meta tags -->
        <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="SudoCrawler: An Intelligent Quest " />
  	<meta name="keywords" content="Inquisitive Quest , Intelligent Quest , Quiz , Cryptic Hunt , " />
  	<meta name="author" content="Sayan Das" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favico.ico" type="image/x-icon">

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <header>
	   <nav>
		<div class="nav-wrapper" style="background-color: #1976d2;">
			<a href="#" data-activates="mobile-side-nav" class="button-collapse"><i class="material-icons">menu</i></a>
			<a href="http://sudocrawler.com/" class="brand-logo center" style="color:white;">Sudo Crawler</a>

			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="../winners" style="color:white;">Winners</a></li>
				<li class="active"><a href="#" style="color: white;">Leader Board</a></li>
				<li><a href="../aboutus" style="color: white;">About Us</a></li>
			</ul>

			<!-- Mobile Support -->
			<ul class="side-nav" id="mobile-side-nav">
				<li><a href="../winners" style="color:white;">Winners</a></li>
				<li class="active"><a href="#" style="color: white;">Leader Board</a></li>
				<li><a href="../aboutus" style="color: white;">About Us</a></li>
			</ul>
		</div>
	</nav>
    </header>

  <main>
    <div class="container">
        <div id="loadingDiv" style="">
        <img src="img/loader.gif" alt="" />
      </div>

<!-- Top 50 label -->
<div class="row">
        <div class="col hide-on-small-only l4" style="margin-right: 35px;"></div>

        <div id="LevelDiv" class="card-panel col s12 m9 l3 blue darken-1" >
          <center>
            <span class="flow-text grey-text text-lighten-4" style="font-size: 25px;">Top 50</span>
          </center>
        </div>
  </div>

<!-- Table -->
<div class="row" style="margin-top: 15px;">
      <table class="responsive-table highlight centered striped" style="visibility: hidden;" id="table">
        <thead>
          <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Level</th>
              <th data-field="price">Rank</th>
          </tr>
        </thead>

        <tbody id="tableData">
          <!-- Data goes here -->
        </tbody>
      </table>
</div>



    </div>
  </main>

  <footer class="hide-on-small-only page-footer blue darken-1 pin-bottom">
    <div class="footer-copyright">
      <div class="container">
      		<center><span style="font-weight: bold;"> © SudoCrawler 2015</span> - Developed by Team Sudo Crawler. </center>
      </div>
    </div>
  </footer>
<script>

  			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');



 			 ga('create', 'UA-66389154-1', 'auto');

  			ga('send', 'pageview');



		</script>


  <!-- Scripts -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/init.js"></script>
</body>
</html>