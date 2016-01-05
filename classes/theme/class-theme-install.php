<?php
/**
 * Setup Wizard Class
 *
 * Takes new users through some basic steps to setup their store.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.1.0
 */
if (!defined('ABSPATH')) {
    exit;
}

function theme_import_dummy() {
    $import = new WP_Import();
    $import->fetch_attachments = true;
    $upload_dir = wp_upload_dir();

    if (is_writable($upload_dir['path'])) {

        ob_start();
        $import->import($_POST['filename']);
        $text = ob_get_contents();
        ob_end_clean();
        $response = array(
            'status' => 'success',
            'text' => $text
        );
        die(json_encode($response));
    } else {
        $response = array(
            'status' => 'error',
            'text' => __('Wordpress upload dir permission denied. Please temporally set permissions "777" for "wp-content/upload/".', 'artwork-lite')
        );
        die(json_encode($response));
    }
}

add_action('wp_ajax_start_import', 'theme_import_dummy');
add_action('wp_ajax_nopriv_start_import', 'theme_import_dummy');

/**
 * Theme_Admin_Setup_Wizard class
 */
class Theme_Admin_Setup_Wizard {

    /** @var string Currenct Step */
    private $step = '';

    /** @var array Steps for the setup wizard */
    private $steps = array();

    /**
     * Hook in tabs.
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'theme_admin_menus'));
        add_action('admin_init', array($this, 'theme_setup_wizard'));
    }

    /**
     * Add admin menus/screens.
     */
    public function theme_admin_menus() {
        add_theme_page(__('Theme Wizard', 'artwork-lite'), __('Theme Wizard', 'artwork-lite'), 'manage_options', 'theme-setup', 'theme_setup_wizard');
        //call register settings function
        add_action('admin_init', array($this, 'theme_register_post_type_name_settings'));
    }

    public function theme_register_post_type_name_settings() {
        register_setting('theme-work-settings-group', 'theme_post_type_name');
        register_setting('theme-work-settings-group', 'theme_post_type_slug');
    }

    public function theme_posttype_name_sanitize_text($txt) {
        $txt = strip_tags($txt, '');
        $txt = preg_replace("/[^a-zA-Z0-9-]+/", "", $txt);
        $txt = substr(strtolower($txt), 0, 19);
        return wp_kses_post(force_balance_tags($txt));
    }

    function theme_post_type_name_page() {
        $theme_post_type_name = get_option('theme_post_type_name');
        $theme_post_type_slug = $this->theme_posttype_name_sanitize_text(get_option('theme_post_type_slug'));
        if (empty($theme_post_type_name)) {
            $theme_post_type_name = __("Works", 'artwork-lite');
        }
        if (empty($theme_post_type_slug)) {
            $theme_post_type_slug = "works";
        }
        ?>
        <div class="wrap">
            <form method="post" action="options.php">
                <?php settings_fields('theme-work-settings-group'); ?>
                <?php do_settings_sections('theme-work-settings-group'); ?>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Works" name="theme_post_type_name" value="<?php echo esc_attr($theme_post_type_name); ?>" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="works"  name="theme_post_type_slug" value="<?php echo esc_attr($theme_post_type_slug); ?>" />
                    <small><?php _e('The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.', 'artwork-lite'); ?></small>
                </div>
                <p class="theme_setup-actions step pull-right">
                    <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>          
                </p>
                <?php submit_button(); ?>               
            </form>
        </div>
        <?php
    }

    /**
     * Show the setup wizard
     */
    public function theme_setup_wizard() {
        if (empty($_GET['page']) || 'theme-setup' !== $_GET['page']) {
            return;
        }
        $this->steps = array(
            'introduction' => array(
                'name' => __('Start', 'artwork-lite'),
                'view' => array($this, 'theme_setup_introduction'),
                'handler' => ''
            ),
            'customizer' => array(
                'name' => __('Customizer', 'artwork-lite'),
                'view' => array($this, 'theme_setup_customizer'),
                'handler' => ''
            ),
            'section' => array(
                'name' => __('Front Page', 'artwork-lite'),
                'view' => array($this, 'theme_setup_section'),
                'handler' => ''
            ),
            'pages' => array(
                'name' => __('Pages', 'artwork-lite'),
                'view' => array($this, 'theme_setup_pages'),
                'handler' => ''
            ),
            'install_pages' => array(
                'name' => __('Install Pages', 'artwork-lite'),
                'view' => array($this, 'theme_setup_install_pages'),
                'handler' => ''
            ),
            'templates' => array(
                'name' => __('Templates', 'artwork-lite'),
                'view' => array($this, 'theme_setup_page_templates'),
                'handler' => ''
            ),
            'plugins' => array(
                'name' => __('Plugins', 'artwork-lite'),
                'view' => array($this, 'theme_setup_plugins'),
                'handler' => ''
            ),
            'install_plugins' => array(
                'name' => __('Install Plugins', 'artwork-lite'),
                'view' => array($this, 'theme_setup_install_plugins'),
                'handler' => ''
            ),
            'import_dummy' => array(
                'name' => __('Sample Content', 'artwork-lite'),
                'view' => array($this, 'theme_setup_import'),
                'handler' => ''
            ),
            'post_type_name' => array(
                'name' => __('Post Type', 'artwork-lite'),
                'view' => array($this, 'theme_setup_post_type_name'),
                'handler' => ''
            ),
            'ready' => array(
                'name' => __('Ready', 'artwork-lite'),
                'view' => array($this, 'theme_setup_ready'),
                'handler' => ''
            )
        );
        $this->step = isset($_GET['step']) ? sanitize_key($_GET['step']) : current(array_keys($this->steps));
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5', 'all');
        wp_enqueue_style('main', get_template_directory_uri() . '/css/artwork-style.min.css', array('bootstrap'), '1.0', 'all');

        add_thickbox();
        wp_enqueue_script('theme-importer', get_template_directory_uri() . '/js/importer.min.js', array('jquery',));
        wp_register_script('thickbox', get_template_directory_uri() . '/wp-includes/js/thickbox/thickbox.js', array('jquery'));

        wp_localize_script('theme-importer', 'sysvar', array('adminajax' => admin_url('admin-ajax.php'),));


        if (!empty($_POST['save_step']) && isset($this->steps[$this->step]['handler'])) {
            call_user_func($this->steps[$this->step]['handler']);
        }

        ob_start();
        $this->theme_setup_wizard_header();
        $this->theme_setup_wizard_steps();
        $this->theme_setup_wizard_content();
        $this->theme_setup_wizard_footer();
        exit;
    }

    public function theme_get_next_step_link() {
        $keys = array_keys($this->steps);
        return add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) + 1], remove_query_arg('translation_updated'));
    }

    public function theme_get_before_step_link($step) {
        $keys = array_keys($this->steps);
        return add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) - $step], remove_query_arg('translation_updated'));
    }

    public function theme_setup_post_type_name() {
        ?>
        <p class="theme_setup-actions step text-right pull-right top">
            <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>          
        </p>
        <h2><?php _e('Post type', 'artwork-lite'); ?></h2>
        <p><?php _e('Give your projects more suitable titles by renaming default &rdquo;Works&rdquo; (e.g. Portfolio, Photos). Please keep in mind that this change can be applied only once during the theme installation. If your &rdquo;Works&rdquo; are renamed for already existing posts, there is a risk to lose these posts&rsquo; data.', 'artwork-lite'); ?></p>
        <h3><?php _e('You can change post type name:', 'artwork-lite'); ?></h3>
        <br>
        <?php
        $this->theme_post_type_name_page();
        ?>

        <br/>

        <?php
    }

    /**
     * Output the steps
     */
    public function theme_setup_wizard_steps() {
        $ouput_steps = $this->steps;
        ?>
        <ol class="theme-setup-steps <?php
        if ($this->theme_checkPlugins()) : echo 'without_plugin';
        endif;
        ?> 
        <?php
        if ($this->theme_checkPages()) : echo 'without_pages';
        endif;
        ?>">
                <?php foreach ($ouput_steps as $step_key => $step) : ?>
                <li class="<?php
                echo $step_key;
                if ($step_key === $this->step) {
                    echo ' active';
                } elseif (array_search($this->step, array_keys($this->steps)) > array_search($step_key, array_keys($this->steps))) {
                    echo ' done';
                }
                ?>"><?php echo esc_html($step['name']); ?></li>
                <?php endforeach; ?>
        </ol>
        <?php
    }

    /**
     * Output the content for the current step
     */
    public function theme_setup_wizard_content() {
        echo '<div class="theme-setup-content container">';
        call_user_func($this->steps[$this->step]['view']);
        echo '</div>';
    }

    /**
     * Introduction step
     */
    public function theme_setup_introduction() {
        ?><h3><?php _e('Welcome to the Artwork Theme!', 'artwork-lite'); ?></h3>
        <p><?php _e('Thank you for choosing Artwork theme. This Quick Guided Tour will show you how to:', 'artwork-lite'); ?></p>
        <ul>
            <li><?php _e('Customize this theme in a few steps', 'artwork-lite'); ?></li>
            <li><?php _e('Change colors, texts and images', 'artwork-lite'); ?></li>
            <li><?php _e('Import sample content', 'artwork-lite'); ?></li>
            <li><?php _e('Install plugins', 'artwork-lite'); ?></li>
        </ul>
        <p><i><?php _e('If you don&rsquo;t want to go through the wizard, you can', 'artwork-lite'); ?>
                <a href="<?php echo esc_url(admin_url('themes.php')); ?>" class="" ><?php _e('skip and return to the WordPress dashboard.', 'artwork-lite'); ?></a>
                <?php _e('This Wizard is always available under Appearance > Theme Wizard menu.', 'artwork-lite'); ?></i></p>
        <br/>
        <p class="theme_setup-actions step text-center">
            <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Let\'s Go!', 'artwork-lite'); ?></a>          
        </p>
        <?php
    }

    /**
     * Customizer setup
     */
    public function theme_setup_customizer() {
        ?>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h2><?php _e('Customizer', 'artwork-lite'); ?></h2>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="theme_setup-actions step text-right top">
                    <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p><?php _e('One of the main tools of this theme is the WordPress Customizer. Navigate to Appearance > Customize to change logo, website title, contact information, colors, menu items and so on. Once you are happy with your changes, click Save&Publish to reflect them on your live site.', 'artwork-lite'); ?></p>
            </div>
        </div>

        <h5><?php _e('1. Site Identity', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-customizer.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p><?php _e('The Site Identity section in customizer allows you to change the site title, description, and control whether or not you want to display them in the header.', 'artwork-lite'); ?></p>
            </div>
        </div>
        <br>
        <h5><?php _e('2. Theme Colors', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-customizer-colors.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p><?php _e('The Colors section in customizer allows you to choose predefined colors or select your own colors.', 'artwork-lite'); ?></p>
            </div>
        </div>
        <br>
        <h5><?php _e('3. Footer Text', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-customizer-general.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p><?php _e('This section in customizer allows change text in the footer.', 'artwork-lite'); ?></p>
            </div>
        </div>        
        <hr>
        <p class="theme_setup-actions step text-right">
            <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
        </p>
        <?php
    }

    /**
     * Locale settings
     */
    public function theme_setup_section() {
        ?>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h2><?php _e('Front Page', 'artwork-lite'); ?></h2>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="theme_setup-actions step text-right top">
                    <?php if ($this->theme_checkPages()) : ?>           
                        <?php
                        $keys = array_keys($this->steps);
                        $url = add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) + 3], remove_query_arg('translation_updated'));
                        ?>
                        <a href="<?php echo $url; ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
                    <?php else: ?>
                        <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p><?php _e('Another great feature of this theme is completely customizable Front Page. Front Page is the main page of your website that includes your Works. How to build your Front Page:', 'artwork-lite'); ?></p>
            </div>
        </div>
        <h5><?php _e('1. Configure your Front Page', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-customizer-frontpage.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p><?php _e('The Static Front Page section in customizer allows you to set the content of your front page. The options are:', 'artwork-lite'); ?></p>
                <ul>
                    <li><?php _e('Customizable Front Page (default)', 'artwork-lite'); ?></li>
                    <li><?php _e('Your latest posts ', 'artwork-lite'); ?></li>
                    <li><?php _e('A static page', 'artwork-lite'); ?></li>
                </ul>
                <p><i><?php _e('Customizable Front Page is set by default in this theme. You may remove the checkbox if you want to show your latest posts.', 'artwork-lite'); ?></i></p>
                <p><?php _e('The Front Page shows your projects set within Works menu. To change Works settings,  update and add tags and categories, go to Dashboard > Works.', 'artwork-lite'); ?></p>
            </div>
        </div>
        <br>
        <h5><?php _e('2. About page', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-about.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p><?php _e('Here you can change the content and image of the About page.', 'artwork-lite'); ?></p>
            </div>
        </div>
        <br><br>
        <h5><?php _e('3. Works', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-works.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p><?php _e('Start customizing your front page posts:', 'artwork-lite'); ?></p>
                <ul>
                    <li><?php _e('Find them in Dashboard > Works', 'artwork-lite'); ?></li>
                    <li><?php _e('All Works support Post Formats feature, so you are free to change a standard view of your posts to a gallery, video, image, etc.', 'artwork-lite'); ?></li>
                    <li><?php _e('You can switch default page template to Archive Works template', 'artwork-lite'); ?></li>
                </ul>
            </div>
        </div>

        <hr/>
        <p class="theme_setup-actions step text-right">
            <?php if ($this->theme_checkPages()) : ?>           
                <?php
                $keys = array_keys($this->steps);
                $url = add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) + 3], remove_query_arg('translation_updated'));
                ?>
                <a href="<?php echo $url; ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
            <?php else: ?>
                <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
            <?php endif; ?>
        </p>
        <?php
    }

    /**
     * Page Templates
     */
    public function theme_setup_page_templates() {
        ?>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h2><?php _e('Blog and Page Templates', 'artwork-lite'); ?></h2>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="theme_setup-actions step text-right top">
                    <?php if ($this->theme_checkPlugins()) : ?>           
                        <?php
                        $keys = array_keys($this->steps);
                        $url = add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) + 3], remove_query_arg('translation_updated'));
                        ?>
                        <a href="<?php echo $url; ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
                    <?php else:
                        ?>
                        <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <h5><?php _e('1. Blog', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-page-blog.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <p><?php _e('How to create a Blog page:', 'artwork-lite'); ?></p>
                <ul>
                    <li><?php _e('Create a New Page and name it Blog', 'artwork-lite'); ?></li>
                </ul>
            </div>
        </div>
        <br>
        <h5><?php _e('2. Page Templates', 'artwork-lite'); ?></h5>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <img src="<?php echo get_template_directory_uri() . '/images/admin-page-templates.png'; ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <p><?php _e('This theme supports following page templates:', 'artwork-lite'); ?></p>
                <ul>
                    <li><?php _e('Archive works', 'artwork-lite'); ?></li>
                    <li><?php _e('Blog works', 'artwork-lite'); ?></li>
                </ul>
            </div>
        </div>

        <hr/>
        <p class="theme_setup-actions step text-right">
            <?php if ($this->theme_checkPlugins()) : ?>           
                <?php
                $keys = array_keys($this->steps);
                $url = add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) + 3], remove_query_arg('translation_updated'));
                ?>
                <a href="<?php echo $url; ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
            <?php else:
                ?>
                <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>
            <?php endif; ?>
        </p>
        <?php
    }

    /**
     * Ready 
     */
    public function theme_setup_ready() {
        ?>
        <h3 class="text-center"><?php _e('You are Ready!', 'artwork-lite'); ?></h3>
        <br/>
        <br/>
        <p class="theme_setup-actions step text-center">
            <a href="<?php echo esc_url(admin_url('themes.php')); ?>" class="button white-button" ><?php _e('Return to the WordPress Dashboard', 'artwork-lite'); ?></a>
            <a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button"><?php _e('Customize your theme', 'artwork-lite'); ?></a>
        </p> 
        <?php
    }

    public function theme_check_import() {
        if (is_plugin_active('mp-artwork/mp-artwork.php') && is_plugin_active('wordpress-importer/wordpress-importer.php')) :
            return true;
        endif;
        return false;
    }

    /**
     * import Dummy 
     */
    public function theme_setup_import() {
        ?>
        <p class="theme_setup-actions step text-right pull-right top">
            <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>          
        </p>
        <h2 class="text-left"><?php _e('Sample content', 'artwork-lite'); ?></h2>

        <?php
        if ($this->theme_check_import()):
            ?>
            <p><?php _e('Import sample content', 'artwork-lite'); ?></p>
            <p><?php _e('You can import sample content to make your site look similar to the demo. This is optional but provides a good starting point. Demo examples of the posts, works, and settings will be imported to your new website.', 'artwork-lite'); ?></p>
            <div class="import_preloader_text hide_theme_preloader_text" ><?php _e('Loading. Wait few minutes...', 'artwork-lite'); ?></div>
            <br/>
            <p class="start_import theme_setup-actions step pull-left"><input type="button" value="Start import" id="start_import" data-filename="<?php echo get_template_directory() . '/assets/artwork-sample-content.xml'; ?>"></p>                
            <p class="theme_setup-actions step text-right">
                <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button" ><?php _e('Next', 'artwork-lite'); ?></a>          
            </p>
            <?php
        else:
            ?>
            <p><?php _e('You can import sample content to make your site look similar to the demo. This is optional but provides a good starting point. Demo examples of the posts, works, and settings will be imported to your new website.', 'artwork-lite'); ?></p>
            <p><?php _e('To import test content you need activate plugins "WordPress Importer" plugin and "Work for Artwork" theme plugin. ', 'artwork-lite'); ?></p>
            <p class="theme_setup-actions step pull-left">
                <a href="<?php echo esc_url($this->theme_get_before_step_link(2)); ?>" class="button import-button"><?php _e('Activate plugin', 'artwork-lite'); ?></a>          
            </p>
            <p class="theme_setup-actions step text-right">
                <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Next', 'artwork-lite'); ?></a>          
            </p>
        <?php
        endif;
    }

    public function theme_checkPlugins() {
        if ((is_plugin_active('mp-artwork/mp-artwork.php')  && is_plugin_active('regenerate-thumbnails/regenerate-thumbnails.php') && is_plugin_active('motopress-content-editor-lite/motopress-content-editor.php'))) {
            return true;
        } else {
            return false;
        }
    }

    public function theme_checkPages() {
        global $wpdb;
        $slug = 'about';
        $page_found = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='page' AND post_status = 'publish' AND post_name = %s LIMIT 1;", $slug));
        if ($page_found)
            return true;
        return false;
    }

    /**
     * Setup plugin 
     */
    public function theme_setup_plugins() {
        $installed_plugins = get_plugins();
        if ($this->theme_checkPlugins()) :
            wp_redirect(esc_url(home_url('/wp-admin/admin.php?page=theme-setup')));
        else:
            ?>
            <h2><?php _e('This theme recommends the following free plugins:', 'artwork-lite'); ?></h2>
            <br>
            <form  method="post" action="<?php echo esc_url($this->theme_get_next_step_link()); ?>">
                <?php
                if (!isset($installed_plugins['mp-artwork/mp-artwork.php'])) :
                    ?>
                    <div class="checkbox" style="margin-bottom: 15px;">
                        <label>
                            <input type="checkbox" value="1" checked="checked" name="plugins[mp_artwork_install]">
                            <h5 style="margin-bottom:0px;"><?php _e('Work for Artwork theme', 'artwork-lite') ?></h5>
                            <i><?php _e('Adds Works section to this theme.', 'artwork-lite') ?></i>
                        </label>
                    </div>
                <?php elseif (is_plugin_inactive('mp-artwork/mp-artwork.php')) : ?>
                    <div class="checkbox" style="margin-bottom: 15px;">
                        <label>
                            <input type="checkbox" value="1" checked="checked" name="plugins[mp_artwork_activate]">
                            <h5 style="margin-bottom:0px;"><?php _e('Work for Artwork theme!', 'artwork-lite') ?></h5>
                            <i><?php _e('Activate this plugin.', 'artwork-lite') ?></i>
                        </label>
                    </div>
                <?php endif; ?>

                <?php
                if (!isset($installed_plugins['motopress-content-editor-lite/motopress-content-editor.php'])) :
                  ?>
                  <div class="checkbox" style="margin-bottom: 15px;">
                  <label>
                  <input type="checkbox" value="1" checked="checked" name="plugins[motopress_lite_install]">
                  <h5 style="margin-bottom:0px;"><?php _e('MotoPress Content Editor Lite', 'artwork-lite') ?></h5>
                  <i><?php _e('Enhances the standard WordPress editor and enables to build websites visually. It\'s complete solution for building responsive pages without coding and simply by dragging and dropping content elements.',  'artwork-lite') ?></i>
                  </label>
                  </div>
                  <?php elseif (is_plugin_inactive('motopress-content-editor-lite/motopress-content-editor.php')) : ?>
                  <div class="checkbox" style="margin-bottom: 15px;">
                  <label>
                  <input type="checkbox" value="1" checked="checked" name="plugins[motopress_lite_activate]">
                  <h5 style="margin-bottom:0px;"><?php _e('MotoPress Content Editor Lite', 'artwork-lite') ?></h5>
                  <i><?php _e('Activate this plugin.', 'artwork-lite') ?></i>
                  </label>
                  </div>
                  <?php endif;
                ?>                
                <?php
                if (!isset($installed_plugins['wordpress-importer/wordpress-importer.php'])) :
                    ?>
                    <div class="checkbox" style="margin-bottom: 15px;">
                        <label>
                            <input type="checkbox" value="1" checked="checked" name="plugins[importer_install]">
                            <h5 style="margin-bottom:0px;"><?php _e('WordPress Importer', 'artwork-lite') ?></h5>
                            <i><?php _e('Import posts, pages, comments, custom fields, categories, tags and more from a WordPress export file.', 'artwork-lite') ?></i>
                        </label>
                    </div>
                <?php elseif (is_plugin_inactive('wordpress-importer/wordpress-importer.php')) : ?>
                    <div class="checkbox" style="margin-bottom: 15px;">
                        <label>
                            <input type="checkbox" value="1" checked="checked" name="plugins[importer_activate]">
                            <h5 style="margin-bottom:0px;"><?php _e('WordPress Importer', 'artwork-lite') ?></h5>
                            <i><?php _e('Activate this plugin.', 'artwork-lite') ?></i>
                        </label>
                    </div>
                <?php endif; ?>

                <?php
                if (!isset($installed_plugins['regenerate-thumbnails/regenerate-thumbnails.php'])) :
                    ?>
                    <div class="checkbox" style="margin-bottom: 15px;">
                        <label>
                            <input type="checkbox" value="1" checked="checked" name="plugins[regenerate_thumbnails_install]">
                            <h5 style="margin-bottom:0px;"><?php _e('Regenerate Thumbnails', 'artwork-lite') ?></h5>
                            <i><?php _e('Allows you to regenerate the thumbnails for your images if you\'ve changed a theme. Available under Dashboard - Tools - Regenerate Thumbnails menu.', 'artwork-lite') ?></i>

                        </label>
                    </div>
                <?php elseif (is_plugin_inactive('regenerate-thumbnails/regenerate-thumbnails.php')) : ?>
                    <div class="checkbox" style="margin-bottom: 15px;">
                        <label>
                            <input type="checkbox" value="1" checked="checked" name="plugins[regenerate_thumbnails_activate]" >
                            <h5 style="margin-bottom:0px;"><?php _e('Regenerate Thumbnails', 'artwork-lite') ?></h5>
                            <i><?php _e('Activate this plugin.', 'artwork-lite') ?></i>
                        </label>
                    </div>
                <?php endif; ?>
                <p class="theme_setup-actions step text-center">
                    <?php
                    $keys = array_keys($this->steps);
                    $url = add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) + 2], remove_query_arg('translation_updated'));
                    ?>
                    <a href="<?php echo esc_url($url); ?>" class="button white-button"><?php _e('Skip step', 'artwork-lite'); ?></a>
                    <input class="button" type="submit" value="Install">

                </p> 
            </form>
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('input[type="checkbox"]').click(function () {
                        if (jQuery(this).is(":checked")) {
                            jQuery(this).parent().find('input[type="checkbox"]').attr('value', '1');
                        } else {
                            jQuery(this).parent().find('input[type="checkbox"]').attr('value', '0');
                        }
                        jQuery('input[type="submit"]').attr("disabled", "disabled");
                        jQuery('input[type="checkbox"]').each(function () {
                            if (jQuery(this).is(":checked")) {
                                jQuery('input[type="submit"]').removeAttr("disabled");
                            }
                        });

                    });
                });
            </script>

        <?php
        endif;
    }

    public function theme_setup_install_pages() {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery("html, body").animate({scrollTop: jQuery(document).height()}, 1000);
            });
        </script>
        <h2><?php _e('Installing the pages', 'artwork-lite'); ?></h2>
        <?php
        $array = $_POST["pages"];
        if (sizeof($array) > 0) {
            if (array_key_exists("about", $array)) {
                echo '<h5>';
                echo __('About page', 'artwork-lite');
                echo '</h5>';
                theme_create_page();
            }
        } else {
            wp_redirect(esc_url(home_url('/wp-admin/admin.php?page=theme-setup')));
        }
        ?>
        <br/>
        <p class="theme_setup-actions step text-center">
            <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Continue', 'artwork-lite'); ?></a>
        </p>
        <?php
    }

    /**
     * Setup pages 
     */
    public function theme_setup_pages() {
        $installed_plugins = get_plugins();
        if ($this->theme_checkPages()) :
            wp_redirect(esc_url(home_url('/wp-admin/admin.php?page=theme-setup')));
        else:
            ?>
            <h2><?php _e('This theme recommends to create the following pages:', 'artwork-lite'); ?></h2>
            <br>
            <form  method="post" action="<?php echo esc_url($this->theme_get_next_step_link()); ?>">

                <div class="checkbox" style="margin-bottom: 15px;">
                    <label>
                        <input type="checkbox" value="1" checked="checked" name="pages[about]">
                        <h5 style="margin-bottom:0px;"><?php _e('About page for Artwork theme', 'artwork-lite') ?></h5>
                        <i><?php _e('Adds About page to this theme.', 'artwork-lite') ?></i>
                    </label>
                </div>
                <p class="theme_setup-actions step text-center">
                    <?php
                    $keys = array_keys($this->steps);
                    $url = add_query_arg('step', $keys[array_search($this->step, array_keys($this->steps)) + 2], remove_query_arg('translation_updated'));
                    ?>
                    <a href="<?php echo esc_url($url); ?>" class="button white-button"><?php _e('Skip step', 'artwork-lite'); ?></a>
                    <input class="button" type="submit" value="Create">

                </p> 
            </form>
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('input[type="checkbox"]').click(function () {
                        if (jQuery(this).is(":checked")) {
                            jQuery(this).parent().find('input[type="checkbox"]').attr('value', '1');
                        } else {
                            jQuery(this).parent().find('input[type="checkbox"]').attr('value', '0');
                        }
                        jQuery('input[type="submit"]').attr("disabled", "disabled");
                        jQuery('input[type="checkbox"]').each(function () {
                            if (jQuery(this).is(":checked")) {
                                jQuery('input[type="submit"]').removeAttr("disabled");
                            }
                        });

                    });
                });
            </script>

        <?php
        endif;
    }

    public function theme_setup_install_plugins() {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery("html, body").animate({scrollTop: jQuery(document).height()}, 1000);
            });
        </script>
        <h2><?php _e('Installing the plugins (this may take awhile)', 'artwork-lite'); ?></h2>
        <?php
        $array = $_POST["plugins"];
        if (sizeof($array) > 0) {
            require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
            if (array_key_exists("mp_artwork_install", $array) || array_key_exists("mp_artwork_activate", $array)) {
                echo __('<h5>Works for Artwork theme</h5>', 'artwork-lite');
            }
            if (array_key_exists("mp_artwork_install", $array)) {
                $plugin = 'mp-artwork';
                $url = get_template_directory_uri() . '/assets/mp-artwork.zip';
                theme_install_plugin($plugin, $url);
                $plugin_path = 'mp-artwork/mp-artwork.php';
                $plugin_name = __('Works for Artwork theme', 'artwork-lite');
                echo '<p>' . sprintf(__('Activating %s plugin...', 'artwork-lite'), $plugin_name) . '</p>';
                theme_activate_plugin($plugin_name, $plugin_path);
                echo '<br/>';
            }
            if (array_key_exists("mp_artwork_activate", $array)) {
                $plugin_path = 'mp-artwork/mp-artwork.php';
                $plugin_name = __('Works for Artwork theme', 'artwork-lite');
                echo '<p>' . sprintf(__('Activating %s plugin...', 'artwork-lite'), $plugin_name) . '</p>';
                theme_activate_plugin($plugin_name, $plugin_path);
                echo '<br>';
            }
            if (array_key_exists("motopress_lite_install", $array) || array_key_exists("motopress_lite_activate", $array)) {
              echo __('<h5>MotoPress Content Editor Lite</h5>', 'artwork-lite');
              }
              if (array_key_exists("motopress_lite_install", $array)) {
              $plugin = 'motopress-content-editor-lite';
              $url = 'https://downloads.wordpress.org/plugin/motopress-content-editor-lite.zip';
              theme_install_plugin($plugin, $url);
              $plugin_path = 'motopress-content-editor-lite/motopress-content-editor.php';
              $plugin_name = __('MotoPress Content Editor Lite', 'artwork-lite');
              echo '<p>' . sprintf( __('Activating %s plugin...', 'artwork-lite' ), $plugin_name) . '</p>';
              theme_activate_plugin($plugin_name, $plugin_path);
              echo '<br/>';
              }
              if (array_key_exists("motopress_lite_activate", $array)) {
              $plugin_path = 'motopress-content-editor-lite/motopress-content-editor.php';
              $plugin_name = __('MotoPress Content Editor Lite',  'artwork-lite' );
              echo '<p>' . sprintf( __('Activating %s plugin...', 'artwork-lite' ), $plugin_name). '</p>';
              theme_activate_plugin($plugin_name, $plugin_path);
              echo '<br/>';
              }
            if (array_key_exists("importer_install", $array) || array_key_exists("importer_activate", $array)) {
                echo __('<h5>WordPress Importer</h5>', 'artwork-lite');
            }
            if (array_key_exists("importer_install", $array)) {
                $plugin = 'wordpress-importer';
                $url = 'https://downloads.wordpress.org/plugin/wordpress-importer.0.6.1.zip';
                theme_install_plugin($plugin, $url);
                $plugin_path = 'wordpress-importer/wordpress-importer.php';
                $plugin_name = __('WordPress Importer', 'artwork-lite');
                echo '<p>' . sprintf(__('Activating %s plugin...', 'artwork-lite'), $plugin_name) . '</p>';
                theme_activate_plugin($plugin_name, $plugin_path);
                echo '<br/>';
            }
            if (array_key_exists("importer_activate", $array)) {
                $plugin_path = 'wordpress-importer/wordpress-importer.php';
                $plugin_name = __('WordPress Importer', 'artwork-lite');
                echo '<p>' . sprintf(__('Activating %s plugin...', 'artwork-lite'), $plugin_name) . '</p>';
                theme_activate_plugin($plugin_name, $plugin_path);
                echo '<br>';
            }
            if (array_key_exists("regenerate_thumbnails_install", $array) || array_key_exists("regenerate_thumbnails_activate", $array)) {
                echo __('<h5>Regenerate Thumbnails</h5>', 'artwork-lite');
            }
            if (array_key_exists("regenerate_thumbnails_install", $array)) {
                $plugin = 'regenerate-thumbnails';
                $url = 'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip';
                theme_install_plugin($plugin, $url);
                $plugin_path = 'regenerate-thumbnails/regenerate-thumbnails.php';
                $plugin_name = __('Regenerate Thumbnails', 'artwork-lite');
                echo '<p>' . sprintf(__('Activating %s plugin...', 'artwork-lite'), $plugin_name) . '</p>';
                theme_activate_plugin($plugin_name, $plugin_path);
                echo '<br/>';
            }
            if (array_key_exists("regenerate_thumbnails_activate", $array)) {
                $plugin_path = 'regenerate-thumbnails/regenerate-thumbnails.php';
                $plugin_name = __('Regenerate Thumbnails', 'artwork-lite');
                echo '<p>' . sprintf(__('Activating %s plugin...', 'artwork-lite'), $plugin_name) . '</p>';
                theme_activate_plugin($plugin_name, $plugin_path);
                echo '<br/>';
            }
        } else {
            wp_redirect(esc_url(home_url('/wp-admin/admin.php?page=theme-setup')));
        }
        ?>
        <br/>
        <p class="theme_setup-actions step text-center">
            <a href="<?php echo esc_url($this->theme_get_next_step_link()); ?>" class="button"><?php _e('Continue', 'artwork-lite'); ?></a>
        </p>
        <?php
    }

    /**
     * Setup Wizard Header
     */
    public function theme_setup_wizard_header() {
        ?>
        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
            <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title><?php wp_title(''); ?></title>
                <?php
                wp_print_scripts('jquery');
                wp_print_scripts('thickbox');

                wp_print_scripts('theme-importer');
                ?>
                <script type="text/javascript">
                    var theme_ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                </script>
                <?php do_action('admin_print_styles'); ?>
                <?php do_action('admin_head'); ?>
            </head>
            <body class="theme_setup wp-core-ui site-main">
                <div class="entry-content">
                    <br/>
                    <h4 class="text-center">Theme Quick Guided Tour</h4>
                    <?php
                }

                /**
                 * Setup Wizard Footer
                 */
                public function theme_setup_wizard_footer() {
                    ?>
                </div>
            </body>
        </html>
        <?php
    }

}

function theme_install_plugin($plugin, $url) {
    $title = '';
    $upgrader = new Plugin_Upgrader(
            $skin = new Plugin_Upgrader_Skin(
            compact('url', 'plugin', '', 'title')
            )
    );
    // Perform plugin insatallation from source url
    $upgrader->install($url);
    //Flush plugins cache so we can make sure that the installed plugins list is always up to date
    wp_cache_flush();
}

function theme_activate_plugin($plugin_name, $plugin_path) {
    $result = activate_plugin($plugin_path);

    if (is_wp_error($result)) {
        echo '<p>' . $plugin_name . ' ' . __('plugin is not activated', 'artwork-lite') . '</p>';
    } else {
        echo '<p>' . $plugin_name . ' ' . __('plugin is activated', 'artwork-lite') . '</p>';
    }
}

function theme_create_page() {
    global $wpdb;
    echo '<p>' . __('Creating About page...', 'artwork-lite') . '</p>';
    $slug = 'about';
    $trashed_page_found = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='page' AND post_status = 'trash' AND post_name = %s LIMIT 1;", $slug));
    if ($trashed_page_found) {
        $page_id = $trashed_page_found;
        $page_data = array(
            'ID' => $page_id,
            'post_status' => 'publish',
        );
        wp_update_post($page_data);
    } else {
        $page_data = array(
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_author' => 1,
            'post_name' => $slug,
            'post_title' => 'About',
            'post_content' => '',
            'post_parent' => 0,
            'comment_status' => 'closed'
        );
        $page_id = wp_insert_post($page_data);
    }
    echo '<p>' . __('About page is created', 'artwork-lite') . '</p>';
}

new Theme_Admin_Setup_Wizard();


