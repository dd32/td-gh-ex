<?php
/**
 * The template for displaying the posts with audio format in the front page.
 *
 * @package Bassist
 * @since Bassist 1.0
 */

$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
$audio_section_title = $bassist_theme_options['audio_section_title'];
?>

<section id="music" class="audio-format-section">
	<div class="inner">

<?php
	$args = array(  'posts_per_page' => 6,
					'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array(
								'post-format-audio',
							),
							'operator' => 'IN',
							),
						),
					);
	$query = new WP_Query($args);

		if ( $query->have_posts() ) :?>
			<h2 class="section-title"><?php printf( esc_html( $audio_section_title ) ) ?></h2>
			
			<div class="flex-container audio-posts">
			<?php
				// Start the Loop again.
				while ( $query->have_posts() ) : $query->the_post();
					/*
					* Include the post format-specific template for the content. If you want to
					* use this in a child theme, then include a file called called content-___.php
					* (where ___ is the post format) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
				wp_reset_postdata();
			?>
			</div> 
<?php 	elseif ( is_customize_preview() ):
			printf( '<h1>%1$s</h1><p>%2$s</p>',
					__('This is the audio section', 'bassist'),
					__('To fill up this section you have to create some posts, choose the format "audio" in Format and save. To put a picture before this section, use the parallax settings in the Customizer. To completely hide this section, choose "Hide Audio Section" in the Customizer.', 'bassist') );

		endif; ?>
	</div><!--/inner-->

</section><!--/audio-format-section-->

