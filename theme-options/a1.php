<?php
function a1_options_init() {
    register_setting('a1_options', 'a1_theme_options', 'a1_options_validate');
}
add_action('admin_init', 'a1_options_init');
function a1_options_validate($input) {
    /* -------------- Basic Settings---------------- */
    $input['logo'] = a1_image_validation(esc_url_raw($input['logo']));
    $input['favicon'] = a1_image_validation(esc_url_raw($input['favicon']));
    /* ------------Top Header Settings-------------- */
    $input['phone'] = sanitize_text_field($input['phone']);
    $input['email'] = sanitize_email($input['email']);
    $input['fburl'] = esc_url_raw($input['fburl']);
    $input['twitter'] = esc_url_raw($input['twitter']);
    $input['googleplus'] = esc_url_raw($input['googleplus']);
    $input['pinterest'] = esc_url_raw($input['pinterest']);
    /* -------------- Footer Settings----------------- */
    $input['footertext'] = sanitize_text_field($input['footertext']);
    /* -------------- Homepage Settings---------------- */
    for ($a1_i = 1; $a1_i <= 5; $a1_i++):
        $input['slider-img-' . $a1_i] = a1_image_validation(esc_url_raw($input['slider-img-' . $a1_i]));
        $input['slidecaption-' . $a1_i] = sanitize_text_field($input['slidecaption-' . $a1_i]);
        $input['slidebuttontext-' . $a1_i] = sanitize_text_field($input['slidebuttontext-' . $a1_i]);
        $input['slidebuttonlink-' . $a1_i] = esc_url_raw($input['slidebuttonlink-' . $a1_i]);
    endfor;
    $input['coretitle'] = sanitize_text_field($input['coretitle']);
    $input['corecaption'] = sanitize_text_field($input['corecaption']);
    for ($a1_section_i = 1; $a1_section_i <= 3; $a1_section_i++):
        $input['home-icon-' . $a1_section_i] = a1_image_validation(esc_url_raw($input['home-icon-' . $a1_section_i]));
        $input['section-title-' . $a1_section_i] = sanitize_text_field($input['section-title-' . $a1_section_i]);
        $input['section-content-' . $a1_section_i] = sanitize_text_field($input['section-content-' . $a1_section_i]);
    endfor;
    $input['producttitle'] = sanitize_text_field($input['producttitle']);
    $input['productcaption'] = sanitize_text_field($input['productcaption']);
    $input['product-form-email'] = sanitize_email($input['product-form-email']);
    $input['portfolio-title'] = sanitize_text_field($input['portfolio-title']);
    $input['portfolio-caption'] = sanitize_text_field($input['portfolio-caption']);
    $input['portfolio-number'] = sanitize_text_field($input['portfolio-number']);
    $input['testimonials-title'] = sanitize_text_field($input['testimonials-title']);
    $input['testimonials-caption'] = sanitize_text_field($input['testimonials-caption']);
    $input['get-touch-title'] = sanitize_text_field($input['get-touch-title']);
    $input['get-touch-caption'] = sanitize_text_field($input['get-touch-caption']);
    $input['testimonials-caption'] = sanitize_text_field($input['testimonials-caption']);
    $input['get-touch-logo'] = a1_image_validation(esc_url_raw($input['get-touch-logo']));
    $input['contactus-now-text'] = sanitize_text_field($input['contactus-now-text']);
    $input['get-touch-page'] = esc_url_raw($input['get-touch-page']);
    $input['company-title'] = sanitize_text_field($input['company-title']);
    $input['companies-caption'] = sanitize_text_field($input['companies-caption']);
    /* -------------- Blog Settings----------------- */
    $input['blogtitle'] = sanitize_text_field($input['blogtitle']);
    $input['entry-meta-by'] = sanitize_text_field($input['entry-meta-by']);
    $input['entry-meta-on'] = sanitize_text_field($input['entry-meta-on']);
    $input['entry-meta-in'] = sanitize_text_field($input['entry-meta-in']);
    $input['entry-meta-comments'] = sanitize_text_field($input['entry-meta-comments']);
    $input['entry-meta-tags'] = sanitize_text_field($input['entry-meta-tags']);
    return $input;
}
function a1_image_validation($a1_imge_url) {
    $a1_filetype = wp_check_filetype($a1_imge_url);
    $a1_supported_image = array('gif', 'jpg', 'jpeg', 'png', 'ico');
    if (in_array($a1_filetype['ext'], $a1_supported_image)) {
        return $a1_imge_url;
    } else {
        return '';
    }
}
function a1_framework_load_scripts() {
    wp_enqueue_media();
    wp_enqueue_style('a1-framework', get_template_directory_uri() . '/theme-options/css/a1_framework.css', false, '1.0.0');
    wp_enqueue_script('a1-options-custom', get_template_directory_uri() . '/theme-options/js/a1-custom.js', array('jquery'));
    if( isset($_GET['page']) && ($_GET['page']=='a1_framework') ) :
        wp_enqueue_script('a1-media-uploader', get_template_directory_uri() . '/theme-options/js/media-uploader.js', array('jquery'));
    endif;
}
add_action('admin_enqueue_scripts', 'a1_framework_load_scripts');
function a1_framework_menu_settings() {
    $a1_menu = array(
        'page_title' => __('A1 Theme Options', 'a1'),
        'menu_title' => __('Theme Options', 'a1'),
        'capability' => 'edit_theme_options',
        'menu_slug' => 'a1_framework',
        'callback' => 'a1_framework_page'
    );
    return apply_filters('a1_framework_menu', $a1_menu);
}
add_action('admin_menu', 'a1_theme_options_add_page');
function a1_theme_options_add_page() {
    $a1_menu = a1_framework_menu_settings();
    add_theme_page($a1_menu['page_title'], $a1_menu['menu_title'], $a1_menu['capability'], $a1_menu['menu_slug'], $a1_menu['callback']);
}
function a1_framework_page() {
    global $select_options;
    if (!isset($_REQUEST['settings-updated']))
        $_REQUEST['settings-updated'] = false;
    ?>
    <div class="a1-themes">
        <form method="post" action="options.php" id="form-option" class="theme_option_ft">
            <div class="a1-header">
                <div class="logo">
                    <?php
                    $a1_image = get_template_directory_uri() . '/theme-options/images/logo.png';
                    echo "<a href='http://fasterthemes.com' target='_blank'><img src='" . esc_url($a1_image) . "' alt='FasterThemes' /></a>";
                    ?>
                </div>
                <div class="header-right">
                    <h1><?php _e('Theme Options', 'a1'); ?></h1>
                    <div class='btn-save'>
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'a1'); ?>" />
                    </div>
                </div>
            </div>
            <div class="a1-details">
                <div class="a1-options">
                    <div class="right-box">
                        <div class="nav-tab-wrapper">
                            <ul>
                                <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="<?php _e('Basic Settings', 'a1'); ?>" href="#options-group-1"><?php _e('Basic Settings', 'a1'); ?></a></li>
                                <li><a id="options-group-2-tab" class="nav-tab headersettings-tab" title="<?php _e('Header Settings', 'a1'); ?>" href="#options-group-2"><?php _e('Top Header Settings', 'a1'); ?></a></li>
                                <li><a id="options-group-3-tab" class="nav-tab footersettings-tab" title="<?php _e('Footer Settings', 'a1'); ?>" href="#options-group-3"><?php _e('Footer Settings', 'a1'); ?></a></li>
                                <li><a id="options-group-4-tab" class="nav-tab homepagesettings-tab" title="<?php _e('Home Page Settings', 'a1'); ?>" href="#options-group-4"><?php _e('Home Page Settings', 'a1'); ?></a></li>
                                <li><a id="options-group-5-tab" class="nav-tab blogpagesettings-tab" title="<?php _e('Blog Page Settings', 'a1'); ?>" href="#options-group-5"><?php _e('Blog Page Settings', 'a1'); ?></a></li>
                                <li><a id="options-group-6-tab" class="nav-tab profeatures-tab" title="<?php _e('Pro Settings', 'a1'); ?>" href="#options-group-6"><?php _e('PRO Theme Features', 'a1') ?></a></li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="right-box-bg"></div>
                    <div class="postbox left-box">
                        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
                        <?php
                        settings_fields('a1_options');
                        $a1_options = get_option('a1_theme_options');
                        ?>
                        <!--Basic Settings-->
                        <div id="options-group-1" class="group basicsettings a1-inner-tabs">
                            <div class="section theme-tabs theme-logo">
                                <a class="heading a1-inner-tab active" href="javascript:void(0)"><?php _e('Logo (Recommended Size : 100px * 62px)', 'a1'); ?></a>
                                <div class="a1-inner-tab-group active">
                                    <div class="ft-control">
                                        <input id="logo-img" class="upload" type="text" name="a1_theme_options[logo]" value="<?php
                                        if (!empty($a1_options['logo'])) {
                                            echo esc_url($a1_options['logo']);
                                        }
                                        ?>" placeholder="<?php _e('No file chosen', 'a1'); ?>" />
                                        <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'a1'); ?>" />
                                        <div class="screenshot" id="logo-image">
                                            <?php
                                            if (!empty($a1_options['logo'])) {
                                                echo "<img src='" . esc_url($a1_options['logo']) . "' /><a class='remove-image'>";
                                                echo "</a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-favicon"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Favicon', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="explain"><?php _e('Size of favicon should be exactly 32x32px for best results', 'a1'); ?>.</div>
                                    <div class="ft-control">
                                        <input id="favicon-img" class="upload" type="text" name="a1_theme_options[favicon]" value="<?php
                                        if (!empty($a1_options['favicon'])) {
                                            echo esc_url($a1_options['favicon']);
                                        }
                                        ?>" placeholder="<?php _e('No file chosen', 'a1'); ?>" />
                                        <input id="upload_image_button1" class="upload-button button" type="button" value="<?php _e('Upload', 'a1'); ?>" />
                                        <div class="screenshot" id="favicon-image">
                                            <?php
                                            if (!empty($a1_options['favicon'])) {
                                                echo "<img src='" . esc_url($a1_options['favicon']) . "' /><a class='remove-image'>";
                                                echo"</a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="section-remove-breadcrumbs" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Breadcrumbs', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <input type="checkbox" id="a1-remove-breadcrumbs" name="a1_theme_options[remove-breadcrumbs]" <?php if (!empty($a1_options['remove-breadcrumbs'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="remove-breadcrumbs-class" for="a1-remove-breadcrumbs"><?php _e('Check this if you want to hide the breadcrumbs', 'a1'); ?>.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Top Header Settings-->
                        <div id="options-group-2" class="group topheadersettings a1-inner-tabs">
                            <div class="theme-tabs theme-colors theme-fonts">
                                <div style="display: block;">
                                    <div class="ft-control">
                                        <input type="checkbox" id="a1-remove-top-header" name="a1_theme_options[remove-top-header]" <?php if (!empty($a1_options['remove-top-header'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="remove-slider-class" for="a1-remove-top-header"><?php _e('Check this if you want to hide the top header', 'a1'); ?>.</label>
                                        <input type="checkbox" id="a1-fixed-top-menu" name="a1_theme_options[fixed-top-menu]" <?php if (!empty($a1_options['fixed-top-menu'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="remove-slider-class" for="a1-fixed-top-menu"><?php _e('Check this if you want to have FIXED main menu', 'a1'); ?>.</label>
                                    </div>
                                </div>
                            </div>
                            <div id="section-phone" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Phone', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Phone', 'a1'); ?></div>
                                        <input type="text" id="phone" class="of-input" name="a1_theme_options[phone]" size="32"  value="<?php
                                        if (!empty($a1_options['phone'])) {
                                            echo esc_attr($a1_options['phone']);
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="section-email" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('E-mail', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('E-mail', 'a1'); ?></div>
                                        <input type="text" id="email" class="of-input" validType="email" name="a1_theme_options[email]" size="32"  value="<?php
                                        if (!empty($a1_options['email'])) {
                                            echo sanitize_email($a1_options['email']);
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="section-facebook" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Facebook Link', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Facebook profile or page URL like', 'a1'); ?> http://facebook.com/username/</div>
                                        <input id="facebook" class="of-input" name="a1_theme_options[fburl]" size="30" type="text" value="<?php
                                        if (!empty($a1_options['fburl'])) {
                                            echo esc_url($a1_options['fburl']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-twitter" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Twitter Link', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Twitter profile or page URL like', 'a1'); ?> http://www.twitter.com/username/</div>
                                        <input id="twitter" class="of-input" name="a1_theme_options[twitter]" type="text" size="30" value="<?php
                                        if (!empty($a1_options['twitter'])) {
                                            echo esc_url($a1_options['twitter']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-pinterest" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Pinterest Link', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Pinterest profile or page URL like', 'a1'); ?> https://pinterest.com/username/</div>
                                        <input id="pinterest" class="of-input" name="a1_theme_options[pinterest]" type="text" size="30" value="<?php
                                        if (!empty($a1_options['pinterest'])) {
                                            echo esc_url($a1_options['pinterest']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-googleplus" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Google+ Link', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Google plus profile or page URL like', 'a1'); ?> https://plus.google.com/username/</div>
                                        <input id="googleplus" class="of-input" name="a1_theme_options[googleplus]" type="text" size="30" value="<?php
                                        if (!empty($a1_options['googleplus'])) {
                                            echo esc_url($a1_options['googleplus']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-scroll-top-header" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Display top header on scroll', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <input type="checkbox" id="a1-scroll-top-header" name="a1_theme_options[scroll-top-header]" <?php if (!empty($a1_options['scroll-top-header'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="scroll-top-header-class" for="a1-scroll-top-header"><?php _e('Check this if you want to display top header on scroll', 'a1'); ?>.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer Settings-->
                        <div id="options-group-3" class="group footersettings a1-inner-tabs">
                            <div id="section-footertext" class="section theme-tabs"> <a class="heading a1-inner-tab active" href="javascript:void(0)"><?php _e('Copyright Text', 'a1'); ?></a>
                                <div class="a1-inner-tab-group active">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Copyright text for the footer of your website', 'a1'); ?>.</div>
                                        <input type="text" id="footertext" class="of-input" name="a1_theme_options[footertext]" size="32"  value="<?php
                                        if (!empty($a1_options['footertext'])) {
                                            echo esc_attr($a1_options['footertext']);
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-content"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Content', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter content for your site , you would like to display in the Footer', 'a1'); ?>.</div>
                                        <textarea name="a1_theme_options[footer-content]" rows="6" id="footer-content" class="of-input"><?php
                                            if (!empty($a1_options['footer-content'])) {
                                                echo esc_attr($a1_options['footer-content']);
                                            }
                                            ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Homepage settings -->
                        <div id="options-group-4" class="group a1-inner-tabs">
                            <br /><h3><?php _e('Banner Slider', 'a1'); ?></h3>
                            <div class="theme-tabs theme-colors theme-fonts">
                                <div style="display: block;">
                                    <div class="ft-control">
                                        <input type="checkbox" id="a1-remove-slider" name="a1_theme_options[remove-slider]" <?php if (!empty($a1_options['remove-slider'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="remove-slider-class" for="a1-remove-slider"><?php _e('Check this to remove slider section on the home page', 'a1'); ?>.</label>
                                    </div>
                                </div>
                            </div>
                            <?php for ($a1_i = 1; $a1_i <= 5; $a1_i++): ?>
                                <div class="section theme-tabs theme-slider-img"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Slider', 'a1'); ?> <?php echo $a1_i; ?></a>
                                    <div class="a1-inner-tab-group">
                                        <div class="ft-control">
<p> <?php _e('Size of the image should be 1350px X 534px','a1'); ?> </p>
                                            <input id="slider-img-<?php echo $a1_i; ?>" class="upload" type="text" name="a1_theme_options[slider-img-<?php echo $a1_i; ?>]"
                                                   value="<?php
                                                   if (!empty($a1_options['slider-img-' . $a1_i])) {
                                                       echo esc_url($a1_options['slider-img-' . $a1_i]);
                                                   }
                                                   ?>" placeholder="<?php _e('No file chosen', 'a1'); ?>" />
                                            <input id="1upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'a1'); ?>" />
                                            <div class="screenshot" id="slider-img-<?php echo $a1_i; ?>">
                                                <?php
                                                if (!empty($a1_options['slider-img-' . $a1_i])) {
                                                    echo "<img src='" . esc_url($a1_options['slider-img-' . $a1_i]) . "' /><a class='remove-image'>";
                                                    echo "</a>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="ft-control">
                                            <input type="text" placeholder="<?php _e('Slide Caption', 'a1'); ?>" id="slidecaption-<?php echo $a1_i; ?>" class="of-input" name="a1_theme_options[slidecaption-<?php echo $a1_i; ?>]" size="32"  value="<?php
                                            if (!empty($a1_options['slidecaption-' . $a1_i])) {
                                                echo esc_attr($a1_options['slidecaption-' . $a1_i]);
                                            }
                                            ?>">
                                        </div>
                                        <div class="ft-control">
                                            <input type="text" placeholder="<?php _e('Slide Button Text', 'a1'); ?>" id="slidebuttontext-<?php echo $a1_i; ?>" class="of-input" name="a1_theme_options[slidebuttontext-<?php echo $a1_i; ?>]" size="32"  value="<?php
                                            if (!empty($a1_options['slidebuttontext-' . $a1_i])) {
                                                echo esc_attr($a1_options['slidebuttontext-' . $a1_i]);
                                            }
                                            ?>">
                                        </div>
                                        <div class="ft-control">
                                            <input type="text" placeholder="<?php _e('Slide Button Link', 'a1'); ?>" id="slidebuttonlink-<?php echo $a1_i; ?>" class="of-input" name="a1_theme_options[slidebuttonlink-<?php echo $a1_i; ?>]" size="32"  value="<?php
                                            if (!empty($a1_options['slidebuttonlink-' . $a1_i])) {
                                                echo esc_url($a1_options['slidebuttonlink-' . $a1_i]);
                                            }
                                            ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                            <h3><?php _e('Core Features Section', 'a1'); ?></h3>
                            <div class="theme-tabs theme-colors theme-fonts">
                                <div style="display: block;">
                                    <div class="ft-control">
                                        <input type="checkbox" id="a1-remove-core-features" name="a1_theme_options[remove-core-features]" <?php if (!empty($a1_options['remove-core-features'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="a1-core-features-class" for="a1-remove-core-features"><?php _e('Check this to remove core features section on home page', 'a1'); ?>.</label>
                                    </div>
                                </div>
                            </div>
                            <div id="section-coretitle" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Title', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter core features title for your site , you would like to display in the Home Page', 'a1'); ?>.</div>
                                        <input id="coretitle" class="of-input" name="a1_theme_options[coretitle]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['coretitle'])) {
                                            echo esc_attr($a1_options['coretitle']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Caption', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter core features caption for your site , you would like to display in the Home Page', 'a1'); ?>.</div>
                                        <textarea name="a1_theme_options[corecaption]" rows="6" id="corecaption1" class="of-input"><?php
                                            if (!empty($a1_options['corecaption'])) {
                                                echo esc_attr($a1_options['corecaption']);
                                            }
                                            ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <?php for ($a1_section_i = 1; $a1_section_i <= 3; $a1_section_i++): ?>
                                <div class="section theme-tabs theme-slider-img"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Tab', 'a1'); ?> <?php echo $a1_section_i; ?></a>
                                    <div class="a1-inner-tab-group">
                                        <div class="ft-control">
<p> <?php _e('Size of the icon should be 43px X 28px','a1'); ?> </p>
                                            <input id="first-image-<?php echo $a1_section_i; ?>" class="upload" type="text" name="a1_theme_options[home-icon-<?php echo $a1_section_i; ?>]" value="<?php
                                            if (!empty($a1_options['home-icon-' . $a1_section_i])) {
                                                echo esc_url($a1_options['home-icon-' . $a1_section_i]);
                                            }
                                            ?>" placeholder="<?php _e('No file chosen', 'a1'); ?>" />
<input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'a1'); ?>" />
                                            <div class="screenshot" id="first-img-<?php echo $a1_section_i; ?>">
                                                <?php
                                                if (!empty($a1_options['home-icon-' . $a1_section_i])) {
                                                    echo "<img src='" . esc_url($a1_options['home-icon-' . $a1_section_i]) . "' /><a class='remove-image'>";
                                                    echo "</a>";
                                                }
                                                ?> 

                                            </div>
                                        </div>
                                        <div class="ft-control">
                                            <div class="explain"><?php _e('Enter core features tab title for your home template , you would like to display in the Home Page', 'a1'); ?>.</div>
                                            <input type="text" placeholder="<?php _e('Enter title here', 'a1'); ?>" id="title-<?php echo $a1_section_i; ?>" class="of-input" name="a1_theme_options[section-title-<?php echo $a1_section_i; ?>]" size="32"  value="<?php
                                            if (!empty($a1_options['section-title-' . $a1_section_i])) {
                                                echo esc_attr($a1_options['section-title-' . $a1_section_i]);
                                            }
                                            ?>">
                                        </div>
                                        <div class="ft-control">
                                            <div class="explain"><?php _e('Enter core features tab content for home template , you would like to display in the Home Page', 'a1'); ?>.</div>
                                            <textarea name="a1_theme_options[section-content-<?php echo $a1_section_i; ?>]" rows="6" id="content-<?php echo $a1_section_i; ?>" placeholder="<?php _e('Enter Content here', 'a1'); ?>" class="of-input"><?php
                                                if (!empty($a1_options['section-content-' . $a1_section_i])) {
                                                    echo esc_attr($a1_options['section-content-' . $a1_section_i]);
                                                }
                                                ?>
                                            </textarea>
                                        </div>

<div class="ft-control">
                                            <input type="text" placeholder="<?php _e('Link to this section', 'a1'); ?>" id="coresectionlink-<?php echo $a1_section_i; ?>" class="of-input" name="a1_theme_options[coresectionlink-<?php echo $a1_section_i; ?>]" size="32"  value="<?php
                                            if (!empty($a1_options['coresectionlink-' . $a1_section_i])) {
                                                echo esc_url($a1_options['coresectionlink-' . $a1_section_i]);
                                            }
                                            ?>">
                                        </div>


                                    </div>
                                </div>
                            <?php endfor; ?>
                            <h3><?php _e('Product Description', 'a1'); ?></h3>
                            <div class="theme-tabs theme-colors theme-fonts">
                                <div style="display: block;">
                                    <div class="ft-control">
                                        <input type="checkbox" id="a1-remove-product-description" name="a1_theme_options[remove-product-description]" <?php if (!empty($a1_options['remove-product-description'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="a1-core-features-class" for="a1-remove-product-description"><?php _e('Check this to remove product description section on home page', 'a1'); ?>.</label>
                                    </div>
                                </div>
                            </div>
                            <div id="section-producttitle" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Title', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter product title for your site , you would like to display in the Home Page', 'a1'); ?>.</div>
                                        <input id="producttitle" class="of-input" name="a1_theme_options[producttitle]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['producttitle'])) {
                                            echo esc_attr($a1_options['producttitle']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Caption', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter product caption for your site , you would like to display in the Home Page', 'a1'); ?>.</div>
                                        <textarea name="a1_theme_options[productcaption]" rows="6" id="productcaption1" class="of-input"><?php
                                            if (!empty($a1_options['productcaption'])) {
                                                echo esc_attr($a1_options['productcaption']);
                                            }
                                            ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Content', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter product content for your site , you would like to display in the Home Page', 'a1'); ?>.</div>
                                        <?php
                                        $a1_content = $a1_options['productcontent'];
                                        $a1_editor_id = 'productcontent';
                                        $a1_settings = array('textarea_name' => 'a1_theme_options[productcontent]', 'textarea_rows' => 25);
                                        wp_editor($a1_content, $a1_editor_id, $a1_settings);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Form E-mail', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter e-mail id', 'a1'); ?>.</div>
                                        <input id="product-form-email" class="of-input" name="a1_theme_options[product-form-email]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['product-form-email'])) {
                                            echo sanitize_email($a1_options['product-form-email']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <h3><?php _e('Get in Touch', 'a1'); ?></h3>
                            <div class="theme-tabs theme-colors theme-fonts">
                                <div style="display: block;">
                                    <div class="ft-control">
                                        <input type="checkbox" id="a1-remove-getin-touch" name="a1_theme_options[remove-getin-touch]" <?php if (!empty($a1_options['remove-getin-touch'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="a1-our-portfolio-class" for="a1-remove-getin-touch"><?php _e('Check this to remove get in touch section on home page', 'a1'); ?>.</label>
                                    </div>
                                </div>
                            </div>
                            <div id="section-get-touch-title" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Title', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter get in touch title for your site , you would like to display in the Home Page', 'a1'); ?>.</div>
                                        <input id="get-touch-title" class="of-input" name="a1_theme_options[get-touch-title]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['get-touch-title'])) {
                                            echo esc_attr($a1_options['get-touch-title']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-get-touch"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Caption', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter get in touch caption for your site , you would like to display in the Home Page', 'a1'); ?>.</div>
                                        <textarea name="a1_theme_options[get-touch-caption]" rows="6" id="get-touch-caption1" class="of-input"><?php
                                            if (!empty($a1_options['get-touch-caption'])) {
                                                echo esc_attr($a1_options['get-touch-caption']);
                                            }
                                            ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="section theme-tabs theme-get-touch-logo"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Get in Touch Logo', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <input id="get-touch-logo-img" class="upload" type="text" name="a1_theme_options[get-touch-logo]" value="<?php
                                        if (!empty($a1_options['get-touch-logo'])) {
                                            echo esc_url($a1_options['get-touch-logo']);
                                        }
                                        ?>" placeholder="<?php _e('No file chosen', 'a1'); ?>" />
                                        <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'a1'); ?>" />
                                        <div class="screenshot" id="get-touch-logo-image">
                                            <?php
                                            if (!empty($a1_options['get-touch-logo'])) {
                                                echo "<img src='" . esc_url($a1_options['get-touch-logo']) . "' /><a class='remove-image'>";
                                                echo "</a>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="section-contactus-now" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Button Text', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter button text for your site , you would like to display in the button', 'a1'); ?>.</div>
                                        <input id="contactus-now-text" class="of-input" name="a1_theme_options[contactus-now-text]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['contactus-now-text'])) {
                                            echo esc_attr($a1_options['contactus-now-text']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-contactus-now" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Contact Link', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Contact link for your button', 'a1'); ?>.</div>
                                        <input type="text" class="of-input" size="50" name="a1_theme_options[get-touch-page]" value="<?php
                                        if (!empty($a1_options['get-touch-page'])) {
                                            echo $a1_options['get-touch-page'];
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Settings-->
                        <div id="options-group-5" class="group blogsettings a1-inner-tabs">
                            <div id="section-blogtitle" class="section theme-tabs"> <a class="heading a1-inner-tab active" href="javascript:void(0)"><?php _e('Blog Title', 'a1'); ?></a>
                                <div class="a1-inner-tab-group active">
                                    <div class="ft-control">
                                        <input type="text" id="blogtitle" class="of-input" name="a1_theme_options[blogtitle]" size="32"  value="<?php
                                        if (!empty($a1_options['blogtitle'])) {
                                            echo esc_attr($a1_options['blogtitle']);
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="section-entry-meta-by" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Entry meta by word', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter entry meta by word for your site , you would like to replace with current word', 'a1'); ?>.</div>
                                        <input id="entry-meta-by" class="of-input" name="a1_theme_options[entry-meta-by]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['entry-meta-by'])) {
                                            echo esc_attr($a1_options['entry-meta-by']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-entry-meta-in" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Entry meta in word', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter entry meta in word for your site , you would like to replace with current word', 'a1'); ?>.</div>
                                        <input id="entry-meta-in" class="of-input" name="a1_theme_options[entry-meta-in]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['entry-meta-in'])) {
                                            echo esc_attr($a1_options['entry-meta-in']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-entry-meta-on" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Entry meta on word', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter entry meta on word for your site , you would like to replace with current word', 'a1'); ?>.</div>
                                        <input id="entry-meta-on" class="of-input" name="a1_theme_options[entry-meta-on]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['entry-meta-on'])) {
                                            echo esc_attr($a1_options['entry-meta-on']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-entry-meta-comments" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Entry meta comments word', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter entry meta comments word for your site , you would like to replace with current word', 'a1'); ?>.</div>
                                        <input id="entry-meta-comments" class="of-input" name="a1_theme_options[entry-meta-comments]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['entry-meta-comments'])) {
                                            echo esc_attr($a1_options['entry-meta-comments']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="section-entry-meta-tags" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)"><?php _e('Entry meta tags word', 'a1'); ?></a>
                                <div class="a1-inner-tab-group">
                                    <div class="ft-control">
                                        <div class="explain"><?php _e('Enter entry meta tags word for your site , you would like to replace with current word', 'a1'); ?>.</div>
                                        <input id="entry-meta-tags" class="of-input" name="a1_theme_options[entry-meta-tags]" type="text" size="50" value="<?php
                                        if (!empty($a1_options['entry-meta-tags'])) {
                                            echo esc_attr($a1_options['entry-meta-tags']);
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="theme-tabs theme-colors theme-fonts">
                                <div style="display: block;">
                                    <div class="theme-tabs ft-control">
                                        <input type="checkbox" id="a1-hide-meta-info-single" name="a1_theme_options[hide-meta-info-single]" <?php if (!empty($a1_options['hide-meta-info-single'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="remove-slider-class" for="a1-hide-meta-info-single"><?php _e('Check this to hide meta info on the single blog posts.', 'a1'); ?>.</label>
                                        <input type="checkbox" id="a1-hide-meta-info-archieve-pages" name="a1_theme_options[hide-meta-info-archieve-pages]" <?php if (!empty($a1_options['hide-meta-info-archieve-pages'])) { ?> checked="checked" <?php } ?> value="<?php _e('yes', 'a1'); ?>">
                                        <label class="remove-slider-class" for="a1-hide-meta-info-archieve-pages"><?php _e('Check this to hide meta info on all archieve pages (author, tag, date etc).', 'a1'); ?>.</label>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pro Features group -->
                        <div id="options-group-6" class="group faster-inner-tabs fasterthemes-pro-image">
                            <div class="fasterthemes-pro-header">
                                <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/a1_pro_features-logo.png" class="fasterthemes-pro-logo" />
                                <a href="http://fasterthemes.com/wordpress-themes/A1" target="_blank" class="fasterthemes-pro-buynow"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/starting-button.png" /></a>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/a1_pro_features.png" />
                        </div>
                        <!-- End group -->
                    </div>
                </div>
            </div>
            <div class="a1-footer">
                <ul>
                    <li class="btn-save">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'a1'); ?>" />
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <div class="save-options"><h2><?php _e('Options saved successfully', 'a1'); ?>.</h2></div>
    <?php
}