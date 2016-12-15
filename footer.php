<?php
/**
 * The template for displaying the footer.
 *
 * @package Azalea
 */
?>
	<?php
	if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) {
		get_sidebar( 'footer' );
	}
	?>
	<footer id="colophon" class="site-footer">
		<?php if ( has_nav_menu( 'footer_social' ) ) : ?>
		<div class="footer-links">
			<div class="inner">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer_social',
					'container'      => false,
					'menu_id'        => 'footer-social-links',
					'menu_class'     => 'social-links-menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
				?>
				<a href="#page" id="top-link" class="top-link fa-angle-double-up"><span class="screen-reader-text"><?php esc_html_e( 'Back to the top', 'azalea' ); ?></span></a>
			</div><!-- .inner -->
		</div><!-- .footer-links -->
		<div class="site-info">
			<div class="inner">
				<?php jgtazalea_site_info(); ?>
			</div><!-- .inner -->
		</div><!-- .site-info -->
		<?php else: ?>
		<div class="site-info">
			<div class="inner">
				<?php jgtazalea_site_info(); ?>
				<a href="#page" id="top-link" class="top-link fa-angle-double-up"><span class="screen-reader-text"><?php esc_html_e( 'Back to the top', 'azalea' ); ?></span></a>
			</div><!-- .inner -->
		</div><!-- .site-info -->
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="search-box" class="site-search">
	<div class="inner">
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<label>
				<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'azalea' ); ?></span>
				<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Type your keywords here &hellip;', 'azalea' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			</label>
			<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'azalea' ); ?>" />
		</form>
	</div><!-- .inner -->
</div><!-- .search-box -->
<div id="search-hide" class="search-hide"></div>

<?php wp_footer(); ?>

</body>
</html>