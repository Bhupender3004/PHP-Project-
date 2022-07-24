function checks()                                    
{ 
    var uname = document.forms["signup_page"]["txtname"];     
    var id = document.forms["signup_page"]["txtid"];           
    var email = document.forms["signup_page"]["email"];    
    //var phone = document.forms["RegForm"]["mo_no"];    
    var password = document.forms["signup_page"]["txtpwd"];  
    var cpassword = document.forms["signup_page"]["txtconpwd"];  
    //var dob = document.forms["RegForm"]["dob"];  
   
    if (uname.value == "")                                  
    { 
        window.alert("Please enter a Username."); 
        name.focus(); 
        return false; 
    } 

    if (id.value == "")                                  
    { 
        window.alert("Please enter a Username."); 
        name.focus(); 
        return false; 
    } 
     
    if (email.value == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false;
	}
	
 	if (password.value == "" || password.value.length <4)                                   
    { 
        window.alert("Please enter a password greater than 4 characters."); 
        password.focus(); 
        return false;
	}
	
    if (cpassword.value == "")                                   
    { 
        window.alert("This cannot be empty."); 
        cpassword.focus(); 
        return false;
	}
	
	if (password.value!=cpassword.value)
	{
		window.alert("Password doesn't match."); 
        password.focus(); 
        return false;
	}
	
	/*if (dob.value == "")
	{
		window.alert("Date of birth cannot be empty."); 
        dob.focus(); 
        return false;
	}
	
	
		if (gender.value == "")
	{
		window.alert("Select your gender."); 
        gender.focus(); 
        return false;
	}
	*/


}