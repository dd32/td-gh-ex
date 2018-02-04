<?php
/**
 * Template part for displaying gallery
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
					<?php if(is_single() && '' !== get_the_title()) { ?>
						<?php if ( is_sticky() ) : ?>
								<h2><i class="fa fa-thumb-tack" aria-hidden="true" title="<?php printf(__('Featured', 'bb10')) ; ?>"></i> <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
						<?php else : ?>
						<h2><i class="fa fa-picture-o" aria-hidden="true"></i> <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php endif; } ?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						
					</header>
					
					<section class="hjylEntry">
		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the gallery.
			if ( get_post_gallery() ) {
				echo '<div id="bb10-gallery">';
					echo get_post_gallery();
				echo '</div>';
			};

		};

		if ( is_single() || ! get_post_gallery() ) {
			the_content();
			wp_link_pages( array( 'before' => '<nav class="page-link"><i class="fa fa-folder-open" aria-hidden="true"></i> <span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );

		};
		?>
					</section>
					<div class="clear"></div>
					<footer>
						<?php if(is_single()) {the_tags('<p class="tags"><i class="fa fa-tags"></i> ', ', ', '</p>'); }; ?>
						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="fa fa-pencil-square-o edit-link"> ', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->