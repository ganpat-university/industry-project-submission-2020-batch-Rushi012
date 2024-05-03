<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     require "header.php";   
    ?>   
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
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
                        <h4 class="text-themecolor">Add-Category</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Add-Category</li>
                            </ol>
                            
                    </div>
                </div>
            </div>
                   <div class="row">
                    
                    <div class="col-lg-3 col-xlg-3 col-md-12 col-sm-12">
                       
                    </div>
                    <div class="col-lg-6 col-xlg-3">
                    <div class="card">
                    <div class="card-body">
                                <form class="form-horizontal form-material" action="" method="POST" enctype="multipart/form-data" >
                                     <div class="form-group">
                                        <label class="col-md-12">Add - Category</label>
                                        <div class="col-md-12">
                                            <input type="text" name="cat"  class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12" align="center">
                                            <input type="submit" class="btn btn-success" name="sub"  value="Add Category">
                                        </div>
                                    </div>
                            </form>
                            <?php
                            if(isset($_POST['sub']))
                             {
                              $q2="SELECT * FROM `category_detail`";
                               $res2=mysqli_query($con,$q2);
                               $most=mysqli_num_rows($res2);
                               if($most==3)
                               {
                            
                                echo"<script>alert('You have reached of maximum adding')</script>";
                               echo"<script>window.location ='category.php'</script>";
                              
                               }
                               else{
                                $name=$_POST['cat'];
                                $q = "INSERT INTO `category_detail`(`cat_name`) VALUES ('$name')";
                                $run=mysqli_query($con,$q);
                                    echo "<script>alert('Data Updated Succesfully');</script>";
                                    echo "<script type='text/javascript'>window.location = 'category.php'</script>";
                                    
                                
                                }
                            }
 ?>

                            </div>
                    </div>
                    </div> 
                                     

            
                    <!-- Column -->


                </div>
                <!-- Row -->
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
   <?php require "footer.php"?>
   <?php
   }

   else
    {
        echo LOGIN_REDIRECT;
    }