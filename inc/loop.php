				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php if ( is_sticky() ) : ?>
								<h2><i class="fa fa-thumb-tack" aria-hidden="true" title="<?php printf(__('Featured', 'bb10')) ; ?>"></i> <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
						<?php else : ?>
						<h2><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php endif; ?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						
					</header>
					
					<section class="hjylEntry">
					<?php
						if(is_single()){
							the_content();
							wp_link_pages( array( 'before' => '<nav class="page-link"><span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
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
						<span class="fa fa-user author" title="<?php _e('Posted by', 'bb10'); ?>">
							<?php the_author_posts_link(); ?>
						</span>
						<span class="fa fa-flag cat-links" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php the_category(', '); ?>
						</span>
						<?php if(is_single()){ ?>
						<span class="fa fa-clock-o last-updated" title="<?php printf(__('Last Updated %s', 'bb10'),timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s')))); ?>">
							<?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?><?php the_modified_time('Y-m-j G:i:s'); ?><?php else : ?><?php the_time('Y-m-j G:i:s'); ?><?php endif; ?>
						</span>
						<?php } ?>
						<span class="fa fa-comments comments-views">
						<?php comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
						</span>
						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="fa fa-pencil-square-o edit-link"> ', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->