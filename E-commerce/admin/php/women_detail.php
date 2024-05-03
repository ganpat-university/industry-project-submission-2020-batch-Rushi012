 <?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
        $q="SELECT * FROM `product_detail` WHERE cat_id = '1'";
        $res=mysqli_query($con,$q);
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
                        <h4 class="text-themecolor">Womens-Details</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
                                <li class="breadcrumb-item active">Womens-Details</li>
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
                <div class="row" >
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <span><h4 class="card-title">Womens-Details<a style="margin-left:80%;" href="add_womens.php"><input type="button"  value="Add" class="ogs-button"></a></h4></span>
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
                                            while ($f=mysqli_fetch_array($res))
                                         {
                                        ?>
                                            <tr>
                                                <td><?php echo $f[4]; ?></td>
                                                <td><?php echo $f[7]; ?></td>
                                                <td><img style="width: 200px; height: 100px;"src="Images/products/<?php echo $f[6]; ?>"></td>
                                                <td><?php echo $f[5]; ?></td>
                                                
                                                
                                            <td><a href="delete_womens.php?pr_id=<?php echo $f[0]; ?>"><input type="button" value="Delete" class="ogs-button"></a></td>

                                                
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
        <footer class="footer">
<?php require "footer.php"?>
   <?php
   }

   else
    {
        echo LOGIN_REDIRECT;
    }
?>