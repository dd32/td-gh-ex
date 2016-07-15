<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */

?>

<?php if ( get_page_template_slug() != 'template-landing-page.php' || is_search() ): ?>
	<?php
	$mp_artwork_location         = wp_kses_data( get_theme_mod( mp_artwork_get_prefix() . 'location_info' ) );
	$mp_artwork_hours            = wp_kses_data( get_theme_mod( mp_artwork_get_prefix() . 'hours_info' ) );
	$mp_artwork_location_label   = wp_kses_data( get_theme_mod( mp_artwork_get_prefix() . 'location_info_label' ) );
	$mp_artwork_hours_label      = wp_kses_data( get_theme_mod( mp_artwork_get_prefix() . 'hours_info_label' ) );
	$mp_artwork_facebook_link     = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'facebook_link', '#' ) );
	$mp_artwork_twitter_link     = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'twitter_link', '#' ) );
	$mp_artwork_linkedin_link    = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'linkedin_link', '#' ) );
	$mp_artwork_google_plus_link = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'google_plus_link', '#' ) );
	$mp_artwork_instagram_link   = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'instagram_link', '' ) );
	$mp_artwork_pinterest_link   = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'pinterest_link', '' ) );
	$mp_artwork_tumblr_link      = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'tumblr_link', '' ) );
	$mp_artwork_youtube_link     = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'youtube_link', '' ) );
	$mp_artwork_rss_link         = esc_url( get_theme_mod( mp_artwork_get_prefix() . 'rss_link', '#' ) );
	$mp_artwork_copyright        = wp_kses_data( get_theme_mod( mp_artwork_get_prefix() . 'copyright' ) );
	
	$mp_artwork_is_logo = get_theme_mod( mp_artwork_get_prefix() . 'logo_footer', false ) || (get_header_textcolor() != 'blank');
	
	$mp_artwork_is_contact = !empty($mp_artwork_location_label) || !empty($mp_artwork_location) || !empty($mp_artwork_hours_label) || !empty($mp_artwork_hours) || 
		(get_theme_mod( mp_artwork_get_prefix() . 'location_info_label', false ) === false);
	
	$mp_artwork_is_social = !empty($mp_artwork_facebook_link) ||
		!empty($mp_artwork_twitter_link) ||
		!empty($mp_artwork_linkedin_link) ||
		!empty($mp_artwork_google_plus_link) ||
		!empty($mp_artwork_instagram_link) ||
		!empty($mp_artwork_pinterest_link) ||
		!empty($mp_artwork_tumblr_link) ||
		!empty($mp_artwork_youtube_link) ||
		!empty($mp_artwork_rss_link);
	
	$mp_artwork_is_top_footer = $mp_artwork_is_logo || $mp_artwork_is_contact || $mp_artwork_is_social;
	
	?>
	<footer id="footer" class="site-footer">
		<div class="footer-inner">
			
			<?php if ( $mp_artwork_is_top_footer ) : ?>
			
			<div class="container">
				<div class="row">
					
					<?php if ( $mp_artwork_is_logo ) : ?>
						<?php if ($mp_artwork_is_contact || $mp_artwork_is_social) : ?>
							<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<?php else: ?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<?php endif; ?>
					
						<div class="site-logo">
							<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php  ?>
									<?php if ( get_theme_mod( mp_artwork_get_prefix() . 'logo_footer' ) ) : ?>
										<div class="header-logo "><img
												src="<?php echo esc_url( get_theme_mod( mp_artwork_get_prefix() . 'logo_footer' ) ); ?>"
												alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
										</div>
									<?php endif; ?>
									<?php  ?>
								
								<?php if (get_header_textcolor() != 'blank') : ?>
								<div class="site-description">
									<h2 class="site-title <?php if ( ! get_bloginfo( 'description' ) ) : ?>empty-tagline<?php endif; ?>"><?php bloginfo( 'name' ); ?></h2>
									<?php if ( get_bloginfo( 'description' ) ) : ?>
										<p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
									<?php endif; ?>
								</div>
								<?php endif; ?>
							</a>
						</div>
					</div>
					<?php endif; ?>
					
					<?php
						if ( $mp_artwork_is_contact) :
					?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="contact-info footer-widget">
							
							<!-- demo address -->
							<?php if ( get_theme_mod( mp_artwork_get_prefix() . 'location_info_label', false ) === false ) : ?>
							
								<div class="info-list-address">
										<div class="footer-title"><?php _e( 'Address', 'artwork-lite' ); ?></div>
										<ul class="info-list">
											<li><?php echo MP_ARTWORK_DEFAULT_ADDRESS; ?></li>
										</ul>
								</div>
							
							<?php else: ?>
							
								<div class="info-list-address">
									<?php if ( !empty($mp_artwork_location_label) ) : ?>
										<div class="footer-title"><?php echo $mp_artwork_location_label; ?></div>
									<?php endif; ?>
									<?php if ( ! empty( $mp_artwork_location ) ): ?>
										<ul class=" info-list">
											<li><?php echo $mp_artwork_location; ?></li>
										</ul>
									<?php endif; ?>
								</div>

							<?php endif; ?>

							<!-- demo hours -->
							<?php if ( get_theme_mod( mp_artwork_get_prefix() . 'hours_info_label', false ) === false ) : ?>

								<br/>
								<div class="info-list-hours">
										<div class="footer-title"><?php _e( 'Opening hours', 'artwork-lite' ); ?></div>
										<ul class="info-list">
											<li><?php echo MP_ARTWORK_DEFAULT_OPEN_HOURS; ?></li>
										</ul>
								</div>

							<?php else: ?>

								<br/>
								<div class="info-list-hours">
									<?php if ( !empty($mp_artwork_hours_label) ) : ?>
										<div class="footer-title"><?php echo $mp_artwork_hours_label; ?></div>
									<?php endif; ?>
									<?php if ( ! empty( $mp_artwork_hours ) ): ?>
										<ul class="info-list">
											<li><?php echo $mp_artwork_hours; ?></li>
										</ul>
									<?php endif; ?>
								</div>

							<?php endif; ?>

							<div class="clearfix"></div>
						</div>
					</div>
					<?php endif; ?>
					
					<?php
						if ( $mp_artwork_is_social ) :
					?>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="footer-widget">
							<div class="footer-title"><?php _e( 'Follow us', 'artwork-lite' ); ?></div>
							<div class="social-profile">
								<?php if ( ! empty( $mp_artwork_facebook_link ) ): ?>
									<a href="<?php echo $mp_artwork_facebook_link; ?>" class="button-facebook"
									   title="<?php _e( 'Facebook', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-facebook"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_twitter_link ) ): ?>
									<a href="<?php echo $mp_artwork_twitter_link; ?>" class="button-twitter"
									   title="<?php _e( 'Twitter', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-twitter"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_linkedin_link ) ): ?>
									<a href="<?php echo $mp_artwork_linkedin_link; ?>" class="button-linkedin"
									   title="<?php _e( 'LinkedIn', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-linkedin"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_google_plus_link ) ): ?>
									<a href="<?php echo $mp_artwork_google_plus_link; ?>" class="button-google"
									   title="<?php _e( 'Google +', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-google-plus"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_instagram_link ) ): ?>
									<a href="<?php echo $mp_artwork_instagram_link; ?>" class="button-instagram"
									   title="<?php _e( 'Instagram', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-instagram"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_pinterest_link ) ): ?>
									<a href="<?php echo $mp_artwork_pinterest_link; ?>" class="button-pinterest"
									   title="<?php _e( 'Pinterest', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-pinterest"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_tumblr_link ) ): ?>
									<a href="<?php echo $mp_artwork_tumblr_link; ?>" class="button-tumblr"
									   title="<?php _e( 'Tumblr', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-tumblr"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_youtube_link ) ): ?>
									<a href="<?php echo $mp_artwork_youtube_link; ?>" class="button-youtube"
									   title="<?php _e( 'Youtube', 'artwork-lite' ); ?>"
									   target="_blank"><i class="fa fa-youtube"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $mp_artwork_rss_link ) ): ?>
									<a href="<?php echo $mp_artwork_rss_link; ?>" class="button-rss" title="<?php _e( 'Rss', 'artwork-lite' ); ?>"
									   target="_blank"><i
											class="fa fa-rss"></i></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>

				</div>
			</div>
			
			<?php endif; ?>
			
			<div class="copyright" <?php echo $mp_artwork_is_top_footer ? '' : 'style="margin-top:0;"'; ?>>
				<div class="container">
					<p><span class="copyright-date"><?php _e( '&copy; Copyright ', 'artwork-lite' ); ?><?php
							$mp_artwork_dateObj = new DateTime;
							$mp_artwork_year    = $mp_artwork_dateObj->format( "Y" );
							echo $mp_artwork_year;
							?>
                        </span>
						<?php
						?>
						  <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" target="_blank"><?php bloginfo('name'); ?></a>
						  <?php printf(__('&#8226; Designed by', 'artwork-lite')); ?> <a href="<?php echo esc_url(__('http://www.getmotopress.com/', 'artwork-lite' )); ?>" rel="nofollow" title="<?php esc_attr_e('Premium WordPress Plugins and Themes', 'artwork-lite' ); ?>"><?php _e('MotoPress', 'artwork-lite'); ?></a>
						  <?php printf(__('&#8226; Proudly Powered by ',  'artwork-lite')); ?><a href="<?php echo esc_url(__('http://wordpress.org/', 'artwork-lite')); ?>"  rel="nofollow" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'artwork-lite' ); ?>"><?php _e('WordPress',  'artwork-lite' ); ?></a>
						  <?php
						?>
					</p><!-- .copyright -->
				</div>
			</div>
		</div>
	</footer>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>