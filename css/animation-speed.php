<?php if( ! defined( 'ABSPATH' ) ) exit;
function baw_animation() { ?>
<style>

	.soc a {
		-webkit-animation-duration: 0.4s;
		animation-duration: 0.4s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;

	}

	.f-slick-image h3{
		-webkit-animation-duration: 0.4s;
		animation-duration: 0.4s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;

	}
	
	<?php if (get_theme_mod( 'baw_sub_menu_animation' )) { ?>
		.main-navigation ul li:hover > .sub-menu {
			-webkit-animation-duration: <?php if (get_theme_mod( 'baw_sub_menu_animation_speed' )) { echo get_theme_mod( 'baw_sub_menu_animation_speed' ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if (get_theme_mod( 'baw_sub_menu_animation_speed' )) { echo get_theme_mod( 'baw_sub_menu_animation_speed' ); } else echo "0.3"; ?>s !important;				
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;

		}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_site_title_animation'  )) { ?>	
		.site-title {
			display: block;	
			-webkit-animation-duration: <?php if (get_theme_mod( 'baw_site_title_animation_speed' )) { echo get_theme_mod( 'baw_site_title_animation_speed' ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if (get_theme_mod( 'baw_site_title_animation_speed' )) { echo get_theme_mod( 'baw_site_title_animation_speed' ); } else echo "0.3"; ?>s !important;					
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
		}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_description_animation'  )) { ?>		
	.site-description {
		display: block;
		-webkit-animation-duration: <?php if (get_theme_mod( 'baw_description_animation_speed' )) { echo get_theme_mod( 'baw_description_animation_speed' ); } else echo "0.3"; ?>s !important;
		animation-duration: <?php if (get_theme_mod( 'baw_description_animation_speed' )) { echo get_theme_mod( 'baw_description_animation_speed' ); } else echo "0.3"; ?>s !important;				
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_animations_slider'  )) { ?>			
	.sp-slider-back {
		display: block;
		-webkit-animation-duration: <?php if (get_theme_mod( 'baw_animations_slider_speed' )) { echo get_theme_mod( 'baw_animations_slider_speed' ); } else echo "0.3"; ?>s !important;
		animation-duration: <?php if (get_theme_mod( 'baw_animations_slider_speed' )) { echo get_theme_mod( 'baw_animations_slider_speed' ); } else echo "0.3"; ?>s !important;			
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_animation_gallery'  )) { ?>		
	#seos-gallery a, .album a {
		-webkit-animation-duration: <?php if (get_theme_mod( 'baw_animation_gallery_speed' )) { echo get_theme_mod( 'baw_animation_gallery_speed' ); } else echo "0.3"; ?>s !important;
		animation-duration: <?php if (get_theme_mod( 'baw_animation_gallery_speed' )) { echo get_theme_mod( 'baw_animation_gallery_speed' ); } else echo "0.3"; ?>s !important;		
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_animation_home_images'  )) { ?>			
	.testimonial-view {
		-webkit-animation-duration: <?php if (get_theme_mod( 'baw_animation_home_images_speed' )) { echo get_theme_mod( 'baw_animation_home_images_speed' ); } else echo "0.3"; ?>s !important;
		animation-duration: <?php if (get_theme_mod( 'baw_animation_home_images_speed' )) { echo get_theme_mod( 'baw_animation_home_images_speed' ); } else echo "0.3"; ?>s !important;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_animation_sidebar'  )) { ?>		
	aside section {
		display: block;
		-webkit-animation-duration: <?php if (get_theme_mod( 'baw_animation_sidebar_speed' )) { echo get_theme_mod( 'baw_animation_sidebar_speed' ); } else echo "0.3"; ?>s !important;
		animation-duration: <?php if (get_theme_mod( 'baw_animation_sidebar_speed' )) { echo get_theme_mod( 'baw_animation_sidebar_speed' ); } else echo "0.3"; ?>s !important;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_animation_footer'  )) { ?>			
	.footer-widgets {
		-webkit-animation-duration: <?php if (get_theme_mod( 'baw_animation_footer_speed' )) { echo get_theme_mod( 'baw_animation_footer_speed' ); } else echo "0.3"; ?>s !important;
		animation-duration: <?php if (get_theme_mod( 'baw_animation_footer_speed' )) { echo get_theme_mod( 'baw_animation_footer_speed' ); } else echo "0.3"; ?>s !important;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	<?php } ?>

	<?php if (get_theme_mod( 'baw_animation_content'  )) { ?>			
	article {
		display: block;
		-webkit-animation-duration: <?php if (get_theme_mod( 'baw_animation_content_speed' )) { echo get_theme_mod( 'baw_animation_content_speed' ); } else echo "0.3"; ?>s !important;
		animation-duration: <?php if (get_theme_mod( 'baw_animation_content_speed' )) { echo get_theme_mod( 'baw_animation_content_speed' ); } else echo "0.3"; ?>s !important;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}
	<?php } ?>
	
	.h-image-title {
		display: block;
		-webkit-animation-duration: 0.3s !important;
		animation-duration: 0.3s !important;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
	}

</style>
<?php }

add_action('wp_head', 'baw_animation');