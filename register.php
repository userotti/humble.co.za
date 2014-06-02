<?php

function gen_uuid($type='long') {
    if($type == 'long'){
    return strtoupper(sprintf( '%04x%04x-%04x-%04x-%04x%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    ));    
    }else{
        return strtoupper(sprintf( '%04x%04x',

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x0fff ) | 0x8000
    ));
    }
}


// BUILD A DEVICE ID
if(!isset($_COOKIE['deviceGUID'])){
	setcookie("deviceGUID", gen_uuid(), time() + 3600 * 24 * 24 * 24, '/', 'humble.co.za');
}

?><!DOCTYPE html>



<html>
<head>
	<title>humble</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/bootstrap_yeti.css" rel="stylesheet" media="screen">
	<link href="css/style.css" rel="stylesheet" media="screen">
	
	<link rel="icon" 
	type="image/ico" 
	href="img/favicon.ico">
</head>

<body>
	<!-- old package form 

		/*	<div class="col-md-3 pricing_columns_index" > <h2> Basic  </h2> <p> This is the most basic package for the humble till, it is intended to let users be able to experience the till and explore its features. </p>
				<ul> 

					<li> 1 till </li>
					<li> 10 Products </li>
					<li> 1 users </li>

				</ul> 
				<button type="button" class="btn btn-success baldrick package-button" data-request="http://api.humble.co.za/1.1/support/register" data-callback="save_reg" data-method="POST" data-package="3E4172B5-C97B-49CF-9A9FCFDF1C4EE63F" id="pricing-button" data-guid="{{guid}}">Free</button>



			</div>

			<div class="col-md-3 pricing_columns_index"> <h2> Bronze  </h2> <p>The Bronze package is perfect for any shop or startup that wants to simplify their sale procedure. From classical retail to restaurants or coffee shops, this package would suffice.</p> 
				<ul>
					<li> Up to 2 tills </li>
					<li> 50 Products </li>
					<li> Up to 5 users </li>

				</ul> 
				<button type="button" class="btn btn-success baldrick package-button" data-request="http://api.humble.co.za/1.1/support/register" data-callback="save_reg" data-method="POST" data-package="6DE0FFA8-A0B6-4A79-9347610CCA5B4CAB" id="pricing-button" data-guid="{{guid}}">R195 per month</button>
			</div>

			<div class="col-md-3 pricing_columns_index" style="background-color: #98dfb3; color: #ffffff">  <h2> Gold  </h2> <p> The Gold package is aimed at the business looking to start franchising their shops. It allows the owner to have one central database which keeps track of all of his individual outlets.   </p> 
				<ul>
					<li> Up to 5 tills  </li>
					<li> 100 Products </li>
					<li> Up to 10 users </li>

				</ul> 
				<button type="button" class="btn btn-success baldrick package-button" data-request="http://api.humble.co.za/1.1/support/register" data-callback="save_reg" data-method="POST" data-package="6FA91533-5F42-4888-8817FBBF9B0F94A9" id="pricing-button" data-guid="{{guid}}"> R245 per month</button>

			</div>

			<div class="col-md-3 pricing_columns_index">  <h2> Premium  </h2> <p> Large franchises need to have one central datastore that connects all of the stores sales information. This package does exactly that. It allows you to make choices about the future of you business depending on the data stored in the cloud.  </p> 
				<ul>
					<li> Unlimited tills </li>
					<li> Unlimited products </li>
					<li> Unlimited users </li>

				</ul> 				

				<button type="button" class="btn btn-success baldrick package-button" data-request="http://api.humble.co.za/1.1/support/register" data-callback="save_reg" data-method="POST" data-package="8401F83F-2072-49DD-96F3B9E5A191B3F9" id="pricing-button" data-guid="{{guid}}">R495 per month</button>
			</div>

		*/

	-->
	<!-- MAIN CONTAINER -->

	<div class="container" id="main_container">


		<?php  include 'nav.php' ?>

		<div class="row" style="margin: 0px" id="package-wrap">
			<div  style="margin-top: 15px; align: center; paddin-left: auto;">

				<div class="col-md-8 col-md-offset-2" style="margin-top: 15px; margin-bottom: -15px;">  
					<div id="reg-wrap" >
					</div>
				</div>     
			</div>
		</div>-


		<?php include 'footer.php' ?> 


	</div>

	<span id="register" class="baldrick" data-request="http://api.humble.co.za/1.1/support/register" data-target="#reg-wrap" data-template="#register-tmpl"></span>
	<span id="companydetails" class="baldrick" data-request="http://api.humble.co.za/1.1/support/register" data-target="#reg-wrap" data-template="#company-details-tmpl"></span>
	<span id="packages" class="baldrick" data-request="http://api.humble.co.za/1.1/support/register" data-target="#package-wrap" data-template="#packages-tmpl"></span>
	<span id="banking" class="baldrick" data-request="http://api.humble.co.za/1.1/support/register" data-target="#package-wrap" data-template="#bankdetails-tmpl"></span>


	<script type="text/html" id="register-tmpl">
		<form class="form-horizontal baldrick" style="border: none;" action="http://api.humble.co.za/1.1/support/register" method="POST" data-target="#reg-wrap" data-template="#company-details-tmpl" data-callback="save_reg">

			<h2 style="margin-bottom: 45px;"> Sign Up  </h2>

			<div class="form-group bietjieweyerform">

				<label for="inputEmail" class="col-lg-3 control-label">Email Address</label>
				<div class="col-lg-7">
					<input required name="email" type="email" class="form-control baldrick" data-check="user" data-request="http://api.humble.co.za/1.1/support/register" data-event="change" data-callback="check_user" id="inputEmail" placeholder="Email Address">
					<span class="help-block" id="user-error" style="display:none;"></span>
				</div>
			</div>

			<div class="form-group bietjieweyerform">

				<label for="inputFirstName" class="col-lg-3 control-label">First Name</label>
				<div class="col-lg-7">
					<input required name="firstname" type="text" class="form-control" id="inputFirstName" placeholder="First Name">
				</div>
			</div>  
			<div class="form-group bietjieweyerform">

				<label for="inputSurname" class="col-lg-3 control-label">Surname</label>
				<div class="col-lg-7">
					<input required name="lastname" type="text" class="form-control" id="inputSurname" placeholder="Surname">
				</div>

			</div>    

			<div class="form-group bietjieweyerform">

				<label for="inputCell" class="col-lg-3 control-label">Cell Number</label>
				<div class="col-lg-7">
					<input required name="cell" type="text" class="form-control" id="inputCell" placeholder="Cell Number">
				</div>  

			</div>



			<div class="form-group bietjieweyerform password-group">

				<label for="firstPass" class="col-lg-3 control-label"> Password</label>
				<div class="col-lg-7">
					<input required type="password" class="form-control passin" id="firstPass" placeholder="humble Password">

				</div>  

			</div>

			<div class="form-group bietjieweyerform password-group">

				<label for="secondPass" class="col-lg-3 control-label">Confirm Password</label>
				<div class="col-lg-7">
					<input required type="password" name="pass" class="form-control passin" id="secondPass" placeholder="Confirm Password">				
				</div> 

			</div>
			<div class="form-group bietjieweyerform password-group-error" style="display:none;"></div>

			<div class="form-group bietjieweyerform">
				<div class="col-lg-3"></div>
				<div class="col-lg-7">
					<button type="submit" id="reg-submit" class="btn btn-success" style="float: right; margin-top: 35px;"> Sign Up </button>
				</div>
			</div>

		</form>
	</script>

	<script type="text/html" id="company-details-tmpl">
		<form class="form-horizontal baldrick" style="border: none;" action="http://api.humble.co.za/1.1/support/register" method="POST" data-target="#package-wrap" data-template="#packages-tmpl" data-callback="save_reg" data-guid="{{guid}}">

			<h2 style="margin-bottom: 45px;"> Company Details </h2>

			<div class="form-group bietjieweyerform">

				<label for="compnyName" class="col-lg-4 control-label">Company Name</label>
				<div class="col-lg-7">
					<input type="text" name="company" class="form-control" id="compnyName" placeholder="Company Name" required>
				</div>
			</div>

			<div class="form-group bietjieweyerform">

				<label for="inputCell" class="col-lg-4 control-label">Store Type</label>
				<div class="col-lg-7">
					<input type="text" class="form-control" name="storetype" id="inputCell" placeholder="Store Type" required>
					
				</div>  

			</div>

			<div class="form-group bietjieweyerform">

				<label for="inputCell" class="col-lg-4 control-label">Store Name</label>
				<div class="col-lg-7">
					<input type="text" class="form-control" name="sitename" id="inputCell" placeholder="Store Name" required>
					<button type="submit" class="btn btn-success" style="float: right; margin-top: 35px;"> Next </button>
				</div>  

			</div>

		</form>

	</script>

	<script type="text/html" id="packages-tmpl">
		<div  style="margin-top: 35px; align: center; paddin-left: auto;">
			<h2 style="margin-bottom: 45px; margin-left: 45px;"> Choose A Package </h2>


    <div class="container"> 
    <div  class="row main_pricing_div">

        <div class="col-md-4 col-md-offset-4 main_col_height">
           <div class="header_area" style="background-color: #ffffff; color: #000000">  
            <h2 > Basic  </h2> 
            <p style="font-weight: 600; font-size: 20px" > Free </p>
           </div>

           <div class="features_area">
            <p> 1 till </p> 
            <p> 1 user </p> 
            <p> 10 products </p> 
            <p> No Bank Details required </p>
           </div>

           <button type="button" class="btn btn-success baldrick package-button" data-request="http://api.humble.co.za/1.1/support/register" data-callback="save_reg" data-method="POST" data-package="3E4172B5-C97B-49CF-9A9FCFDF1C4EE63F" id="pricing-button" data-guid="{{guid}}">Free</button>

        </div>
      

    </div>
    </div>

	
		</div>
	</script>
	<script type="text/html" id="bankdetails-tmpl">
		<div  style="margin-top: 15px; align: center; paddin-left: auto;">

			<div class="col-md-8 col-md-offset-2" style="margin-top: 15px; margin-bottom: -15px;">  
			
				<form class="form-horizontal baldrick" style="border: none;" action="http://api.humble.co.za/1.1/support/register" method="POST" data-callback="save_reg" data-device="{{device}}" data-guid="{{guid}}">

					<h2 style="margin-bottom: 45px;"> Banking Details  </h2>
					<span class="reg-error"></span>
					<div class="form-group bietjieweyerform">

						<label for="accName" class="col-lg-3 control-label">Account Name</label>
						<div class="col-lg-7">
							<input type="text" name="accname" class="form-control" id="accName" placeholder="Account name" required>
						</div>
					</div>

					<div class="form-group bietjieweyerform">

						<label for="select" class="col-lg-3 control-label" required>Account Type</label>
						<div class="col-lg-7">
							<select class="form-control" id="accType" name="acctype">
								<option value="1">Current</option>
								<option value="2">Savings</option>
								<option value="3">Transmission</option>

							</select>

						</div>
					</div>  
					<div class="form-group bietjieweyerform">

						<label for="accNum" class="col-lg-3 control-label">Account Number</label>
						<div class="col-lg-7">
							<input type="text" name="accnr" class="form-control" id="accNum" placeholder="Account number" required>
						</div>

					</div>    

					<div class="form-group bietjieweyerform">

						<label for="branchNr" class="col-lg-3 control-label">Branch Code</label>
						<div class="col-lg-7">
							<input type="text" name="branchcode" class="form-control" id="branchNr" placeholder="Branch code" required>
							<button type="button" class="btn btn-success baldrick" data-request="http://api.humble.co.za/1.1/support/register" data-guid="{{guid}}" data-backto="package" data-callback="save_reg" data-method="POST" data-target="#package-wrap" data-template="#packages-tmpl" data-callback="save_reg"  style="float: left; margin-top: 35px;">Back</button>
							<button type="submit" class="btn btn-success" style="float: right; margin-top: 35px;"> Next </button>
						</div>  

					</div>			

				</form>
			</div>
		</div>

	</script>
	<?php include 'scripts.php' ?>
	<script type="text/javascript">

		function check_user(obj){

			var errorbox = jQuery('#user-error'),
			parent = errorbox.closest('.form-group'),
			regbtn = jQuery('#reg-submit');

			parent.removeClass('has-error');

			console.log(obj);

			if(obj.data.error){
				parent.addClass('has-error');
				errorbox.html(obj.data.error).show();
				regbtn.prop('disabled', true);

			}else{
				errorbox.html('').hide();
				regbtn.prop('disabled', false);
			}
		}

		function save_reg(obj){

			console.log(obj);

			var errors = jQuery('.reg-error');
			errors.html('');
			if(obj.rawData.error){
				errors.html('<div class="alert alert-danger">'+obj.rawData.error+'</div>');
				return;
			}

			jQuery.removeCookie('company-guid');
			jQuery.removeCookie('user-guid');
			jQuery.removeCookie('package-guid');
			jQuery.removeCookie('banking-guid');

			jQuery('.package-button').data('guid', obj.rawData.guid).data('device', jQuery.cookie('deviceGUID'))
			
			if(obj.rawData.guid || obj.rawData.stage !== 'complete'){

				jQuery.cookie( obj.rawData.stage + '-guid', obj.rawData.guid, { expires: 365 });

				if(obj.rawData.stage !== 'banking'){
					return;	
				}else{
					jQuery('#banking').data('guid', obj.rawData.guid).data('device', jQuery.cookie('deviceGUID')).trigger('click');
				}
			}else{

				jQuery.cookie('token', obj.data.token_guid, {path: '/', domain: 'humble.co.za'});
				jQuery.cookie('channel', obj.data.channel_guid, {path: '/', domain: 'humble.co.za'});
				jQuery.cookie('user_guid', obj.data.user_guid, {path: '/', domain: 'humble.co.za'});

				window.location = 'http://till.humble.co.za'; // TILL URL
			}

		}


		jQuery(function($){

	// INITIALIZE BALDRICK
	if(jQuery.cookie('company-guid')){
		
		$('#companydetails').data('guid', jQuery.cookie('company-guid')).data('device', jQuery.cookie('deviceGUID')).trigger('click');

	}else if (jQuery.cookie('package-guid')){

		$('#packages').data('guid', jQuery.cookie('package-guid')).data('device', jQuery.cookie('deviceGUID')).trigger('click');

	}else if (jQuery.cookie('banking-guid')){

		$('#banking').data('guid', jQuery.cookie('banking-guid')).data('device', jQuery.cookie('deviceGUID')).trigger('click');

	}else{
		
		$('#register').data('device', jQuery.cookie('deviceGUID')).trigger('click');
	
	}

	// BIND PASSWORD CHECK
	$('#reg-wrap').on('keyup', '.passin', function(){
		var first 	= $('#firstPass'),
		second 	= $('#secondPass'),
		group	= $('.password-group'),
		msg		= $('.password-group-error');

		group.removeClass('has-error');

		if(first.val().length <= 0 || second.val().length <= 0){
			msg.html('').fadeOut();
			return;
		}

		if( first.val() !== second.val() ){
			// NOPE
			group.addClass('has-error');
			msg.html('<div class="alert alert-danger col-lg-7 col-lg-offset-3">Your passwords do not match.</div>').fadeIn();
		}else{
			// OK

			msg.html('<div class="alert alert-success col-lg-7 col-lg-offset-3">Your passwords match.</div>').fadeIn();
		}


	});



});




</script>



</body>
</html>



