<?php 
require ('include.php');
$eid = $_REQUEST['email'];
$q="select * from customer_detail where cust_email='$eid'";
$count=mysqli_num_rows(mysqli_query($con,$q));
if($count==1)
{
	echo $count;
}
else
{
	echo $count;

}
?>