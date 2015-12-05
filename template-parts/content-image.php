<?php
/**
 * The template part for displaying image attachment page.
 *
 * @package aesblo
 * @since 1.0.0
 */
 ?>
 <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
 	<header class="entry-header">
		<?php aesblo_entry_header(); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content clearfix">
        <figure class="entry-attachment wp-caption">
            <?php
                // Filter the default Twenty Fifteen image attachment size.
                $image_size = apply_filters( 'aesblo_attachment_size', 'large' );
                echo wp_get_attachment_image( get_the_ID(), $image_size );
            ?>
            
            <?php if ( has_excerpt() ) : ?>
                <figcaption class="entry-caption wp-caption-text">
                    <?php the_excerpt(); ?>
                </figcaption><!-- .entry-caption -->
            <?php endif; ?>
        </figure><!-- .entry-attachment -->		
		
		<?php 
			the_content();
			aesblo_link_pages(); 
		?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php aesblo_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->