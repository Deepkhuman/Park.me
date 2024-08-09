<?php 

include('../includes/dbconn.php');
if (!isset($_SESSION['data'])) {
  header('location:login.php');
}
else
{

$ret = "";

$sq = mysqli_query($con,"SELECT * FROM vehicle_info WHERE ticket= '{$_POST["tn"]}'");

if(mysqli_num_rows($sq) > 0){
	$res = mysqli_fetch_assoc($sq);
	$ret = "<table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>First</th>
      <th scope='col'>Email</th>
      <th scope='col'>Intime</th>
      <th scope='col'>Ticket</th>
      <th scope='col'>Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row'>1</th>
      <td>{$res['OwnerName']}</td>
      <td>{$res['email']}</td>
      <td>{$res['intime']}</td>
      <td>{$res['ticket']}</td>
      <td>{$res['date']}</td>
    </tr>
 
  </tbody>
</table>";
echo $ret;
}
	
?>
<?php } ?>