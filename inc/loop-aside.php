<?php
/**
 * Template part for displaying posts
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<div class="aside-date">
							<i class="fa fa-twitter" aria-hidden="true"></i>
							<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark">
							<span class="aside-day" title="<?php printf(__('%s published', 'bb10'),timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s')))); ?>"><?php the_time( __('l Y-m-d', 'bb10')); ?></span>
							</a>
							<span class="comments-views">
							<?php comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1 Comment</b>', 'bb10' ), __( '<b>% Comments</b>', 'bb10' ) ); ?>
							</span>
						</div>
					</header>
					
					<section class="hjylEntry">
					<?php
						if(is_single()){
							the_content();
							wp_link_pages( array( 'before' => '<nav class="page-link"><i class="fa fa-folder-open" aria-hidden="true"></i> <span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
						}else{
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( '70x50-right-top' );
							}
						echo wp_trim_words( get_the_content(), 100, '......' );
						}
					?>
					</section>
					<div class="clear"></div>
					<footer>
						<?php if(is_single()) {the_tags('<p class="tags"><i class="fa fa-tags"></i> ', ', ', '</p>'); } ?>
						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="fa fa-pencil-square-o edit-link"> ','</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->