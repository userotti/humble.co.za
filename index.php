<!DOCTYPE html>
<html>
  <head>
    <title>humble</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- <link href="css/normalize.css" rel="stylesheet" > -->
    <link href="css/bootstrap_yeti.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link rel="icon" 
      type="image/ico" 
      href="img/favicon.ico">
  </head>
  
  <body >

   
  
   
    <!-- APP TEMPLATE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    
    
    <?php include('app-template.html');    ?>



    <!-- INDEX TEMPLATE %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

    <?php include('index-template.html'); ?>


    <!-- SOFTWARE PRODUCT TEMPLATE -->


    <?php include('software-template.html'); ?>
    
    <!-- PRODUCT SUB MENUS ###########$$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

    <?php include('software-detail-templates.html'); ?>


    <!-- Contact & about Temp-->

    <?php include('sagepastel-template.html'); ?>  
   

    <?php include('contact-template.html'); ?>  
   
     <?php include('about-template.html'); ?>  
    
    <?php include('hardware-template.html'); ?>  
   


      
      
   <script src="js/libs/jquery-1.10.2.js"> </script>
   <script src="js/libs/handlebars-1.1.2.js"> </script>
   
   <!--  <script src="//code.jquery.com/jquery.min.js"></script> -->
    <script src="js/libs/bootstrap.min.js"></script>
    <script src="js/libs/ember-1.4.0.js"></script>
    
    <script src="js/products_model.js"></script>
    <script src="js/hardware_model.js"></script>
    <script src="js/contact_about_model.js"></script>



    <script src="js/app.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
   
  </body>
</html>