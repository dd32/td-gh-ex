<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Accesspress Mag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
            <?php echo $post_categories = get_the_category_list(); ?>
			<?php accesspress_mag_posted_on(); ?>
            <?php do_action('accesspress_mag_post_meta');?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
        <?php 
            if(has_post_thumbnail()){
                $image_id = get_post_thumbnail_id();
                $image_path = wp_get_attachment_image_src($image_id,'singlepost-style1',true);
                $image_alt = get_post_meta($image_id,'_wp_attachment_image_alt',true);
                echo '<div class="post_image"><img src="'.$image_path[0].'" alt="'.$image_alt.'" /></div>';
            }
        ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<div class="clearfix"> </div>
	<footer class="entry-footer">
		<?php accesspress_mag_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
