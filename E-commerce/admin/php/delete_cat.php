<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     $em=$_REQUEST['cat_id'];
     $q="SELECT * FROM `category_detail` WHERE `cat_id`='$em'";
     $res=mysqli_query($con,$q);

       
    
     while ($f=mysqli_fetch_array($res))
    {
	   	  $q1="DELETE FROM `category_detail` WHERE `cat_id`='$em' ";
           $run=mysqli_query($con,$q1);
           echo "<script>alert('Category is been Deleted');</script>";  
           echo "<script type='text/javascript'>window.location = 'category.php'</script>";

    } 
 }
?>