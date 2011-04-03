<?php
/*
|--------------------------
| Chip Life Options Class
|--------------------------
*/

class Chip_Life_Options {

		
		/*
		|--------------------------
		| Chip Admin Init
		|--------------------------
		*/
		
		function chip_admin_init() {
		
			/** Register Admin Stylesheet */
			wp_register_style( 'chip_life_stylesheet', CHIP_LIFE_OPTION_WSROOT . 'style.css' );
			
			/** Register Theme Options */
			register_setting( 'chip_life_options_group', 'chip_life_options', array( 'Chip_Life_Options', 'chip_validation_fn' ) );
			
			/** Chip Blog Section */
			add_settings_section( 'chip_life_section_blog', 'Blog Options', array( 'Chip_Life_Options', 'chip_life_section_blog_fn' ), 'chip_life_sections' );
			add_settings_field( 'chip_life_field_logo', 'Use Image Logo in Header', array( 'Chip_Life_Options', 'chip_life_field_logo_fn' ), 'chip_life_sections', 'chip_life_section_blog' );
			add_settings_field( 'chip_life_field_logo_url', 'Enter Logo URl - Dimension (215x125)', array( 'Chip_Life_Options', 'chip_life_field_logo_url_fn' ), 'chip_life_sections', 'chip_life_section_blog' );
			
			add_settings_field( 'chip_life_field_header_style', 'Header Style', array( 'Chip_Life_Options', 'chip_life_field_header_style_fn' ), 'chip_life_sections', 'chip_life_section_blog' );			
			add_settings_field( 'chip_life_field_post_style', 'Post Style', array( 'Chip_Life_Options', 'chip_life_field_post_style_fn' ), 'chip_life_sections', 'chip_life_section_blog' );
			
			/** Chip Post Section */
			add_settings_section( 'chip_life_section_post', 'Post Options', array( 'Chip_Life_Options', 'chip_life_section_post_fn' ), 'chip_life_sections' );
			add_settings_field( 'chip_life_field_related_post', 'Use Related Posts at the Bottom of Post', array( 'Chip_Life_Options', 'chip_life_field_related_post_fn' ), 'chip_life_sections', 'chip_life_section_post' );
			add_settings_field( 'chip_life_field_related_post_number', 'How many Related Posts to Execute', array( 'Chip_Life_Options', 'chip_life_field_related_post_number_fn' ), 'chip_life_sections', 'chip_life_section_post' );
			
			/** Chip Sponsor Section */
			add_settings_section( 'chip_life_section_sponsor', 'Sponsor Options', array( 'Chip_Life_Options', 'chip_life_section_sponsor_fn' ), 'chip_life_sections' );
			add_settings_field( 'chip_life_field_sponsor_header_728x90', 'Display 728x90 Sponsor in Header', array( 'Chip_Life_Options', 'chip_life_field_sponsor_header_728x90_fn' ), 'chip_life_sections', 'chip_life_section_sponsor' );
			add_settings_field( 'chip_life_field_sponsor_header_728x90_code', 'Enter Sponsor Code of Dimensions: 728x90', array( 'Chip_Life_Options', 'chip_life_field_sponsor_header_728x90_code_fn' ), 'chip_life_sections', 'chip_life_section_sponsor' );
			
			/** Chip Subscription Section */
			add_settings_section( 'chip_life_section_subscription', 'Subscription Options', array( 'Chip_Life_Options', 'chip_life_section_subscription_fn' ), 'chip_life_sections' );
			add_settings_field( 'chip_life_field_rss', 'Use RSS', array( 'Chip_Life_Options', 'chip_life_field_rss_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			add_settings_field( 'chip_life_field_rss_url', 'Enter RSS URL', array( 'Chip_Life_Options', 'chip_life_field_rss_url_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			add_settings_field( 'chip_life_field_feedburner', 'Use Feedburner', array( 'Chip_Life_Options', 'chip_life_field_feedburner_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			add_settings_field( 'chip_life_field_feedburner_id', 'Enter Feedburner ID', array( 'Chip_Life_Options', 'chip_life_field_feedburner_id_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			add_settings_field( 'chip_life_field_feedburner_post_bottom', 'Use Feedburner at Post bottom', array( 'Chip_Life_Options', 'chip_life_field_feedburner_post_bottom_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			add_settings_field( 'chip_life_field_twitter', 'Use Twitter', array( 'Chip_Life_Options', 'chip_life_field_twitter_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			add_settings_field( 'chip_life_field_twitter_url', 'Enter Twitter URL', array( 'Chip_Life_Options', 'chip_life_field_twitter_url_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			add_settings_field( 'chip_life_field_delicious', 'Use Delicious', array( 'Chip_Life_Options', 'chip_life_field_delicious_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			add_settings_field( 'chip_life_field_delicious_url', 'Enter Delicious URL', array( 'Chip_Life_Options', 'chip_life_field_delicious_url_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			add_settings_field( 'chip_life_field_facebook', 'Use Facebook', array( 'Chip_Life_Options', 'chip_life_field_facebook_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			add_settings_field( 'chip_life_field_facebook_url', 'Enter Facebook URL', array( 'Chip_Life_Options', 'chip_life_field_facebook_url_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			add_settings_field( 'chip_life_field_stumble', 'Use Stumbleupon', array( 'Chip_Life_Options', 'chip_life_field_stumble_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			add_settings_field( 'chip_life_field_stumble_url', 'Enter Stumbleupon URL', array( 'Chip_Life_Options', 'chip_life_field_stumble_url_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			add_settings_field( 'chip_life_field_digg', 'Use Digg', array( 'Chip_Life_Options', 'chip_life_field_digg_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			add_settings_field( 'chip_life_field_digg_url', 'Enter Digg URL', array( 'Chip_Life_Options', 'chip_life_field_digg_url_fn' ), 'chip_life_sections', 'chip_life_section_subscription' );
			
			
			/** Chip General Section */
			add_settings_section( 'chip_life_section_general', 'General Options', array( 'Chip_Life_Options', 'chip_life_section_general_fn' ), 'chip_life_sections' );
			add_settings_field( 'chip_life_field_analytic', 'Use Analytic', array( 'Chip_Life_Options', 'chip_life_field_analytic_fn' ), 'chip_life_sections', 'chip_life_section_general' );
			add_settings_field( 'chip_life_field_analytic_code', 'Enter Analytic Code', array( 'Chip_Life_Options', 'chip_life_field_analytic_code_fn' ), 'chip_life_sections', 'chip_life_section_general' );
			
			add_settings_field('chip_life_field_reset', 'Reset Theme Options', array( 'Chip_Life_Options', 'chip_life_field_reset_fn' ), 'chip_life_sections', 'chip_life_section_general');
		
		}
		
		/*
		|--------------------------
		| Chip Admin Menu
		|--------------------------
		*/
		
		function chip_admin_menu() {
		
			$page = add_theme_page( 'Chip Life Theme Options', 'Chip Life Theme Options', 'edit_theme_options', 'theme_options', array( 'Chip_Life_Options', 'chip_setting_fn' ) );
			/* Using registered $page handle to hook stylesheet loading */
			add_action( 'admin_print_styles-' . $page, array( 'Chip_Life_Options', 'chip_admin_styles_fn' ) );
		
		}
		
		/**
		* Chip Init Default
		*/
		
		function chip_init_default() {
		
			$chip_life_options = get_option('chip_life_options');
			
			//if(($tmp['chkbox1']=='on')||(!is_array($tmp))) {
			if( ( $chip_life_options['chip_life_reset'] == 1 || !is_array( $chip_life_options ) ) ) {
				
				$default = array(
					'chip_life_logo'						=>	0,
					'chip_life_logo_url'					=>	CHIP_LIFE_IMAGES_WSROOT.'logo.gif',
					
					'chip_life_post_style'					=>	'excerpt',					
					'chip_life_header_style'				=>	'header',
					
					'chip_life_related_post'				=>	0,
					'chip_life_related_post_number'			=>	5,
					
					'chip_life_sponsor_header_728x90'		=>	0,
					'chip_life_sponsor_header_728x90_code'	=>	'Sponsor Code 728x90',
					
					'chip_life_rss'							=>	0,
					'chip_life_rss_url'						=>	CHIP_LIFE_HOME.'feed/',
					
					'chip_life_feedburner'					=>	0,
					'chip_life_feedburner_id'				=>	'tutorialchip',
					
					'chip_life_feedburner_post_bottom'		=>	0,
					
					'chip_life_twitter'						=>	0,
					'chip_life_twitter_url'					=>	'http://twitter.com/lifeobject1',
					
					'chip_life_delicious'					=>	0,
					'chip_life_delicious_url'				=>	'http://www.delicious.com/life.object',
					
					'chip_life_facebook'					=>	0,
					'chip_life_facebook_url'				=>	'http://www.facebook.com/profile.php?id=100001747038774',
					
					'chip_life_stumble'						=>	0,
					'chip_life_stumble_url'					=>	'http://www.stumbleupon.com/stumbler/lifeobject',
					
					'chip_life_digg'						=>	0,
					'chip_life_digg_url'					=>	'http://digg.com/lifeobject',
					
					'chip_life_analytic'					=>	0,
					'chip_life_analytic_code'				=>	'Analytic Code',
					
					'chip_life_reset'						=>	0,
					
				);
				
				update_option( 'chip_life_options' , $default );
			
			}
		
		}
		
		/*
		|--------------------------
		| Chip Admin Style
		|--------------------------
		*/
		
		function chip_admin_styles_fn() {
			wp_enqueue_style( 'chip_life_stylesheet' );
		}
		
		/*
		|--------------------------
		| Chip Setting - Form
		|--------------------------
		*/
		
		function chip_setting_fn() {
			locate_template( array( CHIP_LIFE_OPTION_FSROOT . 'setting.php' ), true, false );
		}
		
		/*
		|--------------------------
		| Chip Life Pre-defined Range
		|--------------------------
		*/
		
		/* Boolean Yes | No */
		
		function chip_boolean_pd() {			
			$temp = array( 1 => 'yes', 0 => 'no' );		
			return $temp;
		}
		
		/* Valid Home Page Post Range */		
		
		function chip_post_style_pd() {			
			$temp = array( 'excerpt' => 'excerpt', 'content' => 'content' );			
			return $temp;			
		}
		
		/* Valid Header Styles */		
		
		function chip_header_style_pd() {			
			$temp = array( 'header' => 'header', 'logo' => 'logo' );			
			return $temp;			
		}
		
		/* Valid Related Post Range */		
		
		function chip_related_posts_pd() {			
			$temp = array( 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10 );			
			return $temp;			
		}
		
		/*
		|--------------------------
		| Chip Validation
		|--------------------------
		*/		
		
		function chip_validation_fn( $input ) {
			
			/* Validation: chip_life_logo */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_logo'], $chip_boolean_pd ) ) {
				 $input['chip_life_logo'] = 0;
			}
			
			/* Validation: chip_life_logo_url */
			if( !empty( $input['chip_life_logo_url'] ) ) {
				$input['chip_life_logo_url'] = esc_url( $input['chip_life_logo_url'] );
			}
			
			/* Validation: chip_life_post_style */
			$chip_post_style_pd = Chip_Life_Options::chip_post_style_pd();
			if ( ! array_key_exists( $input['chip_life_post_style'], $chip_post_style_pd ) ) {
				 $input['chip_life_post_style'] = "excerpt";
			}
			
			/* Validation: chip_life_header_style */
			$chip_header_style_pd = Chip_Life_Options::chip_header_style_pd();
			if ( ! array_key_exists( $input['chip_life_header_style'], $chip_header_style_pd ) ) {
				 $input['chip_life_header_style'] = "header";
			}
			
			/* Validation: chip_life_related_post */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_related_post'], $chip_boolean_pd ) ) {
				 $input['chip_life_related_post'] = "no";
			}
			
			/* Validation: chip_life_related_post_number */
			$chip_related_posts_pd = Chip_Life_Options::chip_related_posts_pd();
			if ( ! array_key_exists( $input['chip_life_related_post_number'], $chip_related_posts_pd ) ) {
				 $input['chip_life_related_post_number'] = 5;
			}
			
			/* Validation: chip_life_sponsor_header_728x90 */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_sponsor_header_728x90'], $chip_boolean_pd ) ) {
				 $input['chip_life_sponsor_header_728x90'] = "no";
			}
			
			/* Validation: chip_life_sponsor_header_728x90_code */
			if( !empty( $input['chip_life_sponsor_header_728x90_code'] ) ) {
				$input['chip_life_sponsor_header_728x90_code'] = htmlspecialchars ( $input['chip_life_sponsor_header_728x90_code'] );
			}
			
			/* Validation: chip_life_rss */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_rss'], $chip_boolean_pd ) ) {
				 $input['chip_life_rss'] = "no";
			}
			
			/* Validation: chip_life_rss_url */
			if( !empty( $input['chip_life_rss_url'] ) ) {
				$input['chip_life_rss_url'] = esc_url( $input['chip_life_rss_url'] );
			}
			
			/* Validation: chip_life_feedburner */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_feedburner'], $chip_boolean_pd ) ) {
				 $input['chip_life_rss'] = "no";
			}
			
			/* Validation: chip_life_feedburner_id */
			if( !empty( $input['chip_life_feedburner_id'] ) ) {
				$input['chip_life_feedburner_id'] = wp_kses( $input['chip_life_feedburner_id'], array() );
			}
			
			/* Validation: chip_life_feedburner_post_bottom */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_feedburner_post_bottom'], $chip_boolean_pd ) ) {
				 $input['chip_life_rss'] = "no";
			}
			
			/* Validation: chip_life_twitter */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_twitter'], $chip_boolean_pd ) ) {
				 $input['chip_life_twitter'] = "no";
			}
			
			/* Validation: chip_life_twitter_url */
			if( !empty( $input['chip_life_twitter_url'] ) ) {
				$input['chip_life_twitter_url'] = esc_url( $input['chip_life_twitter_url'] );
			}
			
			/* Validation: chip_life_delicious */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_delicious'], $chip_boolean_pd ) ) {
				 $input['chip_life_delicious'] = "no";
			}
			
			/* Validation: chip_life_delicious_url */
			if( !empty( $input['chip_life_delicious_url'] ) ) {
				$input['chip_life_delicious_url'] = esc_url( $input['chip_life_delicious_url'] );
			}
			
			/* Validation: chip_life_facebook */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_facebook'], $chip_boolean_pd ) ) {
				 $input['chip_life_facebook'] = "no";
			}
			
			/* Validation: chip_life_facebook_url */
			if( !empty( $input['chip_life_facebook_url'] ) ) {
				$input['chip_life_facebook_url'] = esc_url( $input['chip_life_facebook_url'] );
			}
			
			/* Validation: chip_life_stumble */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_stumble'], $chip_boolean_pd ) ) {
				 $input['chip_life_stumble'] = "no";
			}
			
			/* Validation: chip_life_stumble_url */
			if( !empty( $input['chip_life_stumble_url'] ) ) {
				$input['chip_life_stumble_url'] = esc_url( $input['chip_life_stumble_url'] );
			}
			
			/* Validation: chip_life_digg */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_digg'], $chip_boolean_pd ) ) {
				 $input['chip_life_digg'] = "no";
			}
			
			/* Validation: chip_life_digg_url */
			if( !empty( $input['chip_life_digg_url'] ) ) {
				$input['chip_life_digg_url'] = esc_url( $input['chip_life_digg_url'] );
			}
			
			/* Validation: chip_life_analytic */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( $input['chip_life_analytic'], $chip_boolean_pd ) ) {
				 $input['chip_life_analytic'] = "no";
			}
			
			/* Validation: chip_life_analytic_code */
			if( !empty( $input['chip_life_analytic_code'] ) ) {
				$input['chip_life_analytic_code'] = htmlspecialchars ( $input['chip_life_analytic_code'], ENT_NOQUOTES );
			}
			
			/* Validation: chip_life_reset */
			$chip_boolean_pd = Chip_Life_Options::chip_boolean_pd();
			if ( ! array_key_exists( undefined_index_fix ( $input['chip_life_reset'] ), $chip_boolean_pd ) ) {
				 $input['chip_life_reset'] = 0;
			}
			
			return $input;
		
		}
		
		/*
		|--------------------------
		| Chip Blog Section
		|--------------------------
		*/		
		
		function chip_life_section_blog_fn() {
			echo "These options will help you to customize Chip Life theme.";
		}
		
		/* Chip Logo */
		
		function  chip_life_field_logo_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_logo" name="chip_life_options[chip_life_logo]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_logo'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add the image logo in the site header. Enter your logo URl below.</small></div>';
		
		}
		
		function chip_life_field_logo_url_fn() {
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_logo_url" name="chip_life_options[chip_life_logo_url]" size="40" value="'.$chip_life_options['chip_life_logo_url'].'" />';
			echo '<div>Enter the logo URl</div>';
		}
		
		/* Blog Post Style */
		
		function chip_life_field_post_style_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			$items = Chip_Life_Options::chip_post_style_pd();			
			
			foreach( $items as $key => $val ) {
				$checked = ( $chip_life_options['chip_life_post_style'] == $key ) ? ' checked="checked" ' : '';
				echo '<label><input type="radio" id="chip_life_post_style[]" name="chip_life_options[chip_life_post_style]" value="'.$key.'" '.$checked.' /> '.$val.'</label><br />';
			}
		
		}
		
		/* Blog Header Style */
		
		function chip_life_field_header_style_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			$items = Chip_Life_Options::chip_header_style_pd();			
			
			foreach( $items as $key => $val ) {
				$checked = ( $chip_life_options['chip_life_header_style'] == $key ) ? ' checked="checked" ' : '';
				echo '<label><input type="radio" id="chip_life_header_style[]" name="chip_life_options[chip_life_header_style]" value="'.$key.'" '.$checked.' /> '.$val.'</label><br />';
			}
		
		}	
		
		/*
		|--------------------------
		| Chip Post Section
		|--------------------------
		*/		
		
		function chip_life_section_post_fn() {
			echo "These options will help you to customize options about post.";
		}
		
		/* Chip Related Posts */
		
		function  chip_life_field_related_post_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_related_post" name="chip_life_options[chip_life_related_post]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_related_post'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add the related posts at the bottom of post.</small></div>';
		
		}
		
		function  chip_life_field_related_post_number_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_related_posts_pd();
			
			echo '<select id="chip_life_related_post_number" name="chip_life_options[chip_life_related_post_number]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_related_post_number'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>How many related posts would you like to display?</small></div>';
		
		}
		
		/*
		|--------------------------
		| Chip Sponsor Section
		|--------------------------
		*/		
		
		function chip_life_section_sponsor_fn() {
			echo "These options will help you to integrate Sponsor ads.";
		}
		
		/* Sponsor Header: 728x90 */
		
		function  chip_life_field_sponsor_header_728x90_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_sponsor_header_728x90" name="chip_life_options[chip_life_sponsor_header_728x90]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_sponsor_header_728x90'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add 728x90 sponsor ad in your blog header.</small></div>';
		
		}
		
		function chip_life_field_sponsor_header_728x90_code_fn() {
			$chip_life_options = get_option('chip_life_options');
			echo '<textarea type="textarea" id="chip_life_sponsor_header_728x90_code" name="chip_life_options[chip_life_sponsor_header_728x90_code]" rows="7" cols="50">'.$chip_life_options['chip_life_sponsor_header_728x90_code'].'</textarea>';
			echo '<div>Enter the Sponsor ad code: 728x90</div>';
		}
		
		/**
		* Chip Subscription Section
		*/
		
		function chip_life_section_subscription_fn() {
			echo "These options will help you to customize Subscription options.";
		}
		
		/** Chip RSS */
		
		function  chip_life_field_rss_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_rss" name="chip_life_options[chip_life_rss]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_rss'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>RSS (most commonly expanded as "Really Simple Syndication") is a family of web feed formats used to publish frequently updated work. Select yes to add your RSS URL.</small></div>';
		
		}
		
		function chip_life_field_rss_url_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_rss_url" name="chip_life_options[chip_life_rss_url]" size="40" value="'.$chip_life_options['chip_life_rss_url'].'" />';
			echo '<div>Enter the RSS URL. For Example: <strong>http://www.tutorialchip.com/feed/</strong></div>';
		
		}
		
		/** Chip Feedburner */
		
		function  chip_life_field_feedburner_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_feedburner" name="chip_life_options[chip_life_feedburner]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_feedburner'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Feedburner ID.</small></div>';
		
		}
		
		function chip_life_field_feedburner_id_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_feedburner_id" name="chip_life_options[chip_life_feedburner_id]" size="40" value="'.$chip_life_options['chip_life_feedburner_id'].'" />';
			echo '<div>Enter the Feedburner ID. For Example: <strong>tutorialchip</strong></div>';
		
		}
		
		function  chip_life_field_feedburner_post_bottom_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_feedburner_post_bottom" name="chip_life_options[chip_life_feedburner_post_bottom]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_feedburner_post_bottom'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Feedburner Form at the bottom of Post.</small></div>';
		
		}
		
		/** Chip Twitter */
		
		function  chip_life_field_twitter_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_twitter" name="chip_life_options[chip_life_twitter]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_twitter'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Twitter URL.</small></div>';
		
		}
		
		function chip_life_field_twitter_url_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_twitter_url" name="chip_life_options[chip_life_twitter_url]" size="40" value="'.$chip_life_options['chip_life_twitter_url'].'" />';
			echo '<div>Enter the Twitter URL. For Example: <strong>http://twitter.com/lifeobject1</strong></div>';
		
		}
		
		/** Chip Delicious */
		
		function  chip_life_field_delicious_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_delicious" name="chip_life_options[chip_life_delicious]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_delicious'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Delicious URL.</small></div>';
		
		}
		
		function chip_life_field_delicious_url_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_delicious_url" name="chip_life_options[chip_life_delicious_url]" size="40" value="'.$chip_life_options['chip_life_delicious_url'].'" />';
			echo '<div>Enter the Delicious URL. For Example: <strong>http://www.delicious.com/life.object</strong></div>';
		
		}
		
		/** Chip Facebook */
		
		function  chip_life_field_facebook_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_facebook" name="chip_life_options[chip_life_facebook]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_facebook'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Facebook URL.</small></div>';
		
		}
		
		function chip_life_field_facebook_url_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_facebook_url" name="chip_life_options[chip_life_facebook_url]" size="40" value="'.$chip_life_options['chip_life_facebook_url'].'" />';
			echo '<div>Enter the Facebook URL. For Example: <strong>http://www.facebook.com/profile.php?id=100001747038774</strong></div>';
		
		}
		
		/** Chip Stumble */
		
		function  chip_life_field_stumble_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_stumble" name="chip_life_options[chip_life_stumble]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_stumble'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Stumbleupon URL.</small></div>';
		
		}
		
		function chip_life_field_stumble_url_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_stumble_url" name="chip_life_options[chip_life_stumble_url]" size="40" value="'.$chip_life_options['chip_life_stumble_url'].'" />';
			echo '<div>Enter the Stumbleupon URL. For Example: <strong>http://www.stumbleupon.com/stumbler/lifeobject</strong></div>';
		
		}
		
		/** Chip Digg */
		
		function  chip_life_field_digg_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_digg" name="chip_life_options[chip_life_digg]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_digg'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Digg URL.</small></div>';
		
		}
		
		function chip_life_field_digg_url_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<input type="text" id="chip_life_digg_url" name="chip_life_options[chip_life_digg_url]" size="40" value="'.$chip_life_options['chip_life_digg_url'].'" />';
			echo '<div>Enter the Digg URL. For Example: <strong>http://digg.com/lifeobject</strong></div>';
		
		}
		
		/**
		* Chip General Section
		*/		
		
		function chip_life_section_general_fn() {
			echo "These options will help you to customize General options.";
		}
		
		/* Chip Analytic */
		
		function  chip_life_field_analytic_fn() {
			
			$chip_life_options = get_option( 'chip_life_options' );
			$items = Chip_Life_Options::chip_boolean_pd();
			
			echo '<select id="chip_life_analytic" name="chip_life_options[chip_life_analytic]">';
			foreach( $items as $key => $val ) {
				$selected = ( $chip_life_options['chip_life_analytic'] == $key ) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			}
			echo '</select>';
			echo '<div><small>Select yes to add your Analytic code.</small></div>';
		
		}
		
		function chip_life_field_analytic_code_fn() {
			
			$chip_life_options = get_option('chip_life_options');
			echo '<textarea type="textarea" id="chip_life_analytic_code" name="chip_life_options[chip_life_analytic_code]" rows="7" cols="50">'.$chip_life_options['chip_life_analytic_code'].'</textarea>';
			echo '<div>Enter the Analytic code</div>';
		
		}
		
		/* Theme Reset */
		
		function chip_life_field_reset_fn() {
			
			$chip_life_options = get_option('chip_life_options');			
			$items = Chip_Life_Options::chip_boolean_pd();
			
			$checked = ( $chip_life_options['chip_life_reset'] == 1 ) ? 'checked="checked"' : '';
			echo '<label><input type="checkbox" id="chip_life_reset" name="chip_life_options[chip_life_reset]" value="1" '.$checked.' /> Reset Theme Options</label>';
		}
		
		

}
?>