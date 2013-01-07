<footer class="clearfix">
	<?php get_sidebar('footleft'); ?>
	<?php get_sidebar('footright'); ?>
	
	<div class="clear"></div>
	
	<?php wp_nav_menu(array('container_class' => 'footer-nav', 'theme_location' => 'bottom',  'menu_class' => 'botnav')); ?>
	<p class="aligncenter">&copy; <?php echo date ('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. <?php printf( __( 'Theme: %1$s by %2$s.', 'baris' ), 'Baris', '<a href="http://www.malvouz.com/omega/">Malvouz</a>' ); ?> Proudly powered by <a href="http://wordpress.org/">WordPress</a>.</p>


</footer>

</div>

<!-- End Container -->

<?php wp_footer(); ?>
</body>
</html>