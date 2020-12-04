<?php

  $username = $_GET["userid"];
  $conn = mysqli_connect("localhost:3306","root", "", "todo");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
$stmt = $conn->prepare("SELECT user_login FROM users WHERE user_id = ?  ");
    $stmt->bind_param("s", $_GET["userid"]);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row1 = $result1->fetch_assoc();
   
?>



<?php
session_start();
/*$username = $_GET["id"];
  $conn = mysqli_connect("localhost:3306","root", "", "todo");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
$stmt = $conn->prepare("SELECT user_login FROM users WHERE user_id = ?  ");
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row1 = $result1->fetch_assoc();*/
?>
<!--_________________________________________________________________________________________________-->
<!DOCTYPE html>
<html>
  <head>
    <title>Calendar</title>
    <link href="calendar.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@534&family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="calendar.js" ></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style type="text/css">
  .whitecolor{
    color: white;
  }

  .sidenav {
  height: 100%;
  width: 120px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #0D5C75;
  overflow-x: hidden;
  padding-top: 20px;
  color: #ffffff;
  }
  
  .sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  }
  
  .sidenav a:hover{
  color: #199FB1;
  background-color: #A5D1E1;
  /*display: inline-block;
  height: 70px;
  margin-top: 20px;
  margin-right: 55px;
  position: relative;
  width: 500px;*/
  }
  
  .main {
  margin-left: 120px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 130px 10px;
  margin-left:122px;
  margin-top: 25px;
  }
  
  @media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  }
  
  h2{
  color: #199FB1;
  }

  h3{
  color: #199FB1;
  font-family: 'Dancing Script', cursive;
  font-family: 'Sansita Swashed', cursive;
  position: relative;
  bottom:0;
  text-shadow: 2px 2px #A5D1E1;
  }
  </style>
  </head>
  
  <body>
     <nav class="navbar navbar-expand-lg  navbar fixed-top " style="background: #0D5C75; padding-left: 120px;margin-top: 0;padding-top: 0;padding-right: 0">
      <a href ="../home.php" class="navbar-brand">
        <div class="container">
        <?php
        date('w'); 
        $date = date('d-m-Y');
        if(date('w') == 1){
        echo "<p class='whitecolor'>Monday, ".$date."</p>";
        }
        if(date('w') == 2){
        echo "<p class='whitecolor'>Tuesday ".$date."</p>";
        }
        if(date('w') == 3){
        echo "<p class='whitecolor'>Wednesday ".$date."</p>";
        }
        if(date('w') == 4){
        echo "<p class='whitecolor'>Thursday ".$date."</p>";
        }
        if(date('w') == 5){
        echo "<p class='whitecolor'>Friday ".$date."</p>";
        }
        if(date('w') == 6){
        echo "<p class='whitecolor'>Saturday ".$date."</p>";
        }
        if(date('w') == 0){
        echo "<p class='whitecolor'>Sunday ".$date."</p>";
        }
       
      ?>
      <span  class="sr-only">Saving.</span></a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
      </div>
        <div>
        <ul class="nav navbar-nav navbar-right">
          
          <li class="nav-item" style=" list-style-type: none;">
            <a href="../home.php" style="color: #ffffff"><i class="fa fa-user-plus" aria-hidden="true" ></i> Log out</a>
          </li>
          
        </ul>
        </div>
      </div>  
      </nav>

    <div id="cal-wrap">
      <!-- [PERIOD SELECTOR] -->
      <div id="cal-date">
        <select id="cal-mth"></select>
        <select id="cal-yr"></select>
        <input id="cal-set" type="button" value="SET"/>
      </div>

      <!-- [CALENDAR] -->
      <div id="cal-container"></div>

      <!-- [EVENT] -->
      <div id="cal-event"></div>
    </div>
    <!--body style="background-color: white;"-->
      <div class="sidenav">
      <a href="#"></a><br>
      <a href="../index.php"><i class="fa fa-check fa-3x" aria-hidden="true"></i></a>
      <!--<a href="calendar/calendar.php?id=<?=$username?>"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a>
      <a href="../achievements/ach.php?id=<?=$username?>"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></a>-->
      <a href="calendar.php?id=<?=$username?>"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a>
      <a href="../achievements/ach.php?id=<?=$username?>"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></a>
      <a href="../profile.php"><i class="fa fa-user fa-3x" aria-hidden="true"></i></i></a>
      <a href="#contact"><i class="fa fa-ellipsis-h fa-3x" aria-hidden="true"></i></a>
      </div>
      
  </body>
</html>