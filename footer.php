<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package agency-x
 */

?>
<?php if( dynamic_sidebar('footer-1') || dynamic_sidebar('footer-1')|| dynamic_sidebar('footer-1') ): ?>
	<!-- Footer Top -->
		<section id="footer-top" class="section wow fadeInUp">
			<div class="container">
				<div class="row">
					<!-- Single Widget -->					
					<div class="col-md-4 col-sm-4 col-xs-12">							
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<!--/ End Single Widget -->

					<!-- Single Widget -->					
					<div class="col-md-4 col-sm-4 col-xs-12">						
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>			
					<!--/ End Single Widget -->

					<!-- Single Widget -->					
					<div class="col-md-4 col-sm-4 col-xs-12">						
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
					<!--/ End Single Widget -->
				</div>
			</div>
		</section>
		<!--/ End footer Top -->
<?php endif; ?>	
		<!-- Start Footer -->
		<footer id="footer" class="clearfix">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="copyright">
							<p>&copy;Copyright 2017<span><i class="fa fa-heart"></i></span>Jalil.</p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
					        $social = array();
					        $social['facebook'] = get_theme_mod( 'facebook_textbox' );
					        $social['twitter'] = get_theme_mod( 'twitter_textbox' );
					        $social['google-plus'] = get_theme_mod( 'googleplus_textbox' );
					        $social['youtube-play'] = get_theme_mod( 'youtube_textbox' );
					        $social['linkedin'] = get_theme_mod( 'linkedin_textbox' );
					        $social['pinterest'] = get_theme_mod( 'pinterest_textbox' );
					        $social['instagram'] = get_theme_mod( 'instagram_textbox' );
					        $social = array_filter( $social );
					    ?>
						<ul class="social">
							<li>Follow Us</li>							
							<?php foreach ( $social as $key => $value ) { ?>
			                    <li><a href="<?php echo esc_url( $value ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr($key); ?>"></i></a></li>
			            	<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!--/ End Footer -->
		<?php wp_footer(); ?>
	</body>
</html>