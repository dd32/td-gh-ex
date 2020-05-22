<?php
/**
 * This file implements custom requirements for the SpiceBox Plugin.
 * It can be used as-is in themes (drop-in).
 *
 */

$hide_install = get_option('content_hide_customizer_companion_notice', false);
if (!function_exists('spicethemes_companion') && !$hide_install) {
	if (class_exists('WP_Customize_Section') && !class_exists('Content_Companion_Installer_Section')) {
		/**
		 *
		 * @see WP_Customize_Section
		 */
		class Content_Companion_Installer_Section extends WP_Customize_Section {
			/**
			 * Customize section type.
			 *
			 * @access public
			 * @var string
			 */
			public $type = 'content_companion_installer';

			public function __construct($manager, $id, $args = array()) {
				parent::__construct($manager, $id, $args);

				add_action('customize_controls_enqueue_scripts', 'Content_Companion_Installer_Section::enqueue');
			}

			/**
			 * enqueue styles and scripts
			 *
			 *
			 **/
			public static function enqueue() {
				wp_enqueue_script('plugin-install');
				wp_enqueue_script('updates');
				wp_enqueue_script('content-companion-install', ST_TEMPLATE_DIR_URI . '/assets/js/plugin-install.js', array('jquery'));
				wp_localize_script('content-companion-install', 'content_companion_install',
					array(
						'installing' => esc_html__('Installing', 'content'),
						'activating' => esc_html__('Activating', 'content'),
						'error'      => esc_html__('Error', 'content'),
						'ajax_url'   => esc_url(admin_url('admin-ajax.php')),
					)
				);
			}
			/**
			 * Render the section.
			 *
			 * @access protected
			 */
			protected function render() {
				// Determine if the plugin is not installed, or just inactive.
				$plugins   = get_plugins();
				$installed = false;
				foreach ($plugins as $plugin) {
					if ('SpiceBox' === $plugin['Name']) {
						$installed = true;
					}
				}
				$slug = 'spicebox';
				// Get the plugin-installation URL.
				$classes            = 'cannot-expand accordion-section control-section-companion control-section control-section-themes control-section-' . $this->type;
				?>
				<li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="<?php echo esc_attr($classes); ?>">
					<span class="spicethemes-customizer-notification-dismiss" id="companion-install-dismiss" href="#companion-install-dismiss"> <i class="fa fa-times"></i></span>
					<?php if (!$installed): ?>
					<?php 
						$plugin_install_url = add_query_arg(
							array(
								'action' => 'install-plugin',
								'plugin' => $slug,
							),
							self_admin_url('update.php')
						);
						$plugin_install_url = wp_nonce_url($plugin_install_url, 'install-plugin_spicethemes-companion');
					 ?>
						<p><?php esc_html_e("To take advantage of this theme's features in the customizer you need to install the SpiceBox plugin.", "content");?></p>
						<a class="spicethemes-plugin-install install-now button-secondary button" href="<?php echo esc_url($plugin_install_url); ?>" aria-label="<?php esc_attr_e('Install SpiceBox Now', 'content');?>" data-name="<?php esc_attr_e('SpiceBox', 'content'); ?>">
							<?php esc_html_e('Install and activate', 'content');?>
						</a>
					<?php else: ?>
						<?php 
							$plugin_link_suffix = $slug . '/' . $slug . '.php';
							$plugin_activate_link = add_query_arg(
								array(
									'action'        => 'activate',
									'plugin'        => rawurlencode( $plugin_link_suffix ),
									'plugin_status' => 'all',
									'paged'         => '1',
									'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_link_suffix ),
								), self_admin_url( 'plugins.php' )
							);
						?>
						<p><?php esc_html_e("You have installed the SpiceBox plugin. To take advantage of this theme's features in the customizer, you need to activate it.", "content");?></p>
						<a class="spicethemes-plugin-activate activate-now button-primary button" data-slug="spicethemes-companion" href="<?php echo esc_url($plugin_activate_link); ?>" aria-label="<?php esc_attr_e('Activate SpiceBox now', 'content');?>" data-name="<?php esc_attr_e('SpiceBox', 'content'); ?>">
							<?php esc_html_e('Activate now', 'content');?>
						</a>
					<?php endif;?>
				</li>
				<?php
			}
		}
	}
	if (!function_exists('content_companion_installer_register')) {
		/**
		 * Registers the section, setting & control for the SpiceBox installer.
		 *
		 * @param object $wp_customize The main customizer object.
		 */
		function content_companion_installer_register($wp_customize) {
			$wp_customize->add_section(new Content_Companion_Installer_Section($wp_customize, 'content_companion_installer', array(
				'title'      => '',
				'capability' => 'install_plugins',
				'priority'   => 0,
			)));

		}
		add_action('customize_register', 'content_companion_installer_register');
	}
}

function content_hide_customizer_companion_notice(){
	update_option('content_hide_customizer_companion_notice', true);
	echo true;
	wp_die();
}
add_action('wp_ajax_content_hide_customizer_companion_notice', 'content_hide_customizer_companion_notice');