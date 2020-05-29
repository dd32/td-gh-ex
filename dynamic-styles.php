<?php 
/**
* Dynamic style for the theme
*
*/
add_filter('arrival_dynamic_styles_dev','arrival_store_dynamic_styles');
if( ! function_exists('arrival_store_dynamic_styles')):
	function arrival_store_dynamic_styles(){

		$defaults = arrival_store_get_default_theme_options();

		$arrival_store_top_header_bg 			= get_theme_mod('arrival_store_top_header_bg',$defaults['arrival_store_top_header_bg']);
		$arrival_store_top_header_text_color 	= get_theme_mod('arrival_store_top_header_text_color',$defaults['arrival_store_top_header_text_color']);
		$arrival_store_middle_header_bg 		= get_theme_mod('arrival_store_middle_header_bg',$defaults['arrival_store_middle_header_bg']);
		$arrival_store_middle_header_text 		= get_theme_mod('arrival_store_middle_header_text',$defaults['arrival_store_middle_header_text']);
		$arrival_store_main_header_bg 			= get_theme_mod('arrival_store_main_header_bg',$defaults['arrival_store_main_header_bg']);
		$arrival_store_main_header_text 		= get_theme_mod('arrival_store_main_header_text',$defaults['arrival_store_main_header_text']);

		?>
		.arrival-store-main .top-header-wrapp{
			background:<?php echo arrival_sanitize_color($arrival_store_top_header_bg);?>
		}


		.top-header-wrapp .text-wrap,.top-right-wrapp ul.arrival-top-navigation li a{
			color: <?php echo arrival_sanitize_color($arrival_store_top_header_text_color);?>
		}

		.arrival-store-main .after-top-header-wrapp{
			background: <?php echo arrival_sanitize_color($arrival_store_middle_header_bg);?>
		}

		.after-top-header-wrapp{
			background: <?php echo arrival_sanitize_color($arrival_store_middle_header_text);?>
		}

		.main-header-wrapp.boxed .container, .main-header-wrapp.full,
		body.arrival-store-main .main-header-wrapp .mob-outer-wrapp{
			background: <?php echo arrival_sanitize_color($arrival_store_main_header_bg);?>
		}
		body.arrival-store-main .main-header-wrapp .mob-outer-wrapp,
		.main-header-wrapp .browse-category-wrap{
			border-color: <?php echo arrival_sanitize_color($arrival_store_main_header_bg);?>
		}

		.main-header-wrapp.boxed .container, .main-header-wrapp.full,.main-header-wrapp .container .main-navigation .primary-menu-container>ul>li>a,.arrival-custom-element ul li a{
			color: <?php echo arrival_sanitize_color($arrival_store_main_header_text);?>
		}

		.main-navigation .dropdown-symbol, .arrival-top-navigation .dropdown-symbol{
			border-color: <?php echo arrival_sanitize_color($arrival_store_main_header_text);?>
		}

		.main-header-wrapp .browse-category-wrap .browse-category svg{
			fill: <?php echo arrival_sanitize_color($arrival_store_main_header_text);?>
		}



		<?php 
	}
endif;