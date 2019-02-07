<?php

/**
 * This file holds the class that controls the color customisation for this theme
 *
 * @package agncy
 */
/**
 * The class to control the color theme of the WordPress theme
 */
class AgncyColors
{
    /**
     * The static varible to hold the only instance of this class
     *
     * @var array
     */
    protected static  $instances = array() ;
    /**
     * The available color themes
     *
     * @var array
     */
    private  $color_themes ;
    /**
     * The available color sections
     *
     * @var array
     */
    private  $color_sections ;
    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    protected function __construct()
    {
        $this->action_dispatcher();
        $this->filter_dispatcher();
        $this->register_themes();
    }
    
    /**
     * Blocked function for singleton pattern
     */
    protected function __clone()
    {
    }
    
    /**
     * Blocked function for singleton pattern
     */
    protected function __wakeup()
    {
    }
    
    /**
     * Call this method to get singleton
     *
     * @return UserFactory
     */
    public static function get_instance()
    {
        $cls = get_called_class();
        // late-static-bound class name.
        if ( !isset( self::$instances[$cls] ) ) {
            self::$instances[$cls] = new self();
        }
        return self::$instances[$cls];
    }
    
    /**
     * The action dispatcher for this class.
     *
     * @access public
     * @return void
     */
    function action_dispatcher()
    {
        // Add the needed rest routes for the color class.
        add_action( 'rest_api_init', array( $this, 'rest_api_init' ) );
        // Register the  sections for the color theme.
        add_action( 'customize_register', array( $this, 'customize_register' ), 11 );
        // Display the generated color rules in the head of the html site.
        add_action( 'wp_head', array( $this, 'output_color_rules' ) );
        add_action( 'admin_head', array( $this, 'output_admin_color_rules' ) );
        // Invalidate the color transient on saving.
        add_action( 'customize_save', array( $this, 'invalidate_color_cache' ) );
        // Refresh the  with the current colors.
        add_action( 'wp_ajax_refresh_customizer_colors', array( $this, 'refresh_customizer_colors' ) );
    }
    
    /**
     * The filter dispatcher for this class.
     *
     * @access public
     * @return void
     */
    function filter_dispatcher()
    {
    }
    
    /**
     * The function to register the  panels and controls.
     *
     * @access public
     * @param object $wp_customize The WordPress customizer object.
     * @return void
     */
    public function customize_register( $wp_customize )
    {
        $wp_customize->add_section( 'agncy_settings_color_theme', array(
            'title'       => __( 'Color Schemes', 'agncy' ),
            'description' => __( 'A selection of predefined color schemes for you to choose from.', 'agncy' ),
            'priority'    => 2,
            'panel'       => 'agncy_settings',
        ) );
        // The color scheme name.
        $wp_customize->add_setting( 'agncy_color_theme_name', array(
            'default'           => 'default',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( new Agncy_Color_Theme_Control( $wp_customize, 'agncy_color_theme_name', array(
            'section'  => 'agncy_settings_color_theme',
            'settings' => 'agncy_color_theme_name',
        ) ) );
    }
    
    /**
     * Needed calls to define our rest api endponts.
     *
     * @access public
     * @return void
     */
    public function rest_api_init()
    {
        register_rest_route( 'agncy/v1', '/color_themes/', array(
            'method'   => 'GET',
            'callback' => array( $this, 'rest_get_color_rules' ),
        ) );
    }
    
    /**
     * The function to get the spcific color rules.
     *
     * @access public
     * @param WP_REST_Request $request The REST API request.
     * @return object $response The response for the REST API.
     */
    public function rest_get_color_rules( WP_REST_Request $request )
    {
        $response = array(
            'active_theme' => get_theme_mod( 'agncy_color_theme_name', 'default' ),
            'color_themes' => $this->get_color_themes(),
            'sections'     => $this->get_color_sections(),
        );
        return $response;
    }
    
    /**
     * Register the needed themes for the free version.
     *
     * @access public
     * @return void
     */
    public function register_themes()
    {
        $this->add_color_section( array(
            'name'     => __( 'Default', 'agncy' ),
            'slug'     => 'default',
            'priority' => 10,
        ) );
        $this->add_color_theme( array(
            'name'      => __( 'Agncy Default', 'agncy' ),
            'slug'      => 'default',
            'primary'   => '#225378',
            'secondary' => '#AF435B',
            'tertiary'  => '#758BAE',
            'section'   => 'default',
        ) );
        $this->add_color_theme( array(
            'name'      => __( 'Icy Citrus', 'agncy' ),
            'slug'      => 'icycitrus',
            'primary'   => '#F0C808',
            'secondary' => '#06AED5',
            'tertiary'  => '#DD1C1A',
            'section'   => 'default',
        ) );
        $this->add_color_theme( array(
            'name'      => __( 'Red Spring', 'agncy' ),
            'slug'      => 'redspring',
            'primary'   => '#FF6B6B',
            'secondary' => '#4ECDC4',
            'tertiary'  => '#304D6D',
            'section'   => 'default',
        ) );
        $this->add_color_theme( array(
            'name'      => __( 'Dawn', 'agncy' ),
            'slug'      => 'dawn',
            'primary'   => '#011627',
            'secondary' => '#2EC4B6',
            'tertiary'  => '#FF9F1C',
            'section'   => 'default',
        ) );
        $this->add_color_theme( array(
            'name'      => __( 'Gr&uuml;nfeld', 'agncy' ),
            'slug'      => 'greenfield',
            'primary'   => '#679436',
            'secondary' => '#8D582B',
            'tertiary'  => '#2B3234',
            'section'   => 'default',
        ) );
        $this->add_color_theme( array(
            'name'      => __( 'Ruby Red', 'agncy' ),
            'slug'      => 'rubyred',
            'primary'   => '#D81159',
            'secondary' => '#FFBC42',
            'tertiary'  => '#006BA6',
            'section'   => 'default',
        ) );
    }
    
    /**
     * Add the ability to add color themes.
     *
     * @access private
     * @param array $args (default: array()) The argments array.
     * @return void
     */
    public function add_color_theme( $args = array() )
    {
        $args = wp_parse_args( $args, array(
            'name'      => null,
            'slug'      => null,
            'primary'   => '#ffffff',
            'secondary' => '#000000',
            'tertiary'  => '#ff0000',
            'section'   => 'default',
        ) );
        $forbidden_slugs = array( 'custom' );
        if ( in_array( $args['slug'], $forbidden_slugs ) ) {
            wp_die( 'The color slug selected is forbidden' );
        }
        $primary = sanitize_hex_color( $args['primary'] );
        $secondary = sanitize_hex_color( $args['secondary'] );
        $tertiary = sanitize_hex_color( $args['tertiary'] );
        $name = esc_html( $args['name'] );
        $slug = esc_attr( $args['slug'] );
        $section = esc_attr( $args['section'] );
        $this->color_themes[$section][$slug] = new AgncyColorScheme( array(
            'name'      => $name,
            'slug'      => $slug,
            'primary'   => $primary,
            'secondary' => $secondary,
            'tertiary'  => $tertiary,
        ) );
    }
    
    /**
     * Functionality to add the color sections.
     *
     * @access private
     * @param array $args (default: array()) The argments array.
     * @return void
     */
    private function add_color_section( $args = array() )
    {
        $args = wp_parse_args( $args, array(
            'name'     => null,
            'slug'     => null,
            'priority' => 0,
        ) );
        $this->color_sections[$args['slug']] = array(
            'name'     => $args['name'],
            'slug'     => $args['slug'],
            'priority' => $args['priority'],
        );
    }
    
    /**
     * All color themes.
     *
     * @access public
     * @return object $color_themes All registered color themes.
     */
    public function get_color_themes()
    {
        uksort( $this->color_themes, array( $this, 'sort_color_sections_by_priority' ) );
        return $this->color_themes;
    }
    
    /**
     * Sort color objects by priority
     *
     * @access private
     * @param mixed $a The first value.
     * @param mixed $b The second value.
     * @return bool $res The sorting result.
     */
    private function sort_color_sections_by_priority( $a, $b )
    {
        $sections = $this->get_color_sections();
        $a_prio = ( isset( $sections[$a]['priority'] ) ? intval( $sections[$a]['priority'] ) : 10 );
        $b_prio = ( isset( $sections[$b]['priority'] ) ? intval( $sections[$b]['priority'] ) : 10 );
        
        if ( $a_prio === $b_prio ) {
            return 0;
        } else {
            return ( $a_prio > $b_prio ? 1 : -1 );
        }
    
    }
    
    /**
     * Get all color sections.
     *
     * @access public
     * @return object $color_sections The registered color sections.
     */
    public function get_color_sections()
    {
        return $this->color_sections;
    }
    
    /**
     * Get the current theme.
     *
     * @access public
     * @return object $theme The object for the current theme.
     */
    public function get_current_theme()
    {
        $theme_name = get_theme_mod( 'agncy_color_theme_name', 'default' );
        return $this->get_theme( $theme_name );
    }
    
    /**
     * Get a specific theme, or the default theme.
     *
     * @access public
     * @param string $theme_name The name of the theme to get.
     * @return object $color_theme The object of the color theme.
     */
    public function get_theme( $theme_name )
    {
        foreach ( $this->color_themes as $section ) {
            foreach ( $section as $name => $color_theme ) {
                if ( $theme_name === $name ) {
                    return $color_theme;
                }
            }
        }
        return $this->color_themes['default']['default'];
    }
    
    /**
     * This is the blob of code that is being rendered in the <head> of the site.
     *
     * @access public
     * @return void
     */
    public function output_color_rules()
    {
        echo  '<style type="text/css" id="lh_color_rules">' ;
        echo  wp_kses_post( $this->get_color_rules() ) ;
        echo  '</style>
		' ;
    }
    
    /**
     * This is the blob of code that is being rendered in the <head> of the site.
     *
     * @access public
     * @return void
     */
    public function output_admin_color_rules()
    {
        echo  '<style type="text/css" id="lh_color_rules">' ;
        echo  wp_kses_post( $this->get_color_rules( true ) ) ;
        echo  '</style>
		' ;
    }
    
    /**
     * Retrieve the generated color rules.
     * The rules are retrieved from the "lh_color_rules_cache" option. The option acts as
     * a cache, so the rules are not created on every page call. To invalidate the
     * cache, set the option "lh_color_rules_cache" to false or delete.
     *
     * @access public
     * @param bool $admin Flag if the color rules are generated for the admin backend.
     *
     * @return string $color_rules The generated css for the color rules of this theme
     */
    public function get_color_rules( $admin = false )
    {
        
        if ( $admin ) {
            $transient_name = 'lh_color_rules_cache_admin';
        } else {
            $transient_name = 'lh_color_rules_cache';
        }
        
        $color_rules = get_transient( $transient_name );
        
        if ( false === $color_rules ) {
            $current_color_theme = $this->get_current_theme();
            
            if ( $admin ) {
                $prefix = '.edit-post-visual-editor ';
            } else {
                $prefix = null;
            }
            
            $color_rules = $current_color_theme->get_css( $prefix );
            set_transient( $transient_name, $color_rules );
        }
        
        return $color_rules;
    }
    
    /**
     * This function invalidates the color cache.
     *
     * @access public
     * @return void
     */
    public function invalidate_color_cache()
    {
        delete_transient( 'lh_color_rules_cache' );
        delete_transient( 'lh_color_rules_cache_admin' );
    }
    
    /**
     * This function generates a color code and sends it back to the REST API
     *
     * @access public
     * @return void
     */
    function refresh_customizer_colors()
    {
        $current_color_theme = $this->get_current_theme();
        wp_send_json_success( $current_color_theme->get_css() );
        die;
    }

}
$GLOBALS['agncy_color_themes'] = AgncyColors::get_instance();