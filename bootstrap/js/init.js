(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
    setInterval(function (){
        $room_id = $('input[name=room_id]').val();
        
        $.post('.?action=checkPlayer', {room_id:$room_id}, function(data) {
             $('#container').html(data);
        });
        
    }, 2000);
    
  });