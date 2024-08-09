<?php 
include('../includes/dbconn.php');

?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'navbar.php'; ?>
	<title>VPMS</title>

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>


  <?php 

if (isset($_POST['submit'])) {
    
    $user=$_POST['name'];
    $email=$_POST['email'];
    $sub=$_POST['subject'];
    $mes=$_POST['message'];

      $ins=mysqli_query($con,"INSERT INTO `contactus`(`id`, `name`, `email`, `subject`, `message`) VALUES (NULL,'$user','$email','$sub','$mes')");
    if ($ins) {
      echo "<script>alert('done');window.location.href='index.php';</script>";
      }
      else
      {
        echo "<script>alert('something went wrong')</script>";
      }
    }
   ?>

  <div style="display: flex;justify-content: center; margin-top: 10px;">
    <h2>CONTACT US</h2>

  </div>
  <body>
     <div class="container-fluid col-md-12 ">
      <div class=" col col-md-3" style="margin-left:450px;">
        <img src="../img/c1.jpg" class="w-500" alt="..." height="500px">
      </div> 
    <form action="contactus.php" method="post">
         </div>
     
         
        <div class="col col-md-5 mb-3" style="margin-left: 450px;">
          <p>Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>
          <hr>

          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" id="subject" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Your Meassage</label>
            <textarea class="form-control" name="message" id="message" placeholder="Write your query here.." required ></textarea>
          </div>
          <div class="mb-3">
            <p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;contact@TeamPark.Me.com</p>
          </div>

          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      
    </form>

  </body>
  </html>
   <?php include 'footer.php'; ?>