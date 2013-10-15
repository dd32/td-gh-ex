<?php
/*
 * The footer for displaying secondary menu and site-info.
 */
?>

<div id="footer">
	
	<div class="footer-right"> 

		<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer-right' ); ?>

		<?php else : ?> 
			
		<h4 class="widgettitle"><?php _e( 'Search', 'shipyard' ); ?></h4>
			<div id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</div>

		<?php endif; ?> 
	</div>


	<div class="footer-left"> 

		<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer-left' ); ?>

		<?php else : ?> 
			
		<h4 class="widgettitle"><?php _e( 'Recent Posts', 'shipyard' ); ?></h4>
			<div id="recent-posts" class="widget-container widget_recent_entries">
				 <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
			</div>

		<?php endif; ?> 
	</div>


	<div class="site-info">
		Copyright &copy; <?php echo date('Y'); ?>  <a href="<?php echo home_url() ; ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <a href="http://wordpress.org" title="WordPress Blog Platform">Proudly powered by WordPress</a>
	</div>

</div>
</div><!-- #container -->

<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>
</body>
</html>