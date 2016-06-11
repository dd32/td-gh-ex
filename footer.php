<?php $awada_theme_options = awada_theme_options();
$col = 12 / (int)$awada_theme_options['footer_layout']; ?>
<?php if ($awada_theme_options['site_layout'] == 'boxed') { ?>
</div><!-- end wrapper -->
<?php } ?>
<footer id="footer-style-1" <?php if ($awada_theme_options['site_layout'] == 'boxed') { ?> class="container" <?php } ?>>
	<div class="container">
		<?php if (is_active_sidebar('footer-widget')) {
		dynamic_sidebar('footer-widget');
		} else {
			$args = array(
				'before_widget' => '<div class="col-lg-' . $col . ' col-md-' . $col . ' col-sm-6 col-xs-12"><div class="widget">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="title"><h3>',
				'after_title' => '</h3></div>',
			);
			the_widget('awada_footer_contact_widget', null, $args);
			the_widget('awada_footer_recent_posts', null, $args);
			the_widget('WP_Widget_Tag_Cloud', null, $args);
            the_widget('WP_Widget_Meta', null, $args);
		} ?>
	</div><!-- end container -->
</footer><!-- end #footer-style-1 -->    

<div id="copyrights" <?php if ($awada_theme_options['site_layout'] == 'boxed') { ?> class="container" <?php } ?>>
	<div class="container">
		<?php if ($awada_theme_options['copyright_text_footer']==1) { ?>
		<div class="col-lg-5 col-md-6 col-sm-12">
			<div class="copyright-text">
				<p><?php echo esc_attr($awada_theme_options['footer_copyright'] . ' ' . $awada_theme_options['developed_by_text']); ?> <a href="<?php echo esc_url($awada_theme_options['developed_by_link']); ?>"><?php echo esc_attr($awada_theme_options['developed_by_link_text']); ?></a></p>
			</div><!-- end copyright-text -->
		</div><!-- end widget -->
		<?php } ?>
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
<?php if ($awada_theme_options['custom_css'] != '') { ?>
<style>
	<?php echo $awada_theme_options['custom_css']; ?>
</style>
<?php } ?>
<div class="dmtop">Scroll to Top</div>
<?php wp_footer(); ?>
</body>
</html>