
/*

Handlebars.registerHelper('times', function(n, block) {
    var accum = '';
    for(var i = 0; i < n; ++i)
        accum += block.fn(i);
    return accum;
});

App = Ember.Application.create();

App.initializeMap = function () {


        var map_canvas = document.getElementById('map_canvas');


        var map_options = {
          center: new google.maps.LatLng(-29.596105,30.357034),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        
        
        

        var map = new google.maps.Map(map_canvas, map_options);
       


        var marker = new google.maps.Marker({
                position: map.getCenter(),
                map: map,
              });


};*/

App = Ember.Application.create();

App.Router.map(function() {
 	



  this.resource('hardware'); 
 	this.route('contact');
  this.route('about');


  	
});








App.HardwareRoute = Ember.Route.extend({
    model: function(params) {
        
             
     

    },
  

});



App.ContactRoute = Ember.Route.extend({
    model: function() {
        
        return contact;
      

    },

    setupController: function(controller, model) {

     /* controller.set('model', model);
      
      setTimeout(function(){App.initializeMap()},100);
      setTimeout(function(){checkandshift($(document).find('.jumbo_contact_img'), 400, 500)},100);

      $('body').scrollTop(0);

      */
    }

});




App.AboutRoute = Ember.Route.extend({
    model: function() {
        
        return about;

    },

    setupController: function(controller, model) {

     /*   controller.set('model', model);
     
        setTimeout(function(){checkandshift($(document).find('.jumbo_about_img'), 400, 500)},100);
        $('body').scrollTop(0);*/
    }
});





/*

$(document).on('click', "a", function() {
    if (!$(this).hasClass('active')) {
      $('body').scrollTop(0);
      console.log("scroll");
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


$(document).on('mouseenter', "#socket_fadetrigger", function() {
   
   $('#pastel_fader').fadeTo( 100, 0.7);
  
 

});

$(document).on('mouseleave', "#socket_fadetrigger", function() {
   
   $('#pastel_fader').fadeTo( 100, 0.1 );
  
  

});

$(window).resize(function() {

  

  checkalltrons();

  console.log("a");


});

$(window).unload( function () 
{
  checkalltrons();
  console.log("b");
});

$(document).ready(function() {

  
  checkalltrons();
  console.log("c");


});


$(document).on('click', '#nav-ul > li > a', function() {

  checkalltrons();
  console.log("d");


});


$(document).on('click', '.navbutton', function() {

  checkalltrons();
  console.log("e");



});

$(document).on('click', '.sub_menu_click', function() {

  checkalltrons();
  console.log("f");

  

});



*/


function checkalltrons(){

  
  //checkandshift($(document).find('.jumbotron'), 600, 600);
/*
  checkandshift($(document).find('.jumbo_humbletill_img'), 330, 500);
  checkandshift($(document).find('.jumbo_redworld_img'), 330, 500);
  checkandshift($(document).find('.jumbo_pastel_img'), 330, 500);
  */

 // checkandshift($(document).find('.jumbo_contact_img'), 400, 500);

 // checkandshift($(document).find('.jumbo_about_img'), 400, 500);

 // checkandshift($(document).find('.jumbo_kova_img'), 330, 500);
 // checkandshift($(document).find('.jumbo_socket_img'), 330, 500);
//checkandshift($(document).find('.jumbo_beacons_img'), 330, 500);



};



function checkandshift(jumbo, minvalue, maxvalue) {


  
  
  jumbo.css('padding-top', $(window).height() - 420 );

  if (parseFloat(jumbo.css('padding-top')) < minvalue){

      jumbo.css('padding-top', minvalue );

  
  }

  if (parseFloat(jumbo.css('padding-top')) > maxvalue){

      jumbo.css('padding-top', maxvalue );

  
  }



}



