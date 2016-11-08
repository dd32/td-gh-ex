<?php
/**
 *	The template for dispalying the team section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */

	$asterion = asterion()->customizer;
	$title = get_theme_mod('asterion_team_title',esc_html__('Team','asterion'));
	$text = get_theme_mod('asterion_team_text',esc_html__('All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.','asterion'));
	$bg_color = get_theme_mod('asterion_team_bg_color', '#ffffff');
	$text_color = get_theme_mod('asterion_team_text_color', 0);
?>

<?php if( $title != "" || $text != "" || is_active_sidebar( 'sidebar-team' ) ) : ?>
	<!-- team plugin --> 
	<section id="team" class="ot-section <?php echo esc_attr(( $text_color == 1) ? 'text-light' : 'text-dark'); ?>" style="background-color:<?php echo esc_attr( $bg_color );?>">
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
			<?php if ( is_active_sidebar( 'sidebar-team' ) ) : ?>
				<div class="row <?php asterion()->home->widget_counter('sidebar-features');?>">
					<?php dynamic_sidebar( 'sidebar-team' ); ?>
				</div>
			<?php endif; ?> 
		</div>
		<!-- /.container -->
	</section>
<?php endif; ?>