<?php
/**
 * @package Akyuz Administration Panel
 */

/*
 * Plugin Name: Akyuz Administration Panel
 * Plugin URI: http://www.selimakyuz.com
 * Description: Theme Administration Panel
 * Version: 1.0
 * Author: Selim AKYUZ
 * Author URI: http://ww.selimakyuz.com/
 * License: GPLv2 or later
 */

/**
 * 
 * @since Akyuz 1.0
 */

class Akyuz_Theme_Administration_Options {
	
	private $akyuz_sections;
	private $akyuz_checkboxes;
	private $akyuz_settings;
	private $themename;
	private $shortname;
	
	/**
	 * Construct
	 *
	 * @since 1.0
	 */
	public function __construct() {
		$this->themename = AKYUZ_THEMENAME;

		// This will keep track of the checkbox options for the validate_settings function.
		$this->akyuz_checkboxes = array();
		$this->akyuz_settings = array();
		$this->akyuz_get_setting();
		
		$this->akyuz_sections[AKYUZ_SHORTNAME.'_tab_social_networks']	= __( 'Social Networks'   , AKYUZ_TEXT_DOMAIN);
		$this->akyuz_sections[AKYUZ_SHORTNAME.'_tab_footer']			= __( 'Footer'            , AKYUZ_TEXT_DOMAIN);
		$this->akyuz_sections[AKYUZ_SHORTNAME.'_tab_tracking']			= __( 'Tracking Settings' , AKYUZ_TEXT_DOMAIN);
		$this->akyuz_sections[AKYUZ_SHORTNAME.'_tab_advertising']		= __( 'Advertising'       , AKYUZ_TEXT_DOMAIN);
		$this->akyuz_sections[AKYUZ_SHORTNAME.'_tab_about']				= __( 'About'             , AKYUZ_TEXT_DOMAIN);
		$this->akyuz_sections[AKYUZ_SHORTNAME.'_tab_reset']				= __( 'Reset Options'     , AKYUZ_TEXT_DOMAIN);
		
		add_action( 'admin_menu', array( &$this, 'akyuz_add_pages' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );
		
		if ( ! get_option( 'akyuz_options' ) )
			$this->initialize_settings();
		
	}
	
	/**
	 * Add options page
	 *
	 * @since 1.0
	 */
	public function akyuz_add_pages() {
		
		$admin_page = add_theme_page( __( 'Theme Options', AKYUZ_TEXT_DOMAIN ), __( 'Akyuz Theme Options', AKYUZ_TEXT_DOMAIN ), 'manage_options', AKYUZ_OPTIONSPAGENAME, array( &$this, 'akyuz_display_page' ) );
		
		add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'scripts' ) );
		add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'styles' ) );
		
	}
	
	/**
	 * Create settings field
	 *
	 * @since 1.0
	 */
	public function akyuz_create_setting( $args = array() ) {
		
		$defaults = array(
			'id'      => 'default_field',
			'title'   => __( 'Default Field', AKYUZ_TEXT_DOMAIN ),
			'desc'    => __( 'This is a default description.', AKYUZ_TEXT_DOMAIN ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'choices' => array(),
			'class'   => ''
		);
			
		extract( wp_parse_args( $args, $defaults ) );
		
		$field_args = array(
			'type'      => $type,
			'id'        => $id,
			'desc'      => $desc,
			'std'       => $std,
			'choices'   => $choices,
			'label_for' => $id,
			'class'     => $class
		);
		
		if ( $type == 'checkbox' )
			$this->akyuz_checkboxes[] = $id;
		
		add_settings_field( $id, $title, array( $this, 'display_setting' ), AKYUZ_OPTIONSPAGENAME, $section, $field_args );
	}
	
	/**
	 * Display options page
	 *
	 * @since 1.0
	 */
	public function akyuz_display_page() {
	?>

	<div class="wrap">
		<form action="options.php" method="post" >
			<?php settings_fields( 'akyuz_options' );?>

			<div id="akyuz-options-panel">
				<div id="akyuz-options-panel-header">
					<div class="icon32" id="icon-options-general"></div>
					<h2><?php echo AKYUZ_THEMENAME_OP_NAME; ?> <span><?php echo AKYUZ_THEMENAME_OP_VER; ?></span></h2>
				</div><!-- akyuz-options-panel-header-->
				<?php
				if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true )
					echo '<div class="updated fade"><p>' . __( 'Theme options updated.', AKYUZ_TEXT_DOMAIN ) . '</p></div>';
				?>
				<div id="akyuz-options-panel-container">
					<div id="akyuz-options-panel-container-menu">
						<ul class="">
						<?php
						foreach ( $this->akyuz_sections as $section_slug => $section )
							echo '<li><a class="akyuz-options-panel-menu-link" href="#' . $section_slug . '" id="akyuz-options-panel-menu-' . $section_slug . '">' . $section . '</a></li>';
						?>
						</ul>
					</div><!-- akyuz-options-panel-container-content-->
					
					<div id="akyuz-options-panel-container-content">
						<?php
						do_settings_sections( $_GET['page'] );
						?>
					</div><!-- akyuz-options-panel-container-content-->
					
					<div class="clear"></div>
				</div><!-- akyuz-options-panel-content-->
				
				<div id="akyuz-options-panel-footer">
					<input name="Submit" type="submit" class="button-primary" value="<?php echo __( 'Save Changes', AKYUZ_TEXT_DOMAIN );?>" />
				</div><!-- akyuz-options-panel-footer-->
				
			</div><!-- akyuz-options-panel-->
			
		</form>

	</div><!-- wrap-->
	
	<?php
		echo '<script type="text/javascript">
		jQuery(document).ready(function($) {
			var akyuz_sections = [];';
		foreach ( $this->akyuz_sections as $section_slug => $section )
				echo "akyuz_sections['$section'] = '$section_slug';";
				
		echo 'var wrapp = $(".wrap h3").wrap("<div class=\"akyuz-options-panel-content-box\"></div>");
				wrapp.each(function() {
					$(this).parent().append($(this).parent().nextUntil("div.akyuz-options-panel-content-box"));
				});';
		echo '$(".akyuz-options-panel-content-box").each(function(index) {
				$(this).attr("id", "akyuz-options-panel-content-"+akyuz_sections[$(this).children("h3").text()]);
				//alert($(this).attr("id"));
				if (index > 0)
					$(this).addClass("nonvisible");
				});
				// This will make the "warning" checkbox class really stand out when checked.
				// I use it here for the Reset checkbox.
				$(".warning").change(function() {
					if ($(this).is(":checked"))
						$(this).parent().css("background", "#c00").css("color", "#fff").css("fontWeight", "bold");
					else
						$(this).parent().css("background", "none").css("color", "inherit").css("fontWeight", "normal");
				});
				
				// Browser compatibility
				if ($.browser.mozilla) 
						 $("form").attr("autocomplete", "off");
				
				';
	
	echo '});</script>';
	}
	
	/**
	 * Description for section
	 *
	 * @since 1.0
	 */
	public function display_section($args = array() ) {
	}
	
	/**
	 * Description for About section
	 *
	 * @since 1.0
	 */
	public function display_section_akyuz_tab_about() {
		
		// This displays on the "About" tab. Echo regular HTML here, like so:
		 echo '<p>Copyright 2010 Selim AKYUZ</p>';
		
	}
	
	/**
	 * HTML output for text field
	 *
	 * @since 1.0
	 */
	public function display_setting( $args = array() ) {
		
		extract( $args );
		
		$options = get_option( 'akyuz_options' );
		
		if ( ! isset( $options[$id] ) && $type != 'checkbox' )
			$options[$id] = $std;
		elseif ( ! isset( $options[$id] ) )
			$options[$id] = 0;
		
		$field_class = '';
		if ( $class != '' )
			$field_class = ' ' . $class;
		
		switch ( $type ) {
				
			case 'heading':
				echo '</td></tr><tr valign="top"><td colspan="2"><h4>' . $desc . '</h4>';
				break;
			
			case 'checkbox':
				echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="akyuz_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>';
				break;
			
			case 'select':
				echo '<select class="select' . $field_class . '" name="akyuz_options[' . $id . ']">';
				
				foreach ( $choices as $value => $label )
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				
				echo '</select>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'radio':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<input class="radio' . $field_class . '" type="radio" name="akyuz_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label for="' . $id . $i . '">' . $label . '</label>';
					if ( $i < count( $options ) - 1 )
						echo '<br />';
					$i++;
				}
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'textarea':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="akyuz_options[' . $id . ']" placeholder="' . $std . '" rows="5" cols="30">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'password':
				echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="akyuz_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'text':
				echo '<input id="'.$id.'" class="regular-text' . $field_class . '" name="akyuz_options['.$id.']" type="'.$type.'" placeholder="' . $std . '" value="'.esc_attr( $options[$id] ).'" />';
				break;

			default:
	 		      echo '<input id="'.$id.'" class="regular-text' . $field_class . '" name="akyuz_options[' . $id . ']" type="text" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '<br /><span class="description">' . $desc . '</span>';
		 		
		 		break;
		 	
		}
		
	}
	
	/**
	 * Settings and defaults
	 * 
	 * @since 1.0
	 */
	public function akyuz_get_setting() {
	
	/* Social Networking Settings
	===========================================*/
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_enable'] = array(
			'title'   => __( 'Enable Social Network', AKYUZ_TEXT_DOMAIN ),
			'desc'    => __( '', AKYUZ_TEXT_DOMAIN ),
			'std'     => '',
			'type'    => 'checkbox',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_facebook_url'] = array(
			'title'   => __( 'Facebook URL' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Enter your Facebook URL.', AKYUZ_TEXT_DOMAIN ),
			'std'     => 'http://',
			'type'    => 'text',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_twitter_url'] = array(
			'title'   => __( 'Twitter URL', AKYUZ_TEXT_DOMAIN ),
			'desc'    => __( 'Enter your Twitter URL.', AKYUZ_TEXT_DOMAIN ),
			'std'     => 'http://',
			'type'    => 'text',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_youtube_url'] = array(
			'title'   => __( 'YouTube URL', AKYUZ_TEXT_DOMAIN ),
			'desc'    => __( 'Enter your YouTube URL.', AKYUZ_TEXT_DOMAIN ),
			'std'     => 'http://',
			'type'    => 'text',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_flickr_url'] = array(
			'title'   => __( 'Flickr URL', AKYUZ_TEXT_DOMAIN ),
			'desc'    => __( 'Enter your Flickr URL.', AKYUZ_TEXT_DOMAIN ),
			'std'     => 'http://',
			'type'    => 'text',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_linkedin_url'] = array(
			'title'   => __( 'LinkedIn URL' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Enter your LinkedIn URL.', AKYUZ_TEXT_DOMAIN ),
			'std'     => 'http://',
			'type'    => 'text',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_delicious_url'] = array(
			'title'   => __( 'Delicious URL' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Enter your Delicious URL.', AKYUZ_TEXT_DOMAIN ),
			'std'     => 'http://',
			'type'    => 'text',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_social_rss_url'] = array(
			'title'   => __( 'Feedburner URL' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Feedburner URL' , AKYUZ_TEXT_DOMAIN),
			'std'     => get_bloginfo('rss2_url'),
			'type'    => 'text',
			'section' => AKYUZ_SHORTNAME.'_tab_social_networks'
		);

	/* Advertising
	===========================================*/
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_advertising_ads_top'] = array(
			'title'   => __( 'Top Advertising' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Top advertising space.', AKYUZ_TEXT_DOMAIN ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => AKYUZ_SHORTNAME.'_tab_advertising'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_advertising_ads_sidebar_1'] = array(
			'title'   => __( 'Sidebar Advertising-1' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Sidebar advertising space.', AKYUZ_TEXT_DOMAIN ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => AKYUZ_SHORTNAME.'_tab_advertising'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_advertising_ads_sidebar_2'] = array(
			'title'   => __( 'Sidebar Advertising-2' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Sidebar advertising space.', AKYUZ_TEXT_DOMAIN ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => AKYUZ_SHORTNAME.'_tab_advertising'
		);
		
	/* Tracking
	===========================================*/
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_tracking_header'] = array(
			'title'   => __( 'Header Tracking' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Enter your tracking code to insert it in the head tag of your site.', AKYUZ_TEXT_DOMAIN ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => AKYUZ_SHORTNAME.'_tab_tracking'
		);
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_tracking_footer'] = array(
			'title'   => __( 'Footer Tracking' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Enter your tracking code to insert it in the footer tag of your site.', AKYUZ_TEXT_DOMAIN ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => AKYUZ_SHORTNAME.'_tab_tracking'
		);
		
	/* Footer
	===========================================*/
		$this->akyuz_settings[AKYUZ_SHORTNAME.'_footer_left'] = array(
			'title'   => __( 'Footer Copy Right Text' , AKYUZ_TEXT_DOMAIN),
			'desc'    => __( 'Enter text used in the left side of the footer. It can be HTML.' , AKYUZ_TEXT_DOMAIN),
			'std'     => 'Copyright &copy; 2008-2012 Selim AKYUZ . All rights reserved.',
			'type'    => 'textarea',
			'section' => AKYUZ_SHORTNAME.'_tab_footer',
			'class'   => 'code'
		);
				
	/* Reset
	===========================================*/
		$this->akyuz_settings['reset_theme'] = array(
			'section' => AKYUZ_SHORTNAME.'_tab_reset',
			'title'   => __( 'Reset theme' , AKYUZ_TEXT_DOMAIN),
			'type'    => 'checkbox',
			'std'     => 0,
			'class'   => 'warning', // Custom class for CSS
			'desc'    => __( 'Check this box and click "Save Changes" below to reset theme options to their defaults.' , AKYUZ_TEXT_DOMAIN)
		);
		
	}
	
	/**
	 * Initialize settings to their default values
	 * 
	 * @since 1.0
	 */
	public function initialize_settings() {
		
		$default_settings = array();
		foreach ( $this->akyuz_settings as $id => $setting ) {
			if ( $setting['type'] != 'heading' )
				$default_settings[$id] = $setting['std'];
		}
		
		update_option( 'akyuz_options', $default_settings );
		
	}
	
	/**
	* Register settings
	*
	* @since 1.0
	*/
	public function register_settings() {
		
		register_setting( 'akyuz_options', 'akyuz_options', array ( &$this, 'validate_settings' ) );
		
		foreach ( $this->akyuz_sections as $slug => $title ) {
			add_settings_section( $slug, $title, array( &$this, 'display_section_'.$slug ), AKYUZ_OPTIONSPAGENAME );
		}
		
		$this->akyuz_get_setting();
		
		foreach ( $this->akyuz_settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->akyuz_create_setting( $setting );
		}
		
	}
	

	/**
	* Styling for the theme options page
	*
	* @since 1.0
	*/
	public function styles() {

		wp_register_style( 'akyuz-admin', get_stylesheet_directory_uri() . '/functions/akyuz-options.css' );
		wp_enqueue_style( 'akyuz-admin' );
		
		wp_enqueue_script( 'akyuz-theme-options', get_template_directory_uri() . '/functions/akyuz-options.js', false, '2011-06-10' );
	}
	
	/**
	* Validate settings
	*
	* @since 1.0
	*/
	public function validate_settings( $input ) {
		
		if ( ! isset( $input['reset_theme'] ) ) {
			$options = get_option( 'akyuz_options' );
			
			foreach ( $this->akyuz_checkboxes as $id ) {
				if ( isset( $options[$id] ) && ! isset( $input[$id] ) )
					unset( $options[$id] );
			}
			
			return $input;
		}
		return false;
		
	}
	
}

$akyuz_theme_options = new Akyuz_Theme_Administration_Options();

function mytheme_option( $option ) {
	$options = get_option( 'akyuz_options' );
	if ( isset( $options[$option] ) )
		return $options[$option];
	else
		return false;
}


/*
 *	Add Options Menu Item to the WordPress Admin Bar
 */
function akyuz_admin_bar()
{
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
		'parent'	=> 'appearance',
		'id'		=> 'akyuz_theme_admin_options',
		'title'		=> __( 'Akyuz Options',AKYUZ_TEXT_DOMAIN ),
		'href'		=> admin_url( 'themes.php?page='.AKYUZ_OPTIONSPAGENAME )
	));
}
add_action( 'wp_before_admin_bar_render', 'akyuz_admin_bar' );



/*
 *  Short Code for the theme Link
 */
function akyuz_theme_url()
{
    $themelink = "<a class=\"theme-link\" href=\"http://www.selimakyuz.com\" title=\"Akyuz Wordpress Theme\" >Akyuz Wordpress Theme</a>";
    return $themelink;
}
add_shortcode( 'theme-url', 'akyuz_theme_url' );

?>