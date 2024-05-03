
<?php require "header.php"; 
  date_default_timezone_set("Asia/Kolkata");
$db_time=date("Y-m-d G:i:s", strtotime("- 30 min"));
$q="DELETE FROM `token` WHERE `t_time`<='$db_time'";
mysqli_query($con,$q);
?>
<script language="javascript" src="<?php echo SITE_URL . "assets/js/loginvalid.js"?>"></script>

<div class="container">
<div class="row">
<div class="col-lg-3 col-sm-0 col-xs-0 col-md-3">
</div>
<div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
  <br>
  <br> 
  
  <hr>  
  <h2 class="text-"> Login.</h2>
  <hr/>
<div class="pro-block  " style="padding: 20px 50px; background: white; box-shadow: 0px 2px 28px 0px #7777775e; border-radius: 5px;">
<form name="from1"method="POST" onsubmit="return login()" action="user_auth.php">

  <div class="form-group">
    <label for="email">Email adress</label>
    <input type="text" class="form-control" id="luname" name="luname" placeholder="Enter email">
    <p style="color:red; font-size:14px; padding-left:2px; "id="luname1"></p>
    </div>

  <div class="form-group">
    <label for="pass">Password</label>
    <input type="Password" class="form-control" id="lpass" name="lpass"   placeholder="Enter Password">
    <p style="color:red; font-size:14px; padding-left:2px; "id="lpass1"></p>
    </div>

  
    <a href="<?php echo SITE_URL . "registration.php"; ?>"><u><h3 class="title__line">Don't Have an account</h3></u></a></br>
    <a href="<?php echo SITE_URL . "forget_pwd_form.php"; ?>"><u><h3 class="title__line">Forgot Password??</h3></u></a></br>

  
  <input type="submit" class="btn btn-primary" value="Login" >
</form>
</div>
<hr/>
</div> 
<div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
</div>
</div>
</div>
</br>
<?php require "footer.php"; ?>