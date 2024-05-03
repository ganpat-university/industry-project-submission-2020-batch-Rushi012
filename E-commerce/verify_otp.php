 <?php

include_once("Header.php");

if (!isset($_POST['submit'])) 
{
    

    date_default_timezone_set("Asia/Kolkata");
    $db_time=date("Y-m-d G:i:s", strtotime("- 30 min"));
    $q="DELETE FROM `token` WHERE `t_time`<='$db_time'";
    mysqli_query($con,$q);


    $token=$_REQUEST['token'];
    $em=$_REQUEST['Email'];
    $q="SELECT * FROM `token` WHERE `Email`='$em' and `token`='$token'";

        $t=mysqli_query($con,$q);
        $count=mysqli_num_rows($t);
    if ($count==0) 
    {
      ?>
        <script type="text/javascript">
                 //alert("Password reset token expired.");
                 //window.location.href="verify_otp.php";
            </script>
        <?php
    }
}

if (isset($_POST['submit'])) 
{
  $login_id=$_POST['em'];
  $token=$_POST['token'];
  $otp=$_POST['otp'];

  $q="SELECT * FROM `token` WHERE `Email`='$login_id'";
  $t=mysqli_query($con,$q);
  $count=mysqli_num_rows($t);
  echo($count);
    if ($count>0) 
    {
      while($res=mysqli_fetch_array($t))
      {
      $em=$res[1];
      $token=$res[3];
      $_SESSION['em'] = $em  ;
      $_SESSION['token'] = $token  ;
        if ($otp==$res[4])  
            { 
              echo "lll".$_SESSION['token'];
              echo "kkkkk".$_SESSION['em'];
              echo "<script type='text/javascript'>alert('OTP matched.');</script>";
              echo "<script type='text/javascript'> window.location.href='change_password_form.php?Email=$em&token=$token';</script>'";
            }
            else
            {?>
                        <script type="text/javascript">
                            alert("OTP is incorrect");
                           window.location.href="verify_otp.php";
                        </script>
                        <?php
            }
      }
    }
    else
        {?>
                        <script type="text/javascript">
                           alert("Password reset token expired.");
                           window.location.href="#";
                        </script>
                        <?php
        }   
}
?>

<br/>
<br/>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">
	
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12" style="border: 2px;">
	<h2 class="text-"> Verify OTP</h2>
<hr>
<br>
	<form action="" method="post">
  <div class="form-group">
    <label for="password">Enter OTP</label>
    <input type="text" class="form-control" placeholder="Enter OTP" name="otp" id="pass">
    
  </div>

  
<input type="text" name="token" hidden="hidden" value="<?php echo $token;?>">
            <input type="text" name="em" hidden="hidden" value="<?php echo $em;?>">
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">
	
</div>
</div>
<br>
<br>

<br>

<br>

<br>

<br>

<br>


<br>

<br>

<br>
<br>

<br>

<br>


<?php
include("Footer.php");
?>

