<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */

if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            if ( strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( get_template_directory() ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/plugin/hooks', array( $this, 'remove_demo' ) );
            // Function to test the compiler hook and demo CSS output.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2); 
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            // Dynamically add a section. Can be also used to modify sections/fields
            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
            //echo "<h1>The compiler hook has run!";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
              require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
              $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
              );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'redux-framework-demo'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
            }

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            $featuresHTML = <<< FEATURES
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-cog-alt"></i></div>
                <h3>Page Builder</h3>
                <p>FlatOn Pro supports Page Builder. All our shortcodes can be used as widgets too. You can drag and drop our widgets with page builder visual editor.</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-th-large"></i></div>
                <h3>Page Layout</h3>
                <p>FlatOn Pro offers many different page layouts so you can quickly and easily create your pages with various layout without any hassle!</p>
            </div>            
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-adjust-alt"></i></div>
                <h3>Unlimited Sidebar</h3>
                <p>Unlimited sidebars allows you to create multiple sidebars. Check out our demo site to see how different pages displays different sidebars!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-fork"></i></div>
                <h3>Shortcode Builder</h3>
                <p>With our shortcode builder and lots of shortcodes, you can easily create nested shortcodes and build custom pages!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-camera"></i></div>
                <h3>Multi Portfolio</h3>
                <p>7 portfolio layouts with Isotope filtering, 3 blog layouts and multiple other alternate layouts for interior pages!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-fontsize"></i></div>
                <h3>Typography</h3>
                <p>FlatOn Pro loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-slideshare"></i></div>
                <h3>Awesome Sliders</h3>
                <p>FlatOn Pro includes two types of slider. You can use both Flex and Elastic sliders anywhere in your site.</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-dashboard"></i></div>
                <h3>Woo Commerce</h3>
                <p>FlatOn Pro has full design/code integration for WooCommerce, your shop will look as good as the rest of your site!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-tasks"></i></div>
                <h3>Custom Widget</h3>
                <p>We offer many custom widgets that are stylized and ready for use. Simply drag &amp; drop into place to activate!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-leaf"></i></div>
                <h3>Advanced Admin</h3>
                <p>Advanced Redux Framework for theme options panel, you can customize any part of your site quickly and easily!</p>
            </div>            
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-magic"></i></div>
                <h3>Font Awesome</h3>
                <p>Font Awesome icons are fully integrated into the theme. Use them anywhere in your site in 6 different sizes!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-resize-full"></i></div>
                <h3>Responsive Layout</h3>
                <p>FlatOn Pro is fully responsive and can adapt to any screen size. Resize your browser window to view it!</p>
            </div>  

            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-magic"></i></div>
                <h3>Testimonials</h3>
                <p>With our testimonial post type, shortcode and widget, Displaying testimonials is a breeze.</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-smiley-alt"></i></div>
                <h3>Social Media</h3>
                <p>Want your users to stay in touch? No problem, FlatOn Pro has Social Media icons all throughout the theme!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-map-marker-alt"></i></div>
                <h3>Google Map</h3>
                <p>FlatOn Pro includes Goole Map as shortcode and widget. So, you can use it anywhere in your site!</p>
            </div>
        </div>
FEATURES;
/*
<!--
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-opensource"></i></div>
                <h3>Excellent Support</h3>
                <p>We truly care about our customers and theme’s performance. We assure you that you will get the best after sale support like never before!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-picture"></i></div>
                <h3>Retina Ready</h3>
                <p>FlatOn Pro is Retina Ready. So, Everything looks amazingly sharp and crisp on high resolution retina displays of all sizes!</p>
            </div>
         
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-idea"></i></div>
                <h3>Demo Content</h3>
                <p>FlatOn Pro includes demo content files. You can quickly setup the site like our demo and get started easily!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-wrench-alt"></i></div>
                <h3>Customization</h3>
                <p>With advanced theme options, page options &amp; extensive docs, its never been easier to customize a theme!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-cogs"></i></div>
                <h3>Improvement</h3>
                <p>We love our theme and customers. We are committed to improve and add new features to FlatOn Pro!</p>
            </div>
            <div class="one-third column">
                <div class="icon-wrap"><i class="el-icon-inbox-alt"></i></div>
                <h3>Regular Updates</h3>
                <p>We keep our themes secure and keep adding great new features!</p>
            </div>        
-->
*/

            // ACTUAL DECLARATION OF SECTIONS

            $this->sections[] = array(
                'title' => __('General Settings', 'boxy'),
                'desc' => __('General Settings of Theme to change look and feel through out the site', 'boxy'),
                'icon' => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(  
                    array(
                        'id'=>'color',
                        'type' => 'select',
                        'title' => __('Color Scheme', 'boxy'),
                        'subtitle'=> __('Select your color scheme.', 'boxy'),
                        'options' => array( '1' => 'default', '2' => 'More color schemes in FlatOn Pro Version.' ),
                        'default' => '1'
                        ),
                    array(
                        'id'=>'breadcrumb',
                        'type' => 'switch', 
                        'title' => __('Enable Breadcrumb Navigation', 'boxy'),
                        'subtitle'=> __('Check to display breadcrumb navigation.', 'boxy'),
                        'default' => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                        ),      

                    array(
                        'id'=>'breadcrumb-char',
                        'type' => 'select',
                        'title' => __('Breadcrumb Character', 'boxy'),
                        'subtitle'=> __('Check to display breadcrumb navigation.', 'boxy'),
                        'options' => array( '1' => ' &raquo; ', '2' => ' / ', '3' => ' > ' ),
                        'default' => '1'
                        ),

                    array(
                        'id'        => 'upgrade-notice-1',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'critical',
                        'icon'      => 'el-icon-info-sign',
                        'title'     => __('FlatOn Pro Options. <a href="#">Upgrade Now</a> for just $9.', 'boxy'),
                        'desc'      => __('These options are available only in FlatOn Pro version theme. Upgrade now for just $9 (First 100 customers only).', 'boxy')
                    ),
                    array(
                        'id'=>'pagenavi',
                        'type' => 'switch', 
                        'title' => __('Enable Numeric Page Navigation', 'boxy'),
                        'subtitle'=> __('Check to display numeric page navigation, instead of Previous Posts / Next Posts links.', 'boxy'),
                        'default'       => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                        ),      
                    array(
                        'id'=>'slicknav',
                        'type' => 'switch', 
                        'title' => __('Enable SlickNav', 'boxy'),
                        'subtitle'=> __('Check to display reponsive menu using SlickNav', 'boxy'),
                        'default'       => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                        ), 
                    array(
                        'id'=>'layout',
                        'type' => 'image_select',
                        'compiler'=>true,
                        'title' => __('Main Layout', 'boxy' ), 
                        'subtitle' => __('Select main content and sidebar alignment.', 'boxy' ),
                        'options' => array(
                                '2' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                                '3' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png'),
                            ),
                        'default' => '3'
                        ),

                    array(
                        'id'=>'custom-js',
                        'type' => 'textarea',
                        'title' => __('Custom Javascript', 'boxy'), 
                        'subtitle' => __('Quickly add some Javascript to your theme by adding it to this block.', 'boxy'),
                        //'validate' => 'js',
                        'desc' => 'Validate that it\'s javascript!',
                        ),      
               array(
                        'id'=>'custom-css',
                        'type' => 'ace_editor',
                        'title' => __('Custom CSS', 'boxy'), 
                        'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', 'boxy'),
                        'mode' => 'css',
                  'theme' => 'monokai',
                        'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        )
                )
            );


            $this->sections[] = array(
                'title' => __('Header', 'boxy'),
                'desc' => __('Theme options related to header section', 'boxy'),
                'icon' => 'el-icon-arrow-up',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(  

                    array(
                        'id'=>'site-title',
                        'type' => 'switch', 
                        'title' => __('Logo as site title', 'boxy'),
                        'subtitle'=> __('Enable to load custom logo as site title in header.', 'boxy'),
                        "default"       => 0,
                        'on' => 'Enable',
                        'off' => 'Disable',
                        ),

                    array(
                        'id'=>'custom-logo',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Custom Logo', 'boxy'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Upload logo to use as site title', 'boxy'),
                        'subtitle' => __('Upload any media using the WordPress native uploader', 'boxy'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),

                    array(
                        'id'=>'site-description',
                        'type' => 'switch', 
                        'title' => __('Site Description', 'boxy'),
                        'subtitle'=> __('Enable to show site description in header.', 'boxy'),
                        "default"       => 1,
                        'on' => 'Enable',
                        'off' => 'Disable',
                        ),

                    array(
                        'id'        => 'upgrade-notice-2',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'critical',
                        'icon'      => 'el-icon-info-sign',
                        'title'     => __('FlatOn Pro Options. <a href="#">Upgrade Now</a> for just $9.', 'boxy'),
                        'desc'      => __('These options are available only in FlatOn Pro version theme. Upgrade now for just $9 (First 100 customers only).', 'boxy')
                    ),
                    array(
                        'id'=>'favicon',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Custom Favicon (ICO)', 'boxy'),
                        'desc' => __('You can upload an ico image that will represent your website\'s favicon (16px X 16px)', 'boxy'),
                        ),

                    array(
                        'id'=>'ipad-icon-retina',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPad Retina Icon Upload (144px X 144px)', 'boxy'),
                        'desc'=> __('For third-generation iPad with high-resolution Retina display', 'boxy'),
                        ),

                    array(
                        'id'=>'iphone-icon-retina',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPhone Retina Icon Upload (114px X 114px)', 'boxy'),
                        'desc'=> __('For iPhone with high-resolution Retina display', 'boxy'),
                        ),

                    array(
                        'id'=>'ipad-icon',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPad Icon Upload (72px X 72px)', 'boxy'),
                        'desc'=> __('For first- and second-generation iPad', 'boxy'),
                        ),

                    array(
                        'id'=>'iphone-icon',
                        'type' => 'media', 
                        'preview'=> false,
                        'title' => __('Apple iPhone Icon Upload (57px X 57px)', 'boxy'),
                        'desc'=> __('For non-Retina iPhone, iPod Touch, and Android 2.1+ devices', 'boxy'),
                        ),          

                    array(
                        'id'=>'google-analytics',
                        'type' => 'textarea',
                        'title' => __('Tracking Code', 'boxy'), 
                        'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'boxy'),
                        //'validate' => 'js',
                        'desc' => 'Validate that it\'s javascript!',
                    ),

                    array(
                        'id'=>'analytics-place',
                        'type' => 'switch', 
                        'title' => __('Load Tracking Code in Footer', 'boxy'),
                        'subtitle'=> __('Check to load analytics in footer. Uncheck to load in header.', 'boxy'),
                        'default' => 0,
                        'on' => 'In Footer',
                        'off' => 'In Header',
                    ),

                )
            );


            $this->sections[] = array(
                'title' => __('Footer', 'boxy'),
                'desc' => __('Theme options related to footer area of theme', 'boxy'),
                'icon' => 'el-icon-arrow-down',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(  

                    array(
                        'id'=>'footer-widgets',
                        'type' => 'switch', 
                        'title' => __('Enable Footer Widget Area', 'boxy'),
                        'subtitle'=> __('Check to enable 4 Column Footer widget Area', 'boxy'),
                        "default"       => 0,
                        'on' => 'Enable',
                        'off' => 'Disable',
                        ),

                    array(
                        'id'        => 'upgrade-notice-3',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'critical',
                        'icon'      => 'el-icon-info-sign',
                        'title'     => __('FlatOn Pro Options. <a href="#">Upgrade Now</a> for just $9.', 'boxy'),
                        'desc'      => __('These options are available only in FlatOn Pro version theme. Upgrade now for just $9 (First 100 customers only).', 'boxy')
                    ),
                    array(
                        'id'=>'footer-text',
                        'type' => 'textarea',
                        'title' => __('Footer Copyright Text', 'boxy'), 
                        'subtitle' => __('Footer copyright text. HTML Allowed', 'boxy'),
                        'desc' => __('This field is even HTML validated!', 'boxy'),
                        'default' => __( 'Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a>. Theme by <a href="http://www.webulous.in/">Webulous</a>.', 'boxy' ),
                        'validate' => 'html',
                        ),

                    array(
                        'id'=>'footer-menu',
                        'type' => 'select',
                        'data' => 'menus',
                        'title' => __('Select Menu', 'boxy'),
                        'subtitle'=> __('Select menu to display in footer.', 'boxy'),
                        ),

                    )
            );

                $this->sections[] = array(
                    'title' => __('Home', 'boxy'),
                    'desc' => __('Theme options related to home page', 'boxy'),
                    'icon' => 'el-icon-home',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(  

                        array(
                            'id'=>'slides',
                            'type' => 'slides',
                            'title' => __('Flex Slider Options', 'boxy' ),
                            'subtitle'=> __('Unlimited slides with drag and drop sortings.', 'boxy' ),
                            'show' => array( 'title' => true, 'description' => true, 'url' => true ),
                        ),

                        array(
                        'id'=>'service-icon-1',
                        'type' => 'select',
                        'data' => 'elusive-icons',
                        'title' => __('1. Service Icon', 'boxy' ), 
                        'subtitle' => __('Select icon that represents your service', 'boxy' ),
                        ),
                        
                        array(
                            'id'=>'service-title-1',
                            'type' => 'text',
                            'title' => __('1. Service Title', 'boxy' ), 
                        ),

                        array(
                            'id'=>'service-description-1',
                            'type' => 'textarea',
                            'title' => __('1. Service Description', 'boxy' ), 
                            'subtitle' => __('Custom HTML, Just like a text box widget.', 'boxy' ),
                            'desc' => __('This field is even HTML validated!', 'boxy' ),
                            'validate' => 'html',
                        ),

                        array(
                            'id'=>'service-icon-2',
                            'type' => 'select',
                            'data' => 'elusive-icons',
                            'title' => __('2. Service Icon', 'boxy' ), 
                            'subtitle' => __('Select icon that represents your service', 'boxy' ),
                        ),
                        
                        array(
                            'id'=>'service-title-2',
                            'type' => 'text',
                            'title' => __('2. Service Title', 'boxy' ), 
                        ),

                        array(
                            'id'=>'service-description-2',
                            'type' => 'textarea',
                            'title' => __('2. Service Description', 'boxy' ), 
                            'subtitle' => __('Custom HTML, Just like a text box widget.', 'boxy' ),
                            'desc' => __('This field is even HTML validated!', 'boxy' ),
                            'validate' => 'html',
                        ),

                        array(
                            'id'=>'service-icon-3',
                            'type' => 'select',
                            'data' => 'elusive-icons',
                            'title' => __('3. Service Icon', 'boxy' ), 
                            'subtitle' => __('Select icon that represents your service', 'boxy' ),
                        ),
                        
                        array(
                            'id'=>'service-title-3',
                            'type' => 'text',
                            'title' => __('1. Service Title', 'boxy' ), 
                        ),

                        array(
                            'id'=>'service-description-3',
                            'type' => 'textarea',
                            'title' => __('3. Service Description', 'boxy' ), 
                            'subtitle' => __('Custom HTML, Just like a text box widget.', 'boxy' ),
                            'desc' => __('This field is even HTML validated!', 'boxy' ),
                            'validate' => 'html',
                        ),

                        array(
                            'id'=>'recent-work-title',
                            'type' => 'text',
                            'title' => __('Recent Work Heading', 'boxy' ), 
                            'subtitle' => __('Enter heading of the skills list', 'boxy' ),
                        ), 
                        array(
                            'id'=>'recent-work-sub-title',
                            'type' => 'text',
                            'title' => __('Recent Work Sub Heading', 'boxy' ), 
                            'subtitle' => __('Enter heading of the skills list', 'boxy' ),
                        ), 

                        array(
                            'id'=>'work-images',
                            'type' => 'textarea',
                            'title' => __('Recent Work Images', 'boxy' ), 
                            'subtitle' => __('Enter heading of the skills list', 'boxy' ),
                            'validate' => 'html',
                        ), 

                        array(
                            'id'=>'why-us-left',
                            'type' => 'textarea',
                            'title' => __('Why Us Left', 'boxy' ), 
                            'subtitle' => __('Enter heading of the skills list', 'boxy' ),
                        ), 

                        array(
                            'id'=>'why-us-right',
                            'type' => 'textarea',
                            'title' => __('Why Us Right', 'boxy' ), 
                            'subtitle' => __('Enter heading of the skills list', 'boxy' ),
                        ), 

                        array(
                            'id'=>'features',
                            'type' => 'textarea',
                            'title' => __('Tabbed Content', 'boxy' ), 
                            'subtitle' => __('Tabbed content is best, like "Why Us?", "Features".', 'boxy' ),
                            'validate' => 'html',
                        ),  

                        array(
                            'id'=>'skill-1',
                            'type' => 'text',
                            'title' => __('1. Skill Name', 'boxy' ), 
                            'subtitle' => __('Enter name of the skill', 'boxy' ),
                        ),      

                        array(
                            'id'=>'percentage-1',
                            'type' => 'spinner',
                            'title' => __('1. Skill Percentage', 'boxy' ), 
                            'desc' => __('Enter 0 to 100', 'boxy' ),
                            'min' => '0',
                            'max' => '100',
                            'step' => '5',
                        ),

                        array(
                            'id'=>'skill-2',
                            'type' => 'text',
                            'title' => __('2. Skill Name', 'boxy' ), 
                            'subtitle' => __('Enter name of the skill', 'boxy' ),
                        ),      

                        array(
                            'id'=>'percentage-2',
                            'type' => 'spinner',
                            'title' => __('2. Skill Percentage', 'boxy' ), 
                            'desc' => __('Enter 0 to 100', 'boxy' ),
                            'min' => '0',
                            'max' => '100',
                            'step' => '5',
                        ),


                        array(
                            'id'=>'skill-3',
                            'type' => 'text',
                            'title' => __('3. Skill Name', 'boxy' ), 
                            'subtitle' => __('Enter name of the skill', 'boxy' ),
                        ),

                        array(
                            'id'=>'percentage-3',
                            'type' => 'spinner',
                            'title' => __('3. Skill Percentage', 'boxy' ), 
                            'desc' => __('Enter 0 to 100', 'boxy' ),
                            'min' => '0',
                            'max' => '100',
                            'step' => '5',
                        ),

                        array(
                            'id'=>'skill-4',
                            'type' => 'text',
                            'title' => __('4. Skill Name', 'boxy' ), 
                            'subtitle' => __('Enter name of the skill', 'boxy' ),
                            ),

                        array(
                            'id'=>'percentage-4',
                            'type' => 'spinner',
                            'title' => __('4. Skill Percentage', 'boxy' ), 
                            'desc' => __('Enter 0 to 100', 'boxy' ),
                            'min' => '0',
                            'max' => '100',
                            'step' => '5',
                        ),


                        array(
                            'id'=>'skill-5',
                            'type' => 'text',
                            'title' => __('5. Skill Name', 'boxy' ), 
                            'subtitle' => __('Enter name of the skill', 'boxy' ),
                        ),

                        array(
                            'id'=>'percentage-5',
                            'type' => 'spinner',
                            'title' => __('5. Skill Percentage', 'boxy' ), 
                            'desc' => __('Enter 0 to 100', 'boxy' ),
                            'min' => '0',
                            'max' => '100',
                            'step' => '5',
                        ),

                        array(
                            'id'=>'clients',
                            'type' => 'slides',
                            'title' => __('Client Logo Carousel', 'boxy' ),
                            'subtitle'=> __('Unlimited slides with drag and drop sortings.', 'boxy' ),
                            'show' => array( 'title' => true, 'description' => true, 'url' => true ),
                        ),
                    )
                );


                $this->sections[] = array(
                    'title' => __('Blog', 'boxy'),
                    'desc' => __('Blog options for site', 'boxy'),
                    'icon' => 'el-icon-file',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(  

                        array(
                            'id'=>'featured-image',
                            'type' => 'switch', 
                            'title' => __('Featured Image', 'boxy'),
                            'subtitle'=> __('Check to show featured image', 'boxy'),
                            "default"       => 0,
                            'on' => 'Show',
                            'off' => 'Hide',
                            ),

                        array(
                            'id'=>'single-featured-image',
                            'type' => 'switch', 
                            'title' => __('Single Post Featured Image', 'boxy'),
                            'subtitle'=> __('Check to show featured image on single post', 'boxy'),
                            "default"       => 0,
                            'on' => 'Show',
                            'off' => 'Hide',
                            ),
                    )
                );

        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'redux-framework-demo'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Theme Information 2', 'redux-framework-demo'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'boxy', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Theme Options', 'redux-framework-demo'),
                'page' => __('Theme Options', 'redux-framework-demo'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array('docs'),
                'help_sidebar' => '', // __( '', $this->args['domain'] );            
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.		
            $this->args['share_icons'][] = array(
                'url' => 'https://github.com/venkatraj',
                'title' => 'Visit me on GitHub',
                'icon' => 'el-icon-github'
                    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/pages/webulous/170827696548',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'https://twitter.com/webulous',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'https://www.linkedin.com/company/coding-geek',
                'title' => 'Find us on LinkedIn',
                'icon' => 'el-icon-linkedin'
            );



            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                //$this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo'), $v);
                $this->args['intro_text'] = sprintf(__('<p class="btn-upgrade"><a href="#"><i class="el-icon-upload"></i> Upgrade for just $9</a> <span>Only for first <strong>100</strong> customers</span> <a href="#" class="vide-demo"><i class="el-icon-eye-open"></i>View Demo</p>', 'redux-framework-demo'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
            }

            // Add content after the form.
            $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo');
           $this->args['footer_text'] .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">';
           $this->args['footer_text'] .= '<input type="hidden" name="cmd" value="_donations">';
           $this->args['footer_text'] .= '<input type="hidden" name="business" value="uma@codinggeek.om">';
           $this->args['footer_text'] .= '<input type="hidden" name="lc" value="US">';
           $this->args['footer_text'] .= '<input type="hidden" name="item_name" value="Theme">';
           $this->args['footer_text'] .= '<input type="hidden" name="item_number" value="Abaris">';
           $this->args['footer_text'] .= '<input type="hidden" name="no_note" value="0">';
           $this->args['footer_text'] .= '<input type="hidden" name="currency_code" value="USD">';
           $this->args['footer_text'] .= '<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">';
           $this->args['footer_text'] .= '<p>Like this theme? Help me in further development ';
           $this->args['footer_text'] .= '<input type="submit" value="Donate Now!" class="button button-primary" name="submit"></p>';
           //$this->args['footer_text'] .= '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"  style="float: right; margin-top: -20px;">';
           //$this->args['footer_text'] .= '<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">';
           $this->args['footer_text'] .= '</form>';
        }

    }

    new Redux_Framework_sample_config();
}


/**

  Custom function for the callback referenced above

 */
if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

/**

  Custom function for the callback validation referenced above

 * */
if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation

          if(something) {
          $value = $value;
          } elseif(something else) {
          $error = true;
          $value = $existing_value;
          $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;
