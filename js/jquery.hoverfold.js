( function( jQuery ) {	
	jQuery.fn.hoverfold = function( args ) {
		this.each( function() {		
			jQuery( this ).children( '.view-staff' ).each( function() {			
				var jQueryitem 	= jQuery( this ),
					img		= jQueryitem.children( 'img' ).attr( 'src' ),
					struct	= '<div class="slice s1">';
						struct	+='<div class="slice s2">';
							struct	+='<div class="slice s3">';
								struct	+='<div class="slice s4">';
									struct	+='<div class="slice s5">';
									struct	+='</div>';
								struct	+='</div>';
							struct	+='</div>';
						struct	+='</div>';
					struct	+='</div>';					
				var jQuerystruct = jQuery( struct );				
				jQueryitem.find( 'img' ).remove().end().append( jQuerystruct ).find( 'div.slice' ).css( 'background-image', 'url(' + img + ')' ).prepend( jQuery( '<span class="overlay" ></span>' ));				
			});			
		});
	};
} )( jQuery );