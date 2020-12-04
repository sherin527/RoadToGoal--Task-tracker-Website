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
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
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
<body>
  <nav class="navbar navbar-expand-lg  navbar fixed-top " style="background: #199FB1">
    <div class="container">
  <a href ="home.php" class="navbar-brand"  >
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
  <a href="index.php"><i class="fa fa-check fa-3x" aria-hidden="true"></i></a>
  <a href="cal.php?userid=<?php echo $username; ?>"><i class="fa fa-calendar fa-3x" aria-hidden="true"></i></a>
  <a href="achievements/ach.php?userid=<?php echo $username; ?>"><i class="fa fa-trophy fa-3x" aria-hidden="true"></i></a>
  <a href="profile.php?userid=<?php echo $username; ?>"><i class="fa fa-user fa-3x" aria-hidden="true"></i></i></a>
  <a href="#contact"><i class="fa fa-ellipsis-h fa-3x" aria-hidden="true"></i></a>

</div>




































    <div class="main-section">
       <div class="add-section">
          <form action="app/add.php?userid=<?php echo $username; ?>" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <label>Enter Task</label>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />


                
                <label>Enter Category From Work,Leisure or Fitness</label>
                <input type="text" 
                     name="category" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
                <label>Enter Due Date</label>
                <input type="date" name="due_date" required="yes" message="Please enter the due date of task" validate="date"> <br>
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <label>Enter Task</label>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />

              <label>Enter Category From Leisure, Work and Fitness</label>
             <input type="text" 
                     name="category" 
                     placeholder="Enter the category" />
              <label>Enter Due Date</label>
              <input type="date" name="due_date" required="yes" message="Please enter the due date of task" validate="date"> <br>
             <button type="submit">Add &nbsp; <span>&#43;</span></button>
              
              
             <?php } ?>
             
          </form>
       </div>
       <?php 
          $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"

                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />


                               <form method="POST" >
                        <label>Enter number of hours</label>
                        <input type="int" id="hours" name="hours"/>
                        <button type="submit"> Add &nbsp; <span>&#43;</span></button>
                        </form>
                        <?php
                           if(isset($_POST['hours'] )){
                           
                           $hours= $_POST['hours'];
                           $sql1 = 'INSERT INTO todos (hours) VALUES (:hours)';
                            $query1 = $conn->prepare($sql1);
                           
                         }
                           ?>


                      <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    
                    <small>category: <?php echo $todo['category'] ?></small><br>
                    <small>due date: <?php echo $todo['due_date'] ?></small><br>
                    <small>created: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });


            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');

                $('.hours')[this.checked ? "show" : "hide"]();
                
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>
</body>
</html>