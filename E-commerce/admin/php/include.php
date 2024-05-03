  <?php

	session_start();

	define("SITE_URL", "http://localhost/project1/admin/");

	define("LOGIN_REDIRECT", "<script type='text/javascript'>window.location = 'http://localhost/project1/admin/index.php';</script>");
	
	$page_title = [
		"index1.php" => "Dashbord",
		"pages-profile.php" => "Admin-Profile",
		"user_mangae.php" => "User Manager",
		"Edit_user_by_admin.php" => "User",
		"Home_page.php"=>"Home page",
		"add_slider.php"=>"Slider Add",
		"add_new_arrival.php"=>"Add New Arrival",
		"add_banner.php"=>"Add Banner",
		"add_best.php" => "Best Seller ",
		"add_top_rated.php" => "Add Top Rated",
		"Home_page.php#Slider" => "Home Page Settings",
		"Home_page.php#new_arrival" => "Home Page Settings",
		"Home_page.php#banner" => "Home Page Settings",
		"Home_page.php#best_seller" => "Home Page Settings", 
		"Home_page.php#rated" => "Home Page Settings",
		"women_detail.php" => "Womens Details",
		"mens_detail.php" => "Mens Details",
		"kids_detail.php" => "Kids Details",
		"add_womens.php" => "Add Womens",
		"add_mens.php" => "Add Mens",
		"add_kids.php" => "Add Kids",
		"product_list.php" => "Product Details"



	];

	$con = mysqli_connect("localhost", "root", "", "project1") OR die(mysqli_connect_error());
?>