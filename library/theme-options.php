<?php
// Add Stuff to admin bar
function asteroid_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => false, 				// parent ID or use 'false' for a root menu
		'id' => 'asteroid_admin_bar', 	// link ID, defaults to a sanitized title value
		'title' => ('Asteroid Options'), 	// link title
		'href' => admin_url( 'themes.php?page=asteroid-options')
	));	
	$wp_admin_bar->add_menu( array(
		'parent' => 'appearance',
		'id' => 'plugins_admin_bar', 	
		'title' => ('Plugins'), 
		'href' => admin_url( 'plugins.php')
	));
}
add_action( 'wp_before_admin_bar_render', 'asteroid_admin_bar_render' );

/**
 * Theme Options Class
 *
 * Derived from the "WordPress Settings API" by Alison Barrett
 * http://alisothegeek.com
 */
 
class My_Theme_Options {
	
	private $sections;
	private $checkboxes;
	private $settings;
	
	/**
	 * Construct
	 *
	 * @since 1.0
	 */
	public function __construct() {
		
		// This will keep track of the checkbox options for the validate_settings function.
		$this->checkboxes = array();
		$this->settings = array();
		$this->get_option();
		
		$this->sections['general']      = ( 'General' );
		$this->sections['appearance']   = ( 'Appearance' );
		$this->sections['custom-css']   = ( 'Custom CSS' );
		$this->sections['widget-hooks'] = ( 'Widget Hooks' );
		$this->sections['misc']   		= ( 'Misc' );
		$this->sections['reset']        = ( 'Reset Theme' );
		
		add_action( 'admin_menu', array( &$this, 'add_pages' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );
		
		if ( ! get_option( 'asteroid_options' ) )
			$this->initialize_settings();
		
	}
	
	/* Add page(s) to the admin menu */
	public function add_pages() {
		$admin_menu = add_theme_page( 'Asteroid Options', 'Asteroid Options', 'manage_options', 'asteroid-options', array( &$this, 'display_page' ) );
		
		add_action( 'admin_print_scripts-' . $admin_menu, array( &$this, 'scripts' ) );
		add_action( 'admin_print_styles-' . $admin_menu, array( &$this, 'styles' ) );	
	}
	
	/* Create settings field */
	public function create_setting( $args = array() ) {
		
		$defaults = array(
			'id'      => 'default_field',
			'title'   => ( 'Default Field' ),
			'desc'    => ( 'This is a default description.' ),
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
			$this->checkboxes[] = $id;
		
		add_settings_field( $id, $title, array( $this, 'display_setting' ), 'asteroid-options', $section, $field_args );
	}
	

	/* HTML to display the theme options page */
	public function display_page() {
		
		echo '<div class="wrap">
	<div class="icon32" id="icon-themes"></div>
	<h2>' . ( 'Asteroid Options' ) . '</h2>';
	
		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true )
			echo '<div class="updated fade"><p>' . ( 'Theme options updated.' ) . '</p></div>';
		
		echo '<form action="options.php" method="post" enctype="multipart/form-data">';
	
		settings_fields( 'asteroid_options' );
		echo '<div class="ui-tabs">
			<ul class="ui-tabs-nav">';
		
		foreach ( $this->sections as $section_slug => $section )
			echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
		
		echo '</ul><p id="submit-top"><input name="Submit" type="submit" class="button-save" value="' . ( 'SAVE' ) . '" /></p>';
		do_settings_sections( $_GET['page'] );
		echo '</div>
	</form>
		<div id="donate">
			<div id="donate-title">
				<h4>Support the Developer</h4>
			</div>
			<div id="donate-content">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>			
			</div>
		</div>';

	echo '
	<script type="text/javascript">
	jQuery(document).ready(function() {
    jQuery(".st_upload_button").click(function() {
         targetfield = jQuery(this).prev(".upload-url");
         tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
         return false;
    });
    window.send_to_editor = function(html) {
         imgurl = jQuery("img",html).attr("src");
         jQuery(targetfield).val(imgurl);
         tb_remove();
    }
	});
	</script>
	<script type="text/javascript" src="' . get_template_directory_uri() . '/library/js/jscolor.js"></script>';

	echo '<script type="text/javascript">
		jQuery(document).ready(function($) {
			var sections = [];';
			
			foreach ( $this->sections as $section_slug => $section )
				echo "sections['$section'] = '$section_slug';";
			
			echo 'var wrapped = $(".wrap h3").wrap("<div class=\"ui-tabs-panel\">");
			wrapped.each(function() {
				$(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
			});
			$(".ui-tabs-panel").each(function(index) {
				$(this).attr("id", sections[$(this).children("h3").text()]);
				if (index > 0)
					$(this).addClass("ui-tabs-hide");
			});
			$(".ui-tabs").tabs({
				fx: { opacity: "toggle", duration: "fast" }
			});
			
			$("input[type=text], textarea").each(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
					$(this).css("color", "#999");
			});
			
			$("input[type=text], textarea").focus(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "") {
					$(this).val("");
					$(this).css("color", "#000");
				}
			}).blur(function() {
				if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
					$(this).val($(this).attr("placeholder"));
					$(this).css("color", "#999");
				}
			});
			
			$(".wrap h3, .wrap table").show();
			
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
			});
		</script>
	</div>';
		
	}

	
	/**
	 * HTML output for text field
	 *
	 * @since 1.0
	 */
	public function display_setting( $args = array() ) {
		
		extract( $args );
		
		$options = get_option( 'asteroid_options' );
		
		if ( ! isset( $options[$id] ) && $type != 'checkbox' )
			$options[$id] = $std;
		elseif ( ! isset( $options[$id] ) )
			$options[$id] = 0;
		
		$field_class = '';
		if ( $class != '' )
			$field_class = ' ' . $class;
		
		switch ( $type ) {
			
			case 'heading':
				echo '</td></tr><tr valign="top"></td></tr><h4>' . $desc . '</h4>';
				break;
				
			case 'checkbox':
				echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="asteroid_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>';
				break;
			
			case 'select':
				echo '<select class="select' . $field_class . '" name="asteroid_options[' . $id . ']">';
				
				foreach ( $choices as $value => $label )
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				
				echo '</select>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'radio':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<input class="radio' . $field_class . '" type="radio" name="asteroid_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label for="' . $id . $i . '">' . $label . '</label>';
					if ( $i < count( $options ) - 1 )
						echo '<br />';
					$i++;
				}
				
				if ( $desc != '' )
					echo '<span class="description">' . $desc . '</span>';
	
				break;
			
			case 'textarea':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="asteroid_options[' . $id . ']" placeholder="' . $std . '" rows="4" cols="90">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
				
			case 'textarea-css':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="asteroid_options[' . $id . ']" placeholder="' . $std . '" rows="14" cols="98">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				break;
				
			case 'password':
				echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="asteroid_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				break;
			
			case 'text':
			default:
		 		echo '<input class="regular-text' . $field_class . '" type="text" id="' . $id . '" name="asteroid_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '<br /><span class="description">' . $desc . '</span>';
		 		break;
				
			case 'text-int':
			default:
		 		echo '<input class="text-int' . $field_class . '" type="text" id="' . $id . '" name="asteroid_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '&nbsp;<span class="description">' . $desc . '</span>';
		 		break;
				
			case 'upload':
			default:
				echo '<input id="' . $id . '" class="upload-url' . $field_class . '" type="text" name="asteroid_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />
					 <input id="st_upload_button" class="st_upload_button" type="button" name="upload_button" value="Upload" />';
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				break;
				
			case 'color':
			default:
		 		echo '<input class="color' . $field_class . '" type="text" id="' . $id . '" name="asteroid_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '<span class="description">' . $desc . '</span>';
		 		break;
		}
		
	}
	
	/* Define all settings and their defaults */
	
	public function get_option() {
		
		/* General Settings
		===========================================*/
		
		$this->settings['head_codes'] = array(
			'title'   => ( 'Custom &lt;Head&gt; Codes' ),
			'desc'    => ( 'Insert &lt;Head&gt; codes here. &nbsp;&nbsp; e.g. Google Analytics, Metas, Fonts, Scripts and what not.' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'general'
		);
		
		$this->settings['menu_search'] = array(
			'section' => 'general',
			'title'   => ( 'Search Box on Menu' ),
			'desc'    => ( 'Display a Search box on the Main Menu.' ),
			'type'    => 'checkbox',
			'std'     => 1 // Set to 1 to be checked by default, 0 to be unchecked by default.
		);
		
		$this->settings['post_display_type'] = array(
			'section' => 'general',
			'title'   => ( 'Home Post Display' ),
			'desc'    => ( 'Show excerpts or full posts on the home page.' ),
			'type'    => 'radio',
			'std'     => 'choice1',
			'choices' => array(
				'choice1' => 'Excerpts',
				'choice2' => 'Full Post'
				)
		);
		
		$this->settings['loop_date_on'] = array(
			'section' => 'general',
			'title'   => ( 'Post Date on Loops' ),
			'desc'    => ( 'Show the Post&rsquo;s Date before the Title on Home, Searches, Categories and Archives.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		$this->settings['single_date_on'] = array(
			'section' => 'general',
			'title'   => ( 'Post Date on Singles' ),
			'desc'    => ( 'Show the Post&rsquo;s Date before the Title on Single Posts.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		$this->settings['full_post_date'] = array(
			'section' => 'general',
			'title'   => ( 'Show Full Post Date' ),
			'desc'    => ( 'Show Full Post Date on Single Posts.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['show_post_author'] = array(
			'section' => 'general',
			'title'   => ( 'Show Post Author' ),
			'desc'    => ( 'Show the Post&rsquo;s Author on Single Posts.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);

		
		/* Appearance
		===========================================*/
		
		$this->settings['header_logo'] = array(
			'section' => 'appearance',
			'title'   => ( 'Header Logo' ),
			'desc'    => ( 'The URL of your logo. This replaces the site Title & Description.' ),
			'type'    => 'upload',
			'std'     => ''
		);
		
		$this->settings['favicon'] = array(
			'section' => 'appearance',
			'title'   => ( 'Favicon' ),
			'desc'    => ( 'The URL of your favicon. It should be 16x16 pixels.' ),
			'type'    => 'upload',
			'std'     => ''
		);
		
		$this->settings['header_height'] = array(
			'title'   => ( 'Header Height' ),
			'desc'    => ( 'px. Set the height of the Header.' ),
			'std'     => '120',
			'type'    => 'text-int',
			'section' => 'appearance'
		);
		
		$this->settings['main_width'] = array(
			'title'   => ( 'Main Width' ),
			'desc'    => ( 'px. Set the width of the main content/post area.' ),
			'std'     => '620',
			'type'    => 'text-int',
			'section' => 'appearance'
		);
		
		$this->settings['sidebar_width'] = array(
			'title'   => ( 'Sidebar Width' ),
			'desc'    => ( 'px. Set the width of the Sidebar.' ),
			'std'     => '310',
			'type'    => 'text-int',
			'section' => 'appearance'
		);
		
		$this->settings['header_bgcolor'] = array(
			'title'   => ( '#Header Color' ),
			'desc'    => ( 'Choose a background color for the #header container.' ),
			'std'     => 'FFFFFF',
			'type'    => 'color',
			'section' => 'appearance'
		);
		
		$this->settings['main_bgcolor'] = array(
			'title'   => ( '#Main Color' ),
			'desc'    => ( 'Choose a background color for the #main container.' ),
			'std'     => 'FFFFFF',
			'type'    => 'color',
			'section' => 'appearance'
		);
		
		$this->settings['sidebar_bgcolor'] = array(
			'title'   => ( '#Sidebar Color' ),
			'desc'    => ( 'Choose a background color for the #sidebar container.' ),
			'std'     => 'FFFFFF',
			'type'    => 'color',
			'section' => 'appearance'
		);
		
		/* Custom CSS
		===========================================*/	
		
		$this->settings['custom_css'] = array(
			'title'   => ( 'Custom CSS Codes' ),
			'desc'    => ( 'Enter custom CSS here to apply to the theme. This should override any other stylings.' ),
			'std'     => '',
			'type'    => 'textarea-css',
			'section' => 'custom-css',
			'class'   => 'textarea-css'
		);
		
		/* Widget Hooks
		===========================================*/
		
		$this->settings['widget_hook_body'] = array(
			'section' => 'widget-hooks',
			'title'   => ( 'Body' ),
			'desc'    => ( '' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['widget_hook_header'] = array(
			'section' => 'widget-hooks',
			'title'   => ( 'Header' ),
			'desc'    => ( '' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['widget_hook_after_menu'] = array(
			'section' => 'widget-hooks',
			'title'   => ( 'After Menu' ),
			'desc'    => ( '' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['widget_hook_before_post'] = array(
			'section' => 'widget-hooks',
			'title'   => ( 'Before Post' ),
			'desc'    => ( '' ),
			'type'    => 'checkbox',
			'std'     => 0
		);	
		
		$this->settings['widget_hook_before_post_content'] = array(
			'section' => 'widget-hooks',
			'title'   => ( 'Before Post - Content' ),
			'desc'    => ( '' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['widget_hook_after_post_content'] = array(
			'section' => 'widget-hooks',
			'title'   => ( 'After Post - Content' ),
			'desc'    => ( '' ),
			'type'    => 'checkbox',
			'std'     => 0 
		);
		
		$this->settings['widget_hook_after_post'] = array(
			'section' => 'widget-hooks',
			'title'   => ( 'After Post' ),
			'desc'    => ( '' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		/* Miscellaneous
		===========================================*/	
		
		$this->settings['remove_wp_version'] = array(
			'section' => 'misc',
			'title'   => ( 'Remove Wordpress Version' ),
			'desc'    => ( 'Prevent WP Version from being displayed in the &lt;Head&gt;' ),
			'type'    => 'checkbox',
			'std'     => 0 
		);
		
		/* Hooks */	
		
		$this->settings['hook_body'] = array(
			'title'   => ( '#Body' ),
			'desc'    => ( 'Enter your scripts and html codes' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'misc'
		);
		
		$this->settings['hook_container'] = array(
			'title'   => ( '#Container' ),
			'desc'    => ( 'Enter your scripts and html codes' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'misc'
		);
		
		$this->settings['hook_footer_link'] = array(
			'title'   => ( 'Footer Links' ),
			'desc'    => ( 'Enter your scripts and html codes' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'misc'
		);
		
		/* Reset
		===========================================*/
		
		$this->settings['reset_theme'] = array(
			'section' => 'reset',
			'title'   => ( 'Reset theme' ),
			'type'    => 'checkbox',
			'std'     => 0,
			'class'   => 'warning', // Custom class for CSS
			'desc'    => ( 'Check and click "Save" to reset theme options. This deletes customizations!' )
		);
		
	}
	
	public function display_section() {
		// code
	}
	
	public function display_about_section() {
		// code	
	}
	
	/**
	 * Initialize settings to their default values
	 * 
	 * @since 1.0
	 */
	public function initialize_settings() {
		
		$default_settings = array();
		foreach ( $this->settings as $id => $setting ) {
			if ( $setting['type'] != 'heading' )
				$default_settings[$id] = $setting['std'];
		}
		
		update_option( 'asteroid_options', $default_settings );
		
	}
	
	/**
	 * Register settings
	 *
	 * @since 1.0
	 */
	public function register_settings() {
		
		register_setting( 'asteroid_options', 'asteroid_options', array ( &$this, 'validate_settings' ) );
		
		foreach ( $this->sections as $slug => $title ) {
			if ( $slug == 'about' )
				add_settings_section( $slug, $title, array( &$this, 'display_about_section' ), 'asteroid-options' );
			else
				add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'asteroid-options' );
		}
		
		$this->get_option();
		
		foreach ( $this->settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->create_setting( $setting );
		}
		
	}

	/**
	 * jQuery Tabs
	 *
	 * @since 1.0
	 */
	public function scripts() {
		wp_print_scripts( 'jquery-ui-tabs' );

		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('my-upload');
		wp_register_script('my-upload', get_stylesheet_directory_uri() . '/js/uploader.js', array('jquery','media-upload','thickbox'));
	}
	
	/**
	 * Styling for the theme options page
	 *
	 * @since 1.0
	 */
	public function styles() {	
		wp_register_style( 'mytheme-admin', get_stylesheet_directory_uri() . '/library/theme-options.css' );
		wp_enqueue_style( 'mytheme-admin' );
		wp_enqueue_style('thickbox');
	}
	
	/**
	 * Validate settings
	 *
	 * @since 1.0
	 */
	public function validate_settings( $input ) {
		
		if ( ! isset( $input['reset_theme'] ) ) {
			$options = get_option( 'asteroid_options' );
			
			foreach ( $this->checkboxes as $id ) {
				if ( isset( $options[$id] ) && ! isset( $input[$id] ) )
					unset( $options[$id] );
			}
			
			return $input;
		}
		return false;		
	}
	
}

$theme_options = new My_Theme_Options();

function mytheme_option( $option ) {
	$options = get_option( 'asteroid_options' );
	if ( isset( $options[$option] ) )
		return $options[$option];
	else
		return false;
}