<?php  
	
	// Widget Name: Anorya Facebook widget
	add_action( 'widgets_init', array ( 'anorya_facebook', 'register' ) );

	class Anorya_Facebook extends WP_Widget {

		
		// Constructor.
		public function __construct(){
			parent::__construct( strtolower( __CLASS__ ), esc_html(__('Anorya - Facebook','anorya')) );
		}
    
		// widget  form
		public function form( $instance ){

			
			
			//widget title
			$field_value = isset ( $instance['anorya_title_widget'] ) ? $instance['anorya_title_widget'] : __('Anorya Facebook', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p>',
					$this->get_field_id( 'anorya_title_widget' ),
					esc_html__( 'Title', 'anorya' ),
					$this->get_field_name( 'anorya_title_widget' ),
					esc_attr( $field_value ) );
					
			//widget facebook url
			$field_value = isset ( $instance['anorya_widget_facebook_url'] ) ? $instance['anorya_widget_facebook_url'] : __('Facebook Page Url', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p>',
					$this->get_field_id( 'anorya_widget_facebook_url' ),
					esc_html__( 'Facebook Page Url', 'anorya' ),
					$this->get_field_name( 'anorya_widget_facebook_url' ),
					esc_attr( $field_value ) );

			//widget facebook tabs
			$field_value = isset ( $instance['anorya_widget_facebook_tabs'] ) ? $instance['anorya_widget_facebook_tabs'] : __('timeline, events,messages', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p>',
					$this->get_field_id( 'anorya_widget_facebook_tabs' ),
					esc_html__( 'Facebook Tabs (timeline, events, messages) - comma seperated', 'anorya' ),
					$this->get_field_name( 'anorya_widget_facebook_tabs' ),
					esc_attr( $field_value ) );	

			//widget facebook height
			$field_value = isset ( $instance['anorya_widget_facebook_height'] ) ? $instance['anorya_widget_facebook_height'] : __('200', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p>',
					$this->get_field_id( 'anorya_widget_facebook_height' ),
					esc_html__( 'Facebook Box Height ', 'anorya' ),
					$this->get_field_name( 'anorya_widget_facebook_height' ),
					esc_attr( $field_value ) );	

			//widget facebook use small header
			if(isset($instance['anorya_widget_facebook_use_small_header'])){
				$field_value = $instance['anorya_widget_facebook_use_small_header'] ? true : false;
			}else{
				$field_value = true;
			}
			printf('<p><label for="%1$s"><input type="checkbox" name="%3$s" id="%1$s" %4$s class="widefat">%2$s</label></p>',
					$this->get_field_id( 'anorya_widget_facebook_use_small_header' ),
					esc_html__( 'Use small header ', 'anorya' ),
					$this->get_field_name( 'anorya_widget_facebook_use_small_header' ),
					checked( $field_value, true, false ) );

			//widget facebook hide cover photo
			if(isset($instance['anorya_widget_facebook_hide_cover_photo'])){
				$field_value = $instance['anorya_widget_facebook_hide_cover_photo'] ? true : false;
			}else{
				$field_value = true;
			}
			printf('<p><label for="%1$s"><input type="checkbox" name="%3$s" id="%1$s" %4$s class="widefat">%2$s</label></p>',
					$this->get_field_id( 'anorya_widget_facebook_hide_cover_photo' ),
					esc_html__( 'Hide Cover Photo ', 'anorya' ),
					$this->get_field_name( 'anorya_widget_facebook_hide_cover_photo' ),
					checked( $field_value, true, false ) );

			//widget facebook show friends
			if(isset($instance['anorya_widget_facebook_show_friends'])){
				$field_value = $instance['anorya_widget_facebook_show_friends'] ? true : false;
			}else{
				$field_value = true;
			}
			printf('<p><label for="%1$s"><input type="checkbox" name="%3$s" id="%1$s" %4$s class="widefat">%2$s</label></p>',
					$this->get_field_id( 'anorya_widget_facebook_show_friends' ),
					esc_html__( 'Show Friends ', 'anorya' ),
					$this->get_field_name( 'anorya_widget_facebook_show_friends' ),
					checked( $field_value, true, false ) );

			//widget facebook hide cta
			if(isset($instance['anorya_widget_facebook_hide_cta'])){
				$field_value = $instance['anorya_widget_facebook_hide_cta'] ? true : false;
			}else{
				$field_value = true;
			}	
			printf('<p><label for="%1$s"><input type="checkbox" name="%3$s" id="%1$s" %4$s class="widefat">%2$s</label></p>',
					$this->get_field_id( 'anorya_widget_facebook_hide_cta' ),
					esc_html__( 'Hide Call To Action Button', 'anorya' ),
					$this->get_field_name( 'anorya_widget_facebook_hide_cta' ),
					esc_html(checked( $field_value, true, false )) );					
					
			

			
		}
		
		//save - sanitize content
		public function update( $new_instance, $old_instance ){
        
			$new_instance_array = array( 'anorya_title_widget','anorya_widget_facebook_url','anorya_widget_facebook_tabs',
										 'anorya_widget_facebook_height','anorya_widget_facebook_use_small_header',
										 'anorya_widget_facebook_hide_cover_photo','anorya_widget_facebook_show_friends',
										 'anorya_widget_facebook_hide_cta'); 
			foreach( $new_instance_array as $val ){
				
				if(isset($new_instance[$val])){
					switch ($val){
						case 'anorya_title_widget':
						case 'anorya_widget_facebook_tabs':
							$old_instance[ $val ] = sanitize_text_field($new_instance[ $val ]);
							break;
						case 'anorya_widget_facebook_url':
							$old_instance[ $val ] = esc_url_raw($new_instance[ $val ]);
							break;
						case 'anorya_widget_facebook_height':
							if(is_int($new_instance[ $val ]) && $new_instance[ $val ] > 0){
								$old_instance[ $val ] = sanitize_text_field($new_instance[ $val ]);
							}
							else{
								$old_instance[ $val ] = 200;
							}		
							break;
						case 'anorya_widget_facebook_use_small_header':
							$old_instance[ $val ] = isset($new_instance[ $val ]) ? true : false ;	
							break;	
						case 'anorya_widget_facebook_hide_cover_photo':
							$old_instance[ $val ] = isset($new_instance[ $val ]) ? true : false ;
							break;	
						case 'anorya_widget_facebook_show_friends':
							$old_instance[ $val ] = isset($new_instance[ $val ]) ? true : false ;
							break;	
						case 'anorya_widget_facebook_hide_cta':
							$old_instance[ $val ] = isset($new_instance[ $val ]) ? true : false ;
							break;	
					}	
				}	
			}	
			return $old_instance;
		}

		//widget output.
		public function widget( $args, $instance ){   // Widget output
       
			extract($args);
			
			
			$widget_output = '<div id="fb-root"></div>';
			
			wp_enqueue_script('facebook-like-box', get_template_directory_uri(__FILE__) . '/inc/widgets/assets/facebook-like-box.js', array('jquery'));
			
			
			$widget_output .= '<div class="widget">';
			//title output
			if(isset( $instance['anorya_title_widget'] ) || $instance['anorya_title_widget']){
				$widget_output .= '<h6>'.$instance['anorya_title_widget'].'</h6>';
			}
			
			$widget_output .= '<div class="fb-page" data-href="'.$instance['anorya_widget_facebook_url'].'" ';
			$widget_output .= 'data-tabs="'.$instance['anorya_widget_facebook_tabs'].'" ';
			$widget_output .= 'data-adapt-container-width="true" ';
			
			if ($instance['anorya_widget_facebook_use_small_header']){
				$widget_output .= 'data-small-header="true" ';
			}else{
				$widget_output .= 'data-small-header="false" ';
			}	
			
			if ($instance['anorya_widget_facebook_hide_cover_photo']){
				$widget_output .= 'data-hide-cover="true" '; 
			}else{
				$widget_output .= 'data-hide-cover="false" '; 
			}	
			
			if ($instance['anorya_widget_facebook_show_friends']){
				$widget_output .= 'data-show-facepile="true" ';
			}else{
				$widget_output .= 'data-show-facepile="false" ';
			}	
			
			if ($instance['anorya_widget_facebook_hide_cta']){
				$widget_output .= 'data-hide-cta="true" ';
			}else{
				$widget_output .= 'data-hide-cta="false" ';
			}	
			
			$widget_output .= '></div>';
			$widget_output .= '</div>';
			
			print $widget_output;
			
		}

    
		

    
		// register widget
		public static function register(){
			register_widget( __CLASS__ );
		}
	}