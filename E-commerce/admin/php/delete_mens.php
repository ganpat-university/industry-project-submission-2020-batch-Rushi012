 <?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     $em=$_REQUEST['pr_id'];
     $q="SELECT * FROM `product_detail` WHERE `pr_id`='$em'";
     $res=mysqli_query($con,$q);

       
    
     while ($f=mysqli_fetch_array($res))
    {
	   	  $q1="DELETE FROM `product_detail` WHERE `pr_id`='$em' ";
           $run=mysqli_query($con,$q1);
           unlink('Images/products/'.$f[6]);
           echo "<script>alert('Product is been Deleted');</script>";  
           echo "<script type='text/javascript'>window.location = 'mens_detail.php'</script>";

    } 
 }
?>