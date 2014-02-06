<?php
/* 	Socialia Theme's Footer
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/
?>




</div> <!-- conttainer -->

<div id="footer">
<div id="footer-container">	

<?php
   	get_sidebar( 'footer' );
?>
<div id="creditline"><?php echo of_get_option('copyright', '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ) . ', All Rights Reserved'); ?> <span class="credit">| Socialia Theme by: <a href="http://d5creation.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/d5logofooter.png" /> D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a></span></div>
</div> <!-- footer container -->
</div> <!-- footer -->
<div class=" clear"> </div>
<?php wp_footer(); ?>
</body>
</html>