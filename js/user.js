//function to handle login-form validation
function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to continue";

if (loginForm.myusername.value=="")
{
    errorMessage+="Email not filled!\n";
    validationVerified=false;
}
if(loginForm.mypassword.value=="")
{
    errorMessage+="Password not filled!\n";
    validationVerified=false;
}
if (!isValidEmail(loginForm.myusername.value)) {
    errorMessage+="Invalid email address provided!\n";
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

//function to handle register-form validation
function registerValidate(registerForm){

    var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to process registration";

    if (registerForm.firstname.value=="")
    {
        errorMessage+="Firstname not filled!\n";
        validationVerified=false;
    }
    if(registerForm.lastname.value=="")
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

//function to handle update-form validation
function updateProfile(registerForm){

    var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to update your account";

    if (registerForm.firstname.value=="")
    {
    errorMessage+="Firstname not filled!\n";
    validationVerified=false;
    }
    if(registerForm.lastname.value=="")
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
    errorMessage+="Voter ID not filled!\n";
    validationVerified=false;
    }
    if(registerForm.password.value=="")
    {
    errorMessage+="New password not provided!\n";
    validationVerified=false;
    }
    if(registerForm.ConfirmPassword.value=="")
    {
    errorMessage+="Confirm password not filled!\n";
    validationVerified=false;
    }
    if(registerForm.ConfirmPassword.value!=registerForm.password.value)
    {
    errorMessage+="Confirm password and new password do not match!\n";
    validationVerified=false;
    }
    if (!isValidEmail(registerForm.email.value)) {
    errorMessage+="Invalid email address provided!\n";
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
	var re = /^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
	if (!re.test(val)) {
		return false;
	}
    return true;
}
//validate voter id
function isValidVoterId(val){
    // var length = 17;
    // if (!re.test(val)) {
    //     return false;
    // }
    // return true;

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

//validate updateForm
function updateValidate(updateForm) {
    var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to change your password";

if (updateForm.opassword.value=="")
{
errorMessage+="Please provide your old password.\n";
validationVerified=false;
}
if (updateForm.npassword.value=="")
{
errorMessage+="Please provide a new password.\n";
validationVerified=false;
}
if(updateForm.cpassword.value=="")
{
errorMessage+="Please confirm your new password.\n";
validationVerified=false;
}
if(updateForm.cpassword.value!=updateForm.npassword.value)
{
errorMessage+="Confirm password and new password do not match!\n";
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


//validate reserve form
function reserveValidate(reserveForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to reserve this table";

if (reserveForm.tNumber.selectedIndex==0)
{
errorMessage+="Please select a table by its number!\n";
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

//validate position form
function positionValidate(positionForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to see the candidates under the chosen position";

if (positionForm.position.selectedIndex == 0)
{
errorMessage+="Position not set!\n";
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