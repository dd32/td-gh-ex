<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12');?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost" >
<div class="container--card-content">
    <div class="single post-meta">
        <?php bellini_category(); ?>
        <?php bellini_published_on(); ?>
        <?php bellini_comment_count();?>
        <?php bellini_edit_content(); ?>
    </div>

    <!-- Featured Image -->
	<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('full', array('class' => 'img-responsive single-post__featured-image', 'itemprop' => 'image'));
	}?>

	<header class="single-post__header">
		<?php the_title( '<h1 class="element-title element-title--post single-post__title" itemprop="headline">', '</h1>' ); ?>

	<?php
		if ( has_excerpt( $post->ID ) ) {
			echo '<div itemprop="description" class="single-post__excerpt">';
			echo get_the_excerpt();
			echo '</div>';
		}
	?>
	<?php bellini_post_author(); ?>

	</header><!-- .entry-header -->

	<div class="single-post__body" itemprop="text">
		<?php the_content(); ?>


		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bellini' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer>
	<?php bellini_post_tag(); ?>
	</footer><!-- .entry-footer -->
</div>
</article><!-- #post-## -->


