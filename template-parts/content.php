<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AcmeThemes
 * @subpackage AcmePhoto
 */
global $acmephoto_customizer_all_values;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('init-animate fadeInDown animated'); ?>>
	<div class="content-wrapper">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php acmephoto_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
			endif; ?>
		</header><!-- .entry-header -->

		<?php
		if ( $acmephoto_customizer_all_values['acmephoto-blog-archive-layout'] == 'left-image' && has_post_thumbnail() ) {
			?>
			<!--post thumbnal options-->
			<div class="post-thumb">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</a>
			</div><!-- .post-thumb-->
			<?php
		}
		?>
		<div class="entry-content">
			<?php
			the_excerpt();
			?>
			<a class="read-more" href="<?php the_permalink(); ?> "><?php _e('Read More', 'acmephoto'); ?></a>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acmephoto' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<div class="clearfix"></div>
		<footer class="entry-footer">
			<?php acmephoto_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
