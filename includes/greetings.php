<?php 
 
    include 'dbconn.php';
    date_default_timezone_set('Asia/Kathmandu');
    //Here we define out main variables 
    $welcome_string="Welcome"; 
    $numeric_date=date("G"); 
    
    //Start conditionals based on military time 
    if($numeric_date>=0&&$numeric_date<=11) 
    $welcome_string="Good Morning, "; 
    else if($numeric_date>=12&&$numeric_date<=17) 
    $welcome_string="Good Afternoon, "; 
    else if($numeric_date>=18&&$numeric_date<=23) 
    $welcome_string="Good Evening, "; 

    $adminuser=$_SESSION['park'];
    $ret=mysqli_query($con,"SELECT * from admin where ID='$adminuser'");
    echo $welcome_string, $adminuser; 
?>