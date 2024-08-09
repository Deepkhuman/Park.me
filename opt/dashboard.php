<?php
include('../includes/dbconn.php');
if (!isset($_SESSION['opt_email'])) {
    header('location:index.php');
}else{

?>
<!DOCTYPE html>
<html>
<head>   
    <title>VPMS</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');
    
        ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--end page header -->
            </div>

    <div>
        <div class="row">
            <ol class="breadcrumb">
                <li class="active"><b>Incoming Vehicle Management</b></li>
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
                        <div class="panel-heading">Incoming Vehicles</div>
                        <div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                        
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle No.</th>
                <th>Company</th>
                <th>Category</th>
                <th>Parking Number</th>
                <th>Vehicle's Owner</th>
                 <th>Ticket NO</th>
                 <th>Email</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
        <?php
        $ret=mysqli_query($con,"SELECT * FROM vehicle_info ORDER BY InTime DESC");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

            <td><?php echo $cnt;?></td>
                 
            <td><?php  echo $row['RegistrationNumber'];?></td>

            <td><?php  echo $row['VehicleCompanyname'];?></td>

            <td><?php  echo $row['VehicleCategory'];?></td>

            <td><?php  echo 'CA-'.$row['ParkingNumber'];?></td>

            <td><?php  echo $row['OwnerName'];?></td>

            <td><?php  echo $row['ticket'];?></td>

            <td><?php  echo $row['email'];?></td>
            
            <td><a href="update-incomingdetail.php?updateid=<?php echo $row['ID'];?>"><button type="button" class="btn btn-sm btn-danger">Take Action</button></a>
            </td>
            </tr>
                <?php $cnt=$cnt+1;}?>
        </tbody>
    </table>
                        </div>
                    </div>
                </div>  
</div><!--/.row-->
        <?php include 'footer.php'; ?>
    </div>  <!--/.main-->
         <!--end quick info section -->
            </div>
        </div>
        <!-- end page-wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>
</html>
<?php 
}
?>