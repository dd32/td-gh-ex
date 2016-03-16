<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bakes_And_Cakes
 */

?>

	</div><!-- #content -->
    </div> <!-- #container -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
		    <?php if( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' ) ){?>
				<div class="footer-t">
					<div class="row">
						<?php if( is_active_sidebar( 'footer-first' ) ){ ?>
        					
        					   <?php dynamic_sidebar( 'footer-first' ); ?>
        					
                        <?php } ?>
                        <?php  
				             $bakes_and_cakes_ed_social = get_theme_mod('bakes-and-cakes_ed_social'); 
	     		             if( $bakes_and_cakes_ed_social )  do_action( 'bakes_and_cakes_social' ); ?>
			       	
    					
                        <?php //if( is_active_sidebar( 'footer-second' ) ){ ?>
                            
        					   <?php //dynamic_sidebar( 'footer-second' ); ?>	
        					
                        <?php //} ?>
                        <section class="widget widget_contact_form">
						<div class="form-holder">
							<h2 class="main-title">Contact Us</h2>
							<h3 class="sub-title">Our Story</h3>
							<form action="#" class="contact-form">
								<p>
									<input type="text" placeholder="Name">
								</p>
								<p>
									<input type="email" placeholder="Email">
								</p>
								<p>
									<input type="text" placeholder="Subject">
								</p>
								<p>
									<textarea placeholder="Message"></textarea>
								</p>
								<p>
									<input type="submit" value="SEND MESSAGE">
								</p>
							</form>
						</div>
					</section>
                        
                        <?php if( is_active_sidebar( 'footer-third' ) ){ ?>
                            
        					   <?php dynamic_sidebar( 'footer-third' ); ?>	
        					
                        <?php } ?>
					</div>
				</div>
			<?php } ?>


			<div class="site-info">
				<span>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php esc_html_e( 'All Rights Reserved.', 'bakes-and-cakes' ); ?></span>
				<span class="by"><?php esc_html_e( 'Theme by ', 'bakes-and-cakes' ); ?><a href="<?php echo esc_url( 'http://raratheme.com/' ); ?>" rel="designer"><?php esc_html_e( 'Rara Theme', 'bakes-and-cakes' ); ?></a>. <?php printf( esc_html__( 'Powered by %s', 'bakes-and-cakes' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'bakes-and-cakes' ) ) .'">WordPress</a>' ); ?>.</span>
		</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
