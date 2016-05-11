<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package App_Landing_Page
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; ?>
 		<?php ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'app-landing-page-with-sidebar' ) : the_post_thumbnail( 'app-landing-page-without-sidebar' ) ; ?>
    <?php echo ( !is_single() ) ? '</a>' : '</div>' ;?>
	<div class="text-holder">
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php app_landing_page_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'app-landing-page' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'app-landing-page' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if( !is_single() ){ ?>
	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="btn-readmore"><?php esc_html_e( 'Read More', 'app-landing-page' ); ?></a>
		<?php app_landing_page_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    <?php }?>
	</div>
</article><!-- #post-## -->