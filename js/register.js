
//function to handle register-form validation
function registerValidate(registerForm){

    var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to process registration";

    if (registerForm.first_name.value=="")
    {
        errorMessage+="Firstname not filled!\n";
        validationVerified=false;
    }
    if(registerForm.last_name.value=="")
    {
        errorMessage+="Lastname not filled!\n";
        validationVerified=false;
    }
    if (registerForm.email.value=="")
    {
        errorMessage+="Email not filled!\n";
        validationVerified=false;
    }
    if (registerForm.voter_id.value=="")
    {
        errorMessage+="Voter Id not filled!\n";
        validationVerified=false;
    }
	if (registerForm.state.value=="")
	{
		errorMessage+="State not filled!\n";
		validationVarified=false;
	}
	if (registerForm.district.value=="")
	{
		errorMessage+="district not filled!\n";
		validationVarified=false;
	}
	if (registerForm.city.value=="")
	{
		errorMessage+="city not filled!\n";
		validationVarified=false;
	}
	
    if(registerForm.password.value=="")
    {
        errorMessage+="Password not provided!\n";
        validationVerified=false;
    }
    if(registerForm.ConfirmPassword.value=="")
    {
        errorMessage+="Confirm password not filled!\n";
        validationVerified=false;
    }
    if(registerForm.ConfirmPassword.value!=registerForm.password.value)
    {
        errorMessage+="Confirm password and password do not match!\n";
        validationVerified=false;
    }
    if (!isValidEmail(registerForm.email.value)) {
        errorMessage+="Invalid email address provided!\n";
        validationVerified=false;
    }
    if (!isValidVoterId(registerForm.voter_id.value)) {
        errorMessage+="Invalid Voter Id provided!\n";
        validationVerified=false;
    }
	 
    if(!validationVerified)
    {
        alert(errorMessage);
    }
    if(validationVerified)
    {
        alert(okayMessage);
    }
    return validationVerified;
}


//validate email function
function isValidEmail(val) {
	var re = /^[a-z0-9._%+-]+@(ho.XXX.com|YYYY.com)$/;
	if (!re.test(val)) {
		return false;
	}
    return true;
}
//validate voter id
function isValidVoterId(val){
 

    var len = val.toString().length;
    if(len === 12){
        return true;
    }
    return false;
}

//validate special PIN
function isValidSpecialPIN(val) {
	var re = /^[0-9][0-9][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	if (!re.test(val)) {
		return false;
	}
	return true;
}

//validate special PIN length
function isValidLength(val){
	var length = 12;
	if (!re.test(val)) {
		return false;
	}
	return true;
}
