 <!DOCTYPE html>
<html lang="en">

<head>
           
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php echo $page_title[basename($_SERVER["PHP_SELF"])]; ?></title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
        <link href="dist/css/admin_style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin panel</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img style="height:40px; width:200px;"src="Images/5.png" alt="homepage" class="dark-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class=""></i></a>
                            <form class="app-search">
                               
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                         <li  style="padding-top: 24px;padding-right:24px"><a href="logout.php"><h4>Logout</h4></a></li>
                        </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <center><span><img style="height:50px; width:200px;" src="Images/5.png" alt="Admin panel"></span></center>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index1.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.php" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="user_mangae.php" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu"></span>Manage user</a></li>
                       <li> <a class="waves-effect waves-dark" href="product_list.php" aria-expanded="false"><i class=" fa fa-gift"></i><span class="hide-menu"></span>All Product List</a></li>
                        <li class="dropdown">
                        <a class="waves-effect waves-dark dropdown-toggle" href="Home_page.php" data-toggle="dropdown">
                        <i class=" fa fa-home"></i>Home Page</a>  <span class="caret"></span>
                        <ul class="dropdown-menu">
                          <li><a href="Home_page.php#Slider">Slider</a></li>
                          <li><a href="Home_page.php#new_arrival">New Arrival</a></li>
                          <li><a href="Home_page.php#banner">Banner</a></li>
                          <li><a href="Home_page.php#best_seller">Best_Seller</a></li>
                          <li><a href="Home_page.php#rated">Top Rated</a></li>
                        </ul>
                      </li>
                      <li> <a class="waves-effect waves-dark" href="women_detail.php" aria-expanded="false"><i class=" fa fa-gift"></i><span class="hide-menu"></span>Product-Womens</a></li>
                      <li> <a class="waves-effect waves-dark" href="mens_detail.php" aria-expanded="false"><i class=" fa fa-gift"></i><span class="hide-menu"></span>Product-mens</a></li>
                      <li> <a class="waves-effect waves-dark" href="kids_detail.php" aria-expanded="false"><i class=" fa fa-gift"></i><span class="hide-menu"></span>Product-Kids</a></li>
                      
                    </div>
                                                
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
