<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bestblog
 */

?>

	<article class=" post-wrap-layout-1 <?php if ( !is_active_sidebar( 'right-sidebar' ) ) : ?> cell  large-6 medium-6 small-12<?php endif;?>">
		<div class="grid-x grid-padding-x grid-padding-y ">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="large-5 medium-5 small-12 align-self-middle">
				<div class="post-thumb-warp">
					<div class="post-thumb">
						<?php the_post_thumbnail( 'bestblogtop-medium',array('class' => 'object-fit-images')  ); ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="large-auto medium-auto small-12 cell align-self-middle ">
			<div class="post-body-warp">
				<div class="post-header-warp">
				<div class="entry-category">
					<div class="meta-info meta-info-cat is-font-size-6">
						<?php bestblog_category_list(); ?>
					</div>
				</div>
					<?php the_title( sprintf( '<h3 class="post-title is-font-size-3"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
					<div class="entry-category">
							<?php echo bestblog_time_link(); ?>
					</div>
				</div>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
			</div>
		</div>
	</div>
	</article>
