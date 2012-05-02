<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @D5 Creation
 * @Modified on Twenty_Eleven
 
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				         
&copy; Copyright <script type="text/javascript">document.write(new Date().getFullYear())</script>: <?php bloginfo('name'); ?>, All Rights Reserved. &nbsp;

<strong>D5 Smartia</strong> Theme by: <a href="http://d5creation.com" target="_blank"><img  width="30px" src="<?php echo get_template_directory_uri(); ?>/images/d5logofooter.png" /> <strong>D5 Creation</strong></a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a> 
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>