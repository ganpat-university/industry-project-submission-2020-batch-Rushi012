 <?php


include_once("Header.php");
include('PHPMailerAutoload.php');
//date_default_timezone_set("Asia/Kolkata");
//$db_time=date("Y-m-d G:i:s", strtotime("- 5 min"));
?>
<div class="container">
<div class="row">
<div class="col-lg-3 col-sm-0 col-xs-0 col-md-3">
</div>
<div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
  <br>
  <br> 
  
  <hr>  
  <h2 class="text-"> Forgot Password.</h2>
  <hr/>
<div class="pro-block  " style="padding: 20px 50px; background: white; box-shadow: 0px 2px 28px 0px #7777775e; border-radius: 5px;">
<form name="from1"method="POST" action="">

  <div class="form-group">
    <label for="email">Email adress</label>
    <input type="text" class="form-control" id="email2" name="email2" placeholder="Enter email">
    <p style="color:red; font-size:14px; padding-left:2px; "id="email2"></p>
    </div>
  
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
	</form>
	<?php
if(isset($_POST['sub'])) {
    $em = $_POST['email2'];

    $q = "SELECT * FROM `customer_detail` WHERE `cust_email`='$em'";

    $result = mysqli_query($con, $q);
    $count = mysqli_num_rows($result);

    if($count == 1) {
        $q1 = "SELECT * FROM token WHERE Email='$em'";
        $result_em = mysqli_query($con, $q1);
        $count_em = mysqli_num_rows($result_em);

        if($count_em == 1) {
            echo "<script type='text/javascript'>alert('A Password reset link is already sent to your email. A new link will be generated after the old link expires.');</script>";
        } else {
            date_default_timezone_set("Asia/Kolkata");
            $s_time = date("Y-m-d G:i:s");
            $token = hash('sha512', $s_time);
            $otp = mt_rand(100000, 999999);
            $ins_token = "INSERT INTO `token`(`Email`, `t_time`, `token`, `otp`) VALUES ('$em','$s_time','$token','$otp')";

            if (mysqli_query($con, $ins_token)) {
                $link = "http://localhost/project1/verify_otp.php?Email=$em&token=$token";
                $mail = new PHPMailer(true); // Enable verbose debug output

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'dummyitem123@gmail.com';
                    $mail->Password = 'dpqs fsby thzv umwk';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;

                    $mail->setFrom('dummyitem123@gmail.com', 'Iconic');
                    $mail->addAddress($em);
                    $mail->addReplyTo('dummyitem123@gmail.com', 'Iconic');

                    $mail->isHTML(true);
                    $mail->Subject = 'Password reset link for Iconic';
                    $mail->Body = 'OTP for password reset is ' . $otp . '<br/>This is the password reset link for your account with Iconic. The link is valid for 24 hours.<br/><a href="' . $link . '">Click here to reset your password</a><br/>Please use the forgot password facility again if the link has expired';

                    $mail->send();
                    echo '<script>alert("Password reset link has been sent to your registered email. Please check the spam folder as well.");</script>';
                } catch (Exception $e) {
                    echo '<script>alert("Failed to reset the password. Please try again later.");</script>';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('No such email address is registered'); window.location='forget_pwd_form.php';</script>";
    }
}
?>
</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">
	
</div>
</div>

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

<?php require "footer.php"; ?>


