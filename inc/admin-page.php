<?php 
    function axiohost_admin_menu() {
        add_theme_page( 'Axiohost Info', 'Axiohost Info', 'manage_options', 'axiohost-info.php', 'axiohost_info', 'dashicons-tickets', 6  );
    }
    add_action( 'admin_menu', 'axiohost_admin_menu' );
    
    function axiohost_info(){
    	?>
    <div id="wpbody-content">
        <div id="screen-meta" class="metabox-prefs">

            <div id="contextual-help-wrap" class="hidden no-sidebar" tabindex="-1" aria-label="Contextual Help Tab">
                <div id="contextual-help-back"></div>
                <div id="contextual-help-columns">
                    <div class="contextual-help-tabs">
                        <ul>
                                                </ul>
                    </div>

                    
                    <div class="contextual-help-tabs-wrap">
                                            </div>
                </div>
            </div>
                </div>
            <div class="wrap about-wrap axiohost-add-css">
        <div>
            <h1 class="welcome-text">
            <?php echo esc_html__('Welcome to Axiohost!', 'axiohost')?>
                		</h1>

            <div class="feature-section three-col">
                <div class="col">
                    <div class="widgets-holder-wrap">
                        <h3><?php echo esc_html__('Contact Support', 'axiohost')?></h3>
                        <p><?php echo esc_html__('Getting started with a new theme can be difficult, if you have issues with axiohost then throw us an email.', 'axiohost')?></p>
                        <p><a target="blank" href="<?php echo esc_url('https://themeix.com/contact')?>" class="button button-primary">
                        <?php echo esc_html__('Contact Support', 'axiohost')?>				</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="widgets-holder-wrap">
                        <h3><?php echo esc_html__('View other themes', 'axiohost')?></h3>
                        <p><?php echo esc_html__('Do you like our concept but feel like the design doesn\'t fit your need? Then check out our website for more designs.', 'axiohost')?></p>

                        <p><a target="blank" href="<?php echo esc_url('https://themeix.com')?>" class="button button-primary">
                        <?php echo esc_html__(' View All Theme', 'axiohost')?>					</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="widgets-holder-wrap">
                        <h3><?php echo esc_html__('Premium Edition', 'axiohost')?></h3>
                        <p><?php echo esc_html__('If you enjoy axiohost and want to take your website to the next step, then check out our premium edition here.', 'axiohost')?></p>

                        <p><a target="blank" href="<?php echo esc_url('https://themeix.com')?>" class="button button-primary">
                        <?php echo esc_html__('Read More', 'axiohost')?>						</a></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="free-vs-pro">
            <h2 class="welcome-text"><?php echo esc_html__('Free Vs Premium', 'axiohost')?></h2>
        </div>

        <table class="wp-list-table widefat">
            <thead>
                <tr>
                    <th><strong><a target="blank" href="<?php echo esc_url('https://themeix.com/docs/axiohost-wordpress-theme/')?>" class="button button-primary"><?php echo esc_html__('Read Full Documentation', 'axiohost')?>		</a></strong></th>

                    <th><strong><a target="blank" href="<?php echo esc_url('https://free-wp-axiohost.themeix.com')?>" class="button button-primary"><?php echo esc_html__('Free Demo', 'axiohost')?>		</a></strong></th>

                    <th><strong><a target="blank" href="<?php echo esc_url('https://axiohost-wp.themeix.com')?>" class="button button-primary"><?php echo esc_html__('Pro Demo', 'axiohost')?>		</a></strong></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th><strong><?php echo esc_html__('Theme Feature', 'axiohost')?></strong></th>
                    <th><strong><?php echo esc_html__('Free Version', 'axiohost')?></strong></th>
                    <th><strong><?php echo esc_html__('Pro Version', 'axiohost')?></strong></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo esc_html__('Elementor Support', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Theme Options', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Custom Navigation Logo Or Text', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Hide Logo Text', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>

                
                <tr>
                    <td><?php echo esc_html__('Custom Logo Upload', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Logo Size maintains', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Page Options', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Normal Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Read More Label', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Blog Post Excerpt Limit', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Scroll Back to Top', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Facebook Pixel Code Support', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Google Analytics Code Support', 'axiohost')?></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('14 New Unique Full Customization Elemenor Addons', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('12 Elementor Template', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('One Click Demo Import', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Breadcrumb', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                
                
                <tr>
                    <td><?php echo esc_html__('Text Logo Custom Color', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Text Logo Custom Typography', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Logo Tagline Color', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Logo Tagline Typography', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Preloader', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Blog Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Archive Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Category Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Tag Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Author Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Search Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('404 Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Page Layout', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Blog Layout', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Footer Layout', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Premium Support', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Brand Removal Option', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Unlimited Color', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Unlimited Typography', 'axiohost')?></td>
                    <td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/cross.png'); ?>" alt="<?php esc_attr_e('No', 'axiohost'); ?>"></span></td>
                    <td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri(). '/assets/images/check.png'); ?>" alt="<?php esc_attr_e('Yes', 'axiohost'); ?>"></span></td>
                </tr>

            
            </tbody>
        </table>

    </div>
	
    <div class="clear"></div></div>
    <?php
}
    add_action('admin_head', 'my_custom_fonts');

    function my_custom_fonts() {
    echo '<style>';?>
        .about-wrap img{
            width: 32px;
        }
        .widgets-holder-wrap {
            padding: 20px;
        }
        .welcome-text {
            text-align: center;
            font-size: 24px!important;
            padding: 15px!important;
            margin: 0!important;
            background: #0085ba;
            color: white!important;
        }
        ays, .feature-filter, .imgedit-group, .popular-tags, .stuffbox, .widgets-holder-wrap, .wp-editor-container, p.popular-tags, table.widefat {
            padding: 15px;
            padding-top: 0;
            border-right: 1px solid #ffffff;
        }
        .col {
            float: left;
            width: 33.333333%;
        }
        .free-vs-pro {
            float: left;
            width: 100%;
            margin-top: 30px;
        }
        .checkmark,.cross{
            margin-left: 22px;
        }
    <?php echo '</style>';
    }

?>