<?php
class ChiplifeAdmin {
		
		/** Constructor Method */
		function __construct() {
	
			/** Load the admin_init functions. */
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			
			/* Hook the settings page function to 'admin_menu'. */
			add_action( 'admin_menu', array( &$this, 'settings_page_init' ) );		
	
		}
		
		/** Initializes any admin-related features needed for the framework. */
		function admin_init() {
			
			/** Registers admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_register_scripts' ), 1 );
		
			/** Loads admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
			
		}
		
		/** Registers admin JavaScript and Stylesheet files for the framework. */
		function admin_register_scripts() {
			
			/** Register Admin Stylesheet */
			wp_register_style( 'chiplife-admin-css-style', esc_url( CHIPLIFE_ADMIN_URI . 'style.css' ) );
			
			/** Register Admin Scripts */
			wp_register_script( 'chiplife-admin-js-chiplife', esc_url( CHIPLIFE_ADMIN_URI . 'common.js' ) );
			wp_register_script( 'chiplife-admin-js-jquery-cookie', esc_url( CHIPLIFE_JS_URI . 'jquery-cookie/jquery.cookie.js' ) );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for the framework. */
		function admin_enqueue_scripts() {			
		}
		
		/** Initializes all the theme settings page functionality. This function is used to create the theme settings page */
		function settings_page_init() {
			
			global $chiplife;
			
			/** Register theme settings. */
			register_setting( 'chiplife_options_group', 'chiplife_options', array( &$this, 'chiplife_options_validate' ) );
			
			/* Create the theme settings page. */
			$chiplife->settings_page = add_theme_page( 
				esc_html( __( 'Chip Life Options', 'chiplife' ) ),	/** Settings page name. */
				esc_html( __( 'Chip Life Options', 'chiplife' ) ),	/** Menu item name. */
				$this->settings_page_capability(),					/** Required capability */
				'chiplife-options', 								/** Screen name */
				array( &$this, 'settings_page' )					/** Callback function */
			);
			
			/* Check if the settings page is being shown before running any functions for it. */
			if ( !empty( $chiplife->settings_page ) ) {
				
				/** Add contextual help to the theme settings page. */
				add_action( 'load-'. $chiplife->settings_page, array( &$this, 'settings_page_contextual_help' ) );
				
				/* Load the JavaScript and stylesheets needed for the theme settings screen. */
				add_action( 'admin_enqueue_scripts', array( &$this, 'settings_page_enqueue_scripts' ) );
				
				/** Configure settings Sections and Fileds. */
				$this->settings_sections();
				
				/** Configure default settings. */
				$this->settings_default();				
				
			}
			
		}
		
		/** Returns the required capability for viewing and saving theme settings. */
		function settings_page_capability() {
			return 'edit_theme_options';
		}
		
		/** Displays the theme settings page. */
		function settings_page() {
			require( CHIPLIFE_ADMIN_DIR . 'page.php' );
		}
		
		/** Text for the contextual help for the theme settings page in the admin. */
		function settings_page_contextual_help() {
			
			/** Get the parent theme data. */
			$theme = chiplife_theme_data();
			$AuthorURI = $theme['AuthorURI'];
			$ThemeURI = $theme['ThemeURI'];
		
			/** Get the current screen */
			$screen = get_current_screen();
			
			/** Add theme reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'chiplife-theme',
				'title' => __( 'Theme Support', 'chiplife' ),
				'content' => implode( '', file( CHIPLIFE_ADMIN_DIR . 'help/support.html' ) ),				
				
				)
			);
			
			/** Add license reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'chiplife-license',
				'title' => __( 'License', 'chiplife' ),
				'content' => implode( '', file( CHIPLIFE_ADMIN_DIR . 'help/license.html' ) ),				
				
				)
			);
			
			/** Add changelog reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'chiplife-changelog',
				'title' => __( 'Changelog', 'chiplife' ),
				'content' => implode( '', file( CHIPLIFE_ADMIN_DIR . 'help/changelog.html' ) ),				
				
				)
			);
			
			/** Help Sidebar */
			$sidebar = '<p><strong>' . __( 'For more information:', 'chiplife' ) . '</strong></p>';
			if ( !empty( $AuthorURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $AuthorURI ) . '" target="_blank">' . __( 'Chip Life Project', 'chiplife' ) . '</a></p>';
			}
			if ( !empty( $ThemeURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $ThemeURI ) . '" target="_blank">' . __( 'Chip Life Official Page', 'chiplife' ) . '</a></p>';
			}			
			$screen->set_help_sidebar( $sidebar );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for displaying the theme settings page in the WordPress admin. */
		function settings_page_enqueue_scripts( $hook ) {
			
			/** Load Scripts For Chiplife Options Page */
			if( $hook === 'appearance_page_chiplife-options' ) {
				
				/** Load Admin Stylesheet */
				wp_enqueue_style( 'chiplife-admin-css-style' );
				
				/** Load Admin Scripts */
				wp_enqueue_script( 'chiplife-admin-js-chiplife' );
				wp_enqueue_script( 'chiplife-admin-js-jquery-cookie' );
				
			}
				
		}
		
		/** Configure settings Sections and Fileds */		
		function settings_sections() {
		
			/** Blog Section */
			add_settings_section( 'chiplife_section_blog', 'Blog Options', array( &$this, 'chiplife_section_blog_fn' ), 'chiplife_section_blog_page' );			
			
			add_settings_field( 'chiplife_field_nav_style', __( 'Navigation Style', 'chiplife' ), array( &$this, 'chiplife_field_nav_style_fn' ), 'chiplife_section_blog_page', 'chiplife_section_blog' );
			
			/** Post Section */
			add_settings_section( 'chiplife_section_post', 'Post Options', array( &$this, 'chiplife_section_post_fn' ), 'chiplife_section_post_page' );
			
			add_settings_field( 'chiplife_field_post_style', __( 'Post Style', 'chiplife' ), array( &$this, 'chiplife_field_post_style_fn' ), 'chiplife_section_post_page', 'chiplife_section_post' );
			add_settings_field( 'chiplife_field_featured_image_control', __( 'Post Featured Image', 'chiplife' ), array( &$this, 'chiplife_field_featured_image_control_fn' ), 'chiplife_section_post_page', 'chiplife_section_post' );
			
			/** Footer Section */
			add_settings_section( 'chiplife_section_footer', 'Footer Options', array( &$this, 'chiplife_section_footer_fn' ), 'chiplife_section_footer_page' );
			
			add_settings_field( 'chiplife_field_copyright_control', __( 'Use Copyright', 'chiplife' ), array( &$this, 'chiplife_field_copyright_control_fn' ), 'chiplife_section_footer_page', 'chiplife_section_footer' );
			add_settings_field( 'chiplife_field_copyright', __( 'Enter Copyright Text', 'chiplife' ), array( &$this, 'chiplife_field_copyright_fn' ), 'chiplife_section_footer_page', 'chiplife_section_footer' );
			
			/** General Section */
			add_settings_section( 'chiplife_section_general', 'General Options', array( &$this, 'chiplife_section_general_fn' ), 'chiplife_section_general_page' );
			
			add_settings_field( 'chiplife_field_reset_control', __( 'Reset Theme Options', 'chiplife' ), array( &$this, 'chiplife_field_reset_control_fn' ), 'chiplife_section_general_page', 'chiplife_section_general' );
		
		}
		
		/** Configure default settings. */	
		function get_settings_default()  {
			
			$default = array(
					
				'chiplife_nav_style' => 'numeric',
				
				'chiplife_post_style' => 'content',
				'chiplife_featured_image_control' => 'manual',
				
				'chiplife_copyright_control' => 0,
				'chiplife_copyright' => '',
				
				'chiplife_reset_control' => 0
				
			);
			
			return $default;
			
		}
		function settings_default() {
			global $chiplife;
			
			$chiplife_reset_control = false;
			$chiplife_options = chiplife_get_settings();
			
			/** Chiplife Reset Logic */
			if ( !is_array( $chiplife_options ) ) {			
				$chiplife_reset_control = true;			
			} 						
			elseif ( $chiplife_options['chiplife_reset_control'] == 1 ) {			
				$chiplife_reset_control = true;			
			}			
			
			/** Let Reset Chiplife */
			if( $chiplife_reset_control == true ) {				
				$default = $this->get_settings_default();				
				update_option( 'chiplife_options' , $default );			
			}
		
		}
		
		/** Chiplife Pre-defined Range */
		
		/* Boolean Yes | No */		
		function chiplife_boolean_pd() {			
			return array( 1 => __( 'yes', 'chiplife' ), 0 => __( 'no', 'chiplife' ) );		
		}
		
		/* Nav Style Range */		
		function chiplife_nav_style_pd() {			
			return array( 'numeric' => __( 'Numeric', 'chiplife' ), 'older-newer' => __( 'Older / Newer', 'chiplife' ) );			
		}
		
		/* Post Style Range */		
		function chiplife_post_style_pd() {			
			return array( 'content' => __( 'Content', 'chiplife' ), 'excerpt' => __( 'Excerpt', 'chiplife' ) );			
		}
		
		/* Featured Image Range */		
		function chiplife_featured_image_pd() {			
			return array( 'manual' => __( 'Use Featured Image', 'chiplife' ), 'auto' => __( 'Use Featured Image Automatically', 'chiplife' ), 'no' => __( 'No Featured Image', 'chiplife' ) );			
		}		
		
		/** Chiplife Options Validation */				
		function chiplife_options_validate( $input ) {
			
			/** Chiplife Predefined */
			$default = $this->get_settings_default();
			$chiplife_boolean_pd = $this->chiplife_boolean_pd();
			$chiplife_nav_style_pd = $this->chiplife_nav_style_pd();
			$chiplife_post_style_pd = $this->chiplife_post_style_pd();
			$chiplife_featured_image_pd = $this->chiplife_featured_image_pd();						
			
			/* Validation: chiplife_nav_style */
			if ( ! array_key_exists( $input['chiplife_nav_style'], $chiplife_nav_style_pd ) ) {
				 $input['chiplife_nav_style'] = $default['chiplife_nav_style'];
			}
			
			/* Validation: chiplife_post_style */			
			if ( ! array_key_exists( $input['chiplife_post_style'], $chiplife_post_style_pd ) ) {
				 $input['chiplife_post_style'] = $default['chiplife_post_style'];
			}
			
			/* Validation: chiplife_featured_image_control */			
			if ( ! array_key_exists( $input['chiplife_featured_image_control'], $chiplife_featured_image_pd ) ) {
				 $input['chiplife_featured_image_control'] = $default['chiplife_featured_image_control'];
			}										
			
			/* Validation: chiplife_copyright_control */			
			if ( ! array_key_exists( $input['chiplife_copyright_control'], $chiplife_boolean_pd ) ) {
				 $input['chiplife_copyright_control'] = $default['chiplife_copyright_control'];
			}
			
			/* Validation: chiplife_copyright */
			if( !empty( $input['chiplife_copyright'] ) ) {
				$input['chiplife_copyright'] = htmlspecialchars ( $input['chiplife_copyright'] );
			}
			
			/* Validation: chiplife_reset_control */
			if ( ! array_key_exists( $input['chiplife_reset_control'], $chiplife_boolean_pd ) ) {
				 $input['chiplife_reset_control'] = $default['chiplife_reset_control'];
			}
			
			return $input;
		
		}
		
		/** Blog Section Callback */				
		function chiplife_section_blog_fn() {
			echo '<div class="chiplife-section-desc">
			  <p class="description">'. __( 'Customize your blog by using the following settings.', 'chiplife' ) .'</p>
			</div>';
		}
		
		/* Nav Style Callback */		
		function chiplife_field_nav_style_fn() {
			
			$chiplife_options = get_option( 'chiplife_options' );
			$items = $this->chiplife_nav_style_pd();
			
			echo '<select id="chiplife_nav_style" name="chiplife_options[chiplife_nav_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $chiplife_options['chiplife_nav_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select navigation style.', 'chiplife' ) .'</small></div>';
		
		}
		
		/** Post Section Callback */				
		function chiplife_section_post_fn() {
			echo '<div class="chiplife-section-desc">
			  <p class="description">'. __( 'Customize your posts by using the following settings.', 'chiplife' ) .'</p>
			</div>';
		}
		
		/* Post Style Callback */		
		function chiplife_field_post_style_fn() {
			
			$chiplife_options = get_option( 'chiplife_options' );
			$items = $this->chiplife_post_style_pd();
			
			echo '<select id="chiplife_post_style" name="chiplife_options[chiplife_post_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $chiplife_options['chiplife_post_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select post style.', 'chiplife' ) .'</small></div>';
		
		}
		
		/* Featured Image Callback */		
		function chiplife_field_featured_image_control_fn() {
			
			$chiplife_options = get_option( 'chiplife_options' );
			$items = $this->chiplife_featured_image_pd();
			
			echo '<select id="chiplife_featured_image_control" name="chiplife_options[chiplife_featured_image_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $chiplife_options['chiplife_featured_image_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( '<strong>Use Featured Image:</strong> which is set in the post.', 'chiplife' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>Use Featured Image Automatically:</strong> from the images uploaded to the post.', 'chiplife' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>No Featured Image:</strong> for the post.', 'chiplife' ) .'</small></div>';
		
		}
		
		/** Footer Section Callback */				
		function chiplife_section_footer_fn() {
			echo '<div class="chiplife-section-desc">
			  <p class="description">'. __( 'Customize your footer by using the following settings.', 'chiplife' ) .'</p>
			</div>';
		}
		
		/* Copyright Control Callback */		
		function  chiplife_field_copyright_control_fn() {
			
			$chiplife_options = get_option( 'chiplife_options' );
			$items = $this->chiplife_boolean_pd();
			
			echo '<select id="chiplife_copyright_control" name="chiplife_options[chiplife_copyright_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $chiplife_options['chiplife_copyright_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select yes to override default copyright text.', 'chiplife' ) .'</small></div>';
		
		}
		
		/* Copyright Callback */
		function chiplife_field_copyright_fn() {
			
			$chiplife_options = get_option('chiplife_options');
			echo '<textarea type="textarea" id="chiplife_copyright" name="chiplife_options[chiplife_copyright]" rows="7" cols="50">'. esc_html ( $chiplife_options['chiplife_copyright'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter the copyright text.', 'chiplife' ) .'</small></div>';
			echo '<div><small>Example: <strong>&amp;copy; Copyright '.date('Y').' - &lt;a href="'. esc_url( home_url( '/' ) ) .'"&gt;'. get_bloginfo('name') .'&lt;/a&gt;</strong></small></div>';
		
		}
		
		/** General Section Callback */				
		function chiplife_section_general_fn() {
			echo '<div class="chiplife-section-desc">
			  <p class="description">'. __( 'Here are the general settings to customize your blog.', 'chiplife' ) .'</p>
			</div>';
		}
		
		/* Reset Congrol Callback */		
		function chiplife_field_reset_control_fn() {
			
			$chiplife_options = get_option('chiplife_options');			
			$items = $this->chiplife_boolean_pd();			
			echo '<label><input type="checkbox" id="chiplife_reset_control" name="chiplife_options[chiplife_reset_control]" value="1" /> '. __( 'Reset Theme Options.', 'chiplife' ) .'</label>';
		
		}
}

/** Initiate Admin */
new ChiplifeAdmin();
?>