<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['park'])) {
	header('location:index.php');
}else
{
	?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Park.Me</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@600&display=swap" rel="stylesheet">
	
</head>
<body>
        <?php include 'includes/navigation.php';?>

	
        <?php
		$page="dashboard";
		include 'includes/sidebar.php'
		?>


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php include 'includes/greetings.php'; ?></h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row" style="display: flex;justify-content: center;">
				<div class="col-xs-8 col-md-3 col-lg-6 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-toggle-on color-orange"></em>
							<div class="large"><?php include 'counters/invehicles-count.php';?></div>
							<div class="text-muted">Vehicles IN</div>
						</div>
					</div>
				</div>
				<div class="col-xs-8 col-md-3 col-lg-6 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-toggle-off color-teal"></em>
							<div class="large"><?php include 'counters/outvehicles-count.php'; ?></div>
							<div class="text-muted">Vehicles OUT</div>
						</div>
					</div>
				</div>
			</div>
		
		<?php 

		include 'includes/dbconn.php';
		 $ret=mysqli_query($con,"SELECT count(ID) id1 from vehicle_info where Status=''");
		 $row5=mysqli_fetch_array($ret);
		 
		 $ret=mysqli_query($con,"SELECT count(ID) id2 from vehicle_info where Status='Out'");
		  $row6=mysqli_fetch_array($ret);

		  $ret=mysqli_query($con,"SELECT count(ID) as id1 from vehicle_info where VehicleCategory='Two Wheeler'");
		$row=mysqli_fetch_array($ret);  
             
		$ret=mysqli_query($con,"SELECT count(ID) as id2 from vehicle_info where VehicleCategory='Four Wheeler'");
		$row2=mysqli_fetch_array($ret); 

		$ret=mysqli_query($con,"SELECT count(ID) as id4 from vehicle_info where VehicleCategory='Three Wheeler'");
		$row4=mysqli_fetch_array($ret);


	?>
	</div>	<!--/.main-->	

	<div class="panel panel-container">
		<div class="row no-padding">
			<h1 style="display:flex; justify-content:center;">ADMIN</h1>
		</div>
		<div class="table-body">
			<table class="table">
   <thead>
            <tr>
                <th>#</th>
                <th>Admin Name</th>
                <th>Email</th>
                <th>Actions</th>

            </tr>
        </thead>
    <tbody>
        <?php
        $ret=mysqli_query($con,"SELECT * from  admin");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

            <td><?php echo $cnt;?></td>
                 
            <td><?php  echo $row['AdminName'];?></td>

            <td><?php  echo $row['Email'];?></td>
            
            <td>
            <a href="remove-admin.php?editid=<?php echo $row['ID'];?>"> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> </a>
            </td>

            </tr>

                <?php $cnt=$cnt+1;}?>
        
        </tbody>
</table>
</div>
	
	</div>

	<div class="panel panel-container">
		<div class="row no-padding">
			<h1 style="display:flex; justify-content:center;">USER</h1>
		</div>
		<div class="table-body">
			<table class="table">
   <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Mobile</th>
                <th>Password</th>

            </tr>
        </thead>
    <tbody>
        <?php
        $ret=mysqli_query($con,"SELECT * from  clients");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

            <td><?php echo $cnt;?></td>
                 
            <td><?php  echo $row['c_uname'];?></td>

            <td><?php  echo $row['c_mobile'];?></td>

            <td><?php  echo $row['c_pass'];?></td>
            
            <td>
            <a href="remove-user.php?editid=<?php echo $row['c_id'];?>"> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> </a>
            </td>

            </tr>

                <?php $cnt=$cnt+1;}?>
 
        
        </tbody>
</table>
			
		</div>
		
	</div>

	<div class="panel panel-container">
		<div class="row no-padding">
			<h1 style="display:flex; justify-content:center;">OPERATOR</h1>
		</div>
		<div class="table-body">
			<table class="table">
   <thead>
            <tr>
                <th>#</th>
                <th>Opt Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>password</th>

            </tr>
        </thead>
    <tbody>
        <?php
        $ret=mysqli_query($con,"SELECT * from  opt");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

            <td><?php echo $cnt;?></td>
                 
            <td><?php  echo $row['o_name'];?></td>

            <td><?php  echo $row['o_mobile'];?></td>

            <td><?php  echo $row['o_email'];?></td>

            <td><?php  echo $row['o_pass'];?></td>
            
            <td>
            <a href="remove-opt.php?editid=<?php echo $row['o_id'];?>"> <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> </a>
            </td>

            </tr>

                <?php $cnt=$cnt+1;}?>
 
        
        </tbody>
</table>
			
		</div>
		
	</div>

	      <?php include 'includes/footer.php';?>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js'></script>
	<script>
		window.onload = function () {
	

	</script>

		
</body>
</html>
<?php
}
?>
