<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beetech
 */
?>

		</div><!-- .bt-container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="bt-wrapper">
    		<div class="site-info">
    			<div class="bt-section-container">
    			<span class="copyright-text"><?php echo wp_kses_post( get_theme_mod( 'beetech_copyright_text'));?></span>
    			<span class="sep"> | </span>
    			<?php 
    				$theme_author_url = esc_url( '' );
    				printf( esc_html__( 'beetech by %1$s.', 'beetech' ), '<a href="'.esc_url( 'http://buzthemes.com' ).'" rel="designer">'.esc_html__('BeeThemes', 'beetech').'</a>' ); ?>
    			</div><!-- bt-section-container -->
    		</div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
	<a href="#masthead" id="scroll-up"><i class="fa fa-angle-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
