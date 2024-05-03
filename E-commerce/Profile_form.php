<?php
   
        require "include.php";
    if( isset($_SESSION["user"]) == true)
    {
      $em=$_SESSION["user"] ;
      $q="SELECT * FROM `customer_detail` WHERE `cust_email`='$em'";
      $res=mysqli_query($con,$q);
?>

<?php require "after_header.php"; ?>

<div class="container">
<div class="row">
<div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
</div>
<div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
  <br>
  <br>
  
  <hr>  
  <h2 class="text-"> Profile.</h2>
  <hr/>
<div class="pro-block " style="padding: 20px 50px; background: white; box-shadow: 0px 2px 28px 0px #7777775e; border-radius: 5px;">
<?php
 while($f=mysqli_fetch_array($res))
{
  ?>
<form name="form1" method="POST"onsubmit="return valid()" action="">

  <div class="form-group">
    <label for="name">Full name</label>
       <input type="text" class="form-control" id="name" value="<?php echo $f[0]; ?>" name="name"  >
    </div>


  <div class="form-group">
    <label for="email">Email adress</label>
<input type="email"class="form-control" id="email" value="<?php echo $f[1]; ?>" readonly name="email"  />
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

    <div class="form-group">
      <label for="Phone">Phone number</label>
      <input type="text" class="form-control" id="phone" value="<?php echo $f[2]; ?>" name="phone"   >
  </div>

  <div class="form-group">
    <label for="pass">Password</label>
    <input type="Password" class="form-control" id="pass" value="<?php echo $f[3]; ?>" name="pass"   >
    </div>

    
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" id="addr"  name="addr"   ><?php echo $f[4]; ?></textarea> 
    </div>

  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" class="form-control" id="country" value="<?php echo $f[5]; ?>" name="country"   >
    </div>

  <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" value="<?php echo $f[6]; ?>" name="state"   >
    </div>
    
    <div class="form-group">
    <label for="City">City</label>
    <input type="text" class="form-control" id="city" value="<?php echo $f[7]; ?>" name="city"   >
    </div>

    <div class="form-group">
    <label for="zip-code">Zip-code</label>
    <input type="text" class="form-control" id="code" value="<?php echo $f[8]; ?>" name="code"   >
    </div>
  <input type="submit" class="btn btn-primary" value="Submit" name="sub">


  <a class="btn btn-primary " href="logout.php">logout</a>
</form>
<?php
}
?>
</div>
<hr/>
</div>
<div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
</div>
</div>
</div>
</br>
<?php require "footer.php"; ?>

<?php
   }

   else
    {
        echo LOGIN_REDIRECT;
    }
?>