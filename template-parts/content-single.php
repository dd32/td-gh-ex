<?php
/**
 * Template part for displaying single posts.
 *
 * @package Aglee Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php $meta_data = get_theme_mod('aglee_post_meta_data_enable',1);
		if($meta_data){ ?>
		<div class="entry-meta">
			<?php aglee_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php } ?>
	</header><!-- .entry-header -->
    <?php $img_show = get_theme_mod('aglee_post_feat_img_enable',1);
    if($img_show){ ?>
    <?php if(has_post_thumbnail()){
        ?>
    <div class="post_img">
        <?php the_post_thumbnail('aglee-lite-home-slider');?>
    </div>
    <?php } } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aglee-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //aglee_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

