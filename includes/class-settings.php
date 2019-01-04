<?php
/**
 * Theme's defaults.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}

//////////////////////////////////////////////////
/**
 * Theme settings
 */
class BAT_Settings {
    
	static $settings = array();
    
    static $layouts = array();
    
    public static $layout_current = 'no-sidebars';
    
    static $layout_has_sidebars = false;
    
    static $layout_vars = array();
    
    static $image_sizes = array();
    
    static $color_selectors = array();
    
    static $custom_fonts = array();
    
    static $sidebars = array();
    
    static $option_name = 'bat_settings';
	
	//////////////////////////////////////////////////
	
    public static function init() {
        
        self::init_settings();
        
        add_action( 'init', array( __CLASS__, 'init_custom_colors'), 10 );
        
        add_action( 'template_redirect', array( __CLASS__, 'init_layout_current'), 10 );
        
        add_action( 'template_redirect', array( __CLASS__, 'init_layout_vars'), 20 );
        
        add_filter( 'batourslight_option', array( __CLASS__, 'get_option'), 10, 2);
             
	}
    
    //////////////////////////////
	
    /**
	 * Get option value
     * 
     * @param mixed $value
     * @param string $option_name
     * 
     * @return mixed
	 */
    public static function get_option($value, $option_name) {
        
        $key = sanitize_key($option_name);
        
        return isset(self::$settings[$key]) ? self::$settings[$key] : $value;
        
    }
    
    //////////////////////////////
	
    /**
	 * Init settings.
     * 
     * @return
	 */
    public static function init_settings() {
        
        self::$layouts = array(
            'no-sidebars' => __( 'No sidebars', 'ba-tours-light' ),
            'no-sidebars-wide' => __( 'No sidebars (wide)', 'ba-tours-light' ),
            'sidebar-left' => __( 'Left sidebar', 'ba-tours-light' ),
            'sidebar-right' => __( 'Right sidebar', 'ba-tours-light' ),
            'sidebars-left-right' => __( 'Two sidebars', 'ba-tours-light' ),
            'frontpage' => __( 'Front page', 'ba-tours-light' ),
        );
         
        self::$layout_vars['width'] = array(
            'main' => 6,
            'left' => 3,
            'right' => 3,
            'footer-left' => 4,
            'footer-middle' => 4,
            'footer-right' => 4,
        );
        
        self::$settings = wp_parse_args( get_option(self::$option_name), array(
            'layout' => 'no-sidebars',
            'color_main' => '#404040',
            'color_main_light' => '#777777',
            'color_main_yellow' => '#FBCB0B',
            'color_titles' => '#565656',
            'color_titles_light' => '#636363',
            'color_links' => '#2785CE',
            'color_icons' => '#3EC6FF',
            'color_buttons' => '#3EC6FF',
            'color_buttons_alt' => '#EC0707',
            'color_buttons_text' => '#FFFFFF',
            'color_important' => '#EC0707',
            'color_header' => '#326F9E',
            'color_header_text' => '#FFFFFF',
            'color_bg' => '#2785CE',
            'color_bg_text' => '#FFFFFF',
            'color_bg_gray' => '#E9E0E6',
            'color_footer' => '#2785CE',
            'color_footer_text' => '#FFFFFF',
            'font_title_1' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '600',
            ),
            'font_title_2' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '400',
            ),
            'font_title_3' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '600',
            ),
            'font_title_4' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '400',
            ),
            'font_title_5' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '400',
            ),
            'font_title_6' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '400',
            ),
            'font_text_1' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '400',
            ),
            'font_text_2' => array(
                    'google'      => true,
                    'subsets' => 'latin',
                    'font-family' => 'Open Sans',
                    'font-style'  => '',
                    'font-weight' => '400',
            ),
        ));
        
        self::$sidebars = array(
           'left' => array(
                'name' => __( 'Left Sidebar', 'ba-tours-light' ),
                //'desc' => __( 'Left Sidebar', 'ba-tours-light' ),
                ),
           'right' => array(
                'name' => __( 'Right Sidebar', 'ba-tours-light' ),
                ),
           'before-header' => array(
                'name' => __( 'Before-Header panel', 'ba-tours-light' ),
                ),
           'header'=> array(
                'name' => __( 'Header panel', 'ba-tours-light' ),
                ),
           'before-footer' => array(
                'name' => __( 'Before-Footer panel', 'ba-tours-light' ),
                ),
           'footer' => array(
                'name' => __( 'Footer panel', 'ba-tours-light' ),
                ),
           'footer-left' => array(
                'name' => __( 'Footer left panel', 'ba-tours-light' ),
                ),
           'footer-middle' => array(
                'name' => __( 'Footer middle panel', 'ba-tours-light' ),
                ),
           'footer-right' => array(
                'name' => __( 'Footer right panel', 'ba-tours-light' ),
                ),
        );
        
        self::$custom_fonts = array(
              'font_title_1' => array(
                 'name' => __( 'H1', 'ba-tours-light' ),
                 'selectors' => array(
                   'h1',
                 ),
              ),
              'font_title_2' => array(
                  'name' => __( 'H2', 'ba-tours-light' ),
                  'selectors' => array(
                     'h2',
                  ),
              ),
              'font_title_3' => array(
                  'name' => __( 'H3', 'ba-tours-light' ),
                  'selectors' => array(
                     'h3',
                  ),
              ),
              'font_title_4' => array(
                  'name' => __( 'H4', 'ba-tours-light' ),
                  'selectors' => array(
                     'h4',
                  ),
              ),
              'font_title_5' => array(
                  'name' => __( 'H5', 'ba-tours-light' ),
                  'selectors' => array(
                      'h5',
                  ),
              ),
              'font_title_6' => array(
                  'name' => __( 'H6', 'ba-tours-light' ),
                  'selectors' => array(
                      'h6',
                  ),
              ),
              'font_text_1' => array(
                  'name' => __( 'Buttons and menus', 'ba-tours-light' ),
                  'selectors' => array(
                      'button',
                      '.btn',
                      '.button',
                      '.nav-menu li',
                      '.nav-menu li a',
                      'input[type=button]',
                      'input[type=reset]',
                      'input[type=submit]',
                   ),
              ),
              'font_text_2' => array(
                  'name' => __( 'Text', 'ba-tours-light' ),
                  'selectors' => array(
                     '*',
                     'p',
                     'div',
                     'span',
                     'ul',
                     'ol',
                     'a',
                  ),
              ),
         );
         
         self::$image_sizes = array(
           'batourslight_wide' => array(
              'width' => 1920,
              'height' => 870,
              'crop' => true,
           ),
           'batourslight_thumbnail' => array(
              'width' => 350,
              'height' => 200,
              'crop' => true,
           ),
           'batourslight_thumbnail_wide' => array(
              'width' => 430,
              'height' => 190,
              'crop' => true,
           ),
        );
        
        self::$image_sizes = apply_filters('batourslight_init_image_sizes', self::$image_sizes);

        self::$custom_fonts = apply_filters('batourslight_init_custom_fonts', self::$custom_fonts);
        
        self::$sidebars = apply_filters('batourslight_init_sidebars', self::$sidebars);
        
        self::$layouts = apply_filters('batourslight_init_layouts', self::$layouts);
        
        self::$layout_vars = apply_filters('batourslight_init_layout_vars', self::$layout_vars);
        
        self::$settings = apply_filters('batourslight_init_settings', self::$settings);
        
        self::$layout_current = self::$settings['layout'];
        
        return;
        
    }
    
    ///////////////////////////
    
    /**
	 * Init layout vars.
     * 
     * @return
	 */
    public static function init_layout_current() {
        
        if (is_singular()){
            
            $custom_layout = apply_filters( 'batourslight_page_option', '', 'layout' );
            
            if ($custom_layout && $custom_layout != self::$layout_current && isset(self::$layouts[$custom_layout])){
                
                self::$layout_current = $custom_layout;
                
            } elseif (!$custom_layout && is_front_page()){
                
                self::$layout_current = 'frontpage';
                
            }
            
        }
        
        return;
        
     }   
    
    //////////////////////////////
	
    /**
	 * Init layout vars.
     * 
     * @return
	 */
    public static function init_layout_vars() {
        
        if (self::$layout_current == 'sidebar-left' || self::$layout_current == 'sidebar-right' || self::$layout_current == 'sidebars-left-right'){
            
            self::$layout_has_sidebars = true;
            
        }
        
        if (!is_active_sidebar('left') || (self::$layout_current != 'sidebar-left' && self::$layout_current != 'sidebars-left-right')){
            self::$layout_vars['width']['main'] = self::$layout_vars['width']['main'] + self::$layout_vars['width']['left'];
            self::$layout_vars['width']['left'] = 0;
        }
        
        if (!is_active_sidebar('right') || (self::$layout_current != 'sidebar-right' && self::$layout_current != 'sidebars-left-right')){
            self::$layout_vars['width']['main'] = self::$layout_vars['width']['main'] + self::$layout_vars['width']['right'];
            self::$layout_vars['width']['right'] = 0; 
        }
        
        $footer_left = is_active_sidebar('footer-left') ? 1 : 0;
        $footer_middle = is_active_sidebar('footer-middle') ? 1 : 0;
        $footer_right = is_active_sidebar('footer-right') ? 1 : 0;
        
        $footers = $footer_left + $footer_middle + $footer_right;
        
        if (!$footers){
            
            self::$layout_vars['width']['footer-left'] = 0;
            self::$layout_vars['width']['footer-middle'] = 0;
            self::$layout_vars['width']['footer-right'] = 0;
            
        } elseif ($footers == 1){
            
            $width = self::$layout_vars['width']['footer-left'] + self::$layout_vars['width']['footer-middle'] + self::$layout_vars['width']['footer-right'];
            
            self::$layout_vars['width']['footer-left'] = $footer_left*$width;
            self::$layout_vars['width']['footer-middle'] = $footer_middle*$width;
            self::$layout_vars['width']['footer-right'] = $footer_right*$width; 
            
        } elseif ($footers == 2){
            
            $rest = 12 - self::$layout_vars['width']['footer-left']*$footer_left - self::$layout_vars['width']['footer-middle']*$footer_middle - self::$layout_vars['width']['footer-right']*$footer_right;
            
            if (!$footer_left){
                self::$layout_vars['width']['footer-middle'] += $rest;  
            } else {
                self::$layout_vars['width']['footer-left'] += $rest;
            }
            
            self::$layout_vars['width']['footer-left'] *= $footer_left;
            self::$layout_vars['width']['footer-middle'] *= $footer_middle;
            self::$layout_vars['width']['footer-right'] *= $footer_right;
        }
        
        return;
    }
    
    //////////////////////////////
	
    /**
	 * Init custom fonts.
     * 
     * @return
	 */
    public static function init_custom_fonts() {
     
         $custom_fonts = array(
              'font_title_1' => array(
                 'name' => __( 'H1', 'ba-tours-light' ),
                 'selectors' => array(
                   'h1',
                 ),
              ),
              'font_title_2' => array(
                  'name' => __( 'H2', 'ba-tours-light' ),
                  'selectors' => array(
                     'h2',
                  ),
              ),
              'font_title_3' => array(
                  'name' => __( 'H3', 'ba-tours-light' ),
                  'selectors' => array(
                     'h3',
                  ),
              ),
              'font_title_4' => array(
                  'name' => __( 'H4', 'ba-tours-light' ),
                  'selectors' => array(
                     'h4',
                  ),
              ),
              'font_title_5' => array(
                  'name' => __( 'H5', 'ba-tours-light' ),
                  'selectors' => array(
                      'h5',
                  ),
              ),
              'font_title_6' => array(
                  'name' => __( 'H6', 'ba-tours-light' ),
                  'selectors' => array(
                      'h6',
                  ),
              ),
              'font_text_1' => array(
                  'name' => __( 'Buttons and menus', 'ba-tours-light' ),
                  'selectors' => array(
                      'button',
                      '.btn',
                      '.button',
                      '.nav-menu li',
                      '.nav-menu li a',
                      'input[type=button]',
                      'input[type=reset]',
                      'input[type=submit]',
                   ),
              ),
              'font_text_2' => array(
                  'name' => __( 'Text', 'ba-tours-light' ),
                  'selectors' => array(
                     '*',
                     'p',
                     'div',
                     'span',
                     'ul',
                     'ol',
                     'a',
                  ),
              ),
         );

        self::$custom_fonts = apply_filters('batourslight_init_custom_fonts', $custom_fonts);
        
        return;
    }
    
    //////////////////////////////
	
    /**
	 * Init custom colors.
     * 
     * @return
	 */
    public static function init_custom_colors() {
        
        $color_selectors = array(
           'meta'	 => array(
             // Color set meta data.
             'name'  => __( 'Color scheme', 'ba-tours-light' ),
             'desc' => __( 'Color scheme.', 'ba-tours-light' ),
           ),
           'color_main' => array(
              'name'  => __( 'Main text color', 'ba-tours-light' ),
              'desc'  => '',
              'selectors' => array(
                'color' => array(
                    'body',
                    'input',
                    'code',
                    'optgroup',
                    'select',
                    'textarea',
                    'label',
                    'p',
                    '#my_account_page_wrapper .my_account_page_nav_wrapper a',
                    '#my_account_page_wrapper .my_account_page_nav_wrapper a:hover',
                    '#my_account_page_wrapper .my_account_page_nav_wrapper a:visited',
                    '#my_account_page_wrapper .my_account_page_nav_wrapper .my_account_nav_item .my_account_nav_item_with_menu > .my_account_nav_item_title',
                 ),
               ),
            ),
    'color_main_light' => array(
		'name'  => __( 'Light text color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.content-light',
                '#comments .comment-content p',
                '.entry-footer, .entry-meta',
                '.gallery-caption',
			),
		),
	),
    'color_main_yellow' => array(
		'name'  => __( 'Yellow text color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.text-yellow',
                '.text-yellow p',
                'p.text-yellow',
                'h1.text-yellow',
                'h2.text-yellow',
                'h3.text-yellow',
                'h4.text-yellow',
                'h5.text-yellow',
                'h6.text-yellow',
                '#booking_form_block #booking_form_total .currency_amount',
			),
		),
	),
	'color_titles' => array(
		'name'  => __( 'Titles color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'h1',
				'h2',
				'h3',
				'h4',
				'h5',
				'h6',
				'.block_top_pages h3 a',
                '.block_search_res .search_res_title a',
                '.block_top_tours .search_res_title a',
                '.block_selected_pages h1 a',
			),
		),
	),
    'color_titles_light' => array(
		'name'  => __( 'Light Titles color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.title-light',
			),
		),
	),
	'color_links' => array(
		'name'  => __( 'Links color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'a',
				'a:visited',
                'body a:active',
				'body a:focus',
				'body a:hover',
				'.main-link-color',
                '.block_faq .block_faq_title',
                '.block_faq .block_faq_title h4',
                '.babe_search_results_filters .input_select_input:hover',
                '.checkout_form_input_field.checkout_form_input_field_focus',
                '.checkout_form_input_field.checkout_form_input_field_focus label',
                '.checkout_form_input_field .checkout_form_input_ripple',
                '#checkout_form_block .order_items_row_total',
                '#checkout_form .tab_title',
			),
		),
	),
    'color_icons' => array(
		'name'  => __( 'Icons color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.search_res_tags_line i',
				'.feature_item_icon i',
                '.babe-search-filter-terms .batourslight_preview_term_icon i',
			),
		),
	),
	'color_buttons' => array(
		'name'  => __( 'Buttons color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'background-color' => array(
				'#infinite-handle span button',
				'.added_to_cart',
				'.page-links span',
				'.pagination .page-numbers',
                'a.more-link',
                '.post-navigation .nav-links a',
				'button',
				'.button',
				'.btn',
				'.btn.btn-red:hover',
				'input[type=button]',
				'input[type=reset]',
				'input[type=submit]',
				'.block_top_tours .tour_info_price_discount',
                '.block_search_res .tour_info_price_discount',
                '.single-to_book .tour_info_price_discount',
                '.babe_pager .current',
                '.pagination .current',
                '.babe_price_slider .ui-slider-range.ui-corner-all',
                '.btn.btn-search:hover',
                '.block_special_tours .tour_info_price',
			),
		),
	),
	'color_buttons_alt' => array(
		'name'  => __( 'Alternative buttons color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'background-color' => array(
				'.btn-red',
				'.button:hover',
				'.btn:hover',
				'.btn-primary:hover',
                'input[type=submit]:hover',
                '.pagination .page-numbers:hover',
                '.babe_pager .page-numbers:hover',
                'a.more-link:hover',
                '.post-navigation .nav-links a:hover',
			),
		),
	),
	'color_buttons_text' => array(
		'name'  => __( 'Buttons text color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'#infinite-handle span button',
				'.added_to_cart',
				'.page-links span',
				'.pagination .page-numbers',
                '.pagination .page-numbers',
                'a.more-link',
                'a.more-link:hover',
                '.post-navigation .nav-links a',
				'.button',
				'button',
				'.btn',
				'a.btn',
				'a.btn:visited',
				'a.btn:hover',
				'input[type=button]',
				'input[type=reset]',
				'input[type=submit]',
				'.block_step_title:not(.block_active)',
				'.block_step_title:not(.block_active) h4',
                '.pagination .page-numbers:hover',
                '.babe_pager .page-numbers:hover',
                '.add_input_field .add_ids_list .term_item:hover',
                '.add_input_field .add_ids_list .term_item.term_item_selected',
                '.block_special_tours .tour_info_price',
			),
		),
	),
	'color_important' => array(
		'name'  => __( 'Important text', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.highlight-text',
				'.highlight-text a',
				'.block_top_tours .tour_info_price',
				'.block_search_res .tour_info_price',
                '.single-to_book .tour_info_price',
			),
		),
	),
    'color_header' => array(
		'name'  => __( 'Header background color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'background-color' => array(
				'.header-background',
                '#site-navigation .dropdown-menu',
                '.widget-area .widget .widget-title',
                '.block_step_title',
			),
		),
	),
    'color_header_text' => array(
		'name'  => __( 'Header text color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.header-background',
                '.header-background h1',
                '.header-background h2',
                '.header-background h3',
                '.header-background span',
                '.header-background div',
                '.header-background ul',
                '.header-background a',
                '.header-background a:hover',
                '.header-background a:active',
                '.header-background a:focus',
                '.header-background ul',
                '.header-background p',
                '.widget-area .widget .widget-title',
			),
		),
	),
    'color_bg' => array(
		'name'  => __( 'Main background color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'background-color' => array(
				'.main-background',
                '.add_input_field .add_ids_list .term_item.term_item_selected',
                '.add_input_field .add_ids_list .term_item:hover',
                'body .ui-datepicker .ui-datepicker-header',
                '#booking_form_block',
                '#booking_form_block .input_select_field .term_item.term_item_selected',
                '#booking_form_block .input_select_field .term_item:hover',
                '.babe_search_results_filters .input_select_field .input_select_list .term_item.term_item_selected',
                '.babe_search_results_filters .input_select_field .input_select_list .term_item:hover',
                '#checkout_form .tab_title.tab_active',
                '#checkout_form .tab_title:hover',
                '#my_account_page_wrapper .my_account_page_nav_wrapper .my_account_nav_item_current',
                '#my_account_page_wrapper .my_account_page_nav_wrapper .my_account_nav_item a:hover span',
			),
		),
	),
    'color_bg_text' => array(
		'name'  => __( 'Text color with Main background', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.main-background',
                '.main-background p:not(.text-yellow)',
                '.main-background h1:not(.text-yellow)',
                '.main-background h2:not(.text-yellow)',
                '.main-background h3:not(.text-yellow)',
                '.main-background h4:not(.text-yellow)',
                '.main-background h5:not(.text-yellow)',
                '.main-background h6:not(.text-yellow)',
                '.block_step_title',
                '.block_step_title h4',
                '#booking_form_block .input_select_field .term_item.term_item_selected',
                '#booking_form_block .input_select_field .term_item:hover',
                '#checkout_form .tab_title.tab_active',
                '#checkout_form .tab_title:hover',
                '#my_account_page_wrapper .my_account_page_nav_wrapper .my_account_nav_item_current span',
                '#my_account_page_wrapper .my_account_page_nav_wrapper .my_account_nav_item a:hover span',
			),
		),
	),
    'color_bg_gray' => array(
		'name'  => __( 'Gray background color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'background-color' => array(
                'code',
                '.sticky > .entry-header > .entry-title',
                '.sticky > .entry-footer',
                '.wp-caption .wp-caption-text',
				'.gray-background',
                '.pagination .page-numbers.current',
                '.babe_pager .page-numbers.current',
                '#checkout_form_block .order_items_row_total',
                '#checkout_form .amount_group',
                '.my_account_page_content_wrapper #login_form',
                '#my_account_page_wrapper .my_account_inner_page_block h2',
			),
		),
	),
	'color_footer' => array(
		'name'  => __( 'Footer background color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'background-color' => array(
				'.site-footer',
                '.footer-widgets .widget .widget-title',
			),
		),
	),
	'color_footer_text' => array(
		'name'  => __( 'Footer text color', 'ba-tours-light' ),
		'desc'  => '',
		'selectors' => array(
			'color' => array(
				'.site-footer',
				'.site-footer p',
				'.site-footer ul',
                '.site-footer a',
                '.site-footer a:hover',
                '.site-footer a:visited',
                '.footer-widgets .widget .widget-title',
			),
		),
	),
    
    );
        
        self::$color_selectors = apply_filters('batourslight_init_custom_colors', $color_selectors);
        
        return;
    }
    
    //////////////////////////////
	
    /**
	 * Inline styles.
     * 
     * @return string
	 */
    public static function inline_styles() {
        
        $output = '';
        
        /// add color styles
        foreach (self::$color_selectors as $option_id => $style_arr){
            
            if (isset($style_arr['selectors']) && is_array($style_arr['selectors']) && isset(self::$settings[$option_id])){
                foreach ( $style_arr['selectors'] as $attr => $selectors_list ) {
						
					if ( empty( $selectors_list ) ) {
						continue;
					}
						
					$selectors = implode( ",\n", $selectors_list );
						
					$output .= $selectors . " { \n\t" . $attr . ": " . self::$settings[$option_id] . ";\n}\n";
				}
            }
            
        }
        
        /// add font styles
        foreach (self::$custom_fonts as $option_id => $style_arr){
            
            if (isset($style_arr['selectors']) && is_array($style_arr['selectors']) && isset(self::$settings[$option_id]) && is_array(self::$settings[$option_id])){
                
                $selectors = implode( ",\n", $style_arr['selectors'] );
                
                $attrs = array();
					
				foreach ( self::$settings[$option_id] as $attr => $value ) {
						
				    if ( $attr != 'google' && $attr != 'subsets' && $value) {
						$attrs[] = $attr . ": " . ($attr == 'font-family' ? "'".$value."'" : $value);
					}
				}
					
				$output .= $selectors . " { \n\t" . implode( ";\n\t", $attrs ) . ";\n}\n";
                
            }
            
        }
        
        return $output;
        
    }
    
    //////////////////////////////
	
    /**
	 * Get google font styles
     * 
     * @return array
	 */
    public static function google_font_styles() {
        
        $output = '';
        
        $url = 'https://fonts.googleapis.com/css?family=';
        
        $url_arr = array();
        
        $fonts = array();
		
		foreach (self::$custom_fonts as $option_id => $style_arr){
            // Process only google fonts.
			if ( isset(self::$settings[$option_id]['google']) && self::$settings[$option_id]['google'] && isset(self::$settings[$option_id]['font-family']) ) {
				
                $family = self::$settings[$option_id]['font-family'];
                
                $style = isset(self::$settings[$option_id]['font-weight']) && self::$settings[$option_id]['font-weight'] ? self::$settings[$option_id]['font-weight'] : '';
                
                $style .= isset(self::$settings[$option_id]['font-style']) && self::$settings[$option_id]['font-style'] ? self::$settings[$option_id]['font-style'] : '';
                
                $subsets = isset(self::$settings[$option_id]['subsets']) && self::$settings[$option_id]['subsets'] ? self::$settings[$option_id]['subsets'] : '';
                
                if (isset($fonts[$family])){
                    
                    if (isset($fonts[$family]['style']) && stripos($fonts[$family]['style'], $style) === false){
                        
                        $fonts[$family]['style'] .= ','.$style;
                        
                    } elseif (!isset($fonts[$family]['style'])){
                        
                        $fonts[$family]['style'] = $style;
                        
                    }
                    
                    if (isset($fonts[$family]['subsets']) && stripos($fonts[$family]['subsets'], $subsets) === false){
                        
                        $fonts[$family]['subsets'] .= ','.$subsets;
                        
                    } elseif (!isset($fonts[$family]['subsets'])){
                        
                        $fonts[$family]['subsets'] = $subsets;
                        
                    }
                    
                } else {
                    
                    $fonts[$family] = array(
                        'style' => $style,
                        'subsets' => $subsets,
                    );
                    
                }
				
			}
		}
		
		if (!empty($fonts)){
		  
            foreach($fonts as $family => $font_args){
                
                $url_arr[$family] = urlencode($family);
                
                $url_arr[$family] .= $font_args['style'] ? ':' . $font_args['style'] : '';
                
                $url_arr[$family] .= $font_args['subsets'] ? '&subset='. $font_args['subsets'] : '';
                
            }
            
            $output = $url . implode('|', $url_arr); 
          
		}
        
        return $output;
        
    }

	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}

/**
 * Calling to setup class.
 */
BAT_Settings::init();
