<?php
/************************ Arise tgm Plugin activation ************************/
/**
 * Plugin installation and activation for WordPress themes.
 *
 * Please note that this is a drop-in library for a theme or plugin.
 * The authors of this library (Thomas and Gary) are NOT responsible
 * for the support of your plugin or theme. Please contact the plugin
 * or theme author for support.
 *
 * @package   TGM-Plugin-Activation
 * @version   2.5.0-alpha
 * @link      http://tgmpluginactivation.com/
 * @author    Thomas Griffin
 * @author    Gary Jones
 * @copyright Copyright (c) 2011, Thomas Griffin
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: TGM Plugin Activation
 * Plugin URI:
 * Description: Plugin installation and activation for WordPress themes.
 * Version:     2.5.0-dev
 * Author:      griffinjt, garyj, jrf
 * Author URI:  http://tgmpluginactivation.com/
 * Text Domain: arise
 * Domain Path: /languages/
 * Copyright:   2011, Thomas Griffin
 */
/*
    Copyright 2011 Thomas Griffin (thomasgriffinmedia.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
    /**
     * Automatic plugin installation and activation library.
     *
     * Creates a way to automatically install and activate plugins from within themes.
     * The plugins can be either pre-packaged, downloaded from the WordPress
     * Plugin Repository or downloaded from another external source.
     *
     * @since 1.0.0
     *
     * @package TGM-Plugin-Activation
     * @author  Thomas Griffin
     * @author  Gary Jones
     */
    class TGM_Plugin_Activation {
        const WP_REPO_REGEX = '|^http[s]?://wordpress\.org/(?:extend/)?plugins/|';
        const IS_URL_REGEX = '|^http[s]?://|';
        public static $instance;
        public $plugins = array();
        protected $sort_order = array();
        protected $has_forced_activation = false;
        protected $has_forced_deactivation = false;
        public $id = 'arise';
        public $menu = 'arise-install-plugins';
        public $parent_slug = 'themes.php';
        public $capability = 'edit_theme_options';
        public $default_path = '';
        public $has_notices = true;
        public $dismissable = true;
        public $dismiss_msg = '';
        public $is_automatic = false;
        public $message = '';
        public $strings = array();
        public $wp_version;
        public $page_hook;
        protected function __construct() {
            // Set the current WordPress version.
            $this->wp_version = $GLOBALS['wp_version'];
            // Announce that the class is ready, and pass the object (for advanced use).
            do_action_ref_array( 'arise_init', array( $this ) );
            // When the rest of WP has loaded, kick-start the rest of the class.
            add_action( 'init', array( $this, 'init' ) );
        }
        public function init() {
            if ( apply_filters( 'arise_load', ! is_admin() ) ) {
                return;
            }
            // Load class strings.
            $this->strings = array(
                'page_title'                      => __( 'Install Required Plugins', 'arise' ),
                'menu_title'                      => __( 'Install Plugins', 'arise' ),
                'installing'                      => __( 'Installing Plugin: %s', 'arise' ),
                'oops'                            => __( 'Something went wrong with the plugin API.', 'arise' ),
                'notice_can_install_required'     => _n_noop(
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'arise'
                ),
                'notice_can_install_recommended'  => _n_noop(
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'arise'
                ),
                'notice_cannot_install'           => _n_noop(
                    'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                    'arise'
                ),
                'notice_ask_to_update'            => _n_noop(
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'arise'
                ),
                'notice_ask_to_update_maybe'      => _n_noop(
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'arise'
                ),
                'notice_cannot_update'            => _n_noop(
                    'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                    'arise'
                ),
                'notice_can_activate_required'    => _n_noop(
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'arise'
                ),
                'notice_can_activate_recommended' => _n_noop(
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'arise'
                ),
                'notice_cannot_activate'          => _n_noop(
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                    'arise'
                ),
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'arise'
                ),
                'update_link'                     => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'arise'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'arise'
                ),
                'return'                          => __( 'Return to Required Plugins Installer', 'arise' ),
                'dashboard'                       => __( 'Return to the dashboard', 'arise' ),
                'plugin_activated'                => __( 'Plugin activated successfully.', 'arise' ),
                'activated_successfully'          => __( 'The following plugin was activated successfully:', 'arise' ),
                'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'arise' ),
                'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'arise' ),
                'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'arise' ),
                'dismiss'                         => __( 'Dismiss this notice', 'arise' ),
                'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'arise' ),
            );
            do_action( 'arise_register' );
            // After this point, the plugins should be registered and the configuration set.
            // Proceed only if we have plugins to handle.
            if ( ! is_array( $this->plugins ) || empty( $this->plugins ) ) {
                return;
            }
            // Set up the menu and notices if we still have outstanding actions.
            if ( true !== $this->is_arise_complete() ) {
                // Sort the plugins
                array_multisort( $this->sort_order, SORT_ASC, $this->plugins );
                add_action( 'admin_menu', array( $this, 'admin_menu' ) );
                add_action( 'admin_head', array( $this, 'dismiss' ) );
                // Prevent the normal links from showing underneath an single install/update page
                add_filter( 'install_plugin_complete_actions', array( $this, 'actions' ) );
                add_filter( 'update_plugin_complete_actions', array( $this, 'actions' ) );
                if ( $this->has_notices ) {
                    add_action( 'admin_notices', array( $this, 'notices' ) );
                    add_action( 'admin_init', array( $this, 'admin_init' ), 1 );
                    add_action( 'admin_enqueue_scripts', array( $this, 'thickbox' ) );
                }
                $this->add_plugin_action_link_filters();
            }
            // Make sure things get reset on switch theme
            add_action( 'switch_theme', array( $this, 'flush_plugins_cache' ) );
            if ( $this->has_notices ) {
                add_action( 'switch_theme', array( $this, 'update_dismiss' ) );
            }
            // Setup the force activation hook.
            if ( true === $this->has_forced_activation ) {
                add_action( 'admin_init', array( $this, 'force_activation' ) );
            }
            // Setup the force deactivation hook.
            if ( true === $this->has_forced_deactivation ) {
                add_action( 'switch_theme', array( $this, 'force_deactivation' ) );
            }
        }
        public function add_plugin_action_link_filters() {
            foreach ( $this->plugins as $slug => $plugin ) {
                if ( false === $this->can_plugin_activate( $slug ) ) {
                    add_filter( 'plugin_action_links_' . $plugin['file_path'], array( $this, 'filter_plugin_action_links_activate' ), 20 );
                }
                if ( true === $plugin['force_activation'] ) {
                    add_filter( 'plugin_action_links_' . $plugin['file_path'], array( $this, 'filter_plugin_action_links_deactivate' ), 20 );
                }
                if ( false !== $this->does_plugin_require_update( $slug ) ) {
                    add_filter( 'plugin_action_links_' . $plugin['file_path'], array( $this, 'filter_plugin_action_links_update' ), 20 );
                }
            }
        }
        public function filter_plugin_action_links_activate( $actions ) {
            unset( $actions['activate'] );
            return $actions;
        }
        public function filter_plugin_action_links_deactivate( $actions ) {
            unset( $actions['deactivate'] );
            return $actions;
        }
        public function filter_plugin_action_links_update( $actions ) {
            $actions['update'] = sprintf(
                '<a href="%1$s" title="%2$s" class="edit">%3$s</a>',
                esc_url( $this->get_arise_status_url( 'update' ) ),
                esc_attr__( 'This plugin needs to be updated to be compatible with your theme.', 'arise' ),
                esc_html__( 'Update Required', 'arise' )
            );
            return $actions;
        }
        public function admin_init() {
            if ( ! $this->is_arise_page() ) {
                return;
            }
            if ( isset( $_REQUEST['tab'] ) && 'plugin-information' === $_REQUEST['tab'] ) {
                // Needed for install_plugin_information().
                require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                wp_enqueue_style( 'plugin-install' );
                global $tab, $body_id;
                $body_id = 'plugin-information';
                $tab     = 'plugin-information';
                install_plugin_information();
                exit;
            }
        }
        public function thickbox() {
            if ( ! get_user_meta( get_current_user_id(), 'arise_dismissed_notice_' . $this->id, true ) ) {
                add_thickbox();
            }
        }
        public function admin_menu() {
            // Make sure privileges are correct to see the page
            if ( ! current_user_can( 'install_plugins' ) ) {
                return;
            }
            $args = apply_filters(
                'arise_admin_menu_args',
                array(
                    'parent_slug' => $this->parent_slug,                     // Parent Menu slug.
                    'page_title'  => $this->strings['page_title'],           // Page title.
                    'menu_title'  => $this->strings['menu_title'],           // Menu title.
                    'capability'  => $this->capability,                      // Capability.
                    'menu_slug'   => $this->menu,                            // Menu slug.
                    'function'    => array( $this, 'install_plugins_page' ), // Callback.
                )
            );
            $this->add_admin_menu( $args );
        }
        /**
         * Add the menu item.
         *
         * @since 2.5.0
         *
         * @param array $args Menu item configuration.
         */
        protected function add_admin_menu( array $args ) {
            if ( apply_filters( 'arise_admin_menu_use_add_theme_page', true ) ) {
                $this->page_hook = call_user_func( 'add_theme_page', $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
            } else {
                $this->page_hook = call_user_func( 'add_theme_page', $args['parent_slug'], $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
            }
        }
        public function install_plugins_page() {
            // Store new instance of plugin table in object.
            $plugin_table = new TGMPA_List_Table;
            // Return early if processing a plugin installation action.
            if ( ( ( 'arise-bulk-install' === $plugin_table->current_action() || 'arise-bulk-update' === $plugin_table->current_action() ) && $plugin_table->process_bulk_actions() ) || $this->do_plugin_install() ) {
                return;
            }
            // Force refresh of available plugin information so we'll know about manual updates/deletes.
            wp_clean_plugins_cache( false );
            ?>
            <div class="arise wrap">
                <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
                <?php $plugin_table->prepare_items(); ?>

                <?php
                if ( ! empty( $this->message ) && is_string( $this->message ) ) {
                    echo wp_kses_post( $this->message );
                }
                ?>
                <?php $plugin_table->views(); ?>

                <form id="arise-plugins" action="" method="post">
                    <input type="hidden" name="arise-page" value="<?php echo esc_attr( $this->menu ); ?>" />
                    <input type="hidden" name="plugin_status" value="<?php echo esc_attr( $plugin_table->view_context ); ?>" />
                    <?php $plugin_table->display(); ?>
                </form>

            </div>
            <?php
        }
        protected function do_plugin_install() {
            if ( empty( $_GET['plugin'] ) ) {
                return false;
            }
            // All plugin information will be stored in an array for processing.
            $plugin = array();
            $slug   = sanitize_key( urldecode( $_GET['plugin'] ) );
            if ( ! isset( $this->plugins[ $slug ] ) ) {
                return false;
            }
            // Checks for actions from hover links to process the installation.
            if ( ( isset( $_GET['arise-install'] ) && 'install-plugin' === $_GET['arise-install'] ) || ( isset( $_GET['arise-update'] ) && 'update-plugin' === $_GET['arise-update'] ) ) {
                $install_type = 'install';
                if ( isset( $_GET['arise-update'] ) && 'update-plugin' === $_GET['arise-update'] ) {
                    $install_type = 'update';
                }
                check_admin_referer( 'arise-' . $install_type, 'arise-nonce' );
                // Pass necessary information via URL if WP_Filesystem is needed.
                $url = wp_nonce_url(
                    add_query_arg(
                        array(
                            'plugin'                 => urlencode( $slug ),
                            'arise-' . $install_type => $install_type . '-plugin',
                        ),
                        $this->get_arise_url()
                    ),
                    'arise-' . $install_type,
                    'arise-nonce'
                );
                $method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
                if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, array() ) ) ) {
                    return true;
                }
                if ( ! WP_Filesystem( $creds ) ) {
                    request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, array() ); // Setup WP_Filesystem.
                    return true;
                }
                // If we arrive here, we have the filesystem
                // Prep variables for Plugin_Installer_Skin class.
                $extra['slug'] = $slug; // Needed for potentially renaming of directory name
                $source        = $this->get_download_url( $slug );
                $api           = ( 'repo' === $this->plugins[ $slug ]['source_type'] ) ? $this->get_plugins_api( $slug ) : null;
                $api           = ( false !== $api ) ? $api : null;
                $url = add_query_arg(
                    array(
                        'action' => $install_type . '-plugin',
                        'plugin' => urlencode( $slug )
                    ),
                    'update.php'
                );
                if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
                }
                $skin_args = array(
                    'type'   => ( 'bundled' !== $this->plugins[ $slug ]['source_type'] ) ? 'web' : 'upload',
                    'title'  => sprintf( $this->strings['installing'], $this->plugins[ $slug ]['name'] ),
                    'url'    => esc_url_raw( $url ),
                    'nonce'  => $install_type . '-plugin_' . $slug,
                    'plugin' => '',
                    'api'    => $api,
                    'extra'  => $extra,
                );
                if ( 'update' === $install_type ) {
                    $skin_args['plugin'] = $this->plugins[ $slug ]['file_path'];
                    $skin                = new Plugin_Upgrader_Skin( $skin_args );
                } else {
                    $skin = new Plugin_Installer_Skin( $skin_args );
                }
                // Create a new instance of Plugin_Upgrader.
                $upgrader = new Plugin_Upgrader( $skin );
                // Perform the action and install the plugin from the $source urldecode().
                add_filter( 'upgrader_source_selection', array( $this, 'maybe_adjust_source_dir' ), 1, 3 );
                if ( 'update' === $install_type ) {
                    // Inject our info into the update transient
                    $to_inject                    = array( $slug => $this->plugins[ $slug ] );
                    $to_inject[ $slug ]['source'] = $source;
                    $this->inject_update_info( $to_inject );
                    $upgrader->upgrade( $this->plugins[ $slug ]['file_path'] );
                } else {
                    $upgrader->install( $source );
                }
                remove_filter( 'upgrader_source_selection', array( $this, 'maybe_adjust_source_dir' ), 1, 3 );
                // Make sure we have the correct file path now the plugin is installed/updated.
                $this->populate_file_path( $slug );
                // Only activate plugins if the config option is set to true and the plugin isn't
                // already active (upgrade).
                if ( $this->is_automatic && ! $this->is_plugin_active( $slug ) ) {
                    $plugin_activate = $upgrader->plugin_info(); // Grab the plugin info from the Plugin_Upgrader method.
                    if ( false === $this->activate_single_plugin( $plugin_activate, $slug, true ) ) {
                        return true; // Finish execution of the function early as we encountered an error
                    }
                }
                // Display message based on if all plugins are now active or not.
                if ( $this->is_arise_complete() ) {
                    echo '<p>', sprintf( esc_html( $this->strings['complete'] ), '<a href="' . esc_url( self_admin_url() ) . '">' . esc_html__( 'Return to the Dashboard', 'arise' ) . '</a>' ), '</p>';
                    echo '<style type="text/css">#adminmenu .wp-submenu li.current { display: none !important; }</style>';
                } else {
                    echo '<p><a href="', esc_url( $this->get_arise_url() ), '" target="_parent">', esc_html( $this->strings['return'] ), '</a></p>';
                }
                return true;
            }
            // Checks for actions from hover links to process the activation.
            elseif ( isset( $this->plugins[ $slug ]['file_path'], $_GET['arise-activate'] ) && 'activate-plugin' === $_GET['arise-activate'] ) {
                check_admin_referer( 'arise-activate', 'arise-nonce' );
                if ( false === $this->activate_single_plugin( $this->plugins[ $slug ]['file_path'], $slug ) ) {
                    return true; // Finish execution of the function early as we encountered an error
                }
            }
            return false;
        }
        public function inject_update_info( $plugins ) {
            $repo_updates = get_site_transient( 'update_plugins' );
            if ( ! is_object( $repo_updates ) ) {
                $repo_updates = new stdClass;
            }
            foreach ( $plugins as $slug => $plugin ) {
                $file_path = $plugin['file_path'];
                if ( empty( $repo_updates->response[ $file_path ] ) ) {
                    $repo_updates->response[ $file_path ] = new stdClass;
                }
                // We only really need to set package, but let's do all we can in case WP changes something.
                $repo_updates->response[ $file_path ]->slug        = $slug;
                $repo_updates->response[ $file_path ]->plugin      = $file_path;
                $repo_updates->response[ $file_path ]->new_version = $plugin['version'];
                $repo_updates->response[ $file_path ]->package     = $plugin['source'];
                if ( empty( $repo_updates->response[ $file_path ]->url ) && ! empty( $plugin['external_url'] ) ) {
                    $repo_updates->response[ $file_path ]->url = $plugin['external_url'];
                }
            }
            set_site_transient( 'update_plugins', $repo_updates );
        }
        public function maybe_adjust_source_dir( $source, $remote_source, $upgrader ) {
            if ( ! $this->is_arise_page() ) {
                return $source;
            }
            // Check for single file plugins
            $source_files = array_keys( $GLOBALS['wp_filesystem']->dirlist( $remote_source ) );
            if ( 1 === count( $source_files ) && false === $GLOBALS['wp_filesystem']->is_dir( $source ) ) {
                return $source;
            }
            // Multi-file plugin, let's see if the directory is correctly named
            $desired_slug = '';
            // Figure out what the slug is supposed to be
            if ( false === $upgrader->bulk && ! empty ( $upgrader->skin->options['extra']['slug'] ) ) {
                $desired_slug = $upgrader->skin->options['extra']['slug'];
            } else {
                // Bulk installer contains less info, so fall back on the info registered here.
                foreach ( $this->plugins as $slug => $plugin ) {
                    if ( ! empty( $upgrader->skin->plugin_names[ $upgrader->skin->i ] ) && $plugin['name'] === $upgrader->skin->plugin_names[ $upgrader->skin->i ] ) {
                        $desired_slug = $slug;
                        break;
                    }
                }
                unset( $slug, $plugin );
            }
            if ( ! empty( $desired_slug ) ) {
                $subdir_name = untrailingslashit( str_replace( trailingslashit( $remote_source ), '', $source ) );
                if ( ! empty( $subdir_name ) && $subdir_name !== $desired_slug ) {
                    $from = untrailingslashit( $source );
                    $to   = trailingslashit( $remote_source ) . $desired_slug;
                    if ( true === $GLOBALS['wp_filesystem']->move( $from, $to ) ) {
                        return trailingslashit( $to );
                    } else {
                        return new WP_Error( 'rename_failed', esc_html__( 'The remote plugin package does not contain a folder with the desired slug and renaming did not work.', 'arise' ) . ' ' . esc_html__( 'Please contact the plugin provider and ask them to package their plugin according to the WordPress guidelines.', 'arise' ), array( 'found' => $subdir_name, 'expected' => $desired_slug ) );
                    }
                } elseif ( empty( $subdir_name ) ) {
                    return new WP_Error( 'packaged_wrong', esc_html__( 'The remote plugin package consists of more than one file, but the files are not packaged in a folder.', 'arise' ) . ' ' . esc_html__( 'Please contact the plugin provider and ask them to package their plugin according to the WordPress guidelines.', 'arise' ), array( 'found' => $subdir_name, 'expected' => $desired_slug ) );
                }
            }
            return $source;
        }
        protected function activate_single_plugin( $file_path, $slug, $automatic = false ) {
            if ( $this->can_plugin_activate( $slug ) ) {
                $activate = activate_plugin( $file_path );
                if ( is_wp_error( $activate ) ) {
                    echo '<div id="message" class="error"><p>', wp_kses_post( $activate->get_error_message() ), '</p></div>',
                        '<p><a href="', esc_url( $this->get_arise_url() ), '" target="_parent">', esc_html( $this->strings['return'] ), '</a></p>';
                    return false; // End it here if there is an error with activation.
                } else {
                    if ( ! $automatic ) {
                        // Make sure message doesn't display again if bulk activation is performed
                        // immediately after a single activation.
                        if ( ! isset( $_POST['action'] ) ) {
                            echo '<div id="message" class="updated"><p>', esc_html( $this->strings['activated_successfully'] ), ' <strong>', esc_html( $this->plugins[ $slug ]['name'] ), '.</strong></p></div>';
                        }
                    } else {
                        // Simpler message layout for use on the plugin install page
                        echo '<p>', esc_html( $this->strings['plugin_activated'] ), '</p>';
                    }
                }
            } elseif ( $this->is_plugin_active( $slug ) ) {
                // No simpler message format provided as this message should never be encountered
                // on the plugin install page.
                echo '<div id="message" class="error"><p>',
                    sprintf(
                        esc_html( $this->strings['plugin_already_active'] ),
                        '<strong>' . esc_html( $this->plugins[ $slug ]['name'] ) . '</strong>'
                    ),
                    '</p></div>';
            } elseif ( $this->does_plugin_require_update( $slug ) ) {
                if ( ! $automatic ) {
                    // Make sure message doesn't display again if bulk activation is performed
                    // immediately after a single activation.
                    if ( ! isset( $_POST['action'] ) ) {
                        echo '<div id="message" class="error"><p>',
                            sprintf(
                                esc_html( $this->strings['plugin_needs_higher_version'] ),
                                '<strong>' . esc_html( $this->plugins[ $slug ]['name'] ) . '</strong>'
                            ),
                            '</p></div>';
                    }
                } else {
                    // Simpler message layout for use on the plugin install page
                    echo '<p>', sprintf( esc_html( $this->strings['plugin_needs_higher_version'] ), esc_html( $this->plugins[ $slug ]['name'] ) ), '</p>';
                }
            }
            return true;
        }
        /**
         * Echoes required plugin notice.
         *
         * Outputs a message telling users that a specific plugin is required for
         * their theme. If appropriate, it includes a link to the form page where
         * users can install and activate the plugin.
         *
         * @since 1.0.0
         *
         * @global object $current_screen
         * @return null Returns early if we're on the Install page.
         */
        public function notices() {
            // Remove nag on the install page / Return early if the nag message has been dismissed.
            if ( $this->is_arise_page() || get_user_meta( get_current_user_id(), 'arise_dismissed_notice_' . $this->id, true ) ) {
                return;
            }
            // Store for the plugin slugs by message type.
            $message = array();
            // Initialize counters used to determine plurality of action link texts.
            $install_link_count  = 0;
            $update_link_count   = 0;
            $activate_link_count = 0;
            foreach ( $this->plugins as $slug => $plugin ) {
                if ( $this->is_plugin_active( $slug ) && false === $this->does_plugin_have_update( $slug ) ) {
                    continue;
                }
                if ( ! $this->is_plugin_installed( $slug ) ) {
                    $install_link_count++;
                    if ( current_user_can( 'install_plugins' ) ) {
                        if ( true === $plugin['required'] ) {
                            $message['notice_can_install_required'][] = $slug;
                        }
                        else {
                            $message['notice_can_install_recommended'][] = $slug;
                        }
                    }
                    // Need higher privileges to install the plugin.
                    else {
                        $message['notice_cannot_install'][] = $slug;
                    }
                } else {
                    if ( ! $this->is_plugin_active( $slug ) && $this->can_plugin_activate( $slug ) ) {
                        $activate_link_count++;
                        if ( current_user_can( 'activate_plugins' ) ) {
                            if ( true === $plugin['required'] ) {
                                $message['notice_can_activate_required'][] = $slug;
                            }
                            else {
                                $message['notice_can_activate_recommended'][] = $slug;
                            }
                        }
                        // Need higher privileges to activate the plugin.
                        else {
                            $message['notice_cannot_activate'][] = $slug;
                        }
                    }
                    if ( $this->does_plugin_require_update( $slug ) && false === $this->does_plugin_have_update( $slug ) ) {
                        continue;
                    } else {
                        $update_link_count++;
                        if ( current_user_can( 'install_plugins' ) ) {
                            if ( $this->does_plugin_require_update( $slug ) ) {
                                $message['notice_ask_to_update'][] = $slug;
                            }
                            elseif ( false !== $this->does_plugin_have_update( $slug ) ) {
                                $message['notice_ask_to_update_maybe'][] = $slug;
                            }
                        }
                        // Need higher privileges to update the plugin.
                        else {
                            $message['notice_cannot_update'][] = $slug;
                        }
                    }
                }
            }
            unset( $slug, $plugin );
            // If we have notices to display, we move forward.
            if ( ! empty( $message ) ) {
                krsort( $message ); // Sort messages.
                $rendered = '';
                // As add_settings_error() wraps the final message in a <p> and as the final message can't be
                // filtered, using <p>'s in our html would render invalid html output.
                $line_template = '<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;">%s</span>' . "\n";
                // If dismissable is false and a message is set, output it now.
                if ( ! $this->dismissable && ! empty( $this->dismiss_msg ) ) {
                    $rendered .= sprintf( $line_template, wp_kses_post( $this->dismiss_msg ) );
                }
                // Render the individual message lines for the notice.
                foreach ( $message as $type => $plugin_group ) {
                    $linked_plugins = array();
                    // Get the external info link for a plugin if one is available.
                    foreach ( $plugin_group as $plugin_slug ) {
                        $linked_plugins[] = $this->get_info_link( $plugin_slug );
                    }
                    unset( $plugin_slug );
                    $count          = count( $plugin_group );
                    $linked_plugins = array_map( array( 'TGM_Utils', 'wrap_in_em' ), $linked_plugins );
                    $last_plugin    = array_pop( $linked_plugins ); // Pop off last name to prep for readability.
                    $imploded       = empty( $linked_plugins ) ? $last_plugin : ( implode( ', ', $linked_plugins ) . ' ' . esc_html_x( 'and', 'plugin A *and* plugin B', 'arise' ) . ' ' . $last_plugin );
                    $rendered .= sprintf(
                        $line_template,
                        sprintf(
                            translate_nooped_plural( $this->strings[ $type ], $count, 'arise' ),
                            $imploded,
                            $count
                        )
                    );
                    if ( 0 === strpos( $type, 'notice_cannot' ) ) {
                        $rendered .= $this->strings['contact_admin'];
                    }
                }
                unset( $type, $plugin_group, $linked_plugins, $count, $last_plugin, $imploded );
                // Setup action links.
                $action_links = array(
                    'install'  => '',
                    'update'   => '',
                    'activate' => '',
                    'dismiss'  => $this->dismissable ? '<a href="' . esc_url( add_query_arg( 'arise-dismiss', 'dismiss_admin_notices' ) ) . '" class="dismiss-notice" target="_parent">' . esc_html( $this->strings['dismiss'] ) . '</a>' : '',
                );
                $link_template = '<a href="%2$s">%1$s</a>';
                if ( current_user_can( 'install_plugins' ) ) {
                    if ( $install_link_count > 0 ) {
                        $action_links['install'] = sprintf(
                            $link_template,
                            translate_nooped_plural( $this->strings['install_link'], $install_link_count, 'arise' ),
                            esc_url( $this->get_arise_status_url( 'install' ) )
                        );
                    }
                    if ( $update_link_count > 0 ) {
                        $action_links['update'] = sprintf(
                            $link_template,
                            translate_nooped_plural( $this->strings['update_link'], $update_link_count, 'arise' ),
                            esc_url( $this->get_arise_status_url( 'update' ) )
                        );
                    }
                }
                if ( current_user_can( 'activate_plugins' ) && $activate_link_count > 0 ) {
                    $action_links['activate'] = sprintf(
                        $link_template,
                        translate_nooped_plural( $this->strings['activate_link'], $activate_link_count, 'arise' ),
                        esc_url( $this->get_arise_status_url( 'activate' ) )
                    );
                }
                $action_links = apply_filters( 'arise_notice_action_links', $action_links );
                $action_links = array_filter( (array) $action_links ); // Remove any empty array items.
                if ( is_array( $action_links ) && ! empty( $action_links ) ) {
                    $action_links = sprintf( $line_template, implode( ' | ', $action_links ) );
                    $rendered    .= apply_filters( 'arise_notice_rendered_action_links', $action_links );
                }
                // Register the nag messages and prepare them to be processed.
                if ( ! empty( $this->strings['nag_type'] ) ) {
                    add_settings_error( 'arise', 'arise', $rendered, sanitize_html_class( strtolower( $this->strings['nag_type'] ) ) );
                } else {
                    $nag_class = version_compare( $this->wp_version, '3.8', '<' ) ? 'updated' : 'update-nag';
                    add_settings_error( 'arise', 'arise', $rendered, $nag_class );
                }
            }
            // Admin options pages already output settings_errors, so this is to avoid duplication.
            if ( 'options-general' !== $GLOBALS['current_screen']->parent_base ) {
                $this->display_settings_errors();
            }
        }
        /**
         * Display settings errors and remove those which have been displayed to avoid duplicate messages showing
         *
         * @since 2.5.0
         */
        protected function display_settings_errors() {
            global $wp_settings_errors;
            settings_errors( 'arise' );
            foreach ( (array) $wp_settings_errors as $key => $details ) {
                if ( 'arise' === $details['setting'] ) {
                    unset( $wp_settings_errors[ $key ] );
                    break;
                }
            }
        }
        public function dismiss() {
            if ( isset( $_GET['arise-dismiss'] ) ) {
                update_user_meta( get_current_user_id(), 'arise_dismissed_notice_' . $this->id, 1 );
            }
        }
        public function register( $plugin ) {
            if ( empty( $plugin['slug'] ) || empty( $plugin['name'] ) ) {
                return;
            }
            if ( ! is_string( $plugin['slug'] ) || empty( $plugin['slug'] ) || isset( $this->plugins[ $plugin['slug'] ] ) ) {
                return;
            }
            $defaults = array(
                'name'               => '',      // String
                'slug'               => '',      // String
                'source'             => 'repo',  // String
                'required'           => false,   // Boolean
                'version'            => '',      // String
                'force_activation'   => false,   // Boolean
                'force_deactivation' => false,   // Boolean
                'external_url'       => '',      // String
                'is_callable'        => '',      // String or array
            );
            // Prepare the received data
            $plugin = wp_parse_args( $plugin, $defaults );
            // Forgive users for using string versions of booleans or floats for version nr
            $plugin['version']            = (string) $plugin['version'];
            $plugin['source']             = empty( $plugin['source'] ) ? 'repo' : $plugin['source'];
            $plugin['required']           = TGM_Utils::validate_bool( $plugin['required'] );
            $plugin['force_activation']   = TGM_Utils::validate_bool( $plugin['force_activation'] );
            $plugin['force_deactivation'] = TGM_Utils::validate_bool( $plugin['force_deactivation'] );
            // Enrich the received data
            $plugin['file_path']   = $this->_get_plugin_basename_from_slug( $plugin['slug'] );
            $plugin['source_type'] = $this->get_plugin_source_type( $plugin['source'] );
            // Set the class properties
            $this->plugins[ $plugin['slug'] ]    = $plugin;
            $this->sort_order[ $plugin['slug'] ] = $plugin['name'];
            // Should we add the force activation hook ?
            if ( true === $plugin['force_activation'] ) {
                $this->has_forced_activation = true;
            }
            // Should we add the force deactivation hook ?
            if ( true === $plugin['force_deactivation'] ) {
                $this->has_forced_deactivation = true;
            }
        }
        protected function get_plugin_source_type( $source ) {
            if ( 'repo' === $source || preg_match( self::WP_REPO_REGEX, $source ) ) {
                return 'repo';
            } elseif ( preg_match( self::IS_URL_REGEX, $source ) ) {
                return 'external';
            } else {
                return 'bundled';
            }
        }
        public function config( $config ) {
            $keys = array(
                'id',
                'default_path',
                'has_notices',
                'dismissable',
                'dismiss_msg',
                'menu',
                'parent_slug',
                'capability',
                'is_automatic',
                'message',
                'strings',
            );
            foreach ( $keys as $key ) {
                if ( isset( $config[ $key ] ) ) {
                    if ( is_array( $config[ $key ] ) ) {
                        $this->$key = array_merge( $this->$key, $config[ $key ] );
                    } else {
                        $this->$key = $config[ $key ];
                    }
                }
            }
        }
        public function actions( $install_actions ) {
            // Remove action links on the TGMPA install page.
            if ( $this->is_arise_page() ) {
                return false;
            }
            return $install_actions;
        }
        public function flush_plugins_cache( $clear_update_cache = true ) {
            wp_clean_plugins_cache( $clear_update_cache );
        }
        public function populate_file_path( $plugin_slug = null ) {
            if ( is_string( $plugin_slug ) && ! empty( $plugin_slug ) ) {
                $this->plugins[ $plugin_slug ]['file_path'] = $this->_get_plugin_basename_from_slug( $plugin_slug );
            } else {
                // Add file_path key for all plugins.
                foreach ( $this->plugins as $slug => $values ) {
                    $this->plugins[ $slug ]['file_path'] = $this->_get_plugin_basename_from_slug( $slug );
                }
            }
        }
        protected function _get_plugin_basename_from_slug( $slug ) {
            $keys = array_keys( $this->get_plugins() );
            foreach ( $keys as $key ) {
                if ( preg_match( '|^' . $slug . '/|', $key ) ) {
                    return $key;
                }
            }
            return $slug;
        }
        public function _get_plugin_data_from_name( $name, $data = 'slug' ) {
            foreach ( $this->plugins as $values ) {
                if ( $name === $values['name'] && isset( $values[ $data ] ) ) {
                    return $values[ $data ];
                }
            }
            return false;
        }
        public function get_download_url( $slug ) {
            $dl_source = '';
            switch ( $this->plugins[ $slug ]['source_type'] ) {
                case 'repo':
                    return $this->get_wp_repo_download_url( $slug );
                case 'external':
                    return $this->plugins[ $slug ]['source'];
                case 'bundled':
                    return $this->default_path . $this->plugins[ $slug ]['source'];
            }
            return $dl_source; // Should never happen
        }
        protected function get_wp_repo_download_url( $slug ) {
            $source = '';
            $api    = $this->get_plugins_api( $slug );
            if ( false !== $api && isset( $api->download_link ) ) {
                $source = $api->download_link;
            }
            return $source;
        }
        protected function get_plugins_api( $slug ) {
            static $api = array(); // Cache received responses
            if ( ! isset( $api[ $slug ] ) ) {
                if ( ! function_exists( 'plugins_api' ) ) {
                    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
                }
                $response = plugins_api( 'plugin_information', array( 'slug' => $slug, 'fields' => array( 'sections' => false ) ) );
                $api[ $slug ] = false;
                if ( is_wp_error( $response ) ) {
                    if ( true === WP_DEBUG ) {
                        wp_die( esc_html( $this->strings['oops'] ) . var_dump( $api ) ); // WPCS: xss ok
                    } else {
                        wp_die( esc_html( $this->strings['oops'] ) );
                    }
                } else {
                    $api[ $slug ] = $response;
                }
            }
            return $api[ $slug ];
        }
        public function get_info_link( $slug ) {
            $link = '';
            if ( ! empty( $this->plugins[ $slug ]['external_url'] ) && preg_match( self::IS_URL_REGEX, $this->plugins[ $slug ]['external_url'] ) ) {
                $link = sprintf(
                    '<a href="%1$s" target="_blank">%2$s</a>',
                    esc_url( $this->plugins[ $slug ]['external_url'] ),
                    esc_html( $this->plugins[ $slug ]['name'] )
                );
            } elseif ( 'repo' === $this->plugins[ $slug ]['source_type'] ) {
                $url = add_query_arg(
                    array(
                        'tab'       => 'plugin-information',
                        'plugin'    => urlencode( $slug ),
                        'TB_iframe' => 'true',
                        'width'     => '640',
                        'height'    => '500',
                    ),
                    self_admin_url( 'plugin-install.php' )
                );
                $link = sprintf(
                    '<a href="%1$s" class="thickbox">%2$s</a>',
                    esc_url( $url ),
                    esc_html( $this->plugins[ $slug ]['name'] )
                );
            } else {
                $link = esc_html( $this->plugins[ $slug ]['name'] ); // No hyperlink.
            }
            return $link;
        }
        protected function is_arise_page() {
            return isset( $_GET['page'] ) && $this->menu === $_GET['page'];
        }
        public function get_arise_url() {
            static $url;
            if ( ! isset( $url ) ) {
                $url = add_query_arg(
                    array(
                        'page' => urlencode( $this->menu ),
                    ),
                    self_admin_url( $this->parent_slug )
                );
            }
            return $url;
        }
        public function get_arise_status_url( $status ) {
            return add_query_arg(
                array(
                    'plugin_status' => urlencode( $status ),
                ),
                $this->get_arise_url()
            );
        }
        public function is_arise_complete() {
            $complete = true;
            foreach ( $this->plugins as $slug => $plugin ) {
                if ( ! $this->is_plugin_active( $slug ) || false !== $this->does_plugin_have_update( $slug ) ) {
                    $complete = false;
                    break;
                }
            }
            return $complete;
        }
        public function is_plugin_installed( $slug ) {
            $installed_plugins = $this->get_plugins(); // Retrieve a list of all installed plugins (WP cached)
            return ( ! empty( $installed_plugins[ $this->plugins[ $slug ]['file_path'] ] ) );
        }
        public function is_plugin_active( $slug ) {
            return ( is_plugin_active( $this->plugins[ $slug ]['file_path'] ) || ( ! empty( $plugin['is_callable'] ) && is_callable( $plugin['is_callable'] ) ) );
        }
        public function can_plugin_update( $slug ) {
            // We currently can't get reliable info on non-WP-repo plugins - issue #380
            if ( 'repo' !== $this->plugins[ $slug ]['source_type'] ) {
                return true;
            }
            $api = $this->get_plugins_api( $slug );
            if ( false !== $api && isset( $api->requires ) ) {
                return version_compare( $GLOBALS['wp_version'], $api->requires, '>=' );
            }
            // No usable info received from the plugins API, presume we can update.
            return true;
        }
        public function can_plugin_activate( $slug ) {
            return ( ! $this->is_plugin_active( $slug ) && ! $this->does_plugin_require_update( $slug ) );
        }
        public function get_installed_version( $slug ) {
            $installed_plugins = $this->get_plugins(); // Retrieve a list of all installed plugins (WP cached)
            if ( ! empty( $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Version'] ) ) {
                return $installed_plugins[ $this->plugins[ $slug ]['file_path'] ]['Version'];
            }
            return '';
        }
        public function does_plugin_require_update( $slug ) {
            $installed_version = $this->get_installed_version( $slug );
            $minimum_version   = $this->plugins[ $slug ]['version'];
            return version_compare( $minimum_version, $installed_version, '>' );
        }
        public function does_plugin_have_update( $slug ) {
            // Presume bundled and external plugins will point to a package which meets the minimum required version.
            if ( 'repo' !== $this->plugins[ $slug ]['source_type'] ) {
                if ( $this->does_plugin_require_update( $slug ) ) {
                    return $this->plugins[ $slug ]['version'];
                }
                return false;
            }
            $repo_updates = get_site_transient( 'update_plugins' );
            if ( isset( $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->new_version ) ) {
                return $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->new_version;
            }
            return false;
        }
        public function get_upgrade_notice( $slug ) {
            // We currently can't get reliable info on non-WP-repo plugins - issue #380
            if ( 'repo' !== $this->plugins[ $slug ]['source_type'] ) {
                return '';
            }
            $repo_updates = get_site_transient( 'update_plugins' );
            if ( ! empty( $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->upgrade_notice ) ) {
                return $repo_updates->response[ $this->plugins[ $slug ]['file_path'] ]->upgrade_notice;
            }
            return '';
        }
        public function get_plugins( $plugin_folder = '' ) {
            if ( ! function_exists( 'get_plugins' ) ) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }
            return get_plugins( $plugin_folder );
        }
        public function update_dismiss() {
            delete_metadata( 'user', null, 'arise_dismissed_notice_' . $this->id, null, true );
        }
        public function force_activation() {
            foreach ( $this->plugins as $slug => $plugin ) {
                if ( true === $plugin['force_activation'] ) {
                    if ( ! $this->is_plugin_installed( $slug ) ) {
                        // Oops, plugin isn't there so iterate to next condition.
                        continue;
                    } elseif ( $this->can_plugin_activate( $slug ) ) {
                        // There we go, activate the plugin.
                        activate_plugin( $plugin['file_path'] );
                    }
                }
            }
        }
        /**
         * Forces plugin deactivation if the parameter 'force_deactivation'
         * is set to true.
         *
         * This allows theme authors to specify certain plugins that must be
         * deactivated upon switching from the current theme to another.
         *
         * Please take special care when using this parameter as it has the
         * potential to be harmful if not used correctly.
         *
         * @since 2.2.0
         */
        public function force_deactivation() {
            foreach ( $this->plugins as $slug => $plugin ) {
                // Only proceed forward if the parameter is set to true and plugin is active.
                if ( true === $plugin['force_deactivation'] && $this->is_plugin_active( $slug ) ) {
                    deactivate_plugins( $plugin['file_path'] );
                }
            }
        }
        public static function get_instance() {
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }
    }
    if ( ! function_exists( 'load_tgm_plugin_activation' ) ) {
        /**
         * Ensure only one instance of the class is ever invoked.
         */
        function load_tgm_plugin_activation() {
            $GLOBALS['arise'] = TGM_Plugin_Activation::get_instance();
        }
    }
    if ( did_action( 'plugins_loaded' ) ) {
        load_tgm_plugin_activation();
    } else {
        add_action( 'plugins_loaded', 'load_tgm_plugin_activation' );
    }
}
if ( ! function_exists( 'arise' ) ) {
    /**
     * Helper function to register a collection of required plugins.
     *
     * @since 2.0.0
     * @api
     *
     * @param array $plugins An array of plugin arrays.
     * @param array $config  Optional. An array of configuration values.
     */
    function arise( $plugins, $config = array() ) {
        $instance = call_user_func( array( get_class( $GLOBALS['arise'] ), 'get_instance' ) );
        foreach ( $plugins as $plugin ) {
            call_user_func( array( $instance, 'register' ), $plugin );
        }
        if ( ! empty( $config ) && is_array( $config ) ) {
            call_user_func( array( $instance, 'config' ), $config );
        }
    }
}
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}
if ( ! class_exists( 'TGMPA_List_Table' ) ) {
    class TGMPA_List_Table extends WP_List_Table {
        protected $arise;
        public $view_context = 'all';
        protected $view_totals = array(
            'all'      => 0,
            'install'  => 0,
            'update'   => 0,
            'activate' => 0,
        );
        public function __construct() {
            $this->arise = call_user_func( array( get_class( $GLOBALS['arise'] ), 'get_instance' ) );
            parent::__construct(
                array(
                    'singular' => 'plugin',
                    'plural'   => 'plugins',
                    'ajax'     => false,
                )
            );
            if ( isset( $_REQUEST['plugin_status'] ) && in_array( $_REQUEST['plugin_status'], array( 'install', 'update', 'activate' ), true ) ) {
                $this->view_context = sanitize_key( $_REQUEST['plugin_status'] );
            }
            add_filter( 'arise_plugin_table_items', array( $this, 'sort_table_items' ) );
        }
        public function get_table_classes() {
            return array( 'widefat', 'fixed' );
        }
        protected function _gather_plugin_data() {
            // Load thickbox for plugin links.
            $this->arise->admin_init();
            $this->arise->thickbox();
            // Categorize the plugins which have open actions.
            $plugins = $this->categorize_plugins_to_views();
            // Set the counts for the view links
            $this->set_view_totals( $plugins );
            // Prep variables for use and grab list of all installed plugins.
            $table_data = array();
            $i          = 0;
            foreach ( $plugins[ $this->view_context ] as $slug => $plugin ) {
                $table_data[ $i ]['sanitized_plugin']  = $plugin['name'];
                $table_data[ $i ]['slug']              = $slug;
                $table_data[ $i ]['plugin']            = '<strong>' . $this->arise->get_info_link( $slug ) . '</strong>';
                $table_data[ $i ]['source']            = $this->get_plugin_source_type_text( $plugin['source_type'] );
                $table_data[ $i ]['type']              = $this->get_plugin_advise_type_text( $plugin['required'] );
                $table_data[ $i ]['status']            = $this->get_plugin_status_text( $slug );
                $table_data[ $i ]['installed_version'] = $this->arise->get_installed_version( $slug );
                $table_data[ $i ]['minimum_version']   = $plugin['version'];
                $table_data[ $i ]['available_version'] = $this->arise->does_plugin_have_update( $slug );
                // Prep the upgrade notice info.
                $upgrade_notice = $this->arise->get_upgrade_notice( $slug );
                if ( ! empty( $upgrade_notice ) ) {
                    $table_data[ $i ]['upgrade_notice'] = $upgrade_notice;
                    add_action( "arise_after_plugin_row_$slug", array( $this, 'wp_plugin_update_row' ), 10, 2 );
                }
                $table_data[ $i ] = apply_filters( 'arise_table_data_item', $table_data[ $i ], $plugin );
                $i++;
            }
            return $table_data;
        }
        protected function categorize_plugins_to_views() {
            $plugins = array(
                'all'      => array(), // Meaning: all plugins which still have open actions.
                'install'  => array(),
                'update'   => array(),
                'activate' => array(),
            );
            foreach ( $this->arise->plugins as $slug => $plugin ) {
                if ( $this->arise->is_plugin_active( $slug ) && false === $this->arise->does_plugin_have_update( $slug ) ) {
                    // No need to display plugins if they are installed, up-to-date and active.
                    continue;
                }
                else {
                    $plugins['all'][ $slug ] = $plugin;
                    if ( ! $this->arise->is_plugin_installed( $slug ) ) {
                        $plugins['install'][ $slug ] = $plugin;
                    } else {
                        if ( false !== $this->arise->does_plugin_have_update( $slug ) ) {
                            $plugins['update'][ $slug ] = $plugin;
                        }
                        if ( $this->arise->can_plugin_activate( $slug ) ) {
                            $plugins['activate'][ $slug ] = $plugin;
                        }
                    }
                }
            }
            return $plugins;
        }
        protected function set_view_totals( $plugins ) {
            foreach ( $plugins as $type => $list ) {
                $this->view_totals[ $type ] = count( $list );
            }
        }
        /**
         * Get the plugin required/recommended text string.
         *
         * @since 2.5.0
         *
         * @param string $required Plugin required setting.
         * @return string
         */
        protected function get_plugin_advise_type_text( $required ) {
            if ( true === $required ) {
                return __( 'Required', 'arise' );
            }
            return __( 'Recommended', 'arise' );
        }
        protected function get_plugin_source_type_text( $type ) {
            $string = '';
            switch ( $type ) {
                case 'repo':
                    $string = __( 'WordPress Repository', 'arise' );
                    break;
                case 'external':
                    $string = __( 'External Source', 'arise' );
                    break;
                case 'bundled':
                    $string = __( 'Pre-Packaged', 'arise' );
                    break;
            }
            return $string;
        }
        protected function get_plugin_status_text( $slug ) {
            if ( ! $this->arise->is_plugin_installed( $slug ) ) {
                return __( 'Not Installed', 'arise' );
            }
            if ( ! $this->arise->is_plugin_active( $slug ) ) {
                $install_status = __( 'Installed But Not Activated', 'arise' );
            } else {
                $install_status = __( 'Active', 'arise' );
            }
            $update_status = '';
            if ( $this->arise->does_plugin_require_update( $slug ) && false === $this->arise->does_plugin_have_update( $slug ) ) {
                $update_status = __( 'Required Update not Available', 'arise' );
            } elseif ( $this->arise->does_plugin_require_update( $slug ) ) {
                $update_status = __( 'Requires Update', 'arise' );
            } elseif ( false !== $this->arise->does_plugin_have_update( $slug ) ) {
                $update_status = __( 'Update recommended', 'arise' );
            }
            if ( '' === $update_status ) {
                return $install_status;
            }
            return sprintf(
                _x( '%1$s, %2$s', '%1$s = install status, %2$s = update status', 'arise' ),
                $install_status,
                $update_status
            );
        }
        public function sort_table_items( $items ) {
            $type = array();
            $name = array();
            foreach ( $items as $i => $plugin ) {
                $type[ $i ] = $plugin['type']; // Required/recommended
                $name[ $i ] = $plugin['sanitized_plugin'];
            }
            array_multisort( $type, SORT_DESC, $name, SORT_ASC, $items );
            return $items;
        }
        public function get_views() {
            $status_links = array();
            foreach ( $this->view_totals as $type => $count ) {
                if ( $count < 1 ) {
                    continue;
                }
                switch ( $type ) {
                    case 'all':
                        $text = _nx( 'All <span class="count">(%s)</span>', 'All <span class="count">(%s)</span>', $count, 'plugins', 'arise' );
                        break;
                    case 'install':
                        $text = _n( 'To Install <span class="count">(%s)</span>', 'To Install <span class="count">(%s)</span>', $count, 'arise' );
                        break;
                    case 'update':
                        $text = _n( 'Update Available <span class="count">(%s)</span>', 'Update Available <span class="count">(%s)</span>', $count, 'arise' );
                        break;
                    case 'activate':
                        $text = _n( 'To Activate <span class="count">(%s)</span>', 'To Activate <span class="count">(%s)</span>', $count, 'arise' );
                        break;
                }
                $status_links[ $type ] = sprintf(
                    '<a href="%s"%s>%s</a>',
                    esc_url( $this->arise->get_arise_status_url( $type ) ),
                    ( $type === $this->view_context ) ? ' class="current"' : '',
                    sprintf( $text, number_format_i18n( $count ) )
                );
            }
            return $status_links;
        }
        public function column_default( $item, $column_name ) {
            return $item[ $column_name ];
        }
        public function column_cb( $item ) {
            return sprintf(
                '<input type="checkbox" name="%1$s[]" value="%2$s" id="%3$s" />',
                esc_attr( $this->_args['singular'] ),
                esc_attr( $item['slug'] ),
                esc_attr( $item['sanitized_plugin'] )
            );
        }
        public function column_plugin( $item ) {
            return sprintf(
                '%1$s %2$s',
                $item['plugin'],
                $this->row_actions( $this->get_row_actions( $item ), true )
            );
        }
        public function column_version( $item ) {
            $output = array();
            if ( $this->arise->is_plugin_installed( $item['slug'] ) ) {
                $installed = ! empty( $item['installed_version'] ) ? $item['installed_version'] : _x( 'unknown', 'as in: "version nr unknown"', 'arise' );
                $color = '';
                if ( ! empty( $item['minimum_version'] ) && $this->arise->does_plugin_require_update( $item['slug'] ) ) {
                    $color = ' color: #ff0000; font-weight: bold;';
                }
                $output[] = sprintf(
                    '<p><span style="min-width: 32px; text-align: right; float: right;%1$s">%2$s</span>' . __( 'Installed version:', 'arise' ) . '</p>',
                    $color,
                    $installed
                );
            }
            if ( ! empty( $item['minimum_version'] ) ) {
                $output[] = sprintf(
                    '<p><span style="min-width: 32px; text-align: right; float: right;">%1$s</span>' . __( 'Minimum required version:', 'arise' ) . '</p>',
                    $item['minimum_version']
                );
            }
            if ( ! empty( $item['available_version'] ) ) {
                $color = '';
                if ( ! empty( $item['minimum_version'] ) && version_compare( $item['available_version'], $item['minimum_version'], '>=' ) ) {
                    $color = ' color: #71C671; font-weight: bold;';
                }
                $output[] = sprintf(
                    '<p><span style="min-width: 32px; text-align: right; float: right;%1$s">%2$s</span>' . __( 'Available version:', 'arise' ) . '</p>',
                    $color,
                    $item['available_version']
                );
            }
            if ( empty( $output ) ) {
                return '&nbsp;'; // Let's not break the table layout
            } else {
                return implode( "\n", $output );
            }
        }
        public function no_items() {
            printf( wp_kses_post( __( 'No plugins to install, update or activate. <a href="%1$s">Return to the Dashboard</a>', 'arise' ) ), esc_url( self_admin_url() ) );
            echo '<style type="text/css">#adminmenu .wp-submenu li.current { display: none !important; }</style>';
        }
        public function get_columns() {
            $columns = array(
                'cb'     => '<input type="checkbox" />',
                'plugin' => __( 'Plugin', 'arise' ),
                'source' => __( 'Source', 'arise' ),
                'type'   => __( 'Type', 'arise' ),
            );
            if ( 'all' === $this->view_context || 'update' === $this->view_context ) {
                $columns['version'] = __( 'Version', 'arise' );
            }
            if ( 'all' === $this->view_context || 'update' === $this->view_context ) {
                $columns['status'] = __( 'Status', 'arise' );
            }
            return apply_filters( 'arise_table_columns', $columns );
        }
        protected function get_row_actions( $item ) {
            $actions      = array();
            $action_links = array();
            // Display the 'Install' link if the plugin is not yet available.
            if ( ! $this->arise->is_plugin_installed( $item['slug'] ) ) {
                $actions['install'] = _x( 'Install %2$s', '%2$s = plugin name in screen reader markup', 'arise' );
            } else {
                // Display the 'Update' link if an update is available and WP complies with plugin minimum.
                if ( false !== $this->arise->does_plugin_have_update( $item['slug'] ) && $this->arise->can_plugin_update( $item['slug'] ) ) {
                    $actions['update'] = _x( 'Update %2$s', '%2$s = plugin name in screen reader markup', 'arise' );
                }
                // Display the 'Activate' hover link, but only if the plugin meets the minimum version.
                if ( $this->arise->can_plugin_activate( $item['slug'] ) ) {
                    $actions['activate'] = _x( 'Activate %2$s', '%2$s = plugin name in screen reader markup', 'arise' );
                }
            }
            // Create the actual links.
            foreach ( $actions as $action => $text ) {
                $nonce_url = wp_nonce_url(
                    add_query_arg(
                        array(
                            'plugin'           => urlencode( $item['slug'] ),
                            'arise-' . $action => $action . '-plugin',
                        ),
                        $this->arise->get_arise_url()
                    ),
                    'arise-' . $action,
                    'arise-nonce'
                );
                $action_links[ $action ] = sprintf(
                    '<a href="%1$s">' . esc_html( $text ) . '</a>',
                    esc_url( $nonce_url ),
                    '<span class="screen-reader-text">' . esc_html( $item['sanitized_plugin'] ) . '</span>'
                );
            }
            $prefix = ( defined( 'WP_NETWORK_ADMIN' ) && WP_NETWORK_ADMIN ) ? 'network_admin_' : '';
            return apply_filters( "arise_{$prefix}plugin_action_links", array_filter( $action_links ), $item['slug'], $item, $this->view_context );
        }
        /**
         * Generates content for a single row of the table.
         *
         * @since 2.5.0
         *
         * @param object $item The current item.
         */
        public function single_row( $item ) {
            parent::single_row( $item );
            do_action( "arise_after_plugin_row_{$item['slug']}", $item['slug'], $item, $this->view_context );
        }
        public function wp_plugin_update_row( $slug, $item ) {
            if ( empty( $item['upgrade_notice'] ) ) {
                return;
            }
            echo '
                <tr class="plugin-update-tr">
                    <td colspan="', absint( $this->get_column_count() ), '" class="plugin-update colspanchange">
                        <div class="update-message">',
                            esc_html__( 'Upgrade message from the plugin author:', 'arise' ),
                            ' <strong>', wp_kses_data( $item['upgrade_notice'] ), '</strong>
                        </div>
                    </td>
                </tr>';
        }
        public function get_bulk_actions() {
            $actions = array();
            if ( 'update' !== $this->view_context && 'activate' !== $this->view_context ) {
                if ( current_user_can( 'install_plugins' ) ) {
                    $actions['arise-bulk-install'] = __( 'Install', 'arise' );
                }
            }
            if ( 'install' !== $this->view_context ) {
                if ( current_user_can( 'update_plugins' ) ) {
                    $actions['arise-bulk-update'] = __( 'Update', 'arise' );
                }
                if ( current_user_can( 'activate_plugins' ) ) {
                    $actions['arise-bulk-activate'] = __( 'Activate', 'arise' );
                }
            }
            return $actions;
        }
        public function process_bulk_actions() {
            // Bulk installation process.
            if ( 'arise-bulk-install' === $this->current_action() || 'arise-bulk-update' === $this->current_action() ) {
                check_admin_referer( 'bulk-' . $this->_args['plural'] );
                $install_type = 'install';
                if ( 'arise-bulk-update' === $this->current_action() ) {
                    $install_type = 'update';
                }
                $plugins_to_install = array();
                if ( ! empty( $_POST['plugin'] ) ) {
                    if ( is_array( $_POST['plugin'] ) ) {
                        $plugins_to_install = (array) $_POST['plugin'];
                    } elseif ( is_string( $_POST['plugin'] ) ) {
                        // Received via Filesystem page - unflatten array (WP bug #19643)
                        $plugins_to_install = explode( ',', $_POST['plugin'] );
                    }
                    // Sanitize the received input
                    $plugins_to_install = array_map( 'urldecode', $plugins_to_install );
                    $plugins_to_install = array_map( 'sanitize_key', $plugins_to_install );
                    // Validate the received input
                    foreach ( $plugins_to_install as $key => $slug ) {
                        // Check if the plugin was registered with TGMPA and remove if not
                        if ( ! isset( $this->arise->plugins[ $slug ] ) ) {
                            unset( $plugins_to_install[ $key ] );
                        }
                        // For updates: make sure this is a plugin we *can* update (update available and WP version ok).
                        elseif ( 'update' === $install_type && ( $this->arise->is_plugin_installed( $slug ) && ( false === $this->arise->does_plugin_have_update( $slug ) || ! $this->arise->can_plugin_update( $slug ) ) ) ) {
                            unset( $plugins_to_install[ $key ] );
                        }
                    }
                }
                // No need to proceed further if we have no plugins to handle.
                if ( empty( $plugins_to_install ) ) {
                    if ( 'install' === $install_type ) {
                        $message = __( 'No plugins are available to be installed at this time.', 'arise' );
                    } else {
                        $message = __( 'No plugins are available to be updated at this time.', 'arise' );
                    }
                    echo '<div id="message" class="error"><p>', esc_html( $message ), '</p></div>';
                    return false;
                }
                // Pass all necessary information if WP_Filesystem is needed.
                $url = wp_nonce_url(
                    $this->arise->get_arise_url(),
                    'bulk-' . $this->_args['plural']
                );
                // Give validated data back to $_POST which is the only place the filesystem looks for extra fields
                $_POST['plugin'] = implode( ',', $plugins_to_install ); // Work around for WP bug #19643
                $method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
                $fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.
                if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
                    return true; // Stop the normal page form from displaying, credential request form will be shown
                }
                // Now we have some credentials, setup WP_Filesystem
                if ( ! WP_Filesystem( $creds ) ) {
                    // Our credentials were no good, ask the user for them again
                    request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
                    return true;
                }
                // If we arrive here, we have the filesystem
                // Store all information in arrays since we are processing a bulk installation.
                $names      = array();
                $sources    = array(); // Needed for installs.
                $file_paths = array(); // Needed for upgrades.
                $to_inject  = array(); // Information to inject into the update_plugins transient.
                // Prepare the data for validated plugins for the install/upgrade
                foreach ( $plugins_to_install as $slug ) {
                    $name   = $this->arise->plugins[ $slug ]['name'];
                    $source = $this->arise->get_download_url( $slug );
                    if ( ! empty( $name ) && ! empty( $source ) ) {
                        $names[] = $name;
                        switch ( $install_type ) {
                            case 'install':
                                $sources[] = $source;
                                break;
                            case 'update':
                                $file_paths[]                 = $this->arise->plugins[ $slug ]['file_path'];
                                $to_inject[ $slug ]           = $this->arise->plugins[ $slug ];
                                $to_inject[ $slug ]['source'] = $source;
                                break;
                        }
                    }
                }
                unset( $slug, $name, $source );
                // Create a new instance of TGM_Bulk_Installer.
                $installer = new TGM_Bulk_Installer(
                    new TGM_Bulk_Installer_Skin(
                        array(
                            'url'          => esc_url_raw( $this->arise->get_arise_url() ),
                            'nonce'        => 'bulk-' . $this->_args['plural'],
                            'names'        => $names,
                            'install_type' => $install_type,
                        )
                    )
                );
                // Wrap the install process with the appropriate HTML.
                echo '<div class="arise wrap">',
                    '<h2>', esc_html( get_admin_page_title() ), '</h2>';
                // Process the bulk installation submissions.
                add_filter( 'upgrader_source_selection', array( $this->arise, 'maybe_adjust_source_dir' ), 1, 3 );
                if ( 'arise-bulk-update' === $this->current_action() ) {
                    // Inject our info into the update transient
                    $this->arise->inject_update_info( $to_inject );
                    $installer->bulk_upgrade( $file_paths );
                } else {
                    $installer->bulk_install( $sources );
                }
                remove_filter( 'upgrader_source_selection', array( $this->arise, 'maybe_adjust_source_dir' ), 1, 3 );
                echo '</div>';
                return true;
            }
            // Bulk activation process.
            if ( 'arise-bulk-activate' === $this->current_action() ) {
                check_admin_referer( 'bulk-' . $this->_args['plural'] );
                // Grab plugin data from $_POST.
                $plugins = array();
                if ( isset( $_POST['plugin'] ) ) {
                    $plugins = array_map( 'urldecode', (array) $_POST['plugin'] );
                    $plugins = array_map( 'sanitize_key', $plugins );
                }
                $plugins_to_activate = array();
                $plugin_names        = array();
                // Grab the file paths for the selected & inactive plugins from the registration array
                foreach ( $plugins as $slug ) {
                    if ( $this->arise->can_plugin_activate( $slug ) ) {
                        $plugins_to_activate[] = $this->arise->plugins[ $slug ]['file_path'];
                        $plugin_names[]        = $this->arise->plugins[ $slug ]['name'];
                    }
                }
                unset( $slug );
                // Return early if there are no plugins to activate.
                if ( empty( $plugins_to_activate ) ) {
                    echo '<div id="message" class="error"><p>', esc_html__( 'No plugins are available to be activated at this time.', 'arise' ), '</p></div>';
                    return false;
                }
                // Now we are good to go - let's start activating plugins.
                $activate = activate_plugins( $plugins_to_activate );
                if ( is_wp_error( $activate ) ) {
                    echo '<div id="message" class="error"><p>', wp_kses_post( $activate->get_error_message() ), '</p></div>';
                } else {
                    $count        = count( $plugin_names ); // Count so we can use _n function.
                    $plugin_names = array_map( array( 'TGM_Utils', 'wrap_in_strong' ), $plugin_names );
                    $last_plugin  = array_pop( $plugin_names ); // Pop off last name to prep for readability.
                    $imploded     = empty( $plugin_names ) ? $last_plugin : ( implode( ', ', $plugin_names ) . ' ' . esc_html_x( 'and', 'plugin A *and* plugin B', 'arise' ) . ' ' . $last_plugin );
                    printf(
                        '<div id="message" class="updated"><p>%1$s %2$s.</p></div>',
                        esc_html( _n( 'The following plugin was activated successfully:', 'The following plugins were activated successfully:', $count, 'arise' ) ),
                        $imploded // WPCS: xss ok
                    );
                    // Update recently activated plugins option.
                    $recent = (array) get_option( 'recently_activated' );
                    foreach ( $plugins_to_activate as $plugin => $time ) {
                        if ( isset( $recent[ $plugin ] ) ) {
                            unset( $recent[ $plugin ] );
                        }
                    }
                    update_option( 'recently_activated', $recent );
                }
                unset( $_POST ); // Reset the $_POST variable in case user wants to perform one action after another.
                return true;
            }
            return false;
        }
        public function prepare_items() {
            $columns               = $this->get_columns(); // Get all necessary column information.
            $hidden                = array(); // No columns to hide, but we must set as an array.
            $sortable              = array(); // No reason to make sortable columns.
            $this->_column_headers = array( $columns, $hidden, $sortable ); // Get all necessary column headers.
            // Process our bulk actions here.
            if ( false !== $this->current_action() ) {
                $this->process_bulk_actions();
            }
            // Store all of our plugin data into $items array so WP_List_Table can use it.
            $this->items = apply_filters( 'arise_plugin_table_items', $this->_gather_plugin_data() );
        }
        // *********** DEPRECATED METHODS *********** //
        protected function _get_plugin_data_from_name( $name, $data = 'slug' ) {
            _deprecated_function( __FUNCTION__, 'TGMPA 2.5.0', 'TGM_Plugin_Activation::_get_plugin_data_from_name()' );
            return $this->arise->_get_plugin_data_from_name( $name, $data );
        }
    }
}
add_action( 'admin_init', 'arise_load_bulk_installer' );
if ( ! function_exists( 'arise_load_bulk_installer' ) ) {
    /**
     * Load bulk installer
     */
    function arise_load_bulk_installer() {
        // Get TGMPA class instance
        $arise_instance = call_user_func( array( get_class( $GLOBALS['arise'] ), 'get_instance' ) );
        if ( isset( $_GET['page'] ) && $arise_instance->menu === $_GET['page'] ) {
            if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
                require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            }
            if ( ! class_exists( 'TGM_Bulk_Installer' ) ) {
                class TGM_Bulk_Installer extends Plugin_Upgrader {
                    public $result;
                    public $bulk = false;
                    protected $arise;
                    protected $clear_destination = false;
                    public function __construct( $skin = null ) {
                        // Get TGMPA class instance
                        $this->arise = call_user_func( array( get_class( $GLOBALS['arise'] ), 'get_instance' ) );
                        parent::__construct( $skin );
                        if ( isset( $this->skin->options['install_type'] ) && 'update' === $this->skin->options['install_type'] ) {
                            $this->clear_destination = true;
                        }
                        if ( $this->arise->is_automatic ) {
                            $this->activate_strings();
                        }
                        add_action( 'upgrader_process_complete', array( $this->arise, 'populate_file_path' ) );
                    }
                    public function activate_strings() {
                        $this->strings['activation_failed']  = __( 'Plugin activation failed.', 'arise' );
                        $this->strings['activation_success'] = __( 'Plugin activated successfully.', 'arise' );
                    }
                    public function run( $options ) {
                        $result = parent::run( $options );
                        // Reset the strings in case we changed one during automatic activation.
                        if ( $this->arise->is_automatic ) {
                            if ( 'update' === $this->skin->options['install_type'] ) {
                                $this->upgrade_strings();
                            } else {
                                $this->install_strings();
                            }
                        }
                        return $result;
                    }
                    public function bulk_install( $plugins, $args = array() ) {
                        // [TGMPA + ] Hook auto-activation in
                        add_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10, 3 );
                        $defaults = array(
                            'clear_update_cache' => true,
                        );
                        $parsed_args = wp_parse_args( $args, $defaults );
                        $this->init();
                        $this->bulk = true;
                        $this->install_strings(); // [TGMPA + ] adjusted
                        // [TGMPA - ] $current = get_site_transient( 'update_plugins' );
                        // [TGMPA - ] add_filter('upgrader_clear_destination', array($this, 'delete_old_plugin'), 10, 4);
                        $this->skin->header();
                        // Connect to the Filesystem first.
                        $res = $this->fs_connect( array( WP_CONTENT_DIR, WP_PLUGIN_DIR ) );
                        if ( ! $res ) {
                            $this->skin->footer();
                            return false;
                        }
                        $this->skin->bulk_header();
                        // Only start maintenance mode if:
                        // - running Multisite and there are one or more plugins specified, OR
                        // - a plugin with an update available is currently active.
                        // @TODO: For multisite, maintenance mode should only kick in for individual sites if at all possible.
                        $maintenance = ( is_multisite() && ! empty( $plugins ) );
                        /* [TGMPA - ]
                        foreach ( $plugins as $plugin )
                            $maintenance = $maintenance || ( is_plugin_active( $plugin ) && isset( $current->response[ $plugin] ) );
                        */
                        if ( $maintenance ) {
                            $this->maintenance_mode( true );
                        }
                        $results = array();
                        $this->update_count   = count( $plugins );
                        $this->update_current = 0;
                        foreach ( $plugins as $plugin ) {
                            $this->update_current++;
                            /* [TGMPA - ]
                            $this->skin->plugin_info = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin, false, true);
                            if ( !isset( $current->response[ $plugin ] ) ) {
                                $this->skin->set_result('up_to_date');
                                $this->skin->before();
                                $this->skin->feedback('up_to_date');
                                $this->skin->after();
                                $results[$plugin] = true;
                                continue;
                            }
                            // Get the URL to the zip file
                            $r = $current->response[ $plugin ];
                            $this->skin->plugin_active = is_plugin_active($plugin);
                            */
                            $result = $this->run( array(
                                'package'           => $plugin, // [TGMPA + ] adjusted
                                'destination'       => WP_PLUGIN_DIR,
                                'clear_destination' => false, // [TGMPA + ] adjusted
                                'clear_working'     => true,
                                'is_multi'          => true,
                                'hook_extra'        => array(
                                    'plugin' => $plugin,
                                )
                            ) );
                            $results[ $plugin ] = $this->result;
                            // Prevent credentials auth screen from displaying multiple times
                            if ( false === $result ) {
                                break;
                            }
                        } //end foreach $plugins
                        $this->maintenance_mode( false );
                        do_action( 'upgrader_process_complete', $this, array(
                            'action'  => 'install', // [TGMPA + ] adjusted
                            'type'    => 'plugin',
                            'bulk'    => true,
                            'plugins' => $plugins,
                        ) );
                        $this->skin->bulk_footer();
                        $this->skin->footer();
                        // Cleanup our hooks, in case something else does a upgrade on this connection.
                        // [TGMPA - ] remove_filter('upgrader_clear_destination', array($this, 'delete_old_plugin'));
                        // [TGMPA + ] Remove our auto-activation hook
                        remove_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10, 3 );
                        // Force refresh of plugin update information
                        wp_clean_plugins_cache( $parsed_args['clear_update_cache'] );
                        return $results;
                    }
                    public function bulk_upgrade( $plugins, $args = array() ) {
                        add_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10, 3 );
                        $result = parent::bulk_upgrade( $plugins, $args );
                        remove_filter( 'upgrader_post_install', array( $this, 'auto_activate' ), 10, 3 );
                        return $result;
                    }
                    public function auto_activate( $bool, $hook_extra, $result ) {
                        // Only process the activation of installed plugins if the automatic flag is set to true.
                        if ( $this->arise->is_automatic ) {
                            // Flush plugins cache so the headers of the newly installed plugins will be read correctly.
                            wp_clean_plugins_cache();
                            // Get the installed plugin file.
                            $plugin_info = $this->plugin_info();
                            // Don't try to activate on upgrade of active plugin as WP will do this already.
                            if ( ! is_plugin_active( $plugin_info ) ) {
                                $activate = activate_plugin( $plugin_info );
                                // Adjust the success string based on the activation result.
                                $this->strings['process_success'] = $this->strings['process_success'] . "<br />\n";
                                if ( is_wp_error( $activate ) ) {
                                    $this->skin->error( $activate );
                                    $this->strings['process_success'] .= $this->strings['activation_failed'];
                                }
                                else {
                                    $this->strings['process_success'] .= $this->strings['activation_success'];
                                }
                            }
                        }
                        return $bool;
                    }
                }
            }
            if ( ! class_exists( 'TGM_Bulk_Installer_Skin' ) ) {
                class TGM_Bulk_Installer_Skin extends Bulk_Upgrader_Skin {
                    public $plugin_info = array();
                    public $plugin_names = array();
                    public $i = 0;
                    protected $arise;
                    public function __construct( $args = array() ) {
                        // Get TGMPA class instance
                        $this->arise = call_user_func( array( get_class( $GLOBALS['arise'] ), 'get_instance' ) );
                        // Parse default and new args.
                        $defaults = array(
                            'url'          => '',
                            'nonce'        => '',
                            'names'        => array(),
                            'install_type' => 'install',
                        );
                        $args     = wp_parse_args( $args, $defaults );
                        // Set plugin names to $this->plugin_names property.
                        $this->plugin_names = $args['names'];
                        // Extract the new args.
                        parent::__construct( $args );
                    }
                    public function add_strings() {
                        if ( 'update' === $this->options['install_type'] ) {
                            parent::add_strings();
                            $this->upgrader->strings['skin_before_update_header'] = __( 'Updating Plugin %1$s (%2$d/%3$d)', 'arise' );
                        } else {
                            $this->upgrader->strings['skin_update_failed_error'] = __( 'An error occurred while installing %1$s: <strong>%2$s</strong>.', 'arise' );
                            $this->upgrader->strings['skin_update_failed']       = __( 'The installation of %1$s failed.', 'arise' );
                            // Automatic activation strings.
                            if ( $this->arise->is_automatic ) {
                                $this->upgrader->strings['skin_upgrade_start']        = __( 'The installation and activation process is starting. This process may take a while on some hosts, so please be patient.', 'arise' );
                                $this->upgrader->strings['skin_update_successful']    = __( '%1$s installed and activated successfully.', 'arise' ) . ' <a href="#" class="hide-if-no-js" onclick="%2$s"><span>' . esc_html__( 'Show Details', 'arise' ) . '</span><span class="hidden">' . esc_html__( 'Hide Details', 'arise' ) . '</span>.</a>';
                                $this->upgrader->strings['skin_upgrade_end']          = __( 'All installations and activations have been completed.', 'arise' );
                                $this->upgrader->strings['skin_before_update_header'] = __( 'Installing and Activating Plugin %1$s (%2$d/%3$d)', 'arise' );
                            }
                            // Default installation strings.
                            else {
                                $this->upgrader->strings['skin_upgrade_start']        = __( 'The installation process is starting. This process may take a while on some hosts, so please be patient.', 'arise' );
                                $this->upgrader->strings['skin_update_successful']    = esc_html__( '%1$s installed successfully.', 'arise' ) . ' <a href="#" class="hide-if-no-js" onclick="%2$s"><span>' . esc_html__( 'Show Details', 'arise' ) . '</span><span class="hidden">' . esc_html__( 'Hide Details', 'arise' ) . '</span>.</a>';
                                $this->upgrader->strings['skin_upgrade_end']          = __( 'All installations have been completed.', 'arise' );
                                $this->upgrader->strings['skin_before_update_header'] = __( 'Installing Plugin %1$s (%2$d/%3$d)', 'arise' );
                            }
                        }
                    }
                    public function before( $title = '' ) {
                        if ( empty( $title ) ) {
                            $title = esc_html( $this->plugin_names[ $this->i ] );
                        }
                        parent::before( $title );
                    }
                    public function after( $title = '' ) {
                        if ( empty( $title ) ) {
                            $title = esc_html( $this->plugin_names[ $this->i ] );
                        }
                        parent::after( $title );
                        $this->i++;
                    }
                    public function bulk_footer() {
                        // Serve up the string to say installations (and possibly activations) are complete.
                        parent::bulk_footer();
                        // Flush plugins cache so we can make sure that the installed plugins list is always up to date.
                        wp_clean_plugins_cache();
                        // Display message based on if all plugins are now active or not.
                        $update_actions = array();
                        if ( $this->arise->is_arise_complete() ) {
                            // All plugins are active, so we display the complete string and hide the menu to protect users.
                            echo '<style type="text/css">#adminmenu .wp-submenu li.current { display: none !important; }</style>';
                            $update_actions['dashboard'] = sprintf(
                                esc_html( $this->arise->strings['complete'] ),
                                '<a href="' . esc_url( self_admin_url() ) . '">' . esc_html__( 'Return to the Dashboard', 'arise' ) . '</a>'
                            );
                        } else {
                            $update_actions['arise_page'] = '<a href="' . esc_url( $this->arise->get_arise_url() ) . '" target="_parent">' . esc_html( $this->arise->strings['return'] ) . '</a>';
                        }
                        $update_actions = apply_filters( 'arise_update_bulk_plugins_complete_actions', $update_actions, $this->plugin_info );
                        if ( ! empty( $update_actions ) ) {
                            $this->feedback( implode( ' | ', (array) $update_actions ) );
                        }
                    }
                    // *********** DEPRECATED METHODS *********** //
                    public function before_flush_output() {
                        _deprecated_function( __FUNCTION__, 'TGMPA 2.5.0', 'Bulk_Upgrader_Skin::flush_output()' );
                        parent::flush_output();
                    }
                    public function after_flush_output() {
                        _deprecated_function( __FUNCTION__, 'TGMPA 2.5.0', 'Bulk_Upgrader_Skin::flush_output()' );
                        parent::flush_output();
                        $this->i++;
                    }
                }
            }
        }
    }
}
if ( ! class_exists( 'TGM_Utils' ) ) {
    class TGM_Utils {
        public static $has_filters;
        public static function wrap_in_em( $string ) {
            return '<em>' . wp_kses_post( $string ) . '</em>';
        }
        public static function wrap_in_strong( $string ) {
            return '<strong>' . wp_kses_post( $string ) . '</strong>';
        }
        public static function validate_bool( $value ) {
            if ( ! isset( self::$has_filters ) ) {
                self::$has_filters = extension_loaded( 'filter' );
            }
            if ( self::$has_filters ) {
                return filter_var( $value, FILTER_VALIDATE_BOOLEAN );
            } else {
                return self::emulate_filter_bool( $value );
            }
        }
        protected static function emulate_filter_bool( $value ) {
            static $true  = array(
                '1',
                'true', 'True', 'TRUE',
                'y', 'Y',
                'yes', 'Yes', 'YES',
                'on', 'On', 'ON',
            );
            static $false = array(
                '0',
                'false', 'False', 'FALSE',
                'n', 'N',
                'no', 'No', 'NO',
                'off', 'Off', 'OFF',
            );
            if ( is_bool( $value ) ) {
                return $value;
            } else if ( is_int( $value ) && ( 0 === $value || 1 === $value ) ) {
                return (bool) $value;
            } else if ( ( is_float( $value ) && ! is_nan( $value ) ) && ( (float) 0 === $value || (float) 1 === $value ) ) {
                return (bool) $value;
            } else if ( is_string( $value ) ) {
                $value = trim( $value );
                if ( in_array( $value, $true, true ) ) {
                    return true;
                } else if ( in_array( $value, $false, true ) ) {
                    return false;
                } else {
                    return false;
                }
            }
            return false;
        }
    } // End of class TGM_Utils
} // End of class_exists wrapper