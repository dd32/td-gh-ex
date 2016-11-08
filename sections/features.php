<?php
/**
 *	The template for dispalying the features section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */

	$title = get_theme_mod('asterion_features_title',esc_html__('Features','asterion'));
	$text = get_theme_mod('asterion_features_text',esc_html__('A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Orange Themes Agency is one of the best in town see more you will be amazed.','asterion'));

	$bg_color = get_theme_mod('asterion_features_bg_color', '#ffffff');
	$text_color = get_theme_mod('asterion_features_text_color', 0);
?>

<?php if( $title != "" || $text != "" || is_active_sidebar( 'sidebar-features' ) ) : ?>
	<!-- features plugin --> 
	<section id="features" class="ot-section <?php echo esc_attr(( $text_color == 1 ) ? 'text-light' : 'text-dark'); ?>" style="background-color:<?php echo esc_attr( $bg_color );?>">
		<div class="container">
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
					</div>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-features' ) ) : ?>
				<div class="row <?php asterion()->home->widget_counter('sidebar-features');?>">
					<?php dynamic_sidebar( 'sidebar-features' ); ?>
				</div>
			<?php endif; ?> 
		</div>
		<!-- /.container -->
	</section>
<?php endif; ?>