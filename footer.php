<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atlas-concern
 */

?>

	</div><!-- #content -->

        <footer class="footer-widget-copy default-padding text-light"> 
            <div class="container"> 
			 <?php get_template_part('inc/footer','widget'); ?>
             <div class="footer-bottom"> 
              <div class="row"> 
                <div class="col-md-12"> 
                   <div class="col-md-6"> 
			          <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'atlas-concern' ) ); ?>">
				      <?php
				     /* translators: %s: CMS name, i.e. WordPress. */
				     printf( esc_html__( 'Proudly powered by %s', 'atlas-concern' ), 'WordPress' );
				      ?>
			         </a>
			      
					</div>
					   <div class="col-md-6 text-right"> 
				        <?php
				         /* translators: 1: Theme name, 2: Theme author. */
				          printf( esc_html__( ' %1$s by %2$s.', 'atlas-concern' ), 'Atlas Concern', '<a href="http://www.atlasresponsivetasarim.com/">Atlas</a>' );
				         ?>
						 </div>
		         </div>                         
              </div>                     
            </div>                 
                 
            </div>             
        </footer>                                                                                                                                       
        <?php wp_footer(); ?>

</body>
</html>
