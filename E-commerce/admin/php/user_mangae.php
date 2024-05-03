<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) && $_SESSION["user"] == "loggedin" )
    {
        $q="select * from customer_detail ";
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
                        <h4 class="text-themecolor">Manage User</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage user</li>
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
                                <h4 class="card-title">User Manager</h4>
                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                            <th>Full Name</th>
                                            <th>Email ID</th>
                                            <th>Mobile</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Zipcode</th>
                                            <th>Status </th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Activate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            while ($f=mysqli_fetch_array($res))
                                         {
                                        ?>
                                            <tr>
                                                <td><?php echo $f[0]; ?></td>
                                                <td><?php echo $f[1]; ?></td>
                                                <td><?php echo $f[2]; ?></td>
                                                <td><?php echo $f[3]; ?></td>
                                                <td><?php echo $f[4]; ?></td>
                                                <td><?php echo $f[5]; ?></td>
                                                <td><?php echo $f[6]; ?></td>
                                                <td><?php echo $f[7]; ?></td>
                                                <td><?php echo $f[8]; ?></td>
                                                <td><?php echo $f[9]; ?></td>

                                                <td><a href="Edit_user_by_admin.php?email=<?php echo $f[1]; ?>">
                                            <input type="button" value="Edit" class="ogs-button"></a></td>
                                                <td><a href="delete_user_by_admin.php?email=<?php echo $f[1]; ?>"><input type="button" value="Delete" class="ogs-button" ></a></td>
                                            <td><a href="activate_user_by_admin.php?email=<?php echo $f[1]; ?>"><input type="button" value="Active" class="ogs-button"></a></td>

                                                
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