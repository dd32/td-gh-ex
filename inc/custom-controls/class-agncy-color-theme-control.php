<?php
/**
 * WP_Customize_Control: Agncy_Color_Theme_Control
 *
 * @package agncy
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Class to create a custom layout control
	 */
	class Agncy_Color_Theme_Control extends WP_Customize_Control {

		/**
		 * The type of control we want to have
		 *
		 * @var string
		 */
		public $type = 'agncy-color-theme';

		/**
		 * Render the content on the theme customizer page
		 */
		public function render_content() {
			global $agncy_color_themes;

			$color_themes   = $agncy_color_themes->get_color_themes();
			$color_sections = $agncy_color_themes->get_color_sections();

			$name = $this->id;
			?>
			<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
		<?php endif; ?>
		<ul class="color-themes-control-list" >
			<?php
			foreach ( $color_themes as $section_slug => $color_themes ) :

				$section = $color_sections[ $section_slug ];

				if ( empty( $section ) ) {
					continue;
				}
				?>
				<li class="color-theme-section section-<?php echo esc_attr( $section_slug ); ?>">
					<div class="section-label-wrapper">
						<span class="section-label"><?php echo esc_html( $section['name'] ); ?></span>
					</div>

					<ul class="color-theme-list">
						<?php foreach ( $color_themes as $ct ) : ?>
							<li class="color-theme color-theme-<?php echo esc_attr( $ct->get_slug() ); ?>">
								<label class="color-theme-label" for="<?php echo esc_attr( $this->id . '-' . $ct->get_slug() ); ?>">
									<input
										type="radio"
										name="<?php echo esc_attr( $name ); ?>"
										id="<?php echo esc_attr( $this->id . '-' . $ct->get_slug() ); ?>"
										class="theme-radio"
										value="<?php echo esc_attr( $ct->get_slug() ); ?>"
										<?php
											$this->link();
											checked( $this->value(), $ct->get_slug() );
										?>
									/>
									<div class="color-theme-button clearfix">
										<div class="color-gradient" style="--primary-color: <?php echo esc_attr( $ct->get_primary_color() ); ?>; --secondary-color: <?php echo esc_attr( $ct->get_secondary_color() ); ?>; --tertiary-color: <?php echo esc_attr( $ct->get_tertiary_color() ); ?>;"></div>
										<span class="layout-name">
											<?php echo esc_attr( $ct->get_name() ); ?>
										</span>
									</div>
								</label>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul>
			<?php
		}
	}
}
?>
