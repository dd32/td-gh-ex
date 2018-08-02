( function( $ ) {
	// Add event triggers to the show/hide items.
	$('#widgets-right').on('change', 'select.aamla-post-type', function() {
		showPosttypeContent( $(this) );
	});

	$('#widgets-right').on('change', 'select.aamla-taxonomy', function() {
		showTerms( $(this) );
	});

	$('#widgets-right').on('change', 'select.aamla-styles', function() {
		showGridColumns( $(this) );
	});
	
	function showPosttypeContent( pType ) {
		var postType  = pType.val(),
			parent    = pType.parent(),
			postStyle = parent.nextAll( '.posts-styles' ).find( 'select.aamla-styles' ),
			taxSelec  = parent.nextAll( '.post-panel' ).find( 'select.aamla-taxonomy' );

		if ( ! postType ) {
			parent.nextAll( '.post-panel, .page-panel, .posts-styles, .posts-styles-grid' ).hide();
		} else if ( 'page' === postType ) {
			parent.nextAll( '.post-panel' ).hide();
			parent.nextAll( '.page-panel, .posts-styles' ).show();
			parent.nextAll( '.page-panel' ).find( '.pages-checklist li' ).show();
			showGridColumns( postStyle );
		} else if ( postType ) {
			parent.nextAll( '.page-panel' ).hide();
			parent.nextAll( '.post-panel' ).children( '.terms-panel' ).hide();
			taxSelec.find( 'option' ).hide();
			taxSelec.find( '.' + postType ).show();
			taxSelec.find( '.always-visible' ).show();
			taxSelec.val('');
			parent.nextAll( '.post-panel, .posts-styles' ).show();
			showGridColumns( postStyle );
		}
	}

	function showTerms( taxonomy ) {
		if ( taxonomy.val() ) {
			taxonomy.parent().next('.terms-panel').show();
			taxonomy.parent().next('.terms-panel').find( '.terms-checklist li' ).hide();
			taxonomy.parent().next('.terms-panel').find( '.terms-checklist .' + taxonomy.val() ).show();
		} else {
			taxonomy.parent().next('.terms-panel').hide();
		}
	}

	function showGridColumns( style ) {
		var postStyle = style.val();
		if ( -1 != postStyle.indexOf( 'grid' ) ) {
			style.parent().next('.posts-styles-grid').show();
		} else {
			style.parent().next('.posts-styles-grid').hide();
		}
	}
}( jQuery ) );
