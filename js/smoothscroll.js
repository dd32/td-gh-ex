/*
 Smooth scroll v1.0 | @agareginyan | AGPL-3.0 Licensed
*/

jQuery(document).ready(function($){
	$(window).scroll(function(){
        if ($(this).scrollTop() < 200) {
			$('#back-top') .fadeOut();
        } else {
			$('#back-top') .fadeIn();
        }
    });
	$('#back-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, 'fast');
		return false;
		});
});
