<?php  
	
	// Widget Name: Anorya Navigation widget
	add_action( 'widgets_init', array ( 'anorya_navigation', 'register' ) );

	class Anorya_Navigation extends WP_Widget {

		
		// Constructor.
		public function __construct(){
			parent::__construct( strtolower( __CLASS__ ), esc_html(__('Anorya - Navigation','anorya')) );
		}
    
		// widget  form
		public function form( $instance ){

			
			
			//widget title
			$field_value = isset ( $instance['anorya_title_widget'] ) ? $instance['anorya_title_widget'] : __('About Me', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p>',
					$this->get_field_id( 'anorya_title_widget' ),
					esc_html__( 'Title', 'anorya' ),
					$this->get_field_name( 'anorya_title_widget' ),
					esc_attr( $field_value ) );
					
			//widget menu select
			$field_value = isset ( $instance['anorya_nav_menu_widget'] ) ? $instance['anorya_nav_menu_widget'] : __('No menu selected', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><select id="%1$s" name="%3$s" class="widefat">',
					$this->get_field_id( 'anorya_nav_menu_widget' ),
					esc_html__( 'Menu Select', 'anorya' ),
					$this->get_field_name( 'anorya_nav_menu_widget' ),
					esc_attr( $field_value ) );		
			foreach (get_registered_nav_menus() as $key => $value){
				printf('<option value="%1$s" %3$s >%2$s</option>', $key, $value, selected( $field_value, $key));
			}	
			
			print '</select></p>';	

		}

		//widget output.
		public function widget( $args, $instance ){   // Widget output
       
			extract($args);
			
			print '<div class="widget">';
			
			if(isset( $instance['anorya_title_widget'] ) || $instance['anorya_title_widget']){
					printf ('<h4>%1$s</h4>',$instance['anorya_title_widget']);
			}
			
			if(  isset( $instance['anorya_nav_menu_widget'] ) || $instance['anorya_nav_menu_widget'] ){
				if ( has_nav_menu( $instance['anorya_nav_menu_widget'] )){
					//print'<div id="collapse-navigation" class=" collapse navbar-collapse">';
					wp_nav_menu( array('theme_location' => $instance['anorya_nav_menu_widget'], 
										'walker'=>new Anorya_Widget_Nav_Walker(),
										'container' => 'nav',
										'container_class' => 'navbar',
										'menu_class'=>'nav navbar-nav' ) );	
					//print '</div>';					
				}						
			}									 
			
			print '</div>';
			
		}

    
		//save - sanitize content
		public function update( $new_instance, $old_instance ){
        
			$new_instance_array = array( 'anorya_title_widget', 'anorya_nav_menu_widget', );
			foreach( $new_instance_array as $val ){
				$old_instance[ $val ] = sanitize_text_field($new_instance[ $val ]);
			}	
			return $old_instance;
		}

    
		// register widget
		public static function register(){
			register_widget( __CLASS__ );
		}
	}