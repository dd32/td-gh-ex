		
			<div class="clear"></div>
			
			<section id="footersidebar" class="footersidebar">
				<div class="container">
				<?php get_sidebar('footer'); ?>
				</div>
			</section>
			
			<footer id="footer" class="footer">
				<div class="container">
					<div id="footermenu" class="footermenu">
						<?php wp_nav_menu(array('menu_class' => 'menu-footer', 'theme_location' => 'footer_menu', 'depth' => '1', 'fallback_cb' => false)); ?>
					</div>
					&copy; <?php bloginfo('name'); ?> <?php echo date("Y"); ?><?php if(cpotheme_get_option('cpo_general_credit') == 1) echo '. '.__('Theme designed by <a href="http://www.cpothemes.com">CPOThemes</a>.', 'cpotheme'); ?>
				</div>
			</footer>
			<div class="clear"></div>
		</div><!-- wrapper -->
		<a id="toplink" class="toplink skip-to" href="#top"><div class="icon-chevron-up"></div></a>
	</div><!-- outer -->
	<?php wp_footer(); ?>
</body>
</html>
