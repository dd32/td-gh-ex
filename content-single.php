<?php
/**
 * @package AccessPress Root
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
	<?php 
    $show_img = of_get_option('featured_image',1);
    if($show_img){
	 ?>
		<?php if(has_post_thumbnail()): ?>
			<div class="post-thumbnail">
			<?php the_post_thumbnail('accesspress-root-blog-big-thumbnail'); ?>
			</div>
		<?php endif; ?>
	<?php } ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-root' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
