<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("row blog__post--lb-2");?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
<div class="col-md-12">
<div class="row">
	<header class="col-md-3 col-sm-3 entry-header entry-header--lb-2">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" class="element-title" rel="bookmark" itemprop="name">',
				esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	</header><!-- .entry-header -->

	<div class="col-md-4 col-sm-4 excerpt--lb-2" itemprop="description">
	<?php bellini_published_on(); ?>
		<?php the_excerpt( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bellini' ),
				array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		?>
	</div>
	<div class="col-md-5 col-sm-5 featured-image--lb-2">
		<?php echo bellini_post_thumbnail();?>
	</div>
</div>
</div>
</article><!-- #post-## -->

