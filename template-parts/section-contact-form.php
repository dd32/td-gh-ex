<?php
/**
 * The template for displaying the contact section at the end of the front page.
 *
 * @package Bassist
 * @since Bassist 1.0
 */
$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
$contact_page = $bassist_theme_options['contact_page_slug'];
?>

<section id="contact" class="contact-section">
	<div class="inner">

<?php
	$contact = new WP_Query( array( 'pagename' => $contact_page ) );   

	if ($contact->have_posts()) :
		while ( $contact->have_posts() ): $contact->the_post(); ?>
		<h2 class="section-title"><?php the_title(); ?></h2>
		<div class="entry-content">
		   <?php the_content();
		endwhile;
		wp_reset_postdata();
	elseif ( is_customize_preview() ):
		printf( '<h1>%1$s</h1><p>%2$s</p>',
				__('This is the contact section', 'bassist'),
				__('To fill up this section, create a page with the title "Contact", "Contact me" or something similar and write the shortcode of your preferred contact plugin in the content of the page. You can also add some text before the shortcode. Go to Contact Section Settings in the Customizer and write the slug of the page. This section can have a background picture.', 'bassist') );
	endif;
?>   
	</div>

</section><!--/contact-section-->

