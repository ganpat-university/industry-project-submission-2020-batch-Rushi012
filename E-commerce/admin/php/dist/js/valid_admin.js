function valid()
{

	//alert("rushi");
	var  a = /^[a-zA-Z\s]+$/;
	var  b = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/
	var  c= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,20}$/
	var  d=/^[0-9]+$/;
	var  f=/^[0-9].{6}$/;
	var  N = document.getElementById("name2").value;
	var  P = document.getElementById("phone").value;
	var  E = document.getElementById("email").value;
	var  CP = document.getElementById("pass").value;
	var  ADD = document.getElementById("addr").value;
	var  Con = document.getElementById("country").value;
	var  st = document.getElementById("state").value;
	var  city = document.getElementById("city").value;
	var  code = document.getElementById("code").value;
	var name2;
	//name	
	

	if(N=="")
	{
		alert("name");
		document.getElementById("name1").innerHTML="First Name is Empty";
		document.getElementById("name2").style.border= "1px solid red";

		document.form1.name2.focus();
		return false;
	 	
	}else
    if(N.length<3 || N.length>20){
    	alert("length");
		document.getElementById("name1").innerHTML = "  Name Is Must Be Greater Than 3 And Samller Than 20";
		 document.getElementById("name2").style.border= "1px solid red" ;
		 document.form1.name2.focus();
		return false;
	 	
	}else  
	if (a.test( N )) 
	{
		document.getElementById("name1").innerHTML = "";
		document.getElementById("name2").style.border= "1px solid Green" ;
     	 name2=true; 
 	}
    else 
    {
        document.getElementById("name1").innerHTML = "Invalid Name";
		document.getElementById("name2").style.border= "1px solid red" ;
		document.form1.name.focus();
		return false;
	 	   
	}

	//phone
	if(P=="")
	{
		
		document.getElementById("phn1").innerHTML = " Phone no. Is Empty.";
		document.getElementById("phone").style.border= "1px solid red" ;
		document.form1.phone.focus();
		return false;

		}
		else  
		if (P.length==10 && d.test( P )) 
		{
		    document.getElementById("phn1").innerHTML = "";
		    document.getElementById("phone").style.border= "1px solid green" ;
			document.form1.phone.focus();
			var phn2= true;
		}
		else
		 {
		    document.getElementById("phn1").innerHTML = "Phone must be 10 digits";
		    document.getElementById("phone").style.border= "1px solid red" ;
			document.form1.phone.focus();
			return false;
		}
		//alert("Hii");
	
	//password
	
	if(CP=="")
	{
		document.getElementById("pass1").innerHTML = "Password Is Empty.";
		document.getElementById("pass").style.border= "1px solid red"; 
		document.form1.pass.focus();
		return false;
	 	
	}else if(CP.length<8 || CP.length>20)
	{
		document.getElementById("pass1").innerHTML = " Password Is Must Be Greater Than 3 And Samller Than 20";
		document.getElementById("pass").style.border= "1px solid red" ;
		document.form1.pass.focus();
		return false;

	 	
	}else if (c.test( CP )) {
    
    	document.getElementById("pass1").innerHTML = "";
		document.getElementById("pass").style.border= "1px solid Green" ;
		var pass2= true; 
	}
    else {
		document.getElementById("pass1").innerHTML = "Invalid Password Must Include Capital Letter,Digit and [#,$,^,+,=,!,*,(,),@,%,&]";
		document.getElementById("pass").style.border= "1px solid red" ;
		document.form1.pass.focus();
		
		return false;
	 	   
	}

	//address
	if(ADD=="")
	{
		document.getElementById("addr1").innerHTML = "Address is Empty";
		document.getElementById("addr").style.border= "1px solid red" ;
		document.form1.addr.focus();
		return false;	
	}	
	else
	{
		document.getElementById("addr1").innerHTML = ""
		document.getElementById("addr").style.border= "1px solid green" ;
	var addr2= true;
	}
	//contry
	if(Con=="")
	{
		document.getElementById("country1").innerHTML = "Country Field is Empty";
		document.getElementById("country").style.border= "1px solid red" ;
		document.form1.country.focus();
		return false;	
	}	
	else if(a.test( Con ))
	{
		document.getElementById("country1").innerHTML = ""
		document.getElementById("country").style.border= "1px solid green" ;
		var con2= true;
	}
	else
	{
		document.getElementById("country1").innerHTML = "Plz Enter alphabets only";
		document.getElementById("country").style.border= "1px solid red" ;
		document.form1.country.focus();
		return false;	
	}	
	
	//state
	if(st=="")
	{
		document.getElementById("state1").innerHTML = "State Field is Empty";
		document.getElementById("state").style.border= "1px solid red" ;
		document.form1.state.focus();
		return false;	

	}	
	else if(a.test( st ))
	{
		document.getElementById("state1").innerHTML = ""
		document.getElementById("state").style.border= "1px solid green" ;
	var state2= true;
	}
	else
	{
		
		document.getElementById("state1").innerHTML = "Plz Enter alphabets only";
		document.getElementById("state").style.border= "1px solid red" ;
		document.form1.state.focus();
		return false;	
	
	}
	//city
	if(city=="")
	{
		document.getElementById("city1").innerHTML = "City Field is Empty";
		document.getElementById("city").style.border= "1px solid red" ;
		document.form1.city.focus();
		return false;	
	}	
	else if(a.test( city ))
	{
		document.getElementById("city1").innerHTML = ""
		document.getElementById("city").style.border= "1px solid green" ;
	var city2= true;
	}
	else
	{
		
		document.getElementById("city1").innerHTML = "Plz Enter alphabets only";
		document.getElementById("city").style.border= "1px solid red" ;
		document.form1.state.focus();
		return false;	
	
	}
	//code
	if(code=="")
	{
		document.getElementById("code1").innerHTML = "Zip code is Empty";
		document.getElementById("code").style.border= "1px solid red" ;
		document.form1.code.focus();
		return false;	
	}	
	else if(d.test( code ))
	{
		document.getElementById("code1").innerHTML = ""
		document.getElementById("code").style.border= "1px solid green" ;
	var code2= true;
	}
	else
		{
		
		document.getElementById("code1").innerHTML = "Invalid Zip Code";
		document.getElementById("code").style.border= "1px solid red" ;
		document.form1.state.focus();
		return false;	
	
	}	
 	if (name2==true && phn2==true && email2==true && pass2==true && addr2==true && con2==true && state2==true && city2==true && code2==true)
 	{

	 
	 return true;
	 
	 }
 	else
 	{
	 return false;
 	}

 	}
 

