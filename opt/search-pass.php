<?php
include('../includes/dbconn.php');
if (!isset($_SESSION['opt_email'])) {
  header('location:index.php');
}else
{
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

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
       <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Search Ticket</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
<form method="post">
                                <div class="form-group">
                                    <label>Search by Ticket Number</label>
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control"></div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                            </form>

                           
                            <div class="table-responsive">
                                 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Owner </th>
                                           <th>Mobile</th>
                                            <th>Vehicle Number</th>
                                            <th>Email</th>
                                            <th>Ticket</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sql="SELECT * from vehicle_info where ticket like '$sdata%'";
$query =mysqli_query($con,$sql);

$cnt=1;
if(mysqli_num_rows($query)>0)
{
$h=mysqli_fetch_assoc($query);
 
               ?>
                                                           <tr>
                  <td><?php echo $h['OwnerName'];?></td>
                  <td><?php  echo $h['OwnerContactNumber'];?></td>
                  <td><?php  echo $h['RegistrationNumber'];?></td>
                  <td><?php  echo $h['email'];?></td>
                  <td><?php  echo $h['ticket'];?></td>
                  <td><?php  echo $h['VehicleCategory'];?></td>
                  <td><a href="dashboard.php?viewid=<?php echo $h['ticket'];?>">View</a></td>
                </tr>
               <?php 
 } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?> 
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
<?php
}
?>