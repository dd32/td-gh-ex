				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php
						if ( is_sticky() ) {
						the_title( sprintf( '<h2 class="entry-title">%1$s <a href="%2$s" title="%3$s" rel="bookmark">', hjyl_get_svg( array( 'icon' => 'thumb-tack') ), esc_url( get_permalink()), esc_html(get_the_title()) ), '</a></h2>' );
						}else{
						the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" title="%2$s" rel="bookmark">', esc_url( get_permalink()), esc_html(get_the_title()) ), '</a></h2>' );
						}
						?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						
					</header>
					
					<section class="hjylEntry">
					<?php
						if(is_single()){
							the_content();
							wp_link_pages( array( 'before' => '<nav class="page-link">'.hjyl_get_svg( array( 'icon' => 'folder-open') ).'<span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) );
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
						<?php if(is_single()) {the_tags('<span class="tags">'.hjyl_get_svg( array( 'icon' => 'tags' ) ).'', ', ', '</span>'); } ?>
						<span class="author" title="<?php _e('Posted by', 'bb10'); ?>">
							<?php echo hjyl_get_svg( array( 'icon' => 'user' ) ); the_author_posts_link(); ?>
						</span>
						<span class="cat-links" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php echo hjyl_get_svg( array( 'icon' => 'bars' ) ); the_category(', '); ?>
						</span>
						<?php if(is_single()){ ?>
						<span class="last-updated" title="<?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?><?php the_modified_time('Y-m-j G:i:s'); ?><?php else : ?><?php the_time('Y-m-j G:i:s'); ?><?php endif; ?>">
						<?php echo hjyl_get_svg( array( 'icon' => 'time' ) ); echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))); ?>
							
						</span>
						<?php } ?>
						<span class="comments-views">
						<?php echo hjyl_get_svg( array( 'icon' => 'comment' ) ); comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
						</span>
						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">'.hjyl_get_svg( array( 'icon' => 'edit' ) ).'', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->