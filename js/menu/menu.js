jQuery(document).ready(function() {
     
      var width = Math.max(jQuery(window).width(), window.innerWidth);
       document.onload = wallstreet_function();
       wallstreet_navbarSubmenu(width);
       wallstreet_hoverDropdown(width);

   function wallstreet_function () {
    jQuery('.dropdown-menu').parent().addClass('dropdown');
   }

        /* ---------------------------------------------- /*
         * Navbar submenu
         /* ---------------------------------------------- */

        function wallstreet_navbarSubmenu(width) {
            if (width > 1100) {
                jQuery('.navbar-nav > li.dropdown').hover(function() {
                    var MenuLeftOffset  = jQuery(this).offset().left;
                    console.log(MenuLeftOffset);
                    var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                    if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
                        jQuery(this).children('.dropdown-menu').addClass('leftauto');
                    } else {
                        jQuery(this).children('.dropdown-menu').removeClass('leftauto');
                    }
                    if (jQuery('.dropdown', jQuery(this)).length > 0) {
                        var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                        if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
                            jQuery(this).children('.dropdown-menu').addClass('left-side');
                        } else {
                            jQuery(this).children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });

                 jQuery('.navbar-nav > li.dropdown a').focus(function() {
                    var MenuLeftOffsets  = jQuery(this).parent().offset().left;
                    var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this).parent()).width();
                    if (width - MenuLeftOffsets < Menu1LevelWidth * 2) {
                        jQuery(this).parent().children('.dropdown-menu').addClass('leftauto');
                    } else {
                        jQuery(this).parent().children('.dropdown-menu').removeClass('leftauto');
                    }
                    if (jQuery('.dropdown', jQuery(this).parent()).length > 0) {
                        var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this).parent()).width();
                        if (width - MenuLeftOffsets - Menu1LevelWidth < Menu2LevelWidth) {
                            jQuery(this).parent().children('.dropdown-menu').addClass('left-side');
                        } else {
                            jQuery(this).parent().children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });
            }
        }

   function wallstreet_hoverDropdown(width){
    if(width>1100){
	  jQuery('.navbar-wrapper').removeClass('open');
                var delay = 0;
                var setTimeoutConst;
                jQuery('.navbar-wrapper .navbar-nav > li.dropdown, .navbar-wrapper li.dropdown > ul > li.dropdown').hover(function() {
                        var jQuerythis = jQuery(this);
                        setTimeoutConst = setTimeout(function() {
                            jQuerythis.addClass('open');
                            jQuerythis.find('.dropdown-toggle').addClass('disabled');
                        }, delay);
                    },
                    function() {
                        clearTimeout(setTimeoutConst);
                        jQuery(this).removeClass('open');
                        jQuery(this).find('.dropdown-toggle').removeClass('disabled');
                    });
            } else {
                jQuery('.navbar-wrapper .navbar-nav > li.dropdown, .navbar-wrapper li.dropdown > ul > li.dropdown').unbind('mouseenter mouseleave');
                jQuery('.navbar-wrapper [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    jQuery(this).parent().siblings().removeClass('open');
                    jQuery(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                    jQuery(this).parent().toggleClass('open');
                });
   }
}
       /* ---------------------------------------------- /*
         * Navbar focus dropdown on desktop
         /* ---------------------------------------------- */
     
       const topLevelLinks = document.querySelectorAll('.nav li.dropdown a');
            topLevelLinks.forEach(link => {
              link.addEventListener('focus', function(e) {
                this.parentElement.classList.add('open')
                e.preventDefault();

                e.target.parentElement.querySelectorAll( ".open" ).forEach( e =>
                    e.classList.remove( "open" ) );
              })             

            })

            jQuery('li a').focus(function() { 

             jQuery(this).parent().siblings().removeClass('open');

            });

            jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length ) {
                topLevelLinks.forEach(link => {
                link.parentElement.classList.remove('open')
            })
            }
        })
     });       
/* ---------------------------------------------- /*
         * Scroll top
/* ---------------------------------------------- */


jQuery(document).ready(function($) {
	
/*-- Page Scroll To Top Section ---------------*/
	jQuery(document).ready(function () {
	
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.page_scrollup').fadeIn();
			} else {
				jQuery('.page_scrollup').fadeOut();
			}
		});
	
		jQuery('.page_scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	
	});	

       jQuery('li.dropdown').find('.caret').each(function(){
            jQuery(this).on('click', function(){
                if( jQuery(window).width() <= 1100) {
                  jQuery('li.dropdown,li.dropdown-submenu').removeClass('open');
                  jQuery(this).parent().next().slideToggle();
                }
             return false;
            });
        });

		
});