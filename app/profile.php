<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@534&family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">

  
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  .sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #0D5C75;
  overflow-x: hidden;
  padding-top: 20px;
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
  height: 66px;
  margin-top: 20px;
  margin-right: 55px;
  position: relative;
  width: 500px;*/
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
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
<body style="background-color: white;">
  <nav class="navbar navbar-expand-lg  navbar fixed-top " style="background: #199FB1">
    <div class="container">
  <a href ="home.php" class="navbar-brand"  >
  <!---- code for date and day !---->
    <?php
    date('w'); 
    if(date('w') == 1){
    echo "monday ";
    }
    if(date('w') == 2){
    echo "Tuesday ";
    }
    if(date('w') == 3){
    echo "Wednesday ";
    }
    if(date('w') == 4){
    echo "Thursday ";
    }
    if(date('w') == 5){
    echo "Friday ";
    }
    if(date('w') == 6){
    echo "Saturday ";
    }

    if(date('w') == 0){
    echo "Sunday ";
    }
    $date = date('d-m-Y');
    echo "$date";


  ?>



    <span  class="sr-only">Saving. Hang tight!</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"></ul></div>
    <div>
    <ul class="nav navbar-nav navbar-right">
      
      <li class="nav-item">
        <a href="home.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Log out</a>
      </li>
      
    </ul>
    </div></div>
  </div>
</nav>
<div class="sidenav">
  <a href="#"></a><br>
  <a href="index.php"><i class="fa fa-check fa-3x" aria-hidden="true"></i></a>
  <a href="calendar/calendar.php"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a>
  <a href="achievements/ach.php"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></a>
  <a href="#contact"><i class="fa fa-user fa-3x" aria-hidden="true"></i></i></a>
  <a href="#contact"><i class="fa fa-ellipsis-h fa-3x" aria-hidden="true"></i></a>

</div>
<p></p><br>
<h2 style="padding-left: 300px;">Hi!! Ready for another productive day?</h2>
<p></p><br>
<p></p><br>
<p></p>
<p></p>
<p></p>
<p></p>
<h3 style=" padding-left: 350px; text-align: bottom; padding-right: 300px;" id="myQuote"></h3>
<!---Javascript code for generation new quotes whenever the user refreshes the page!--->
<script type="text/javascript">
  var myQuotes = new Array();
  myQuotes[0] = "Start where you are. Use what you have. Do what you can. - Arthur Ashe";
  myQuotes[1] = "Setting goals is the first step in turning the invisible into visible.- Tony Robbins/";
  myQuotes[2] = "If a mind thinks with a believing attitude, one can do amazing things.- Normen vincent";
  myQuotes[3] = "Your goal should be just out of reach. But not out of sight.-Remi Witt";
  myQuotes[4] = "If you are not where you want to be, do not quit, Instead reinvent yourself and change your habits.- Eric Thomas";
  myQuotes[5] = "The journey of a thousand miles begins with one step.- Lao Tzu";
  myQuotes[6] = "Not knowing you can’t do something is sometimes all it takes to do it.-Ally Carter";
  myQuotes[7] = "We are what we repeatedly do. Excellence, therefore, is not an act. But a habit.-Aristotle";
  myQuotes[8] = "The most common way people give up their power is by thinking they don’t have any.-Alice Walker";
  myQuotes[9] = "Abandon anything about your life and habits that might be holding you back. Learn to create your own opportunities - Sophia Amoruso";
  myQuotes[10] = "You will never change your life until you change something you do daily. The secret of your success is found in your daily routine.-John C Maxwell";
  myQuotes[11] = "Define success on your own terms, achieve it by your own rules, and build a life you’re proud to live. -Anne Sweeney";
  myQuotes[12] = "You can do anything, but not everything. Prioritize better.-Aristotle";
  myQuotes[13] = "A creative man is motivated by the desire to achieve, not by the desire to beat others. -Ayn Rand.";
  myQuotes[14] = "The most effective way to do it, is to do it.- Amelia Earhart";
  myQuotes[15] = "Start where you are. Use what you have. Do what you can. -Arthur Ashe";
  myQuotes[16] = "Continuous improvement is better than delayed perfection.-Mark Twain";
  myQuotes[17] = "How you climb a mountain is more important than reaching the top.-Yvon Chouinard";
  myQuotes[18] = "Do the best you can until you know better. Then when you know better, do better.-Maya Angelou";
  myQuotes[19] = "Live, love, laugh, leave a legacy.-Stephen Covey";
  myQuotes[20] = "Always deliver more than expected.-Larry Page";
  myQuotes[21] = " In every day, there are 1,440 minutes. That means we have 1,440 daily opportunities to make a positive impact.- Les Brown";
  myQuotes[22] = "To succeed in your mission, you must have single-minded devotion to your goal.-A. P. J. Abdul Kalam";

  var myRandom = Math.floor(Math.random()*myQuotes.length);
  $('#myQuote').html(myQuotes[myRandom]);

</script></body></html>