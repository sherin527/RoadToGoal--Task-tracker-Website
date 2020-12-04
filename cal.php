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





<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@534&family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">

  
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
  font-family: 'Optima';

 
}
h1{
  color: #199FB1;
  font-family: 'Optima';
  font-size: 70px;

}
#calendar{
    position:relative;
    height:10%;
    width:80%;
    
    top:20px;
    left:200px;

}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg  navbar fixed-top " style="background: #199FB1">
    <div class="container">
  <a href ="../home.php" class="navbar-brand"  >
  <!---- code for date and day !---->
    <?php
    date('w'); 
    if(date('w') == 1){
    echo "Monday ";
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
      <a href="index.php?userid=<?php echo $username; ?>"><i class="fa fa-check fa-3x" aria-hidden="true"></i></a>
      <a href="cal.php?userid=<?php echo $username; ?>"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a>
      <a href="achievements/ach.php?userid=<?php echo $username; ?>"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></a>
      <a href="profile.php?userid=<?php echo $username; ?>"><i class="fa fa-user fa-3x" aria-hidden="true"></i></i></a>
      <a href="#contact"><i class="fa fa-ellipsis-h fa-3x" aria-hidden="true"></i></a>
      </div>
      <div id="calendar"></div>
</body>
<!-- FullCalender.io -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
var calendar = $('#calendar').fullCalendar({
editable: true,
header: {
left: 'prev,next today',
center: 'title',
right: 'month,agendaWeek,agendaDay'
},
events: 'load.php',
selectable: true,
selectHelper: true,

select: function(start, end, allDay) {
var title = prompt("Enter Event Title");
if (title) {
var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
$.ajax({
url: "fullcalender.io/insert.php",
type: "POST",
data: {
title: title,
start: start,
end: end
},
success: function() {
calendar.fullCalendar('refetchEvents');
alert("Added Successfully");
}
})
}
},

editable: true,

eventResize: function(event) {
var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
var title = event.title;
var id = event.id;
$.ajax({
url: "fullcalender.io/update.php",
type: "POST",
data: {
title: title,
start: start,
end: end,
id: id
},
success: function() {
calendar.fullCalendar('refetchEvents');
alert('Event Update');
}
})
},

eventDrop: function(event) {
var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
var title = event.title;
var id = event.id;
$.ajax({
url: "fullcalender.io/update.php",
type: "POST",
data: {
title: title,
start: start,
end: end,
id: id
},
success: function() {
calendar.fullCalendar('refetchEvents');
alert("Event Updated");
}
});
},

eventClick: function(event) {
if (confirm("Are you sure you want to remove it?")) {
var id = event.id;
$.ajax({
url: "fullcalender.io/delete.php",
type: "POST",
data: {
id: id
},
success: function() {
calendar.fullCalendar('refetchEvents');
alert("Event Removed");
}
})
}
},

});
});
</script>
<!-- FullCalender.io -->
</html>