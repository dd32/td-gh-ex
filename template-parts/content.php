<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appsetter
 */
?>
	<div class="row">
		<div class="col-md-9">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-meta">
							<?php
							the_title( '<h1 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						?>				
							<?php appsetter_posted_on(); ?>
						</div><!-- .entry-meta -->
						<div class="entry-meta">						
				</div>
				<div class="entry-content postview-content">
						<?php the_post_thumbnail('appsetter-postview-large'); ?>
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'appsetter' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
						wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'appsetter' ),
						'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
				<div class="entry-meta">
					<?php appsetter_entry_listmeta(); ?>
					<?php the_post_navigation(); ?>
				</div>
			</article><!-- #post-## -->
			<?php 			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
		</div>
		<div class="col-md-3 ">
			<?php get_sidebar(); ?>
		</div>
	</div>