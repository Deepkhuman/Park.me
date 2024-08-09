<?php 
include('../includes/dbconn.php');
if (!isset($_SESSION['data'])) {
  header('location:login.php');
}
else
{
  ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  
</head>
<body>
  <?php include 'navbar.php'; ?>
  <?php 
  $eml = $_SESSION['data'];
  $sel=mysqli_query($con,"SELECT * FROM vehicle_info WHERE email = '$eml'");
  echo mysqli_error($con);
  $num = mysqli_num_rows($sel);
  if ($num == 0) {
    ?>
    <script type="text/javascript">
      alert("No Vehicle Booked!");
      window.location.href= 'index.php';
    </script>
    <?php }else { ?>
    <div class="row d-flex justify-content-center text-center mt-5">
      <?php 
      while ($res=mysqli_fetch_assoc($sel)) {
        ?>
        <div class="card border-success mb-3 m-2" style="max-width: 22rem;">
          <div class="card-header bg-transparent border-success">Ticket</div>
          <div class="card-body text-success flex-column">
            <h5 class="card-title">Your Vehicle Has Booked Successfully</h5>
            <p class="card-text mt-3">Your Ticket Number Is:&nbsp;&nbsp;<small><?php echo $res['ticket']; ?></small></p>
            <div><a type="button" class="viewmore" data-ticket="<?php echo $res['ticket']; ?>" href="#" >View More</a></div><br>
            

          </div>
        </div>
        <?php } ?>
      </div>
      <?php } ?> 
      

      <div class="accordion" id="accordionExample">
        <div class="accordion-item" id="load">
         

        </div>
      </div>
    </div>
    
  </div>


  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(event){
      $('.viewmore').click(function(e){
        var tn = $(this).data('ticket');
        $.post(
          "vem.php",
          {tn : tn},
          function(data){
            $('#load').html(data);
          }
          );
      });
    });
  </script>

</body>
</html>
<?php } ?>