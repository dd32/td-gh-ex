<?php
/**
 * bellini Theme Customizer.
 *
 * @package bellini
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bellini_customize_register( $wp_customize ) {

	//echo '<pre>';
	//var_dump($wp_customize->sections());
	//var_dump($wp_customize->controls());
	//echo '</pre>';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	/**
	 * Your Brand name
	 */
	$wp_customize->get_section('title_tagline')->title 			= __( 'Your Brand Name','bellini' );
	$wp_customize->get_control('blogname')->label 				= __('Site Name', 'bellini');
	$wp_customize->get_control('blogdescription')->label 		= __('Site Description', 'bellini');


	/**
	 * Colors Panel.
	 */
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'header_textcolor' )->section 	= 'text_color';
	$wp_customize->get_setting( 'background_color' )->default 	= '#eceef1';
	$wp_customize->get_control( 'background_color' )->section 	= 'section_color';
	$wp_customize->get_control( 'background_color' )->priority 	= 3;
	$wp_customize->get_control( 'background_color' )->label 	= 'Website Background';
	$wp_customize->remove_section('colors');


/*--------------------------------------------------------------
## Top Panels
--------------------------------------------------------------*/

	$wp_customize->get_section( 'static_front_page' )->priority = 1;
	$wp_customize->get_section('static_front_page')->title 		= __( 'Frontpage Preferences','bellini' );
	$wp_customize->get_section( 'static_front_page' )->panel 	= 'bellini_frontpage_panel';
	$wp_customize->get_section( 'title_tagline' )->priority 	= 2;
	$wp_customize->get_control( 'background_image' )->section 	= 'bellini_default_image';
	$wp_customize->remove_section('background_image');
	$wp_customize->get_control( 'header_image' )->section 		= 'bellini_default_image';

	// Frontpage Panel
	$wp_customize->add_panel( 'bellini_frontpage_panel', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Set Your Frontpage','bellini' ),
		'description'    => '',
	) );

	// Color Panel
	$wp_customize->add_panel( 'bellini_colors_panel', array(
		'priority'       => 3,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Colors & Typography','bellini' ),
		'description'    => 'Kidd Color',
	) );

	// Default Image & Text Panel
	$wp_customize->add_panel( 'bellini_placeholder_image_panel', array(
		'priority'       => 100,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Miscellaneous','bellini' ),
		'description'    => 'Set Default Image',
	) );

	// Layout & Positioning Panel
	$wp_customize->add_panel( 'bellini_placeholder_layout_panel', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Layout & Positioning','bellini' ),
		'description'    => 'Set Layout',
	) );


/*--------------------------------------------------------------
## Sections
--------------------------------------------------------------*/

	// Typography
	$wp_customize->add_section('bellini_typography',array(
		'title' => __( 'Typography', 'bellini' ),
		'capability' => 'edit_theme_options',
		'priority' => 4,
		'panel' => 'bellini_colors_panel'
		)
	);


	// Color
	$wp_customize->add_section('section_color',array(
			'title' => __( 'Section Colors', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 1,
			'panel' => 'bellini_colors_panel'
		)
	);

	$wp_customize->add_section('text_color',array(
			'title' => __( 'Text Colors', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 2,
			'panel' => 'bellini_colors_panel'
		)
	);

	// Default Image
	$wp_customize->add_section('bellini_default_image',array(
			'title' => __( 'Default Image', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 3,
			'panel' => 'bellini_placeholder_image_panel'
		)
	);

	// Default Text
	$wp_customize->add_section('bellini_default_text',array(
			'title' => __( 'Change Default Text', 'bellini' ),
			'capability' => 'edit_theme_options',
			'priority' => 4,
			'panel' => 'bellini_placeholder_image_panel'
		)
	);




/*--------------------------------------------------------------
## Settings & Controls
--------------------------------------------------------------*/

require(get_template_directory() . '/inc/settings/settings-content.php');          //Default Image & Content
require(get_template_directory() . '/inc/settings/settings-position.php');         //Position
require(get_template_directory() . '/inc/settings/settings-typography.php');       //Typography
require(get_template_directory() . '/inc/settings/settings-color.php');            //Color
require(get_template_directory() . '/inc/settings/settings-front.php');            //Front Page Template

}
add_action( 'customize_register', 'bellini_customize_register' );


function bellini_customizer_head_styles() {

	$website_width 									= get_theme_mod('bellini_website_width', '100');

	$body_text_color 								= get_theme_mod('body_text_color', '#333333');
	$bellini_primary_color							= get_theme_mod('bellini_primary_color', '#2196F3');
	$bellini_accent_color							= get_theme_mod('bellini_accent_color', '#E3F2FD');
	$title_text_color 								= get_theme_mod('title_text_color', '#000000');
	$menu_text_color 								= get_theme_mod('menu_text_color', '#000000');
	$button_text_color 								= get_theme_mod('button_text_color', '#ffffff');
	$link_text_color 								= get_theme_mod('link_text_color', '#000000');
	$link_hover_color 								= get_theme_mod('link_hover_color', '#000000');
	$widget_background_color 						= get_theme_mod('widget_background_color', '#ffffff');
	$header_background_color 						= get_theme_mod('header_background_color', '#ffffff');
	$footer_background_color 						= get_theme_mod('footer_background_color', '#eceef1');
	$button_background_color 						= get_theme_mod('button_background_color', '#00B0FF');

	$bellini_menu_position         					= get_theme_mod('bellini_menu_position', 'center');
	$page_title_position							= get_theme_mod('page_title_position', 'center');

	$bellini_body_font_size							= get_theme_mod('bellini_body_font_size', '16px');
	$bellini_title_font_size							= get_theme_mod('bellini_title_font_size', '29px');
	$bellini_menu_font_size							= get_theme_mod('bellini_menu_font_size', '16px');

	$woo_category_background_color 					= get_theme_mod('woo_category_background_color', '#FFEB3B');
	$woo_category_background_image 					= get_theme_mod('woo_category_background_image');
	$woo_product_background_color					= get_theme_mod('woo_product_background_color', '#eceef1');
	$woo_product_background_image 					= get_theme_mod('woo_product_background_image');
	$woo_featured_product_background_color			= get_theme_mod('woo_featured_product_background_color', '#eceef1');
	$woo_featured_product_background_image 			= get_theme_mod('woo_featured_product_background_image');
	$bellini_blogposts_background_color				= get_theme_mod('bellini_blogposts_background_color', '#eceef1');
	$bellini_blogposts_background_image 				= get_theme_mod('bellini_blogposts_background_image');

	$bellini_static_slider_button_background_one 		= get_theme_mod('bellini_static_slider_button_background_one', '#00B0FF');
	$bellini_static_slider_button_background_two 		= get_theme_mod('bellini_static_slider_button_background_two', '#00B0FF');
	$slider_background_color_mobile 				= get_theme_mod('slider_background_color_mobile', '#00B0FF');
	$slider_text_color_mobile 						= get_theme_mod('slider_text_color_mobile', '#00B0FF');


	// CSS Classes
	$primary_color_text 		= ".site-cart__icon,.product-card__info__price,.product-featured__price .amount,.breadcrumb_last,.single.post-meta,.single.post-meta a,.product-card__info__price .amount,.woocommerce div.product span.price";
	$primary_color_background 	= ".site-search form input[type=submit],.product .onsale,.listed__total,.comment-form input[type=submit],.main-navigation li a:before,.menu-toggle,.woocommerce span.onsale";
	$accent_color_text 			= ".post-meta__category a,.comment-reply-link,.comment__author,.blog-post__meta .post-meta__time,.post-meta__author,.comment-edit-link,.comment__meta__info";
	$accent_color_background 	= ".product-featured__review--centered,.post-meta__tag__item a";

	$button_color_background 	= ".button--secondary,.front__product-featured__text .add_to_cart_button";
	$button_color_text 			= ".button--secondary a,.front__product-featured__text .add_to_cart_button";
?>


		<style type="text/css">
		/* Styles derived from Customizer */
		.website-width{width:<?php echo $website_width; ?>%;}
		/* Color */
		<?php echo $primary_color_text;?>{color: <?php echo $bellini_primary_color; ?>;}
		<?php echo $primary_color_background;?>{background-color: <?php echo $bellini_primary_color; ?>;}
		<?php echo $accent_color_text;?>{color: <?php echo $bellini_accent_color; ?>;}
		<?php echo $accent_color_background;?>{background-color: <?php echo $bellini_accent_color; ?>;}
		.blog__post__right .element-title--post{
			background-image: -webkit-linear-gradient(left, transparent 50%, <?php echo $bellini_primary_color; ?> 50%);
  			background-image: linear-gradient(to right, transparent 50%, <?php echo $bellini_primary_color; ?> 50%);
		}

		body,button,input,select,textarea{color: <?php echo $body_text_color; ?>;}
		a{color: <?php echo $link_text_color; ?>;}
		a:hover,a:focus,a:active{color: <?php echo $link_hover_color; ?>;}

		.site-header{background-color: <?php echo $header_background_color; ?>;}
		.site-footer{background-color: <?php echo $footer_background_color; ?>;}
		.widget{background-color: <?php echo $widget_background_color; ?>;}


		.element-title{color: <?php echo $title_text_color; ?>;}
		.main-navigation ul ul a{color: <?php echo $menu_text_color; ?>;}



		<?php echo $button_color_background;?>{background-color: <?php echo $button_background_color; ?>;}
		<?php echo $button_color_text;?>{color: <?php echo $button_text_color; ?>;}

		/* Position */
		.nav-menu {text-align: <?php echo $bellini_menu_position; ?>;}
		.single-page__title{text-align:<?php echo $page_title_position; ?>;}

		/* Typography */
		body,button,input,select,textarea{font-size:<?php echo $bellini_body_font_size;?>;}
		.element-title--post,.element-title--main,
		.single-page__title,.single-post__title{font-size:<?php echo $bellini_title_font_size;?>;}
		.main-navigation a,.page-numbers a,.page-numbers span{font-size:<?php echo $bellini_menu_font_size; ?>;}

		/* Front Page */
		.front-product-category{background-color:<?php echo $woo_category_background_color; ?>;}
		.front-product-category{background-image: url(<?php echo $woo_category_background_image; ?>);}
		.front-new-arrival{background-color:<?php echo $woo_product_background_color;?>;}
		.front-new-arrival{background-image: url(<?php echo $woo_product_background_image; ?>);}
		.front__product-featured{background-color:<?php echo $woo_featured_product_background_color;?>;}
		.front__product-featured{background-image: url(<?php echo $woo_featured_product_background_image; ?>);}
		.front-blog{background-color:<?php echo $bellini_blogposts_background_color;?>;}
		.front-blog{background-image: url(<?php echo $bellini_blogposts_background_image; ?>);}
		.slider__cta--one{background-color: <?php echo $bellini_static_slider_button_background_one; ?>;}
		.slider__cta--two{background-color: <?php echo $bellini_static_slider_button_background_two; ?>;}


		@media (max-width:640px){
    		.slider-content{
    			background-color:<?php echo $slider_background_color_mobile; ?>;
    			color:<?php echo $slider_text_color_mobile; ?>;
    		}
		}

		</style>
<?php }

add_action( 'wp_head', 'bellini_customizer_head_styles' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bellini_customize_preview_js() {
	wp_enqueue_script( 'bellini_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160120', true );
}
add_action( 'customize_preview_init', 'bellini_customize_preview_js' );


function bellini_customizer_style() {
	wp_enqueue_style('CustomizerUI',get_template_directory_uri(). '/inc/css/customizer-ui.css');
}

add_action( 'customize_controls_enqueue_scripts', 'bellini_customizer_style');

