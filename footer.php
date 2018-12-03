<?php
/* 	Socialia Theme's Footer
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
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
<div id="creditline"><?php echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ); ?> <span class="credit">| Socialia Theme by: <a href="<?php echo esc_url('https://d5creation.com') ?>" target="_blank">D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a></span></div>
</div> <!-- footer container -->
</div> <!-- footer -->
<div class=" clear"> </div>
<?php wp_footer(); ?>
</body>
</html>