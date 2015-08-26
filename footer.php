<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
global $avis_shortname, $avis_themename;
$avis_facebook  = esc_url( get_theme_mod('avis_fb_url', '#') );
$avis_flickr    = esc_url( get_theme_mod('avis_fl_url', '#') );
$avis_linkedin  = esc_url( get_theme_mod('avis_lin_url', '#') );
$avis_gpluseone = esc_url( get_theme_mod('avis_gplus_url', '#') );
$avis_twitter   = esc_url( get_theme_mod('avis_tw_url', '#') );
?>
	<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer" class="avis-section">
	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php if( is_active_sidebar('Footer Sidebar') ) { ?>	
					<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<?php } else { ?>
					<div class="avis-footer-container span3 avis-container widget_archive">
						<h3 class="avis-title avis-footer-title"><?php _e('Archives','avis'); ?></h3>
						<ul>
							<?php wp_get_archives(array( 'limit' => 5 )); ?>
						</ul>
					</div>
					<div class="avis-footer-container span3 avis-container widget_archive">
						<h3 class="avis-title avis-footer-title"><?php _e('Popular Post','avis'); ?></h3>
						<ul>
							<?php wp_get_archives(array( 'limit' => 5 )); ?>
						</ul>
					</div>
					<div class="avis-footer-container span3 avis-container widget_search widget_tag_cloud">
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
						<h3 class="avis-title avis-footer-title"><?php _e('More Links','avis'); ?></h3>
						<div class="menu-footer-menu-container">
							<ul id="menu-footer-menu" class="menu">
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
					<div class="avis-footer-container span3 avis-container widget_recent_entries">
						<h3 class="avis-title avis-footer-title"><?php _e('Top Categories','avis'); ?></h3>
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
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php $sktURL = 'http://www.sketchthemes.com/'; ?>
				<div class="copyright span6 alpha omega"> <?php echo wp_kses_post(get_theme_mod('avis_copyright','Copyright &copy; Powered by WordPress')); ?><p><?php if(isset($avis_themename)){ echo $avis_themename; } _e(' By','avis'); ?> <a href="<?php echo $sktURL; ?>" title="Sketch Themes"><?php _e('SketchThemes','avis'); ?></a></p></div>
				<div class="owner span6 alpha omega">
					<!-- Footer Follow Us Section Start -->
						<div class="social-icons">
							<?php if($avis_facebook){?><li class="fb-icon"><a href="<?php echo esc_url($avis_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
							<?php if($avis_flickr){?><li class="flickr-icon"><a href="<?php echo esc_url($avis_flickr); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li><?php } ?>							
							<?php if($avis_linkedin){?><li class="linkedin-icon"><a href="<?php echo esc_url($avis_linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
							<?php if($avis_gpluseone){?><li class="gplus-icon"><a href="<?php echo esc_url($avis_gpluseone); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
							<?php if($avis_twitter){?><li class="tw-icon"><a href="<?php echo esc_url($avis_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
						</div>
					<!-- Footer Follow Us Section End -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper --> 
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="Back To Top" id="backtop"></a>
	<?php wp_footer(); ?>	
</body>
</html>