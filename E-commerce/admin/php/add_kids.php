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
                        <h4 class="text-themecolor">Mens-Details</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Mens-Details</li>
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
                                        <label class="col-md-12">Product Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="title" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Product-Description</label>
                                        <div class="col-md-12">
                                        <input type="text" id="desc"  name="desc"class="form-control form-control-line">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Product-Image</label>
                                        <div class="col-md-12">
                                            <input type="file" name="image"  class="form-control form-control-line">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-12">Product-Price (Only in Rupess)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="price"  class="form-control form-control-line">
                                        </div>
                                    </div>
                             <div class="form-group">
                                        <div class="col-sm-12" align="center">
                                            <input type="submit" class="btn btn-success" name="sub"  value="Add Product">
                                        </div>
                                    </div>
                            </form>
                            <?php
                            if(isset($_POST['sub']))
                             {
                              $title=$_POST['title'];
                            $desc=$_POST['desc'];
                            $price=$_POST['price'];
                            $image = $_FILES['image']['name'];
                          $extension = pathinfo($image, PATHINFO_EXTENSION);
                          $filename = pathinfo($image, PATHINFO_FILENAME);
                          $image1 = uniqid($filename).'.'.$extension;
                         $destination = 'Images/products/' . $image1;

                          $file = $_FILES['image']['tmp_name'];
                          $size = $_FILES['image']['size'];
                          if (!in_array($extension, ['JPG','jpg','JPEG','jpeg','PDF','pdf'])) {
                                echo "<script>alert('You file extension must be jpg or jpeg or Pdf');</script>";
                            } else if ($_FILES['image']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
                             echo "<script>alert('image is too Large');</script>";

                            } else {if (move_uploaded_file($file, $destination)) {
                         $sql =  $sql = "INSERT INTO `product_detail`(`cat_id`, `pr_name`, `pr_price`, `pr_image`, `pr_details`) VALUES 
                         ('3','$title','$price','$image1','$desc')";
                                    if ($res=mysqli_query($con, $sql)) {
                                        echo"<script>alert('Your product has ben uploaded')</script>";
                                        echo"<script>window.location ='kids_detail.php'</script>";
                                                              
                                    }
                                } 
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
    ?>