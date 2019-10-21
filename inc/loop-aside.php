<?php
/**
 * Template part for displaying posts
 *
 */

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<div class="aside-date">
							<?php echo hjyl_get_svg( array( 'icon' => 'qzone' ) ); ?>
							<a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark">
							<span class="aside-day" title="<?php printf(__('%s published', 'bb10'),timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s')))); ?>"><?php the_time( __('l Y-m-d', 'bb10')); ?></span>
							</a>
							<span class="comments-views">
							<?php echo hjyl_get_svg( array( 'icon' => 'comment' ) ); comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
							</span>
							<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">'.hjyl_get_svg( array( 'icon' => 'edit' ) ).'', '</span>' ); ?>
						</div>
						<?php if(is_single()){ ?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						<?php } ?>
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
						<?php if(is_single()) {the_tags('<p class="tags">'.hjyl_get_svg( array( 'icon' => 'tags' ) ).'', ', ', '</p>'); } ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->