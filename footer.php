<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and closes main, div#container, body and html tags, which were opened in header.php
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

?>
</main><!-- #main -->
<?php   get_sidebar( 'footer' ); ?>
<footer id="page-footer" role="contentinfo">

<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav id="footer-social-menu" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Menu ', 'acuarela' ); ?>">
			<?php wp_nav_menu( array(
				'theme_location'	=> 'social',
				'container'			=> 'false',
				'menu_class'			=> 'social-menu',
				'depth'				=> 1,
				'link_before'		=> '<span class="screen-reader-text">',
				'link_after'		=> '</span>',
				)
			); ?>
		</nav> <!--/social--> 
<?php endif ?>

		<div id="site-info">
			<span class="footer-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html( bloginfo( 'name' ) ); ?></a></span>
			<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php esc_html_e( 'Proudly powered by WordPress', 'acuarela' ); ?></a>
		</div><!--/site-info-->
	
</footer> <!--/footer-->
		</div><!-- #container -->
<?php   wp_footer(); ?>
	</body>
</html>

