/*initializeMap = function () {


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


};
*/
$(document).ready(function(){



//initializeMap();


})

$(".whatyouneed_device_img").hover(function(){


$( this ).fadeTo( "fast" , 0.5)



}, function(){


$( this ).fadeTo( "fast" , 1)



});