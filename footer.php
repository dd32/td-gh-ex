<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zenzero
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info smallPart">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'zenzero' ) ); ?>">
			<?php
			/* translators: %s: WordPress name */
			printf( esc_html__( 'Proudly powered by %s', 'zenzero' ), 'WordPress' );
			?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: theme name, 2: theme developer */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'zenzero' ), '<a target="_blank" href="https://crestaproject.com/downloads/zenzero/" rel="nofollow" title="Zenzero Theme">Zenzero</a>', 'CrestaProject' );
			?>
		</div><!-- .site-info -->
		<?php 
		$hideSearch = get_theme_mod('zenzero_theme_options_hidesearch', '1');
		zenzero_social_button();
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_sidebar(); ?>
<a href="#top" id="toTop" class="showTop"><i class="fa fa-angle-up"></i></a>
<?php if ($hideSearch == 1 ) : ?>
	<div id="open-search" class="showSearch"><i class="fa fa-search"></i></div>
	<!-- Start: Search Form -->
	<div id="search-full">
		<div class="search-container">
			<form id="search-form" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
				<input id="search-field" type="text" name="s" value="" placeholder="<?php esc_attr_e('Type here and hit enter...', 'zenzero'); ?>" />
			</form>
			<span><a id="close-search"><i class="fa fa-close"></i> <?php esc_html_e('Close', 'zenzero'); ?></a></span>
		</div>
	</div>
	<!-- End: Search Form -->
<?php endif; ?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="open-sidebar" class="showSide"><span class="sidebarButton"></span></div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
