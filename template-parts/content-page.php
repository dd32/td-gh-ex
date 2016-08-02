<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aquarella
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-element">
		<!-- Featured image -->
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-featured-image">
			<a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
				<?php the_post_thumbnail('aquarella_imgsize_1', array('class' => ''));?>
			</a>
		</div>	
		<div class="post-has-ct"></div>	
		<?php } ?>
		<!-- / Featured-image -->

		<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aquarella-lite' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'aquarella-lite' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	</div>	
</article><!-- #post-## -->
