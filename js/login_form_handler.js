



var login_JSON = {


	"token"			:   "niks",
	"siteguid"		:   "niks",
	"device"		:	"",
	"device_type"	:	"browser",
	"device_name"	:	"weeti",
	"longitude"		:	"x",
	"latitude"		:	"y",
	"address"		:   "weet nie",
	"email"			:	"niks",
	"password"		:	"niks",
	"pin"			:   "",

};



function AjaxCallToSiteAuthLogin(){

	//console.log($.cookie('deviceGUID'));



	$.ajax({

		url: 'http://api.humble.co.za/1.1/login',
		type: 'POST',
		data: login_JSON,
		success: function(response) {

			//console.log(response);

			$.cookie('token', response.token_guid, {path: '/', domain: 'humble.co.za'});
			
			$.cookie('channel', response.channel_guid, {path: '/', domain: 'humble.co.za'});
				
			$.cookie('user_guid', response.user_guid, {path: '/', domain: 'humble.co.za'});

			$.cookie('clean_login','true', {path: '/', domain: 'humble.co.za'});
			


			if (response.message == "OK") { //$.cookie('site_guid' , response.site_guid, {path: '/', domain: 'humble.co.za'});
				
				
				$.cookie('site_guid' , response.site_guid, {path: '/', domain: 'humble.co.za'});

				$('#main-error').html('<p style="font-size: 15px; color: #ff0000"> Login Successful. </p>').show();
				$('#main-error').fadeOut(3000);
				
				

				window.location = 'http://till.humble.co.za';

			}else{

				

				$('#main-error').html('<p style="font-size: 15px; color: #ff0000">'+ response.message + '  </p>').show();
				$('#main-error').fadeOut(3000);



			}
			

			


		},

		error: function(ret){

			
			$('#main-error').html('<p style="font-size: 15px; color: #ff0000">Sorry, Please tri again.</p>').show();
			$('#main-error').fadeOut(3000);

			console.log("error");
			console.log(ret);

		}	

	});
	

};	

function pinIsSet(){

	if ($('#inputPin').val().toString().length == 4){

		return true;

	}else{

		return false;

	}	

}

function siteguidIsSet(){	

	console.log("site_guid cookie: " + $.cookie('site_guid'))
	
	if ($.cookie('site_guid')){

		return true;

	}else{

		return false;

	}	

}

function emailAndPasswordIsSet(){

	if (($('#inputEmail').val().toString().length != 0) && ($('#inputPass').val().toString().length != 0)) {

		return true;

	}else{

		return false;

	}	

}



$(document).ready(function(){


	//login


	$('#login-button').on('click', function(){
		
		
		$('#login-button').attr('disable', true);

		var email_val = $('#inputEmail').val().toString();
		var pass_val = $('#inputPass').val().toString();
		var pin_val = $('#inputPin').val();

		if (!siteguidIsSet() && !emailAndPasswordIsSet()){


			$('#main-error').html('<p style="font-size: 15px; color: #ff0000">Please enter email and password to log in. </p>').show();
			$('#main-error').fadeOut(3000);


		}else{

			



		}

		if ((email_val.length != 0) && (pass_val.length != 0) ){

			if ($.cookie('site_guid')) {

				login_JSON.siteguid = $.cookie('site_guid');

			}

			
			login_JSON.device = $.cookie('deviceGUID');
			login_JSON.email = $('#inputEmail').val().toString();
			login_JSON.password = $('#inputPass').val().toString();
			login_JSON.pin = "";


			AjaxCallToSiteAuthLogin("emailpass");

		}else{

			if ( (pin_val.length == 4) && ($.cookie('site_guid')) ){

				login_JSON.siteguid = $.cookie('site_guid');	
				login_JSON.device = $.cookie('deviceGUID');
				login_JSON.pin = pin_val;
				
				AjaxCallToSiteAuthLogin("pin");	
				
			}		


		}

		


		
	});


});