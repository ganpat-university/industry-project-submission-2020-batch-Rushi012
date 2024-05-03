<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     $em=$_REQUEST['id'];
     $q="SELECT * FROM `banner` WHERE `ban_id`='$em'";
     $res=mysqli_query($con,$q);

       
    
     while ($f=mysqli_fetch_array($res))
    {
	   	  $q1="DELETE FROM `banner` WHERE `ban_id`='$em' ";
           $run=mysqli_query($con,$q1);
           unlink('Images/banner/'.$f[1]);
           echo "<script>alert('Product is been Deleted');</script>";  
           echo "<script type='text/javascript'>window.location = 'Home_page.php'</script>";

    } 
 }
?>