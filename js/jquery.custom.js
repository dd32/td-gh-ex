/*-----------------------------------------------------------------------------------

 	Custom JS - All front-end jQuery
 
-----------------------------------------------------------------------------------*/
 


jQuery(document).ready(function() {
								

selectnav('primary-menu', {
    nested: true,
	indent: '-',
    label: false
});

});


jQuery(window).load(function() {
    jQuery('.flexslider').flexslider( {
	directionNav: true,
	controlNav: false,
	animationLoop: true
	 });
  });



