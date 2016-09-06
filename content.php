<?php
/**
 * @package Greenr
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
	
<?php 
	$featured_image = get_theme_mod( 'featured_image',true );
	if( $featured_image ) : ?>
		<div class="post-thumb blog-thumb">
		  <?php
			if( function_exists( 'greenr_featured_image' ) ) :
				greenr_featured_image();
	        endif;
		  ?>
	    </div>
	<?php endif; ?> 

	<?php do_action('greenr_before_entry_header'); ?>
 
		<div class="entry-body">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>
			<?php
				if ( get_theme_mod('enable_single_post_top_meta', true ) ): ?>
					<footer class="entry-meta">
						<?php if(function_exists('greenr_entry_top_meta') ) {
						    greenr_entry_top_meta(); 
						} ?> 
					</footer><!-- .entry-footer -->
				<?php endif;?> 
		</div>
	<?php do_action('greenr_after_entry_header'); ?> 
		
			<?php
				/* translators: %s: Name of current post */
				the_content();
			?>
		

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'greenr' ),
				'after'  => '</div>',
			) );
		?>
			<br class="clear" />
	</div><!-- .entry-content -->

	<?php do_action('greenr_before_entry_footer'); ?>
	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-meta">
			<?php if(function_exists('greenr_entry_bottom_meta') ) {
			     greenr_entry_bottom_meta();
			} ?>
		</footer><!-- .entry-footer -->
	<?php endif;?>
<?php do_action('greenr_after_entry_footer'); ?>
</article><!-- #post-## -->
