<?php
    
    include('includes/dbconn.php');

    	$cid=$_GET['detailid'];
    	$sel=mysqli_query($con,"SELECT * FROM `vout` WHERE id='$cid'");
    	$h=mysqli_fetch_assoc($sel);
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
		$page="out-vehicle";
		include 'includes/sidebar.php'
		?>


		<div class="table-bordered" style="margin-left: 250px;">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Outgoing Vehicles</div>
						<div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                        
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle No.</th>
                <th>Company</th>
                <th>Category</th>

                <th>InTime</th>
       
                <th>Outtime</th>
                <th>Owner</th>
                <th>Contact</th>
                <th>charge</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
        <?php
        $ret=mysqli_query($con,"SELECT * FROM vout WHERE id='$cid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

            <td><?php echo $cnt;?></td>
                 
            <td><?php  echo $row['v_rn'];?></td>

            <td><?php  echo $row['c_name'];?></td>

            <td><?php  echo $row['cat'];?></td>

            <td><b><?php  echo $row['v_in_time'];?></td></b>

  <!--           <td><?php  echo 'CA-'.$row['ParkingNumber'];?></td>  -->

            <td><b><?php  echo $row['outtime'];?></td></b>

            <td><?php  echo $row['owner'];?></td>

            <td><?php  echo $row['owner_contact'];?></td>

            <td><?php  echo $row['charge'];?></td>
        
            </tr>

                <?php $cnt=$cnt+1;}?>
 
        
        </tbody>

    </table>
						</div>
					</div>
				</div>
				
				
				
</div><!--/.row-->

        <?php include 'includes/footer.php';
        ?>

	
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

