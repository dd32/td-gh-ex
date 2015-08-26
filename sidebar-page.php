<?php
/**
 * The sidebar containing the secondary widget area, displays on pages.
 * If no active widgets in this sidebar, it will be hidden completely.
 */	
?>

<div id="sidebar_2" class="avis_widget">
	<ul class="skeside">
		<?php if ( is_active_sidebar('Page Sidebar') ) { ?>
			<?php dynamic_sidebar( 'Page Sidebar' ); ?>
		<?php } else { ?>
			<div class="avis-container widget_archive">
				<h3 class="avis-title"><?php _e('Archives','avis'); ?></h3>
				<ul>
					<?php wp_get_archives(array( 'limit' => 5 )); ?>
				</ul>
			</div>
			<div class="avis-container widget_archive">
				<h3 class="avis-title"><?php _e('Popular Post','avis'); ?></h3>
				<ul>
					<?php wp_get_archives(array( 'limit' => 5 )); ?>
				</ul>
			</div>
			<div class="avis-container widget_search widget_tag_cloud">
				<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
					<div class="searchleft">
						<input type="text" value="" placeholder="Search" name="s" id="searchbox" class="searchinput">
					</div>
					<div class="searchright">
						<input type="submit" class="submitbutton" value=""><i class="fa fa-search"></i>
					</div>
					<div class="clearfix"></div>
				</form>
				<br/>
				<h3 class="avis-title"><?php _e('More Links','avis'); ?></h3>
				<div class="menu-container">
					<ul class="menu">
						<?php wp_tag_cloud( array('number' => 7) );  ?>
					</ul>
				</div>
			</div>
			<?php
			/**
			* Filter the arguments for the Recent Posts widget.
			*
			* @since 3.4.0
			*
			* @see WP_Query::get_posts()
			*
			* @param array $args An array of arguments used to retrieve the recent posts.
			*/
			$r = new WP_Query( apply_filters( 'widget_posts_args', array('posts_per_page'=>5, 'no_found_rows'=>true, 'post_status'=>'publish', 'ignore_sticky_posts'=>true ) ) );

			if ($r->have_posts()) :
			?>
			<div class="avis-container widget_recent_entries">
				<h3 class="avis-title"><?php _e('Top Categories','avis'); ?></h3>
				<ul>
					<?php while ( $r->have_posts() ) : $r->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
			endif;
			?>
		<?php } ?>
	</ul>
</div>
<!-- #sidebar_2 .avis_widget -->