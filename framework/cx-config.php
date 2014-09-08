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
                'title'     => __('General Settings', 'alba'),
                'desc'      => __('Select the basics for your site layout. Edit the logo in the <a href="'. admin_url( 'themes.php?page=custom-header' ) .'" target="_blank">header section</a>', 'alba'),
                'icon'      => 'el-icon-wordpress',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-site-type',
                        'type'      => 'select',
                        'title'     => __('Website Layout', 'alba'),
                        'subtitle'  => __('Select a layout for your website', 'alba'),
                        'options'   => array('site-layout-full-width' => 'Full Width', 'site-layout-boxed' => 'Boxed'),
                        'default'   => 'site-layout-full-width',
                    ),
                    array(
                        'id'        => 'cx-options-breadcrumbs',
                        'type'      => 'switch',
                        'title'     => __('Breadcrumbs', 'alba'),
                        'subtitle'  => __('Select if you\'d like breadcrumbs to show', 'alba'),
                        'desc'      => __('Install the <a href="http://wordpress.org/plugins/breadcrumb-navxt" target="_blank">Breadcrumb NavXT</a> plugin for breadcrumbs', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-favicon',
                        'type'      => 'media',
                        'title'     => __('Favicon', 'alba'),
                        'subtitle'  => __('Add a favicon to your website', 'alba'),
                    ),
                    
                    array(
                        'id'    => 'cx-options-general-head',
                        'type'  => 'info',
                        'desc'  => __('Header Settings', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-header-layout',
                        'type'      => 'image_select',
                        'title'     => __('Header Layout', 'alba'),
                        'subtitle'  => __('Select a header layout for your website', 'alba'),
                        'desc'      => __('', 'alba'),
                        
                        //Must provide key => value(array:title|img) pairs for radio options
                        'options'   => array(
                            'site-header-one' => array('alt' => 'Header Layout One', 'img' => ReduxFramework::$_url . 'assets/img/header_one.gif'),
                            'site-header-two' => array('alt' => 'Header Layout Two', 'img' => ReduxFramework::$_url . 'assets/img/header_two.gif')
                        ), 
                        'default' => 'site-header-one'
                    ),
                    array(
                        'id'        => 'cx-options-search',
                        'type'      => 'switch',
                        'title'     => __('Header Search', 'alba'),
                        'subtitle'  => __('Enable to show the search', 'alba'),
                        'default'   => 1,
                        'on'        => 'Enabled',
                        'off'       => 'Disabled',
                    ),
                    array(
                        'id'        => 'cx-options-go-premium-sticky-header',
                        'type'      => 'callback',
                        'title'     => __('Sticky Header', 'alba'),
                        'subtitle'  => __('Available in Alba Premium', 'alba'),
                        'thelink'   => '<a href="http://sllwi.re/p/Eu" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Alba Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Alba theme.', 'alba'),
                        'callback'  => 'cx_options_upgrade_link'
                    )
                    
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Homepage Slider', 'alba'),
                'desc'      => __('The Alba home page slider uses the full sized image, so make sure to upload the image at the correct size.', 'alba'),
                'icon'      => 'el-icon-file-new',
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-home-slider-enable',
                        'type'      => 'switch',
                        'title'     => __('Enable Slider', 'alba'),
                        'subtitle'  => __('Click to enable the default simple homepage slider', 'alba'),
                        'default'   => 1,
                        'on'        => 'Enabled',
                        'off'       => 'Disabled',
                    ),
                    
                    array(
                        'id'    => 'cx-options-home-slider-oh',
                        'type'  => 'info',
                        'desc'  => __('Slider Options', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-cats',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('Slider Categories', 'alba'),
                        'subtitle'  => __('Select multiple categories', 'alba'),
                        'desc'      => __('Select the <a href="' . admin_url( 'edit-tags.php?taxonomy=category' ) . '" target="_blank">post categories</a> you\'d like to display in the Homepage Slider, separated by a comma (,)<br />Eg: "13, 17, 19"', 'alba'),
                        'default'   => '0',
                    ),
                    array(
                        'id'        => 'cx-options-go-premium-slider-transition',
                        'type'      => 'callback',
                        'title'     => __('Slider Transition', 'alba'),
                        'subtitle'  => __('Available in Alba Premium', 'alba'),
                        'thelink'   => '<a href="http://sllwi.re/p/Eu" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Alba Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Alba theme.', 'alba'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-circular',
                        'type'      => 'switch',
                        'title'     => __('Circular Slider', 'alba'),
                        'subtitle'  => __('Select if the slider should be circular', 'alba'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-infinite',
                        'type'      => 'switch',
                        'title'     => __('Infinite Slider', 'alba'),
                        'subtitle'  => __('Select if the slider should be infinite', 'alba'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-pagination-show',
                        'type'      => 'switch',
                        'title'     => __('Display Pagination', 'alba'),
                        'subtitle'  => __('Display slider pagination', 'alba'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-auto-scroll',
                        'type'      => 'switch',
                        'title'     => __('Automatic Scroll', 'alba'),
                        'subtitle'  => __('Scroll the slider automatically', 'alba'),
                        'default'   => true,
                    ),
                    array(
                        'id'        => 'cx-options-home-slider-link',
                        'type'      => 'switch',
                        'title'     => __('Slide Links', 'alba'),
                        'subtitle'  => __('Select if you want the slider to link', 'alba'),
                        'default'   => false,
                    )
                    
                )
            );   
            
            $this->sections[] = array(
                'title'     => __('Styling Settings', 'alba'),
                'desc'      => __('Select/Change the colors and fonts of the theme', 'alba'),
                'icon'      => 'el-icon-edit',
                'fields'    => array(
                    
                    array(
                        'id'    => 'cx-options-info-st-color',
                        'type'  => 'info',
                        'desc'  => __('Site Colors', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-primary-color',
                        'type'      => 'color',
                        'output'    => array('.site-title'),
                        'title'     => __('Main color', 'alba'),
                        'subtitle'  => __('This is the color of buttons, etc around the site.', 'alba'),
                        'desc'      => __('Default: #4965A0', 'alba'),
                        'default'   => '#4965A0',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'cx-options-primary-hover-color',
                        'type'      => 'color',
                        'output'    => array('.site-title'),
                        'title'     => __('Main hover color', 'alba'),
                        'subtitle'  => __('This is the hover color for buttons, etc around the site.', 'alba'),
                        'desc'      => __('Default: #3e578b', 'alba'),
                        'default'   => '#3e578b',
                        'validate'  => 'color',
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-st-fonts',
                        'type'  => 'info',
                        'desc'  => __('Website Fonts', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-go-premium-font-head',
                        'type'      => 'callback',
                        'title'     => __('Heading Font', 'alba'),
                        'subtitle'  => __('Available in Alba Premium', 'alba'),
                        'thelink'   => '<a href="http://sllwi.re/p/Eu" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Alba Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Alba theme.', 'alba'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    array(
                        'id'        => 'cx-options-go-premium-font-body',
                        'type'      => 'callback',
                        'title'     => __('Body Font', 'alba'),
                        'subtitle'  => __('Available in Alba Premium', 'alba'),
                        'thelink'   => '<a href="http://sllwi.re/p/Eu" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Alba Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Alba theme.', 'alba'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-st-css',
                        'type'  => 'info',
                        'desc'  => __('Custom Styling', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-custom-css',
                        'type'      => 'textarea',
                        'title'     => __('Custom CSS', 'alba'),
                        'subtitle'  => __('Add Custom CSS to add extra styling to the Theme', 'alba'),
                        'desc'      => __('', 'alba'),
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
                'title'     => __('Blog Settings', 'alba'),
                'desc'      => __('', 'alba'),
                'icon'      => 'el-icon-file-new',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-go-premium-blog-layout',
                        'type'      => 'callback',
                        'title'     => __('Blog Layout', 'alba'),
                        'subtitle'  => __('Available in Alba Premium', 'alba'),
                        'thelink'   => '<a href="http://sllwi.re/p/Eu" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Alba Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Alba theme.', 'alba'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    array(
                        'id'        => 'cx-options-blog-cats',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('Blog Categories', 'alba'),
                        'subtitle'  => __('Select multiple categories', 'alba'),
                        'desc'      => __('Select which <a href="' . admin_url( 'edit-tags.php?taxonomy=category' ) . '" target="_blank">post categories</a> you\'d like to display in the blog.', 'alba'),
                        'default'   => '0',
                    ),
                    array(
                        'id'        => 'cx-options-blog-title',
                        'type'      => 'text',
                        'title'     => __('Blog Page Title', 'alba'),
                        'subtitle'  => __('', 'alba'),
                        'desc'      => __('Enter the title you want for the blog page.', 'alba'),
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
                        'title'     => __('Blog Posts Per Page', 'alba'),
                        'subtitle'  => __('', 'alba'),
                        'desc'      => __('Enter the number of posts you\'d like to show per page.', 'alba'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => '10'
                    )
                    
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Social Links', 'alba'),
                'desc'      => __('Enter links to your social networks. Don\'t forget the "http://"', 'alba'),
                'icon'      => 'el-icon-group',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-url-email',
                        'type'      => 'text',
                        'title'     => __('Email Address', 'alba'),
                        'subtitle'  => __('Enter an Email address', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Skype Name', 'alba'),
                        'subtitle'  => __('Enter your Skype name', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Facebook', 'alba'),
                        'subtitle'  => __('Enter your Facebook page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Twitter', 'alba'),
                        'subtitle'  => __('Enter your Twitter page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Google Plus', 'alba'),
                        'subtitle'  => __('Enter your Google Plus page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('YouTube', 'alba'),
                        'subtitle'  => __('Enter your YouTube page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Instagram', 'alba'),
                        'subtitle'  => __('Enter your Instagram page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Pinterest', 'alba'),
                        'subtitle'  => __('Enter your Pinterest page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Linkedin', 'alba'),
                        'subtitle'  => __('Enter your Linkedin page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Tumblr', 'alba'),
                        'subtitle'  => __('Enter your Tumblr page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Flickr', 'alba'),
                        'subtitle'  => __('Enter your Flickr page url', 'alba'),
                        'desc'      => __('', 'alba'),
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
                'title'     => __('Website Text', 'alba'),
                'desc'      => __('Edit header text and default messages such as 404 errors and search results, etc', 'alba'),
                'icon'      => 'el-icon-file-edit',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'    => 'cx-options-info-wt-header',
                        'type'  => 'info',
                        'desc'  => __('Header', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-header-details-address',
                        'type'      => 'text',
                        'title'     => __('Address', 'alba'),
                        'subtitle'  => __('Enter the address to be displayed in the header', 'alba'),
                        'desc'      => __('', 'alba'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => 'Incolm Place, Cape Town, South Africa',
                        //'text_hint' => array(
                        //    'title'     => 'Eg: ',
                        //    'content'   => 'email@yoursite.com'
                        //)
                    ),
                    array(
                        'id'        => 'cx-options-header-details-email',
                        'type'      => 'text',
                        'title'     => __('Email Address', 'alba'),
                        'subtitle'  => __('Enter the email address to be displayed in the header', 'alba'),
                        'desc'      => __('', 'alba'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => 'hello@albas.com',
                        //'text_hint' => array(
                        //    'title'     => 'Eg: ',
                        //    'content'   => 'email@yoursite.com'
                        //)
                    ),
                    array(
                        'id'        => 'cx-options-header-details-phone',
                        'type'      => 'text',
                        'title'     => __('Phone Number', 'alba'),
                        'subtitle'  => __('Enter the phone number to be displayed in the header', 'alba'),
                        'desc'      => __('', 'alba'),
                        'validate'  => '',
                        'msg'       => '',
                        'default'   => '+27 82 444 4444',
                        //'text_hint' => array(
                        //    'title'     => 'Eg: ',
                        //    'content'   => 'email@yoursite.com'
                        //)
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-wt-footer',
                        'type'  => 'info',
                        'desc'  => __('Footer', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-go-premium',
                        'type'      => 'callback',
                        'title'     => __('Footer Copyright Text', 'alba'),
                        'subtitle'  => __('Available in Alba Premium', 'alba'),
                        'thelink'   => '<a href="http://sllwi.re/p/Eu" class="cx-options-custom-button cx-upgrade-button" target="_blank">Upgrade to Alba Premium</a>',
                        'desc'      => __('Upgrade to premium to get the full Alba theme.', 'alba'),
                        'callback'  => 'cx_options_upgrade_link'
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-wt-forofor',
                        'type'  => 'info',
                        'desc'  => __('404 Page', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-site-heading-forofor',
                        'type'      => 'text',
                        'title'     => __('404 Error Page Heading', 'alba'),
                        'subtitle'  => __('Enter the heading for the 404 Error page', 'alba'),
                        'desc'      => __('', 'alba'),
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
                        'title'     => __('Error 404 Message', 'alba'),
                        'subtitle'  => __('Enter the default text on the 404 error page (Page not found)', 'alba'),
                        'desc'      => __('', 'alba'),
                        'validate'  => '',
                        'default'   => 'The page you are looking for can\'t be found. Please select one of the options below.',
                    ),
                    
                    array(
                        'id'    => 'cx-options-info-wt-search',
                        'type'  => 'info',
                        'desc'  => __('Search Results Page', 'alba'),
                    ),
                    array(
                        'id'        => 'cx-options-site-msg-nosearch',
                        'type'      => 'textarea',
                        'title'     => __('No Search Results', 'alba'),
                        'subtitle'  => __('Enter the default text for when no search results are found', 'alba'),
                        'desc'      => __('', 'alba'),
                        'validate'  => '',
                        'default'   => 'Sorry, but nothing matched your search terms. Please try again with some different keywords or return to home.',
                    )
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Plugins', 'alba'),
                'desc'      => __('Install <a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" target="_blank">recommended plugins</a> to make your website development easier', 'alba'),
                'icon'      => 'el-icon-plus-sign',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-addplugin-one',
                        'type'      => 'callback',
                        'title'     => __('Page Builder', 'alba'),
                        'subtitle'  => __('Install Page Builer', 'alba'),
                        'thelink'   => '<a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" class="cx-options-custom-button" target="_blank">Get Page Builder</a>',
                        'desc'      => __('<a href="http://wordpress.org/plugins/siteorigin-panels" target="_blank">Page builder</a> lets you build responsive page layouts using the widgets you know and love', 'alba'),
                        'callback'  => 'cx_options_addplugin_button_link'
                    ),
                    array(
                        'id'        => 'cx-options-addplugin-two',
                        'type'      => 'callback',
                        'title'     => __('Contact Form 7', 'alba'),
                        'subtitle'  => __('Install Contact Form 7', 'alba'),
                        'thelink'   => '<a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" class="cx-options-custom-button" target="_blank">Get Contact Form 7</a>',
                        'desc'      => __('<a href="http://wordpress.org/plugins/contact-form-7" target="_blank">Contact Form 7</a> can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.', 'alba'),
                        'callback'  => 'cx_options_addplugin_button_link'
                    ),
                    array(
                        'id'        => 'cx-options-addplugin-three',
                        'type'      => 'callback',
                        'title'     => __('Breadcrumb NavXT', 'alba'),
                        'subtitle'  => __('Install Breadcrumb NavXT', 'alba'),
                        'thelink'   => '<a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" class="cx-options-custom-button" target="_blank">Get Breadcrumb NavXT</a>',
                        'desc'      => __('<a href="http://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">Breadcrumb NavXT</a> generates highly customizable breadcrumb trails for your WordPress powered blog or website', 'alba'),
                        'callback'  => 'cx_options_addplugin_button_link'
                    ),
                )
            );

            $this->sections[] = array(
                'type' => 'divide',
            );

            $this->sections[] = array(
                'title'     => __('ALBA Premium', 'alba'),
                'desc'      => __('View some of the extra features you can have with the <a href="http://sllwi.re/p/Eu" target="_blank">ALBA premium Wordpress theme</a>', 'alba'),
                'class'     => 'cx-upsell-section',
                'icon'      => 'el-icon-plus-sign',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    
                    array(
                        'id'        => 'cx-options-extra-sale',
                        'type'      => 'callback',
                        'title'     => __('', 'alba'),
                        'subtitle'  => __('', 'alba'),
                        'thelink'   => '',
                        'desc'      => __('', 'alba'),
                        'callback'  => 'cx_options_premium_show_section'
                    )
                )
            );
            
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Documentation', 'alba'),
                'content'   => __('<p>Theme documentation coming soon...</p>', 'alba')
            );

            //$this->args['help_tabs'][] = array(
            //    'id'        => 'redux-help-tab-2',
            //    'title'     => __('Theme Information 2', 'alba'),
            //    'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'alba')
            //);

            // Set the help sidebar
            //$this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'alba');
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
                'menu_title'        => __('ALBA Settings', 'alba'),
                'page_title'        => __('ALBA Settings', 'alba'),
                
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
            //$this->args['share_icons'][] = array(
            //    'url'   => 'https://twitter.com/cxthemes',
            //    'title' => 'Follow cxThemes on Twitter',
            //    'icon'  => 'el-icon-twitter'
            //);

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
                //$this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'alba'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'alba');
            }

            // Add content after the form.
            //$this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'alba');
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
            <h3 class="cx-upsell-heading">Sticky Header</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/img-sticky-header.jpg" /></div>
            <div class="cx-upsell-desc">Make use on the sticky header that animates smaller and stays there as you scroll down the page.</div>
            
            <h3 class="cx-upsell-heading">Slider Effects</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/img-slider-effects.jpg" /></div>
            <div class="cx-upsell-desc">Select different slider transition effects.</div>
            
            <h3 class="cx-upsell-heading">Body &amp; Heading Fonts</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/img-style-fonts.jpg" /></div>
            <div class="cx-upsell-desc">Select your own heading and body fonts for the website from a large selection of Google fonts.</div>
            
            <h3 class="cx-upsell-heading">Blog Layouts</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/img-blog-layouts.jpg" /></div>
            <div class="cx-upsell-desc">Have the selection of 2 different blog layouts, standard or grid.</div>
            
            <h3 class="cx-upsell-heading">Footer Copyright Text</h3>
            <div class="cx-upsell-img"><img src="'. get_template_directory_uri() . '/includes/extra/img-footer-text.jpg" /></div>
            <div class="cx-upsell-desc">Change the footer text and link to your own website.</div>
        </div>';
        echo $sale_output;
    }
endif;