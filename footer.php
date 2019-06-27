 <?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atlas_concern
 */

?>   
        <div class="footer"> 
		 <?php get_template_part('inc/footer','widget'); ?>   			
		 </div>  
            <div class="footer-bottom text-center"> 
                <div class="container-fluid"> 
                    <div class="row"> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                           <div class="site-info text-center">
                             <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'atlas-concern' ) ); ?>">
                                <?php
                                /* translators: %s: CMS name, i.e. WordPress. */

                                printf( esc_html__( 'Proudly powered by %s', 'atlas-concern' ), 'WordPress' );
                                ?>
                             </a>

                               <span class="sep"> | </span>
                                <?php
                                /* translators: 1: Theme name, 2: Theme author. */
                                printf( esc_html__( 'Power %1$s by %2$s.', 'atlas-concern' ), 'atlas concern', '<a href="https://www.atlasresponsivetasarim.com/">Atlas</a>' );
                                ?>
                           </div><!-- .site-info -->
                        </div>                                   
                    </div>                     
                </div>                 
            </div>             
          
              
                               
        <?php wp_footer(); ?>
    </body>     
</html>