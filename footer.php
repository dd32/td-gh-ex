<?php
/* Easy Theme's Footer
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/
?>

<div id="footer">
	<div id="footer-content"><?php get_sidebar( 'footer' ); ?></div>
</div> <!-- footer -->
</div><!-- container -->
<div id="footermenu"><?php if ( has_nav_menu( 'footer-menu' ) ) {  wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'f-menu' )); } ?></div>
<div id="creditline"><?php echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ); ?> <span class="credit">| Easy Theme by: <a href="<?php echo esc_url('https://d5creation.com'); ?>" target="_blank">D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a></span></div>
</div><!-- con-container -->
</div><!-- site-container --> 
<?php wp_footer(); ?>
</body>
</html>