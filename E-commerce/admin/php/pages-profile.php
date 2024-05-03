<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     require "header.php"; 


                    $c="SELECT * FROM `admin_user_detail` WHERE user_name ='".$_SESSION['em']."'";
                    $res=mysqli_query($con,$c) ;
                   

           
    ?>      
           <?php

                    while ($f=mysqli_fetch_array($res))
                    {
                         
                         
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
                        <h4 class="text-themecolor">Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                            
                    </div>
                </div>
            </div>

                     <div class="row">
                    
                    <div class="col-lg-3 col-xlg-3 col-md-12 col-sm-12">
                       
                    </div>
                  
                        
                    

            
                    <div class="col-lg-6 col-xlg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material"  action="" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="<?php echo $f[3]; ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" name="uname"value= "<?php echo $f[1]; ?>" readonly class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="pass"id="pass"value= "<?php echo $f[2]; ?>"  class="form-control form-control-line">
                                            <br>
                                            <input type="checkbox" onclick="myFunction()">Show Password
                                            <script>
                                                function myFunction() {

                                            var x = document.getElementById("pass");
                                            if (x.type === "password")
                                                 {
                                                 x.type = "text";
                                                } 
                                                else 
                                                {
                                                 x.type = "password";
                                                 }
                                            }

                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone"value= "<?php echo $f[4]; ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Country</label>
                                        <div class="col-md-12">
                                            <input type="text" name="country"value= "<?php echo $f[5]; ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12" align="center">
                                            <input type="submit" class="btn btn-success" name="sub" onClick="refresh" value="Update Profile">
                                        </div>
                                    </div>
                                    <?php
                                  if(isset($_POST ['sub']))
                                    {
                                    $em=$_POST['uname'];
                                    $name=$_POST['name'];
                                    $pass=$_POST['pass'];
                                    $phone=$_POST['phone'];
                                    $cou=$_POST['country'];
                                    $q="UPDATE `admin_user_detail` SET `user_password`='$pass',`admin_name`='$name',`admin_phone.`='$phone',`admin_country`='$cou' WHERE user_name='$em'";
                                      
                                    $run=mysqli_query($con,$q);
                                    echo "<script>alert('Data Updated Succesfully');</script>";
                                    echo "<script type='text/javascript'>window.location = 'index1.php'</script>";
                                     } ?>
                                 </form>

                                <?php                                   
                            

                                 }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

             <div class="col-lg-3 col-xlg-3 col-md-12 col-sm-12">  
             </div>       
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
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ===================== ========================================= -->
 
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
</div>
</div>

   <?php require "footer.php"?>
   

   <?php
   }

   else
    {
        echo LOGIN_REDIRECT;
    }
?>