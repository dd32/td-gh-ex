<?php
/**
 * custom-controls.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
*/

/* TABLE OF CONTENT

1 - General additional classes

  1.1 - Class Toggle Switchs
  1.2 - Class Category Control
  1.3 - Class add panel
  1.4 - Class TinyMCE
  1.5 - Class Google Font
  1.6 - Class Alpha Color
  1.7 - Class Slider custom control 

2 - CSS Customize 
  
  2.1 - Font Family
  2.2 - Color Filter Header Home
  2.3 - Font Size Logo
  2.4 - Responsive Enable Style

3 - Dependently-Contextual Customizer Controls
  
  3.1 - Logo 2
  3.2 - Section Team
  3.3 - Social Team Who we are
  3.4 - Portfolio
  3.5 - Blog
  3.6 - Contact 
  3.7 - Footer
  3.8 - Social
  3.9 - SEO

4 - General Sanitization

  4.1 - Image Sanitization
  4.2 - Toggle switch Sanitization
  4.3 - Dropwown Pages Sanitization
  4.4 - Dropwown Categoryes Sanitization
  4.5 - Select sanitization function
  4.6 - Alpha Color Sanitization
  4.7 - Slider custom control Sanitization 

*/


/* ------------------------------------------------------------------------- *
##  1 General additional classes */
/* ------------------------------------------------------------------------- */  

/* ------------------------------------*
##  1.1 Class Toggle Switchs */
/* ----------------------------------- */  

if ( class_exists( 'WP_Customize_Control' ) ) {

class Avik_Toggle_Switch_Custom_control extends WP_Customize_Control {
    /**
     * The type of control being rendered
     */
    public $type = 'toogle_switch';
    /**
     * Enqueue our scripts and styles
     */
    public function enqueue(){
        wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/customizer.css', array(), '1.0', 'all' );
    }
    /**
     * Render the control in the customizer
     */
    public function render_content(){
    ?>
        <div class="toggle-switch-control">
            <div class="toggle-switch">
                <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                <label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
                    <span class="toggle-switch-inner"></span>
                    <span class="toggle-switch-switch"></span>
                
                </label>
            </div>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if( !empty( $this->description ) ) { ?>
                <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php } ?>
        </div>
    <?php
    }
}

} 

/* ------------------------------------*
##  1.2 Class Category Control */
/* ----------------------------------- */  

if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Category_Control extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories( 
                array(
                    'name'              => '_customize-dropdown-category-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;','avik' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),        
                )
            );
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

/* ------------------------------------*
##  1.3 Class add panel */
/* ----------------------------------- */  

if ( class_exists( 'WP_Customize_Panel' ) ) {
	class PE_WP_Customize_Panel extends WP_Customize_Panel {
	  public $panel;
	  public $type = 'pe_panel';
	  public function json() {
		$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
		$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
		$array['content'] = $this->get_content();
		$array['active'] = $this->active();
		$array['instanceNumber'] = $this->instance_number;
		return $array;
	  }
	}
  }
  if ( class_exists( 'WP_Customize_Section' ) ) {
	class PE_WP_Customize_Section extends WP_Customize_Section {
	  public $section;
	  public $type = 'pe_section';
	  public function json() {
		$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
		$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
		$array['content'] = $this->get_content();
		$array['active'] = $this->active();
		$array['instanceNumber'] = $this->instance_number;
		if ( $this->panel ) {
		  $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
		} else {
		  $array['customizeAction'] = 'Customizing';
		}
		return $array;
	  }
	}
  }


/* ------------------------------------*
##  1.4 Class TinyMCE */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {

class Avik_TinyMCE_Custom_control extends WP_Customize_Control {
    /**
     * The type of control being rendered
     */
    public $type = 'tinymce_editor';
    /**
     * Enqueue our scripts and styles
     */
    public function enqueue(){
        wp_enqueue_script( 'avik_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/class-customizer.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/customizer.css', array(), '1.0', 'all' );
        wp_enqueue_editor();
    }
    /**
     * Pass our TinyMCE toolbar string to JavaScript
     */
    public function to_json() {
        parent::to_json();
        $this->json['skyrockettinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
        $this->json['skyrockettinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
    }
    /**
     * Render the control in the customizer
     */
    public function render_content(){
    ?>
        <div class="tinymce-control">
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if( !empty( $this->description ) ) { ?>
                <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php } ?>
            <textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
        </div>
    <?php
    }
}

}

/* ------------------------------------*
##  1.5 Class Google Font  */
/* ----------------------------------- */


if (class_exists('WP_Customize_Control')) {

class Avik_Google_Font_Dropdown_Custom_Control extends WP_Customize_Control{
	private $fonts = false;
    public function __construct($manager, $id, $args = array(), $options = array()){
        $this->fonts = $this->get_google_fonts();
        parent::__construct( $manager, $id, $args );
    }
 
    public function render_content(){
        ?>
            <label class="customize_dropdown_input">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            	<select id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" data-customize-setting-link="<?php echo esc_attr($this->id); ?>">
                    <?php
                        foreach ( $this->fonts as $k => $v ){
                            echo '<option value="'.$v['family'].'" ' . selected( $this->value(), $v['family'], false ) . '>'.$v['family'].'</option>';
                        }
                    ?>
                </select>
            </label>
        <?php
    }
 
	public function get_google_fonts(){
		if (get_transient('avik_google_font_list_p')) {
        	$content = get_transient('avik_google_font_list_p');
	    } else {
	        $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyAX1CGUKz_8OGO3kzZBLGIE_rZR0aYoGHE';
	        $fontContent = wp_remote_get( $googleApi, array('sslverify'   => false) );
	        $content = json_decode($fontContent['body'], true);
	        set_transient( 'avik_google_font_list_p', $content, 0 );
	    }
 
	    return $content['items'];
	}
 
}
}

/* ------------------------------------*
##  1.6 Class Alpha Color  */
/* ----------------------------------- */

/*
* @author Anthony Hortin <http://maddisondesigns.com>
* @license http://www.gnu.org/licenses/gpl-2.0.html
* @link https://github.com/maddisondesigns
*/
  
    if (class_exists('WP_Customize_Control')) {
    class Avik_Customize_Alpha_Color_Control extends WP_Customize_Control {
	
		public $type = 'alpha-color';
	
		public $palette;
	
		public $show_opacity;

		public function enqueue() {
			wp_enqueue_script( 'avik_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/class-customizer.js', array( 'jquery', 'wp-color-picker' ), '1.0', true );
			wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/customizer.css', array( 'wp-color-picker' ), '1.0', 'all' );
		}
	
		public function render_content() {

			
			if ( is_array( $this->palette ) ) {
				$palette = implode( '|', $this->palette );
			} else {
			
				$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
			}

			$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

			?>
				<label>
					<?php 
					if ( isset( $this->label ) && '' !== $this->label ) {
						echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
					}
					if ( isset( $this->description ) && '' !== $this->description ) {
						echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
					} ?>
				</label>
				<input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
			<?php
	}
}
}

/* ------------------------------------*
##  1.7 Class Slider custom control  */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {

class Avik_Slider_Custom_Control extends WP_Customize_Control {
    /**
     * The type of control being rendered
     */
    public $type = 'slider_control';
    /**
     * Enqueue our scripts and styles
     */
    public function enqueue() {
        wp_enqueue_script( 'avik_custom_controls_js', trailingslashit( get_template_directory_uri() ) . 'inc/js/class-customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
        wp_enqueue_style( 'avik_custom_controls_css', trailingslashit( get_template_directory_uri() ) . 'inc/css/customizer.css', array(), '1.0', 'all' );
    }
    /**
     * Render the control in the customizer
     */
    public function render_content() {
    ?>
        <div class="slider-custom-control">
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
            <div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
        </div>
    <?php
    }
}
}


/* ------------------------------------------------------------------------- *
##  2 CSS Customize */
/* ------------------------------------------------------------------------- */  

function avik_customizer_css() {
?>

<style>


/* ------------------------------------------------------------------------- *
## 2.1 Font Family */
/* ------------------------------------------------------------------------- */  

p{
    font-family:<?php echo get_theme_mod('avik_google_font_list_p', 'Montserrat'); ?>;
}

h1,h2,h3,h4,h5,h6,li,a,span{
    font-family:<?php echo get_theme_mod('avik_google_font_list_title', 'Montserrat'); ?>;
}

/* ------------------------------------------------------------------------- *
## 2.2 Color Filter Header Home */
/* ------------------------------------------------------------------------- */  

.filter-header{
    background-color:<?php echo get_theme_mod('color_filter_header', 'rgba(122,122,122,0.05)'); ?>;
}

/* ------------------------------------------------------------------------- *
## 2.3 Font Size Logo */
/* ------------------------------------------------------------------------- */  

.avik-logo img{width:<?php echo get_theme_mod('font_size_logo', '80'); ?>px ;}

</style>


<!-- 2.4 Responsive Enable Style  --> 

<!-- Scroll to top -->

<?php if ( true == get_theme_mod( 'enable_to_top_media', false) ) : ?>

<style>

@media (max-width: 699px) {
  
  #avik-scrol-to-top{ 
    display: none!important;
  }

}
</style>
<?php endif; ?> 

<!-- Sidebar smartphone -->

<?php if ( true == get_theme_mod( 'enable_sidebar_media', false) ) : ?>

<style>

@media (max-width: 699px) {
  
  #secondary{ 
    display: none!important;
  }

}
</style>
<?php endif; ?> 


<?php
}
add_action( 'wp_footer', 'avik_customizer_css' );


/* ------------------------------------------------------------------------- *
##  3 Dependently-Contextual Customizer Controls */
/* ------------------------------------------------------------------------- */ 

/* --------------------------------------*
##  3.1 Logo 2 */
/* -------------------------------------- */ 

// Enable Logo 2

function enable_logo_2($control) {

	$option = $control->manager->get_setting('enable_logo_2');
	
	return $option->value() == 'logo_2';
	
}

/* ---------------------------------------- *
##  3.2 Section Team */
/* --------------------------------------- */ 

// Enable Section Team

function enable_team_whoweare($control) {

	$option = $control->manager->get_setting('enable_team_whoweare');
	
    return $option->value() == 'title_general_team_whoweare';
    return $option->value() == 'color_social_icons_team';
    return $option->value() == 'color_hover_social_icons_team';
	
}

/* --------------------------------------*
##  3.3 Social Team Who we are */
/* -------------------------------------- */ 

// Enable Icon Facebook 1

function enable_facebook_icon_team_1($control) {

	$option = $control->manager->get_setting('enable_facebook_icon_team_1');
	
	return $option->value() == 'link_facebook_icon_team_1';
	
}

// Enable Icon Twitter 1

function enable_twitter_icon_team_1($control) {

	$option = $control->manager->get_setting('enable_twitter_icon_team_1');
	
	return $option->value() == 'link_twitter_icon_team_1';
	
}

// Enable Icon Instagram 1

function enable_instagram_icon_team_1($control) {

	$option = $control->manager->get_setting('enable_instagram_icon_team_1');
	
	return $option->value() == 'link_instagram_icon_team_1';
	
}

// Enable Icon Linkedin 1

function enable_linkedin_icon_team_1($control) {

	$option = $control->manager->get_setting('enable_linkedin_icon_team_1');
	
	return $option->value() == 'link_linkedin_icon_team_1';
	
}

// Enable Google Plus 1

function enable_google_plus_icon_team_1($control) {

	$option = $control->manager->get_setting('enable_google_plus_icon_team_1');
	
	return $option->value() == 'link_google_plus_icon_team_1';
	
}

// Enable Icon Facebook 2

function enable_facebook_icon_team_2($control) {

	$option = $control->manager->get_setting('enable_facebook_icon_team_2');
	
	return $option->value() == 'link_facebook_icon_team_2';
	
}

// Enable Icon Twitter 2

function enable_twitter_icon_team_2($control) {

	$option = $control->manager->get_setting('enable_twitter_icon_team_2');
	
	return $option->value() == 'link_twitter_icon_team_2';
	
}

// Enable Icon Instagram 2

function enable_instagram_icon_team_2($control) {

	$option = $control->manager->get_setting('enable_instagram_icon_team_2');
	
	return $option->value() == 'link_instagram_icon_team_2';
	
}

// Enable Icon Linkedin 2

function enable_linkedin_icon_team_2($control) {

	$option = $control->manager->get_setting('enable_linkedin_icon_team_2');
	
	return $option->value() == 'link_linkedin_icon_team_2';
	
}

// Enable Google Plus 2

function enable_google_plus_icon_team_2($control) {

	$option = $control->manager->get_setting('enable_google_plus_icon_team_2');
	
	return $option->value() == 'link_google_plus_icon_team_2';
	
}

// Enable Icon Facebook 3

function enable_facebook_icon_team_3($control) {

	$option = $control->manager->get_setting('enable_facebook_icon_team_3');
	
	return $option->value() == 'link_facebook_icon_team_3';
	
}

// Enable Icon Twitter 3

function enable_twitter_icon_team_3($control) {

	$option = $control->manager->get_setting('enable_twitter_icon_team_3');
	
	return $option->value() == 'link_twitter_icon_team_3';
	
}

// Enable Icon Instagram 3

function enable_instagram_icon_team_3($control) {

	$option = $control->manager->get_setting('enable_instagram_icon_team_3');
	
	return $option->value() == 'link_instagram_icon_team_3';
	
}

// Enable Icon Linkedin 3

function enable_linkedin_icon_team_3($control) {

	$option = $control->manager->get_setting('enable_linkedin_icon_team_3');
	
	return $option->value() == 'link_linkedin_icon_team_3';
	
}

// Enable Google Plus 3

function enable_google_plus_icon_team_3($control) {

	$option = $control->manager->get_setting('enable_google_plus_icon_team_3');
	
	return $option->value() == 'link_google_plus_icon_team_3';
	
}

/* --------------------------------------*
##  3.4 Portfolio */
/* -------------------------------------- */ 

// Enable button Portfolio 1 c 1

function enable_button_portfolio_1_c_1($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_1_c_1');
	
    return $option->value() == 'link_button_portfolio_1_c_1';
    return $option->value() == 'title_button_portfolio_1_c_1';
	
}

// Enable button Portfolio 2 c 1

function enable_button_portfolio_2_c_1($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_2_c_1');
	
    return $option->value() == 'link_button_portfolio_2_c_1';
    return $option->value() == 'title_button_portfolio_2_c_1';
	
}

// Enable button Portfolio 3 c 1

function enable_button_portfolio_3_c_1($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_3_c_1');
	
    return $option->value() == 'link_button_portfolio_3_c_1';
    return $option->value() == 'title_button_portfolio_3_c_1';
	
}

// Enable button Portfolio 4 c 1

function enable_button_portfolio_4_c_1($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_4_c_1');
	
    return $option->value() == 'link_button_portfolio_4_c_1';
    return $option->value() == 'title_button_portfolio_4_c_1';
	
}

// Enable button Portfolio 5 c 1

function enable_button_portfolio_5_c_1($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_5_c_1');
	
    return $option->value() == 'link_button_portfolio_5_c_1';
    return $option->value() == 'title_button_portfolio_5_c_1';
	
}

// Enable button Portfolio 6 c 1

function enable_button_portfolio_6_c_1($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_6_c_1');
	
    return $option->value() == 'link_button_portfolio_6_c_1';
    return $option->value() == 'title_button_portfolio_6_c_1';
	
}

// Enable button Portfolio 1 c 2

function enable_button_portfolio_1_c_2($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_1_c_2');
	
    return $option->value() == 'link_button_portfolio_1_c_2';
    return $option->value() == 'title_button_portfolio_1_c_2';
	
}

// Enable button Portfolio 2 c 2

function enable_button_portfolio_2_c_2($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_2_c_2');
	
    return $option->value() == 'link_button_portfolio_2_c_2';
    return $option->value() == 'title_button_portfolio_2_c_2';
	
}

// Enable button Portfolio 3 c 2

function enable_button_portfolio_3_c_2($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_3_c_2');
	
    return $option->value() == 'link_button_portfolio_3_c_2';
    return $option->value() == 'title_button_portfolio_3_c_2';

}

// Enable button Portfolio 4 c 2

function enable_button_portfolio_4_c_2($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_4_c_2');
	
    return $option->value() == 'link_button_portfolio_4_c_2';
    return $option->value() == 'title_button_portfolio_4_c_2';

}

// Enable button Portfolio 5 c 2

function enable_button_portfolio_5_c_2($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_5_c_2');
	
    return $option->value() == 'link_button_portfolio_5_c_2';
    return $option->value() == 'title_button_portfolio_5_c_2';

}

// Enable button Portfolio 6 c 2

function enable_button_portfolio_6_c_2($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_6_c_2');
	
    return $option->value() == 'link_button_portfolio_6_c_2';
    return $option->value() == 'title_button_portfolio_6_c_2';

}

// Enable button Portfolio 1 c 3

function enable_button_portfolio_1_c_3($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_1_c_3');
	
    return $option->value() == 'link_button_portfolio_1_c_3';
    return $option->value() == 'title_button_portfolio_1_c_3';

}

// Enable button Portfolio 2 c 3

function enable_button_portfolio_2_c_3($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_2_c_3');
	
    return $option->value() == 'link_button_portfolio_2_c_3';
    return $option->value() == 'title_button_portfolio_2_c_3';

}

// Enable button Portfolio 3 c 3

function enable_button_portfolio_3_c_3($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_3_c_3');
	
    return $option->value() == 'link_button_portfolio_3_c_3';
    return $option->value() == 'title_button_portfolio_3_c_3';

}

// Enable button Portfolio 4 c 3

function enable_button_portfolio_4_c_3($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_4_c_3');
	
    return $option->value() == 'link_button_portfolio_4_c_3';
    return $option->value() == 'title_button_portfolio_4_c_3';

}   

    
// Enable button Portfolio 5 c 3

function enable_button_portfolio_5_c_3($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_5_c_3');
	
    return $option->value() == 'link_button_portfolio_5_c_3';
    return $option->value() == 'title_button_portfolio_5_c_3';

}

// Enable button Portfolio 6 c 3

function enable_button_portfolio_6_c_3($control) {

	$option = $control->manager->get_setting('enable_button_portfolio_6_c_3');
	
    return $option->value() == 'link_button_portfolio_6_c_3';
    return $option->value() == 'title_button_portfolio_6_c_3';

}	


// Enable video icon column 1 Portfolio 1

function enable_column_1_id_portfolio_1($control) {

	$option = $control->manager->get_setting('enable_column_1_id_portfolio_1');
	
    return $option->value() == 'column_1_id_portfolio_1';
    return $option->value() == 'alt_portfolio_1_c_1';
    return $option->value() == 'enable_icon_video_column_1_id_portfolio_1';
	
}

// Enable video icon column 1 Portfolio 2

function enable_column_1_id_portfolio_2($control) {

	$option = $control->manager->get_setting('enable_column_1_id_portfolio_2');
	
    return $option->value() == 'column_1_id_portfolio_2';
    return $option->value() == 'alt_portfolio_2_c_1';
    return $option->value() == 'enable_icon_video_column_1_id_portfolio_2';
	
}

// Enable video icon column 1 Portfolio 3

function enable_column_1_id_portfolio_3($control) {

	$option = $control->manager->get_setting('enable_column_1_id_portfolio_3');
	
    return $option->value() == 'column_1_id_portfolio_3';
    return $option->value() == 'alt_portfolio_3_c_1';
    return $option->value() == 'enable_icon_video_column_1_id_portfolio_3';
	
}

// Enable video icon column 1 Portfolio 4

function enable_column_1_id_portfolio_4($control) {

	$option = $control->manager->get_setting('enable_column_1_id_portfolio_4');
	
    return $option->value() == 'column_1_id_portfolio_4';
    return $option->value() == 'alt_portfolio_4_c_1';
    return $option->value() == 'enable_icon_video_column_1_id_portfolio_4';
	
}

// Enable video icon column 1 Portfolio 5

function enable_column_1_id_portfolio_5($control) {

	$option = $control->manager->get_setting('enable_column_1_id_portfolio_5');
	
    return $option->value() == 'column_1_id_portfolio_5';
    return $option->value() == 'alt_portfolio_5_c_1';
    return $option->value() == 'enable_icon_video_column_1_id_portfolio_5';
	
}

// Enable video icon column 1 Portfolio 6

function enable_column_1_id_portfolio_6($control) {

	$option = $control->manager->get_setting('enable_column_1_id_portfolio_6');
	
    return $option->value() == 'column_1_id_portfolio_6';
    return $option->value() == 'alt_portfolio_6_c_1';
    return $option->value() == 'enable_icon_video_column_1_id_portfolio_6';
	
}

// Enable video icon column 2 Portfolio 1

function enable_column_2_id_portfolio_1($control) {

	$option = $control->manager->get_setting('enable_column_2_id_portfolio_1');
	
    return $option->value() == 'column_2_id_portfolio_1';
    return $option->value() == 'alt_portfolio_1_c_2';
    return $option->value() == 'enable_icon_video_column_2_id_portfolio_1';
	
}

// Enable video icon column 2 Portfolio 2

function enable_column_2_id_portfolio_2($control) {

	$option = $control->manager->get_setting('enable_column_2_id_portfolio_2');
	
    return $option->value() == 'column_2_id_portfolio_2';
    return $option->value() == 'alt_portfolio_2_c_2';
    return $option->value() == 'enable_icon_video_column_2_id_portfolio_2';
	
}

// Enable video icon column 2 Portfolio 3

function enable_column_2_id_portfolio_3($control) {

	$option = $control->manager->get_setting('enable_column_2_id_portfolio_3');
	
    return $option->value() == 'column_2_id_portfolio_3';
    return $option->value() == 'alt_portfolio_3_c_2';
    return $option->value() == 'enable_icon_video_column_2_id_portfolio_3';
	
}

// Enable video icon column 2 Portfolio 4

function enable_column_2_id_portfolio_4($control) {

	$option = $control->manager->get_setting('enable_column_2_id_portfolio_4');
	
    return $option->value() == 'column_2_id_portfolio_4';
    return $option->value() == 'alt_portfolio_4_c_2';
    return $option->value() == 'enable_icon_video_column_2_id_portfolio_4';
	
}

// Enable video icon column 2 Portfolio 5

function enable_column_2_id_portfolio_5($control) {

	$option = $control->manager->get_setting('enable_column_2_id_portfolio_5');
	
    return $option->value() == 'column_2_id_portfolio_5';
    return $option->value() == 'alt_portfolio_5_c_2';
    return $option->value() == 'enable_icon_video_column_2_id_portfolio_5';
	
}

// Enable video icon column 2 Portfolio 6

function enable_column_2_id_portfolio_6($control) {

	$option = $control->manager->get_setting('enable_column_2_id_portfolio_6');
	
    return $option->value() == 'column_2_id_portfolio_6';
    return $option->value() == 'alt_portfolio_6_c_2';
    return $option->value() == 'enable_icon_video_column_2_id_portfolio_6';
	
}

// Enable video icon column 3 Portfolio 1

function enable_column_3_id_portfolio_1($control) {

	$option = $control->manager->get_setting('enable_column_3_id_portfolio_1');
	
    return $option->value() == 'column_3_id_portfolio_1';
    return $option->value() == 'alt_portfolio_1_c_3';
    return $option->value() == 'enable_icon_video_column_3_id_portfolio_1';
	
}

// Enable video icon column 3 Portfolio 2

function enable_column_3_id_portfolio_2($control) {

	$option = $control->manager->get_setting('enable_column_3_id_portfolio_2');
	
    return $option->value() == 'column_3_id_portfolio_2';
    return $option->value() == 'alt_portfolio_2_c_3';
    return $option->value() == 'enable_icon_video_column_3_id_portfolio_2';
	
}

// Enable video icon column 3 Portfolio 3

function enable_column_3_id_portfolio_3($control) {

	$option = $control->manager->get_setting('enable_column_3_id_portfolio_3');
	
    return $option->value() == 'column_3_id_portfolio_3';
    return $option->value() == 'alt_portfolio_3_c_3';
    return $option->value() == 'enable_icon_video_column_3_id_portfolio_3';
	
}

// Enable video icon column 3 Portfolio 4

function enable_column_3_id_portfolio_4($control) {

	$option = $control->manager->get_setting('enable_column_3_id_portfolio_4');
	
    return $option->value() == 'column_3_id_portfolio_4';
    return $option->value() == 'alt_portfolio_4_c_3';
    return $option->value() == 'enable_icon_video_column_3_id_portfolio_4';
	
}

// Enable video icon column 3 Portfolio 5

function enable_column_3_id_portfolio_5($control) {

	$option = $control->manager->get_setting('enable_column_3_id_portfolio_5');
	
    return $option->value() == 'column_3_id_portfolio_5';
    return $option->value() == 'alt_portfolio_5_c_3';
    return $option->value() == 'enable_icon_video_column_3_id_portfolio_5';
	
}

// Enable video icon column 3 Portfolio 6

function enable_column_3_id_portfolio_6($control) {

	$option = $control->manager->get_setting('enable_column_3_id_portfolio_6');
	
    return $option->value() == 'column_3_id_portfolio_6';
    return $option->value() == 'alt_portfolio_6_c_3';
    return $option->value() == 'enable_icon_video_column_3_id_portfolio_6';
	
}

/* --------------------------------------*
##  3.5 Blog */
/* -------------------------------------- */ 


// Enable carousel Blog

function enable_carousel($control) {

	$option = $control->manager->get_setting('enable_carousel');
	
    return $option->value() == 'carousel_category';
    return $option->value() == 'carousel_count';
	
}

/* --------------------------------------*
##  3.6 Contact  */
/* -------------------------------------- */ 

// Map

function enable_map_contact($control) {

	$option = $control->manager->get_setting('enable_map_contact');
	
    return $option->value() == 'image_map';
    return $option->value() == 'alt_image_map';
    return $option->value() == 'link_map';
	
}

/* --------------------------------------*
##  3.7 Footer */
/* -------------------------------------- */ 

// Power by 

function enable_power_footer($control) {

	$option = $control->manager->get_setting('enable_power_footer');
	
    return $option->value() == 'title_power_footer';
    	
}

/* --------------------------------------*
##  3.8 Social */
/* -------------------------------------- */ 

// Facebook

function enable_facebook_social($control) {

	$option = $control->manager->get_setting('enable_facebook_social');
	
    return $option->value() == 'link_facebook_social';
    	
}

// Twitter

function enable_twitter_social($control) {

	$option = $control->manager->get_setting('enable_twitter_social');
	
    return $option->value() == 'link_twitter_social';
    	
}

// Google Plus

function enable_google_plus_social($control) {

	$option = $control->manager->get_setting('enable_google_plus_social');
	
    return $option->value() == 'link_google_plus_social';
    	
}

// Dribbble

function enable_dribbble_social($control) {

	$option = $control->manager->get_setting('enable_dribbble_social');
	
    return $option->value() == 'link_dribbble_social';
    	
}

// Tumblr

function enable_tumblr_social($control) {

	$option = $control->manager->get_setting('enable_tumblr_social');
	
    return $option->value() == 'link_tumblr_social';
    	
}

// Instagram

function enable_instagram_social($control) {

	$option = $control->manager->get_setting('enable_instagram_social');
	
    return $option->value() == 'link_instagram_social';
    	
}

// Linkedin

function enable_linkedin_social($control) {

	$option = $control->manager->get_setting('enable_linkedin_social');
	
    return $option->value() == 'link_linkedin_social';
    	
}

// Youtube

function enable_youtube_social($control) {

	$option = $control->manager->get_setting('enable_youtube_social');
	
    return $option->value() == 'link_youtube_social';
    	
}

// Pinterest

function enable_pinterest_social($control) {

	$option = $control->manager->get_setting('enable_pinterest_social');
	
    return $option->value() == 'link_pinterest_social';
    	
}

// Flickr

function enable_flickr_social($control) {

	$option = $control->manager->get_setting('enable_flickr_social');
	
    return $option->value() == 'link_flickr_social';
    	
}

// Github

function enable_github_social($control) {

	$option = $control->manager->get_setting('enable_github_social');
	
    return $option->value() == 'link_github_social';
    	
}

/* --------------------------------------*
##  3.9 SEO */
/* -------------------------------------- */ 

// Resource type

function enable_resource_type($control) {

	$option = $control->manager->get_setting('enable_resource_type');
	
    return $option->value() == 'resource_type_head';
    	
}

// Author

function enable_author($control) {

	$option = $control->manager->get_setting('enable_author');
	
    return $option->value() == 'author_head';
    	
}

// Contact

function enable_contact($control) {

	$option = $control->manager->get_setting('enable_contact');
	
    return $option->value() == 'contact_head';
    	
}

// Copyright

function enable_copyright($control) {

	$option = $control->manager->get_setting('enable_copyright');
	
    return $option->value() == 'copyright_head';

}

// Keywords

function enable_keywords($control) {

	$option = $control->manager->get_setting('enable_keywords');
	
    return $option->value() == 'keywords_head';

}
    	
/* --------------------------------------*
##  3.10 Filter Header Home */
/* -------------------------------------- */ 

// Color Filter Header Home

function enable_filter_home($control) {

	$option = $control->manager->get_setting('enable_filter_home');
	
    return $option->value() == 'color_filter_header';

}

/* ------------------------------------------------------------------------- *
##  4 General Sanitization */
/* ------------------------------------------------------------------------- */  

/* ----------------------------------------------- *
##  4.1 Image Sanitization */
/* ------------------------------------------------*/

if ( ! function_exists( 'avik_sanitize_file' ) ) {
    function avik_sanitize_file( $file, $setting ) {
             
        //allowed file types
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'mp4'          => 'video/mp4',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon',
        );
         
        //check file type from file name
        $file_ext = wp_check_filetype( $file, $mimes );
         
        //if file has a valid mime type return it, otherwise return default
        return ( $file_ext['ext'] ? $file : $setting->default );
}
}
    
/* ----------------------------------------------- *
##  4.2 Toggle switch Sanitization */
/* ------------------------------------------------*/  
        
if ( ! function_exists( 'avik_switch_sanitization' ) ) {
        function avik_switch_sanitization( $input ) {
            if ( true === $input ) {
                return 1;
            } else {
                return 0;
         }
    }
}
    
/* ----------------------------------------------- *
##  4.3 Dropwown Pages Sanitization */
/* ------------------------------------------------*/  
        
    
function avik_sanitize_dropdown_pages( $page_id, $setting ) {
        $page_id = absint( $page_id );
        return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
    
/* ----------------------------------------------- *
##  4.4 Dropwown Categoryes Sanitization */
/* ------------------------------------------------*/  
    
function avik_sanitize_category_select( $cat_id, $setting) {
        $cat_id = absint($cat_id);
        return is_string(get_the_category_by_ID( $cat_id )) ? $cat_id :  $setting->default;
}
    
    
/* ----------------------------------------------- *
##  4.5 Select sanitization function */
/* ------------------------------------------------*/
    
function avik_sanitize_select( $input, $setting ){
             
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);
    
        //get the list of possible select options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                         
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
         
}
    

/* ----------------------------------------------- *
##  4.6 Alpha Color Sanitization  */
/* ------------------------------------------------*/
/** 
*@param  string	Input to be sanitized
*@return string	Sanitized input
*/
		
	if ( ! function_exists( 'avik_hex_rgba_sanitization' ) ) {
		function avik_hex_rgba_sanitization( $input, $setting ) {
			if ( empty( $input ) || is_array( $input ) ) {
				return $setting->default;
			}

			if ( false === strpos( $input, 'rgba' ) ) {
				
				$input = sanitize_hex_color( $input );
			} else {
			
				$input = str_replace( ' ', '', $input );
				sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
				$input = 'rgba(' . avik_in_range( $red, 0, 255 ) . ',' . avik_in_range( $green, 0, 255 ) . ',' . avik_in_range( $blue, 0, 255 ) . ',' . avik_in_range( $alpha, 0, 1 ) . ')';
			}
			return $input;
		}
}
    
/**
* @param  number	Input to be sanitized
* @return number	Sanitized input
*/
	if ( ! function_exists( 'avik_in_range' ) ) {
		function avik_in_range( $input, $min, $max ){
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
		    return $input;
		}
}


/* ----------------------------------------------- *
##  4.7 Slider custom control Sanitization  */
/* ------------------------------------------------*/

/**
	 * @param  string		Input value to check
	 * @return integer	Returned integer value
	 */
	if ( ! function_exists( 'avik_sanitize_integer' ) ) {
		function avik_sanitize_integer( $input ) {
			return (int) $input;
		}
	}
