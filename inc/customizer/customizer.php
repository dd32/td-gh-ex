<?php

/**
 * AccessPress Parallax Customizer Class
 * @package AccessPress Themes
 */

if(class_exists( 'WP_Customize_Control')){
    /**
     * Pro customizer section.
     *
     * @since  1.0.0
     * @access public
     */
    class Accesspress_Parallax_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'accesspress-parallax-upgrade';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';
        public $pro_text1 = '';
        public $title1 = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';
        public $pro_url1 = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['title1'] = $this->title1;
            $json['pro_text1'] = $this->pro_text1;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['pro_url1']  = $this->pro_url1;
            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title1 }}
                    <# if ( data.pro_text1 && data.pro_url1 ) { #>
                        <a href="{{ data.pro_url1 }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text1 }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
}



defined( 'Accesspress_Parallax_THEME_CDIR' ) or define( 'Accesspress_Parallax_THEME_CDIR', get_template_directory() . '/inc/customizer/' ); //plugin version
defined( 'Accesspress_Parallax_THEME_CURI' ) or define( 'Accesspress_Parallax_THEME_CURI', get_template_directory_uri() . '/inc/customizer/' ); //plugin version
if ( !class_exists( 'Accesspress_Parallax_Customizer_Class' ) ) {

    class Accesspress_Parallax_Customizer_Class {

        /** AccessPress Parallax Customizer Constructor * */
        public function __construct() {

            /** Custom Customizer Scripts and Styles * */
            add_action( 'customize_controls_enqueue_scripts', array( $this, 'custom_customizer_scripts' ) );

            /** Extra Controls * */
            add_action( 'customize_register', array( $this, 'extra_controls' ) );

            /** Helper Files * */
            add_action( 'after_setup_theme', array( $this, 'helper_files' ) );

            /** Customizer Options * */
            add_action( 'customize_register', array( $this, 'all_customizer_options' ) );
        }

        /**
         * Enqueue script for custom customize control.
         */
        public function custom_customizer_scripts() {

            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'accesspress-parallax-repeater-style', Accesspress_Parallax_THEME_CURI . 'assets/css/repeater-style.css' );
            wp_enqueue_script( 'accesspress-parallax-repeater-script', Accesspress_Parallax_THEME_CURI . 'assets/js/repeater-script.js', array( 'jquery', 'jquery-ui-sortable', 'customize-controls', 'wp-color-picker' ), true );
        }

        /**
         * Customizer Helper Files
         */
        public function helper_files() {

            /** Include Sanitize * */
            require_once Accesspress_Parallax_THEME_CDIR . 'includes/sanitize.php';

            /** Include Helper Files * */
            require_once Accesspress_Parallax_THEME_CDIR . 'includes/helpers.php';
        }

        /**
         * Customizer Extra Controls
         */
        public static function extra_controls( $wp_customize ) {

            $cdir = Accesspress_Parallax_THEME_CDIR;

            /** Control Types * */
            require_once $cdir . 'controls/class-repeater.php'; // Repeater Control
        }

        /**
         * Customizer Options
         */
        public function all_customizer_options( $wp_customize ) {

            $dir = Accesspress_Parallax_THEME_CDIR;

            $files = array(
                'header-settings',
                'footer-settings',
                'general-settings',
                'post-settings',
                'slider-settings',
                'social-settings',
                'parallax-settings',
            );

            foreach ( $files as $file ) {
                if ( file_exists( $dir . 'options/' . $file . '.php' ) ) {
                    require_once $dir . 'options/' . $file . '.php';
                }
            }
        }

    }

    new Accesspress_Parallax_Customizer_Class();
}