<?php
/**
 * Menu and Logo Display Options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_header_image_display
 *
 */
if ( !function_exists('beauty_studio_header_image_display') ) :
	function beauty_studio_header_image_display() {
		$beauty_studio_header_image_display =  array(
			'hide'              => esc_html__( 'Hide', 'beauty-studio' ),
			'bg-image'          => esc_html__( 'Background Image', 'beauty-studio' ),
			'normal-image'      => esc_html__( 'Normal Image', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_header_image_display', $beauty_studio_header_image_display );
	}
endif;

/**
 * Menu Right Button Link Options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_menu_right_button_link_options
 *
 */
if ( !function_exists('beauty_studio_menu_right_button_link_options') ) :
	function beauty_studio_menu_right_button_link_options() {
		$beauty_studio_menu_right_button_link_options =  array(
			'disable'       => esc_html__( 'Disable', 'beauty-studio' ),
			'booking'       => esc_html__( 'Popup Widgets ( Booking Form )', 'beauty-studio' ),
			'link'          => esc_html__( 'One Link', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_menu_right_button_link_options', $beauty_studio_menu_right_button_link_options );
	}
endif;

/**
 * Header top display options of elements
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_header_top_display_selection
 *
 */
if ( !function_exists('beauty_studio_header_top_display_selection') ) :
	function beauty_studio_header_top_display_selection() {
		$beauty_studio_header_top_display_selection =  array(
			'hide'          => esc_html__( 'Hide', 'beauty-studio' ),
			'left'          => esc_html__( 'on Top Left', 'beauty-studio' ),
			'right'         => esc_html__( 'on Top Right', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_header_top_display_selection', $beauty_studio_header_top_display_selection );
	}
endif;


/**
 * Feature slider text align
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return array $beauty_studio_slider_text_align
 *
 */
if ( !function_exists('beauty_studio_slider_text_align') ) :
	function beauty_studio_slider_text_align() {
		$beauty_studio_slider_text_align =  array(
			'alternate'     => esc_html__( 'Alternate', 'beauty-studio' ),
			'text-left'     => esc_html__( 'Left', 'beauty-studio' ),
			'text-right'    => esc_html__( 'Right', 'beauty-studio' ),
			'text-center'   => esc_html__( 'Center', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_slider_text_align', $beauty_studio_slider_text_align );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_fs_image_display_options
 *
 */
if ( !function_exists('beauty_studio_fs_image_display_options') ) :
	function beauty_studio_fs_image_display_options() {
		$beauty_studio_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'beauty-studio' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_fs_image_display_options', $beauty_studio_fs_image_display_options );
	}
endif;

/**
 * Feature Info display Options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_feature_info_display_options
 *
 */
if ( !function_exists('beauty_studio_feature_info_display_options') ) :
	function beauty_studio_feature_info_display_options() {
		$beauty_studio_feature_info_display_options =  array(
			'hide'                  => esc_html__( 'Hide', 'beauty-studio' ),
			'below'                 => esc_html__( 'Below Feature Slider', 'beauty-studio' ),
			'absolute'              => esc_html__( 'Absolute Feature Slider', 'beauty-studio' ),
		);
		return apply_filters( 'beauty_studio_feature_info_display_options', $beauty_studio_feature_info_display_options );
	}
endif;

/**
 * Feature Info number
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_feature_info_number
 *
 */
if ( !function_exists('beauty_studio_feature_info_number') ) :
	function beauty_studio_feature_info_number() {
		$beauty_studio_feature_info_number =  array(
			1               => esc_html__( '1', 'beauty-studio' ),
			2               => esc_html__( '2', 'beauty-studio' ),
			3               => esc_html__( '3', 'beauty-studio' ),
			4               => esc_html__( '4', 'beauty-studio' ),
		);
		return apply_filters( 'beauty_studio_feature_info_number', $beauty_studio_feature_info_number );
	}
endif;

/**
 * Footer copyright beside options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_footer_copyright_beside_option
 *
 */
if ( !function_exists('beauty_studio_footer_copyright_beside_option') ) :
	function beauty_studio_footer_copyright_beside_option() {
		$beauty_studio_footer_copyright_beside_option =  array(
			'hide'          => esc_html__( 'Hide', 'beauty-studio' ),
			'social'        => esc_html__( 'Social Links', 'beauty-studio' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_footer_copyright_beside_option', $beauty_studio_footer_copyright_beside_option );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_sidebar_layout
 *
 */
if ( !function_exists('beauty_studio_sidebar_layout') ) :
    function beauty_studio_sidebar_layout() {
        $beauty_studio_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'beauty-studio' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'beauty-studio' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'beauty-studio' ),
	        'middle-col'    => esc_html__( 'Middle Column' , 'beauty-studio' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'beauty-studio' )
        );
        return apply_filters( 'beauty_studio_sidebar_layout', $beauty_studio_sidebar_layout );
    }
endif;

/**
 * Blog content from
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_blog_archive_content_from
 *
 */
if ( !function_exists('beauty_studio_blog_archive_content_from') ) :
	function beauty_studio_blog_archive_content_from() {
		$beauty_studio_blog_archive_content_from =  array(
			'excerpt'    => esc_html__( 'Excerpt', 'beauty-studio' ),
			'content'    => esc_html__( 'Content', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_blog_archive_content_from', $beauty_studio_blog_archive_content_from );
	}
endif;


/**
 * Image Size
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_get_image_sizes_options
 *
 */
if ( !function_exists('beauty_studio_get_image_sizes_options') ) :
	function beauty_studio_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'beauty-studio' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'beauty-studio' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'beauty_studio_get_image_sizes_options', $choices );
	}
endif;

/**
 * Pagination Options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array beauty_studio_pagination_options
 *
 */
if ( !function_exists('beauty_studio_pagination_options') ) :
	function beauty_studio_pagination_options() {
		$beauty_studio_pagination_options =  array(
			'default'  => esc_html__( 'Default', 'beauty-studio' ),
			'numeric'  => esc_html__( 'Numeric', 'beauty-studio' )
		);
		return apply_filters( 'beauty_studio_pagination_options', $beauty_studio_pagination_options );
	}
endif;

/**
 * Default Theme layout options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array $beauty_studio_theme_layout
 *
 */
if ( !function_exists('beauty_studio_get_default_theme_options') ) :
    function beauty_studio_get_default_theme_options() {

        $default_theme_options = array(

	        /*logo and site title*/
	        'beauty-studio-display-site-logo'      => '',
	        'beauty-studio-display-site-title'     => 1,
	        'beauty-studio-display-site-tagline'   => 1,

	        /*header height*/
	        'beauty-studio-header-height'          => 300,
	        'beauty-studio-header-image-display'   => 'normal-image',

            /*header top*/
            'beauty-studio-enable-header-top'                      => '',
	        'beauty-studio-header-top-menu-display-selection'      => 'right',
	        'beauty-studio-header-top-news-display-selection'      => 'left',
	        'beauty-studio-header-top-social-display-selection'    => 'right',
            'beauty-studio-newsnotice-title'       => esc_html__( 'News :', 'beauty-studio' ),
            'beauty-studio-newsnotice-cat'         => 0,

	        /*menu options*/
            'beauty-studio-enable-transparent'             => 1,
            'beauty-studio-enable-sticky'                  => '',
	        'beauty-studio-menu-right-button-options'      => 'disable',
	        'beauty-studio-menu-right-button-title'        => esc_html__('Request a Quote','beauty-studio'),
	        'beauty-studio-menu-right-button-link'         => '',
            'beauty-studio-enable-cart-icon'               => '',

	        /*feature section options*/
	        'beauty-studio-enable-feature'                         => '',
	        'beauty-studio-slider-selection-from'                  => 'from-page',
	        'beauty-studio-slides-data'                            => '',
            'beauty-studio-feature-slider-enable-animation'        => 1,
            'beauty-studio-feature-slider-display-title'           => 1,
            'beauty-studio-feature-slider-display-excerpt'         => 1,
            'beauty-studio-fs-image-display-options'               => 'full-screen-bg',
            'beauty-studio-feature-slider-text-align'              => 'text-left',

	        /*basic info*/
	        'beauty-studio-feature-info-display-options'           => 'hide',
	        'beauty-studio-feature-info-number'    => 4,
	        'beauty-studio-first-info-icon'        => 'fa-calendar',
	        'beauty-studio-first-info-title'       => esc_html__('Send Us a Mail', 'beauty-studio'),
	        'beauty-studio-first-info-desc'        => esc_html__('domain@example.com ', 'beauty-studio'),
	        'beauty-studio-second-info-icon'       => 'fa-map-marker',
	        'beauty-studio-second-info-title'      => esc_html__('Our Location', 'beauty-studio'),
	        'beauty-studio-second-info-desc'       => esc_html__('Elmonte California', 'beauty-studio'),
	        'beauty-studio-third-info-icon'        => 'fa-phone',
	        'beauty-studio-third-info-title'       => esc_html__('Call Us', 'beauty-studio'),
	        'beauty-studio-third-info-desc'        => esc_html__('01-23456789-10', 'beauty-studio'),
	        'beauty-studio-forth-info-icon'        => 'fa-envelope-o',
	        'beauty-studio-forth-info-title'       => esc_html__('Office Hours', 'beauty-studio'),
	        'beauty-studio-forth-info-desc'        => esc_html__('8 hours per day', 'beauty-studio'),

            /*footer options*/
            'beauty-studio-footer-copyright'                       => esc_html__( '&copy; Dynamic Copyright Text', 'beauty-studio' ),
	        'beauty-studio-footer-copyright-beside-option'         => 'footer-menu',
	        'beauty-studio-footer-bg-img'                          => '',

	        /*layout/design options*/
	        'beauty-studio-pagination-option'      => 'numeric',

	        'beauty-studio-enable-animation'       => '',

	        'beauty-studio-single-sidebar-layout'              => 'right-sidebar',
            'beauty-studio-front-page-sidebar-layout'          => 'right-sidebar',
            'beauty-studio-archive-sidebar-layout'             => 'right-sidebar',

            'beauty-studio-blog-archive-img-size'              => 'full',
            'beauty-studio-blog-archive-content-from'          => 'excerpt',
            'beauty-studio-blog-archive-excerpt-length'        => 42,
	        'beauty-studio-blog-archive-more-text'             => esc_html__( 'Read More', 'beauty-studio' ),

	        'beauty-studio-primary-color'          => '#ec5598',
            'beauty-studio-header-top-bg-color'    => '#590d88',
            'beauty-studio-footer-bg-color'        => '#6a1b9a',
            'beauty-studio-footer-bottom-bg-color' => '#590d88',
            'beauty-studio-link-color'             => '#ec5598',
            'beauty-studio-link-hover-color'       => '#ed2d83',

	        /*Front Page*/
            'beauty-studio-hide-front-page-content' => '',
            'beauty-studio-hide-front-page-header'  => '',

	        /*woocommerce*/
	        'beauty-studio-wc-shop-archive-sidebar-layout'     => 'no-sidebar',
	        'beauty-studio-wc-product-column-number'           => 4,
	        'beauty-studio-wc-shop-archive-total-product'      => 16,
	        'beauty-studio-wc-single-product-sidebar-layout'   => 'no-sidebar',

	        /*single post*/
	        'beauty-studio-single-header-title'            => esc_html__( 'Blog', 'beauty-studio' ),
	        'beauty-studio-single-img-size'                => 'full',

	        /*theme options*/
            'beauty-studio-popup-widget-title'     => esc_html__( 'Request a Quote', 'beauty-studio' ),
	        'beauty-studio-show-breadcrumb'        => 1,
            'beauty-studio-search-placeholder'     => esc_html__( 'Search', 'beauty-studio' ),
            'beauty-studio-social-data'            => ''
        );
        return apply_filters( 'beauty_studio_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return array beauty_studio_theme_options
 *
 */
if ( !function_exists('beauty_studio_get_theme_options') ) :
    function beauty_studio_get_theme_options() {

        $beauty_studio_default_theme_options = beauty_studio_get_default_theme_options();
        $beauty_studio_get_theme_options = get_theme_mod( 'beauty_studio_theme_options');
        if( is_array( $beauty_studio_get_theme_options )){
            return array_merge( $beauty_studio_default_theme_options ,$beauty_studio_get_theme_options );
        }
        else{
            return $beauty_studio_default_theme_options;
        }
    }
endif;