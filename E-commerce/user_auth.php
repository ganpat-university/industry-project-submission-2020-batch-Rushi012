<?php
 
	require "include.php";

	$custemail = $_POST["luname"];
	$password = $_POST["lpass"];

	$query = "SELECT * FROM customer_detail WHERE cust_email = '$custemail' AND cust_password =  '$password'";
	 
	$result = mysqli_query($con, $query);
	echo $query;	
	echo "<script type='text/javascript'>";
	
	$redirect = "window.location = 'http://localhost/project1/login.php'";// change while final submisson
	$_SESSION["em"] = "custemail";
	if(mysqli_num_rows($result) == true)
	{
		$_SESSION["user"] = $custemail;
		$redirect = "window.location = 'index.php'";
	}
	else if(mysqli_num_rows($result) == 0)
	{	
		echo "alert('Invalid Username or Password');";
	}
	else
	{
		echo "alert('Something went wrong. Try after sometime');";
	}

	echo $redirect;
	echo "</script>";
?>