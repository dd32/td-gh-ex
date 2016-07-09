<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?> itemscope itemtype="http://schema.org/Article">
<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_site_url(); ?>"/>
<div class="container--card-content clearfix">
<div class="col-xs-12 text-right"><?php bellini_edit_content(); ?></div>
<header class="single-post__header--l3 col-xs-12">
	<?php bellini_category(); ?>
	<div class="single-post__title--l3 col-xs-12">
	<?php the_title( '<h1 class="element-title element-title--post single-post__title--l3" itemprop="name headline">', '</h1>' ); ?>

	<?php if(get_option('bellini_show_post_meta', true) == true):
		bellini_post_author();
		bellini_published_on();
	endif; ?>

	</div>
    <!-- Featured Image -->
	<?php bellini_single_post_thumbnail();?>

</header>
<?php
	if ( has_excerpt( $post->ID ) ):?>
		<div itemprop="description" class="single-post__excerpt--l3 col-xs-12 text-center">
			<?php echo get_the_excerpt();?>
		</div>
<?php endif;?>
<div class="single-post__body--l3 col-xs-12" itemprop="articleBody">
	<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bellini' ),
				'after'  => '</div>',
			) );
		?>
</div><!-- .entry-content -->
<footer class="single-post__footer--l3 col-xs-12">
	<?php bellini_post_tag(); ?>
</footer><!-- .entry-footer -->
</div>
</article><!-- #post-## -->