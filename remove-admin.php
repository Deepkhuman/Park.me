<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (!isset($_SESSION['park'])) {
    header('location:logout.php');
    } else {

if(isset($_GET['editid'])){
$id=$_GET['editid'];




$qry="DELETE from admin where id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:dashboard.php');
}else{
    echo"ERROR!!";
}
}
?>
<?php 
}
 ?>