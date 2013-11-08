<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package rootstrap
 * @since WP RootStrap 1.1
 */
?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<div id="primery-footer">
	<div class="container">
	<?php if ( ! dynamic_sidebar( 'sidebar-footer' ) ) : ?><?php endif; ?>
	</div>

</div>


<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">		
			<div class="site-footer-inner col-12">
			
				<div class="site-info">
					<?php do_action( 'rootstrap_credits' ); ?>
					<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'rootstrap' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'rootstrap' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'rootstrap' ), 'rootstrap', '<a href="http://crayonux.com/" rel="designer">Crayonux</a>' ); ?>
				</div><!-- close .site-info -->
			
			</div>	
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>