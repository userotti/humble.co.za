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

    <form class="form-horizontal" style="border: none;">
                
                 <h2 style="margin-bottom: 45px;"> Banking Details  </h2>
                
                  <div class="form-group bietjieweyerform">
                    
                    <label for="inputEmail" class="col-lg-3 control-label">Account Name</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="inputEmail" placeholder="Email Address">
                    </div>
                  </div>
                  
                  <div class="form-group bietjieweyerform">
                    
                    <label for="select" class="col-lg-3 control-label">Account Type</label>
      <div class="col-lg-7">
        <select class="form-control" id="select">
          <option>Current</option>
          <option>Savings</option>
          <option>Transmission</option>
          
        </select>
       
      </div>
                  </div>  
                  <div class="form-group bietjieweyerform">
                  
                    <label for="inputSurname" class="col-lg-3 control-label">Account Number</label>
                    <div class="col-lg-7">
                      <input type="password" class="form-control" id="inputSurname" placeholder="Surname">
                    </div>

                  </div>    
                  
                  <div class="form-group bietjieweyerform">
                  
                    <label for="inputCell" class="col-lg-3 control-label">Branch Code</label>
                    <div class="col-lg-7">
                      <input type="password" class="form-control" id="inputCell" placeholder="Cell Number">
                      <button type="button" class="btn btn-success" style="float: right; margin-top: 35px;"> Next </button>
                    </div>  

                  </div>

                 
                 
                  
               
              </form>
          
       


     </div>     
   </div>
   </div>

       
   <?php include 'footer.php' ?> 


   </div>

   <?php include 'scripts.php' ?>

   
  
  
  </body>
</html>