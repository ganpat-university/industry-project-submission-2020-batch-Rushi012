<?php require 'include.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $page_title[ basename($_SERVER['PHP_SELF']) ]; ?></title>
	
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

	<!-- All css files are included here. -->
	<!-- Bootstrap fremwork main css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Owl Carousel min css -->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<!-- This core.css file contents all plugings css file. -->
	<link rel="stylesheet" href="assets/css/core.css">
	<!-- Theme shortcodes/elements style -->
	<link rel="stylesheet" href="assets/css/shortcodes.css">
	<!-- Theme main style -->
	<link rel="stylesheet" href="assets/css/ogs-style.css">
	<!-- Responsive css -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- User style -->
	<link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/front_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/aos.css">
 
    



	<!-- Modernizr JS -->
	<script src="assets/js/modernizr-3.5.0.min.js"></script>


</head>
<body>
	<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
<!-- Body main wrapper start -->
<div class="wrapper ">
    <!-- Start Header Style -->
    <header id="htc__header" class="htc__header__area header--one">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container ">
                <div class="row"style="height: 80px;">
                    <div class="menumenu__container clearfix">
                        <div class="col-lg-3 col-md-2 col-sm-3 col-xs-5"> 
                            <div class="logo">
                                 <a href="index.php"><img src="assets/img/logo/5.png" alt='logo images'></a>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-5 col-xs-3">
                            <nav class="main__menu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Home</a></li>
                                    <li class="drop">
                                    	<a href="Women.php">Women</a>
                                        
                                    </li>
                                    <li class="drop">
                                    	<a href="men.php">Men</a>
                                        
                                    </li>
                                    <li class="drop">
                                    	<a href="kids.php">Kids</a>
                                        
                                    </li>
                                   <li><a href="contact.php">contact</a></li>
                                </ul>
                            </nav>

                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li class="drop"><a href="index.php">Home</a></li>
	                                    <li class="drop">
	                                    	<a href="#">Women</a>
	                                        
	                                    </li>
	                                    <li class="drop">
	                                    	<a href="#">Men</a>
	                                        
	                                    </li>
	                                    <li class="drop">
	                                    	<a href="kids.php">Kids</a>
	                                    </li>
	                                    <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                            <div class="header__right">
                                <div class="header__search search search__open">
                                    <a href=#><i class="icon-magnifier icons"></i></a>
                                </div>
                                <div class="header__account">
                                    <a href="login.php"><i class="icon-user icons"></i></a>
                                </div>
                            <div>
                                <br>
                                <br>
                            </div>
                            </div>
                         </div>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- End Header Area -->

    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
        <!-- Start Search Popap -->
        <div class="search__area">
            <div class="container" >
                <div class="row" >
                    <div class="col-md-12" >
                        <div class="search__inner">
                            <form action="#" method="post">
                                <input placeholder="Search here... " type="text">
                                <button type="submit"></button>
                            </form>
                            <div class="search__close__btn">
                                <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Popap -->
    </div>
    <!-- End Offset Wrapper -->