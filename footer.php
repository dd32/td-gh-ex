<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage JATheme
 * @since JATheme 1.0
 */
?>
</div><!--wrapper-->
<div class="clear"></div>
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
<p style="float:left;margin:10px 0 0 0;">Copyright &copy; 2014 <a href="<?php echo home_url(); ?>"><?php bloginfo('title'); ?></a>, All Rights Reserved</p>
			<p style="float:right;">Theme designed by <a href="http://jathemes.com" target="_blank" title="JATheme"><img src="http://jathemes.com/wp-content/uploads/2014/07/icon.png" />JATheme</a></p>		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    </div><!--main-->
<?php wp_footer(); ?>
</body>
</html>