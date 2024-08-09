<?php 
$msg ="";
include('../includes/dbconn.php');
if(isset($_POST['signin']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"SELECT * FROM opt WHERE o_email='$email' AND o_pass='$password'");
    $ret=mysqli_fetch_array($query);   
    if($ret>0){   
       $_SESSION['opt_email']=$email;
       header('location:dashboard.php');
    }
    else{
    $msg="Login Failed !!";

    }
}

 ?>

<!DOCTYPE html>
<html>

<head>
 
    <title>OPERATOR | Login Page</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>     
     <form action="index.php" method="post">
  <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form>

          <?php
           if($msg)
            echo "<div class='alert bg-danger' role='alert'>
            <em class='fa fa-lg fa-warning'>&nbsp;</em> 
            $msg
            <a href='#' class='pull-right'>
            <em class='fa fa-lg fa-close'>
            </em></a></div>" ?> 

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
            <label class="form-label" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
            <label class="form-label" for="form1Example23">Password</label>
          </div> 
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block" name="signin">Login in</button>

    
        </form>
      </div>
    </div>
  </div>
</section>
</form>
           

        

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
