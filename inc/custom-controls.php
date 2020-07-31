<?php
/**
* at-custom-controls.php
* @author    Franchi Design
* @package   Atomy
*/

/* ------------------------------------------------------------------------- *
##   Class */
/* ------------------------------------------------------------------------- */

/* ------------------------------------*
##   Class add panel */
/* ----------------------------------- */

if ( class_exists( 'WP_Customize_Panel' ) ) {
	class Atomy_WP_Customize_Panel extends WP_Customize_Panel {
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
	class Atomy_WP_Customize_Section extends WP_Customize_Section {
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
##   Class Toggle Switchs */
/* ----------------------------------- */

if ( class_exists( 'WP_Customize_Control' ) ) {


	class Atomy_Toggle_Switch_Custom_control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'toggle_switch';
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
##  Class Category Control */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {
	class Atomy_Customize_Category_Control extends WP_Customize_Control {
	  public function render_content() {
		$dropdown = wp_dropdown_categories(
		  array(
			'name'              => '_customize-dropdown-category-' . $this->id,
			'echo'              => 0,
			'show_option_none'  => __( '&mdash; Select &mdash;','atomy' ),
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
##  Image Radio Button Custom Control */
/* ----------------------------------- */
	
if (class_exists('WP_Customize_Control')) {
	 
 class Atomy_Image_Radio_Button_Custom_Control extends WP_Customize_Control {
				/**
				 * The type of control being rendered
				 */
				 public $type = 'image_radio_button';
				/**
				 * Enqueue our scripts and styles
				 */
				 
				/**
				 * Render the control in the customizer
				 */
				 public function render_content() {
				 ?>
					<div class="image_radio_button_control">
						<?php if( !empty( $this->label ) ) { ?>
							<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<?php } ?>
						<?php if( !empty( $this->description ) ) { ?>
							<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
						<?php } ?>
						<?php foreach ( $this->choices as $key => $value ) { ?>
							<label class="radio-button-label">
								<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
								<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
							</label>
						<?php	} ?>
					</div>
				 <?php
		 }
	}
}

/* ------------------------------------*
##  Text Radio Button Custom Control */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {

	class Atomy_Text_Radio_Button_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		 public $type = 'text_radio_button';
		/**
		 * Render the control in the customizer
		 */
		 public function render_content() {
		 ?>
			<div class="text_radio_button_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

			   <div class="radio-buttons">
				   <?php foreach ( $this->choices as $key => $value ) { ?>
						<label class="radio-button-label">
							<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
							<span><?php echo esc_html( $value ); ?></span>
						</label>
					<?php	} ?>
			   </div>
			</div>
		 <?php
		 }
	 }
}	

/* ------------------------------------*
##  Slider Custom Control */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {

	class Atomy_Slider_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'slider_control';
		public function enqueue() {
			wp_enqueue_script( 'atomy-custom-controls-js', get_template_directory_uri() .'/class-js/customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
			wp_enqueue_style('atomy-custom-controls-css', get_template_directory_uri() .'/css/customizer.css', array(), '1.0', 'all');
		}
	    /** 
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
			<div class="slider-custom-control">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
				<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
			</div>
		<?php
		}
	}
}

/* ------------------------------------*
## Simple Notice Custom Control */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {
	class Atomy_Simple_Notice_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'simple_notice';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$allowed_html = array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'class' => array(),
					'target' => array(),
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'i' => array(
					'class' => array()
				),
				'span' => array(
					'class' => array(),
				),
				'code' => array(),
			);
		?>
			<div class="simple-notice-custom-control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
			</div>
		<?php
		}
	}

}

//  Class Simple Notice for Pro
if (class_exists('WP_Customize_Control')) {

	class Atomy_Simple_Notice_Custom_Control_Pro extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'simple_notice';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$allowed_html = array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'class' => array(),
					'target' => array(),
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'i' => array(
					'class' => array()
				),
				'button' => array(
					'class' => array()
				  ),
				  'div' => array(
					'style' => array()
				  ),
				  'p' => array(
					'style' => array()
				  ),
				'span' => array(
					'class' => array(),
				),
				'code' => array(),
			);
		?>
			<div class="simple-notice-custom-control-pr">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
			</div>
	<!-- Style for Custom Simple Notices -->
	<style>
	
	.simple-notice-custom-control-pr{
		padding-top: 2em;
		border: 1px solid #ccc;
	  background-color: #fff;
	}
	
	.simple-notice-custom-control-pr span{
	  padding: 1em;
	}
	
	.simple-notice-custom-control-pr{
	  font-family: 'Montserrat', sans-serif;
	  transition-duration: 0.7s;
	  transition-timing-function: ease;
	}
	
	.customize-control-description{
	  font-style: normal!important;
	}
	
	.simple-notice-custom-control-pr button {
		background: transparent;
		color: #000;
	  padding-top: 16px;
	  padding-left: 10px;
	  padding-right: 10px;
		font-size: 14px;
		position: relative;
	  margin-top: 10px;
	  margin-bottom: 10px;
	  border-radius: 4px;
	  border:1px solid #ccc!important;
	  margin-left:5px;
	}
	
	.simple-notice-custom-control-pr a{
	  color: #666;
	  text-decoration: none;
	}
	
	.simple-notice-custom-control-pr a:hover{
	color: #fff!important;
	}
	
	.simple-notice-custom-control-pr button:hover {
	background-color: gray;
	}
	
	</style>
	
		<?php
		}
	}
	}

/* ------------------------------------*
## Simple Advise Custom Control */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {
	class Atomy_Simple_Advise_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'simple_notice';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$allowed_html = array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'class' => array(),
					'target' => array(),
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'i' => array(
					'class' => array()
				),
				'span' => array(
					'class' => array(),
				),
				'code' => array(),
			);
		?>
			<div class="simple-notice-custom-advise">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-advise-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<br>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-advise-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
			</div>
		<?php
		}
	}

}

/* ------------------------------------*
## Simple Advise Custom Control for Shortcode */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {
	class Atomy_Simple_Advise_Shortcode_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'simple_notice';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$allowed_html = array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'class' => array(),
					'target' => array(),
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'i' => array(
					'class' => array()
				),
				'span' => array(
					'class' => array(),
				),
				'code' => array(),
			);
		?>
			<div class="simple-notice-custom-advise-shortcode">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-advise-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<br>
				<br>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-advise-description-shortcode"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
			</div>
		<?php
		}
	}

}

/* ------------------------------------*
## Dropdown Posts Custom Control */
/* ----------------------------------- */

	if (class_exists('WP_Customize_Control')) {
	class Atomy_Dropdown_Posts_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'dropdown_posts';
		/**
		 * Posts
		 */
		private $posts = array();
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Get our Posts
			$this->posts = get_posts( $this->input_attrs );
		}

		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
			<div class="dropdown_posts_control">
				<?php if( !empty( $this->label ) ) { ?>
					<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title">
						<?php echo esc_html( $this->label ); ?>
					</label>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<select name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>" <?php $this->link(); ?>>
					<?php
						if( !empty( $this->posts ) ) {
							foreach ( $this->posts as $post ) {
								printf( '<option value="%s" %s>%s</option>',
									$post->ID,
									selected( $this->value(), $post->ID, false ),
									$post->post_title
								);
							}
						}
					?>
				</select>
			</div>
		<?php
		}
	}
}

/* ------------------------------------*
## Alpha Color Picker Custom Control */
/* ----------------------------------- */

if (class_exists('WP_Customize_Control')) {
	class Atomy_Customize_Alpha_Color_Control extends WP_Customize_Control {
	public $type = 'alpha-color';
	public $palette;
	public $show_opacity;
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {
		    wp_enqueue_script( 'atomy-custom-controls-js', get_template_directory_uri() .'/class-js/customizer.js', array( 'jquery', 'wp-color-picker' ), '1.0', true );
			wp_enqueue_style('atomy-custom-controls-css', get_template_directory_uri() .'/css/customizer.css', array('wp-color-picker'), '1.0', 'all');
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {

		// Process the palette
		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );
		} else {
			// Default to true.
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
		}

		// Support passing show_opacity as string or boolean. Default to true.
		$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

		?>
			<label>
				<?php // Output the label and description if they were passed in.
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

/* ------------------------------------------------------------------------- *
##   Sanitization */
/* ------------------------------------------------------------------------- */

/* ----------------------------------------------- *
##  Toggle switch Sanitization */
/* ------------------------------------------------*/

if ( ! function_exists( 'atomy_switch_sanitization' ) ) {
	function atomy_switch_sanitization( $input ) {
	  if ( true === $input ) {
		return 1;
	  } else {
		return 0;
	  }
	}
}

/* ----------------------------------------------- *
##  Alpha Color (Hex & RGBa) sanitization */
/* ------------------------------------------------*/

function atomy_sanitize_rgba( $color ) {
	if ( empty( $color ) || is_array( $color ) )
			return 'rgba(0,0,0,0)';
	// If string does not start with 'rgba', then treat as hex
	// sanitize the hex color and finally convert hex to rgba
	if ( false === strpos( $color, 'rgba' ) ) {
			return sanitize_hex_color( $color );
	}
	// By now we know the string is formatted as an rgba color so we need to further sanitize it.
	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
	return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}

/* ----------------------------------------------- *
##  File input sanitization function */
/* ------------------------------------------------*/

function atomy_sanitize_file( $file, $setting ) {
         
	//allowed file types
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png'
	);
	 
	//check file type from file name
	$file_ext = wp_check_filetype( $file, $mimes );
	 
	//if file has a valid mime type return it, otherwise return default
	return ( $file_ext['ext'] ? $file : $setting->default );
}

/* ----------------------------------------------- *
##  Dropwown Categoryes Sanitization */
/* ------------------------------------------------*/

function atomy_sanitize_category_select( $cat_id, $setting) {
	$cat_id = absint($cat_id);
	return is_string(get_the_category_by_ID( $cat_id )) ? $cat_id :  $setting->default;
}

/* ----------------------------------------------- *
##  Text sanitization */
/* ------------------------------------------------*/

if ( ! function_exists( 'atomy_text_sanitization' ) ) {
		function atomy_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}
}

/* ----------------------------------------------- *
##  Radio Button and Select sanitization */
/* ------------------------------------------------*/

	if ( ! function_exists( 'atomy_radio_sanitization' ) ) {
		function atomy_radio_sanitization( $input, $setting ) {
			//get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}
}

/* ----------------------------------------------- *
##  Slider sanitization */
/* ------------------------------------------------*/

if ( ! function_exists( 'atomy_sanitize_integer' ) ) {
	function atomy_sanitize_integer( $input ) {
	  return (int) $input;
	}
}

/* ------------------------------------------------------------------------- *
##   Dependently-Contextual Customizer Controls */
/* ------------------------------------------------------------------------- */

// Icons Header Top

function atomy_enable_cart_icon($control) {
  
	$option = $control->manager->get_setting('atomy_enable_cart_icon');
	 
	return $option->value() == 'at_icon_cart_change';
	 
 }


// Facebook

function atomy_enable_facebook_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_facebook_social');
  
 return $option->value() == 'atomy_link_facebook_social';
  
}

// Twitter

function atomy_enable_twitter_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_twitter_social');
	 
 return $option->value() == 'atomy_link_twitter_social';
	 
}

// Dribbble

function atomy_enable_dribbble_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_dribbble_social');
		   
 return $option->value() == 'atomy_link_dribbble_social';
		   
}

// Tumblr

function atomy_enable_tumblr_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_tumblr_social');
			  
 return $option->value() == 'atomy_link_tumblr_social';
			  
}

// Instagram

function atomy_enable_instagram_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_instagram_social');
				 
 return $option->value() == 'atomy_link_instagram_social';
				 
}

// Linkedin

function atomy_enable_linkedin_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_linkedin_social');
					
 return $option->value() == 'atomy_link_linkedin_social';
					
}

// Youtube

function atomy_enable_youtube_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_youtube_social');
					   
 return $option->value() == 'atomy_link_youtube_social';
					   
}

// Pinterest

function atomy_enable_pinterest_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_pinterest_social');
						  
 return $option->value() == 'atomy_link_pinterest_social';
						  
}

// Flickr

function atomy_enable_flickr_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_flickr_social');
							 
 return $option->value() == 'atomy_link_flickr_social';
							 
}

// Github

function atomy_enable_github_social($control) {
  
 $option = $control->manager->get_setting('atomy_enable_github_social');
								
 return $option->value() == 'atomy_link_github_social';
								
}


// Category Home

// Effect Image	
function atomy_enable_effect_image_category($control) {
	$option = $control->manager->get_setting('atomy_enable_effect_image_category');			 
	return $option->value() == 'at_padding_effect_image_category';							 
 }

// Border color Effect Image
function atomy_enable_effect_image_category_b($control) {
	$option = $control->manager->get_setting('atomy_enable_effect_image_category');			 
	return $option->value() == 'at_background_color_effect_image_category';							 
 }

// Box Shadow 1 Effect Image
function atomy_enable_effect_image_category_1($control) {
	$option = $control->manager->get_setting('atomy_enable_effect_image_category');			 
	return $option->value() == 'at_box_shadow_1_effect_image_category';							 
 }

 // Box Shadow 2 Effect Image
function atomy_enable_effect_image_category_2($control) {
	$option = $control->manager->get_setting('atomy_enable_effect_image_category');			 
	return $option->value() == 'at_box_shadow_2_effect_image_category';							 
 }

 // Box Shadow 3 Effect Image
function atomy_enable_effect_image_category_3($control) {
	$option = $control->manager->get_setting('atomy_enable_effect_image_category');			 
	return $option->value() == 'at_box_shadow_3_effect_image_category';							 
 }
  
 // Preloader
function atomy_enable_preloader($control) {
	$option = $control->manager->get_setting('atomy_enable_preloader');			 
	return $option->value() == 'at_background_preloader';							 
 }

  // Preloader
function atomy_enable_preloader_1($control) {
	$option = $control->manager->get_setting('atomy_enable_preloader');			 
	return $option->value() == 'at_image_preloader';							 
 }

// Height Auto or Custom Image Portfolio 2 Featured
function atomy_height_auto_portfolio2_image($control) {
	$option = $control->manager->get_setting('atomy_height_auto_portfolio2_image');			 
	return $option->value() == 'at_height_portfolio2_image';							 
 }

 // Object-fit Image Portfolio 2 Featured
function atomy_height_auto_portfolio2_image_1($control) {
	$option = $control->manager->get_setting('atomy_height_auto_portfolio2_image');			 
	return $option->value() == 'at_object_portfolio2_image';							 
 }

// Enable Auto Height Imagew Single Product
 function atomy_enable_auto_image_single($control) {
	$option = $control->manager->get_setting('atomy_enable_auto_image_single');			 
	return $option->value() == 'at_height_image_single_product';
	return $option->value() == 'at_object_image_single_product';							 
}

// Enable/Disable Call-to-action button Static
function atomy_enable_button_action_static($control) {
	$option = $control->manager->get_setting('atomy_enable_button_action_static');			 
	return $option->value() == 'at_title_action_static';
	return $option->value() == 'atomy_link_action_static';
	return $option->value() == 'at_padding_top_call_to_action';							 
}

// Enable/Disable Call-to-action button Parallax
function atomy_enable_button_action_parallax($control) {
	$option = $control->manager->get_setting('atomy_enable_button_action_parallax');			 
	return $option->value() == 'at_title_action_parallax';						 
}
























 


