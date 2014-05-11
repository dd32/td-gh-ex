jQuery(document).ready(function($) {
	$('#far-clouds').pan({fps: 30, speed: 0.5, dir: 'left', depth: 30});
	$('#near-clouds').pan({fps: 30, speed: 0.7, dir: 'right', depth: 70}); 
	$('#kaninf').sprite({fps: 1.8, no_of_frames: 8, speed: 1});
	
	/* Thanks to: Keyboard Accessible Dropdown Menus
	Copyright 2013 Amy Hendrix (email : amy@amyhendrix.net), Graham Armfield (email : graham.armfield@coolfields.co.uk)
	License:      MIT
	Plugin URI:   http://github.com/sabreuse/accessible-menus
	*/
	
	$('#header-menu li').hover(
		function(){$(this).addClass("keyboard-dropdown");},
		function(){$(this).delay('250').removeClass("keyboard-dropdown");}
	);
	$('#header-menu li a').on('focus blur',
		function(){$(this).parents().toggleClass("keyboard-dropdown");}
	);
	
	
	$("#mobile-menu").click(function(){
		$(".nav-menu").toggle();
	});
	
	
}); 

function arc($radius,$radius_tag) {
	var $headline = jQuery('#headline');
	var $tagline = jQuery('#tagline');
	WebFont.load({
		google: {
			families: ['Oswald','Open Sans Condensed']
			},
			fontactive:function(fontFamily, fontDescription) {
				init();
			},
			fontinactive:function(fontFamily, fontDescription) {
				init();
			}
		});
	function init() {
		$headline.show().arctext({radius: $radius});
		$tagline.show().arctext({radius: $radius_tag});
	};
};

/*Skip links
http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/ 
*/
window.addEventListener("hashchange", function(event) {
    var element = document.getElementById(location.hash.substring(1));
    if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
        }
        element.focus();
    }
}, false); 
	
	