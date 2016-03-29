<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AcmeThemes
 * @subpackage AcmePhoto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('init-animate fadeInDown animated'); ?>>
	<div class="single-feat clearfix">
		<?php
		$sidebar_layout = acmephoto_sidebar_selection();
		if( has_post_thumbnail() ):
			if( $sidebar_layout == "no-sidebar"){
				$thumbnail = 'full';
			}
			else{
				$thumbnail = 'large';
			}
			echo '<figure class="single-thumb single-thumb-full">';
			the_post_thumbnail( $thumbnail );
			echo "</figure>";
		endif;
		?>
	</div><!-- .single-feat-->
	<div class="content-wrapper">
		<header class="entry-header">
			<div class="entry-meta">
				<?php acmephoto_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<!--post thumbnal options-->
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acmephoto' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php acmephoto_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->

