
jQuery(document).ready(function($){
   

$(document).ready(function(){
	$('.section-5 .col').equalHeights();

	$("body").niceScroll({
		cursorcolor: "#5fbd3e",
		zindex: "999999",
		cursorborder: "none",
		cursoropacitymin: "0",
		cursoropacitymax: "1",
		cursorwidth: "8px",
		cursorborderradius: "0px;"
	});

	new WOW().init();

	$('#responsive-menu-button').sidr({
    	name: 'sidr-main',
    	source: '#site-navigation',
    	side: 'right'
    });

});

	//Event CountDown------------
 $('[data-countdown]').each(function() {
   var $this = $(this), finalDate = $(this).data('countdown');
   $this.countdown(finalDate, function(event) {
     $this.html(event.strftime('<li><div class="holder"><span>%D</span></div>Days</li><li><div class="holder"><span>%H</span></div>Hours</span></li><li><div class="holder"><span>%M</span></div>Minutes</span></li><li><div class="holder"><span>%S</span></div>Seconds</span></li>'));
   });
 });
	
});