<?php
/**
 * Template functions used for the site footer.
 *
 * @package actions
 */

if ( ! function_exists( 'actions_footer_credit' ) ) {
	/**
	 * Display the theme credit
	 * @since  1.0.0
	 * @return void
	 */
	function actions_footer_credit() {
		?>
		    <footer id="colophon" class="site-footer inner" role="contentinfo">
		        <div class="site-info">
		            <?php echo esc_html( apply_filters( 'actions_copyright_text', $content = 'Copyright &copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
		            <?php if ( apply_filters( 'actions_credit_link', true ) ) { ?>
		            <?php printf( __( '/ Theme: %1$s, designed by %2$s.', 'actions' ), 'Actions', '<a href="http://www.wpdevhq.com" alt="WP DevHQ" title="WP DevHQ" rel="designer">WPDevHQ</a>' ); ?>
		            <?php } ?>
		        </div><!-- .site-info -->
		    </footer>		    
		<?php
	}
}
