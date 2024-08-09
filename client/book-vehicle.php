<?php
 session_start();
 error_reporting(0);
 include('../includes/dbconn.php');
 if(isset($_POST['submit-vehicle'])) {
  $parkingnumber=mt_rand(10000, 99999);
  $ticket=mt_rand(10000, 99999);
  $catename=$_POST['catename'];
  $vehcomp=$_POST['vehcomp'];
  $vehreno=$_POST['vehreno'];
  $areaName=$_POST['area'];
  $ownername=$_POST['ownername'];
  $ownercontno=$_POST['ownercontno'];
  $enteringtime=$_POST['intime'];
  $adminuser=$_SESSION['data'];
  $date=$_POST['date'];
  
  $getLimit = "SELECT * FROM `parea` WHERE a_id = $areaName";
  $getData = "SELECT * FROM `vehicle_info`";
   $res = mysqli_query($con,$getLimit);
   $done = mysqli_fetch_assoc($res);
   $toffy = mysqli_query($con,$getData);
   $choco = mysqli_num_rows($toffy);
  
   if ($choco <= $done['a_limit']) {
   $inData = "INSERT INTO `vehicle_info`(`ID`,`ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `a_id`, `OutTime`, `ParkingCharge`, `Remark`, `Status`,`ticket`,`email`,`intime`,`date`) VALUES (NULL,'$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno','$areaName',NULL,NULL,NULL,NULL,'$ticket','$adminuser','$enteringtime','$date')";
   $query=mysqli_query($con, $inData);
   if ($query) {  
     echo "<script>alert('Vehicle Entry Detail has been added');</script>";
     echo "<script>window.location.href ='view-ticket.php'</script>";
   } else {
    echo "<script>alert('Something Went Wrong');</script>";  
    var_dump($inData);
    echo mysqli_error($con);     
   }
  }
  else{
    echo "<script>alert('Parking is Full!');</script>";   
  } 
 }
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
  <div class="card-body">
   <div class="text-center p-5 bg-light rounded shadow">
     <div class="panel-heading display-3">Vehicle Entry</div>
     <div class="panel ml-12 ">

      <div class="col-md-12">

       <form method="POST">

        <div class="form-group">
         <label>Registration Number</label>
         <input type="text" class="form-control" placeholder="LOL-1869" id="vehreno" name="vehreno" required>
        </div>


        <div class="form-group">
         <label>Vehicle's Company Name</label>
         <input type="text" class="form-control" placeholder="Tesla" id="vehcomp" name="vehcomp" required>
        </div>
      
         <div class="form-group">
          <label>Vehicle Category</label>
          <select class="form-control" name="catename" id="catename">
          <option value="0" selected="true">Select Category</option>
          <?php $query=mysqli_query($con,"select * from vcategory");
           while($row=mysqli_fetch_array($query))
           {
           ?>    
                 <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                        <?php } ?> 
          </select>
         </div>
     <div class="form-group">
         <label>Owner's Full Name</label>
         <input type="text" class="form-control"placeholder="Enter Here.." id="ownername" name="ownername"  required>
        </div>


        <div class="form-group">
         <label>Owner's Contact</label>
         <input type="text" class="form-control" placeholder="Enter Here.." maxlength="10" pattern="[0-9]+" id="ownercontno" name="ownercontno" required>
        </div>

        <div class="form-group">
         <label>Parking Area</label>
         <select name="area" class="form-control">
          <option value="0" selected="true">--Select Area--</option>
          <?php
          $area = "SELECT * FROM `parea`";
          $res = mysqli_query($con,$area);
           while($data = mysqli_fetch_assoc($res)) {
            ?>
            <option value="<?php echo $data['a_id']; ?>"><?php echo $data['a_name']; ?></option>
           <?php
          }
          ?>
         </select>
        </div>

        <div class="form-group">
         <label>Do you have document related to vehicle ?</label><br>
         <input type="radio" name="rdoyes" groupname="rdoyes" checked="true"> <b>Yes</b>
         <input type="radio" name="rdoyes" groupname="rdono" > <b>NO</b>
        </div>


        <div class="form-group">
         <label>Date</label>
         <input type="date" class="form-control" placeholder="Enter Here.." maxlength="10" pattern="[0-9]+" id="date" name="date" required>
        </div>

        <div class="form-group">
         <label>Time</label>
         <input type="time" class="form-control" placeholder="Enter Here.." maxlength="10" pattern="[0-9]+" id="intime" name="intime" required>
        </div><br/>



         <button type="submit" class="btn btn-success" name="submit-vehicle">Submit</button>
         <button type="reset" class="btn btn-default">Reset</button>
        </div> <!--  col-md-12 ends -->
       </form>
      </div> 
     </div>
  
 </div> <!--/.main-->
</div>
</body>
</html>