<?php
/**
 * Options Framework
 *
 * @package   Options Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2014 WP Theming
 *
 * @wordpress-plugin
 * Plugin Name: Options Framework
 * Plugin URI:  http://wptheming.com
 * Description: A framework for building theme options.
 * Version:     1.8.0
 * Author:      Devin Price
 * Author URI:  http://wptheming.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: optionsframework
 * Domain Path: /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Don't load if optionsframework_init is already defined
if (is_admin() && !function_exists('optionsframework_init')) :

    function optionsframework_init() {

        //  If user can't edit theme options, exit
        if (!current_user_can('edit_theme_options'))
            return;

        // Loads the required Options Framework classes.
        require plugin_dir_path(__FILE__) . 'includes/class-options-framework.php';
        require plugin_dir_path(__FILE__) . 'includes/class-options-framework-admin.php';
        require plugin_dir_path(__FILE__) . 'includes/class-options-interface.php';
        require plugin_dir_path(__FILE__) . 'includes/class-options-media-uploader.php';
        require plugin_dir_path(__FILE__) . 'includes/class-options-sanitization.php';

        // Instantiate the main plugin class.
        $options_framework = new Options_Framework;
        $options_framework->init();

        // Instantiate the options page.
        $options_framework_admin = new Options_Framework_Admin;
        $options_framework_admin->init();

        // Instantiate the media uploader class
        $options_framework_media_uploader = new Options_Framework_Media_Uploader;
        $options_framework_media_uploader->init();
    }

    add_action('init', 'optionsframework_init', 20);

endif;


/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if (!function_exists('of_get_option')) :

    function of_get_option($name, $default = false) {
        $config = get_option('optionsframework');

        if (!isset($config['id'])) {
            return $default;
        }

        $options = get_option($config['id']);

        if (isset($options[$name])) {
            return $options[$name];
        }

        return $default;
    }

endif;

function sc_slider() { ?>
    <div class="sc-slider-wrapper">
	<div class="fluid_container">
        <div class="camera_wrap" id="camera_wrap_1">

                <?php if ('' != of_get_option('sc_slide1_image', get_template_directory_uri() . '/images/demo-orange.png')) { ?>
                    <div data-thumb="<?php echo of_get_option('sc_slide1_image', get_template_directory_uri() . '/images/demo-orange.png') ?>" data-src="<?php echo of_get_option('sc_slide1_image', get_template_directory_uri() . '/images/demo-orange.png') ?>">
                        <div class="camera_caption fadeFromBottom">
                            <?php echo of_get_option('sc_slide1_text','Clean & Modern Design');?>
                        </div>
                    </div>
                <?php } ?>            
            
                <?php if ('' != of_get_option('sc_slide2_image', get_template_directory_uri() . '/images/demo-orange.png')) { ?>
                      <div data-thumb="<?php echo of_get_option('sc_slide2_image', get_template_directory_uri() . '/images/demo-orange.png') ?>" data-src="<?php echo of_get_option('sc_slide2_image', get_template_directory_uri() . '/images/demo-orange.png') ?>">
                        <div class="camera_caption fadeFromBottom">
                            <?php echo of_get_option('sc_slide2_text','Clean & Modern Design');?>
                        </div>
                    </div>
                <?php } ?>   
            
                <?php if ('' != of_get_option('sc_slide3_image', get_template_directory_uri() . '/images/demo-orange.png')) { ?>     
                    <div data-thumb="<?php echo of_get_option('sc_slide3_image', get_template_directory_uri() . '/images/demo-orange.png') ?>" data-src="<?php echo of_get_option('sc_slide3_image', get_template_directory_uri() . '/images/demo-orange.png') ?>">
                        <div class="camera_caption fadeFromBottom">
                            <?php echo of_get_option('sc_slide3_text','Clean & Modern Design');?>
                        </div>
                    </div>
                <?php } ?>      
        </div><!-- #camera_wrap_1 -->
        </div>
    </div>
    <?php
}

function sc_ctas() {
    ?>
    <div id="site-cta" class="row <?php echo of_get_option('sc_container_width'); ?>"><!-- #CTA boxes -->
        <div class="col-md-12">
            <div class="col-md-4 site-cta">
                <div class="col-md-2">
                    <i class="<?php echo of_get_option('sc_cta1_icon', 'fa fa-desktop'); ?>"></i>
                </div>
                <div class="col-md-10">
                    <div>
                        <h3><?php echo of_get_option('sc_cta1_title', 'Box 1 Title') ?></h3>
                        <p>
                            <?php echo of_get_option('sc_cta1_text', 'Box 1 Text. Input anything you want here'); ?>
                        </p>
                        <p class="text-right">
                            <a href="<?php echo of_get_option('sc_cta1_url') ?>" class="btn btn-default btn-primary">Click Here</a>
                        </p>                                
                    </div>                            
                </div>
            </div>
            <div class="col-md-4 site-cta">
                <div class="col-md-2">
                    <i class="<?php echo of_get_option('sc_cta2_icon', 'fa fa-tachometer'); ?>"></i>
                </div>
                <div class="col-md-10">
                    <div>
                        <h3><?php echo of_get_option('sc_cta2_title', 'Box 2 Title') ?></h3>
                        <p>
                            <?php echo of_get_option('sc_cta2_text', 'Box 2 Text. Input anything you want here'); ?>
                        </p>
                        <p class="text-right">
                            <a href="<?php echo of_get_option('sc_cta2_url') ?>" class="btn btn-default btn-primary">Click Here</a>
                        </p>                                
                    </div>                            
                </div>
            </div>
            <div class="col-md-4 site-cta">
                <div class="col-md-2">
                    <i class="<?php echo of_get_option('sc_cta3_icon', 'fa fa-rocket'); ?>"></i>
                </div>
                <div class="col-md-10">
                    <div>
                        <h3><?php echo of_get_option('sc_cta3_title', 'Box 3 Title') ?></h3>
                        <p>
                            <?php echo of_get_option('sc_cta3_text', 'Box 3 Text. Input anything you want here') ?>
                        </p>
                        <p class="text-right">
                            <a href="<?php echo of_get_option('sc_cta3_url') ?>" class="btn btn-default btn-primary">Click Here</a>
                        </p>
                    </div>                            
                </div>
            </div>
        </div>
    </div><!-- #CTA boxes -->
    <?php
}

function sc_banner() {
    ?>
    <div id="top-banner" class="full-banner col-md-12">
        <div class="row <?php echo of_get_option('sc_container_width'); ?>">
            <div class="col-md-12 center">
                <p class="top-banner-text">
                    <span class="primary-color"><?php echo of_get_option('sc_banner_text', 'Banner Call Out Text'); ?></span>
                    
                </p>
                <p>
                    <a href="<?php echo of_get_option('sc_banner_url'); ?>" class="btn btn-default btn-primary"><?php echo of_get_option('sc_banner_button_text', 'Learn More'); ?></a>
                </p>
            </div>
        </div>
    </div>
    <?php
}

function sc_toolbar() {
    if ('no' != of_get_option('sc_headerbar_bool', 'yes')) {
        ?>
        <div id="site-toolbar">
            <div class="row <?php echo of_get_option('sc_container_width'); ?>">
                <div class="col-md-12">
                    <div class="col-xs-6 contact-bar">
                        <?php if ('' != of_get_option('sc_phone_url')) { ?>
                            <a href="tel:+<?php echo of_get_option('sc_phone_url'); ?>" class="icon-phone">
                                <i class="fa fa-phone"></i>
                                <span><?php echo of_get_option('sc_phone_url'); ?></span>
                            </a>
                        <?php } ?>

                        <?php if ('' != of_get_option('sc_address_url')) { ?>
                            <a href="#" class="icon-map">
                                <i class="fa fa-map-marker"></i>
                                <span><?php echo of_get_option('sc_address_url') ?></span>
                            </a>
                        <?php } ?>


                    </div>

                    <div class="col-xs-6 social-bar">

                        <?php if ('' != of_get_option('sc_facebook_url')) { ?>
                            <a href="<?php echo of_get_option('sc_facebook_url') ?>" target="_blank" class="icon-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        <?php } ?>

                        <?php if ('' != of_get_option('sc_twitter_url')) { ?>
                            <a href="<?php echo of_get_option('sc_twitter_url') ?>" target="_blank" class="icon-twitter">
                                <i class="fa fa-twitter"></i>                            
                            </a>
                        <?php } ?>


                        <?php if ('' != of_get_option('sc_linkedin_url')) { ?>
                            <a href="<?php echo of_get_option('sc_linkedin_url') ?>" target="_blank" class="icon-linkedin">
                                <i class="fa fa-linkedin"></i>                            
                            </a>
                        <?php } ?>


                        <?php if ('' != of_get_option('sc_gplus_url')) { ?>
                            <a href="<?php echo of_get_option('sc_gplus_url') ?>" target="_blank" class="icon-gplus">
                                <i class="fa fa-google-plus"></i>                            
                            </a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

function sc_footer() {
    echo of_get_option('sc_footer_text');?>
    <br>
    <!-- Before you delete the link, please make a donation! Links & donations are the only way i get credit for the days it took to make this theme -->
    <a href="http://smartcatdesign.net/" rel="designer">Design by SmartCat</a>
<?php }
