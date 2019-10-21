<?php
/**
 * Template part for displaying attachment
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php
						the_title( sprintf( '<h2 class="entry-title">%1$s <a href="%2$s" title="%3$s" rel="bookmark">', hjyl_get_svg( array( 'icon' => 'attachment') ), esc_url( get_permalink()), esc_html(get_the_title()) ), '</a></h2>' );
						?>
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
							<div class="nav-previous"><?php echo hjyl_get_svg( array( 'icon' => 'arrow-dleft' ) ); previous_image_link( false, __('Previous Image', 'bb10') ); ?></div>
							<div class="nav-next"><?php next_image_link( false, __('Next Image', 'bb10') ); echo hjyl_get_svg( array( 'icon' => 'arrow-dright' ) );?></div>
						</nav><!-- #nav-below -->

						<?php else : ?>
						<?php
						the_content();
						wp_link_pages( array( 'before' => '<nav class="page-link">'.hjyl_get_svg( array( 'icon' => 'folder-open') ).'<span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
						?>
						<?php endif; ?>
					</section>
					<div class="clear"></div>
					<footer>
						<?php if(is_single()) {the_tags('<p class="tags">'.hjyl_get_svg( array( 'icon' => 'tags' ) ).'', ', ', '</p>'); }; ?>
						<span class="author" title="<?php _e('Posted by', 'bb10'); ?>">
							<?php echo hjyl_get_svg( array( 'icon' => 'user' ) ); the_author_posts_link(); ?>
						</span>
						<span class="cat-links" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php echo hjyl_get_svg( array( 'icon' => 'bars' ) ); the_category(', '); ?>
						</span>
						<span class="comments-views">
						<?php echo hjyl_get_svg( array( 'icon' => 'comment' ) ); comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
						</span>

						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">'.hjyl_get_svg( array( 'icon' => 'edit' ) ).'', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->