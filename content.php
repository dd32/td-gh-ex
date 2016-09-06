<?php
/**
 * @package BOXY
 */
global $boxy;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
<?php 
	    $featured_image = get_theme_mod( 'featured_image',true );
	    $featured_image_size = get_theme_mod ('featured_image_size','1');
		if( $featured_image ) : 
		       if( function_exists( 'boxy_featured_image' ) ) :
				boxy_featured_image();
	        endif;
		endif; ?>  
		
		<div class="entry-body">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>			  
	           <?php endif; ?>
	<?php if ( get_theme_mod('enable_single_post_top_meta',true ) ): ?>
		    <div class="entry-meta ">
		    <?php if(function_exists('boxy_entry_top_meta') ) {
		         boxy_entry_top_meta();
		     } ?>
			</div><!-- .entry-meta -->
	<?php endif; ?>
			<?php the_content(); ?>
       </div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'boxy' ),
				'after'  => '</div>',
			) );
		?>
		
	</div><!-- .entry-content -->

	<?php do_action('boxy_before_entry_footer'); ?>
	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-footer entry-meta ">
			<?php if(function_exists('boxy_entry_bottom_meta') ) {
			     boxy_entry_bottom_meta();
			} ?>
		</footer><!-- .entry-footer -->
	<?php endif;?>
<?php do_action('boxy_after_entry_footer'); ?>
</article><!-- #post-## -->