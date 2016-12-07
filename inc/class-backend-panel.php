<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	class Asterion_Backend_panel {

		var $sub_section = array(
			'getting_started', 
			'changelog',
			'demo_content'
		);
		var $options = array();


	    public function __construct() {
	    	add_action('admin_menu', array( $this, 'panel_section' ));

	    	if( isset( $_GET['page'] ) && $_GET['page'] == "asterion-panel" ) {
				//load all backend scripts
				add_action( 'admin_enqueue_scripts',  array( $this, 'enqueue_scripts' ) );	
	    	}

			add_action('wp_ajax_asterion_import_front_page',  array( $this, 'import_front_page' ));
			add_action('wp_ajax_asterion_import_widgets',  array( $this, 'import_widgets' ));
			add_action('wp_ajax_asterion_reset_settings',  array( $this, 'reset_settings' ));

	    }


		/**
		* Load all neede theme backend css and js codes
		*/
		public function enqueue_scripts() {

			// orange themes panel
			wp_enqueue_style( 'asterion-orange-panel', get_template_directory_uri() . '/css/admin/orange-panel.css' );
			wp_enqueue_script("jquery-ui-tabs");
			wp_enqueue_script( 'asterion-orange-panel', get_template_directory_uri() . '/js/admin/backend.js' );


			wp_localize_script( 'asterion-orange-panel', 'asterion', array(
				'admin_url' => admin_url( 'admin-ajax.php' ),
				'security' => wp_create_nonce( 'asterion-action')
			) );
		}


		/**
		* Import theme demo dront page
		*/
		public function import_front_page() {

			if ( isset($_REQUEST) && isset($_REQUEST['nonce']) && get_theme_mod('asterion_front_page_imported') != "1" && get_option( 'show_on_front' ) == "page" ) {
				check_ajax_referer( 'asterion-action', 'nonce' );


				$header_image_data = array(
		            "url" => "http://www.orange-themes.net/demo/asterion/wp-content/uploads/2016/11/cropped-asterion.jpg",
		            "thumbnail_url" => "http://www.orange-themes.net/demo/asterion/wp-content/uploads/2016/11/cropped-asterion.jpg",
		            "height" => "532",
		            "width" => "1920",
		        );
							

				$header_image_data_objext = (object) array_map(__FUNCTION__, $header_image_data);

				$demo_settings = array (
				    "asterion_features_bg_color" => "#f7f7f7",
				    "asterion_features_text_color" => "0",
				    "asterion_team_bg_color" => "#f2f1f7",
				    "asterion_intro_image" => "http://www.orange-themes.net/demo/asterion/wp-content/uploads/2016/11/asterion2.jpg",
				    "asterion_intro_image_overlay" => "0",
				    "asterion_intro_image_parallax" => "1",
				    "asterion_about_show" => "1",
				    "asterion_header_title_2" => "Your Favorite Source of Free WordPress Themes",
				    "asterion_contact_bg_color" => "#ffffff",
				    "asterion_counters_bg_image" => "http://www.orange-themes.net/demo/asterion/wp-content/uploads/2016/11/levitation-1374181_1920.jpg",
				    "asterion_features_title" => "We Offer",
				    "asterion_portfolio_count" => "9",
				    "asterion_testimonials_bg_color" => "#f2f1f7",
				    "asterion_portfolio_bg_color" => "#ffffff",
				    "asterion_menu_style" => "1",
				    "asterion_contact_text_color" => "0",
				    "asterion_counters_image_overlay" => "0",
				    "asterion_counters_text_color" => "0",
				    "asterion_testimonials_show" => "1",
				    "asterion_section_order_1" => "1",
				    "asterion_section_order_2" => "2",
				    "asterion_section_order_3" => "3",
				    "asterion_section_order_4" => "4",
				    "asterion_section_order_5" => "5",
				    "asterion_section_order_6" => "6",
				    "asterion_section_order_7" => "7",
				    "asterion_about_title" => "Our Agency",
				    "asterion_about_text" => "A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Orange Themes Agency is one of the best in town see more you will be amazed.",
				    "header_image" => "http://www.orange-themes.net/demo/asterion/wp-content/uploads/2016/11/cropped-asterion.jpg",
				    "header_image_data" => $header_image_data_objext,
				    "asterion_about_facebook" => "#",
				    "asterion_about_twitter" => "#",
				    "asterion_about_linkedin" => "#",
				    "asterion_portfolio_image_hover_effect" => "apollo",
				    "asterion_portfolio_title" => "Portfolio",
				    "asterion_copyright" => "© Copyright 2016. All Rights Reserved.",
				    "asterion_accent_color" => "#00afa4",
				    "asterion_hover_color" => "#fbcc3f",
				    "asterion_header_title_1" => "Welcome To Orange Themes!",
				    "asterion_header_button_title" => "Tell me more",
				    "asterion_header_button_url" => "#",
				    "asterion_header_button_target" => "1",
				    "asterion_single_post_image" => "1",
				    "asterion_single_post_date" => "1",
				    "asterion_single_post_author" => "1",
				    "asterion_single_post_tags" => "1",
				    "asterion_single_post_cat" => "1",
				    "asterion_blog_post_image" => "1",
				    "asterion_blog_post_date" => "1",
				    "asterion_blog_post_comment" => "1",
				    "asterion_blog_post_cat" => "1",
				    "asterion_features_show" => "1",
				    "asterion_features_text" => "A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Orange Themes Agency is one of the best in town see more you will be amazed.",
				    "asterion_portfolio_show" => "1",
				    "asterion_portfolio_text" => "Our portfolio is the best way to show our work, you can see here a big range of our work. Check them all and you will find what you are looking for.",
				    "asterion_portfolio_image_overlay_color" => "#1a1a1a",
				    "asterion_portfolio_text_color" => "0",
				    "asterion_about_bg_color" => "#ffffff",
				    "asterion_about_text_color" => "0",
				    "asterion_counters_show" => "1",
				    "asterion_counters_title_1" => "Awards",
				    "asterion_counters_count_1" => "16",
				    "asterion_counters_title_2" => "Clients",
				    "asterion_counters_count_2" => "453",
				    "asterion_counters_title_3" => "Team",
				    "asterion_counters_count_3" => "7",
				    "asterion_counters_title_4" => "Projects",
				    "asterion_counters_count_4" => "24",
				    "asterion_counters_bg_type" => "1",
				    "asterion_counters_image_parallax" => "1",
				    "asterion_counters_bg_color" => "#ffffff",
				    "asterion_latest_posts_show" => "1",
				    "asterion_latest_posts_title" => "Latest Posts",
				    "asterion_latest_posts_text" => "All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.",
				    "asterion_latest_posts_count" => "3",
				    "asterion_latest_posts_offset" => "0",
				    "asterion_latest_posts_images" => "1",
				    "asterion_latest_posts_bg_color" => "#ffffff",
				    "asterion_latest_posts_text_color" => "0",
				    "asterion_testimonials_title" => "Testimonials",
				    "asterion_testimonials_text" => "Mida sit una namet, cons uectetur adipiscing adon elit.",
				    "asterion_testimonials_count" => "3",
				    "asterion_testimonials_text_color" => "0",
				    "asterion_team_show" => "1",
				    "asterion_team_title" => "Team",
				    "asterion_team_text" => "All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.",
				    "asterion_team_text_color" => "0",
				    "asterion_contact_title" => "Contact Us",
				    "asterion_contact_text" => "If you have some Questions or need Help! Please Contact Us! We make Cool and Clean Design for your Business",
				    "asterion_contact_address_title" => "Our Business Office",
				    "asterion_contact_address" => "34522 Street, Barcelona 442 
				Spain, New Building North, 25th Floor",
				    "asterion_contact_info_title" => "Contacts",
				    "asterion_contact_info_phone" => "+101 377 655 22127",
				    "asterion_contact_info_email" => "mail@yourcompany.com"
				);

		        $theme_slug = get_option( 'stylesheet' );
				update_option( "theme_mods_$theme_slug", $demo_settings );

				set_theme_mod( 'asterion_front_page_imported', 1 );

				echo "ok";

			} else {
				if ( !isset($_REQUEST['nonce']) ) {
					esc_html_e('Cheating?', 'asterion');
				} else if( get_theme_mod('asterion_front_page_imported') == "1" ) {
					esc_html_e('You have already imported the front page content!', 'asterion');
				} else if( get_option( 'show_on_front' ) != "page" ) {
					echo sprintf( esc_html__( 'Set up front page in', 'asterion' ).' %s'.esc_html__( 'Settings', 'asterion' ).'%s -> %s'.esc_html__( 'Reading', 'asterion' ).'%s -> '.esc_html__( 'Front page displays', 'asterion' ), '<a href="'.esc_url(admin_url( '/customize.php' )).'">', '</a>', '<a href="'.esc_url(admin_url( '/options-reading.php' )).'">', '</a>' ); 
				}

			}

			wp_die();
		}

		/**
		* Reset theme settings
		*/
		public function reset_settings() {

			if ( isset($_REQUEST) && isset($_REQUEST['nonce']) ) {
				check_ajax_referer( 'asterion-action', 'nonce' );


		        $theme_slug = get_option( 'stylesheet' );
				update_option( "theme_mods_$theme_slug", array() );

				add_theme_support( 'custom-header', array(
					'default-image'  => esc_url( get_template_directory_uri() . '/images/bg.jpg' ),
					'width'          => 1920,
					'height'         => 532,
					'flex-height'    => true,
					'random-default' => false,
					'header-text'    => false,
				) );

			}

			wp_die();
		}


		/**
		 * Import widgets
		 *
		 * @param string $content       JSON encoded widgets data.
		 *
		 * @return bool
		 */

		public static function import_widgets() {
			$content = '{"sidebar-features":{"ot_widgets_features-2":{"icon":"fa-briefcase","text":"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis","title":"WEB DEVELOPMENT","color":"#6669c1"},"ot_widgets_features-3":{"icon":"fa-picture-o","text":"Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe","title":"VISUALISATION","color":"#924d8a"},"ot_widgets_features-4":{"icon":"fa-cube","text":"Itaque earum rerum hic tenetur a sapiente, ut aut reiciendis maiores","title":"UI\/UX DESIGN","color":"#317d94"},"ot_widgets_features-5":{"icon":"fa-camera-retro","text":"Accusamus et iusto odio dignissimos ducimus qui blanditiis","title":"PHOTOGRAPHY","color":"#666671"}},"sidebar-team":{"ot_widgets_team-2":{"image":"http:\/\/www.orange-themes.net\/demo\/asterion\/wp-content\/uploads\/2016\/11\/author-2.jpg","text":"Mida sit una namet, cons uectetur adipiscing adon elit. Aliquam vitae barasa droma.","title":"TOM BEKERS","subtitle":"CEO & WEB DESIGN"},"ot_widgets_team-3":{"image":"http:\/\/www.orange-themes.net\/demo\/asterion\/wp-content\/uploads\/2016\/11\/author-6.jpg","text":"Worsa dona namet, cons uectetur dipiscing adon elit. Aliquam vitae fringilla unda mir.","title":"LINA GOSATA","subtitle":"PHOTOGRAPHY"},"ot_widgets_team-4":{"image":"http:\/\/www.orange-themes.net\/demo\/asterion\/wp-content\/uploads\/2016\/11\/author-4.jpg","text":"Dolor sit don namet, cons uectetur beriscing adon elit. Aliquam vitae fringilla unda.","title":"JOHN BEKERS","subtitle":"MARKETING"}},"sidebar-1":{"search-2":{"title":""},"recent-posts-2":{"title":"","number":5},"recent-comments-2":{"title":"","number":5},"archives-2":{"title":"","count":0,"dropdown":0},"categories-2":{"title":"Categories","count":0,"hierarchical":0,"dropdown":1},"meta-2":{"title":""}},"blog-sidebar":{"search-3":{"title":""},"ot_widgets_about_author-2":{"title":"About Blog Author","image":"http:\/\/www.orange-themes.net\/demo\/asterion\/wp-content\/uploads\/2016\/11\/author-4.jpg","text":"Hi! My name is Christina Mooz, creator of this website. I\u2019ve been traveling the world since 2006 and created this website to help others travel more while spending less. Growing up in New York, I was never a big traveler...","name":"Christina Orange","subtitle":"Traveler","read_more_url":"#"},"ot_widgets_social-2":{"title":"Follow Me","twitter":"http:\/\/www.twitter.com\/orangethemes","facebook":"http:\/\/www.facebook.com\/orangethemes","google":"http:\/\/www.orange-themes.com","pinterest":"http:\/\/www.orange-themes.com","tumblr":"http:\/\/www.orange-themes.com","instagram":"http:\/\/www.orange-themes.com"},"ot_widgets_latest_posts-2":{"title":"Latests News","cat":null,"tag":null,"count":"5","images":"show","offset":"0"},"tag_cloud-2":{"title":"Tags","taxonomy":"post_tag"},"facebook-likebox-2":{"title":"Facebook","like_args":{"href":"https:\/\/www.facebook.com\/orangethemes\/","width":300,"height":430,"show_faces":true,"stream":false,"cover":true}}}}';
			$widgets = json_decode( $content, true );

			if ( $widgets && is_array( $widgets ) ) {
				$sidebars_array      	= get_option( 'sidebars_widgets' );
	
				foreach ( $widgets as $sidebar_id => $sidebar_widgets ) {
					foreach ( $sidebar_widgets as $widget_id => $widget_data ) {

						// $widget_id eg. "recent-comments-4".
						$name_parts   = explode( '-', $widget_id );     // $name_parts is an array with keys: recent, comments, 4
						$widget_index = array_pop( $name_parts );       // pop the '4' element off the end of array
						$widget_group = implode( '-', $name_parts );    // merge back existing elements

						$widget_group_data = get_option( 'widget_' . $widget_group );

						// If widget with the same index exists, use next free index.
						if ( isset( $widget_group_data[ $widget_index ] ) ) {
							$offset = max( array_keys( $widget_group_data ) ) + 1;

							$widget_index += $offset;
						}

						$widget_group_data[ $widget_index ] = $widget_data;

						// Save widget data.
						update_option( 'widget_' . $widget_group, $widget_group_data );

						// Assign widget to sidebar.
						if ( ! isset( $sidebars_array[ $sidebar_id ] ) ) {
							$sidebars_array[ $sidebar_id ] = array();
						}

						$sidebars_array[ $sidebar_id ][] = $widget_id;
					}
				}

				// Save widget to sidebar relation.
				update_option( 'sidebars_widgets', $sidebars_array );

				
				return true;
			}

			wp_die();
		}

		function panel_section( ) {
			add_theme_page( esc_html__("Asterion Dashboard", 'asterion'), esc_html__("Asterion Dashboard", 'asterion'), 'administrator', 'asterion-panel', array( $this, 'asterion_panel' ));
		}


		protected function _get_plugin_basename_from_slug( $slug ) {
			$keys = array_keys( asterion()->tgmpa->get_plugins() );

			foreach ( $keys as $key ) {
				if ( preg_match( '|^' . $slug . '/|', $key ) ) {
					return $key;
				}
			}

			return $slug;
		}


		function check_recomended_plugins() {


			//get recomended plugins list
			$required_plugins = asterion()->required_plugins();
			$active_plugin_count = 0;

			//count recomended plugins 
			$recomended_plugin_count = count($required_plugins);

			//count active recomended plugins 
			foreach ( $required_plugins as $key => $plugin ) {
				if ( ( ! empty( $plugin['is_callable'] ) && is_callable( $plugin['is_callable'] ) ) || is_plugin_active( $this->_get_plugin_basename_from_slug( $plugin['slug'] ) ) ) {
					$active_plugin_count++;
				}
			}

			return ( $active_plugin_count == $recomended_plugin_count ) ? true : false;


		}


		function add_options( $options ) {
			foreach( $options as $option ) {
				$this->options[] = $option;
			}
		}


		function print_options(){
			foreach ( $this->options as $option ) {
				$this->print_options_switch( $option['type'], $option );
			}
		}
	

		function print_options_switch( $switch_value, $array_value) {
			switch ( $switch_value ) {

				case 'section_start':
					$this->print_section_start( $array_value );
				break;

				case 'section_end':
					$this->print_section_end( $array_value );
				break;

				case 'section_content':
					$this->print_section_content( $array_value );
				break;
	
				case 'changelog':
					$this->print_changelog();
				break;
			
			}
		}



		function print_header() {
		?>
			<div class="ot-control-header">
				<div class="ot-control-container">
					<div class="ot-logo">
						<img src="<?php echo esc_url(get_template_directory_uri()."/images/backend/ot-logo.png");?>">
					</div>
					<div class="ot-submenu">
						<span>
							<a href="http://www.orange-themes.com/support/" target="_blank">
								<?php esc_html_e("Need Help?", "asterion");?>
							</a>
						</span>
						<span>
							<a href="http://www.orange-themes.net/demo/asterion?ref=asterion-panel" target="_blank">
								<?php esc_html_e("Theme Demo", "asterion");?>
							</a>
						</span>
						<span>
							<a href="http://www.orange-themes.com/feedback/" target="_blank">
								<?php esc_html_e("Send us Feedback", "asterion");?>
							</a>
						</span>
					</div>
				</div>
			</div>

			<div class="ot-control-panel">
				<div class="ot-control-container">
					<ul class="ot-nav-tabs" role="tablist">
		<?php
						foreach ( $this->options as $value ) :
							if( $value['type'] == 'navigation' ) :
		?>
								<li class="<?php if( isset( $value['class'] ) ) echo esc_attr( $value['class'] );?>">
									<a href="#<?php echo esc_attr( $value['slug'] );?>" aria-controls="<?php echo esc_attr( $value['slug'] );?>" role="tab" data-toggle="tab">
										<?php echo esc_html( $value['name'] );?>
									</a>
								</li>
		<?php
							endif;
						endforeach;
		?>
				</ul>

		<?php
		}


		function print_section_start( $value ) {
		?>
				<div id="<?php echo esc_attr( $value['slug'] );?>" class="ot-tab-content" style="min-height: 640px;">
		<?php
		}


		function print_section_content( $value ) {
		 	echo $value['content'];
		}


		function print_changelog() {

			WP_Filesystem();
			global $wp_filesystem;
			$changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.txt' );
			$changelog_lines = explode( PHP_EOL, $changelog );

			$asterion = wp_get_theme( 'asterion' );

		?>
			<div class="ot-center">
				<h1 class="ot-welcome-title">
					<?php esc_html_e("Asterion", "asterion");?> 
					<?php if( !empty($asterion['Version']) ): ?> 
						<sup id="asterion-version">
							<?php echo esc_attr( $asterion['Version'] ); ?> 
						</sup>
					<?php endif; ?>
				</h1>
			</div>
		<?php

			foreach( $changelog_lines as $changelog_line ) {
				if( substr( $changelog_line, 0, 3 ) === "###" ) {
					echo '<hr /><h2>'.substr( $changelog_line, 3 ).'</h2>';
				} else {
					echo $changelog_line,'<br/>';
				}
			}

		}


		function print_section_end( $value ) {
		?>
				</div>
		<?php
		}


		function print_footer() {
		?>
					</div>
				</div>
		<?php
		}


		function asterion_panel( ) {
			//load all panel section files
			foreach ( $this->sub_section as $section) {
				get_template_part("inc/backend/".str_replace( '_', '-', $section ));
			}

			//create the panel content
			$this->print_header();
			$this->print_options();
			$this->print_footer();

		}
	}

?>