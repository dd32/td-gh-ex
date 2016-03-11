<?php
/**
 * The template used for displaying testimonials.
 *
 * @package Sela
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'cols cols-2' ); ?>>
		<div class="entry-content">
			<i class="fa fa-quote-left"></i>
			<?php if ( is_front_page() ) the_excerpt(); else the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'abacus' ) ); ?>
		</div>

		<header class="entry-header">
			<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<div class="testimonial-thumbnail">
				<?php the_post_thumbnail( 'abacus-testimonial-thumbnail', array( 'class' => 'img-circle' ) ); ?>
			</div>
			<?php endif; ?>

			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		</header>
	</article><!-- #post-## -->
