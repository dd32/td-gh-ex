<?php
/**
 *	The template for dispalying the about section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */

	$asterion = asterion()->customizer;


	$title = get_theme_mod('asterion_about_title');
	$text = get_theme_mod('asterion_about_text');
	$facebook = get_theme_mod('asterion_about_facebook');
	$twitter = get_theme_mod('asterion_about_twitter');
	$linkedin = get_theme_mod('asterion_about_linkedin');


	$bg_color = get_theme_mod('asterion_about_bg_color', '#ffffff');
	$text_color = get_theme_mod('asterion_about_text_color', 0);

?>

<?php if( $title != "" || $text != "" ) : ?>
	<!-- about plugin --> 
	<section id="about" class="ot-section <?php echo esc_attr(( $text_color == 1) ? 'text-light' : 'text-dark'); ?>" style="background-color:<?php echo esc_attr( $bg_color );?>">
		<div class="ot-container">
			<?php if( $title || $text ) : ?>
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<?php if( $title ) : ?>
								<h2><?php echo asterion()->customizer->sanitize_html($title);?></h2>
							<?php endif; ?>
							<?php if( $text ) : ?>
								<p><?php echo asterion()->customizer->sanitize_html($text);?></p>
							<?php endif; ?>
						</div>
						<?php if( $facebook || $twitter || $linkedin ) : ?>
							<div class="ot-about-socials">
								<?php if( $facebook ) : ?>
									<a class="ot-facebook" href="<?php echo esc_url( $facebook );?>" title="<?php esc_html_e("Facebook", "asterion");?>" target="_blank">
										<i class="fa fa-facebook"></i>
									</a>
								<?php endif; ?>
								<?php if( $twitter ) : ?>
									<a class="ot-twitter" href="<?php echo esc_url( $twitter );?>" title="<?php esc_html_e("Twitter", "asterion");?>" target="_blank">
										<i class="fa fa-twitter"></i>
									</a>
								<?php endif; ?>
								<?php if( $linkedin ) : ?>
									<a class="ot-linkedin" href="<?php echo esc_url( $linkedin );?>" title="<?php esc_html_e("LinkedIn", "asterion");?>" target="_blank">
										<i class="fa fa-linkedin"></i>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

		</div>
		<!-- /.container -->
	</section>
<?php endif; ?>