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
   	                        <p><?php echo 
		                        /* translators: %s: CMS name, i.e. WordPress. */
		                        esc_html( get_theme_mod( 'copyright_section_text' )); ?></p>
                           </div><!-- .site-info -->
                        </div>                                   
                    </div>                     
                </div>                 
            </div>             
          
              
                               
        <?php wp_footer(); ?>
    </body>     
</html>