<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {

            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'title'     => __('General Settings', 'conica'),
                'desc'      => __('Select the basics for your site layout. Edit the logo in the <a href="'. admin_url( 'themes.php?page=custom-header' ) .'" target="_blank">header section</a>', 'conica'),
                'icon'      => 'el-icon-wordpress',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-site-type',
                        'type'      => 'select',
                        'title'     => __('Website Layout', 'conica'),
                        'subtitle'  => __('Select a layout for your website', 'conica'),
                        'options'   => array('site-layout-full-width' => 'Full Width', 'site-layout-boxed' => 'Boxed'),
                        'default'   => 'site-layout-full-width',
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Favicon', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    
                    array(
                        'id'    => 'cx-options-general-head',
                        'type'  => 'info',
                        'desc'  => __('Header Settings', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-search',
                        'type'      => 'switch',
                        'title'     => __('Header Search', 'conica'),
                        'subtitle'  => __('Enable to show the search', 'conica'),
                        'default'   => 1,
                        'on'        => 'Enabled',
                        'off'       => 'Disabled',
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Sticky Header', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Homepage Slider', 'conica'),
                'desc'      => __('The conica home page slider uses the full sized image, so make sure to upload the image at the correct size.', 'conica'),
                'icon'      => 'el-icon-file-new',
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-home-slider-enable',
                        'type'      => 'switch',
                        'title'     => __('Enable Slider', 'conica'),
                        'subtitle'  => __('Click to enable the default simple homepage slider', 'conica'),
                        'default'   => 1,
                        'on'        => 'Enabled',
                        'off'       => 'Disabled',
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Slider background color', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    
                    array(
                        'id'    => 'cx-options-home-slider-oh',
                        'type'  => 'info',
                        'desc'  => __('Slider Options', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-cats',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('Slider Categories', 'conica'),
                        'subtitle'  => __('Select multiple categories', 'conica'),
                        'desc'      => __('Select the <a href="' . admin_url( 'edit-tags.php?taxonomy=category' ) . '" target="_blank">post categories</a> you\'d like to display in the Homepage Slider, separated by a comma (,)<br />Eg: "13, 17, 19"', 'conica'),
                        'default'   => '0',
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Slider Transition Effect', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-circular',
                        'type'      => 'switch',
                        'title'     => __('Circular Slider', 'conica'),
                        'subtitle'  => __('Select if the slider should be circular', 'conica'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-infinite',
                        'type'      => 'switch',
                        'title'     => __('Infinite Slider', 'conica'),
                        'subtitle'  => __('Select if the slider should be infinite', 'conica'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-pagination-show',
                        'type'      => 'switch',
                        'title'     => __('Display Pagination', 'conica'),
                        'subtitle'  => __('Display slider pagination', 'conica'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-auto-scroll',
                        'type'      => 'switch',
                        'title'     => __('Automatic Scroll', 'conica'),
                        'subtitle'  => __('Scroll the slider automatically', 'conica'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-titles',
                        'type'      => 'switch',
                        'title'     => __('Slide Titles', 'conica'),
                        'subtitle'  => __('Select if you\'d like to show the Slide titles', 'conica'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-link',
                        'type'      => 'switch',
                        'title'     => __('Slide Links', 'conica'),
                        'subtitle'  => __('Select if you want the slider to link', 'conica'),
                        'default'   => false,
                    )
                    
                )
            );   
            
            $this->sections[] = array(
                'title'     => __('Styling Settings', 'conica'),
                'desc'      => __('Select/Change the colors and fonts of the theme', 'conica'),
                'icon'      => 'el-icon-edit',
                'fields'    => array(
                    
                    array(
                        'id'    => 'cx-options-info-st-color',
                        'type'  => 'info',
                        'desc'  => __('Site Colors', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-primary-color',
                        'type'      => 'color',
                        'output'    => array('.site-title'),
                        'title'     => __('Main color', 'conica'),
                        'subtitle'  => __('This is the color of buttons, etc around the site.', 'conica'),
                        'desc'      => __('Default: #b53434', 'conica'),
                        'default'   => '#b53434',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'cx-options-primary-hover-color',
                        'type'      => 'color',
                        'output'    => array('.site-title'),
                        'title'     => __('Main hover color', 'conica'),
                        'subtitle'  => __('This is the hover color for buttons, etc around the site.', 'conica'),
                        'desc'      => __('Default: #c54513', 'conica'),
                        'default'   => '#c54513',
                        'validate'  => 'color',
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-st-fonts',
                        'type'  => 'info',
                        'desc'  => __('Website Fonts', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Heading Font', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Body Font', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-st-css',
                        'type'  => 'info',
                        'desc'  => __('Custom Styling', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-custom-css',
                        'type'      => 'textarea',
                        'title'     => __('Custom CSS', 'conica'),
                        'subtitle'  => __('Add Custom CSS to add extra styling to the Theme', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'css',
                    ),
                )
            );
            /*
            $this->sections[] = array(
                'type' => 'divide',
            );
            */
            $this->sections[] = array(
                'title'     => __('Blog Settings', 'conica'),
                'desc'      => __('', 'conica'),
                'icon'      => 'el-icon-file-new',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Blog Page Layout', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    array(
                        'id'        => 'cx-options-blog-cats',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('Blog Categories', 'conica'),
                        'subtitle'  => __('Select multiple categories', 'conica'),
                        'desc'      => __('Select which <a href="' . admin_url( 'edit-tags.php?taxonomy=category' ) . '" target="_blank">post categories</a> you\'d like to display in the blog.', 'conica'),
                        'default'   => '0',
                    ),
                    array(
                        'id'        => 'cx-options-blog-title',
                        'type'      => 'text',
                        'title'     => __('Blog Page Title', 'conica'),
                        'subtitle'  => __('', 'conica'),
                        'desc'      => __('Enter the title you want for the blog page.', 'conica'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => 'Blog',
                        //'text_hint' => array(
                        //    'title'     => 'Eg: ',
                        //    'content'   => 'email@yoursite.com'
                        //)
                    ),
                    array(
                        'id'        => 'cx-options-blog-per-page',
                        'type'      => 'text',
                        'title'     => __('Blog Posts Per Page', 'conica'),
                        'subtitle'  => __('', 'conica'),
                        'desc'      => __('Enter the number of posts you\'d like to show per page.', 'conica'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => '10'
                    )
                    
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Social Links', 'conica'),
                'desc'      => __('Enter links to your social networks. Don\'t forget the "http://"', 'conica'),
                'icon'      => 'el-icon-group',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-url-email',
                        'type'      => 'text',
                        'title'     => __('Email Address', 'conica'),
                        'subtitle'  => __('Enter an Email address', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'email',
                        'msg'       => 'Please enter a valid email address',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'email@yoursite.com'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-skype',
                        'type'      => 'text',
                        'title'     => __('Skype Name', 'conica'),
                        'subtitle'  => __('Enter your Skype name', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => '',
                        //'text_hint' => array(
                        //    'title'     => 'Eg: ',
                        //    'content'   => 'email@yoursite.com'
                        //)
                    ),
                    array(
                        'id'        => 'cx-options-url-facebook',
                        'type'      => 'text',
                        'title'     => __('Facebook', 'conica'),
                        'subtitle'  => __('Enter your Facebook page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://www.facebook.com/YOURNAME'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-twitter',
                        'type'      => 'text',
                        'title'     => __('Twitter', 'conica'),
                        'subtitle'  => __('Enter your Twitter page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://www.twitter.com/YOURNAME'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-google-plus',
                        'type'      => 'text',
                        'title'     => __('Google Plus', 'conica'),
                        'subtitle'  => __('Enter your Google Plus page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        //'text_hint' => array(
                        //    'title'     => 'Eg: ',
                        //    'content'   => 'http://www.facebook.com/'
                        //)
                    ),
                    array(
                        'id'        => 'cx-options-url-youtube',
                        'type'      => 'text',
                        'title'     => __('YouTube', 'conica'),
                        'subtitle'  => __('Enter your YouTube page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://www.youtube.com/user/YOURNAME'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-instagram',
                        'type'      => 'text',
                        'title'     => __('Instagram', 'conica'),
                        'subtitle'  => __('Enter your Instagram page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://instagram.com/YOURNAME'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-pinterest',
                        'type'      => 'text',
                        'title'     => __('Pinterest', 'conica'),
                        'subtitle'  => __('Enter your Pinterest page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://www.pinterest.com/YOURNAME'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-linkedin',
                        'type'      => 'text',
                        'title'     => __('Linkedin', 'conica'),
                        'subtitle'  => __('Enter your Linkedin page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://www.linkedin.com/YOURNAME'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-tumblr',
                        'type'      => 'text',
                        'title'     => __('Tumblr', 'conica'),
                        'subtitle'  => __('Enter your Tumblr page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://www.tumblr.com/YOURNAME'
                        )
                    ),
                    array(
                        'id'        => 'cx-options-url-flickr',
                        'type'      => 'text',
                        'title'     => __('Flickr', 'conica'),
                        'subtitle'  => __('Enter your Flickr page url', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => 'url',
                        'default'   => '',
                        'text_hint' => array(
                            'title'     => 'Eg: ',
                            'content'   => 'http://www.flickr.com/YOURNAME'
                        )
                    )
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Website Text', 'conica'),
                'desc'      => __('Edit header text and default messages such as 404 errors and search results, etc', 'conica'),
                'icon'      => 'el-icon-file-edit',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'    => 'cx-options-info-wt-footer',
                        'type'  => 'info',
                        'desc'  => __('Footer', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Footer Copyright Text', 'conica'),
                        'subtitle'  => __('Available in Conica Premium', 'conica'),
                        'thelink'   => '<a href="http://sllwi.re/p/EK" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Conica Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Conica theme.', 'conica'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-wt-forofor',
                        'type'  => 'info',
                        'desc'  => __('404 Page', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-site-heading-forofor',
                        'type'      => 'text',
                        'title'     => __('404 Error Page Heading', 'conica'),
                        'subtitle'  => __('Enter the heading for the 404 Error page', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => 'Oops! That page can’t be found.',
                        //'text_hint' => array(
                        //    'title'     => 'Eg: ',
                        //    'content'   => 'email@yoursite.com'
                        //)
                    ),
                    array(
                        'id'        => 'cx-options-site-msg-forofor',
                        'type'      => 'textarea',
                        'title'     => __('Error 404 Message', 'conica'),
                        'subtitle'  => __('Enter the default text on the 404 error page (Page not found)', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => '',
                        'default'   => 'The page you are looking for can\'t be found. Please select one of the options below.',
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-wt-search',
                        'type'  => 'info',
                        'desc'  => __('Search Results Page', 'conica'),
                    ),
                    array(
                        'id'        => 'cx-options-site-msg-nosearch',
                        'type'      => 'textarea',
                        'title'     => __('No Search Results', 'conica'),
                        'subtitle'  => __('Enter the default text for when no search results are found', 'conica'),
                        'desc'      => __('', 'conica'),
                        'validate'  => '',
                        'default'   => 'Sorry, but nothing matched your search terms. Please try again with some different keywords or return to home.',
                    )
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Plugins', 'conica'),
                'desc'      => __('Install <a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" target="_blank">recommended plugins</a> to make your website development easier', 'conica'),
                'icon'      => 'el-icon-plus-sign',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-addplugin-one',
                        'type'      => 'callback',
                        'title'     => __('Page Builder', 'conica'),
                        'subtitle'  => __('Install Page Builer', 'conica'),
                        'thelink'   => '<a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" class="cx-options-custom-button" target="_blank">Get Page Builder</a>',
                        'desc'      => __('<a href="http://wordpress.org/plugins/siteorigin-panels" target="_blank">Page builder</a> lets you build responsive page layouts using the widgets you know and love', 'conica'),
                        'callback'  => 'cx_options_addplugin_button_link'
                    ),
                    array(
                        'id'        => 'cx-options-addplugin-two',
                        'type'      => 'callback',
                        'title'     => __('Contact Form 7', 'conica'),
                        'subtitle'  => __('Install Contact Form 7', 'conica'),
                        'thelink'   => '<a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" class="cx-options-custom-button" target="_blank">Get Contact Form 7</a>',
                        'desc'      => __('<a href="http://wordpress.org/plugins/contact-form-7" target="_blank">Contact Form 7</a> can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.', 'conica'),
                        'callback'  => 'cx_options_addplugin_button_link'
                    ),
                    array(
                        'id'        => 'cx-options-addplugin-three',
                        'type'      => 'callback',
                        'title'     => __('Breadcrumb NavXT', 'conica'),
                        'subtitle'  => __('Install Breadcrumb NavXT', 'conica'),
                        'thelink'   => '<a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" class="cx-options-custom-button" target="_blank">Get Breadcrumb NavXT</a>',
                        'desc'      => __('<a href="http://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">Breadcrumb NavXT</a> generates highly customizable breadcrumb trails for your WordPress powered blog or website', 'conica'),
                        'callback'  => 'cx_options_addplugin_button_link'
                    ),
                    array(
                        'id'        => 'cx-options-addplugin-four',
                        'type'      => 'callback',
                        'title'     => __('Masonry Widget', 'conica'),
                        'subtitle'  => __('Install Masonry Widget', 'conica'),
                        'thelink'   => '<a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" class="cx-options-custom-button" target="_blank">Get Masonry Widget</a>',
                        'desc'      => __('<a href="https://wordpress.org/plugins/so-masonry/" target="_blank">Masonry Widget</a> gives you a widget that you can use to display your posts', 'conica'),
                        'callback'  => 'cx_options_addplugin_button_link'
                    ),
                )
            );

            $this->sections[] = array(
                'type' => 'divide',
            );

            $this->sections[] = array(
                'title'     => __('Conica Premium', 'conica'),
                'desc'      => __('View some of the extra features you can have with the <a href="http://sllwi.re/p/EK" target="_blank">conica premium Wordpress theme</a>', 'conica'),
                'class'     => 'cx-upsell-section',
                'icon'      => 'el-icon-plus-sign',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-extra-sale',
                        'type'      => 'callback',
                        'title'     => __('', 'conica'),
                        'subtitle'  => __('', 'conica'),
                        'thelink'   => '',
                        'desc'      => __('', 'conica'),
                        'callback'  => 'cx_options_premium_show_section'
                    )
                )
            );
            
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Documentation', 'conica'),
                'content'   => __('<p>Theme documentation coming soon...</p>', 'conica')
            );

            //$this->args['help_tabs'][] = array(
            //    'id'        => 'redux-help-tab-2',
            //    'title'     => __('Theme Information 2', 'conica'),
            //    'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'conica')
            //);

            // Set the help sidebar
            //$this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'conica');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'cx_framework_options',  // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => false,                   // Show the sections below the admin menu item or not
                'menu_title'        => __('CONICA Settings', 'conica'),
                'page_title'        => __('CONICA Settings', 'conica'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key'    => 'AIzaSyBZzDkoKvUHtZmw6Zv4ZgBTBGJprx76KaA', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                   // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                   // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'theme.php',             // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_theme_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => 'cx_framework_options',  // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => false,                  // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://twitter.com/cxthemes',
                'title' => 'Follow cxThemes on Twitter',
                'icon'  => 'el-icon-twitter'
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
                //$this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'conica'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'conica');
            }

            // Add content after the form.
            //$this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'conica');
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}

if (!function_exists('cx_options_addplugin_button_link')):
    function cx_options_addplugin_button_link($field, $value) {
        echo $field['thelink'];
        echo '<br />';
        echo $field['desc'];
    }
endif;

if (!function_exists('cx_options_upgrade_link')):
    function cx_options_upgrade_link($field, $value) {
        echo $field['thelink'];
        echo '<br />';
        echo $field['desc'];
    }
endif;

if (!function_exists('cx_options_premium_show_section')):
    function cx_options_premium_show_section($field, $value) {
        $sale_output = '';
        $sale_output .= '<div class="cx-upsell-section-plugins">
            <h3 class="cx-upsell-heading">Favicon</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/cp01.jpg" /></div>
            <div class="cx-upsell-desc">Upload a favicon for your website with Conica Premium.</div>
            
            <h3 class="cx-upsell-heading">Sticky Header</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/cp02.jpg" /></div>
            <div class="cx-upsell-desc">Enable the sticky header letting your users always see the navigation.</div>
            
            <h3 class="cx-upsell-heading">Slider Background Color</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/cp03.jpg" /></div>
            <div class="cx-upsell-desc">Enable the option to change the slider background color.</div>
            
            <h3 class="cx-upsell-heading">Slider Transitions</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/cp04.jpg" /></div>
            <div class="cx-upsell-desc">Select between 3 different slider transitions</div>
            
            <h3 class="cx-upsell-heading">Heading & Body Fonts</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/cp05.jpg" /></div>
            <div class="cx-upsell-desc">Select between lots of Google Fonts for the Heading and Body text of your website.</div>
            
            <h3 class="cx-upsell-heading">Blog Layout</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/cp06.jpg" /></div>
            <div class="cx-upsell-desc">Enable the grid layout for the blog.</div>
            
            <h3 class="cx-upsell-heading">Footer Copyright Text</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/cp07.jpg" /></div>
            <div class="cx-upsell-desc">Change the footer text and link to your own website.</div>
        </div>';
        echo $sale_output;
    }
endif;