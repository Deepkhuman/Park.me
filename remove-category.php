<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (!isset($_SESSION['park'])) {
    header('location:logout.php');
    } else {

if(isset($_GET['editid'])){
$id=$_GET['editid'];




$qry="DELETE from vcategory where id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:vehicle-category.php');
}else{
    echo"ERROR!!";
}
}
?>
<?php 
}
 ?>