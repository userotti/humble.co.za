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


    <div class="row" style="margin: 0px">
      <div  style="margin-top: 15px; align: center; paddin-left: auto;">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 15px; margin-bottom: -15px;">  
          
            <h2 style="margin-bottom: 45px;"> Login </h2>
            <div class="form-horizontal" style="border: none;">

              <div class="form-group bietjieweyerform">

                <label for="inputEmail" class="col-lg-3 control-label">First Name</label>
                <div class="col-lg-7">
                      <input required name="email" type="text" class="form-control" id="inputEmail" placeholder="Email">
                      <span class="help-block" id="firstname-error" style="display:none;"></span>
                </div>

              </div>  

              <div class="form-group bietjieweyerform">
                
                <label for="inputEmail" class="col-lg-3 control-label">Password</label>
                <div class="col-lg-7">
                      <input required name="pass" type="password" class="form-control" id="inputPass" placeholder="Password">
                      <span class="help-block" id="password-error" style="display:none;"></span>    
                     
                </div>

               </div>  
              <div class="form-group bietjieweyerform">
             
                    <div class="col-lg-7">
                      <h2> or </h2> 
                    </div>
              
              </div>

                <div class="form-group bietjieweyerform">
                  
                  <label for="inputPin" class="col-lg-3 control-label">Cashier PIN</label>
                  <div class="col-lg-7">

                        <input required name="pin" type="text" class="form-control" id="inputPin" placeholder="PIN">
                        
                        <button id="login-button" class="btn btn-success" style="float: right; margin-top: 35px;"> Log In </button>

                  </div>

                </div>  

             
                <span class="help-block" style="display:none;" id="main-error"></span>
                
               

            </div>


        </div>     
      </div>
    </div>


       
   <?php include 'footer.php' ?> 


   </div>

   <?php include 'scripts.php' ?>


   <script src="js/login_form_handler.js"> </script>
  
  
  </body>
</html>