<?php
  $username = $_GET["userid"];
  $conn = mysqli_connect("localhost:3306","root", "", "todo");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("SELECT user_login FROM users WHERE user_id = ?  ");
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row1 = $result1->fetch_assoc();
  
?>
<?php
  session_start();
?>



<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js
</title>

<link rel="stylesheet" href="../style.css">
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

BODY {
    
    width: 100PX;
}

#chart-container {
    position: absolute;
    top: 200px;
    width: 40%;
    left : 700px;
    height: AUTO;

}
#chart-container-pie {
    position: absolute;
    top: 200px;
    width: 30%;
    left : 200px;
    height: AUTO;
}
#heading1{
    
    position: absolute;
top: 150px;
left: 200px;
}
#heading2{
    
    position: absolute;
top: 150px;
left: 700px;
}
#heading3{
    
    position: absolute;
top: 70px;
left: 200px;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


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
        <a href="../home.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Log out</a>
      </li>
      
    </ul>
    </div></div>
  </div>
</nav>
<div class="sidenav">
  <a href="#"></a><br>
  <a href="../index.php?userid=<?php echo $username; ?>"><i class="fa fa-check fa-3x" aria-hidden="true"></i></a>
  <a href="../cal.php?userid=<?php echo $username; ?>"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a>
  <a href="achievements/ach.php?userid=<?php echo $username; ?>"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></a>
  <!--<a href="../calendar/calendar.php"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a>
  <a href="ach.php"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></a>-->
  <a href="../profile.php?userid=<?php echo $username; ?>"><i class="fa fa-user fa-3x" aria-hidden="true"></i></i></a>
  <a href="#contact"><i class="fa fa-ellipsis-h fa-3x" aria-hidden="true"></i></a>

</div>
<h1 id = "heading3">
Achievements
</h1>
<p>
  
</p>

<h2 id = "heading3">

</h2>
<p></p>
<p></p>

<h2 id = "heading2">
Your Weekly Stats
</h2>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
      </div>

    <h2 id = "heading1">
Your Daily Stats
</h2>
    <div id="chart-container-pie">
        <canvas id="graphCanvas_2"></canvas>
    </div>




    <script>
        $(document).ready(function () {
            
            showGraph();
           

        });


        function showGraph()
        {
            var result_l = []
            var rw = []
            
            {


                $.post("leisure.php",
                function (result)
                {
                    result_l = result;

                });


                {
                $.post("work.php",
                function (result)
                {
                    rw = result;

                } );
                }
                $.post("fitness.php",
                function (result)
                {
                    console.log(result);

                    var chartdata = {
                        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                        datasets: [
                            {
                                label: 'Fitness',
                                backgroundColor: '#66A5D1E1',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#ff6384',
                                hoverBorderColor: '#666666',
                                data: result
                            },
                            {
                                label: 'Leisure',
                                backgroundColor: '#66199FB1',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#ff6384',
                                hoverBorderColor: '#666666',
                                data: result_l
                            },
                            {
                                label: 'Work',
                                backgroundColor: '#660D5C75',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#ff6384',
                                hoverBorderColor: '#666666',
                                data: rw
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        fillOpacity:0.3,
                        data: chartdata
                    });
                });
                $.ajax({
                        url:"daily.php",
                        method:"GET",
                        success:function(data){
                        console.log(data);
                
                                    var chartdata1 = {
                                        labels: ['Fitness','Leisure', 'Work'],
                                        datasets: [
                                            {
                                    
                                                data: [1,2, 3],
                                                backgroundColor: [
                                                                    "#0D5C75",
                                                                    "#199FB1",
                                                                    "#A5D1E1"
                                                                ]
                                            
                                                
                                            }
                                        ]
                                    };

                                    var graphTarget1 = $("#graphCanvas_2");

                                    var pieGraph = new Chart(graphTarget1, {
                                        type: 'doughnut',
                                        data: chartdata1
                                    });
                                
                                },
                        error:function(data){
    console.log(data);
}
            });
            }
        }
        </script>
       

</body>
</html>