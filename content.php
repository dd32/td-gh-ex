<?php
/**
 * @package Aileron
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta entry-meta-header">
		<ul>
			<li><i class="fa fa-user"></i> <?php aileron_posted_by(); ?></li>
			<li><i class="fa fa-clock-o"></i> <?php aileron_posted_on(); ?></li>
			<li><i class="fa fa-folder-o"></i> <?php aileron_first_category(); ?></li>
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<li><i class="fa fa-thumb-tack"></i> <span class="entry-featured"><?php esc_html_e( 'Featured', 'aileron' ); ?></span></li>
			<?php endif; ?>
		</ul>
	</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php aileron_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<div class="more-link-wrapper">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link"><?php esc_html_e( 'Read More', 'aileron' ); ?></a>
	</div><!-- .more-link-wrapper -->

</article><!-- #post-## -->