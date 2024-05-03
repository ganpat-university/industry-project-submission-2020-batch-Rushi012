<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     $em=$_REQUEST['email'];
     $q="SELECT * FROM `customer_detail` WHERE `cust_email`='$em'";
        $res=mysqli_query($con,$q);
       
    
     while ($f=mysqli_fetch_array($res))
    {
	   	  $q1="UPDATE `customer_detail` SET `cust_status`='In-Active' WHERE `cust_email`='$em' ";
           $run=mysqli_query($con,$q1);
           echo "<script>alert('User is been In active');</script>";  
           echo "<script type='text/javascript'>window.location = 'user_mangae.php'</script>";

    } 
 }
?>