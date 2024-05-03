	<?php
	define("SITE_URL", "http://localhost/project1/");

	define("LOGIN_REDIRECT", "<script type='text/javascript'>window.location = 'http://localhost/project1/login.php';</script>");
	$page_title = [
		"index.php" => "Home",
		"registration.php" => "Registration",
		"contact.php" => "Contact Us",
		"anni.php" => "Anniversary",
		"bith.php" => "Birthday",
		"marriage.php" => "Marriage",
		"p1.php" => "LOVE BOUQUET",
		"login.php" => "Login",
		"Women.php" => "Women",
		"men.php" => "Men",
		"login.php" => "Login",
		"kids.php" => "Kids",
		"forgot.php" => "Forgot Password",
		"after_index.php" => "Home",
		"Profile_form.php" => "Profile",
		"product-details.php"=>"Product",
		"forget_pwd_form.php"=>"Forgot Password",
		"verify_otp.php" => "Verify Otp",
		"change_password_form.php"=>"change Password",



	];
	$con = mysqli_connect("localhost", "root", "", "project1") OR die(mysqli_connect_error()); 
?>
