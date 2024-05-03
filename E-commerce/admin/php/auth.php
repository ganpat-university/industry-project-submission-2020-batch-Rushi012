 	<?php
 
	require "include.php";

	$user_name = $_POST["userName"];
	$password = $_POST["userPassword"];

	$query = "SELECT * FROM admin_user_detail WHERE user_name = '$user_name' AND user_password = '$password'";
	
	$result = mysqli_query($con, $query);

	echo "<script type='text/javascript'>";
	
	$redirect = "window.location = 'http://localhost/project1/admin'";// change while final submisson
	$_SESSION["em"] = "$user_name";
	if(mysqli_num_rows($result) == 1)
	{
		$_SESSION["user"] = "loggedin";
		$redirect = "window.location = 'index1.php'";

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