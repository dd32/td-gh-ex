<?php
/**
 * The footer for our theme.
 *
 * Contains all the code after the actual content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BA Tours
 */

?>


	</div><!-- #content -->
	
	<?php do_action( 'bathemos_get_panel', 'before-footer' ); ?>
	
	<!-- Footer -->
	
	<footer id="footer" class="<?php
     
     $footer_styles = apply_filters( 'bathemos_style', 'site-footer', 'footer' );
     
     echo esc_attr($footer_styles);
     
     ?>">
		
		<?php do_action( 'bathemos_footer_before' ); ?>
		
		<?php do_action( 'bathemos_get_panel', 'footer' ); ?>
		
		<div class="container footer-widgets">
			<div class="row">
				<?php do_action( 'bathemos_get_panel', 'footer-left' ); ?>
				<?php do_action( 'bathemos_get_panel', 'footer-middle' ); ?>
				<?php do_action( 'bathemos_get_panel', 'footer-right' ); ?>
			</div>
		</div>
	
		<!-- Info -->
		
		<?php //do_action( 'bathemos_get_navbar', 'footer' ); ?>
        
        <div class="container footer-copyright">
	
		   <!-- Copyright -->
		   <div id="copyrights" class="copyrights"><?php
           
           $copyright_text = apply_filters( 'bathemos_copyright_text', '');
           
           echo wp_kses_post($copyright_text);
           
           if ( function_exists( 'the_privacy_policy_link' ) ) {
              the_privacy_policy_link( ' <span class="footer-privacy-link">', '</span> ' );
           }
           
           ?></div>
        
        </div>
		
		<?php do_action( 'bathemos_footer_after' ); ?>
		
	</footer><!-- #footer -->

	<?php do_action( 'bathemos_page_bottom' ); ?>

</div><!-- #page -->

<!-- Wordpress footer -->
<?php wp_footer(); ?>

</body>
</html>