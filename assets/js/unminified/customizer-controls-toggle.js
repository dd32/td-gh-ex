/**
 * Customizer controls toggles
 *
 * @package Astra
 */

( function( $ ) {

	/* Internal shorthand */
	var api = wp.customize;

	/**
	 * Trigger hooks
	 */
	ASTControlTrigger = {

	    /**
	     * Trigger a hook.
	     *
	     * @since 1.0.0
	     * @method triggerHook
	     * @param {String} hook The hook to trigger.
	     * @param {Array} args An array of args to pass to the hook.
		 */
	    triggerHook: function( hook, args )
	    {
	    	$( 'body' ).trigger( 'ast-control-trigger.' + hook, args );
	    },

	    /**
	     * Add a hook.
	     *
	     * @since 1.0.0
	     * @method addHook
	     * @param {String} hook The hook to add.
	     * @param {Function} callback A function to call when the hook is triggered.
	     */
	    addHook: function( hook, callback )
	    {
	    	$( 'body' ).on( 'ast-control-trigger.' + hook, callback );
	    },

	    /**
	     * Remove a hook.
	     *
	     * @since 1.0.0
	     * @method removeHook
	     * @param {String} hook The hook to remove.
	     * @param {Function} callback The callback function to remove.
	     */
	    removeHook: function( hook, callback )
	    {
		    $( 'body' ).off( 'ast-control-trigger.' + hook, callback );
	    },
	};

	/**
	 * Helper class that contains data for showing and hiding controls.
	 *
	 * @since 1.0.0
	 * @class ASTCustomizerToggles
	 */
	ASTCustomizerToggles = {

		/**
		 * General
		 */
		'ast-settings[site-identity]' :
		[
			{
				controls: [
					'ast-settings[site-logo]',
				],
				callback: function( site_identity ) {

					if ( 'logo' == site_identity ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'ast-settings[site-tagline]',
					'blogname',
					'ast-settings[font-size-site-title]',
					'ast-settings[divider-section-header-typo-title]',
					'display_header_text'
				],
				callback: function( site_identity ) {

					if ( 'site-title' == site_identity ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'blogdescription',
					'ast-settings[font-size-site-tagline]',
					'ast-settings[divider-section-header-typo-tagline]',
				],
				callback: function( site_identity ) {

					var display_tagline = api( 'ast-settings[site-tagline]' ).get();

					if ( 'site-title' == site_identity && '1' == display_tagline ) {
						return true;
					}
					return false;
				}
			}
		],
		'ast-settings[site-tagline]' :
		[
			{
				controls: [
					'blogdescription',
					'ast-settings[font-size-site-tagline]',
					'ast-settings[divider-section-header-typo-tagline]',
				],
				callback: function( display_tagline ) {

					var site_identity = api( 'ast-settings[site-identity]' ).get();

					if ( 'site-title' == site_identity && '1' == display_tagline ) {
						return true;
					}
					return false;
				}
			}
		],
		
		'ast-settings[site-sidebar]' :
		[
			{
				controls: [
					'ast-settings[site-sidebar-width]',
				],
				callback: function( sidebar ) {

					if ( 'full-width' != sidebar ) {
						return true;
					}
					return false;
				}
			},
		],

		/**
		 * Section - Header
		 *
		 * @link  ?autofocus[section]=section-header
		 */

		/**
		 * Layout 2
		 */
		// Layout 2 > Right Section > Text / HTML
		// Layout 2 > Right Section > Search Type
		// Layout 2 > Right Section > Search Type > Search Box Type.
		'ast-settings[header-main-rt-section]' :
		[
			{
				controls: [
					'ast-settings[header-main-rt-section-html]'
				],
				callback: function( val ) {

					if ( 'text-html' == val ) {
						return true;
					}
					return false;
				}
		},
		],

		/**
		 * Blog
		 */
		'ast-settings[blog-width]' :
		[
			{
				controls: [
					'ast-settings[blog-max-width]'
				],
				callback: function( blog_width ) {

					if ( 'custom' == blog_width ) {
						return true;
					}
					return false;
				}
		}
		],
		'ast-settings[blog-meta]' :
		[
			{
				controls: [
					'ast-settings[blog-meta-comments]',
					'ast-settings[blog-meta-category]',
					'ast-settings[blog-meta-author]',
					'ast-settings[blog-meta-date]',
					'ast-settings[blog-meta-tag]',
				],
				callback: function( enable_postmeta ) {

					if ( '1' == enable_postmeta ) {
						return true;
					}
					return false;
				}
		}
		],

		/**
		 * Blog Single
		 */
		'ast-settings[blog-single-width]' :
		[
			{
				controls: [
					'ast-settings[blog-single-max-width]'
				],
				callback: function( blog_width ) {

					if ( 'custom' == blog_width ) {
						return true;
					}
					return false;
				}
		}
		],
		'ast-settings[blog-single-meta]' :
		[
			{
				controls: [
					'ast-settings[blog-single-meta-comments]',
					'ast-settings[blog-single-meta-cat]',
					'ast-settings[blog-single-meta-author]',
					'ast-settings[blog-single-meta-date]',
					'ast-settings[blog-single-meta-tag]',
				],
				callback: function( enable_postmeta ) {

					if ( '1' == enable_postmeta ) {
						return true;
					}
					return false;
				}
		}
		],

		/**
		 * Small Footer
		 */
		'ast-settings[footer-sml-layout]' :
		[
			{
				controls: [
					'ast-settings[footer-sml-section-1]',
					'ast-settings[footer-sml-section-2]',
					'ast-settings[section-ast-small-footer-background-styling]',
					'ast-settings[ast-small-footer-color]',
					'ast-settings[ast-small-footer-link-color]',
					'ast-settings[ast-small-footer-link-hover-color]',
					'ast-settings[ast-small-footer-bg-img]',
					'ast-settings[section-ast-small-footer-typography]',
					'ast-settings[ast-small-footer-text-font]',
					'ast-settings[footer-sml-divider]',
					'ast-settings[section-ast-small-footer-layout-info]',
					'ast-settings[footer-layout-width]',
				],
				callback: function( small_footer_layout ) {

					if ( 'disabled' != small_footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'ast-settings[footer-sml-section-1-credit]',
				],
				callback: function( small_footer_layout ) {

					var footer_section_1 = api( 'ast-settings[footer-sml-section-1]' ).get();

					if ( 'disabled' != small_footer_layout && 'custom' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'ast-settings[footer-sml-section-2-credit]',
				],
				callback: function( small_footer_layout ) {

					var footer_section_2 = api( 'ast-settings[footer-sml-section-2]' ).get();

					if ( 'disabled' != small_footer_layout && 'custom' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'ast-settings[footer-sml-divider-color]',
				],
				callback: function( small_footer_layout ) {

					var border_width = api( 'ast-settings[footer-sml-divider]' ).get();

					if ( '1' <= border_width && 'disabled' != small_footer_layout ) {
						return true;
					}
					return false;
				}
			},
		],
		'ast-settings[footer-sml-section-1]' :
		[
			{
				controls: [
					'ast-settings[footer-sml-section-1-credit]',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'ast-settings[footer-sml-layout]' ).get();

					if ( 'custom' == enabled_section_1 && 'disabled' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		'ast-settings[footer-sml-section-2]' :
		[
			{
				controls: [
					'ast-settings[footer-sml-section-2-credit]',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'ast-settings[footer-sml-layout]' ).get();

					if ( 'custom' == enabled_section_2 && 'disabled' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],

		'ast-settings[footer-sml-divider]' :
		[
			{
				controls: [
					'ast-settings[footer-sml-divider-color]',
				],
				callback: function( border_width ) {

					var footer_layout = api( 'ast-settings[footer-sml-layout]' ).get();

					if ( '1' <= border_width && 'disabled' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
		],

		'ast-settings[header-main-sep]' :
		[
			{
				controls: [
					'ast-settings[header-main-sep-color]',
				],
				callback: function( border_width ) {

					if ( '1' <= border_width ) {
						return true;
					}
					return false;
				}
			},
		],

	};

	/**
	 * Sidebar Manager
	 *
	 * => Dependent Addons:
	 * 
	 * @ Spacing Addon
	 */
	var site_layout      = [ 'site-sidebar-layout' ],
		sidebars_single  = ast.customizer.settings.sidebars.single,
		sidebars_archive = ast.customizer.settings.sidebars.archive,
		merged_sidebars  = jQuery.merge( site_layout, sidebars_single ),
		merged_sidebars  = jQuery.merge( merged_sidebars, sidebars_archive );

	jQuery.each( merged_sidebars , function( sidebar_switch, sidebar_layout ) {

		ASTControlTrigger.addHook( 'ast-toggle-control', function( argument, api ) {

			ASTCustomizerToggles[ 'ast-settings['+sidebar_layout+']' ] =
			[
				{
					controls: [
						'ast-settings[site-sidebar-width]',
						'ast-settings[divider-section-sidebar-width]',

						// @SPACING addon setting
						'ast-settings[sidebar-content-plain-spacing]',
						'ast-settings[sidebar-content-boxed-spacing]',
						
						// @BLOGPRO addon setting
						'ast-settings[responsive-sidebar]',
						'ast-settings[responsive-sidebar-divider]',
					],
					callback: function( sidebar ) {

						var any_layout = '';
						var sidebar    = api( 'ast-settings[site-sidebar-layout]' ).get();

						jQuery.each( merged_sidebars, function( index, s_layout ) {

							var type   = api( 'ast-settings['+s_layout+']' ).get() || '';

							// Is no-sidebar?
							if( 'no-sidebar' != type && 'default' != type ) {
								any_layout = 'yes';
								return false;
							}
						});

						// Sidebar.
						if( 'no-sidebar' != sidebar && 'default' != sidebar ) {
							any_layout = 'yes';
						}

						if( any_layout ) {
							return true;
						} else {
							return false;
						}
					}
				},
			]

		});
	});



	/**
	 * Theme Customizer enhancements for a better user experience.
	 *
	 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * => Contents
	 *
	 * 	-	Site title and description.
	 * 	-	Colors
	 */

	/**
	 * Reset "Astra Theme" Customizer Options
	 */
	jQuery( document ).ready(function($) {

	    var container = jQuery( '#customize-header-actions' );

	    var button = jQuery( '<input type="submit" name="ast-reset" id="ast-reset" class="button-secondary button">' )
	        .attr( 'value', ast.customizer.reset.stringReset )
	        .css({
	            'float': 'right',
	            'margin-top': '9px'
	        });

	    button.on('click', function (event) {
	        event.preventDefault();

	        // Reset all confirm?
	        if ( confirm( ast.customizer.reset.stringConfirm ) ) {

		        // Enable loader.
		    	container.find( '.spinner' ).addClass( 'is-active' );

		        var data = {
		            wp_customize: 'on',
		            action: 'ast_customizer_reset',
		            nonce: ast.customizer.reset.nonce
		        };

		        button.attr( 'disabled', 'disabled' );

		        jQuery.post( ajaxurl, data, function() {
		        	wp.customize.state( 'saved' ).set( true );

		        	var data = {
			            action: 'ast_regenerate_assets',
			        };

			        jQuery.post( ajaxurl, data, function( result ) {
		        		var Url = window.location.href;
							Url = Url.split( "?" )[0]
							window.location.href = Url;
		        	});
		        });
	        }
	    });

	    container.append( button );
	});

} )( jQuery );
