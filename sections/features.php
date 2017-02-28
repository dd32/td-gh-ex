<?php
/**
 *	The template for dispalying the features section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */
	if( is_customize_preview() ) {
		$title = get_theme_mod('asterion_features_title',esc_html__('Features','asterion'));
		$text = get_theme_mod('asterion_features_text',esc_html__('A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Orange Themes Agency is one of the best in town see more you will be amazed.','asterion'));
	} else {
		$title = get_theme_mod('asterion_features_title');
		$text = get_theme_mod('asterion_features_text');
	}

	$bg_color = get_theme_mod('asterion_features_bg_color', '#ffffff');
	$text_color = get_theme_mod('asterion_features_text_color', 0);
?>

<?php if( $title != "" || $text != "" || is_active_sidebar( 'sidebar-features' ) ) : ?>
	<!-- features plugin --> 
	<section id="features" class="ot-section <?php echo esc_attr(( $text_color == 1 ) ? 'text-light' : 'text-dark'); ?>" style="background-color:<?php echo esc_attr( $bg_color );?>">
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

			<?php if ( is_active_sidebar( 'sidebar-features' ) ) : ?>
				<div class="row <?php asterion()->home->widget_counter_class('sidebar-features');?>">
					<?php dynamic_sidebar( 'sidebar-features' ); ?>
				</div>
			<?php elseif( is_customize_preview() && defined("OT_WIDGETS") ): ?>
				<div class="row widget-count-4 per-row-4">
			<?php
					$widget_args = array(
		                'before_widget' => '<div class="ot-widget widget">',
		                'after_widget' => '</div>',
						'before_title' => '<h2 class="ot-widget-title"><span>',
						'after_title'  => '</span></h2>',
					);

					the_widget( 'ot_widgets_features', 'title='. esc_attr__( 'WEB DEVELOPMENT', 'asterion' ) .'&icon=fa-briefcase&color=#6669c1&text='. esc_attr__( 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis', 'asterion' ), $widget_args );
					the_widget( 'ot_widgets_features', 'title='. esc_attr__( 'VISUALISATION', 'asterion' ) .'&icon=fa-picture-o&color=#924d8a&text='. esc_attr__( 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe', 'asterion' ), $widget_args );
					the_widget( 'ot_widgets_features', 'title='. esc_attr__( 'UI/UX DESIGN', 'asterion' ) .'&icon=fa-cube&color=#317d94&text='. esc_attr__( 'Itaque earum rerum hic tenetur a sapiente, ut aut reiciendis maiores', 'asterion' ), $widget_args );
					the_widget( 'ot_widgets_features', 'title='. esc_attr__( 'PHOTOGRAPHY', 'asterion' ) .'&icon=fa-camera-retro&color=#666671&text='. esc_attr__( 'Accusamus et iusto odio dignissimos ducimus qui blanditiis', 'asterion' ), $widget_args );
			?>
				</div>
			<?php endif; ?>


		</div>
		<!-- /.container -->
	</section>
<?php endif; ?>