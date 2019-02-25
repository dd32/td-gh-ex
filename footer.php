<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #container div elements.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */
?>


			</main><!-- #main -->

<?php get_sidebar('footer'); ?>

			<footer id="page-footer" class="page-footer flex-container" role="contentinfo">
				<div id="footer-site-info" class="site-info">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<span>&vert;</span>
					<a href="<?php echo esc_url('https://wordpress.org/' ); ?>"><?php echo __( 'Proudly powered by WordPress', 'aguafuerte' ) ; ?></a>
				</div><!--/site-info--> 
			<?php
			if (has_nav_menu('social')): ?>
				<nav id="footer-social" class="site-navigation social-navigation" role="navigation">
			<?php 	wp_nav_menu( array(
						'theme_location' => 'social',
						'container' => 'false',
						'menu_id' => 'footer-social-menu',
						'menu_class' => 'social-menu',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
					) );
			?>
				</nav> <!--/social--> 
			<?php
			endif ?>
			</footer> <!--/footer-->
		</div><!-- #container -->
<?php wp_footer(); ?>
	</body>
</html>

