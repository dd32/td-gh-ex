<footer class="clearfix">
	<?php get_sidebar('footleft'); ?>
	<?php get_sidebar('footright'); ?>

	<p class="aligncenter">&copy; <?php echo date ('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. <?php printf( __( 'Theme: %1$s by %2$s.', 'baris' ), 'Baris', '<a href="http://www.malvouz.com/baris">Malvouz</a>' ); ?> Proudly powered by <a href="http://wordpress.org/">WordPress</a>.</p>


</footer>
</div>
<!-- End Container -->

<?php wp_footer(); ?>
</body>
</html>