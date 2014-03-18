App = Ember.Application.create();

App.Router.map(function() {
 	


	this.resource('product', { path:  ':product_name' } ); 


 	

 	this.route('humbletill');  			
 	this.route('redworld');  			

  	
  	this.route('pastel');
  	this.route('retail');
  	this.route('kova');
  	this.route('socket');
  	this.route('beacons');
});


App.ProductRoute = Ember.Route.extend({
    model: function(params) {
        return products.findBy('name', params.product_name);
    }
});

var products = [{
  
    "name": "humbletill",
    "oneline" : "The Humble Till",
    "jumbo_img_class" : "jumbo_humbletill_img",
    "heading" : "Humble Till",
    "textbody": "The till is very cool and it works well",

},{

    "name": "redworld",
    "oneline" : "Redworld Analytics",
    "jumbo_img_class" : "jumbo_redworld_img",
    "heading" : "Redworld",
    "textbody": "Redworld help shop owners with the odering of news products",
    
}, {

    "name": "pastel",
    "oneline" : "My Business Online",
    "jumbo_img_class" : "jumbo_pastel_img",
    "heading" : "Sage Pastel",
    "textbody": "Sage Pastel is the front runner of the ",

}];






