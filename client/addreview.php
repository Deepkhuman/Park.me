<?php
include '../includes/dbconn.php'; 
if (!isset($_SESSION['data'])) {
  header('location:login.php');
}
else
{
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<body>
<?php 
if (isset($_POST['submit'])) {
  $eml = $_SESSION['data'];
  $name= $_POST['name'];
  $email = $_POST['email'];

  $ins = mysqli_query($con,"INSERT INTO `c_review`(`c_uname`, `c_gmail`, `c_rev`) VALUES ('$name','$eml','$email')");
  if ($ins) {
    echo header('location:index.php');
  }
  else{
    echo "not done";
  }
}
 ?>

  <?php  
 $eml = $_SESSION['data'];
  $sel=mysqli_query($con,"SELECT c_uname FROM clients WHERE c_email = '$eml'");
  $num = mysqli_num_rows($sel);
  $data = mysqli_fetch_assoc($sel);
  echo mysqli_error($con);
?>



	<?php include 'navbar.php'; ?>
<form action="addreview.php" method="post">
	<div class="container mt-5">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="Name" class="form-control" id="exampleFormControlInput1" name="name" placeholder="name" readonly="true" value="<?php echo $data['c_uname'];?>">
</div>

				 

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Discription</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Write your thoughts" name="email"></textarea>
</div>
<div>
<button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
</div>
</form>


</body>
</html>
<?php } ?>