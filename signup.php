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
	setcookie("deviceGUID", gen_uuid(), time() + 3600 * 24 * 24 * 24);
}

?>

<!DOCTYPE html>



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

	
	<!-- MAIN CONTAINER -->

	<div class="container" id="main_container">


		<?php  include 'nav.php' ?>

		<div class="row" style="margin: 0px" id="package-wrap">
			<div  style="margin-top: 15px; align: center; paddin-left: auto;">

				<div class="col-md-8 col-md-offset-2" style="margin-top: 15px; margin-bottom: -15px;">  
					<div id="reg-wrap" >
						<h2 style="margin-bottom: 45px;"> Sign Up  </h2>
						
						<div id="height-wrapper" style="">

							<form class="form-horizontal client-details-stage" style="border: none;" action="http://api.humble.co.za/1.1/email_validate" method="POST">

								

									<div class="form-group bietjieweyerform">

									<label for="inputEmail" class="col-lg-3 control-label">Email *</label>
									<div class="col-lg-7">
										<input required name="email" type="email" class="form-control"  id="inputEmail" placeholder="Email">
										<span class="help-block" id="email-error" style="display:none;"></span>
									</div>
									</div>

									<div class="form-group bietjieweyerform">

										<label for="inputFirstName" class="col-lg-3 control-label">First Name *</label>
										<div class="col-lg-7">
											<input required name="fname" type="text" class="form-control naamenvan disableable" id="inputFirstName" placeholder="First Name">
											<span class="help-block" id="firstname-error" style="display:none;"></span>
										</div>
									</div>  
									<div class="form-group bietjieweyerform">

										<label for="inputSurname" class="col-lg-3 control-label">Surname *</label>
										<div class="col-lg-7">
											<input required name="sname" type="text" class="form-control naamenvan disableable" id="inputSurname" placeholder="Surname">
											<span class="help-block" id="surname-error" style="display:none;"></span>
										</div>

									</div>    

									<div class="form-group bietjieweyerform">

										<label for="inputCell" class="col-lg-3 control-label">Cell Number *</label>
										<div class="col-lg-7">
											<input required name="cellnr" type="text" class="form-control disableable" id="inputCell" placeholder="Cell Number">
											<span class="help-block" id="cell-error" style="display:none;"></span>
										</div>  

									</div>



									<div class="form-group bietjieweyerform password-group">

										<label for="firstPass" class="col-lg-3 control-label"> Password *</label>
										<div class="col-lg-7">
											<input required type="password" class="form-control passin" id="firstPass" placeholder="Password">
											<span class="help-block" id="password-error" style="display:none;"></span>	
										</div>  

									</div>

									<div class="form-group bietjieweyerform password-group">

										<label for="secondPass" class="col-lg-3 control-label">Confirm Password</label>
										<div class="col-lg-7">
											<input required type="password" name="pword" class="form-control passin" id="secondPass" placeholder="Confirm Password">	
											<span class="help-block" id="confirm-password-error" style="display:none;"></span>			
										</div> 

									</div>
									<div class="form-group bietjieweyerform form-error" style="display:none;">  </div>

									<div class="form-group bietjieweyerform">
										<div class="col-lg-3"></div>
										<div class="col-lg-7">
											<button id="client-details-btn" class="btn btn-success" style="float: right; margin-top: 35px;"> Next </button>
											
										</div>
									</div>

							</form>

							<form class="form-horizontal company-details-stage" style="border: none; display:none;" action="http://api.humble.co.za/1.1/email_validate" method="POST">

									

									<div class="form-group bietjieweyerform">

										<label for="compnyName" class="col-lg-3 control-label">Company Name *</label>
										<div class="col-lg-7">
											<input type="text" name="companyname" class="form-control" id="companyName" placeholder="Company Name" required>
											<span class="help-block" id="company-error" style="display:none;"></span>	
										</div>
									</div>

									<div class="form-group bietjieweyerform">

										<label for="inputCell" class="col-lg-3 control-label">Store Type *</label>
										<div class="col-lg-7">
											<input type="text" class="form-control" name="storetype" id="storeType" placeholder="Store Type" required>
											<span class="help-block" id="store-type-error" style="display:none;"></span>	
											
										</div>  

									</div>

									<div class="form-group bietjieweyerform">

										<label for="inputCell" class="col-lg-3 control-label">Store Name *</label>
										<div class="col-lg-7">
											<input type="text" class="form-control" name="sitename" id="storeName" placeholder="Store Name" required>
											<span class="help-block" id="store-name-error" style="display:none;"></span>	
											<button id="company-details-btn" disabled="true" class="btn btn-success" style="float: right; margin-top: 35px;"> Next </button>
										</div>  

									</div>

							</form>

							<div class="package-details" style="display: none">

								<div  style="margin-top: 35px; align: center; paddin-left: auto;">	
								
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

							           <button type="button" class="btn btn-success  package-button" id="free-package-btn">Free</button>

							        </div>
							      

							    </div>
							    
								</div>

							</div>

						


						</div> 




					</div>
				</div>     
			</div>
		</div>


		<?php include 'footer.php' ?> 


	</div>
<?php include 'scripts.php' ?>
<script src="js/reg_form_handler.js"> </script>

