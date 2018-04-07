<?php
/**
 * Theme Customizer
 *
 * @package fmi
 */

function fmi_customize_register( $wp_customize ) {

  class fmi_customize_number_control extends WP_Customize_Control {
    public $type = 'fmi_number_field';
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

  $wp_customize->add_panel('theme_options' ,array(
    'title' => esc_html__('Theme Options', 'fmi'),
    'description' => '',
  ));

  //----------------------------------------------------------------------------------
  // Section: Colors
  //----------------------------------------------------------------------------------
  $wp_customize->add_section('colors_general' , array(
    'title' => esc_html__('Colors', 'fmi'),
    'panel' => 'theme_options',
    'priority' => 1,
  ));
  $wp_customize->add_setting('theme_color', array(
    'default' => '#105cb6',
    'sanitize_callback' => 'sanitize_hex_color_no_hash',
    'sanitize_js_callback' => 'maybe_hash_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'theme_color', array(
    'label' => esc_html__('Theme Color', 'fmi'),
    'section' => 'colors_general',
  )));

  //----------------------------------------------------------------------------------
  // Section: General Settings
  //----------------------------------------------------------------------------------
  $wp_customize->add_section('general_settings_section' , array(
    'title' => esc_html__('General Settings', 'fmi'),
    'panel' => 'theme_options',
    'priority' => 2,
  ));
  $wp_customize->add_setting('blog_pagination',array(
    'default' => 'pagination',
    'sanitize_callback' => 'fmi_sanitize_blog_pagination',
  ));
  $wp_customize->add_control('blog_pagination',array(
    'label' => esc_html__('Blog Pagination or Navigation', 'fmi'),
    'section' => 'general_settings_section',
    'settings' => 'blog_pagination',
    'type' => 'radio',
    'choices' => array(
      'pagination' => esc_html__('Pagination', 'fmi'),
      'navigation' => esc_html__('Navigation', 'fmi'),
    ),
  ));
  $wp_customize->add_setting('header_title',array(
    'default' => false,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('header_title',array(
    'label' => esc_html__('Hide Header Title Text', 'fmi'),
    'section' => 'general_settings_section',
    'settings' => 'header_title',
    'type' => 'checkbox',
  ));
  $wp_customize->add_setting('header_search',array(
    'default' => false,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('header_search',array(
    'label' => esc_html__('Hide Header Search', 'fmi'),
    'section' => 'general_settings_section',
    'settings' => 'header_search',
    'type' => 'checkbox',
  ));
  $wp_customize->add_setting('blog_layout',array(
    'default' => 'right_sidebar',
    'sanitize_callback' => 'fmi_sanitize_blog_layout',
  ));
  $wp_customize->add_control('blog_layout',array(
    'type' => 'select',
    'label' => esc_html__('Blog Layout', 'fmi'),
    'section' => 'general_settings_section',
    'choices' => array(
      'right_sidebar' => esc_html__('Right sidebar', 'fmi'),
      'left_sidebar' => esc_html__('Left sidebar', 'fmi'),
      'one_column' => esc_html__('One column', 'fmi'),
    ),
  ));
  $wp_customize->add_setting('blog_excerpt_type',array(
    'default' => 'excerpt',
    'sanitize_callback' => 'fmi_sanitize_blog_excerpt_type',
  ));
  $wp_customize->add_control('blog_excerpt_type',array(
    'type' => 'select',
    'label' => esc_html__('Use Excerpt or "Read More tag"', 'fmi'),
    'section' => 'general_settings_section',
    'choices' => array(
      'excerpt' => esc_html__('Excerpt', 'fmi'),
      'more-tag' => esc_html__('Read More tag', 'fmi'),
    ),
  ));
  $wp_customize->add_setting('blog_excerpt_length',array(
    'default' => 40,
    'sanitize_callback' => 'fmi_sanitize_number_intval',
  ));
  $wp_customize->add_control(new fmi_customize_number_control($wp_customize,'blog_excerpt_length',array(
    'label' => esc_html__('Excerpt Length (Number of Words)', 'fmi'),
    'section' => 'general_settings_section',
    'settings' => 'blog_excerpt_length',
  )));
  $wp_customize->add_setting('general_show_totop_btn',array(
    'default' => 1,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('general_show_totop_btn',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show "Back to top" button', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('blog_images_hover_effects',array(
    'default' => 0,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('blog_images_hover_effects',array(
    'type' => 'checkbox',
    'label' => esc_html__('Enable hover effects when you hover on featured images', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('blog_show_date',array(
    'default' => 1,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('blog_show_date',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show date', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('blog_show_author',array(
    'default' => 1,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('blog_show_author',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show author', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('blog_show_comments_counter',array(
    'default' => 1,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('blog_show_comments_counter',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show comments counter', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('blog_show_categories',array(
    'default' => 1,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('blog_show_categories',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show categories', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('blog_show_tags',array(
    'default' => 1,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('blog_show_tags',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show tags', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('single_show_post_nav',array(
    'default' => 1,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('single_show_post_nav',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show post navigation (single post page)', 'fmi'),
    'section' => 'general_settings_section',
  ));
  $wp_customize->add_setting('single_show_about_author',array(
    'default' => 0,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('single_show_about_author',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show "About the author" block (single post page)', 'fmi'),
    'section' => 'general_settings_section',
  ));

  //----------------------------------------------------------------------------------
  // Section: Social Media Icons 
  //----------------------------------------------------------------------------------
  $wp_customize->add_section('fmi_social', array(
    'title' => esc_html__('Social Links & RSS', 'fmi'),
    'panel' => 'theme_options',
    'priority' => 3,
  ));
  $wp_customize->add_setting('social_twitter', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_twitter', array(
    'label' => esc_html__('Twitter URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_twitter',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_facebook', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_facebook', array(
    'label' => esc_html__('Facebook URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_facebook',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_google-plus', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_google-plus', array(
    'label' => esc_html__('Google+ URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_google-plus',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_pinterest', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_pinterest', array(
    'label' => esc_html__('Pinterest URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_pinterest',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_vk', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_vk', array(
    'label' => esc_html__('VK URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_vk',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_flickr', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_flickr', array(
    'label' => esc_html__('Flickr URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_flickr',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_instagram', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_instagram', array(
    'label' => esc_html__('Instagram URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_instagram',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_500px', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_500px', array(
    'label' => esc_html__('500px URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_500px',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_youtube', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_youtube', array(
    'label' => esc_html__('YouTube URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_youtube',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_vimeo', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_vimeo', array(
    'label' => esc_html__('Vimeo URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_vimeo',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_soundcloud', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_soundcloud', array(
    'label' => esc_html__('SoundCloud URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_soundcloud',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_dribbble', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_dribbble', array(
    'label' => esc_html__('Dribbble URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_dribbble',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_behance', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_behance', array(
    'label' => esc_html__('Behance URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_behance',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_github', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_github', array(
    'label' => esc_html__('GitHub URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_github',
    'type' => 'text',
  ));
  $wp_customize->add_setting('social_rss', array(
    'default' => '',
    'sanitize_callback' => 'fmi_sanitize_url',
  ));
  $wp_customize->add_control('social_rss', array(
    'label' => esc_html__('RSS URL', 'fmi'),
    'section' => 'fmi_social',
    'settings' => 'social_rss',
    'type' => 'text',
  ));

  //----------------------------------------------------------------------------------
  // Section: Slider
  //----------------------------------------------------------------------------------
  $wp_customize->add_section('fmi_slider', array(
    'title' => esc_html__('Slider', 'fmi'),
    'panel' => 'theme_options',
    'priority' => 4,
  ));
  $wp_customize->add_setting('activate_slider',array(
    'default' => false,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('activate_slider',array(
    'label' => esc_html__('Check to activate slider', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'activate_slider',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('slider_image1', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'slider_image1', array(
    'label' => esc_html__('Image Upload #1', 'fmi'),
    'description' => esc_html__('Upload slider image', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_image1',
  )));
  $wp_customize->add_setting('slider_title1', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_title1', array(
    'description' => esc_html__('Enter title for your slider', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_title1',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_text1', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_text1', array(
    'description' => esc_html__('Enter your slider description', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_text1',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_link1', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('slider_link1', array(
    'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_link1',
    'type' => 'text',
  ));

  $wp_customize->add_setting('slider_image2', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'slider_image2', array(
    'label' => esc_html__('Image Upload #2', 'fmi'),
    'description' => esc_html__('Upload slider image', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_image2',
  )));
  $wp_customize->add_setting('slider_title2', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_title2', array(
    'description' => esc_html__('Enter title for your slider', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_title2',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_text2', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_text2', array(
    'description' => esc_html__('Enter your slider description', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_text2',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_link2', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('slider_link2', array(
    'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_link2',
    'type' => 'text',
  ));

  $wp_customize->add_setting('slider_image3', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'slider_image3', array(
    'label' => esc_html__('Image Upload #3', 'fmi'),
    'description' => esc_html__('Upload slider image', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_image3',
  )));
  $wp_customize->add_setting('slider_title3', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_title3', array(
    'description' => esc_html__('Enter title for your slider', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_title3',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_text3', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_text3', array(
    'description' => esc_html__('Enter your slider description', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_text3',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_link3', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('slider_link3', array(
    'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_link3',
    'type' => 'text',
  ));

  $wp_customize->add_setting('slider_image4', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'slider_image4', array(
    'label' => esc_html__('Image Upload #4', 'fmi'),
    'description' => esc_html__('Upload slider image', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_image4',
  )));
  $wp_customize->add_setting('slider_title4', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_title4', array(
    'description' => esc_html__('Enter title for your slider', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_title4',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_text4', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('slider_text4', array(
    'description' => esc_html__('Enter your slider description', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_text4',
    'type' => 'text',
  ));
  $wp_customize->add_setting('slider_link4', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('slider_link4', array(
    'description' => esc_html__('Enter link to redirect slider when clicked', 'fmi'),
    'section' => 'fmi_slider',
    'settings' => 'slider_link4',
    'type' => 'text',
  ));

  //----------------------------------------------------------------------------------
  // Section: Footer
  //----------------------------------------------------------------------------------
  $wp_customize->add_section('fmi_footer', array(
    'title' => esc_html__('Footer', 'fmi'),
    'panel' => 'theme_options',
    'priority' => 5,
  ));
  $wp_customize->add_setting('footer_show_social',array(
    'default' => 0,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('footer_show_social',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show "Social Links & RSS" block', 'fmi'),
    'section' => 'fmi_footer',
  ));
  $wp_customize->add_setting('footer_show_menu',array(
    'default' => 0,
    'sanitize_callback' => 'fmi_sanitize_checkbox',
  ));
  $wp_customize->add_control('footer_show_menu',array(
    'type' => 'checkbox',
    'label' => esc_html__('Show "Footer menu" block', 'fmi'),
    'section' => 'fmi_footer',
  ));
}
add_action('customize_register', 'fmi_customize_register');
