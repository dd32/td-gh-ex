<?php
/**
 * Template part for displaying status
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
					</header>
					
					<section class="hjylEntry">
						<div class="status-avatar"><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php echo get_avatar(get_the_author_meta('user_email'), '48');?></a></div>
						<div class="status-date">
							<span class="author" title="<?php _e('Posted by', 'bb10'); ?>">
								<?php echo hjyl_get_svg( array( 'icon' => 'user' ) ); the_author_posts_link(); ?>
							</span>
							<span class="status-day" title="<?php the_time( __('Y-m-d H:i:s', 'bb10')); ?>"><?php echo hjyl_get_svg( array( 'icon' => 'time' ) ); echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))); ?></span>
							<span class="comments-views">
							<?php echo hjyl_get_svg( array( 'icon' => 'comment' ) ); comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
							</span>
						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">'.hjyl_get_svg( array( 'icon' => 'edit' ) ).'', '</span>' ); ?>
						<?php
							the_content();
							wp_link_pages( array( 'before' => '<nav class="page-link">'.hjyl_get_svg( array( 'icon' => 'folder-open') ).'<span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
						?>
						</div>
					</section>
					<div class="clear"></div>
					<footer class="status-footer">
						<?php if(is_single()) { ?>
						<span class="cat-status" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php echo hjyl_get_svg( array( 'icon' => 'bars' ) ); the_category(', '); ?>
						</span>
						<?php the_tags('<span class="tags">'.hjyl_get_svg( array( 'icon' => 'tags' ) ).'', ', ', '</span>'); ?>
						<?php } ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->