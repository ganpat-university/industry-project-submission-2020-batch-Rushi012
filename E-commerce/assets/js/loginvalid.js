function login(){	
var  Z = document.getElementById("luname").value;
var  H = document.getElementById("lpass").value;
	if(Z==""){
		document.getElementById("luname1").innerHTML = " Email Is Empty.";
		document.getElementById("luname").style.border= "1px solid red"; 
		return false;
	}else{
		document.getElementById("luname1").innerHTML = "";
		document.getElementById("luname").style.border= "1px solid Green" ;
      
		var luname2=true;
	}
	
	if(H==""){
		document.getElementById("lpass1").innerHTML = " Password Is Empty.";
		document.getElementById("lpass").style.border= "1px solid red"; 
		return false;
	}
	else{
		document.getElementById("lpass1").innerHTML = "";
		document.getElementById("lpass").style.border= "1px solid Green" ;
      
		var lpass2=true;
	}
	if(luname2==true && lpass2==true)
	{
		alert("Welcome to home page")
		return true;
	}
	else
	{
	  return false;
	}
}