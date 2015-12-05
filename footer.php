<?php 
/**
 * The footer template.
 *
 * @package aesblo
 * @since 1.0.0
 */
?>	
	<footer id="colophon" class="colophon clearfix">		
		<?php 
			$mod = get_theme_mod( 'aesblo_customizer' );
			$copyright = isset( $mod[ 'copyright' ] ) ? $mod[ 'copyright' ] : '';
			$footer_class = $copyright ? ' has-copyright' : '';
		?>		
        <div class="site-footer clearfix<?php echo esc_attr( $footer_class ); ?>">
			<?php
                if ( $copyright ) {
                    printf( '<div class="copyright">%1$s</div>', $copyright );
                }
            ?>			
            <div class="theme-by">
                <?php _e( 'Theme by', 'aesblo' ); ?> <a href="http://www.wpaesthetic.com">WPaesthetic</a>
            </div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<div id="popup-search" class="site-search">
	<span class="fa fa-close"></span>
	<?php get_search_form(); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>