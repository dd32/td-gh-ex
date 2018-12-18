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
get_template_part('inc/footer','widget');
?>

                <section class="page_copyright ds section_padding_top_30 section_padding_bottom_15">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">         
                              <div class="col-md-6"> 
			                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'atlas-concern' ) ); ?>">
				                 <?php
				                 /* translators: %s: CMS name, i.e. WordPress. */
				                  printf( esc_html__( 'Proudly powered by %s', 'atlas-concern' ), 'WordPress' );
				                   ?>
			                      </a>
			      
					            </div>
					            <div class="col-md-6"> 
				                <?php
				                   /* translators: 1: Theme name, 2: Theme author. */
				                  printf( esc_html__( ' %1$s by %2$s.', 'atlas-concern' ), 'Atlas Concern', '<a href="http://www.atlasresponsivetasarim.com/">Atlas</a>' );
				                 ?>
						       </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>