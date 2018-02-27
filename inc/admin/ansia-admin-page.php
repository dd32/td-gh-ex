<?php
/**
 * Ansia Admin Class.
 * @author  CrestaProject
 * @package Ansia
 * @since   1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Ansia_Admin' ) ) :
/**
 * Ansia_Admin Class.
 */
class Ansia_Admin {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}
	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );
		global $ansia_adminpage;
		$ansia_adminpage = add_theme_page( esc_html__( 'About', 'ansia' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'ansia' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'ansia-welcome', array( $this, 'welcome_screen' ) );
	}
	/**
	 * Enqueue styles.
	 */
	public function enqueue_admin_scripts() {
		global $ansia_adminpage;
		$screen = get_current_screen();
		if ( $screen->id != $ansia_adminpage ) {
			return;
		}
		wp_enqueue_style( 'ansia-welcome', get_template_directory_uri() . '/inc/admin/welcome.css', array(), '1.0' );
		wp_enqueue_script( 'ansia-admin-panel', get_template_directory_uri() . '/inc/admin/admin-panel.js', array('jquery'), '1.0', true );
	}
	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $pagenow;
		wp_enqueue_style( 'ansia-message', get_template_directory_uri() . '/inc/admin/message.css', array(), '1.0' );
		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'ansia_admin_notice_welcome', 1 );
		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'ansia_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}
	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['ansia-hide-notice'] ) && isset( $_GET['_ansia_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( sanitize_key($_GET['_ansia_notice_nonce'] ), 'ansia_hide_notices_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'ansia' ) );
			}
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'ansia' ) );
			}
			$hide_notice = sanitize_text_field( wp_unslash($_GET['ansia-hide-notice'] ));
			update_option( 'ansia_admin_notice_' . $hide_notice, 1 );
		}
	}
	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated cresta-message">
			<a class="cresta-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'ansia-hide-notice', 'welcome' ) ), 'ansia_hide_notices_nonce', '_ansia_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'ansia' ); ?></a>
			<p>
			<?php
			/* translators: 1: start option panel link, 2: end option panel link */
			printf( esc_html__( 'Welcome! Thank you for choosing Ansia theme! To fully take advantage of the best our theme can offer and read the documentation please make sure you visit our %1$swelcome page%2$s.', 'ansia' ), '<a href="' . esc_url( admin_url( 'themes.php?page=ansia-welcome' ) ) . '">', '</a>' );
			?>
			</p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=ansia-welcome' ) ); ?>"><?php esc_html_e( 'Get started with Ansia', 'ansia' ); ?></a>
			</p>
		</div>
		<?php
	}
	/**
	 * Intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function intro() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="cresta-theme-info">
			<h1>
				<?php esc_html_e('About', 'ansia'); ?>
				<?php echo esc_html($theme->get( 'Name' )) ." ". esc_html($theme->get( 'Version' )); ?>
			</h1>
			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo esc_html($theme->display( 'Description' )); ?>
				<p class="cresta-actions">
					<a href="<?php echo esc_url( apply_filters( 'ansia_pro_theme_url', 'https://crestaproject.com/downloads/ansia/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'ansia' ); ?></a>

					<a href="<?php echo esc_url( apply_filters( 'ansia_pro_theme_url', 'https://crestaproject.com/demo/ansia/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'ansia' ); ?></a>
					
					<a href="<?php echo esc_url( apply_filters( 'ansia_pro_theme_url', 'https://crestaproject.com/demo/ansia-pro/' ) ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version Demo', 'ansia' ); ?></a>
					
					<a href="<?php echo esc_url( apply_filters( 'ansia_pro_theme_url', 'https://wordpress.org/support/theme/ansia/reviews/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rate this theme', 'ansia' ); ?></a>
				</p>
				</div>
				<div class="cresta-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && isset( $_GET['page'] ) && $_GET['page'] == 'ansia-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ansia-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html($theme->display( 'Name' )); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ansia-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs PRO', 'ansia' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'documentation' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ansia-welcome', 'tab' => 'documentation' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Documentation', 'ansia' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ansia-welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Changelog', 'ansia' ); ?>
			</a>
		</h2>
		<?php
	}
	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( wp_unslash($_GET['tab']) );
		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}
		// Fallback to about screen.
		return $this->about_screen();
	}
	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">
			<?php $this->intro(); ?>
			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'ansia' ); ?></h3>
						<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'ansia' ) ?></p>
						<p><a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'ansia' ); ?></a></p>
					</div>
					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'ansia' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our support forum.', 'ansia' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/support/theme/ansia/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support', 'ansia' ); ?></a></p>
					</div>
					<div class="col">
						<h3><?php esc_html_e( 'Need more features?', 'ansia'); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'ansia' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://crestaproject.com/downloads/ansia/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Info about PRO version', 'ansia' ); ?></a></p>
					</div>
					<div class="col">
						<h3>
							<?php
							esc_html_e( 'Translate', 'ansia' );
							echo ' ' . esc_html($theme->display( 'Name' ));
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'ansia' ) ?></p>
						<p>
							<a target="_blank" href="<?php echo esc_url( 'http://translate.wordpress.org/projects/wp-themes/ansia' ); ?>" class="button button-secondary">
								<?php
								esc_html_e( 'Translate', 'ansia' );
								echo ' ' . esc_html($theme->display( 'Name' ));
								?>
							</a>
						</p>
					</div>
				</div>
			</div>
			<div class="return-to-dashboard cresta">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'ansia' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'ansia' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'ansia' ) : esc_html_e( 'Go to Dashboard', 'ansia' ); ?></a>
			</div>
		</div>
		<?php
	}
	/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		global $wp_filesystem;
		?>
		<div class="wrap about-wrap">
			<?php $this->intro(); ?>
			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'ansia' ); ?></p>
			<?php
				$changelog_file = apply_filters( 'ansia_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<?php
	}
	/**
	 * Parse changelog from readme file.
	 * @param  string $content
	 * @return string
	 */
	private function parse_changelog( $content ) {
		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';
		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}
		return wp_kses_post( $changelog );
	}
	/**
	 * Output the documentation screen.
	 */
	public function documentation_screen() {
		?>
		<div class="wrap about-wrap">
			<?php $this->intro(); ?>
			<p class="about-description"><?php esc_html_e( 'Ansia WordPress Theme Documentation', 'ansia' ); ?></p>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to add social icons', 'ansia' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="ansiaDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Ansia Theme Options-> Social Buttons". Here you can choose which social network to show, social icons will be displayed in the footer and in the push sidebar.', 'ansia' ); ?>
								</div>
								<div class="ansiaDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/ansia-documentation-1.jpg'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to add custom logo', 'ansia' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="ansiaDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Site Identity". Here you can upload your custom logo (size 500x350px).', 'ansia' ); ?>
								</div>
								<div class="ansiaDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/ansia-documentation-2.jpg'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to change theme colors', 'ansia' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="ansiaDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Ansia Theme Options-> Colors". Here you can change the theme colors according to sections of the site (header, content and footer).', 'ansia' ); ?>
								</div>
								<div class="ansiaDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/ansia-documentation-3.jpg'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to display page loader', 'ansia' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="ansiaDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Ansia Theme Options-> General Settings", find the option called "Show page loader" and check it. The background will be the same of "Background color" and the loader icon the same color of "Text color".', 'ansia' ); ?>
								</div>
								<div class="ansiaDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/ansia-documentation-4.jpg'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to highlight a menu item', 'ansia' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="ansiaDocText">
									<?php esc_html_e( 'If you need to emphasize a menu item (call to action, donate button, etc..) just go to your WordPress Dashboard under "Appearance-> Menus". Create a new "Custom Links" and drag it into the menu. Expand the entry and in the "CSS Classes" section write: crestaMenuButton', 'ansia' ); ?>
								</div>
								<div class="ansiaDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/ansia-documentation-5.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="ansiaDocText">
									<?php esc_html_e( 'This will be the result (the colors change according to the ones chosen).', 'ansia' ); ?>
								</div>
								<div class="ansiaDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/ansia-documentation-6.jpg'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">
			<?php $this->intro(); ?>
			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'ansia' ); ?></p>
			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e('Features', 'ansia'); ?></h3></th>
						<th><h3><?php esc_html_e('Ansia', 'ansia'); ?></h3></th>
						<th><h3><?php esc_html_e('Ansia PRO', 'ansia'); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e('Theme Options made with the WP Customizer', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Responsive Design', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Logo Upload', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Unlimited Text and Background Color', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Choose Social Icons', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('+ more social buttons', 'ansia'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('WooCommerce Compatibility', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('RTL Support', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Sidebar and Footer Widgets', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Loading Page', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('1 loader', 'ansia'); ?></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('7 loaders', 'ansia'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Post Slider', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Google Fonts switcher', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Manage sidebar position', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Sticky Sidebar', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Post views counter', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('8 Exclusive Widgets', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Related Posts Box', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Information About Author Box', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('PowerTip, LightBox, Custom Copyright Text and much more...', 'ansia'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'ansia_pro_theme_url', 'https://crestaproject.com/demo/ansia-pro/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View PRO version demo', 'ansia' ); ?></a>
							<a href="<?php echo esc_url( apply_filters( 'ansia_pro_theme_url', 'https://crestaproject.com/downloads/ansia/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Get Ansia PRO', 'ansia' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php
	}
}
endif;
return new Ansia_Admin();