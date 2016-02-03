<footer id="footer-style-1">
	<div class="container">
		<?php if (is_active_sidebar('footer-widget')) {
		dynamic_sidebar('footer-widget');
		} else {
			$args = array(
				'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><div class="widget">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="title"><h3>',
				'after_title' => '</h3></div>',
			);
			the_widget('WP_Widget_Calendar', null, $args);
			the_widget('WP_Widget_Archives', null, $args);
			the_widget('WP_Widget_Meta', null, $args);
			the_widget('WP_Widget_Tag_Cloud', null, $args);
		} ?>
	</div><!-- end container -->
</footer><!-- end #footer-style-1 -->    

<div id="copyrights">
	<div class="container">
		<div class="col-lg-5 col-md-6 col-sm-12">
			<div class="copyright-text">
				<p>Copyright @ 2014 - Designed by Jolly Themes</p>
			</div><!-- end copyright-text -->
		</div><!-- end widget -->
		<div class="col-lg-7 col-md-6 col-sm-12 clearfix">
			<div class="footer-menu">
				<?php wp_nav_menu(array(
                        'theme_location' => 'secondary',
                        'container' => false,
                        'menu_class' => 'menu',
                ) ); ?>
			</div>
		</div><!-- end large-7 --> 
	</div><!-- end container -->
</div><!-- end copyrights -->

<div class="dmtop">Scroll to Top</div>
<?php wp_footer(); ?>
</body>
</html>