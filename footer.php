<?php
/*
 * The footer for displaying footer widgets and site-info.
 */
?>

<div id="footer">
	
	<div class="footer-right"> 

		<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer-right' ); ?>

		<?php else : ?> 
		<?php endif; ?> 
	</div>

	<div class="footer-left"> 

		<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
	
		<?php dynamic_sidebar( 'footer-left' ); ?>

		<?php else : ?> 
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