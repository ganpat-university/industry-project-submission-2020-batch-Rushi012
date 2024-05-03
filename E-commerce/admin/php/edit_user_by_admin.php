<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
     require "header.php";    
     $em=$_REQUEST['email'];
     $q="SELECT * FROM `customer_detail` WHERE `cust_email`='$em'";

     $res=mysqli_query($con,$q);
    ?> 
     <?php

                    while ($f=mysqli_fetch_array($res))
                    {
                         
                         
                     ?>
                     <script type="text/javascript" src="dist/js/valid_admin.js"></script>
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
                        <h4 class="text-themecolor">User:- <?php echo $f[0]; ?> </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">User </li>
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
                                <form class="form-horizontal form-material"  name="form1"onsubmit="return valid();" action="" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" id="name2" name="name" value="<?php echo $f[0]; ?>" class="form-control form-control-line">
                                            <p style="color:red; font-size:14px; padding-left:2px; " id="name1"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" id="email" class="col-md-12">Email Id</label>
                                        <div class="col-md-12">
                                            <input type="text" id="name"  name="uname"value= "<?php echo $f[1]; ?>" readonly class="form-control form-control-line" name="example-email" id="example-email">
                                            <p style="color:red; font-size:14px; padding-left:2px; "id="email1"></p>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-email"  class="col-md-12">Mobile No.</label>
                                        <div class="col-md-12">
                                            <input type="text" id="phone" name="phn"value= "<?php echo $f[2]; ?>"  class="form-control form-control-line">
                                            <p style="color:red; font-size:14px; padding-left:2px;" id="phn1"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" id="pass" name="pass"id="pass"value= "<?php echo $f[3]; ?>"  class="form-control form-control-line " >
                                            <span id="pass" class="fa fa-fw fa-eye ogs-field-icon toggle-password" onclick="myFunction()"></span>
                                    
                                          
                                            <script>
                                                function myFunction() {

                                            var x = document.getElementById("pass");
                                            if (x.type == "password")
                                                 {
                                                 x.type = "text";
                                                } 
                                                else 
                                                {
                                                 x.type = "password";
                                                 }
                                            }

                                            </script>
                                            <p style="color:red; font-size:14px; padding-left:2px; "id="pass1"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" id="addr" name="add"value= "<?php echo $f[4]; ?>" class="form-control form-control-line">
                                            <p style="color:red; font-size:14px; padding-left:2px; "id="addr1"></p>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Country</label>
                                        <div class="col-md-12">
                                            <input type="text" id="country" name="country"value= "<?php echo $f[7]; ?>" class="form-control form-control-line">
                                            <p style="color:red; font-size:14px; padding-left:2px; "id="country1"></p>
                                        </div>
                                      </div>
                                        <div class="form-group">
                                          <label class="col-md-12">State</label>
                                        <div class="col-md-12">
                                            <input type="text" id="state" name="state" value= "<?php echo $f[6]; ?>" class="form-control form-control-line">
                                            <p style="color:red; font-size:14px; padding-left:2px; "id="state1"></p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">City</label>
                                        <div class="col-md-12">
                                            <input type="text" id="city" name="city"value= "<?php echo $f[5]; ?>" class="form-control form-control-line">
                                            <p style="color:red; font-size:14px; padding-left:2px; "id="city1"></p>
                                        </div>
                                    </div>
                                    
                                   
                                         <div class="form-group">
                                        <label class="col-md-12">Zip-Code</label>
                                        <div class="col-md-12">
                                            <input type="text" id="code"name="code"value= "<?php echo $f[8]; ?>" class="form-control form-control-line">
                                               <p style="color:red; font-size:14px; padding-left:2px; "id="code1"></p>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12" align="center">
                                            <input type="submit" class="btn btn-success" name="sub" onClick="refresh" value="Update User">
                                        </div>
                                    </div>
                                </form>



                                    <?php
                                  if(isset($_POST ['sub']))
                                    {
                                    $em=$_POST['uname'];
                                    $name=$_POST['name'];
                                    $pass=$_POST['pass'];
                                    $phone=$_POST['phn'];
                                    $add=$_POST['add'];
                                    $cou=$_POST['country'];
                                    $state=$_POST['state'];
                                    $city=$_POST['city'];
                                    $code=$_POST['code'];

                                    $q="UPDATE `customer_detail` SET `cust_name`='$name' ,`cust_phone`='$phone' ,`cust_password`='$pass',`cust_address`='$add',`cust_city`='$city',`cust_state`='$state',`cust_country`='$cou',`cust_zip_code`='$code' WHERE `cust_email`='$em' ";
                                      
                                    $run=mysqli_query($con,$q);
                                    echo "<script>alert('Data Updated Succesfully');</script>";
                                    echo "<script type='text/javascript'>window.location = 'user_mangae.php'</script>";
                                     } ?>
                                 

                                <?php                                   
                            

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