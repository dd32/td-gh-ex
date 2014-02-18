<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package base
 */
?>

	</div><!-- #content -->
	</div><!-- wide contenitor-->
	<footer id="colophon" class="site-footer" role="contentinfo">
  		 <div class="widget-footer container">
   			<?php get_sidebar( 'footer' ); ?>
   		</div><!-- .widget-footer -->
		<div class="site-info">
        	<?php printf( __( 'Theme: %1$s by %2$s &#169; 2013', 'base' ), 'Base WP', '<a href="http://iografica.it/" rel="designer">Iografica.it</a>' ); ?>
            <span class="sep"> | </span>
            <?php printf( __( '%1$s WordPress theme is licensed under the GPL.', 'base' ), 'Base WP' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>