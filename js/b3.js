// b3-admin.js

function b3_slide_height() {
	jQuery('#b3-slider .carousel-inner, #b3-slider .carousel-inner .item').css('height', 
		Math.round(jQuery('#b3-slider .carousel-inner').width()/3.8) + 'px');
}
jQuery(document).ready(function($){
	$('.widget img').addClass('img-responsive');
	$('.entry-content table').addClass('table table-bordered');
	$('.widget select').parent().addClass('form-group');
	$('.widget select').addClass('form-control').addClass('spacer-top');
	$('.widget_calendar table').addClass('table table-bordered table-condensed').addClass('spacer-all');
	$('#submit').addClass('btn btn-default btn-lg spacer-top');
	$('.wp-caption').addClass('thumbnail');
	b3_slide_height();

	$(window).resize(function(){b3_slide_height()});
	$('.carousel').carousel({interval: 5000})  
	$('.carousel').carousel('cycle');
});