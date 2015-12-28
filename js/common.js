jQuery(document).ready(function($){

	//tooltip
	$(function () { $("[data-toggle='tooltip']").tooltip(); });

	// responsive nav
	jQuery(".site-nav-toggle").click(function(){
				jQuery(".site-nav").toggle();
			});


	$(document).ready( function(){
		var $ct_top_menu = $( 'ul.nav' ),
			$ct_search_icon = $( '#ct_search_icon' );

		$ct_search_icon.click( function() {
			var $this_el = $(this),
				$form = $this_el.siblings( '.ct-search-form' );

			if ( $form.hasClass( 'ct-hidden' ) ) {
				$form.css( { 'display' : 'block', 'opacity' : 0 } ).animate( { opacity : 1 }, 500 );
			} else {
				$form.animate( { opacity : 0 }, 500 );
			}

			$form.toggleClass( 'ct-hidden' );
		} );

		ct_duplicate_menu( $('#ct-top-navigation ul.nav'), $('#ct-top-navigation .mobile_nav'), 'mobile_menu', 'ct_mobile_menu' );

		function ct_duplicate_menu( menu, append_to, menu_id, menu_class ){
			var $cloned_nav;

			menu.clone().attr('id',menu_id).removeClass().attr('class',menu_class).appendTo( append_to );
			$cloned_nav = append_to.find('> ul');
			
			append_to.on( 'click', function(){
				if ( $(this).hasClass('closed') ){
					$(this).removeClass( 'closed' ).addClass( 'opened' );
					$cloned_nav.slideDown( 500 );
				} else {
					$(this).removeClass( 'opened' ).addClass( 'closed' );
					$cloned_nav.slideUp( 500 );
				}
				return false;
			} );

			append_to.on( 'click', 'a', function(event){
				event.stopPropagation();
			} );
		}
	} );



});




