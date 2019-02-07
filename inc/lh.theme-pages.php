<?php
/**
 * The file that provides the admin pages class
 *
 * @package agncy
 */

/**
 * The class that provides the admin pages for the theme.
 *
 * TODO: Migrate this class to a singleton pattern.
 */
class AgncyAdminPages {

	/**
	 * The class constructor, that triggers the action and filter dispatcher.
	 */
	public function __construct() {
		$this->action_dispatcher();
		$this->filter_dispatcher();
	}

	/**
	 * The action dispatcher, that calls needed WordPress actions for this class.
	 */
	private function action_dispatcher() {
		add_action( 'admin_menu', array( $this, 'register_pages' ) );
		add_action( 'agncy_onboarding_show_features', array( $this, 'render_features' ) );
	}

	/**
	 * The action dispatcher, that calls needed WordPress filter for this class.
	 */
	private function filter_dispatcher() {

	}

	/**
	 * Register the needed pages for this theme
	 */
	public function register_pages() {

		$pt_suffix = null;

		$plan_title_string = agncy_fs()->get_plan_title() == 'PLAN_TITLE' ? 'free' : agncy_fs()->get_plan_title();
		switch ( $plan_title_string ) {
			case 'free':
				$pt_suffix = '';
				break;
			case 'Professional':
				$pt_suffix = '&#x2605;';
				break;
			case 'Enterprise':
				$pt_suffix = '&#x2605;&#x2605;';
				break;
		}

		add_theme_page(
			_x( 'Welcome', 'page title', 'agncy' ),
			_x( 'Agncy ', 'menu title', 'agncy' ) . ' ' . $pt_suffix,
			'edit_theme_options',
			'agncy-welcome_page',
			array( $this, 'welcome_page' )
		);
	}

	/**
	 * Render the actual page content
	 */
	public function welcome_page() {
		?>
		<div class="wrap welcome-page-wrapper">
			<h2 class="nav-tab-wrapper">
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=agncy-welcome_page' ) ); ?>" class="nav-tab nav-tab-active">Agncy</a>
			</h2>
			<div id="icon-themes" class="icon32"></div>

			<?php settings_errors(); ?>
			<div class="container">
				<div class="row content-row">
					<div class="col-xs-12 col-lg-6">
						<?php echo wp_kses_post( $this->get_title() ); ?>
						<?php echo wp_kses_post( $this->get_subtitle() ); ?>
						<?php echo wp_kses_post( $this->get_description() ); ?>
					</div>
					<div class="col-xs-12 col-lg-6">
						<img class="screenshot" src="<?php echo esc_url( AGNCY_THEME_URL ); ?>/screenshot.png">
					</div>
				</div>

				<div class="button-row row">
					<div class="col-xs-12">
						<?php echo wp_kses_post( $this->render_buttons() ); ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<h3 class="the_title"> <?php echo wp_kses_post( __( 'Features', 'agncy' ) ); ?> </h3>
					</div>
				</div>

				<div class="row features-row">
					<?php echo wp_kses_post( $this->render_features() ); ?>
				</div> <?php // /features-row ?>
			</div>
		</div> <?php // /wrap ?>
		<?php
	}

	/**
	 * Get the title of the onboarding page
	 *
	 * @return string $title The HTML markup for the title.
	 */
	private function get_title() {

		$title  = '<h2 class="the_title">';
		$title .= __( 'Thank you for choosing <b>agncy</b>!', 'agncy' );
		$title .= '</h2>';

		return $title;
	}

	/**
	 * Get the subtitle of the onboarding page
	 *
	 * @return string The HTML markup for the subtitle
	 */
	private function get_subtitle() {

		$plan_title_string = agncy_fs()->get_plan_title() == 'PLAN_TITLE' ? 'free' : agncy_fs()->get_plan_title();

		$subtitle = '<p><strong>';

		$plan_title = '<span class="agncy-highlight">' . $plan_title_string . '</span>';
		/* translators: 1) Agncy plan title, 2) agncy Version number */
		$subtitle .= sprintf( __( 'You are using the %1$s plan with version %2$s.', 'agncy' ), $plan_title, AGNCY_VERSION );
		$subtitle .= '</strong></p>';

		return $subtitle;
	}

	/**
	 * Get the description of the onboarding page
	 *
	 * @return string $description The HTML markup for the description
	 */
	private function get_description() {
		$description = __(
			'Agncy is a beautiful, Gutenberg ready news and blogging theme that has beautiful typography, powerful color customisation and an elegant, light layout.

		Customise your theme to the colours you need and upload your own logo. Enjoy reading even long texts with the beautiful font "Fira" and experience how fast font loading can be with an innovative font loading technique.',
			'agncy'
		);

		return apply_filters( 'the_content', $description );
	}

	/**
	 * Define the needed buttons
	 *
	 * @return array $buttons An array of button objects.
	 */
	private function define_buttons() {
		require_once AGNCY_THEME_PATH . '/inc/onboarding/class-onboarding-button.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$buttons = array();

		$buttons[] = new AgncyOnboardingButton(
			array(
				'label'               => __( 'Upgrade now!', 'agncy' ),
				'target'              => admin_url( 'themes.php?page=agncy-welcome_page-pricing' ),
				'classes'             => array( 'secondary', 'upgrade' ),
				'visibility_callback' => array( $this, 'is_not_enterprise' ),
			)
		);

		$buttons[] = new AgncyOnboardingButton(
			array(
				'label'   => __( 'Documentation', 'agncy' ),
				'target'  => 'https://help.wp-munich.com',
				'classes' => array( 'secondary', 'docs' ),
			)
		);

		return apply_filters( 'agncy_onboarding_buttons', $buttons );
	}

	/**
	 * Render the onboarding buttons
	 *
	 * @return string The HTML markup for the buttons.
	 */
	private function render_buttons() {

		$buttons_html = '<div class="btn-row">';

		$buttons = $this->define_buttons();
		foreach ( $buttons as $button ) {
			$buttons_html .= $button->render();
		}

		$buttons_html .= '</div>';
		return $buttons_html;
	}

	/**
	 * Define the agncy onboarding features
	 *
	 * @return array An array of feature objects
	 */
	private function define_features() {
		require_once AGNCY_THEME_PATH . '/inc/onboarding/class-onboarding-feature.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$features = array();

		$features[] = new AgncyOnboardingFeature(
			array(
				'title'       => __( 'Color Schemes', 'agncy' ),
				'description' => __( 'Customize your website with amazing color schemes crafted by our designers.', 'agncy' ),
				'tier'        => 'free',
				'image'       => AGNCY_THEME_URL . '/img/features/color-schemes.jpg',
				'link_target' => admin_url( 'customize.php?autofocus[control]=agncy_color_theme_name' ),
				'link_label'  => __( 'Customize Colors', 'agncy' ),
				'priority'    => 10,
			)
		);

		$features[] = new AgncyOnboardingFeature(
			array(
				'title'       => __( 'Even More Colors', 'agncy' ),
				'description' => __( 'Select your favorite colors from 26 available schemes for your site!', 'agncy' ),
				'tier'        => 'professional',
				'image'       => AGNCY_THEME_URL . '/img/features/more-color-schemes.jpg',
				'link_target' => admin_url( 'customize.php?autofocus[control]=agncy_color_theme_name' ),
				'link_label'  => __( 'Customize Colors', 'agncy' ),
				'priority'    => 10,
			)
		);

		$features[] = new AgncyOnboardingFeature(
			array(
				'title'       => __( 'Custom Color Schemes', 'agncy' ),
				'description' => __( 'Create custom color schemes without any limits to fit to your design.', 'agncy' ),
				'tier'        => 'enterprise',
				'image'       => AGNCY_THEME_URL . '/img/features/custom-colors.jpg',
				'link_target' => admin_url( 'customize.php' ),
				'link_label'  => __( 'Customize Schemes', 'agncy' ),
				'priority'    => 10,
			)
		);

		$features[] = new AgncyOnboardingFeature(
			array(
				'title'       => __( 'Footer Message', 'agncy' ),
				'description' => __( 'Make your site your own and customise the message in the footer.', 'agncy' ),
				'tier'        => 'professional',
				'image'       => AGNCY_THEME_URL . '/img/features/footer-text.jpg',
				'link_target' => admin_url( 'customize.php?autofocus[control]=footer_text' ),
				'link_label'  => __( 'Set Footer Message', 'agncy' ),
				'priority'    => 10,
			)
		);

		$features[] = new AgncyOnboardingFeature(
			array(
				'title'       => __( 'Gutenberg Ready', 'agncy' ),
				'description' => __( 'This theme is ready for Gutenberg, the new block based WordPress editor.', 'agncy' ),
				'tier'        => 'free',
				'image'       => AGNCY_THEME_URL . '/img/features/gutenberg.jpg',
				'link_target' => __( 'https://wordpress.org/gutenberg/', 'agncy' ),
				'link_label'  => __( 'Explore Gutenberg', 'agncy' ),
				'priority'    => 10,
			)
		);

		$features[] = new AgncyOnboardingFeature(
			array(
				'title'       => __( 'Custom Headers', 'agncy' ),
				'description' => __( 'Choose between countless variations and use the header that best fits your needs.', 'agncy' ),
				'tier'        => 'professional',
				'image'       => AGNCY_THEME_URL . '/img/features/custom-header.jpg',
				'link_target' => admin_url( 'customize.php?autofocus[control]=agncy_header_layout' ),
				'link_label'  => __( 'Modify Header', 'agncy' ),
				'priority'    => 10,
			)
		);

		return apply_filters( 'agncy_onboarding_features', $features );
	}

	/**
	 * Render the onboarding fetures
	 *
	 * @return string The markup of the onboarding feautres
	 */
	private function render_features() {

		$features_html = '';

		$features = $this->define_features();
		foreach ( $features as $feature ) {
			$features_html .= $feature->render();
		}

		return $features_html;
	}

	/**
	 * Helper functions
	 */

	/**
	 * Check if this license is lower than enterprise
	 *
	 * @return boolean If the current plan is lower than enterprise
	 */
	public function is_not_enterprise() {
		return ! agncy_fs()->is_premium() || ! agncy_fs()->is_plan( 'enterprise' );
	}

}
new AgncyAdminPages();
