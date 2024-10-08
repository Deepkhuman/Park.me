<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (!isset($_SESSION['park'])) {
    header('location:logout.php');
    } else {

    if(isset($_POST['submit-in'])){
        $cid=$_GET['updateid'];
        $vname = $_POST['vrname'];
        $coname = $_POST['companyname'];
        $cat = $_POST['catagory'];
        $pnumber = $_POST['ParkingNumber'];
        $intime = $_POST['in_time'];
        $owner = $_POST['owner'];
        $contact = $_POST['ownercontact'];
        $remark=$_POST['remark'];
        $status=$_POST['status'];
        $outtime = $_POST['outtime'];
        $parkingcharge=$_POST['totalcharge'];


        $query=mysqli_query($con, "INSERT INTO `vout`(`id`, `v_rn`, `c_name`, `cat`, `p_number`, `v_in_time`, `outtime`, `owner`, `owner_contact`, `charge`, `status`, `remark`) VALUES (NULL,' $vname','$coname','$cat','$pnumber','$intime','$outtime','$owner','$contact','$parkingcharge','$status','$remark')");
        if ($query) {
        	 $qryin="DELETE FROM `vehicle_info` WHERE ID=$cid";        	
        	$resultIn=mysqli_query($con,$qryin);  
        	if ($resultIn) {
             header('location:out-vehicles.php');       		
        	}
        } else {
            $msg="Something Went Wrong";
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
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="in-vehicle";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Vehicle Category Management</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Manage Incoming Vehicles</div>
						<div class="panel-body">

                        <?php if($msg)
						echo "<div class='alert bg-info ' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        
                        <div class="col-md-12">


							<form method="POST">


                            <?php
                            $cid=$_GET['updateid'];
                            $ret=mysqli_query($con,"SELECT * from vehicle_info where ID='$cid'");
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {

                            ?> 

								<div class="form-group">
									<label>Vehicle Registration Number</label>
									<input type="text" class="form-control" value="<?php  echo $row['RegistrationNumber'];?>" id="catename" name="vrname" readonly>
								</div>


								<div class="form-group">
									<label>Company Name</label>
									<input type="text" class="form-control" value="<?php  echo $row['VehicleCompanyname'];?>" id="sdesc" name="companyname" readonly>
								</div>


                                <div class="form-group">
									<label>Category</label>
									<input type="text" class="form-control" value="<?php  echo $row['VehicleCategory'];?>" id="sdesc" name="catagory" readonly>
								</div>


                                <div class="form-group">
									<label>Parking Number</label>
									<input type="text" class="form-control" value="<?php  echo $row['ParkingNumber'];?>" id="sdesc" name="ParkingNumber" readonly>
								</div>


                                <div class="form-group">
									<label>Vehicle IN Time</label>
									<input type="text" class="form-control" value="<?php  echo $row['intime'];?>" id="sdesc" name="in_time" readonly>
								</div>


                                <div class="form-group">
									<label>Vehicle Owned By</label>
									<input type="text" class="form-control" value="<?php  echo $row['OwnerName'];?>" id="sdesc" name="owner" readonly>
								</div>


                                <div class="form-group">
									<label>Vehicle Owner Contact</label>
									<input type="text" class="form-control" value="<?php  echo $row['OwnerContactNumber'];?>" id="sdesc" name="ownercontact" readonly>
								</div>


                                <div class="form-group">
									<label>Current Status</label>
									<input type="text" class="form-control" value="<?php if($row['Status']==""){ echo "Vehicle In"; } if($row['Status']=="Out"){echo "Vehicle out";} ;?>" id="sdesc" name="current status" readonly>
								</div>


                                <div class="form-group">
									<label>Total Charge</label>
									<input type="number" class="form-control" placeholder="" id="parkingcharge" name="totalcharge" required>
								</div>

								<div class="form-group">
									<label>Out time</label>
									<input type="Time" class="form-control" placeholder="" id="outtime" name="outtime" 
								pattern="[0-9]+" required>
								</div>


                                <div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control" required="true" >
                                        <option value="Out">Outgoing Vehicle</option>
                                    </select>
								</div>


                                <div class="form-group">
									<label>Remarks</label>
									<input type="text" class="form-control" placeholder="" id="remark" name="remark" required>
								</div>
								
                        <?php } ?>

									<button type="submit" class="btn btn-success" name="submit-in">Submit For Out-Going</button>
									<button type="reset" class="btn btn-default">Reset</button>
                                    
								</div> <!--  col-md-12 ends -->


						</div>
					</div>
				</div>
				
				
				
</div><!--/.row-->
		
		
		

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

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
		
</body>
</html>
<?php
} 
 ?>