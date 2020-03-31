<?php
/**
 * Theme Customizer
 *
 * @package Fmi
 */

function vs_customize_register( $wp_customize ) {

  // Customize control: Number field (input type = number; min=1, max=10000)
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

/**
 * Design.
 */
require get_template_directory() . '/inc/theme-mods/design.php';

/**
 * Header Settings.
 */
require get_template_directory() . '/inc/theme-mods/header-settings.php';

/**
 * Footer Settings.
 */
require get_template_directory() . '/inc/theme-mods/footer-settings.php';

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

}
add_action( 'customize_register', 'vs_customize_register' );
