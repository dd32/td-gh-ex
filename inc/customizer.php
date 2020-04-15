<?php
/**
 * Customizer Functions
 *
 * @package Fmi
 */

function vs_customize_register( $wp_customize ) {

  // Customize control: Heading
  class vs_customize_control_heading extends WP_Customize_Control {
    public $type = 'vs_heading';
    public function render_content() {
      ?>
      <div class="customize-control-heading">
        <?php echo esc_html( $this->label ); ?>
      </div>
      <?php
    }
  }
  
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

// Site Identity
require get_template_directory() . '/inc/theme-mods/site-identity.php';

// Design
require get_template_directory() . '/inc/theme-mods/design.php';

// Header Settings
require get_template_directory() . '/inc/theme-mods/header-settings.php';

// Footer Settings
require get_template_directory() . '/inc/theme-mods/footer-settings.php';

// Homepage Settings
require get_template_directory() . '/inc/theme-mods/homepage-settings.php';

// Archive Settings
require get_template_directory() . '/inc/theme-mods/archive-settings.php';

// Posts Settings
require get_template_directory() . '/inc/theme-mods/post-settings.php';

// Pages Settings
require get_template_directory() . '/inc/theme-mods/page-settings.php';

// Miscellaneous
require get_template_directory() . '/inc/theme-mods/miscellaneous.php';

// Social Links
require get_template_directory() . '/inc/theme-mods/social-links.php';

}
add_action( 'customize_register', 'vs_customize_register' );

// Load custom customizer styles
function vs_customize_controls_print_styles() {
  wp_enqueue_style( 'vs_customize_css', get_template_directory_uri() . '/assets/css/customizer.css', array(), false );
}
add_action( 'customize_controls_print_styles', 'vs_customize_controls_print_styles', 100 );

// Load Google AdSense scripts
function vs_adsense_enqueue_scripts() {
  if ( get_theme_mod( 'misc_adsense', 0 ) ) {
    wp_register_script( 'vs_adsense', '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js' );
    wp_enqueue_script( 'vs_adsense' );
  }
}
add_action( 'wp_enqueue_scripts', 'vs_adsense_enqueue_scripts' );
