<?php
/* 	SunRain Theme's Footer
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SunRain 1.0
*/
?>

</div><!-- container -->
<?php do_action('d5theme_before_footer'); ?>
<div id="footer">
<div id="social">
<?php
if (sunrain_get_option('fb-link', '#') ): echo '<a href="'.esc_url(sunrain_get_option('fb-link', '#')).'" class="fb-link" target="_blank"></a>'; endif;
if (sunrain_get_option('tw-link', '#') ): echo '<a href="'.esc_url(sunrain_get_option('tw-link', '#')).'" class="tw-link" target="_blank"></a>'; endif;
if (sunrain_get_option('yt-link', '#') ): echo '<a href="'.esc_url(sunrain_get_option('yt-link', '#')).'" class="yt-link" target="_blank"></a>'; endif;
if (sunrain_get_option('gplus-link', '#') ): echo '<a href="'.esc_url(sunrain_get_option('gplus-link', '#')).'" class="gplus-link" target="_blank"></a>'; endif;
if (sunrain_get_option('picassa-link', '#') ): echo '<a href="'.esc_url(sunrain_get_option('picassa-link', '#')).'" class="picassa-link" target="_blank"></a>'; endif;
if (sunrain_get_option('li-link', '#') ): echo '<a href="'.esc_url(sunrain_get_option('li-link', '#')).'" class="li-link" target="_blank"></a>'; endif;
if (sunrain_get_option('feed-link', '#') ): echo '<a href="'.esc_url(sunrain_get_option('feed-link', '#')).'" class="feed-link" target="_blank"></a>'; endif;
	
?>	
</div>
<div id="footer-content"><?php get_sidebar( 'footer' ); ?></div>
<div id="creditline"><?php echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ) . '  '; sunrain_creditline(); ?></div>
<div id="topdirection"><a href="#">&uarr;</a></div>
</div> <!-- footer -->
<div class="clear"> </div>
<?php wp_footer(); ?>
</body>
</html>