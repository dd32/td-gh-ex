<?php
/**
* Chip Life Options Class
*/

class Chip_Life_Options {

		
		/**
		* Chip Admin Init
		*/
		
		function chip_life_admin_init() {
		
			/** Register Admin Stylesheet */
			wp_register_style( 'chip_life_style_admin', CHIP_LIFE_CHIP_URL . '/admin/style.css' );
			wp_register_style( 'chip_life_style_uismoothness', CHIP_LIFE_CHIP_URL . '/js/ui/css/smoothness/jquery-ui-1.8.14.custom.css' );
			
			/** Register Admin Scripts */
			wp_register_script( 'chip_life_script_jquery_cookie', CHIP_LIFE_CHIP_URL . '/js/jquery.cookie.js' );
			
			/** Register Theme Options */
			register_setting( 'chip_life_options_group', 'chip_life_options', array( 'Chip_Life_Options', 'chip_life_validation_fn' ) );
			
			/** Chip Blog Section */
			add_settings_section( 'chip_life_section_blog', 'Blog Options', array( 'Chip_Life_Options', 'chip_life_section_blog_fn' ), 'chip_life_section_blog_page' );			
			
			add_settings_field( 'chip_life_field_header_style', 'Header Style', array( 'Chip_Life_Options', 'chip_life_field_header_style_fn' ), 'chip_life_section_blog_page', 'chip_life_section_blog' );						
			
			add_settings_field( 'chip_life_field_primary_menu', 'Display Primary Menu', array( 'Chip_Life_Options', 'chip_life_field_primary_menu_fn' ), 'chip_life_section_blog_page', 'chip_life_section_blog' );
			add_settings_field( 'chip_life_field_category_display', 'Display Category', array( 'Chip_Life_Options', 'chip_life_field_category_display_fn' ), 'chip_life_section_blog_page', 'chip_life_section_blog' );
			add_settings_field( 'chip_life_field_tags_display', 'Display Tags', array( 'Chip_Life_Options', 'chip_life_field_tags_display_fn' ), 'chip_life_section_blog_page', 'chip_life_section_blog' );
			
			add_settings_field( 'chip_life_field_dt', 'Select Date/Time Format', array( 'Chip_Life_Options', 'chip_life_field_dt_fn' ), 'chip_life_section_blog_page', 'chip_life_section_blog' );
			add_settings_field( 'chip_life_field_dt_format', 'Enter Custom Date/Time Format', array( 'Chip_Life_Options', 'chip_life_field_dt_format_fn' ), 'chip_life_section_blog_page', 'chip_life_section_blog' );
			
			/** Chip Post Section */
			add_settings_section( 'chip_life_section_post', 'Post Options', array( 'Chip_Life_Options', 'chip_life_section_post_fn' ), 'chip_life_section_post_page' );
			
			add_settings_field( 'chip_life_field_post_style', 'Post Style', array( 'Chip_Life_Options', 'chip_life_field_post_style_fn' ), 'chip_life_section_post_page', 'chip_life_section_post' );
			
			add_settings_field( 'chip_life_field_related_post', 'Use Related Posts at the Bottom of Post', array( 'Chip_Life_Options', 'chip_life_field_related_post_fn' ), 'chip_life_section_post_page', 'chip_life_section_post' );
			add_settings_field( 'chip_life_field_related_post_number', 'How many Related Posts to Execute', array( 'Chip_Life_Options', 'chip_life_field_related_post_number_fn' ), 'chip_life_section_post_page', 'chip_life_section_post' );
			
			/** Chip Layout Section */
			add_settings_section( 'chip_life_section_layout', 'Layout Options', array( 'Chip_Life_Options', 'chip_life_section_layout_fn' ), 'chip_life_section_layout_page' );			
			
			add_settings_field( 'chip_life_field_layout_style', 'Layout Style', array( 'Chip_Life_Options', 'chip_life_field_layout_style_fn' ), 'chip_life_section_layout_page', 'chip_life_section_layout' );
			add_settings_field( 'chip_life_field_featured_image', 'Featured Image', array( 'Chip_Life_Options', 'chip_life_field_featured_image_fn' ), 'chip_life_section_layout_page', 'chip_life_section_layout' );
			
			add_settings_field( 'chip_life_field_comments_posts', 'Enable Comments on Posts', array( 'Chip_Life_Options', 'chip_life_field_comments_posts_fn' ), 'chip_life_section_layout_page', 'chip_life_section_layout' );
			add_settings_field( 'chip_life_field_comments_pages', 'Enable Comments on Pages', array( 'Chip_Life_Options', 'chip_life_field_comments_pages_fn' ), 'chip_life_section_layout_page', 'chip_life_section_layout' );
			
			add_settings_field( 'chip_life_field_trackbacks_posts', 'Enable Trackbacks on Posts', array( 'Chip_Life_Options', 'chip_life_field_trackbacks_posts_fn' ), 'chip_life_section_layout_page', 'chip_life_section_layout' );
			add_settings_field( 'chip_life_field_trackbacks_pages', 'Enable Trackbacks on Pages', array( 'Chip_Life_Options', 'chip_life_field_trackbacks_pages_fn' ), 'chip_life_section_layout_page', 'chip_life_section_layout' );
			
			add_settings_field( 'chip_life_field_authorbox', 'Display Author Box', array( 'Chip_Life_Options', 'chip_life_field_authorbox_fn' ), 'chip_life_section_layout_page', 'chip_life_section_layout' );
			
			/** Chip General Section */
			add_settings_section( 'chip_life_section_general', 'General Options', array( 'Chip_Life_Options', 'chip_life_section_general_fn' ), 'chip_life_section_general_page' );
			
			add_settings_field( 'chip_life_field_analytic', 'Use Analytic', array( 'Chip_Life_Options', 'chip_life_field_analytic_fn' ), 'chip_life_section_general_page', 'chip_life_section_general' );
			add_settings_field( 'chip_life_field_analytic_code', 'Enter Analytic Code', array( 'Chip_Life_Options', 'chip_life_field_analytic_code_fn' ), 'chip_life_section_general_page', 'chip_life_section_general' );
			
			add_settings_field( 'chip_life_field_copyright', 'Enter Copyright Text', array( 'Chip_Life_Options', 'chip_life_field_copyright_fn' ), 'chip_life_section_general_page', 'chip_life_section_general' );
			
			add_settings_field('chip_life_field_reset', 'Reset Theme Options', array( 'Chip_Life_Options', 'chip_life_field_reset_fn' ), 'chip_life_section_general_page', 'chip_life_section_general');
		
		}
		
		/**
		* Chip Admin Menu
		*/
		
		function chip_life_admin_menu() {		
			$page = add_theme_page( 'Chip Life Theme Options', 'Chip Life Theme Options', 'edit_theme_options', 'chip-life-options', array( 'Chip_Life_Options', 'chip_life_setting_fn' ) );		
		}
		
		/**
		* Chip Admin Style
		*/
		
		function chip_life_admin_styles_fn() {
			
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'chip_life_script_jquery_cookie' );			
			
			wp_enqueue_style( 'chip_life_style_admin' );
			wp_enqueue_style( 'chip_life_style_uismoothness' );
		
		}
		
		/**
		* Chip Setting - Form
		*/
		
		function chip_life_setting_fn() {
			require( CHIP_LIFE_CHIP_DIR . '/admin/setting.php' );
		}
		
		/**
		* Chip Init Default
		*/
		
		function chip_life_init_default() {
		
			$chip_life_options = get_option('chip_life_options');
			
			if( ( $chip_life_options['chip_life_reset'] == 1 || !is_array( $chip_life_options ) ) ) {
				
				$default = array(
					
					'chip_life_header_style' => 'custom-header',
					
					'chip_life_primary_menu' => 1,
					'chip_life_category_display' => 1,
					'chip_life_tags_display' => 1,
					
					'chip_life_dt' => 'default',
					'chip_life_dt_format' => 'F j, Y g:i a',
					
					'chip_life_post_style' => 'content',
					
					'chip_life_related_post' => 0,
					'chip_life_related_post_number' => 3,
					
					'chip_life_layout_style' => 'content-sidebar',
					'chip_life_featured_image' => 'none',
					
					'chip_life_comments_posts' => 1,
					'chip_life_comments_pages' => 1,
					
					'chip_life_trackbacks_posts' => 1,
					'chip_life_trackbacks_pages' => 1,					
					
					'chip_life_authorbox' => 1,
					
					'chip_life_analytic' => 0,
					'chip_life_analytic_code' => 'Analytic Code',
					
					'chip_life_copyright' => '&copy; Copyright '. date('Y') .' - <a href="'. home_url( '/' ) .'">'. get_bloginfo( 'name' ) .'</a>',
					
					'chip_life_reset' => 0,
					
				);
				
				update_option( 'chip_life_options' , $default );
			
			}
		
		}
		
		/**
		 * Chip Life Pre-defined Range
		*/
		
		/* Boolean Yes | No */
		
		function chip_life_boolean_pd() {			
			$temp = array( 1 => 'yes', 0 => 'no' );		
			return $temp;
		}
		
		/* Valid Post Style Range */		
		
		function chip_life_post_style_pd() {			
			$temp = array( 'excerpt' => 'excerpt', 'content' => 'content' );			
			return $temp;			
		}
		
		/* Valid Header Styles */		
		
		function chip_life_header_style_pd() {			
			$temp = array( 'custom-header' => 'Custom Header', 'header-sidebars' => 'Header Sidebars' );			
			return $temp;			
		}
		
		/* Valid Related Post Range */		
		
		function chip_life_related_posts_pd() {			
			$temp = array( 3 => 3, 6 => 6, 9 => 9 );			
			return $temp;			
		}
		
		/* Valid Date/Time Format Range */		
		
		function chip_life_dt_pd() {			
			$temp = array( 'default' => 'default', 'custom' => 'custom', 'none' => 'none' );			
			return $temp;			
		}
		
		/* Valid Layout Styles */		
		
		function chip_life_layout_style_pd() {			
			$temp = array( 'content-sidebar' => 'Content Sidebar', 'sidebar-content' => 'Sidebar Content', 'content' => 'Content' );			
			return $temp;			
		}
		
		/* Valid Featured Image Sizes: Dynamic */		
		
		function chip_life_featured_image_pd() {			
			$temp = array( 'thumbnail' => 'Thumbnail' );			
			$temp = chip_life_get_image_sizes();
			return $temp;			
		}
		
		/**
		 * Chip Validation
		*/		
		
		function chip_life_validation_fn( $input ) {
			
			/* Validation: chip_life_header_style */
			$chip_life_header_style_pd = Chip_Life_Options::chip_life_header_style_pd();
			if ( ! array_key_exists( $input['chip_life_header_style'], $chip_life_header_style_pd ) ) {
				 $input['chip_life_header_style'] = "custom-header";
			}
			
			/* Validation: chip_life_primary_menu */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_primary_menu'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_primary_menu'] = 1;
			}
			
			/* Validation: chip_life_category_display */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_category_display'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_category_display'] = 1;
			}
			
			/* Validation: chip_life_tags_display */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_tags_display'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_tags_display'] = 1;
			}
			
			/* Validation: chip_life_dt */
			$chip_life_dt_pd = Chip_Life_Options::chip_life_dt_pd();
			if ( ! array_key_exists( $input['chip_life_dt'], $chip_life_dt_pd ) ) {
				 $input['chip_life_dt'] = 'default';
			}
			
			/* Validation: chip_life_dt_format */
			if( !empty( $input['chip_life_dt_format'] ) ) {
				$input['chip_life_dt_format'] = wp_kses( $input['chip_life_dt_format'], array() );
			}
			
			/* Validation: chip_life_post_style */
			$chip_life_post_style_pd = Chip_Life_Options::chip_life_post_style_pd();
			if ( ! array_key_exists( $input['chip_life_post_style'], $chip_life_post_style_pd ) ) {
				 $input['chip_life_post_style'] = "excerpt";
			}								
			
			/* Validation: chip_life_related_post */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_related_post'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_related_post'] = 0;
			}
			
			/* Validation: chip_life_related_post_number */
			$chip_life_related_posts_pd = Chip_Life_Options::chip_life_related_posts_pd();
			if ( ! array_key_exists( $input['chip_life_related_post_number'], $chip_life_related_posts_pd ) ) {
				 $input['chip_life_related_post_number'] = 3;
			}
			
			/* Validation: chip_life_layout_style */
			$chip_life_layout_style_pd = Chip_Life_Options::chip_life_layout_style_pd();
			if ( ! array_key_exists( $input['chip_life_layout_style'], $chip_life_layout_style_pd ) ) {
				 $input['chip_life_layout_style'] = 'content-sidebar';
			}
			
			/* Validation: chip_life_featured_image */
			$chip_life_featured_image_pd = Chip_Life_Options::chip_life_featured_image_pd();
			if ( ! array_key_exists( $input['chip_life_featured_image'], $chip_life_featured_image_pd ) ) {
				 $input['chip_life_featured_image'] = 'none';
			}
			
			/* Validation: chip_life_comments_posts */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_comments_posts'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_comments_posts'] = 1;
			}
			
			/* Validation: chip_life_comments_pages */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_comments_pages'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_comments_pages'] = 1;
			}
			
			/* Validation: chip_life_trackbacks_posts */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_trackbacks_posts'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_trackbacks_posts'] = 1;
			}
			
			/* Validation: chip_life_trackbacks_pages */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_trackbacks_pages'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_trackbacks_pages'] = 1;
			}			
			
			/* Validation: chip_life_authorbox */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_authorbox'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_authorbox'] = 1;
			}
			
			/* Validation: chip_life_analytic */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_analytic'], $chip_life_boolean_pd ) ) {
				 $input['chip_life_analytic'] = 0;
			}
			
			/* Validation: chip_life_analytic_code */
			if( !empty( $input['chip_life_analytic_code'] ) ) {
				$input['chip_life_analytic_code'] = esc_textarea ( $input['chip_life_analytic_code'] );
			}
			
			/* Validation: chip_life_copyright */
			if( !empty( $input['chip_life_copyright'] ) ) {
				$input['chip_life_copyright'] = esc_attr ( $input['chip_life_copyright'] );
			}
			
			/* Validation: chip_life_reset */
			$chip_life_boolean_pd = Chip_Life_Options::chip_life_boolean_pd();
			if ( ! array_key_exists( chip_life_undefined_index_fix ( $input['chip_life_reset'] ), $chip_life_boolean_pd ) ) {
				 $input['chip_life_reset'] = 0;
			}
			
			add_settings_error( 'chip_life_options', 'chip_life_options', 'Settings Saved.', 'updated' );
			
			return $input;
		
		}
		
		/**
		* Chip Blog Section
		*/		
		
		function chip_life_section_blog_fn() {
			echo "Chip Life Blog Options";
		}
		
		/* Blog Header Style */		
		function chip_life_field_header_style_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			$items = Chip_Life_Options::chip_life_header_style_pd();			
			
			foreach( $items as $key => $val ) {
				?>
				<label><input type="radio" id="chip_life_header_style[]" name="chip_life_options[chip_life_header_style]" value="<?php echo $key; ?>" <?php checked( $key, $chip_life_options['chip_life_header_style'] ); ?> /><?php echo $val; ?></label><br />
                <?php
			}
		
		}
		
		/* Chip Primary Menu */		
		function  chip_life_field_primary_menu_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_primary_menu" name="chip_life_options[chip_life_primary_menu]">';
			foreach( $items as $key => $val ) {
			?>
				<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_primary_menu'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to display primary menu which is located above the site header.</small></div>';
		
		}
		
		/* Chip Category Display */		
		function  chip_life_field_category_display_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_category_display" name="chip_life_options[chip_life_category_display]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_category_display'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to display Category at post detail.</small></div>';
		
		}
		
		/* Chip Tags Display */		
		function  chip_life_field_tags_display_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_tags_display" name="chip_life_options[chip_life_tags_display]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_tags_display'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to display Tags at post detail.</small></div>';
		
		}
		
		/* Chip Date/Time Format */		
		function  chip_life_field_dt_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_dt_pd();
			
			echo '<select id="chip_life_dt" name="chip_life_options[chip_life_dt]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_dt'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select Date/Time format for the blog.</small></div>';
			echo '<div><small>Default is the date/time format configured in your WordPress options.</small></div>';
		
		}
		
		function chip_life_field_dt_format_fn() {
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_dt_format" name="chip_life_options[chip_life_dt_format]" size="40" value="'. esc_attr ( $chip_life_options['chip_life_dt_format'] ).'" />';
			echo '<div>Enter custom Date/Time Format. You can use any desired combination of the following examples:</div>';
			echo '<div><strong>F j, Y g:i:s a</strong> - '.date('F j, Y g:i:s a').'</div>';
			echo '<div><strong>l, F jS, Y</strong> - '.date('l, F jS, Y').'</div>';
			echo '<div><strong>M j, Y @ G:i</strong> - '.date('M j, Y @ G:i').'</div>';
			echo '<div><strong>Y/m/d \a\t g:i A</strong> - '.date('Y/m/d \a\t g:i A').'</div>';
		}
		
		/**
		 * Chip Post Section
		 */		
		
		function chip_life_section_post_fn() {
			echo "Chip Life Post Options";
		}
		
		/* Blog Post Style */		
		function chip_life_field_post_style_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			$items = Chip_Life_Options::chip_life_post_style_pd();			
			
			foreach( $items as $key => $val ) {
			?>
            	<label><input type="radio" id="chip_life_post_style[]" name="chip_life_options[chip_life_post_style]" value="<?php echo $key; ?>" <?php checked( $key, $chip_life_options['chip_life_post_style'] ); ?> /><?php echo $val; ?></label><br />
            <?php
			}
		
		}
		
		/* Chip Related Posts */		
		function  chip_life_field_related_post_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_related_post" name="chip_life_options[chip_life_related_post]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_related_post'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to add the related posts at the bottom of post.</small></div>';
		
		}
		
		function  chip_life_field_related_post_number_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_related_posts_pd();
			
			echo '<select id="chip_life_related_post_number" name="chip_life_options[chip_life_related_post_number]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_related_post_number'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>How many related posts would you like to display?</small></div>';
		
		}
		
		/**
		 * Chip Layout Section
		 */		
		
		function chip_life_section_layout_fn() {
			echo "Chip Life Layout Options";
		}
		
		/* Chip Life Layout Style */		
		function  chip_life_field_layout_style_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_layout_style_pd();
			
			foreach( $items as $key => $val ) {				
				echo '<div class="chip-life-image-radio-option">';
			?>
            	<label><input type="radio" id="chip_life_layout_style[]" name="chip_life_options[chip_life_layout_style]" value="<?php echo $key; ?>" <?php checked( $key, $chip_life_options['chip_life_layout_style'] ); ?> />
            <?php
				echo '<span><img src="'.PARENT_URL.'/images/'.$key.'.png" width="136" height="122" alt="" /> '.$val.' </span>';
				echo '</label></div>';
			}
		
		}
		
		/** Chip Life Featured Image */		
		function  chip_life_field_featured_image_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_featured_image_pd();
			
			echo '<select id="chip_life_featured_image" name="chip_life_options[chip_life_featured_image]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_featured_image'] ); ?>><?php echo $key . ' - ' . $val['width'] . 'x' . $val['height']; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select featured image to display</small></div>';
		
		}
		
		/** Chip Life Comments on Posts */		
		function  chip_life_field_comments_posts_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_comments_posts" name="chip_life_options[chip_life_comments_posts]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_comments_posts'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to enable comments on posts.</small></div>';
		
		}
		
		/** Chip Life Comments on Pages */		
		function  chip_life_field_comments_pages_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_comments_pages" name="chip_life_options[chip_life_comments_pages]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_comments_pages'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to enable comments on pages.</small></div>';
		
		}
		
		/** Chip Life Trackbacks on Posts */		
		function  chip_life_field_trackbacks_posts_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_trackbacks_posts" name="chip_life_options[chip_life_trackbacks_posts]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_trackbacks_posts'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to enable trackbacks on posts.</small></div>';
		
		}
		
		/** Chip Life Trackbacks on Pages */		
		function  chip_life_field_trackbacks_pages_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_trackbacks_pages" name="chip_life_options[chip_life_trackbacks_pages]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_trackbacks_pages'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to enable trackbacks on pages.</small></div>';
		
		}
		
		/* Chip Author Box */		
		function  chip_life_field_authorbox_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_authorbox" name="chip_life_options[chip_life_authorbox]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_authorbox'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to display Author box.</small></div>';
		
		}		
		
		/**
		* Chip General Section
		*/		
		
		function chip_life_section_general_fn() {
			echo "Chip Life General Options";
		}
		
		/* Chip Analytic */		
		function  chip_life_field_analytic_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			echo '<select id="chip_life_analytic" name="chip_life_options[chip_life_analytic]">';
			foreach( $items as $key => $val ) {
			?>
            	<option value="<?php echo $key; ?>" <?php selected( $key, $chip_life_options['chip_life_analytic'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Analytic code.</small></div>';
		
		}
		
		function chip_life_field_analytic_code_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<textarea type="textarea" id="chip_life_analytic_code" name="chip_life_options[chip_life_analytic_code]" rows="7" cols="50">'. $chip_life_options['chip_life_analytic_code'] .'</textarea>';
			echo '<div><small>Enter the Analytic code</small></div>';
		
		}
		
		/* Copyright Text */		
		function chip_life_field_copyright_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_copyright" name="chip_life_options[chip_life_copyright]" size="40" value="'. $chip_life_options['chip_life_copyright'] .'" />';
			echo '<div><small>Enter Copyright Text.</small></div>';
			echo '<div><small>Example: <strong>&amp;copy; Copyright '.date('Y').' - &lt;a href="'. home_url( '/' ) .'"&gt;'. get_bloginfo('name') .'&lt;/a&gt;</strong></small></div>';
		
		}		
		
		/* Theme Reset */		
		function chip_life_field_reset_fn() {
			
			$chip_life_options = get_option('chip_life_options');			
			$items = Chip_Life_Options::chip_life_boolean_pd();
			
			$checked = ( $chip_life_options['chip_life_reset'] == 1 ) ? 'checked="checked"' : '';
			echo '<label><input type="checkbox" id="chip_life_reset" name="chip_life_options[chip_life_reset]" value="1" '.$checked.' /> Reset Theme Options</label>';
		}

}
?>