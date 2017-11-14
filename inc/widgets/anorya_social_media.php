<?php  
	
	// Widget Name: Anorya Social Media widget

	add_action( 'widgets_init', array ( 'anorya_social_media', 'register' ) );

	class Anorya_Social_Media extends WP_Widget {

		
		// Constructor.
		public function __construct(){
			parent::__construct( strtolower( __CLASS__ ), esc_html(__('Anorya - Social Media Links Widget','anorya')) );
		}

    
		// widget  form
		public function form( $instance ){

			
			
			//widget title
			$field_value = isset ( $instance['anorya_title_widget'] ) ? $instance['anorya_title_widget'] : __('Social Media', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p><p>%5$s</p>',
					$this->get_field_id( 'anorya_title_widget' ),
					esc_html__( 'Title', 'anorya' ),
					$this->get_field_name( 'anorya_title_widget' ),
					esc_attr( $field_value ),
					esc_html__('Social Media Links are set in Customizer Options','anorya'));
					
			
		}

		// widget output.
		public function widget( $args, $instance ){   // Widget output
       
			extract($args);

			print '<div class="widget">';
			//title output
			if(isset( $instance['anorya_title_widget'] ) || $instance['anorya_title_widget']){
				print '<h4>'.$instance['anorya_title_widget'].'</h4>';
			}
			
			print '<ul class="social-menu">';
						
			anorya_social_links_list_display();
			
			print '</ul></div>';
			
			//print $widget_output;
			
		}

    
		// save - sanitize content
		public function update( $new_instance, $old_instance ){
        
			$new_instance_array = array( 'anorya_title_widget', 'anorya_facebook_widget', 'anorya_twitter_widget','anorya_google_plus_widget',
										 'anorya_linkedin_widget','anorya_instagram_widget','anorya_youtube_widget');
			foreach( $new_instance_array as $val ){
				if(isset($new_instance[$val])){
					if( $val == 'anorya_title_widget'){
						$old_instance[ $val ] = sanitize_text_field($new_instance[ $val ]);
					}
					else{
						$old_instance[ $val ] = esc_url_raw($new_instance[ $val ]);
					}		
				}	
			}	
			return $old_instance;
		}

    
		// register widget
		public static function register(){
			register_widget( __CLASS__ );
		}
	}