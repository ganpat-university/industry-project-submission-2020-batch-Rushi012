<?php 
include_once "connection.php";
if(isset($_POST ['sub']))
{
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $addr=$_POST['addr'];
  $country=$_POST['country'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $code=$_POST['code'];

  $q="INSERT INTO `customer_detail`(`cust_name`, `cust_email`, `cust_phone`, `cust_password`, `cust_address`, `cust_city`, `cust_state`, `cust_country`, `cust_zip_code`) VALUES ('$name','$phone','$email','$pass','$addr','$city','$state','$city','$code')";
   echo $q;
    mysqli_query($con , $q);
}
?>