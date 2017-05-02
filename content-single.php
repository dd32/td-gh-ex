<?php
/**
 * @package BOXY
 */
global $boxy;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( get_theme_mod('enable_single_post_top_meta',true ) ): ?>
		    <div class="entry-meta">
		    <?php if(function_exists('boxy_entry_top_meta') ) {
		         boxy_entry_top_meta();
		     } ?>
			</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content">   
	
<?php
$single_featured_image = get_theme_mod( 'single_featured_image',true );
$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
if ($single_featured_image_size != 3 ) {
if ( $single_featured_image ) :
	 if ( $single_featured_image_size == 1 ) :?>
	 		<div class="post-thumb blog-thumb">
	 <?php  if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail('boxy-blog-large-width');  
			
			endif;?>
			</div><?php
		 else: ?>
		 	<div class="post-thumb blog-thumb"><?php
		 	if( has_post_thumbnail() && ! post_password_required() ) :   
					the_post_thumbnail('boxy-small-featured-image-width');		
			endif;?>
			</div><?php
	endif; 
endif;
} ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'boxy' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	

	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
	<footer class="entry-footer">
	<?php if(function_exists('boxy_entry_bottom_meta') ) {
		     boxy_entry_bottom_meta();
		} ?>
	</footer><!-- .entry-footer -->
<?php endif;?>
</article><!-- #post-## -->

	
