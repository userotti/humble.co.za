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

    
                
    <div class="row" style="margin: 0px;" >
    <div  style="margin-top: 35px; align: center; paddin-left: auto;">
        <h2 style="margin-bottom: 45px; margin-left: 45px;"> Choose A Package </h2>

        <div class="col-md-3 pricing_columns_index" > <h2> Basic  </h2> <p> This is the most basic package for the humble till, it is intended to let users be able to experience the till and explore its features. </p>
          <ul>

            <li> 1 till </li>
            <li> 10 Products </li>
            <li> 1 users </li>
            
           </ul> 
         <button type="button" class="btn btn-success" id="pricing-button">Free</button>



        </div>

        <div class="col-md-3 pricing_columns_index"> <h2> Bronze  </h2> <p>The Bronze package is perfect for any shop or startup that wants to simplify their sale procedure. From classical retail to restaurants or coffee shops, this package would suffice.</p> 
           <ul>
            <li> Up to 2 tills </li>
            <li> 50 Products </li>
            <li> Up to 5 users </li>
            
           </ul> 
          <button type="button" class="btn btn-success" id="pricing-button">R195 per month</button>
        </div>

        <div class="col-md-3 pricing_columns_index" style="background-color: #98dfb3; color: #ffffff">  <h2> Gold  </h2> <p> The Gold package is aimed at the business looking to start franchising their shops. It allows the owner to have one central database which keeps track of all of his individual outlets.   </p> 
           <ul>
            <li> Up to 5 tills  </li>
            <li> 100 Products </li>
            <li> Up to 10 users </li>
            
           </ul> 
          <button type="button" class="btn btn-success" id="pricing-button"> R245 per month</button>

        </div>

         <div class="col-md-3 pricing_columns_index">  <h2> Premium  </h2> <p> Large franchises need to have one central datastore that connects all of the stores' sales information. This package does exactly that. It allows you to make choices about the future of you business depending on the data stored in the cloud.  </p> 
           <ul>
            <li> Unlimited tills </li>
            <li> Unlimited products </li>
            <li> Unlimited users </li>
            
           </ul> 

          <button type="button" class="btn btn-success" id="pricing-button">R495 per month</button>
        </div>


    </div>
    </div>
   </div>
   </div>

       
   <?php include 'footer.php' ?> 


   </div>

   <?php include 'scripts.php' ?>

   
  
  
  </body>
</html>