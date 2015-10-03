<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SudoCrawler: An Intelligent Quest " />
	<meta name="keywords" content="Inquisitive Quest , Intelligent Quest , Quiz , Cryptic Hunt , " />
	<meta name="author" content="Sayan Das" />
  <link rel="shortcut icon" type="img/ico" href="img/favico.ico">
  <title>Login: SudoCrawler</title>


  <!-- CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" />

</head>

<body>
  <header>
    <nav>
      <div class="nav-wrapper" style="background-color: #1976d2;">
        <a href="../" class="brand-logo center" style="color:white;">Sudo Crawler</a>
      </div>
    </nav>
  </header>

  <main>

    <div class="container">
      <div class="row" id="card-row">
         <div class="col s12 m7 l5" id="login-card">

           <div class="card center" id="card" style="background-color: #4791DB">
             <div class="card-content white-text">
               <span class="card-title" style="font-size: 30px;">Login</span>

             </div>

              <div class="row" style="margin-left: 35px;">

                <div class="input-field col s11 m6 l10" >
                   <i class="material-icons prefix">email</i>
                   <input id="email" type="email" class="validate">
                   <label for="email" data-error="wrong" data-success="right">Email</label>
                 </div>

                 <div class="input-field col s11 m6 l10" style="margin-top: 20px;">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password">
                    <label for="password">Password</label>
                  </div>

              </div>

             <div class="card-action">
               <a href="#" id="login-btn">Login</a>
               <a href="../register.php">Register</a>

               <br>
               <a href="#" style="font-size: 12px; color: lightgrey;" class="modal-trigger" id="helpdesk">Forgot Password?</a>

              <!-- Modal Structure -->
              <div id="modal1" class="modal">
                 <div class="modal-content">
                   <h5>If you have forgotten your password, e-mail us using your registered e-mail address and we'll get back to you!</h5>
                   <p>helpdesk@sudocrawler.com</p>
                 </div>
                 <div class="modal-footer">
                   <a href="mailto:helpdesk@sudocrawler.com" class="waves-effect waves-green btn-flat">Mail Us</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                 </div>
               </div>

             </div>
           </div>

         </div>
       </div>
    </div>
  </main>

  <footer class="page-footer blue darken-1 pin-bottom">
    <div class="footer-copyright">
      <div class="container">
      <center><span style="font-weight: bold;"> © SudoCrawler 2015</span> - Developed by Team Sudo Crawler. </center>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/init.js"></script>

</body>

</html>