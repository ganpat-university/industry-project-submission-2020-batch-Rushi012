
 <?php
session_start();

include_once("Header.php");
date_default_timezone_set("Asia/Kolkata");
$db_time=date("Y-m-d G:i:s", strtotime("- 30 min"));
$q="DELETE FROM `token` WHERE `t_time`<='$db_time'";
mysqli_query($con,$q);

$token=$_REQUEST['token'];
$em=$_REQUEST['Email'];

$q="SELECT * FROM `token` WHERE `Email`='$em' and `token`='$token'";
//echo $q;
    $t=mysqli_query($con,$q);
    $count=mysqli_num_rows($t);
    if ($count==0) 
    {
        ?>
        <script type="text/javascript">
                 //alert("Password reset token expired.");
                //window.location.href="login.php";
        </script>
        <?php
    }
// echo "$db_time";
if (isset($_POST['submit'])) 
{
  $login_id=$_POST['em'];
  $token=$_POST['token'];
  $passwd=$_POST['npwd'];

  $q="select * from token WHERE Email='$login_id' and token='$token'";
  $t=mysqli_query($con,$q);
  $count=mysqli_num_rows($t);
  $temp=mysqli_fetch_assoc($t);
  echo($q);

    if ($count>0) 
    {

                $q="UPDATE `customer_detail` SET `cust_password`='$passwd' WHERE `cust_email`='$login_id'";
                if (mysqli_query($con,$q)) 
                {
                    $q="DELETE FROM `token` WHERE Email='$login_id'";
                    if (mysqli_query($con,$q)) 
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Password reset Successfull.");
                            window.location.href="login.php";
                        </script>
                        <?php
                    }
                    else
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Error in deleting Token");
                            window.location.href="login.php";
                        </script>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert("Error in resetting password.");
                            window.location.href="login.php";
                        </script>
                        <?php
                }   
            ?>
            <?php
       // }
        // else
        // {
        //     ?>
        //     <script type="text/javascript">
        //         alert("Password reset token23 expired.");
        //         //window.location.href="login.php";
        //     </script>
        //     <?php
        // }
    }
    else
    {
        ?>
                        <script type="text/javascript">
                            //alert("Password reset token expired.");
                            window.location.href="#";
                        </script>
                        <?php
    }
}
?>

<script type="text/javascript">
  function validate123()
{
    //alert("welcome to js");
   
    var pwd=document.getElementById('pass').value;
    var pwd1=document.getElementById('password1').value;
    //alert("welcome to js");
    
    if(pwd=="")
    {
        document.getElementById('passw').innerHTML="Password field cannot be empty";
        document.getElementById('passw').style.color="red";
        document.getElementById('pass').style.borderColor="red";
        var vpwd="false";
    }
    else
    {
        re = /[0-9]/;
        re1 = /[a-z]/;
        re2 = /[A-Z]/;
        re3=/[!@#\$%\^\&*+=._-]/;
        var a1=pwd.length<6;
        var a2=pwd.length>15;
        var a3=re.test(pwd);
        var a4=re1.test(pwd);
        var a5=re2.test(pwd);
        var a6=re3.test(pwd);
        if(a1==true||(a2==true)||(a3==false)||(a4==false)||(a5==false)||(a6==false))
        {
            document.getElementById('pass').focus();
            var msgpwd="Password length must be 6 to 15 charachters and must contain one small and capital letter a digit and special character";
            document.getElementById('passw').innerHTML=msgpwd;
            document.getElementById('passw').style.color="red";
            document.getElementById('pass').style.borderColor="red";
            var vpwd="false";
            //alert(vpwd);
        }
        else
        {
            var msgpwd="";
            document.getElementById('passw').innerHTML=msgpwd;
            document.getElementById('pass').style.borderColor="green";
            vpwd="true";
        }
    }
    if(pwd1=="")
    {
        document.getElementById('passw1').innerHTML="Confirm Password field cannot be empty";
        document.getElementById('passw1').style.color="red";
        document.getElementById('password1').style.borderColor="red";
        var vpwd1="false";
    }
    else
    {
        if(pwd1!=pwd)
        {
            document.getElementById('password1').focus();
            document.getElementById('passw1').innerHTML="Password and Confirm Password must be same";
            document.getElementById('passw1').style.color="red";
            document.getElementById('password1').style.borderColor="red";
            vpwd1="false";
        }
        else
        {
            document.getElementById('passw1').innerHTML="";
            document.getElementById('password1').style.borderColor="green";
            vpwd1="true";
        }
    }

    if(vpwd=="true" && vpwd1=="true")
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
</script>

<br/>
<br/>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-sm-12">
	
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12" style="border: 2px;">
	<h2 class="text-"> Change Password</h2>
    <hr>
    <br>
	<form action="" method="post" onSubmit="return(validate123());">
  <div class="form-group">
    <label for="passwor">New Password</label>
    <input type="password" class="form-control" placeholder="Enter New Password" name="npwd" id="pass">
    <p id="passw"></p>
  </div>
    <br>
  <div class="form-group">
    <label for="Password">Retype New Password:</label>
    <input type="password" class="form-control" placeholder="Retype New Password" name="rnpwd" id="password1">
    <p id="passw1"></p>
  </div>
  <br>
<input type="text" name="token" hidden="hidden"  value="<?php echo $token;?>">
            <input type="text" name="em" hidden="hidden" value="<?php echo $em;?>">
  
  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
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


<?php
include("Footer.php");
?>

