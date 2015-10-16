function validateform() {
	
	if(document.forms["myForm"]["first_name"].value.length > 0 && document.forms["myForm"]["last_name"].value.length > 0 && 
		(document.forms["myForm"]["password"].value == document.forms["myForm"]["password_confirmation"].value )) {
			return true;
	}
	else {
		alert("Fill the required fields and make sure that password and confirm password have matching values!");
		return false;
	}
	
}