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

   <!-- MAIN CONTAINER -->

   <div class="container" id="main_container">
   
    
    <?php  include 'nav.php' ?>

    <div class="row" style="margin: 0px">
    <div  style="margin-top: 15px; align: center; paddin-left: auto;">

    <div class="col-md-8 col-md-offset-2" style="margin-top: 15px; margin-bottom: -15px;">  

    <form class="form-horizontal logintrigger" style="border: none;" action="http://api.humble.co.za/1.1/login" method="POST" data-callback="do_login">
                
                 <h2 style="margin-bottom: 45px;"> humble Sign In  </h2>
                
                 <div class="log-error"></div>
              

                  <div class="form-group bietjieweyerform">
                    
                    <label for="inputEmail" class="col-lg-3 control-label">Email Address</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email Address">
                    </div>

                  </div>
                  <div class="form-group bietjieweyerform">
                  
                    <label for="inputPass" class="col-lg-3 control-label">humble Password</label>
                    <div class="col-lg-7">
                      <input type="password" class="form-control" name="password" id="inputPass" placeholder="humble Password">
                      <label><a style="float: left; margin-top: 35px;" id="lostlink" href="lostpassword.php"> Forgot Password? </a></label>
                      <button type="submit" class="btn btn-success" style="float: right; margin-top: 35px;"> Sign In </button>
                      
                    </div>  

                  </div>
                  </form>
                  <form class="form-horizontal logintrigger" style="border: none; display:none;" action="http://api.humble.co.za/1.1/login" method="GET" data-callback="do_pin_login" id="pinlogin">

                  <div class="form-group bietjieweyerform">
                  <h2 class="col-lg-offset-6 col-lg-1"> or </h2>
                  </div> 
                 
                  <div class="form-group bietjieweyerform">
                      <div class="pin-error"></div>
                     <label for="inputPin" class="col-lg-3 control-label">Cashier Pin</label>
                    <div class="col-lg-7">

                      <input type="text" class="form-control" name="pin" id="inputPin" placeholder="Cashier Pin">
                      
                      <button type="submit" class="btn btn-success" style="float: right; margin-top: 35px;"> Sign In </button>
                    </div>
                  </div> 
                  
              </form>
          
       


     </div>     
   </div>
   </div>

       
   <?php include 'footer.php' ?> 


   </div>

   <?php include 'scripts.php' ?>

   <script type="text/javascript">
   function do_pin_login(obj){

      var errors = jQuery('.pin-error');
      errors.html('');


      if(obj.rawData.message === 'OK'){
        window.location = 'http://till.humble.co.za'; // TILL URL
      }else{
        errors.html('<div class="alert alert-danger">'+obj.rawData.message+'</div>');
      }
   }
    function do_login(obj){

      var errors = jQuery('.log-error');
      errors.html('');
      if(obj.rawData.message !== 'OK'){
        errors.html('<div class="alert alert-danger">'+obj.rawData.message+'</div>');
        return;
      }

      jQuery.cookie('token', obj.data.token_guid, {path: '/', domain: 'humble.co.za'});
      jQuery.cookie('channel', obj.data.channel_guid, {path: '/', domain: 'humble.co.za'});
      jQuery.cookie('user_guid', obj.data.user_guid, {path: '/', domain: 'humble.co.za'});
      jQuery.cookie('clean_login','true', {path: '/', domain: 'humble.co.za'});

      window.location = 'http://till.humble.co.za'; // TILL URL

    }


    jQuery(function($){

      $('.logintrigger').baldrick({
        helper : {
          bind  : function(trig){
            trig.data('device', jQuery.cookie('deviceGUID'));
          }
        }
      })


      $('#inputEmail').on('keyup blur', function(){
          $('#lostlink').attr('href', 'lostpassword.php?email='+this.value);
      });

      if( jQuery.cookie('token') ){
        jQuery('#pinlogin').data('request', 'http://api.humble.co.za/1.1/'+jQuery.cookie('token')+'/lock_till').show();
      }

    });

  </script>
  
  
  </body>
</html>