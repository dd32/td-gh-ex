<?php







/**







 * The template for displaying the footer







 *







 * Contains footer content and the closing of the #main and #page div elements.







 *







 * @package WordPress







 * @subpackage Twenty_Fourteen







 * @since Twenty Fourteen 1.0







 */







?>







<div style="text-align: center;">



<a href="#top">Back to top</a>







</div>



</div><!-- #main -->



<div class="center">



<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>



<div>



<?php dynamic_sidebar( 'sidebar-5' ); ?>



</div>



<?php endif; ?>



</div>







<footer id="colophon" class="site-footer" role="contentinfo">



<div class="site-info">



<?php 



	global $badeyes_options;



	$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );



?>



   



				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">



					<?php echo $badeyes_settings['footer_copyright']; ?>



				</a>



</div><!-- .site-info -->

			<div id="site-generator">

	<?php 
//do_action( 'twentyten_credits' ); ?>

                <?php if( $badeyes_settings['author_credits'] ) : ?>

				<a href="<?php echo esc_url( __('http://wordpress.org/', 'twentyten') ); ?>"

						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'twentyten'); ?>" rel="generator">

					<?php printf( __('Proudly powered by %s.', 'twentyten'), 'WordPress' ); ?>

				</a>

                <?php endif; ?>

			</div><!-- #site-generator -->







		</footer><!-- #colophon -->







	</div><!-- #page -->















	<?php wp_footer(); ?>







</body>







</html>

