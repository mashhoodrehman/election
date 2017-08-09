$(document).ready(function(){   
/*===========================================##################========================================================*/
/*===========================================registeration form========================================================*/
/*===========================================##################========================================================*/

$('#register_user_btn').on('click',function (argument) {
var eamil=$('#reg_email');
var fname=$('#reg_fname');
var lname=$('#reg_lname');
var password=$('#reg_password');
var cpassword=$('#reg_cpassword');

	if (registerForm(eamil,fname,lname,password,cpassword)) {
		$('#register_user_student').submit();
		localStorage.setItem("usertype", "student");
	} 	

	
}); 

$('#register_user_btn2').on('click',function (argument) {
var eamil=$('#reg_email2');
var fname=$('#reg_fname2');
var lname=$('#reg_lname2');
var password=$('#reg_password2');
var cpassword=$('#reg_cpassword2');

	if (registerForm(eamil,fname,lname,password,cpassword)) {
		$('#register_user_parent').submit();
		localStorage.setItem("usertype", "parent");
	} 	

});


$('#reg_email').focusout(function (argument) {
	if(check_email($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');

	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter a valid email address<label>');
		}else{
			$(this).after('<label class="error_messages">Please enter a valid email address<label>');
		}
		
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');

	}	
});

$('#reg_fname').focusout(function (argument) {
	if(validateName($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter your name<label>');
		}else{
			$(this).after('<label class="error_messages">Your name has been entered incorrectly<label>');
		}		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#reg_lname').focusout(function (argument) {
	if(validateName($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter your name<label>');
		}else{
			$(this).after('<label class="error_messages">Your name has been entered incorrectly<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#reg_password').focusout(function (argument) {
	if(validatePassword($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter password<label>');
		}else{
			$(this).after('<label class="error_messages">Password must be 6-15 characters long. Special characters are allowed. Do not enter spaces.<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#reg_cpassword').focusout(function (argument) {
	if(confirmPassword($('#reg_password').val(),$(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please confirm password<label>');
		}else{
			$(this).after('<label class="error_messages">Password does not match<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}

});


$('#reg_email2').focusout(function (argument) {
	if(check_email($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');

	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter a valid email address<label>');
		}else{
			$(this).after('<label class="error_messages">Please enter a valid email address<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');

	}	
});

$('#reg_fname2').focusout(function (argument) {
	if(validateName($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter your name<label>');
		}else{
			$(this).after('<label class="error_messages">Your name has been entered incorrectly<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#reg_lname2').focusout(function (argument) {
	if(validateName($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter your name<label>');
		}else{
			$(this).after('<label class="error_messages">Your name has been entered incorrectly<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#reg_password2').focusout(function (argument) {
	if(validatePassword($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please enter password<label>');
		}else{
			$(this).after('<label class="error_messages">Password must be 6-15 characters long. Special characters are allowed. Do not enter spaces.<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#reg_cpassword2').focusout(function (argument) {
	if(confirmPassword($('#reg_password2').val(),$(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">Please confirm password<label>');
		}else{
			$(this).after('<label class="error_messages">Password does not match<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}

});


function registerForm(emailO,fnameO,lnameO,passwordO,cpasswordO) {
	var email=emailO.val();
	var fname=fnameO.val();
	var lname=lnameO.val();
	var password=passwordO.val();
	var cpassword=cpasswordO.val();

	var iseamil;
	var isfname;
	var islname;
	var ispassword;
	var iscpassword;

	if(check_email(email)){
		iseamil=true;
		emailO.closest('div').find('label').remove();
		emailO.closest('div').removeClass('has-error');
		emailO.closest('div').addClass('has-success');

	}else{
		iseamil=false;
		emailO.closest('div').find('label').remove();
		if ($(emailO).val() =="") {
			$(emailO).after('<label class="error_messages">Please enter a valid email address<label>');
		}else{
			$(emailO).after('<label class="error_messages">Please enter a valid email address<label>');
		}
		emailO.closest('div').addClass('has-error');
		emailO.closest('div').removeClass('has-success');

	}


	if(validateName(fname)){
		isfname=true;
		fnameO.closest('div').find('label').remove();
		fnameO.closest('div').removeClass('has-error');
		fnameO.closest('div').addClass('has-success');
	}else{
		isfname=false;
		fnameO.closest('div').find('label').remove();
		if ($(fnameO).val() =="") {
			$(fnameO).after('<label class="error_messages">Please enter your name<label>');
		}else{
			$(fnameO).after('<label class="error_messages">Your name has been entered incorrectly<label>');
		}
		fnameO.closest('div').addClass('has-error');
		fnameO.closest('div').removeClass('has-success');
	}

	if(validateName(lname)){
		islname=true;
		lnameO.closest('div').find('label').remove();
		lnameO.closest('div').removeClass('has-error');
		lnameO.closest('div').addClass('has-success');
	}else{
		islname=false;
		lnameO.closest('div').find('label').remove();
		if ($(lnameO).val() =="") {
			$(lnameO).after('<label class="error_messages">Please enter your name<label>');
		}else{
			$(lnameO).after('<label class="error_messages">Your name has been entered incorrectly<label>');
		}
		lnameO.closest('div').addClass('has-error');
		lnameO.closest('div').removeClass('has-success');
	}


	if(validatePassword(password)){
		ispassword=true;
		passwordO.closest('div').find('label').remove();
		passwordO.closest('div').removeClass('has-error');
		passwordO.closest('div').addClass('has-success');
	}else{
		ispassword=false;
		passwordO.closest('div').find('label').remove();
		if ($(passwordO).val() =="") {
			$(passwordO).after('<label class="error_messages">Please enter password<label>');
		}else{
			$(passwordO).after('<label class="error_messages">Password must be 6-15 characters long. Special characters are allowed. Do not enter spaces<label>');
		}
		passwordO.closest('div').addClass('has-error');
		passwordO.closest('div').removeClass('has-success');
	}

	if(confirmPassword(password,cpassword)){
		iscpassword=true;
		cpasswordO.closest('div').find('label').remove();
		cpasswordO.closest('div').removeClass('has-error');
		cpasswordO.closest('div').addClass('has-success');
		console.log("true");
	}else{
		iscpassword=false;
		cpasswordO.closest('div').find('label').remove();
		if ($(cpasswordO).val() =="") {
			$(cpasswordO).after('<label class="error_messages">Please confirm password<label>');
		}else{
			$(cpasswordO).after('<label class="error_messages">Password does not match<label>');
		}
		cpasswordO.closest('div').addClass('has-error');
		cpasswordO.closest('div').removeClass('has-success');
		console.log("false");
	}

	if (iseamil== true &&isfname== true && islname== true && ispassword== true && iscpassword== true ) {
		return true;
	}else{
		return false;
	}
}
/*===========================================##################========================================================*/
/*===========================================registeration  form ENDS========================================================*/
/*===========================================##################========================================================*/
function check_email(email){  
    var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,7})+$/;
    if(reg.test(email)){
        return true;
    }else{  
        return false;
    }  
} 

function validateName(name){  
    /*var reg = /^[a-zA-Z]*$/;*/ /*ONLY characters*/
    var reg = /^[A-Za-z']+( [A-Za-z']+)*$/; /*ONLY words with single space*/
    var min_max = /^.{2,25}$/;
    if(reg.test(name) && min_max.test(name)){
        return true;
    }else{  
        return false;
    }  
} 

function validateWords(words){  
    var reg = /^[A-Za-z']+( [A-Za-z']+)*$/; /*ONLY words with single space*/
    var min_max = /^.{2,50}$/;
    if(reg.test(words) && min_max.test(words)){
        return true;
    }else{  
        return false;
    }  
} 

function validateUrl(words){  
    var reg = /^(ftp|http|https):\/\/[^ "]+$/; /*ONLY words with single space*/
    if(reg.test(words) ){
        return true;
    }else{  
        return false;
    }  
} 

function validatePassword(password){  
    var reg = /^\S*$/;   
    var min_max = /^.{6,15}$/;
    if(reg.test(password) && min_max.test(password)){
        return true;
    }else{  
        return false;
    }  
}

function confirmPassword(val,val2){  
    if(val === val2 && val !=""){
        return true;
    }else{  
        return false;
    }  
}



function validateNumber(number){  
    /*var reg = /^\d+$/;*/
    var reg = /^[0-9]{1,10}$/;
    var min_max = /^.{6,15}$/;
    if(reg.test(number)){
        return true;
    }else{  
        return false;
    }  
} 

function validateFiles(value){  
    var reg = /([a-zA-Z0-9\s_\\.\-:])+(.png|.jpg|.jpeg)$/ ;
    var min_max = /^.{6,15}$/;
    if(reg.test(value)){
        return true;
    }else{  
        return false;
    }  
} 
/*===========================================##################========================================================*/
/*===========================================login form========================================================*/
/*===========================================##################========================================================*/
$('#login_btn').on('click',function (argument) {
	var eamil=$('#login_email').val();
	var password=$('#login_password').val();
		if(check_email(eamil)){
		
		$('#login_email').closest('div').find('label').remove();
		$('#login_email').closest('div').removeClass('has-error');
		$('#login_email').closest('div').addClass('has-success');

	}else{
	
		$('#login_email').closest('div').find('label').remove();
		$('#login_email').closest('div').find('label').remove();
		if ($('#login_email').val() =="") {
			$('#login_email').after('<label class="error_messages">This field is required<label>');
		}else{
			$('#login_email').after('<label class="error_messages">Please enter a valid email address<label>');
		}
		$('#login_email').closest('div').addClass('has-error');
		$('#login_email').closest('div').removeClass('has-success');

	}
	if(password != ""){
		$('#login_password').closest('div').find('label').remove();
		$('#login_password').closest('div').removeClass('has-error');
		$('#login_password').closest('div').addClass('has-success');

	}else{
		$('#login_password').closest('div').find('label').remove();
		if ($('#login_password').val() =="") {
			$('#login_password').after('<label class="error_messages">This field is required<label>');
		}else{
			$('#login_password').after('<label class="error_messages">Please enter your password<label>');
		}
		$('#login_password').closest('div').addClass('has-error');
		$('#login_password').closest('div').removeClass('has-success');

	}



	if (check_email(eamil) && password !="") {
		$('#login_form').submit();
		localStorage.setItem("usertype", "login");
	} 	

}); 


$('#login_email').focusout(function (argument) {
	if(check_email($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');

	}else{

		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">This field is required<label>');
		}else{
			$(this).after('<label class="error_messages">your email address has been entered incorrectly<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');

	}	
});

$('#login_password').focusout(function (argument) {
	if($(this).val() != ""){
		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');

	}else{
		$(this).closest('div').find('label').remove();
		if ($(this).val() =="") {
			$(this).after('<label class="error_messages">This field is required<label>');
		}else{
			$(this).after('<label class="error_messages">Please enter your password<label>');
		}
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');

	}	
});

/*==================forget password=========================*/


$('#forget_btn').on('click',function (argument) {
	var eamil=$('#forget_ema').val();
		if(check_email(eamil)){
		
		$('#forget_ema').closest('div').find('label').remove();
		$('#forget_ema').closest('div').removeClass('has-error');
		$('#forget_ema').closest('div').addClass('has-success');

	}else{
	
		$('#forget_ema').closest('div').find('label').remove();
		$('#forget_ema').after('<label class="error_messages">Please provide a valid email address<label>');
		$('#forget_ema').closest('div').addClass('has-error');
		$('#forget_ema').closest('div').removeClass('has-success');

	}
	if (check_email(eamil)) {
		$('#forget_form').submit();
		localStorage.setItem("usertype", "none");
	} 	

}); 


$('#forget_ema').focusout(function (argument) {
	if(check_email($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');

	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide a valid email address<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');

	}	
});

/*===========================================##################========================================================*/
/*===========================================login form ends========================================================*/
/*===========================================##################========================================================*/
/*===========================================##################========================================================*/
/*===========================================reset form========================================================*/
/*===========================================##################========================================================*/
$('#reset_btn').on('click',function (argument) {
var eamil=$('#reset_email');
var password=$('#reset_password');
var cpassword=$('#reset_cpassword');

	if (reseForm(eamil,password,cpassword)) {
		$('#reset_form').submit();
	
	} 	
});

$('#reset_email').focusout(function (argument) {
	if(check_email($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');

	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide a valid email address<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');

	}	
});
$('#reset_password').focusout(function (argument) {
	if(validatePassword($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please enter valid password<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#reset_cpassword').focusout(function (argument) {
	if(confirmPassword($('#reset_password').val(),$(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Password did not match<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}

});



function  reseForm(emailO,passwordO,cpasswordO) {
	var email=emailO.val();
	var password=passwordO.val();
	var cpassword=cpasswordO.val();

	var iseamil;
	var ispassword;
	var iscpassword;

	if(check_email(email)){
		iseamil=true;
		emailO.closest('div').find('label').remove();
		emailO.closest('div').removeClass('has-error');
		emailO.closest('div').addClass('has-success');

	}else{
		iseamil=false;
		emailO.closest('div').find('label').remove();
		emailO.after('<label class="error_messages">Please provide a valid email address<label>');
		emailO.closest('div').addClass('has-error');
		emailO.closest('div').removeClass('has-success');

	}


	if(validatePassword(password)){
		ispassword=true;
		passwordO.closest('div').find('label').remove();
		passwordO.closest('div').removeClass('has-error');
		passwordO.closest('div').addClass('has-success');
	}else{
		ispassword=false;
		passwordO.closest('div').find('label').remove();
		passwordO.after('<label class="error_messages">Please enter valid password<label>');
		passwordO.closest('div').addClass('has-error');
		passwordO.closest('div').removeClass('has-success');
	}

	if(confirmPassword(password,cpassword)){
		iscpassword=true;
		cpasswordO.closest('div').find('label').remove();
		cpasswordO.closest('div').removeClass('has-error');
		cpasswordO.closest('div').addClass('has-success');
		console.log("true");
	}else{
		iscpassword=false;
		cpasswordO.closest('div').find('label').remove();
		cpasswordO.after('<label class="error_messages">Password did not match<label>');
		cpasswordO.closest('div').addClass('has-error');
		cpasswordO.closest('div').removeClass('has-success');
		console.log("false");
	}

	if (iseamil==true && ispassword== true && iscpassword== true ) {
		return true;
	}else{
		return false;
	}
}
/*===========================================##################========================================================*/
/*===========================================reset form ends========================================================*/
/*===========================================##################========================================================*/

/*===========================================##################========================================================*/
/*===========================================Profile View==============================================================*/
/*===========================================##################========================================================*/
$('#profile_btn').on('click',function (argument) {

	var fname=$('#profile_fname');
	var lname=$('#profile_lname');
	var state=$('#state_id');
	var city=$('#city');
	var zip=$('#profile_zip');
	var image=$('#my_file');

	if (profileForm(fname,lname,state,city,zip,image)) {
		$('#profile_form').submit();
		
	} 	
});

$('#profile_fname').focusout(function (argument) {
	if(validateName($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
		console.log('ds');
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
		console.log('error');
	}	
});

$('#profile_lname').focusout(function (argument) {
	if(validateName($(this).val())){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

/*$('#profile_zip').focusout(function (argument) {
	if(validateNumber($(this).val()) || $(this).val()==""){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
		console.log('true===')
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please enter valid zip<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
		console.log('')
	}	
});*/

function  profileForm(fnameO,lnameO,stateO,cityO,zipO,imageO) {
	var fname=fnameO.val();
	var lname=lnameO.val();
	var state=stateO.val();
	var city=cityO.val();
	var zip=zipO.val();
	var image=imageO.val();

	var isfname;
	var islname;
	var isstate;
	var iscity;
	var iszip;
	var isimage;



	if(validateName(fname)){
		isfname=true;
		fnameO.closest('div').find('label').remove();
		fnameO.closest('div').removeClass('has-error');
		fnameO.closest('div').addClass('has-success');
	}else{
		isfname=false;
		fnameO.closest('div').find('label').remove();
		fnameO.after('<label class="error_messages">Please provide text only<label>');
		fnameO.closest('div').addClass('has-error');
		fnameO.closest('div').removeClass('has-success');
	}

	if(validateName(lname)){
		islname=true;
		lnameO.closest('div').find('label').remove();
		lnameO.closest('div').removeClass('has-error');
		lnameO.closest('div').addClass('has-success');
	}else{
		islname=false;
		lnameO.closest('div').find('label').remove();
		lnameO.after('<label class="error_messages">Please provide text only<label>');
		lnameO.closest('div').addClass('has-error');
		lnameO.closest('div').removeClass('has-success');
	}


	if(state !=""){
		isstate=true;
		stateO.closest('div').find('label').remove();
		stateO.closest('div').removeClass('has-error');
		stateO.closest('div').addClass('has-success');
	}else{
		isfname=false;
		stateO.closest('div').find('label').remove();
		stateO.after('<label class="error_messages">Please select state<label>');
		stateO.closest('div').addClass('has-error');
		stateO.closest('div').removeClass('has-success');
	}

	if(city !=""){
		iscity=true;
		cityO.closest('div').find('label').remove();
		cityO.closest('div').removeClass('has-error');
		cityO.closest('div').addClass('has-success');
	}else{
		iscity=false;
		cityO.closest('div').find('label').remove();
		cityO.after('<label class="error_messages">Please select city<label>');
		cityO.closest('div').addClass('has-error');
		cityO.closest('div').removeClass('has-success');
	}

	if(validateNumber(zip) || zip==""){
		iszip=true;
		zipO.closest('div').find('label').remove();
		zipO.closest('div').removeClass('has-error');
		zipO.closest('div').addClass('has-success');
	}else{
		iszip=false;
		zipO.closest('div').find('label').remove();
		zipO.after('<label class="error_messages">Please enter valid zip<label>');
		zipO.closest('div').addClass('has-error');
		zipO.closest('div').removeClass('has-success');
	}

	if(validateFiles(image) || image==""){
		isimage=true;
		imageO.closest('div').find('label').remove();
		imageO.closest('div').removeClass('has-error');
		imageO.closest('div').addClass('has-success');
	
	}else{
		isimage=false;
		imageO.closest('div').find('label').remove();
		imageO.after('<label class="error_messages">please select only image<label>');
		imageO.closest('div').addClass('has-error');
		imageO.closest('div').removeClass('has-success');
		
	}




/*&& (iszip== true || zip== "")*/
	if (isfname==true && islname== true && isstate== true && iscity== true  && (isimage== true || image=="") ) {
		return true;
	}else{
		return false;
	}
}
/*===========================================##################========================================================*/
/*===========================================profile form ends========================================================*/
/*===========================================##################========================================================*/
/*===========================================##################========================================================*/
/*===========================================Addschool form ========================================================*/
/*===========================================##################========================================================*/
$('#addschool_btn').on('click',function (argument) {

	var sname=$('#school_name');
	var saddress=$('#school_address');
	var sabout=$('#schools_about');
	var state=$('#state_id');
	var city=$('#city');
	var zip=$('#school_zip');
	var image=$('#upload-1');
	var number=$('#number');
	var url=$('#url');

	if (addschoolform(sname,saddress,sabout,state,city,zip,image,number,url)) {
		$('#addschool_form').submit();
		
	} 	
});

$('#school_name').focusout(function (argument) {
	if(validateWords($(this).val())){
		
		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		
		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#url').focusout(function (argument) {
	if(validateUrl($(this).val()) || $(this).val()==""){
		
		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		
		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide valid url<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#school_address').focusout(function (argument) {
	if($(this).val() !=""){
		
		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		
		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

/*$('#schools_about').focusout(function (argument) {
	if($(this).val() ==""){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});*/

$('#school_zip').focusout(function (argument) {
	if(validateNumber($(this).val()) || $(this).val()==""){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
		console.log('true===')
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please enter valid zip<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
		console.log('')
	}	
});

function  addschoolform(snameO,saddressO,saboutO,stateO,cityO,zipO,imageO,numberO,urlO) {
	var sname=snameO.val();
	var saddress=saddressO.val();
	var sabout=saboutO.val();
	var state=stateO.val();
	var city=cityO.val();
	var zip=zipO.val();
	var number=numberO.val();
	var url=urlO.val();
	var image=imageO.val().split('\\').pop();

	var isname;
	var isaddress;
	var issabout;
	var isstate;
	var iscity;
	var iszip;
	var isimage;
	var isnumber;
	var isurl;




	if(validateWords(sname)){
		isname=true;
		snameO.closest('div').find('label').remove();
		snameO.closest('div').removeClass('has-error');
		snameO.closest('div').addClass('has-success');
	}else{
		isname=false;
		snameO.closest('div').find('label').remove();
		snameO.after('<label class="error_messages">Please provide text only<label>');
		snameO.closest('div').addClass('has-error');
		snameO.closest('div').removeClass('has-success');
	}
	if(validateUrl(url) || url==""){
		isurl=true;
		urlO.closest('div').find('label').remove();
		urlO.closest('div').removeClass('has-error');
		urlO.closest('div').addClass('has-success');
	}else{
		isurl=false;
		urlO.closest('div').find('label').remove();
		urlO.after('<label class="error_messages">Please provide valid url<label>');
		urlO.closest('div').addClass('has-error');
		urlO.closest('div').removeClass('has-success');
	}

	if(saddress !=""){
		isaddress=true;
		saddressO.closest('div').find('label').remove();
		saddressO.closest('div').removeClass('has-error');
		saddressO.closest('div').addClass('has-success');
	}else{
		isaddress=false;
		saddressO.closest('div').find('label').remove();
		saddressO.after('<label class="error_messages">Please provide text only<label>');
		saddressO.closest('div').addClass('has-error');
		saddressO.closest('div').removeClass('has-success');
	}


	if(state !=""){
		isstate=true;
		stateO.closest('div').find('label').remove();
		stateO.closest('div').removeClass('has-error');
		stateO.closest('div').addClass('has-success');
	}else{
		isfname=false;
		stateO.closest('div').find('label').remove();
		stateO.after('<label class="error_messages">Please select state<label>');
		stateO.closest('div').addClass('has-error');
		stateO.closest('div').removeClass('has-success');
	}

	if(city !=""){
		iscity=true;
		cityO.closest('div').find('label').remove();
		cityO.closest('div').removeClass('has-error');
		cityO.closest('div').addClass('has-success');
	}else{
		iscity=false;
		cityO.closest('div').find('label').remove();
		cityO.after('<label class="error_messages">Please select city<label>');
		cityO.closest('div').addClass('has-error');
		cityO.closest('div').removeClass('has-success');
	}

	if(validateNumber(zip) || zip==""){
		iszip=true;
		zipO.closest('div').find('label').remove();
		zipO.closest('div').removeClass('has-error');
		zipO.closest('div').addClass('has-success');
	}else{
		iszip=false;
		zipO.closest('div').find('label').remove();
		zipO.after('<label class="error_messages">Please enter valid zip<label>');
		zipO.closest('div').addClass('has-error');
		zipO.closest('div').removeClass('has-success');
	}

	if(validateNumber(number) || number==""){
		isnumber=true;
		numberO.closest('div').find('label').remove();
		numberO.closest('div').removeClass('has-error');
		numberO.closest('div').addClass('has-success');
	}else{
		isnumber=false;
		numberO.closest('div').find('label').remove();
		numberO.after('<label class="error_messages">Please provide valid phone number<label>');
		numberO.closest('div').addClass('has-error');
		numberO.closest('div').removeClass('has-success');
	}

	if(validateFiles(image) || image ==""){
		isimage=true;
		imageO.closest('div').find('.error_messages').remove();
		imageO.closest('div').removeClass('has-error');
		imageO.closest('div').addClass('has-success');
		console.log("not error");
	}else{
		isimage=false;
		imageO.closest('div').find('.error_messages').remove();
		imageO.after('<label class="error_messages">please select only image<label>');
		imageO.closest('div').addClass('has-error');
		imageO.closest('div').removeClass('has-success');
		console.log("error");
	}



/*	&& (iszip== true || zip== "") &&*/

	if (isname==true && isaddress== true  && isstate== true && iscity== true && (isurl== true || url=="") && (isnumber== true || isnumber=="") && (isimage== true || image=="") ) {
		return true;
	}else{
		return false;
	}
}

/*===========================================##################========================================================*/
/*===========================================Addschool form ends========================================================*/
/*===========================================##################========================================================*/

/*===========================================##################========================================================*/
/*===========================================addteacher form starts========================================================*/
/*===========================================##################========================================================*/
$('#addteacher_btn').on('click',function (argument) {

	var tname=$('#addteacher_name');
	var taddress=$('#addteacher_address');
	var tsubject=$('#addteacher_subject');
	var tabout=$('#addteacher_about');
	var state=$('#state_id');
	var city=$('#city');
	var zip=$('#addteacher_zip');
	var school_id=$('#school_id');
	var image=$('#upload-1');

	if (addteacherform(tname,taddress,tsubject,tabout,state,city,zip,school_id,image)) {
		$('#addteacher_form').submit();
		
	} 	
});

$('#addteacher_name').focusout(function (argument) {
	if(validateWords($(this).val())){
		
		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		
		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#addteacher_subject').focusout(function (argument) {
	if(validateWords($(this).val())){
		
		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		
		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

$('#addteacher_address').focusout(function (argument) {
	if($(this).val() !=""){
		
		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{
		
		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});

/*$('#schools_about').focusout(function (argument) {
	if($(this).val() ==""){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please provide text only<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
	}	
});*/

$('#addteacher_zip').focusout(function (argument) {
	if(validateNumber($(this).val()) || $(this).val()==""){

		$(this).closest('div').find('label').remove();
		$(this).closest('div').removeClass('has-error');
		$(this).closest('div').addClass('has-success');
		console.log('true===')
	}else{

		$(this).closest('div').find('label').remove();
		$(this).after('<label class="error_messages">Please enter valid zip<label>');
		$(this).closest('div').addClass('has-error');
		$(this).closest('div').removeClass('has-success');
		console.log('')
	}	
});

function  addteacherform(tnameO,taddressO,tsubjectO,taboutO,stateO,cityO,zipO,school_idO,imageO) {
	var tname=tnameO.val();
	var taddress=taddressO.val();
	var tsubject=tsubjectO.val();
	var tabout=taboutO.val();
	var state=stateO.val();
	var city=cityO.val();
	var zip=zipO.val();
	var school_id=school_idO.val();
	var image=imageO.val().split('\\').pop();

	var isname;
	var isaddress;
	var issubject;
	var issabout;
	var isstate;
	var iscity;
	var iszip;
	var isimage;
	var isschool_id;




	if(validateWords(tname)){
		isname=true;
		tnameO.closest('div').find('label').remove();
		tnameO.closest('div').removeClass('has-error');
		tnameO.closest('div').addClass('has-success');
	}else{
		isname=false;
		tnameO.closest('div').find('label').remove();
		tnameO.after('<label class="error_messages">Please provide text only<label>');
		tnameO.closest('div').addClass('has-error');
		tnameO.closest('div').removeClass('has-success');
	}

	if(taddress !=""){
		isaddress=true;
		taddressO.closest('div').find('label').remove();
		taddressO.closest('div').removeClass('has-error');
		taddressO.closest('div').addClass('has-success');
	}else{
		isaddress=false;
		taddressO.closest('div').find('label').remove();
		taddressO.after('<label class="error_messages">Please provide text only<label>');
		taddressO.closest('div').addClass('has-error');
		taddressO.closest('div').removeClass('has-success');
	}

	if(validateWords(tsubject)){
		issubject=true;
		tsubjectO.closest('div').find('label').remove();
		tsubjectO.closest('div').removeClass('has-error');
		tsubjectO.closest('div').addClass('has-success');
	}else{
		issubject=false;
		tsubjectO.closest('div').find('label').remove();
		tsubjectO.after('<label class="error_messages">Please provide text only<label>');
		tsubjectO.closest('div').addClass('has-error');
		tsubjectO.closest('div').removeClass('has-success');
	}


	if(state !=""){
		isstate=true;
		stateO.closest('div').find('label').remove();
		stateO.closest('div').removeClass('has-error');
		stateO.closest('div').addClass('has-success');
	}else{
		isstate=false;
		stateO.closest('div').find('label').remove();
		stateO.after('<label class="error_messages">Please select state<label>');
		stateO.closest('div').addClass('has-error');
		stateO.closest('div').removeClass('has-success');
	}

	if(city !=""){
		iscity=true;
		cityO.closest('div').find('label').remove();
		cityO.closest('div').removeClass('has-error');
		cityO.closest('div').addClass('has-success');
	}else{
		iscity=false;
		cityO.closest('div').find('label').remove();
		cityO.after('<label class="error_messages">Please select city<label>');
		cityO.closest('div').addClass('has-error');
		cityO.closest('div').removeClass('has-success');
	}

	if(validateNumber(zip) || zip==""){
		iszip=true;
		zipO.closest('div').find('label').remove();
		zipO.closest('div').removeClass('has-error');
		zipO.closest('div').addClass('has-success');
	}else{
		iszip=false;
		zipO.closest('div').find('label').remove();
		zipO.after('<label class="error_messages">Please enter valid zip<label>');
		zipO.closest('div').addClass('has-error');
		zipO.closest('div').removeClass('has-success');
	}

	if(validateFiles(image) || image ==""){
		isimage=true;
		imageO.closest('div').find('.error_messages').remove();
		imageO.closest('div').removeClass('has-error');
		imageO.closest('div').addClass('has-success');
		
	}else{
		isimage=false;
		imageO.closest('div').find('.error_messages').remove();
		imageO.after('<label class="error_messages">please select only image<label>');
		imageO.closest('div').addClass('has-error');
		imageO.closest('div').removeClass('has-success');
		
	}

	if(school_id !=""){
		isschool_id=true;
		school_idO.closest('div').find('.error_messages').remove();
		school_idO.closest('div').removeClass('has-error');
		school_idO.closest('div').addClass('has-success');


	}else{
		isschool_id=false;
		school_idO.closest('div').find('.error_messages').remove();
		school_idO.after('<label class="error_messages">Please select a school<label>');
		school_idO.closest('div').addClass('has-error');
		school_idO.closest('div').removeClass('has-success');

	}



				/*&& isstate== true && iscity== true && (iszip== true || zip== "")*/

	if (isname==true && isaddress== true   && (isimage== true || image=="") ) {
		return true;
	}else{
		return false;
	}
}



/*===========================================##################========================================================*/
/*===========================================addteacher form ends========================================================*/
/*===========================================##################========================================================*/








});