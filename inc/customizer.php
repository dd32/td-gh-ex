<?php
/**
 * Theme Customizer
 *
 * @package Fmi
 */

function vs_customize_register( $wp_customize ) {

  class vs_customize_number_control extends WP_Customize_Control {
    public $type = 'vs_number_field';
    public function render_content() {
      ?>
      <label>
        <span class="customize-control-title">
          <?php echo esc_html($this->label); ?>
        </span>
        <input type="number" min="1" max="10000" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
      </label>
      <?php
    }
  }

  $wp_customize->add_panel(
    'theme_options',
    array(
      'title' => esc_html__('Theme Options', 'fmi'),
      'description' => '',
    )
  );

  //----------------------------------------------------------------------------------
  // Section: General Settings
  //----------------------------------------------------------------------------------
  $wp_customize->add_section(
    'general_settings_section',
    array(
      'title' => esc_html__('General Settings', 'fmi'),
      'panel' => 'theme_options',
      'priority' => 2,
    )
  );
  $wp_customize->add_setting(
    'blog_pagination',
    array(
      'default' => 'pagination',
      'sanitize_callback' => 'vs_sanitize_blog_pagination',
    )
  );
  $wp_customize->add_control(
    'blog_pagination',
    array(
      'label' => esc_html__('Blog Pagination or Navigation', 'fmi'),
      'section' => 'general_settings_section',
      'settings' => 'blog_pagination',
      'type' => 'radio',
      'choices' => array(
        'pagination' => esc_html__('Pagination', 'fmi'),
        'navigation' => esc_html__('Navigation', 'fmi'),
      ),
    )
  );
  $wp_customize->add_setting(
    'header_title',
    array(
      'default' => false,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'header_title',
    array(
      'label' => esc_html__('Hide Header Title Text', 'fmi'),
      'section' => 'general_settings_section',
      'settings' => 'header_title',
      'type' => 'checkbox',
    )
  );
  $wp_customize->add_setting(
    'header_search',
    array(
      'default' => false,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'header_search',
    array(
      'label' => esc_html__('Hide Header Search', 'fmi'),
      'section' => 'general_settings_section',
      'settings' => 'header_search',
      'type' => 'checkbox',
    )
  );
  $wp_customize->add_setting(
    'blog_images_hover_effects',
    array(
      'default' => 0,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'blog_images_hover_effects',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Enable hover effects when you hover on featured images', 'fmi'),
      'section' => 'general_settings_section',
    )
  );
  $wp_customize->add_setting(
    'blog_show_date',
    array(
      'default' => 1,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'blog_show_date',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show date', 'fmi'),
      'section' => 'general_settings_section',
    )
  );
  $wp_customize->add_setting(
    'blog_show_author',
    array(
      'default' => 1,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'blog_show_author',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show author', 'fmi'),
      'section' => 'general_settings_section',
    )
  );
  $wp_customize->add_setting(
    'blog_show_comments_counter',
    array(
      'default' => 1,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'blog_show_comments_counter',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show comments counter', 'fmi'),
      'section' => 'general_settings_section',
    )
  );
  $wp_customize->add_setting(
    'blog_show_categories',
    array(
      'default' => 1,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'blog_show_categories',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show categories', 'fmi'),
      'section' => 'general_settings_section',
    )
  );
  $wp_customize->add_setting(
    'blog_show_tags',
    array(
      'default' => 1,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'blog_show_tags',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show tags', 'fmi'),
      'section' => 'general_settings_section',
    )
  );
  $wp_customize->add_setting(
    'single_show_post_nav',
    array(
      'default' => 1,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'single_show_post_nav',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show post navigation (single post page)', 'fmi'),
      'section' => 'general_settings_section',
    )
  );
  $wp_customize->add_setting(
    'single_show_about_author',
    array(
      'default' => 0,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'single_show_about_author',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show "About the author" block (single post page)', 'fmi'),
      'section' => 'general_settings_section',
    )
  );

  //----------------------------------------------------------------------------------
  // Section: Slider
  //----------------------------------------------------------------------------------
  $wp_customize->add_section(
    'vs_slider',
    array(
      'title' => esc_html__('Slider', 'fmi'),
      'panel' => 'theme_options',
      'priority' => 4,
    )
  );
  $wp_customize->add_setting(
    'activate_slider',
    array(
      'default' => false,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'activate_slider',
    array(
      'label' => esc_html__('Check to activate slider', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'activate_slider',
      'type' => 'checkbox',
    )
  );

  $wp_customize->add_setting(
    'slider_image1',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'slider_image1',
      array(
        'label' => esc_html__('Image Upload #1', 'fmi'),
        'description' => esc_html__('Upload slider image', 'fmi'),
        'section' => 'vs_slider',
        'settings' => 'slider_image1',
      )
    )
  );
  $wp_customize->add_setting(
    'slider_title1',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_title1',
    array(
      'description' => esc_html__('Enter title for your slider', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_title1',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_text1',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_text1',
    array(
      'description' => esc_html__('Enter your slider description', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_text1',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_link1',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    'slider_link1',
    array(
      'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_link1',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting(
    'slider_image2',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'slider_image2',
      array(
        'label' => esc_html__('Image Upload #2', 'fmi'),
        'description' => esc_html__('Upload slider image', 'fmi'),
        'section' => 'vs_slider',
        'settings' => 'slider_image2',
      )
    )
  );
  $wp_customize->add_setting(
    'slider_title2',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_title2',
    array(
      'description' => esc_html__('Enter title for your slider', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_title2',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_text2',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_text2',
    array(
      'description' => esc_html__('Enter your slider description', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_text2',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_link2',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    'slider_link2',
    array(
      'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_link2',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting(
    'slider_image3',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'slider_image3',
      array(
        'label' => esc_html__('Image Upload #3', 'fmi'),
        'description' => esc_html__('Upload slider image', 'fmi'),
        'section' => 'vs_slider',
        'settings' => 'slider_image3',
      )
    )
  );
  $wp_customize->add_setting(
    'slider_title3',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_title3',
    array(
      'description' => esc_html__('Enter title for your slider', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_title3',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_text3',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_text3',
    array(
      'description' => esc_html__('Enter your slider description', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_text3',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_link3',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    'slider_link3',
    array(
      'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_link3',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting(
    'slider_image4',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'slider_image4',
      array(
        'label' => esc_html__('Image Upload #4', 'fmi'),
        'description' => esc_html__('Upload slider image', 'fmi'),
        'section' => 'vs_slider',
        'settings' => 'slider_image4',
      )
    )
  );
  $wp_customize->add_setting(
    'slider_title4',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_title4',
    array(
      'description' => esc_html__('Enter title for your slider', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_title4',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_text4',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'slider_text4',
    array(
      'description' => esc_html__('Enter your slider description', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_text4',
      'type' => 'text',
    )
  );
  $wp_customize->add_setting(
    'slider_link4',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    'slider_link4',
    array(
      'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
      'section' => 'vs_slider',
      'settings' => 'slider_link4',
      'type' => 'text',
    )
  );

  //----------------------------------------------------------------------------------
  // Section: Footer
  //----------------------------------------------------------------------------------
  $wp_customize->add_section(
    'vs_footer',
    array(
      'title' => esc_html__('Footer', 'fmi'),
      'panel' => 'theme_options',
      'priority' => 5,
    )
  );
  $wp_customize->add_setting(
    'footer_show_social',
    array(
      'default' => 0,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'footer_show_social',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show "Social Links & RSS" block', 'fmi'),
      'section' => 'vs_footer',
    )
  );
  $wp_customize->add_setting(
    'footer_show_menu',
    array(
      'default' => 0,
      'sanitize_callback' => 'vs_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'footer_show_menu',
    array(
      'type' => 'checkbox',
      'label' => esc_html__('Show Footer Menu', 'fmi'),
      'section' => 'vs_footer',
    )
  );
}
add_action('customize_register', 'vs_customize_register');

/**
 * Skip if Kirki is not installed
 */
if ( ! class_exists( 'Kirki' ) ) {
  return;
}

/**
 * Telemetry implementation for Kirki
 */
function vs_kirki_telemetry() {
  return false;
}
add_filter( 'kirki_telemetry', 'vs_kirki_telemetry' );

/**
 * Kirki Config
 *
 * @param array $config is an array of Kirki configuration parameters.
 */
function vs_kirki_config( $config ) {

  // Disable Kirki preloader styles.
  $config['disable_loader'] = true;

  return $config;

}
add_filter( 'kirki/config', 'vs_kirki_config' );

/**
 * Register Theme Mods
 */
Kirki::add_config(
  'vs_theme_mod', array(
    'capability'  => 'edit_theme_options',
    'option_type' => 'theme_mod',
  )
);

/**
 * Design.
 */
require get_template_directory() . '/inc/theme-mods/design.php';

/**
 * Homepage Settings.
 */
require get_template_directory() . '/inc/theme-mods/homepage-settings.php';

/**
 * Archive Settings.
 */
require get_template_directory() . '/inc/theme-mods/archive-settings.php';

/**
 * Posts Settings.
 */
require get_template_directory() . '/inc/theme-mods/post-settings.php';

/**
 * Pages Settings.
 */
require get_template_directory() . '/inc/theme-mods/page-settings.php';

/**
 * Miscellaneous.
 */
require get_template_directory() . '/inc/theme-mods/miscellaneous.php';

/**
 * Social Links.
 */
require get_template_directory() . '/inc/theme-mods/social-links.php';
