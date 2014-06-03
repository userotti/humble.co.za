/*

function get_cookies_array() {

    var cookies = { };

    if (document.cookie && document.cookie != '') {
        var split = document.cookie.split(';');
        for (var i = 0; i < split.length; i++) {
            var name_value = split[i].split("=");
            name_value[0] = name_value[0].replace(/^ /, '');
            cookies[decodeURIComponent(name_value[0])] = decodeURIComponent(name_value[1]);
        }
    }

    return cookies;
   
}
var cookies = get_cookies_array();
for(var name in cookies) {
 console.log( name + " : " + cookies[name]);
}

*/




var login_JSON = {

	"device_type"	:	"browser",
	"device_name"	:	"weeti",
	"longitude"		:	"x",
	"latitude"		:	"y",
	"address"		:   "weet nie",
	"email"			:	"",
	"password"		:	""

};



var userdata_JSON = {

	"email" : "null",
	"userguid" : "null",
	"fname" : "null",
	"sname" : "null",
	"cellnr" : "null",
	"pword" : "null",

	"companyguid" : "null",
	"companyname" : "null",
	
	"sitename" : "null",
	"siteguid" : "null",

	"storetype" : "null",
    "packageguid" : "null",	

    "accname" : "null",
    "acctype" : "null",
    "accnr" : "null",
    "branchcode" : "null",

    "live" : "null",
    "message" : "null",

    "channelguid" : "null",

};


function setUserData(userdata, serverobject){

	
	userdata.userguid = serverobject.userguid;
	userdata.fname = serverobject.fname;
	userdata.sname = serverobject.sname;
	userdata.cellnr = serverobject.cellnr;
	
	userdata.companyguid = serverobject.companyguid;
	userdata.companyname = serverobject.companyname;
	userdata.sitename = serverobject.sitename;
	userdata.siteguid = serverobject.siteguid;
	userdata.storetype = serverobject.storetype;
	userdata.packageguid = serverobject.packageguid;
	userdata.live = serverobject.live;
	userdata.message = serverobject.message;
	userdata.channelguid = serverobject.channelguid;

	console.log(userdata);


};

		


function AjaxCallToUserAuth(){

	
	
	login_JSON['email'] = userdata_JSON['email'];
	login_JSON['password'] = userdata_JSON['pword'];


	$.ajax({

		url: 'http://api.humble.co.za/1.1/' + $.cookie("deviceGUID") + '/login',
		type: 'POST',
		data: login_JSON,
		success: function(response) {

			

			$.cookie('token', response.token_guid, {path: '/', domain: 'humble.co.za'});
			
			$.cookie('channel', userdata_JSON.channelguid, {path: '/', domain: 'humble.co.za'});
				
			$.cookie('user_guid', response.user_guid, {path: '/', domain: 'humble.co.za'});

			$.cookie('clean_login','true', {path: '/', domain: 'humble.co.za'});
			
			$.cookie('siteguid', null, {path: '/', domain: 'humble.co.za'});

			$.cookie('siteguid', userdata_JSON.siteguid, {path: '/', domain: 'humble.co.za'});

			console.log(userdata_JSON.siteguid);
			console.log($.cookie('siteguid'));
				

			window.location = 'http://till.humble.co.za';


		},

		error: function(ret){

			console.log("error");
			console.log(ret);

		}	

	});
	

};			


function isEmpty(value){

	if ((value == "") || (value == null) || (value == "null")){


		return true; 

	}else{


		return false;

	}


}
function populateWhatWeHave(p_userdata){

	if (p_userdata.live == -1){

		console.log("splinter nuwe man:");
		console.log(p_userdata);


		if (!isEmpty(p_userdata.fname)){

			$('#inputFirstName').val(p_userdata.fname);

		}

		if (!isEmpty(p_userdata.sname)){

			$('#inputSurname').val(p_userdata.sname);

		}

		if (!isEmpty(p_userdata.cellnr)){

			$('#inputCell').val(p_userdata.cellnr);

		}

		
		/*
		userdata_JSON["companyname"] = $('#companyName').val().toString();
		userdata_JSON["sitename"] = $('#storeName').val().toString();
		userdata_JSON["storetype"] = $('#storeType').val().toString();*/

		if (!isEmpty(p_userdata.companyname)){

			$('#companyName').val(p_userdata.companyname);

		}

		if (!isEmpty(p_userdata.sitename)){

			$('#storeName').val(p_userdata.sitename);

		}

		if (!isEmpty(p_userdata.storetype)){

			$('#storeType').val(p_userdata.storetype);

		}

	}




};

function AjaxCallToEmailValidate(field){

	$.ajax({

		url: 'http://api.humble.co.za/1.1/email_validate',
		type: 'POST',
		data: userdata_JSON,
		success: function(response) {


			

			switch (field){

				case "email" :
					
					setUserData(userdata_JSON, response);
					errorMessage("email");
					disabledForm();

					populateWhatWeHave(response);

					if (companyDetailsLooksOK()){

						$('#company-details-btn').attr("disabled", false);

					}else{
				
						$('#company-details-btn').attr("disabled", true);

					}


				break;

				case "fname" :

					setUserData(userdata_JSON, response);

				
					
				
				break;

				case "sname" :

					setUserData(userdata_JSON, response);

				
					
				
				break;

				case "cellnr" :

					setUserData(userdata_JSON, response);

				
					
				
				break;

				case "stage1_btn" :
				setUserData(userdata_JSON, response);

				$('.client-details-stage').hide();
				$('.company-details-stage').show();

				break;

				case "stage2_btn" :
				setUserData(userdata_JSON, response);


				$('.company-details-stage').hide();
				$('.package-details').show();

				break;


				case "stage3_free_btn" :

					userdata_JSON.live = response.live;

					AjaxCallToUserAuth();

				break;

				case "stage3_pro_btn" :

					/*userdata_JSON.live = response.live;

						AjaxCallToUserAuth();*/
					$('.package-details').hide();
					$('.banking-details-stage').show();	


				break;

				case "stage4_btn" :

					

					userdata_JSON.live = response.live;
					AjaxCallToUserAuth();
					


				break;

			}				

		},

		error: function(response){

			console.log("error in AjaxCallToEmailValidate");

		},

	});

}; 

	

function emailFieldLooksOK(){
	
	if ($('#inputEmail').val() == null) return false;

	var email_val = $('#inputEmail').val().toString();

	if( (email_val.indexOf("@") != -1) && (email_val.indexOf(".") > email_val.indexOf("@")) && (email_val.indexOf(".") != (email_val.length-1)) ) {
				
		return true;

	}else{				

		return false;						
			
	}	

};



function emailIsNew_checkJSON(){
	
	if (userdata_JSON.live == "-1"){			
		return true;
	}else{
		return false;
	}	
	
};



function firstNameLooksOK(){

	if ($('#inputFirstName').val() == null) return false;
	
	var firstname_val = $('#inputFirstName').val().toString();

	if((firstname_val.length != 0)) {

		return true;

	}else{				

		return false;						
			
	}	

};


function surnameLooksOK(){
	
	if ($('#inputSurname').val() == null) return false;

	var surname_val = $('#inputSurname').val().toString();

	if((surname_val.length != 0)) {

		return true;

	}else{				

		return false;						
			
	}	

};

function cellNumberLooksOK(){

	if ($('#inputCell').val() == null) return false;
	
	//console.log("1st?");
	var cell_val = $('#inputCell').val().toString();

	if(validateCode(cell_val) && (cell_val.length == 10) && (cell_val.indexOf("0") == 0)) {


		return true;

	}else{				


	//console.log("2de?");
		return false;						
			
	}	

};

function passwordLooksOK(){

	if ($('#firstPass').val() == null) return false;

	var pass_val = $('#firstPass').val().toString();

	if (pass_val.length > 6){

		return true;

	}else{

		return false;

	}


}


function confirmPasswordLooksOK(){

	if (($('#firstPass').val() == null) || ($('#secondPass').val() == null)) return false;

	var pass1_val = $('#firstPass').val().toString(),
		pass2_val = $('#secondPass').val().toString();
		
		if(pass1_val == pass2_val) {
				
				return true;
		
		}else{
				
				return false;
				
		}	

}


function everythingLooksOK(){
	

	if (emailFieldLooksOK() && emailIsNew_checkJSON() && firstNameLooksOK() && surnameLooksOK() && cellNumberLooksOK() && passwordLooksOK() && confirmPasswordLooksOK()){

		return true;
	
	}else{

		return false;

	}

}	

function allTheFieldsEqualTheJSON(){
	if ( ($('#inputEmail').val() == userdata_JSON.email) &&
		 ($('#inputFirstName').val() == userdata_JSON.fname) &&
		 ($('#inputSurname').val() == userdata_JSON.sname) &&
		 ($('#inputCell').val() == userdata_JSON.cellnr) &&
		 ($('#firstPass').val() == userdata_JSON.pword)){

		return true;
	}
	else{

		return false;

	}	

		 



}

function disabledForm(){

	if (emailIsNew_checkJSON()){

		$('.disableable').attr('disabled', false);

	}else{

		$('.disableable').attr('disabled', true);

	}

};


function companyDetailsLooksOK(){

	console.log("$('#companyName').val()" + $('#companyName').val());


	if (($('#companyName').val().length != 0) && ($('#storeType').val().length != 0) && ($('#storeName').val().length != 0)){

		//console.log("compadetails looks ok");
		return true;
	}	
	else{
		

		//console.log("compadetails does not look good");
		return false;

	}			

}

function bankingDetailsLooksOK(){

	console.log("$('#accountName').val()" + $('#accountName').val());


	if (($('#accountName').val().length != 0) && ($('#accountNumber').val().length >= 10) && ($('#branchCode').val().length >= 6)){

		return true;
	}	
	else{

		return false;

	}			

}


function errorMessage(field){

	switch (field){

		case "email":

			var errorbox = $('#email-error');
			var parent = errorbox.closest('.form-group');

			parent.removeClass('has-error');
			errorbox.html('').hide();

			var email_val = $('#inputEmail').val().toString();

			

			if (emailFieldLooksOK(email_val)){

				

				switch (userdata_JSON.live){

					case -1 :

						

						errorbox.html('').hide();
						

					break;
					case "0" :

						
						
						parent.addClass('has-error');
						errorbox.html('User canceled').show();
						

					break;
					case "1" :

						
						
						parent.addClass('has-error');
						errorbox.html('User already exists.  <a href="login.php"> Log in </a>').show();
						


					break;

				}

			} 
			else{

				parent.addClass('has-error');
				errorbox.html( '"' + email_val + '"' + ' is not a valid email address.').show();

			}

		break;
		/*niksniksnioknksninkknsinks*/

		case "fname":

			var errorbox = $('#firstname-error');
			var parent = errorbox.closest('.form-group');

			parent.removeClass('has-error');
			errorbox.html('').hide();

			var firstname_val = $('#inputFirstName').val().toString();

			if (firstNameLooksOK(firstname_val)){



			}else{

				parent.addClass('has-error');
				errorbox.html('"' + firstname_val + '"'+ ' is not a valid name.').show();

			};

		break;


		case "sname":

			var errorbox = $('#surname-error');
			var parent = errorbox.closest('.form-group');

			parent.removeClass('has-error');
			errorbox.html('').hide();

			var surname_val = $('#inputSurname').val().toString();

			if (surnameLooksOK(surname_val)){



			}else{

				parent.addClass('has-error');
				errorbox.html('"' + surname_val + '"'+ ' is not a valid surname.').show();

			};

		break;


		case "cellnr":

			var errorbox = $('#cell-error');
			var parent = errorbox.closest('.form-group');

			parent.removeClass('has-error');
			errorbox.html('').hide();

			var cell_val = $('#inputCell').val().toString();

			if (cellNumberLooksOK()){

				

			}else{

				parent.addClass('has-error');
				errorbox.html('"' + cell_val + '"'+ ' is not a valid cell number.').show();

			};

		break;

		case "pword":

			var pass_val = $('#firstPass').val().toString(),
		
		    errorbox = $('#password-error'),
			parent = errorbox.closest('.form-group');

			parent.removeClass('has-error');


			if(passwordLooksOK()) {
				
				errorbox.html('').hide();
				return true;
			

			}else{
				
				parent.addClass('has-error');
				errorbox.html('Password needs to be more than 6 characters').show();
				return false;	
				
			}

		break;


		case "cpword":

		var pass1_val = $('#firstPass').val().toString(),
			pass2_val = $('#secondPass').val().toString(),
		    errorbox = $('#confirm-password-error'),
			parent = errorbox.closest('.form-group');

			parent.removeClass('has-error');
			errorbox.html('').show();

			if(confirmPasswordLooksOK()) {
				
				errorbox.html('').hide();
				confirm_ok = true;
				
			

			}else{
				
				if (pass2_val.length > 6){
					parent.addClass('has-error');
					errorbox.html('Your passwords need to match.').show();
				}

				
			}	

		break;	

	}


	if (everythingLooksOK()){


		$('#client-details-btn').attr("disabled", false);


	}else{

		

		$('#client-details-btn').attr("disabled", true);

	}

}

$(document).ready(function(){







	//STAGE 1 ////////////








	$('#client-details-btn').attr("disabled", true);

	

	$('#reg-wrap').on('blur', '#inputEmail', function(){
			

		var email_val = $('#inputEmail').val().toString();

		if (emailFieldLooksOK()) {

			userdata_JSON["email"] = email_val;

			AjaxCallToEmailValidate("email");

		};

		errorMessage("email");

	});




	

	$('#reg-wrap').on('blur', '#inputFirstName', function(){
		

		
		var firstname_val = $('#inputFirstName').val().toString();
		
		if (firstNameLooksOK()) {
			
			userdata_JSON["fname"] = firstname_val;

			AjaxCallToEmailValidate("fname");

		}	


		errorMessage("fname");


	});



	$('#reg-wrap').on('blur', '#inputSurname ', function(){
		
			var surname_val = $('#inputSurname').val().toString();
		
			if (surnameLooksOK()){

				userdata_JSON["sname"] = surname_val;

				AjaxCallToEmailValidate("sname");

			}

			
		errorMessage("sname");	
			

	});




	$('#reg-wrap').on('blur', '#inputCell', function(){

		var cell_val = $('#inputCell').val().toString();
		
			if (cellNumberLooksOK()){

			
				userdata_JSON["cellnr"] = cell_val;

				AjaxCallToEmailValidate("cellnr");

			}
	
		errorMessage("cellnr");	
			
	});



	$('#reg-wrap').on('keyup change', '.passin', function(){
		
		errorMessage('pword');
		errorMessage('cpword');


	});


	$('#reg-wrap').on('keyup change', '.passin', function(){
		
		errorMessage('pword');
		errorMessage('cpword');

	});

	
	$('#client-details-btn').on('click', function(){

		$('#client-details-btn').attr("disabled", true);

		

		var pass_val = $('#firstPass').val().toString();

		userdata_JSON["pword"] = pass_val;

		if (allTheFieldsEqualTheJSON()){

			AjaxCallToEmailValidate("stage1_btn");

		}else{

			$('#client-details-btn').attr("disabled", false);


			errorMessage("email");
			errorMessage("fname");
			errorMessage("sname");
			errorMessage("cellnr");


		}

		
		

	});








	//STAGE 2 //////////////

	
		


	$('.company-details-stage').on("keyup", function(){
	
		if (companyDetailsLooksOK()){

			$('#company-details-btn').attr("disabled", false);

		}else{
	
			$('#company-details-btn').attr("disabled", true);

		}

	});


	$('#company-details-btn').on("click", function(){

		$('#company-details-btn').attr("disabled", true);


		userdata_JSON["companyname"] = $('#companyName').val().toString();
		userdata_JSON["sitename"] = $('#storeName').val().toString();
		userdata_JSON["storetype"] = $('#storeType').val().toString();


		
		AjaxCallToEmailValidate("stage2_btn");

	});








	//STAGE 3 //////////////



	$('.package-button').attr('disabled', true);

	$('#terms1-chk-box').on('click', function(){

		console.log("hallo?");


		$('#free-package-btn').attr('disabled', !($('#free-package-btn').attr('disabled')));

	


	});

	$('#terms2-chk-box').on('click', function(){

		console.log("hallo?");


		$('#pro-package-btn').attr('disabled', !($('#pro-package-btn').attr('disabled')));

	


	});





	$('#free-package-btn').on('click', function(){


		$('#free-package-btn').attr('disabled', true);

		userdata_JSON["packageguid"] = "3E4172B5-C97B-49CF-9A9FCFDF1C4EE63F";
		userdata_JSON["accname"] = "Not Applicable";
		userdata_JSON["acctype"] = "Not Applicable";
		userdata_JSON["accnr"] = "Not Applicable";
		userdata_JSON["branchcode"] = "Not Applicable";

		AjaxCallToEmailValidate("stage3_free_btn");


	});

	$('#pro-package-btn').on('click', function(){


		$('#pro-package-btn').attr('disabled', true);

		userdata_JSON["packageguid"] = "b999ce3e-d1ed-11e3-b186-005056ba5bac";



		AjaxCallToEmailValidate("stage3_pro_btn");


	});






})



//STAGE 4 ////////////// BANKING


	$('#banking-details-btn').on('click', function(){

		$('#banking-details-btn').attr('disabled', true);
		AjaxCallToEmailValidate("stage4_btn");

	});



	$('.banking-details-stage').on("keyup", function(){
	
		if (bankingDetailsLooksOK()){

			$('#banking-details-btn').attr("disabled", false);

		}else{
	
			$('#banking-details-btn').attr("disabled", true);

		}

	});

	$('#accountNumber').on("keyup", function(){
		
		errorbox = $('#accountnum-error'),
		parent = errorbox.closest('.form-group');

		parent.removeClass('has-error');
		errorbox.html('').show();

		if ($('#accountNumber').val().length >= 10){

			errorbox.html('').hide();

		}else{
	
			parent.addClass('has-error');
			errorbox.html('Account number should have at least 10 digits.').show();

		}

	});

	$('#branchCode').on("keyup", function(){
		
		errorbox = $('#branchcode-error'),
		parent = errorbox.closest('.form-group');

		parent.removeClass('has-error');
		errorbox.html('').show();

		if ($('#branchCode').val().length >= 6){

			errorbox.html('').hide();

		}else{
	
			parent.addClass('has-error');
			errorbox.html('If branch code is less than 6 digits, fill up to 6 digits with 0s').show();

		}

	});

/*
errorbox = $('#confirm-password-error'),
			parent = errorbox.closest('.form-group');

			parent.removeClass('has-error');
			errorbox.html('').show();

			if(confirmPasswordLooksOK()) {
				
				errorbox.html('').hide();
				confirm_ok = true;
				
			

			}else{
				
				if (pass2_val.length > 6){
					parent.addClass('has-error');
					errorbox.html('Your passwords need to match.').show();
				}

				

*/


//GLOBAL FUNCS //////////







function check_user(obj){

			var errorbox = jQuery('#user-error'),
			parent = errorbox.closest('.form-group'),
			regbtn = jQuery('#client-details-btn');

			parent.removeClass('has-error');

			if(obj.data.error){
				parent.addClass('has-error');
				errorbox.html(obj.data.error).show();
				regbtn.prop('disabled', true);

			}else{
				errorbox.html('').hide();
				regbtn.prop('disabled', false);
			}
	};



function validateCode(thestring){
    
    if(thestring.match(/[^$,.\d]/)){
       
       return false;
    }
    
    return true;     
 }



