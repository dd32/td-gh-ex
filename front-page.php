<?php
/**
 * The front page template file.
 * This template file is used to render the site’s front page when the
 * front page is choosen to display a static page. If there is not a condition, like here,
 * it takes precedence over the blog posts index (home.php or index.php) templates. 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

$bassist_theme_options = bassist_get_options();

if ( 'page' == get_option( 'show_on_front' ) ):
	get_header(); ?>
	<div id="main-content"> 
		<?php
			bassist_parallax('1');
			if ( $bassist_theme_options['hide_about_section'] == 0 ):
				get_template_part('template-parts/section', 'about');
			endif;

			bassist_parallax('2');

			if ( $bassist_theme_options['hide_audio_section'] == 0 ):
				get_template_part('template-parts/section', 'audio');
			endif;

			bassist_parallax('3');

			if ( $bassist_theme_options['hide_video_section'] == 0 ):
				get_template_part('template-parts/section', 'video');
			endif;

			bassist_parallax('4');

			if ( $bassist_theme_options['hide_image_section'] == 0 ):
				get_template_part('template-parts/section', 'image');
			endif;

			get_template_part('template-parts/section', 'social');

			get_template_part('template-parts/section', 'contact-form');
		?>      
	</div><!--/main-content-->

<?php get_footer(); 

else:
	get_template_part('index');
endif;

