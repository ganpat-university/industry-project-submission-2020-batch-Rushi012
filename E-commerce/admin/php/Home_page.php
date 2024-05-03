<?php
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     require "header.php";    
    ?>

	<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Home Page</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
                                <li class="breadcrumb-item active">Home Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row" id="Slider" >
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <span> <h4 class="card-title">Slider <a href="add_slider.php"><input type="button" style="margin-left:90%;" value="Add" class="ogs-button"></a></h4></span>

                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                            <th>Title</th>
                                            <th>Collection</th>
                                            <th>Image</th>
                                            <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $q1="SELECT * FROM `slider`";
        								$res=mysqli_query($con,$q1);
                                            while ($a=mysqli_fetch_array($res))
                                         {
                                        ?>
                                            <tr>
                                                <td><?php echo $a[1]; ?></td>
                                                <td><?php echo $a[2]; ?></td>
                                                <td><img style="width: 200px; height: 100px;"src="Images/Slider/<?php echo $a[3]; ?>"></td>
                                               
                                                <td><a href="delete_slider.php?sl_id=<?php echo $a[0]; ?>"><input type="button" value="Delete" class="ogs-button" ></a></td>
                                          

                                                
                                            </tr>
                                            
                                        
                                            <?php                                   
                            

                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="new_arrival" >
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <span> <h4 class="card-title">New Arrival<a href="add_new_arrival.php"><input type="button" style="margin-left:90%;" value="Add" class="ogs-button"></a></h4></span>

                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                            <th>Product-Name</th>
                                            <th>Product-Description</th>
                                            <th>Product-Image</th>
                                            <th>Product-price</th>
                                            <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $q2="SELECT * FROM `product_detail` WHERE main_id='1'";
                                        $res1=mysqli_query($con,$q2);
                                            while ($b=mysqli_fetch_array($res1))
                                         {
                                        ?>
                                            <tr>
                                                <td><?php echo $b[4]; ?></td>
                                                <td><?php echo $b[7]; ?></td>
                                                <td><img style="width: 200px; height: 100px;"src="Images/new_arrival/<?php echo $b[6]; ?>"></td>
                                                <td><?php echo $b[5]; ?></td>
                                               
                                                <td><a href="delete_new_arrival.php?pr_id=<?php echo $b[0]; ?>"><input type="button" value="Delete" class="ogs-button" ></a></td>
                                          

                                                
                                            </tr>
                                            
                                        
                                            <?php                                   
                            

                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="banner">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <span> <h4 class="card-title">Populer This week<a href="add_banner.php"><input type="button" style="margin-left:90%;" value="Add" class="ogs-button"></a></h4></span>

                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                            <th>Banner</th>
                                            <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $q3="SELECT * FROM `banner`";
                                        $res2=mysqli_query($con,$q3);
                                            while ($c=mysqli_fetch_array($res2))
                                         {
                                        ?>
                                            <tr>
                                                <td><img style="width: 500px; height: 250px;"src="Images/banner/<?php echo $c[1]; ?>"></td>   
                                                <td><a href="delete_banner.php?id=<?php echo $c[0]; ?>"><input type="button" value="Delete" class="ogs-button" ></a></td>
                                          

                                                
                                            </tr>
                                            
                                        
                                            <?php                                   
                            

                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="best_seller">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <span> <h4 class="card-title">Best Seller<a href="add_best.php"><input type="button" style="margin-left:90%;" value="Add" class="ogs-button"></a></h4></span>

                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                            <th>Product-Name</th>
                                            <th>Product-Description</th>
                                            <th>Product-Image</th>
                                            <th>Product-price</th>
                                            <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $q4="SELECT * FROM `product_detail` WHERE main_id='2'";
                                        $res4=mysqli_query($con,$q4);
                                            while ($d=mysqli_fetch_array($res4))
                                         {
                                        ?>
                                            <tr>
                                                <td><?php echo $d[4]; ?></td>
                                                <td><?php echo $d[7]; ?></td>
                                                <td><img style="width: 200px; height: 100px;"src="Images/new_arrival/<?php echo $d[6]; ?>"></td>
                                                <td><?php echo $d[5]; ?></td>
                                               
                                                <td><a href="delete_best.php?pr_id=<?php echo $d[0]; ?>"><input type="button" value="Delete" class="ogs-button" ></a></td>
                                          

                                                
                                            </tr>
                                            
                                        
                                            <?php                                   
                            

                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="rated">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <span> <h4 class="card-title">Top Rated<a href="add_top_rated.php"><input type="button" style="margin-left:90%;" value="Add" class="ogs-button"></a></h4></span>

                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                            <th>Product-Name</th>
                                            <th>Product-Description</th>
                                            <th>Product-Image</th>
                                            <th>Product-price</th>
                                            <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $q5="SELECT * FROM `product_detail` WHERE main_id='3'";
                                        $res5=mysqli_query($con,$q5);
                                            while ($e=mysqli_fetch_array($res5))
                                         {
                                        ?>
                                            <tr>
                                                <td><?php echo $e[4]; ?></td>
                                                <td><?php echo $e[7]; ?></td>
                                                <td><img style="width: 200px; height: 100px;"src="Images/new_arrival/<?php echo $e[6]; ?>"></td>
                                                <td><?php echo $e[5]; ?></td>
                                               
                                                <td><a href="delete_top.php?pr_id=<?php echo $e[0]; ?>"><input type="button" value="Delete" class="ogs-button" ></a></td>
                                          

                                                
                                            </tr>
                                            
                                        
                                            <?php                                   
                            

                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->

        <!-- ============================================================== -->
        
    <?php require "footer.php"?>
   <?php
   }
   else
    {
        echo LOGIN_REDIRECT;
    }
?>