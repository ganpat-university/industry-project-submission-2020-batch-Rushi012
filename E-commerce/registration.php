
 <?php require "header.php"; ?>
<?php 
if(isset($_POST ['sub']))
{
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $addr=$_POST['addr'];
  $country=$_POST['country'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $code=$_POST['code'];

  $q="INSERT INTO `customer_detail`(`cust_name`, `cust_email`, `cust_phone`, `cust_password`, `cust_address`, `cust_city`, `cust_state`, `cust_country`, `cust_zip_code`) VALUES ('$name','$email','$phone','$pass','$addr','$city','$state','$country','$code')";
  
    mysqli_query($con , $q);
     echo"<script>window.location ='login.php'</script>";
     echo"<script>alert('Your product has ben uploaded')</script>";
  }
  ?>
<script language="javascript" src="assets/js/validation.js"></script>
<script>
  function ajax(y)
  {
    
    var url="check_email.php?email=" + y.value;
    var xmlhttp=0;
     if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
   }
    else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
        xmlhttp.open("GET",url,false);
        xmlhttp.send(null);
    if(xmlhttp.responseText!=0)
    {
      document.getElementById('email').value="";
      document.getElementById("email1").innerHTML ="Email Already Exists ";
      document.getElementById("email").style.border= "1px solid red"; 
      document.getElementById('email').focus();
    }
    else
    {
      document.getElementById("email1").innerHTML ="";
      document.getElementById("email").style.border= "1px solid green";
    }
    
  }
</script> 
<div class="container">
<div class="row">
<div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
</div>
<div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
  <br>
  <br>
  
  <hr>  
  <h2 class="text-"> Registration.</h2>
  <hr/>
<div class="pro-block " style="padding: 20px 50px; background: white; box-shadow: 0px 2px 28px 0px #7777775e; border-radius: 5px;">
  
<form name="form1" method="POST"onsubmit="return valid()" action="">

  <div class="form-group">
    <label for="name">Full name</label>
       <input type="text" class="form-control" id="name" name="name"  placeholder="Full name">
       <p style="color:red; font-size:14px; padding-left:2px; " id="name1"></p>
    </div>


  <div class="form-group">
    <label for="email">Email adress</label>
<input type="email"class="form-control" id="email" name="email" onblur="ajax(this)"  placeholder="Enter email"/>
    <p style="color:red; font-size:14px; padding-left:2px; "id="email1"></p>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

    <div class="form-group">
      <label for="Phone">Phone number</label>
      <input type="text" class="form-control" id="phone" name="phone"   placeholder="Enter phone">
      <p style="color:red; font-size:14px; padding-left:2px; "id="phn1"></p>
  </div>

  <div class="form-group">
    <label for="pass">Password</label>
    <input type="Password" class="form-control" id="pass" name="pass"   placeholder="Enter Password">
    <p style="color:red; font-size:14px; padding-left:2px; "id="pass1"></p>
    </div>

    <div class="form-group">
    <label for="Cpass"> Confirm Password</label>
    <input type="Password" class="form-control" id="Cpass" name="Cpass"   placeholder="Enter Confirm Password">
    <p style="color:red; font-size:14px; padding-left:2px; "id="Cpass1"></p>
    </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" id="addr" name="addr"   placeholder="Enter address"></textarea> 
    <p style="color:red; font-size:14px; padding-left:2px; "id="addr1"></p>
    </div>

  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" class="form-control" id="country" name="country"   placeholder="Enter country">
    <p style="color:red; font-size:14px; padding-left:2px; "id="country1"></p>
    </div>

  <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state"   placeholder="Enter state">
    <p style="color:red; font-size:14px; padding-left:2px; "id="state1"></p>
    </div>
    
    <div class="form-group">
    <label for="City">City</label>
    <input type="text" class="form-control" id="city" name="city"   placeholder="Enter City">
    <p style="color:red; font-size:14px; padding-left:2px; "id="city1"></p>
    </div>

    <div class="form-group">
    <label for="zip-code">Zip-code</label>
    <input type="text" class="form-control" id="code" name="code"   placeholder="Enter Zip-code">
    <p style="color:red; font-size:14px; padding-left:2px; "id="code1"></p>
    </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Terms and Condition</label></br>
    <a href="<?php echo SITE_URL . "login.php"; ?>"><u><h3 class="title__line">Already have an accout..</h3></u></a></br>
  </div>
  <input type="submit" class="btn btn-primary" value="Submit" name="sub">
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