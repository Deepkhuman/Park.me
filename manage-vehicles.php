<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (!isset($_SESSION['park'])) {
	header('location:logout.php');
}else
{


if(isset($_POST['submit-vehicle'])) {
	$parkingnumber=mt_rand(10000, 99999);
	$ticket=mt_rand(10000, 99999);
	$catename=$_POST['catename'];
	$vehcomp=$_POST['vehcomp'];
	$vehreno=$_POST['vehreno'];
	$areaName=$_POST['area'];
	$ownername=$_POST['ownername'];
	$ownercontno=$_POST['ownercontno'];
	$adminuser=$_SESSION['park'];
	$place=$_post['a_name'];
	$intime=$_POST['intime'];
	$adminuser="Admin";
	$date=$_POST['date'];

	$getLimit = "SELECT * FROM `parea` WHERE a_id = $areaName";
	$getData = "SELECT * FROM `vehicle_info`";
	$res = mysqli_query($con,$getLimit);
	$done = mysqli_fetch_assoc($res);
	$toffy = mysqli_query($con,$getData);
	$choco = mysqli_num_rows($toffy);
	if ($choco <= $done['a_limit']) {
		$inData = "INSERT INTO `vehicle_info`(`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `a_id`, `OutTime`, `ParkingCharge`, `Remark`, `Status`, `ticket`, `email`,`intime`,`date`) VALUES (NULL,'$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno','$areaName',NULL,NULL,NULL,NULL,'$ticket','$adminuser','$intime','$date')";


  

		$query=mysqli_query($con, $inData);
		if ($query) {
			echo "<script>alert('Vehicle Entry Detail has been added');</script>";
			echo "<script>window.location.href ='in-vehicles.php'</script>";
		} else {
				// echo "<script>alert('Something Went Wrong');</script>";  
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
	<title>VPS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
	<?php include 'includes/navigation.php' ?>
	
	<?php
	$page="manage-vehicles";
	include 'includes/sidebar.php'
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Manage Vehicle</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
			<div class="panel-heading">Vehicle Entry</div>
			<div class="panel-body">

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
							<input type="text" class="form-control" placeholder="Enter Here.." id="ownername" name="ownername" required>
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
									<?php } ?>
								
								
							</select>
						</div>

						<div class="form-group">
							<label>Do you have document related to vehicle ?</label><br>
							<input type="radio" name="rdoyes" groupname="rdoyes" checked="true"> <b>Yes</b>
							<input type="radio" name="rdoyes" groupname="rdono" > <b>NO</b>
						</div>


						<div class="col-md-6">
							<label>Date</label>
							<input type="date" class="form-control" placeholder="Enter Here.." maxlength="10" pattern="[0-9]+" id="date" name="date" required>
						</div>

						<div class="col-md-6">
							<label>Time</label>
							<input type="time" class="form-control" placeholder="Enter Here.." maxlength="50" 
							pattern="[0-9]+" id="intime" name="intime" required>
						</div>
						<br/><br/><br/><br/><br/>



						<button type="submit" class="btn btn-success" name="submit-vehicle">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
					</div> <!--  col-md-12 ends -->
				</form>
			</div> 
		</div>
		
		
		

		<?php include 'includes/footer.php';?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
				responsive: true,
				scaleLineColor: "rgba(0,0,0,.2)",
				scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleFontColor: "#c5c7cc"
			});
		};
	</script>

</body>
</html>
<?php
} 
 ?>