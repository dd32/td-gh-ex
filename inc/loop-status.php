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
						<div class="status-avatar"><?php echo get_avatar(get_the_author_email(), '48');?></div>
						<div class="status-date">
							<span class="fa fa-at author" title="<?php _e('Posted by', 'bb10'); ?>">
								<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_author(); ?></a>
							</span>
							<span class="status-day" title="<?php printf(__('Last Updated %s', 'bb10'),timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s')))); ?>"><?php the_time( __('Y-m-d H:i:s', 'bb10')); ?></span>
						<?php
							the_content();
							wp_link_pages( array( 'before' => '<nav class="page-link"><i class="fa fa-folder-open" aria-hidden="true"></i> <span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
						?>
						</div>
					</section>
					<div class="clear"></div>
					<footer class="status-footer">
						<?php if(is_single()) {the_tags('<p class="tags"><i class="fa fa-tags"></i> ', ', ', '</p>'); }; ?>
						<span class="fa fa-flag cat-links" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php the_category(', '); ?>
						</span>
						<span class="fa fa-comments comments-views">
						<?php comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
						</span>

						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="fa fa-pencil-square-o edit-link"> ', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->