function updateState(registerForm){

    var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to update your account";
	
 if (registerForm.state.value=="")
	{
		errorMessage+="State not filled!\n";
		validationVarified=false;
	}
	return validationVerified;
}
	