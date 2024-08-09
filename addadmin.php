<?php
//error_reporting(0);
include('includes/dbconn.php');
if (!isset($_SESSION['park'])) {
	header('location:index.php');
}else
{

?>
           <!-- <?php if($msg)
						echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> -->
                        

              <?php
              if (isset($_POST['add']))
              {

                 	$adminame = $_POST['adminame'];
                 	$username = $_POST['username'];
                 	$mobilenumber = $_POST['mobile'];
                 	$SecurityCode=mt_rand(100,999);
                 	$email = $_POST['email'];
                  $password = md5( $_POST['password']);

               		
                	$ins = mysqli_query($con,"INSERT INTO `admin`(`AdminName`, `UserName`, `MobileNumber`, `Security_Code`, `Email`, `Password`, `AdminRegdate`) VALUES ('$adminame','$username','$mobilenumber','$SecurityCode','$email','$password',NULL)");  

               if($ins)
               {
						      header('location:dashboard.php');
               }    
               	else{
               		echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$ins
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>";
               	}          
              }             

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle Parking System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<center><h2><b>Vehicle Parking System</b></h2></center>
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Add Admin</div>
				<div class="panel-body">
				<fieldset>
								<form method="POST">
							<div class="form-group">
								<input class="form-control" placeholder="Admin Name" name="adminame" type="text" value="">
							</div>

							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mobile Number" name="mobile" type="text" value="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email" type="Email" value="">
							</div>

							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							
							<button class="btn btn-success" type="btn" name="add">Add</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>