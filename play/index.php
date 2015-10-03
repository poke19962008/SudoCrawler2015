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


  <!-- CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" />

</head>

<body>
  <header>
    <?php
      include_once("config.php");

      function authUser(){
        $query = $GLOBALS["db"]->prepare("SELECT * FROM `User_Details` WHERE `ID` = ? AND  `Password` = ?");
        $query->execute(array($_COOKIE['LoginID'], $_COOKIE['LoginPwd']));
        $query = $query->fetch(PDO::FETCH_ASSOC);

        if($query){ return 1; }
        if(!$query){
          //Redirect to Login Page
          header('Location: underConst.html');
          die();
        }
      }

      //Redirect to Login Page
      if(!isset($_COOKIE['LoginID'])){ header('Location: ../login'); die(); }

      if(authUser()){

        //Check for IET Member
        $query = $db->prepare("SELECT `IET` FROM `User_Details` WHERE `ID`=?");
        $query->execute(array($_COOKIE['LoginID']));
        $isIET = $query->fetch(PDO::FETCH_ASSOC)['IET'];



        //Get User Data
        $query = $db->prepare("SELECT `Level` FROM `User_Details` WHERE `ID` = ? AND `Password` = ?");
        $query->execute(array($_COOKIE['LoginID'], $_COOKIE['LoginPwd']));

        $Level = $query->fetch(PDO::FETCH_ASSOC)['Level'];
        $query = $db->prepare("SELECT `TitleTag`, `Question`, `Hint`, `SourceCode`, `Img` FROM `Question_Bank` WHERE `Level` = ?");
        $query->execute(array($Level));

        $data = $query->fetch(PDO::FETCH_ASSOC);
      }
    ?>

    <nav>
      <div class="nav-wrapper" style="background-color: #1976d2;">
        <a href="#" data-activates="mobile-side-nav" class="button-collapse"><i class="material-icons">menu</i></a>
        <a href="../" class="brand-logo center" style="color:white;">Sudo Crawler</a>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li class="active"><a href="#" style="color:white;">Play</a></li>
          <li><a href="../leaderboard" style="color: white;">Leader Board</a></li>
          <li><a href="../rules" style="color:white;">Rules</a></li>
          <li><a href="../aboutus" style="color:white;">About Us</a></li>
        </ul>

        <?php
          if(isset($_COOKIE['LoginID'])){ ?>
            <ul class="left hide-on-med-and-down">
              <li>
              <a class="dropdown-button" href="#!" data-activates="user-dropdown" id="username">
                <i class="material-icons left md-76">account_circle</i>
                 Bonjour! <span style="font-weight:bold;font-size:19px;" id="LoginID"><?php echo $_COOKIE['LoginID']; ?></span>
              </a>

              <ul id="user-dropdown" class="dropdown-content">
                <!-- Redirect to login page -->
                <li><a href="#!" id="logout" style="height: 65px;">Logout</a></li>
              </ul>

              </li>
            </ul>
        <?php
          }else {
            // Ridirect to Login Page
            header("Location: ../login");
            die();
          }
        ?>

        <!-- Mobile Support -->
        <ul class="side-nav" id="mobile-side-nav">
          <li><a href="underConst.html" >Play</a></li>
          <li  class="active"><a href="#" >Rules</a></li>
          <li><a href="underConst.html" >About Us</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <?php if($isIET !== "-1"){ ?>
    <!-- If regsitered for IET/nonIET -->
      <main>
        <div class="container">

          <!-- Title -->
          <?php
            if($data["TitleTag"] === "-NA-"){?>
              <title>Play</title>
          <?php }else{ ?>
              <title><?php echo $data['TitleTag']; ?></title>
          <?php } ?>

         
          <div class="row">
            <div class="col hide-on-small-only l4" style="margin-right: 35px;"></div>

            <div id="LevelDiv" class="card-panel col s12 m9 l3 blue darken-1" >
              <center>
                <span class="flow-text grey-text text-lighten-4" style="font-size: 25px;">Level: </span>
                <span class="flow-text grey-text text-lighten-4" style="font-size: 25px; font-weight: bold;"><?php echo $Level; ?></span>
              </center>
            </div>
          </div>

          
          <div class="row" id="QuestionHeadingRow">
            <div id="QuestionHeadingDiv" class="col s12 m10 l10">
              <span class="flow-text" id="QuestionHeading">
                <?php
                  echo $data["Question"];
                ?>
              </span>
            </div>
          </div>

          
          <?php
            if($data['Hint'] != "-NA-"){ ?>
              <div class="row" id="MainHintRow">
                <div id="MainHintDiv" class="col s12 m10 l10">
                  <span class="flow-text" id="MainHint">
                    <?php echo $data['Hint']; ?>
                  </span>
                </div>
              </div>
          <?php } ?>

         
          <?php
            if($data['Img'] != "-NA-" ) {?>
            <div class="row" id="ImageLevelRow">
              <div class="col hide-on-small-only m2 l3" style="margin-right: 30px;"></div>
              <div id="ImageDiv" class="col s12 m6 l5">
                <img id="Image" src= <?php echo $data['Img'] ?> alt="Image Question" />
              </div>
            </div>
          <?php } ?>

          
          <div class="row" id="InputRow">
            <div class="col hide-on-small-only m2 l3" style="margin-right: 30px;"></div>

            <!-- Input Field -->
            <div id="InputDiv" class="input-field col s12 m6 l4 ">
              <i class="material-icons prefix">input</i>
              <input id="AnswerInp" type="text">
              <label for="AnswerInp" >Answer</label>
            </div>

            
            <button class="btn waves-effect waves-light blue col s12 m3 l2" type="submit" id="InputBtn">Submit <i class="material-icons">send</i></button>

          </div>

          <?php
            if($data['SourceCode'] != "-NA-"){
              echo "<!-- " ,  $data['SourceCode'] , " -->";
            }
          ?>
        </div>
      </main>
  <?php }else{ ?>
    <!-- If not registered for IET/nonIET -->
    <main>
      <title>Play</title>
      <div class="container">

        <!-- Heading -->
        <div class="row" style="margin-top: 20px;">
          <div class="col hide-on-small-only m1 l3" style="margin-left: 40px;"></div>

          <div id="IETdiv" class="card-panel col s12 m9 l5 blue darken-1">
            <center> <span class="flow-text grey-text text-lighten-4">Just one more step.</span> </center>
          </div>
        </div>

        <!-- Text -->
        <div class="row" style="margin-top: 30px;">
          <div class="col hide-on-small-only m1 l2"></div>

          <div class="col s12 m10 l8" style="text-align: center;">
            <span class="flow-text">Are you an IET Member?<span style="color: red; font-size: 30px;"> *</span></span>

          </div>
        </div>

        <!-- Radio Btn -->
        <div class="row" style="margin-top: 10px;">
          <div class="col hide-on-small-only m3 l4" style="margin-right: 5px;"></div>

            <div class="col s12 m3 l2" style="text-align: center; margin-right: 0px;">
              <input name="IET" type="radio" id="IETradio" />
              <label for="IETradio"><span class="flow-text">Yes</span></label>
            </div>

            <div class="col s12 m3 l2" style="text-align: center; margin-right: 0px;">
              <input name="nonIET" type="radio" id="nonIETradio" />
              <label for="nonIETradio"><span class="flow-text" >No</span></label>
            </div>
        </div>

        <!-- Form Inputs -->
        <div class="row">
          <div class="input-field col s11 m12 l5" id="left_up">
            <i class="material-icons prefix"></i>
            <input id="college" type="text">
            <label for="college">College/Institute<span style="color: red; font-size: 25px;">*</span></label>
          </div>

          <div class="input-field col s11 m12 l5" id="right_up">
            <i class="material-icons prefix"></i>
            <input id="dept" type="text">
            <label for="dept">Department</label>
          </div>

          <div class="input-field col s11 m12 l5" id="left_down">
            <i class="material-icons prefix"></i>
            <input id="year" type="text">
            <label for="year">Year</label>
          </div>

          <div class="input-field col s11 m12 l5" id="right_down">
            <i class="material-icons prefix"></i>
            <input id="tel" type="text">
            <label for="tel">Contact No.</label>
          </div>

          <div class="hide-on-small-only col l3"></div>
          <div class="input-field col s12 m11 l6" id="IETidDiv">
            <i class="material-icons prefix"></i>
            <input id="IETid" type="text">
            <label for="IETid">IET Member ID</label>
          </div>

        </div>

        <!-- Submit btn -->
        <div class="row"style="margin-top: 30px;">
          <div class="col hide-on-small-only m5 l5" style="margin-left:2px;"></div>

          <button class="btn waves-effect waves-light blue lighten-1 col s12 m3 l2" type="button" id="postIET">Submit</button>
        </div>
        
      </div>
    </main>
  <?php } ?>

  <script>

  			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');



 			 ga('create', 'UA-66389154-1', 'auto');

  			ga('send', 'pageview');



		</script>



  <!--  Scripts -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/init.js"></script>

</body>
</html>