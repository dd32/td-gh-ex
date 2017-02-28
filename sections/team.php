<?php
/**
 *	The template for dispalying the team section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */

	if( is_customize_preview() ) {
		$title = get_theme_mod('asterion_team_title',esc_html__('Team','asterion'));
		$text = get_theme_mod('asterion_team_text',esc_html__('All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.','asterion'));
	} else {
		$title = get_theme_mod('asterion_team_title');
		$text = get_theme_mod('asterion_team_text');
	}
	
	$bg_color = get_theme_mod('asterion_team_bg_color', '#ffffff');
	$text_color = get_theme_mod('asterion_team_text_color', 0);
?>

<?php if( $title != "" || $text != "" || is_active_sidebar( 'sidebar-team' ) ) : ?>
	<!-- team plugin --> 
	<section id="team" class="ot-section <?php echo esc_attr(( $text_color == 1) ? 'text-light' : 'text-dark'); ?>" style="background-color:<?php echo esc_attr( $bg_color );?>">
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
					</div>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-team' ) ) : ?>
				<div class="row <?php asterion()->home->widget_counter_class('sidebar-team');?>">
					<?php dynamic_sidebar( 'sidebar-team' ); ?>
				</div>
			<?php elseif( is_customize_preview() && defined("OT_WIDGETS") ): ?>
				<div class="row widget-count-3 per-row-3">
			<?php
					$widget_args = array(
		                'before_widget' => '<div class="ot-widget widget">',
		                'after_widget' => '</div>',
						'before_title' => '<h2 class="ot-widget-title"><span>',
						'after_title'  => '</span></h2>',
					);

					the_widget( 'ot_widgets_team', 'title='. esc_attr__( 'TOM BEKERS', 'asterion' ) .'&image='.esc_url( get_template_directory_uri().'/images/team-1.jpg' ).'&subtitle='.esc_attr__( 'CEO & WEB DESIGN', 'asterion' ).'&text='. esc_attr__( 'Mida sit una namet, cons uectetur adipiscing adon elit. Aliquam vitae barasa droma.', 'asterion' ), $widget_args );
					the_widget( 'ot_widgets_team', 'title='. esc_attr__( 'LINA GOSATA', 'asterion' ) .'&image='.esc_url( get_template_directory_uri().'/images/team-2.jpg' ).'&subtitle='.esc_attr__( 'PHOTOGRAPHY', 'asterion' ).'&text='. esc_attr__( 'Worsa dona namet, cons uectetur dipiscing adon elit. Aliquam vitae fringilla unda mir.', 'asterion' ), $widget_args );
					the_widget( 'ot_widgets_team', 'title='. esc_attr__( 'JOHN BEKERS', 'asterion' ) .'&image='.esc_url( get_template_directory_uri().'/images/team-3.jpg' ).'&subtitle='.esc_attr__( 'MARKETING', 'asterion' ).'&text='. esc_attr__( 'Dolor sit don namet, cons uectetur beriscing adon elit. Aliquam vitae fringilla unda.', 'asterion' ), $widget_args );
			?>
				</div>
			<?php endif; ?>

		</div>
		<!-- /.container -->
	</section>
<?php endif; ?>