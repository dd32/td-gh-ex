<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package AccesspressLite
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php 
		global $accesspresslite_options;
		$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );

		if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="top-footer">
		<div class="ak-container">
			<div class="footer1 footer">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer2 footer">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php endif; ?>	
			</div>

			<div class="clear hide"></div>

			<div class="footer3 footer">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer4 footer">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php else:
                if(!empty($accesspresslite_settings['google_map']) || !empty($accesspresslite_settings['contact_address'])){ ?>
                    
                    <h1 class="widget-title">Find Us</h1>
				    <?php if(!empty($accesspresslite_settings['google_map'])) { ?>

                        <div class="ak-google-map"><?php echo $accesspresslite_settings['google_map']; ?></div>
						
						<?php }
						if(!empty($accesspresslite_settings['contact_address'])) { ?>
						
						<div class="ak-contact-address"><?php echo $accesspresslite_settings['contact_address']; ?></div>

						<?php }
					
						if($accesspresslite_settings['show_social_footer'] == 0){
						do_action( 'accesspresslite_social_links' ); 
						}
					 }else { ?>

					<h1 class="widget-title">Contact Us</h1>
					<div class="ak-google-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d56516.31397712412!2d85.3261328!3d27.708960349999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1396803241107" width="450" height="160" frameborder="0" style="border:0"></iframe></div>
					<div class="ak-contact-address">
						mail@yourcompany.com<br />
						+1 555 1234 5667<br />
						Main Street, New York City,<br />
						United States
					</div>

					<?php } 
				endif; ?>	
			</div>
		</div>
		</div>
	<?php endif; ?>

		
		<div id="bottom-footer">
		<div class="ak-container">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'accesspresslite' ) ); ?>"><?php printf( __( 'Powered by %s', 'accesspresslite' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s', 'accesspresslite' ), '<a href="http://access-keys.com/" title="Access Keys">AccesspressLite</a>' ); ?>
			</div><!-- .site-info -->

			<div class="copyright">
				Copyright &copy; <?php echo date('Y') ?> 
				<a href="<?php echo home_url(); ?>">
				<?php if(!empty($accesspresslite_settings['footer_copyright'])){
					echo $accesspresslite_settings['footer_copyright']; 
					}else{
						echo bloginfo('name');
					} ?>
				</a>
			</div>
		</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
