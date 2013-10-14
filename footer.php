<?php
/*
 * The footer for displaying secondary menu and site-info.
 */
?>

<div id="footer">
	
	<div class="footer-right"> 

		<?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer_right' ); ?>

		<?php else : ?> 
			
		<h4 class="widgettitle"><?php _e( 'Search', 'guido' ); ?></h4>
			<div id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</div>

		<?php endif; ?> 
	</div>


	<div class="footer-left"> 

		<?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer_left' ); ?>

		<?php else : ?> 
			
		<h4 class="widgettitle"><?php _e( 'Recent Posts', 'guido' ); ?></h4>
			<div id="recent-posts" class="widget-container widget_recent_entries">
				 <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
			</div>

		<?php endif; ?> 
	</div>


	<div class="site-info">
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'guido' ) ); ?>" title="<?php esc_attr_e( 'WordPress Blog Platform', 'guido' ); ?>"><?php printf( __( 'Proudly powered by %s', 'guido' ), 'WordPress' ); ?></a>
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