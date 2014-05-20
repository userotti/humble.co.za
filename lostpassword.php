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

    <form id="recover-form" class="form-horizontal baldrick" action="http://api.humble.co.za/1.1/recover-password" data-callback="recover_result" style="border: none;" method="POST">
                
        <h2 style="margin-bottom: 45px;"> Password Recovery  </h2>
                
        <div class="form-group bietjieweyerform">
          <label for="inputEmail" class="col-lg-3 control-label">Email Adress</label>
            <div class="col-lg-7">
                <input type="text" name="email" class="form-control" id="inputEmail" value="<?php if(!empty($_GET['email'])){ echo $_GET['email']; } ?>" placeholder="Email Address">
                <span class="help-block" id="user-error" style="display:none;"></span>
                <button type="submit" class="btn btn-success" style="float: right; margin-top: 35px;"> Send Recovery Email </button>
            </div>
        </div>
              
    </form>
    <span id="recover-result" style="display:none;">
        <h2 style="margin-bottom: 45px;"> Email Recovery  </h2>
        <p> A recovery email has been sent to the specified email address. </p>        
        <div class="form-group bietjieweyerform">
         
            <div class="col-lg-7">
              
                <a href="signin.php" class="btn btn-success" style="float: right; margin-top: 35px;"> Sign In </a>
            </div>
        </div>
    </span>
       


     </div>     
   </div>
   </div>

       
   <?php include 'footer.php' ?> 


   </div>

   <?php include 'scripts.php' ?>

   
  <script type="text/javascript">
  function recover_result(obj){
    var error = jQuery('#user-error'),
        parent = error.closest('.form-group');

      error.html('').hide();
      parent.removeClass('has-error');

    if(obj.data.error){
      error.html(obj.data.error).show();
      parent.addClass('has-error');

    }else{
      jQuery('#recover-form').fadeOut(function(){
        jQuery('#recover-result').fadeIn();
      })
    }
  }
  </script>
  
  </body>
</html>