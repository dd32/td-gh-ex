<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AcmeThemes
 * @subpackage AcmeBlog
 */
global $acmeblog_customizer_all_values;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php acmeblog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	if ( $acmeblog_customizer_all_values['acmeblog-blog-archive-layout'] == 'full-image') {
		?>
		<!--post thumbnal options-->
		<div class="post-thumb">
			<?php
			if( has_post_thumbnail() ):
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			else:
				$image_url[0] = get_template_directory_uri().'/assets/img/no-image-840-480.jpg';
			endif;
			?>
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
			</a>
		</div><!-- .post-thumb-->
		<?php
	}
	?>

	<div class="entry-summary entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php acmeblog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

