/* global ajaxurl, aamlaDisplayPosts */
( function( $ ) {
	// Add event triggers to the show/hide items.
	$('#widgets-right').on('change', 'select.aamla-post-type', function() {
		var postType = $(this).val(),
			parent   = $(this).parent(),
			widget_id = $(this).closest('.widget').attr('id'),
			data = {
				_ajax_nonce:   aamlaDisplayPosts.nounce,
				action:        'aamla_display_posts',
				widget_id:     widget_id,
				query_context: 'posttype',
				query_val:     postType
			},
			container;

		if ( ! postType ) {
			parent.nextAll( '.post-panel, .page-panel, .posts-styles' ).hide();
		} else if ( 'page' === postType ) {
			parent.nextAll( '.post-panel' ).hide();
			parent.nextAll( '.page-panel, .posts-styles' ).show();
			container = parent.nextAll( '.page-panel' );
		} else if ( postType ) {
			parent.nextAll( '.page-panel' ).hide();
			parent.nextAll( '.post-panel' ).children( '.terms-panel' ).hide();
			parent.nextAll( '.post-panel, .posts-styles' ).show();
			container = parent.nextAll( '.post-panel' ).children('.taxonomies');
		}

		if ( postType ) {
			container.html(aamlaDisplayPosts.fetch);
			$.post(ajaxurl, data, function(response) {
				container.html(response);
				if ( postType && 'page' !== postType ) {
					taxonomySelect = parent.nextAll('.post-panel').find('select.aamla-taxonomy');
					if ( taxonomySelect.val() ) {
						getAjaxTaxonomy( taxonomySelect );
						parent.nextAll('.post-pael').children( '.terms-panel' ).show();
					} else {
						parent.nextAll('.post-panel').children( '.terms-panel' ).html( '' );
					}
				}
			}).error( function() {
				container.html(aamlaDisplayPosts.failed);
			});
		}
	});

	$('#widgets-right').on('change', 'select.aamla-taxonomy', function() {
		getAjaxTaxonomy( $(this) );
	});

	function getAjaxTaxonomy( taxonomySelect ) {
		var container = taxonomySelect.parent().next('.terms-panel'),
			widget_id = taxonomySelect.closest('.widget').attr('id'),
			data = {
				_ajax_nonce:   aamlaDisplayPosts.nounce,
				action:        'aamla_display_posts',
				widget_id:     widget_id,
				query_context: 'taxonomy',
				query_val:     taxonomySelect.val()
			};

		container.html(aamlaDisplayPosts.fetch);

		$.post(ajaxurl, data, function(response) {
			container.html(response);
		}).error( function() {
			container.html(aamlaDisplayPosts.failed);
		});

		if ( taxonomySelect.val() ) {
			container.show();
		} else {
			container.hide();
		}
	}
}( jQuery ) );