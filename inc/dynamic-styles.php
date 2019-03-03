<?php
/**
* Dynamic styles for the theme
*
* @package Arrival 
* @since 1.0.1
*/

function arrival_dynamic_styles(){
	ob_start();
	
	$defaults = arrival_get_default_theme_options();
	$prefix = 'arrival';

	
	//Theme color
	$_theme_color = get_theme_mod('arrival_theme_color',$defaults['arrival_theme_color']);
	?>
	
	.top-header-wrapp,.scroll-top-top,.widget h2.widget-title:before,.comment-reply-link, .comment-form .form-submit input,span.tags-links a:hover,.header-last-item.search-wrap.header-btn,.arrival-archive-navigation ul li a:hover,
	.arrival-archive-navigation ul li.active a,.comment-reply-link, .comment-form .form-submit input,.woocommerce div.product form.cart .button,.woocommerce .products li a.button:hover,.woocommerce #respond input#submit{
		background: <?php echo  arrival_sanitize_color($_theme_color);?>;
	}

	.main-navigation a:hover, .main-navigation a:focus, .arrival-top-navigation ul a:hover, .arrival-top-navigation ul a:focus,.main-navigation ul li a:hover,.header-last-item.search-wrap:hover,.widget ul li a:hover,.site-footer a:hover,.site-main a:hover,.entry-meta > span:hover,.main-navigation a:hover,footer .widget_pages a:hover::before, footer .widget_pages a:focus::before, footer .widget_nav_menu a:hover::before, footer .widget_nav_menu a:focus::before,nav.navigation.post-navigation .nav-links a:hover::after{
		color:	<?php echo  arrival_sanitize_color($_theme_color);?>;
	}
	
	.scroll-top-top,.comment-reply-link, .comment-form .form-submit input,span.tags-links a:hover,.arrival-archive-navigation ul li a:hover,.arrival-archive-navigation ul li.active a,.header-last-item.search-wrap.header-btn,.comment-reply-link, .comment-form .form-submit input{
		border-color: <?php echo  arrival_sanitize_color($_theme_color);?>;
	}


	<?php 


	//top header bg
	$top_header_bg_color = get_theme_mod('arrival_top_header_bg_color',$defaults['arrival_top_header_bg_color']);
	
	if( $top_header_bg_color != '#e12454' ){ ?>
		.top-header-wrapp{
			background: <?php echo arrival_sanitize_color($top_header_bg_color); ?>;
		}
	<?php 
	}

	//top header text color
	$_top_header_txt_color = get_theme_mod('arrival_top_header_txt_color',$defaults['arrival_top_header_txt_color']);
	if($_top_header_txt_color){ ?>
		.top-header-wrapp a, .top-header-wrapp{
			color: <?php echo arrival_sanitize_color($_top_header_txt_color); ?>;
		}
		.top-header-wrapp .phone-wrap:before{
			background: <?php echo arrival_sanitize_color($_top_header_txt_color); ?>;
		}
	<?php }

	//main nav bg color
	$main_nav_bg_color = get_theme_mod('arrival_main_nav_bg_color',$defaults['arrival_main_nav_bg_color']);

	if( $main_nav_bg_color ){ ?>
		
		.main-header-wrapp.boxed .container, .main-header-wrapp.full{
			background: <?php echo arrival_sanitize_color($main_nav_bg_color); ?>;
		}

	<?php 
	}

	//menu link color
	$main_nav_menu_color = get_theme_mod('arrival_main_nav_menu_color',$defaults['arrival_main_nav_menu_color']);
	
	if( $main_nav_menu_color ){ ?>

		.main-navigation ul li > a{
			color: <?php echo arrival_sanitize_color($main_nav_menu_color); ?>;
		}
		.main-navigation .dropdown-symbol, .arrival-top-navigation .dropdown-symbol{
			border-color: <?php echo arrival_sanitize_color($main_nav_menu_color); ?>;
		}

	<?php 
	}

	//menu link color:Hover
	$main_nav_menu_color_hover = get_theme_mod('arrival_main_nav_menu_color_hover',$defaults['arrival_theme_color']);

	if( $main_nav_menu_color_hover != '#e12454' ){ ?>

		.main-navigation ul li a:hover{
			color: <?php echo arrival_sanitize_color($main_nav_menu_color_hover); ?>;
		}
		.main-navigation .dropdown-symbol:hover, .arrival-top-navigation .dropdown-symbol:hover{
			border-color: <?php echo arrival_sanitize_color($main_nav_menu_color_hover); ?>;
		}

	<?php 
	}

	//container width
	$main_container_width = get_theme_mod('arrival_main_container_width',$defaults['arrival_main_container_width']);
	if( $main_container_width ){ ?>
		
		.container{
			max-width: <?php echo absint($main_container_width); ?>px;
		}
		.site{
			width: <?php echo absint($main_container_width); ?>px;
		}

	<?php 
	}

	//navigation paddings
	$_nav_top_padding = get_theme_mod('arrival_nav_top_padding');
	$_nav_bottom_padding = get_theme_mod('arrival_nav_bottom_padding');
	

	if($_nav_top_padding || $_nav_bottom_padding ){
	?>
		.main-header-wrapp.boxed .container, .main-header-wrapp.full{
			padding-top: <?php echo absint($_nav_top_padding); ?>px;
			padding-bottom: <?php echo absint($_nav_bottom_padding); ?>px;
		}
	<?php 	
	}

	//buttons border-radius
	$_all_btn_radius_top 	= get_theme_mod('arrival_all_btn_radius_top');
	$_all_btn_radius_right 	= get_theme_mod('arrival_all_btn_radius_right');
	$_all_btn_radius_btm 	= get_theme_mod('arrival_all_btn_radius_btm');
	$_all_btn_radius_left 	= get_theme_mod('arrival_all_btn_radius_left');

	if( $_all_btn_radius_top || $_all_btn_radius_right || $_all_btn_radius_btm || $_all_btn_radius_left ){ ?>

		.header-last-item.search-wrap.header-btn,.comment-reply-link, .comment-form .form-submit input,.woocommerce #respond input#submit,.woocommerce div.product form.cart .button
		{
			border-radius: <?php echo absint($_all_btn_radius_top).'px '. absint($_all_btn_radius_right).'px '.absint($_all_btn_radius_btm).'px '. absint($_all_btn_radius_left).'px' ?>;
		}

	<?php }

	//navigation font-weight
	$_nav_font_weight = get_theme_mod('arrival_nav_font_weight',$defaults['arrival_nav_font_weight']);
	?>
	.main-navigation a{
		font-weight: <?php echo absint($_nav_font_weight); ?>;
	}


	<?php 


	$custom_css = ob_get_clean();
	$custom_css = arrival_css_strip_whitespace( $custom_css );

        
wp_add_inline_style( 'arrival-responsive', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'arrival_dynamic_styles' );