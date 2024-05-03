<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     $em=$_REQUEST['sl_id'];
     $q="SELECT * FROM `slider` WHERE `sl_id`='$em'";
     $res=mysqli_query($con,$q);

       
    
     while ($f=mysqli_fetch_array($res))
    {
	   	  $q1="DELETE FROM `slider` WHERE `sl_id`='$em' ";
           $run=mysqli_query($con,$q1);
           unlink('Images/Slider/'.$f[3]);
           echo "<script>alert('Slider is been Deleted');</script>";  
           echo "<script type='text/javascript'>window.location = 'Home_page.php'</script>";

    } 
 }
?>