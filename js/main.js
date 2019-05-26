/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
*/
(function($) {
    "use strict";
    jQuery(document).ready(function() {

		//Submenu Dropdown Toggle
	    if($('.main-menu  li.menu-item-has-children ul').length){
	        $('.main-menu  li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fa fa-angle-right"></span></div>');
	        //Dropdown Button
	        $('.main-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
	            $(this).prev('ul').slideToggle(500);
	        });
	        
	        //Disable dropdown parent link
	        $('.nav li.menu-item-has-children > a').on('click', function(e) {
	            e.preventDefault();
	        });

	        $(".dropdown-btn").click(function(){
    			$(".menu-item-has-children").toggleClass('open');
    		});
    	}


    	//Check to see if the window is top if not then display button
    	  jQuery(window).scroll(function($){
    	    if (jQuery(this).scrollTop() > 100) {
    	      jQuery('.go-to-top').addClass('gotop');
    	      jQuery('.go-to-top').fadeIn();
    	    } else {
    	      jQuery('.go-to-top').fadeOut();
    	    }
    	  });
    	
    	//Click event to scroll to top
    	jQuery('.go-to-top').click(function($){
    	  jQuery('html, body').animate({scrollTop : 0},800);
    	  return false;
    	});
    });

})(jQuery);

