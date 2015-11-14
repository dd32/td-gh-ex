<div  class="footergap ">
 <?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary','menu_id' => 'nava','depth'=>-1 ) ); ?>
	</nav>
	<?php endif; ?>

</div>

<footer>
		<div class="container">
        	
           <div id="topp"> <a href="#top"><div id="scrolltop"><div id="scrolltopi"><i class="fa fa-angle-double-up"></i></div></div></a></div>
            
           
            
			<p class="copyright"><?php if(get_theme_mod('copyright_text')): echo esc_attr( get_theme_mod( 'copyright_text' ) ); else: echo __('Copyright &#169; 2015 All Rights Reserved.', 'aripop');  endif;?></p>
            <p>
<?php _e('Powered by','aripop'); ?> <a href="<?php echo esc_url( 'http://wordpress.org' ); ?>" rel="nofollow"><?php _e('WordPress','aripop'); ?></a>. <?php _e('Theme by','aripop'); ?> <a href="<?php echo esc_url( 'http://arinio.com' ); ?>" rel="nofollow"><?php _e('Arinio','aripop'); ?></a>
                  </p>
		</div>
	</footer>

<!--end / footer-->
<?php wp_footer(); ?>







<!--++++++++++++++ Footer Section End +++++++++++++++++++++++++-->
 


</body></html>