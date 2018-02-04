<?php
/**
 * Template part for displaying attachment
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php if ( is_sticky() ) : ?>
								<h2><i class="fa fa-thumb-tack" aria-hidden="true" title="<?php printf(__('Featured', 'bb10')) ; ?>"></i> <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
						<?php else : ?>
						<h2><i class="fa fa-paperclip" aria-hidden="true"></i> <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php endif; ?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						
					</header>
					
					<section class="hjylEntry">
						<?php if ( wp_attachment_is_image() ) :	?>
                        <div class="wp-caption alignnone">
						<?php
							$attachment_width = apply_filters( 'tanhaibonet_attachment_size', 560 );
							$attachment_height = apply_filters( 'tanhaibonet_attachment_height', 373 );
							echo wp_get_attachment_image( $post->ID, array( $attachment_width, $attachment_height ) );
                        ?>
						<p class="wp-caption-text"><?php echo $post->post_excerpt; ?></p>
						</div>

						<nav id="nav-single">
							<div class="nav-previous"><i class="fa fa-angle-double-left" aria-hidden="true"></i> <?php previous_image_link( false, __('Previous Image', 'bb10') ); ?></div>
							<div class="nav-next"><?php next_image_link( false, __('Next Image', 'bb10') ); ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
						</nav><!-- #nav-below -->

						<?php else : ?>
						<?php
						the_content();
						wp_link_pages( array( 'before' => '<nav class="page-link"><i class="fa fa-folder-open" aria-hidden="true"></i> <span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
						?>
						<?php endif; ?>
					</section>
					<div class="clear"></div>
					<footer>
						<?php if(is_single()) {the_tags('<p class="tags"><i class="fa fa-tags"></i> ', ', ', '</p>'); }; ?>
						<span class="fa fa-user author" title="<?php _e('Posted by', 'bb10'); ?>">
							<?php the_author_posts_link(); ?>
						</span>
						<span class="fa fa-flag cat-links" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php the_category(', '); ?>
						</span>
						<span class="fa fa-comments comments-views">
						<?php comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
						</span>

						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="fa fa-pencil-square-o edit-link"> ', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->