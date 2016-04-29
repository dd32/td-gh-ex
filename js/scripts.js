
//Menu dropdown animation
jQuery(function($) {

	if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {

		$('.sub-menu').hide();
		$('.main-navigation .children').hide();
		$('.menu-item').hover(
			function() {
				$(this).children('.sub-menu').slideDown();
			},
			function() {
				$(this).children('.sub-menu').hide();
			}
		);
		$('.main-navigation li').hover(
			function() {
				$(this).children('.main-navigation .children').slideDown();
			},
			function() {
				$(this).children('.main-navigation .children').hide();
			}
		);

	}


	// Mobile sub menu

  if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {

    var mainNav      = $('.main-navigation');
    var hasChildMenu = mainNav.find('li:has(ul)');

    mainNav.addClass('is-mobile-menu');
    hasChildMenu.children('a').after('<span class="btn-submenu"></span>');

    $(document).on('click', '.nav-menu li .btn-submenu', function(e) {
      $(this).next('.sub-menu').toggleClass('submenu-expanded');
      $(this).toggleClass('active').next('ul').slideToggle(300);
      e.stopImmediatePropagation()
    });

  }


});

//Fit Vids
jQuery(function($) {

  $(document).ready(function(){
    $("body").fitVids();
  });

});

//Comments clearfix
jQuery(function($) {
	$(".comment-body").addClass('clearfix');
});

//Social links in new window
jQuery(function($) {
     $( '.social-navigation li a' ).attr( 'target','_blank' );
});

jQuery(function($) {
	$('.scrollup').click(function(){
		$('html, body').animate({scrollTop : 0}, 500);
		return false;
	});
});
