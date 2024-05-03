<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript">
  function demo(y)
  {
    alert('test');
    var url="check_email.php?email=" + y.value;
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
    if(xmlhttp.responseText!="success")
    {
      document.getElementById('email').value="";
      document.getElementById("email1").innerHTML = " Already have an email.";
      document.getElementById("email").style.border= "1px solid red"; 
      document.getElementById('email').focus();
    }
  }
</script>
<div class="form-group">
    <label for="email">Email adress</label>
<input type="email"class="form-control" id="email" name="email" onblur="demo(this)"  placeholder="Enter email"/>
    <p style="color:red; font-size:14px; padding-left:2px; "id="email1"></p>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
