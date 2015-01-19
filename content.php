<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="archive-post-wrap">
		<?php 
		/** 
		 * gridalicious_before_entry_container hook
		 *
		 * @hooked gridalicious_archive_content_image - 10
		 */
		do_action( 'gridalicious_before_entry_container' ); ?>

		<div class="entry-container">
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

				<?php if ( 'post' == get_post_type() ) : ?>
				
					<?php gridalicious_entry_meta(); ?>
				
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php 
			
			if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php else : ?>
			
			<div class="entry-content">
				<?php 
					$options = gridalicious_get_theme_options();

					if ( 'full-content' == $options['content_layout'] ) {
						the_content(); 
					}
					else {
						the_excerpt();
					}
				?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links"><span class="pages">' . __( 'Pages:', 'gridalicious' ) . '</span>',
						'after'  => '</div>',
						'link_before' 	=> '<span>',
	                    'link_after'   	=> '</span>',
					) );
				?>
			</div><!-- .entry-content -->
			<?php endif; ?>

			<footer class="entry-footer">
				<?php gridalicious_tag_category(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- .entry-container -->
	</div><!-- .archive-post-wrap -->
</article><!-- #post -->
