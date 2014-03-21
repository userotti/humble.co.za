<!DOCTYPE html>
<html>
  <head>
    <title>humble</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- <link href="css/normalize.css" rel="stylesheet" > -->
    <link href="css/bootstrap_yeti.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">

  </head>
  
  <body style="">
    
    <!-- APP TEMPLATE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    
    
    <?php include('app-template.html');    ?>



    <!-- INDEX TEMPLATE %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

    <?php include('index-template.html'); ?>


    <!-- SOFTWARE PRODUCT TEMPLATE -->


    <?php include('software-template.html'); ?>
    
    <!-- PRODUCT SUB MENUS ###########$$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

    <?php include('software-detail-templates.html'); ?>


    <!-- Contact  Temp-->

    <?php include('contact-template.html'); ?>  
   


      
      
   <script src="js/libs/jquery-1.10.2.js"> </script>
   <script src="js/libs/handlebars-1.1.2.js"> </script>
   
   <!--  <script src="//code.jquery.com/jquery.min.js"></script> -->
    <script src="js/libs/bootstrap.min.js"></script>
    <script src="js/libs/ember-1.4.0.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>