<?php 
include('../includes/dbconn.php');
// echo $_SESSION['data'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>VPMS</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@600&display=swap" rel="stylesheet">
  

  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background:#cec8ef;">
    <div class="container-fluid">
      <h3><i class="fa-solid fa-car-side"></i> Park.ME</h3>

      <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-end">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
          <?php
          if(isset($_SESSION['data'])) {
            ?>        
            <li class="nav-item">
              <a class="nav-link" href="view-ticket.php">View Ticket</a>
            </li>   
            <?php } ?>

          </ul>
          <?php
          if(isset($_SESSION['data'])) {
            ?>
            <a class="button1 me-2" href="logout.php">LOGOUT</a>
            <form class="d-flex">
              <a class="button2"  href="book-vehicle.php">Book Now</a>
            </form>
            <?php }
            else { 
              ?>
              <a class="button3 me-2" href="login.php">LOGIN</a>
              <a class="button4 me-2" href="register.php">REGISTER</a>
              <?php  } ?>


            </div>
          </div>
        </nav>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../img/n1.jpeg" class="d-block w-100" alt="..." height="600px">
              <div class="carousel-caption d-none d-md-block">
                <h5>First Courage</h5>
                <p>The road to success is dotted with many tempting parking spaces.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../img/n2.jpeg" class="d-block w-100" alt="..." height="600px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second Comitment</h5>
                <p>33% of urban traffic is actively seeking a parking space.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../img/n3.jpeg" class="d-block w-100" alt="..." height="600px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third Excellence</h5>
                <p>Life is a journey,but don't worry,you'll find a parking spot at the end.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>



        <!-- Carousel wrapper -->
        <div id="carouselExampleControls" class="carousel slide text-center carousel-dark mt-3" data-mdb-ride="carousel">

          <div class="carousel-inner">
            <?php 
            $sel=mysqli_query($con,"SELECT * FROM c_review order by c_id desc limit 3");
            echo mysqli_error($con);
            $num = mysqli_num_rows($sel);
            if ($num == 0) {
              ?>
              <?php 
              echo "No Reviews!!";
            }else { ?>
            <?php 
             $citem = mysqli_fetch_all($sel,MYSQLI_ASSOC);
              ?>
              <div class="carousel-item">
                <img class="rounded-circle shadow-1-strong mb-4" src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar"
                style="width: 150px;" />
                <div class="row d-flex justify-content-center">
                  <div class="col-lg-8">
                    <h5 class="mb-3"><?php echo $citem[0]['c_uname'];?></h5>
                    <p class="text-muted">
                      <i class="fas fa-quote-left pe-2"></i>
                      <?php echo $citem[0]['c_rev']; ?>
                    </p>
                  </div>
                </div> 
              </div> 

              <div class="carousel-item active">
                <img class="rounded-circle shadow-1-strong mb-4" src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar"
                style="width: 150px;" />
                <div class="row d-flex justify-content-center">
                  <div class="col-lg-8">
                    <h5 class="mb-3"><?php echo $citem[1]['c_uname'];?></h5>
                    <p class="text-muted">
                      <i class="fas fa-quote-left pe-2"></i>
                      <?php echo $citem[1]['c_rev']; ?>
                    </p>
                  </div>
                </div>
              
              </div> 

              <div class="carousel-item">
                <img class="rounded-circle shadow-1-strong mb-4" src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar"
                style="width: 150px;" />
                <div class="row d-flex justify-content-center">
                  <div class="col-lg-8">
                    <h5 class="mb-3"><?php echo $citem[2]['c_uname'];?></h5>
                    <p class="text-muted">
                      <i class="fas fa-quote-left pe-2"></i>
                      <?php echo $citem[2]['c_rev']; ?>
                    </p>
                  </div>
                </div>
                
              </div>
           
            <?php } ?>
               </div>

            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls"
          data-mdb-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <?php 
        if (isset($_SESSION['data'])) {
         ?>
          </div>
         <div class="nav-item" style="display:flex; justify-content: center;">
          <a class="button5" href="addreview.php">Review</a>
        </div>
        <?php
      }
      ?>

      <!-- Carousel wrapper -->

     <script src="css/mdb.min.js"></script> 
      <script src="bootstrap/js/bootstrap.bundle.js"></script>
    </body>
    </html>

    <?php include 'footer.php'; ?>