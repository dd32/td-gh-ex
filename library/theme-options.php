<?php
function ast_admin_bar_menu() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => false,
		'id' => 'asteroid_admin_bar', 
		'title' => ('Asteroid Options'), 
		'href' => admin_url( 'themes.php?page=asteroid-options')
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'appearance',
		'id' => 'theme_editor_admin_bar', 	
		'title' => ('Editor'), 
		'href' => admin_url( 'theme-editor.php')
	));
	$wp_admin_bar->add_menu( array(
		'parent' => 'appearance',
		'id' => 'plugins_admin_bar', 	
		'title' => ('Plugins'), 
		'href' => admin_url( 'plugins.php')
	));
}
add_action( 'wp_before_admin_bar_render', 'ast_admin_bar_menu' );


class My_Theme_Options {
	
	private $sections;
	private $checkboxes;
	private $settings;

	public function __construct() {
		
		// keep track of checkbox options for the validate_settings function.
		$this->checkboxes = array();
		$this->settings = array();
		$this->get_option();
		
		$this->sections['general']     	 	= ( 'General' );
		$this->sections['appearance']  	 	= ( 'Appearance' );
		$this->sections['post-page']   		= ( 'Posts & Pages' );
		$this->sections['custom-css']  	 	= ( 'Custom CSS' );
		$this->sections['custom-widgets']	= ( 'Custom Widgets' );
		$this->sections['misc']   			= ( 'Misc' );
		$this->sections['reset']        	= ( 'Reset' );
		
		add_action( 'admin_menu', array( &$this, 'ast_add_pages' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );
		
		if ( ! get_option( 'asteroid_options' ) )
			$this->initialize_settings();
		
	}
	
	/* Add page(s) to the admin menu */
	public function ast_add_pages() {
		$admin_menu = add_theme_page( 'Asteroid Options', 'Asteroid Options', 'edit_theme_options', 'asteroid-options', array( &$this, 'display_page' ) );
		
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
	
	/*-------------------------------------
	   HTML to display the options page
	--------------------------------------*/
	public function display_page() {
		
		echo '<div class="wrap">
		
		<div id="donate">
			<div id="donate-title">
				<h4>Support the Developer</h4>
			</div>
			<div id="donate-content">
				<p>If you liked this theme, please consider donating a small amount.</p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>			
			</div>
		</div>
		
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
	</form>';

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
	<script type="text/javascript" src="' . get_template_directory_uri() . '/library/js/jscolor/jscolor.js"></script>';

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

	
	/*-------------------------------------
	   HTML Output
	--------------------------------------*/
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
				echo '<h4 class="opt-heading">' . $desc . '</h4>';
				break;
				
			case 'checkbox':
				echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="asteroid_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '"> &nbsp;' . $desc . '</label>';
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
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="asteroid_options[' . $id . ']" placeholder="' . $std . '" rows="8" cols="88" wrap="off">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
				
			case 'textarea-css':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="asteroid_options[' . $id . ']" placeholder="' . $std . '" rows="18" cols="95" wrap="off">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
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
		 			echo '&nbsp;<span class="description">' . $desc . '</span>';
		 		break;	
		}
	}
	
	/*-------------------------------------
	   Define settings and their defaults
	--------------------------------------*/
	public function get_option() {
		
		/* General Settings
		===========================================*/
		
		$this->settings['ast_menu_search'] = array(
			'section' => 'general',
			'title'   => ( 'Search Box on Menu' ),
			'desc'    => ( 'Display a Search box on the Main Menu.' ),
			'type'    => 'checkbox',
			'std'     => 1 // Set to 1 to be checked by default, 0 to be unchecked by default.
		);
		
		$this->settings['ast_post_display_type'] = array(
			'section' => 'general',
			'title'   => ( 'Post Display on Blog View' ),
			'desc'    => ( 'Show excerpts or full posts on non-singular pages.' ),
			'type'    => 'radio',
			'std'     => '1',
			'choices' => array(
				'1' => 'Excerpt',
				'2' => 'Full Post'
				)
		);
		
		$this->settings['ast_head_codes'] = array(
			'title'   => ( 'Custom &lt;Head&gt; Codes' ),
			'desc'    => ( 'Insert &lt;Head&gt; codes here. &nbsp;&nbsp; e.g. Google Analytics, Metas, Fonts, Scripts and what not.' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'general'
		);
		
		$this->settings['ast_hook_footer_links'] = array(
			'title'   => ( 'Footer Links' ),
			'desc'    => ( 'Insert your footer links here. &nbsp;&nbsp; Accepts html codes.' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'general'
		);
		
		/* Appearance
		===========================================*/
		$this->settings['ast_header_logo'] = array(
			'section' => 'appearance',
			'title'   => ( 'Header Logo' ),
			'desc'    => ( 'The URL of your logo. This replaces the site Title & Description.' ),
			'type'    => 'upload',
			'std'     => ''
		);
		
		$this->settings['ast_favicon'] = array(
			'section' => 'appearance',
			'title'   => ( 'Favicon' ),
			'desc'    => ( 'The URL of your favicon. It should be 16x16 pixels.' ),
			'type'    => 'upload',
			'std'     => ''
		);
		
		$this->settings['ast_opt_head_2_1'] = array(
			'section' => 'appearance',
			'title'   => ( '' ),
			'desc'    => ( '' ),
			'type'    => 'heading',
			'std'     => ''
		);
		
		$this->settings['ast_header_height'] = array(
			'title'   => ( 'Height of Header' ),
			'desc'    => ( 'px. Set the height of the Header.' ),
			'std'     => '120',
			'type'    => 'text-int',
			'section' => 'appearance'
		);
		$this->settings['ast_content_width'] = array(
			'title'   => ( 'Width of Content' ),
			'desc'    => ( 'px. Set the width of the content/post area.' ),
			'std'     => '620',
			'type'    => 'text-int',
			'section' => 'appearance'
		);
		
		$this->settings['ast_sidebar_width'] = array(
			'title'   => ( 'Width of Sidebar' ),
			'desc'    => ( 'px. Set the width of the Sidebar.' ),
			'std'     => '310',
			'type'    => 'text-int',
			'section' => 'appearance'
		);
		
		$this->settings['ast_header_bgcolor'] = array(
			'title'   => ( 'Color of Header' ),
			'desc'    => ( 'Choose a background color for the #header container.' ),
			'std'     => 'FFFFFF',
			'type'    => 'color',
			'section' => 'appearance'
		);
				
		$this->settings['ast_content_bgcolor'] = array(
			'title'   => ( 'Color of Content' ),
			'desc'    => ( 'Choose a background color for the #content container.' ),
			'std'     => 'FFFFFF',
			'type'    => 'color',
			'section' => 'appearance'
		);
		
		$this->settings['ast_sidebar_bgcolor'] = array(
			'title'   => ( 'Color of Sidebar' ),
			'desc'    => ( 'Choose a background color for the #sidebar container.' ),
			'std'     => 'FFFFFF',
			'type'    => 'color',
			'section' => 'appearance'
		);
		
		$this->settings['ast_opt_head2'] = array(
			'section' => 'appearance',
			'title'   => ( '' ),
			'desc'    => ( '' ),
			'type'    => 'heading',
			'std'     => 0
		);
		
		/* Posts & Pages
		===========================================*/
		$this->settings['ast_excerpt_thumbnails'] = array(
			'section' => 'post-page',
			'title'   => ( 'Excerpt Thumbnails' ),
			'desc'    => ( 'Show Thumbnails on excerpts. Featured image will be used.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		$this->settings['ast_blog_date'] = array(
			'section' => 'post-page',
			'title'   => ( 'Blog Publish Date' ),
			'desc'    => ( 'Show Publish Date on Blog, Archives, Searches and Excerpts.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		$this->settings['ast_post_date'] = array(
			'section' => 'post-page',
			'title'   => ( 'Post Publish Date' ),
			'desc'    => ( 'Show Publish Date on Single Posts.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		$this->settings['ast_post_author'] = array(
			'section' => 'post-page',
			'title'   => ( 'Post Author' ),
			'desc'    => ( 'Show the Author&rsquo;s name on Posts.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		$this->settings['ast_page_date'] = array(
			'section' => 'post-page',
			'title'   => ( 'Page Publish Date' ),
			'desc'    => ( 'Show Publish Date on Single Pages' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_page_author'] = array(
			'section' => 'post-page',
			'title'   => ( 'Page Author' ),
			'desc'    => ( 'Show the Author&rsquo;s name on Pages.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_date_modified'] = array(
			'section' => 'post-page',
			'title'   => ( 'Show Date Modified' ),
			'desc'    => ( 'Show the date when the Post or Page was modified.' ),
			'type'    => 'select',
			'std'     => 1,
			'choices' => array(
				0	=> 'Hidden',
				1	=> 'On Posts',
				2	=> 'On Pages',
				3	=> 'Both Posts & Pages'
				)
		);
		
		$this->settings['ast_post_comments'] = array(
			'section' => 'post-page',
			'title'   => ( 'Post Comments' ),
			'desc'    => ( 'Show the comments and comment form on Posts.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		$this->settings['ast_page_comments'] = array(
			'section' => 'post-page',
			'title'   => ( 'Page Comments' ),
			'desc'    => ( 'Show the comments and comment form on Pages.' ),
			'type'    => 'checkbox',
			'std'     => 1
		);
		
		/* Custom CSS
		===========================================*/	
		$this->settings['ast_custom_css'] = array(
			'title'   => ( 'Custom CSS Codes' ),
			'desc'    => ( 'Enter custom CSS here to apply to the theme. This should override any other stylings.' ),
			'std'     => '',
			'type'    => 'textarea-css',
			'section' => 'custom-css',
			'class'   => 'textarea-css'
		);
		
		/* Custom Widgets
		===========================================*/
		
		$this->settings['ast_widget_body'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets on Body' ),
			'desc'    => ( 'Allow widgets on the Body' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_widget_header'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets on Header' ),
			'desc'    => ( 'Allow widgets on the Header' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_widget_below_menu'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets Below Menu' ),
			'desc'    => ( 'Allow widgets below the main menu.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_widget_before_content'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets Before Content' ),
			'desc'    => ( 'Allow widgets on top of the content.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_widget_below_excerpts'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets Below Excerpts' ),
			'desc'    => ( 'Allow widgets below the excerpts.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_opt_head_5_1'] = array(
			'section' => 'custom-widgets',
			'title'   => ( '' ),
			'desc'    => ( '' ),
			'type'    => 'heading',
			'std'     => ''
		);
		
		$this->settings['ast_widget_before_post'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets Before Post' ),
			'desc'    => ( 'Allow widgets to show after the post-title.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);	
		
		$this->settings['ast_widget_before_post_content'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets Before Post - Content' ),
			'desc'    => ( 'Allow widgets to show before the post-content.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_widget_after_post_content'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets After Post - Content' ),
			'desc'    => ( 'Allow widgets to show after the post-content.' ),
			'type'    => 'checkbox',
			'std'     => 0 
		);
		
		$this->settings['ast_widget_after_post'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets After Post' ),
			'desc'    => ( 'Allow widgets to show at the post-footer.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_opt_head_5_2'] = array(
			'section' => 'custom-widgets',
			'title'   => ( '' ),
			'desc'    => ( '' ),
			'type'    => 'heading',
			'std'     => ''
		);
		
		$this->settings['ast_widget_before_page'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets Before Page' ),
			'desc'    => ( 'Allow widgets to show after the page-title.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);	
		
		$this->settings['ast_widget_before_page_content'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets Before Page - Content' ),
			'desc'    => ( 'Allow widgets to show before the page-content.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		$this->settings['ast_widget_after_page_content'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets After Page - Content' ),
			'desc'    => ( 'Allow widgets to show after the page-content.' ),
			'type'    => 'checkbox',
			'std'     => 0 
		);
		
		$this->settings['ast_widget_after_page'] = array(
			'section' => 'custom-widgets',
			'title'   => ( 'Widgets After Page' ),
			'desc'    => ( 'Allow widgets to show at the page-footer.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
		/* Miscellaneous
		===========================================*/	
		
		$this->settings['ast_remove_wp_version'] = array(
			'section' => 'misc',
			'title'   => ( 'Remove WordPress Version' ),
			'desc'    => ( 'Prevent WP Version from being displayed in the &lt;Head&gt;' ),
			'type'    => 'checkbox',
			'std'     => 0 
		);
		
		$this->settings['ast_remove_theme_link'] = array(
			'section' => 'misc',
			'title'   => ( 'Remove Theme URL' ),
			'desc'    => ( 'Remove the Asteroid Theme URL in the footer.' ),
			'type'    => 'checkbox',
			'std'     => 0
		);
		
			
		/* Reset
		===========================================*/
		
		$this->settings['ast_reset_theme'] = array(
			'section' => 'reset',
			'title'   => ( 'Reset theme' ),
			'type'    => 'checkbox',
			'std'     => 0,
			'class'   => 'warning', // Custom class for CSS
			'desc'    => ( 'Check and click "Save" to reset theme options. This deletes customizations!' )
		);
		
	}
	
	/*-------------------------------------
	   Description for pages
	--------------------------------------*/
	public function display_section() {
		// No Description
	}
	
	public function display_about_section() {
		// No Description	
	}
	
	/*-------------------------------------
	   Initialize Settings to Defaults
	--------------------------------------*/
	public function initialize_settings() {
		
		$default_settings = array();
		foreach ( $this->settings as $id => $setting ) {
			if ( $setting['type'] != 'heading' )
				$default_settings[$id] = $setting['std'];
		}
		
		update_option( 'asteroid_options', $default_settings );
		
	}
	
	/*-------------------------------------
	   Register Settings
	--------------------------------------*/
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

	/*-------------------------------------
	   jQuery Tabs
	--------------------------------------*/
	public function scripts() {
		wp_print_scripts( 'jquery-ui-tabs' );

		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('my-upload');
		wp_register_script('my-upload', get_stylesheet_directory_uri() . '/js/uploader.js', array('jquery','media-upload','thickbox'));
	}
	
	/*-------------------------------------
	   Styling for the theme options page
	--------------------------------------*/
	public function styles() {	
		wp_register_style( 'mytheme-admin', get_stylesheet_directory_uri() . '/library/theme-options.css' );
		wp_enqueue_style( 'mytheme-admin' );
		wp_enqueue_style('thickbox');
	}
	
	/*-------------------------------------
	   Validate Settings
	--------------------------------------*/
	public function validate_settings( $input ) {
		
		if ( ! isset( $input['ast_reset_theme'] ) ) {
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