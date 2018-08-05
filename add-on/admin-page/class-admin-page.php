<?php
/**
 * Display Aamla theme admin page in Dashboard > Appearance.
 *
 * @package Aamla
 * @since 1.0.2
 */

namespace aamla;

/**
 * Display Aamla theme admin page in Dashboard > Appearance.
 *
 * @since  1.0.2
 */
class Admin_Page {

	/**
	 * Constructor method.
	 *
	 * @since  1.0.2
	 */
	public function __construct() {}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.2
	 */
	public function init() {
		global $pagenow;

		// Add Welcome message on Theme activation.
		if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', [ $this, 'welcome_theme_notice' ], 99 );
		}

		// Add Aamla theme help page to Dashboard > appearance.
		add_action( 'admin_menu', [ $this, 'add_theme_page' ] );
	}

	/**
	 * Display Welcome Message on Theme activation.
	 *
	 * @since  1.0.2
	 *
	 * @return void
	 */
	public function welcome_theme_notice() {
		// Since Manta is not the active theme, let user know Manta Plus will not work.
		printf(
			'<div class="updated notice is-dismissible theme-welcome-notice">
				<p>%s</p><p>%s</p><a href="%s">%s</a><p>%s</p><p>%s</p>
			</div>',
			esc_html__( 'Hi there!', 'aamla' ),
			esc_html__( 'Thanks for trying Aamla. Just need to inform that Aamla has some unique and powerful features. Knowing them in advance will certainly help to build your site. Use following link to quickly go through these features.', 'aamla' ),
			esc_url( admin_url( 'themes.php?page=aamla-docs' ) ),
			esc_html__( 'Getting started with Aamla', 'aamla' ),
			esc_html__( 'If you cannot read it now, you can find quick documentation later at Appearance > Aamla Docs.', 'aamla' ),
			esc_html__( 'Thank You', 'aamla' )
		);

		?>
		<style type="text/css" media="screen">

			.notice.theme-welcome-notice {
				padding: 2.5em 5em;
				background: rgba(0,0,0,.01);
				border: 1em solid rgba(255,255,255,.85);
			}

			.notice.theme-welcome-notice p,
			.notice.theme-welcome-notice a {
				font-size: 14px;
			}

		</style>

		<?php
	}

	/**
	 * Add theme specific help & support page on Admin screen.
	 *
	 * @since 1.0.2
	 */
	public function add_theme_page() {
		$aamla_page = add_theme_page(
			// Page Title.
			esc_html__( 'Aamla Docs', 'aamla' ),
			// Menu Title.
			esc_html__( 'Aamla Docs', 'aamla' ),
			// Capability.
			'edit_theme_options',
			// Menu Slug.
			'aamla-docs',
			// Render Function.
			[ $this, 'render' ]
		);

		if ( $aamla_page ) {
			$aamla_page = esc_html( $aamla_page );

			// Register theme options page specific styles.
			add_action( "admin_print_styles-$aamla_page", [ $this, 'enqueue_styles' ] );

			// Register theme options page specific scripts.
			add_action( "admin_print_scripts-$aamla_page", [ $this, 'enqueue_scripts' ] );
		}
	}

	/**
	 * Render markup for Aamla theme support page.
	 *
	 * @since 1.0.2
	 */
	public function render() {
		aamla_get_template_partial( 'add-on/admin-page', 'theme-page-display' );
	}

	/**
	 * Enqueue styles to the Admin page.
	 *
	 * @since 1.0.2
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			'aamla_admin_page_style',
			get_template_directory_uri() . '/add-on/admin-page/assets/admin-page.css',
			[],
			AAMLA_THEME_VERSION,
			'all'
		);

		$fonts_url = 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400|Roboto:400,700';
		wp_enqueue_style( 'aamla-adminpage-font', esc_url_raw( $fonts_url ) );
	}

	/**
	 * Enqueue scripts to the Admin page.
	 *
	 * @since 1.0.2
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script(
			'aamla_admin_page_js',
			get_template_directory_uri() . '/add-on/admin-page/assets/admin-page.js',
			[ 'jquery' ],
			AAMLA_THEME_VERSION,
			'all'
		);
	}
}

$admin_page = new Admin_Page();
$admin_page->init();
