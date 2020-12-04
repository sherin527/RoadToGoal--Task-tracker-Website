<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style type="text/css">
  .body{
    
    background-size: 300px;
    background-color: #199FB1;
  }
  .container{
    
    background-size: 300px;
  }
  .card{
    background-color: #A5D1E1;
    background-size: 100px; 
  }
  .divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
    
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
    
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}

.btn-google {
    background-color: #eb0c1b;
    color: #ffffff;
}



</style>











</head>
<body style="background-color: #199FB1;">
  <?php
  
  if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con,$_POST['user']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

    if($password === $cpassword){

      $insertquery = "insert into users('user_login','user_password',user_cpasswaord') values ('$username', '$password',$cpassword')";

      $iquery = mysqli_query($con, $insertquery);
      if($iquery){
          ?>
              <script>
                alert("connection!");
              </script>
          <?php 

        }else{
                ?>
                <script>
                          alert("no connection");
                </script>
                <?php
              }

    }else{
      echo "password are not matching!";
    }






  }






  ?>
















  

<nav class="navbar navbar-expand-lg  navbar fixed-top " style="background: #199FB1">
    <div class="container">
  <a href ="home.php" class="navbar-brand"  style="color: white">
<span  class="sr-only" >Saving. Hang tight!</span>Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       
      
    
</div>
  </div>
</nav>



<div class="card" >
<article class="card-body mx-auto" style="max-width: 400px;">
  <p></p><br>
  <h1 class="card-title mt-3 text-center" style="color: black">Create Account</h1>
  
  <p>
    
    <!--<a href="https://www.facebook.com/" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
    <a href="https://www.google.com/" class="btn btn-block btn-google"> <i class="fa fa-google"></i>   Login via google</a>-->
  </p>
  <p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
  <form action="connection1.php", method="post">
  <div class="form-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
     </div>
        <input name="user" class="form-control" placeholder="Full name" type="text" required>
    </div> <!-- form-group// -->
    
        <!-- form-group// -->
    <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        
    </div>
    
  </div> <!-- form-group end.// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input name="password" class="form-control" placeholder="Create password" type="password" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input name="cpassword" class="form-control" placeholder="Confirm password" type="password" required>
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center" style="color: black">Have an account? <a href="login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->


<!--container end.//-->

<br><br>


</body>
</html>