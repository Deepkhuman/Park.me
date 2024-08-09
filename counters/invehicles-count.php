<?php
    include './includes/dbconn.php';

    $query=mysqli_query($con,"SELECT * from  vehicle_info");
    $count_parkings=mysqli_num_rows($query);

    echo $count_parkings
 ?>