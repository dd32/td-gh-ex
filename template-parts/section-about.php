<?php
/**
 * The template for displaying the about section at the beginning of the front page.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
$about_page = $bassist_theme_options['about_page'];
?>

<section id="about" class="about-section">
<div class="skewed-separator"></div>
			
	<div class="inner">
<?php
   $about = new WP_Query( array( 'page_id' => $about_page ) );   

	if ($about->have_posts()) :
		while ( $about->have_posts() ): $about->the_post(); ?>
			<h2 class="section-title"><?php the_title(); ?></h2>
			<div class="entry-content">
			   <?php the_content(); ?>
			</div>
<?php 	endwhile;
		wp_reset_postdata();
	elseif ( is_customize_preview() ):
		printf( '<h1>%1$s</h1><p>%2$s</p>',
				__('This is the about section', 'bassist'),
				__('To fill up this section, create a page with the title "About", "About me" or something similar and write the slug of the page in the Customizer. To put a picture before this section, use the parallax settings in the Customizer. To completely hide this section, choose "Hide About Section" in the Customizer.', 'bassist') );
	endif;
?>

	</div><!--/inner-->

</section><!--/about-section-->
