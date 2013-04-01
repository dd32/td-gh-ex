(function($){
	
	/** Options Tabs */
	function chiplifeOptionsTabs() {
		
		var relid = $.cookie( 'chiplife_tab_relid' );
		
		if( relid >= 1  ) {
			chiplifeOptionsTabControl( relid );
		} else {
			chiplifeOptionsTabControl( 0 );
		}
		
		$( '.chiplife-group-tab-link-a' ).click( function() {
			
			relid = $(this).attr( 'data-rel' );
			$.cookie( 'chiplife_tab_relid', relid );
			chiplifeOptionsTabControl( relid );		
			
		});
		
	}
	
	function chiplifeOptionsTabControl( relid ) {
		
		$( '.chiplife-group-tab' ).each( function() {
				
			if( $(this).attr( 'id' ) == relid + '_section_group' ) {					
				$(this).delay( 400 ).fadeIn( 1200 );				
			} else{					
				$(this).fadeOut( 'fast' );
			}
			
		});
		
		$( '.chiplife-group-tab-link-li' ).each( function() {
			
			if( $(this).attr('id') != relid + '_section_group_li' && $(this).hasClass( 'active' ) ) {					
				$(this).removeClass( 'active' );				
			}
			
			if( $(this).attr('id') == relid + '_section_group_li' ) {					 
				 $(this).addClass('active');				
			}
		
		});
		
	}
	
	/** jQuery Document Ready */
	$(document).ready(function(){		
		chiplifeOptionsTabs();		
	});

	/** jQuery Windows Load */
	$(window).load(function(){
	});	

})(jQuery);