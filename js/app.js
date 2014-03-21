


App = Ember.Application.create();



App.Router.map(function() {
 	

	this.resource('product', { path:  '/:product_name' }, function(){

    this.resource('features', { path:  '/features' });
    this.resource('pricing', { path:  '/pricing' });
    this.resource('whatyouneed', { path:  '/whatyouneed' });
       
  

  });

  


  this.resource('hardware', { path:  'hardware/:product_name' } ); 
 	

 	this.route('contact');
  this.route('about');
  			

  	
  	
});

App.ContactRoute = Ember.Route.extend({
    model: function() {
        
        return {'number': '033 0923 982',
                'address': '37 Taunton Road',
                'city': 'Pietrmaritzburg',
         }

    }
});




App.ProductRoute = Ember.Route.extend({
    model: function(params) {
        
                
        return products.findBy('name', params.product_name);
    }
});


App.ProductsController = Ember.Controller.extend({
    
   
});





App.FeaturesRoute = Ember.Route.extend({
    model: function() {
           
           

        return this.modelFor('product');
    }

    

});

App.PricingRoute = Ember.Route.extend({
    model: function() {
           
           

        return this.modelFor('product');
    }
});

App.WhatyouneedRoute = Ember.Route.extend({
    model: function() {
           
           

        return this.modelFor('product');
    }
});


var products = [{
  
    "name": "humbletill",
    "oneline" : "The Humble Till",
    "jumbo_img_class" : "jumbo_humbletill_img",
    
    "feature_heading" : "humble Till",
    "feature_textbody": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",

    "price" : "R 995",
    "price_text" : "You need to buys ASAP",
    

    "need" : "an ipad",


},{

    "name": "redworld",
    "oneline" : "Redworld Analytics",
    "jumbo_img_class" : "jumbo_redworld_img",
    "feature_heading" : "Redworld",
    "feature_textbody": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
    
    "price" : "R 1995",
    "price_text" : "You need to have bought this already",


    "need" : "a shop",    

}, {

    "name": "pastel",
    "oneline" : "My Business Online",
    "jumbo_img_class" : "jumbo_pastel_img",
    "feature_heading" : "Sage Pastel",
    "feature_textbody": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",

    "price" : "R 2995",
    "price_text" : "Waiting for you to buy it",

    "need" : "a business", 
    

}];



$(document).on('click', "a.navbutton", function() {
    if (!$(this).hasClass('active')) {
      $('body').scrollTop(0);
    }  

});

$(document).on('mouseenter', "#humble_fadetrigger", function() {
   
   $('#humble_fader').fadeTo( 100, 0.7);
  
 

});

$(document).on('mouseleave', "#humble_fadetrigger", function() {
   
   $('#humble_fader').fadeTo( 100, 0.1 );
  
  

});

$(document).on('mouseenter', "#red_fadetrigger", function() {
   
   $('#red_fader').fadeTo( 100, 0.7);
  
 

});

$(document).on('mouseleave', "#red_fadetrigger", function() {
   
   $('#red_fader').fadeTo( 100, 0.1 );
  
 

});


$(document).on('mouseenter', "#pastel_fadetrigger", function() {
   
   $('#pastel_fader').fadeTo( 100, 0.7);
  
 

});

$(document).on('mouseleave', "#pastel_fadetrigger", function() {
   
   $('#pastel_fader').fadeTo( 100, 0.1 );
  
  

});

$(window).resize(function() {

  

  checkalltrons();


});

$(document).ready(function() {

  
  checkalltrons();
  


});


$(document).on('click', '#nav-ul > li > a', function() {

  checkalltrons();



});


$(document).on('click', '.navbutton', function() {

  checkalltrons();



});


function checkalltrons(){

  
  checkandshift($(document).find('.jumbotron'), 330, 600);
  checkandshift($(document).find('.jumbo_humbletill_img'), 330, 500);
  checkandshift($(document).find('.jumbo_pastel_img'), 330, 500);
  checkandshift($(document).find('.jumbo_redworld_img'), 330, 500);

  checkandshift($(document).find('.jumbo_contact_img'), 400, 500);


}

checkalltrons();

function checkandshift(jumbo, minvalue, maxvalue) {


  
  
  jumbo.css('padding-top', $(window).height() - 380 );

  if (parseFloat(jumbo.css('padding-top')) < minvalue){

      jumbo.css('padding-top', minvalue );

  
  }

  if (parseFloat(jumbo.css('padding-top')) > maxvalue){

      jumbo.css('padding-top', maxvalue );

  
  }



}


