<?php
/**
 * @package Catchbase
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php 
	/** 
	 * catchbase_before_entry_container hook
	 *
	 * @hooked catchbase_content_image - 10
	 */
	do_action( 'catchbase_before_entry_container' ); ?>

	<div class="entry-container">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
			
				<?php catchbase_posted_on(); ?>
			
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
				$options = catchbase_get_theme_options();

				if ( 'full-content' == $options['content_layout'] ) {
					the_content(); 
				}
				else {
					the_excerpt();
				}
			?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="pages">' . __( 'Pages:', 'catchbase' ) . '</span>',
					'after'  => '</div>',
					'link_before' 	=> '<span>',
                    'link_after'   	=> '</span>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-footer">
			<p class="entry-meta">
				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( ', ', 'catchbase' ) );
						//print_r(catchbase_categorized_blog());
						if ( $categories_list && catchbase_categorized_blog() ) :
					?>
					<span class="cat-links">
						<?php echo $categories_list; ?>
					</span>
					<?php endif; // End if categories ?>

					<?php
						/* translators: used between list items, there is a space after the comma */
						$tags_list = get_the_tag_list( '', __( ', ', 'catchbase' ) );
						if ( $tags_list ) :
					?>
					<span class="tags-links">
						<?php echo $tags_list; ?>
					</span>
					<?php endif; // End if $tags_list ?>
				<?php endif; // End if 'post' == get_post_type() ?>
			</p><!-- .entry-meta -->
		</footer><!-- .entry-footer -->
	</div><!-- .entry-container -->
</article><!-- #post-## -->
