<?php
/**
 * The template for displaying articles in the slideshow loop
 *
 * @package Beetle
 */
?>

	<li id="slide-<?php the_ID(); ?>" class="zeeslide clearfix">

		<?php // Display Post Thumbnail or default thumbnail
		if( '' != get_the_post_thumbnail() ) :

			the_post_thumbnail('beetle-header-image', array('class' => 'slide-image'));

		else: ?>

			<img src="<?php echo get_template_directory_uri(); ?>/images/default-slider-image.png" class="slide-image default-slide-image wp-post-image" alt="default-image" />

		<?php endif;?>
	
		<div class="slide-post clearfix">
		
			<div class="slide-content container clearfix">

				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
				
				<?php beetle_entry_meta(); ?>
			
			</div>
						
		</div>

	</li>