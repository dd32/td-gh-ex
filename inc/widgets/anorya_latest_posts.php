<?php  
	
	// Widget Name: Anorya Social Media widget

	add_action( 'widgets_init', array ( 'anorya_latest_posts', 'register' ) );

	class Anorya_Latest_Posts extends WP_Widget {

		
		// Constructor.
		public function __construct(){
			parent::__construct( strtolower( __CLASS__ ), esc_html__('Anorya - Latest Posts Widget','anorya') );
		}

    
		// widget  form
		public function form( $instance ){

			
			
			//widget title
			$field_value = isset ( $instance['anorya_title_widget'] ) ? $instance['anorya_title_widget'] : esc_html__('Latest Posts', 'anorya');
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p>',
					esc_attr($this->get_field_id( 'anorya_title_widget' )),
					esc_html__( 'Title', 'anorya' ),
					esc_attr($this->get_field_name( 'anorya_title_widget' )),
					esc_attr( $field_value ) );
					
			//posts number - default number 4
			$field_value = isset ( $instance['anorya_posts_number'] ) ? $instance['anorya_posts_number'] : 4;
			$field_value = esc_attr( $field_value );
			printf('<p><label for="%1$s">%2$s</label><br /><input type="text" name="%3$s" id="%1$s" value="%4$s" class="widefat"></p>',
					esc_attr($this->get_field_id( 'anorya_posts_number' )),
					esc_html__( 'Posts Number to be displayed:', 'anorya' ),
					esc_attr($this->get_field_name( 'anorya_posts_number' )),
					esc_attr( $field_value ) );
			
		}

		// widget output.
		public function widget( $args, $instance ){   // Widget output
       
			extract($args);

			
			$widget_output = '<div class="widget" itemscope itemtype="http://schema.org/ItemList">';
			//title output
			if(isset( $instance['anorya_title_widget'] ) || $instance['anorya_title_widget']){
				$widget_output .= '<h4>'.esc_attr($instance['anorya_title_widget']).'</h4>';
			}
			
			$widget_output .= '<div class="row">';
			if(isset( $instance['anorya_posts_number'] ) || $instance['anorya_posts_number']){
				$args = array(	'posts_per_page' =>  absint($instance['anorya_posts_number'] ));
			}
			else
			{
					$args = array(	'posts_per_page' =>  4 );
			}		
			
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) : 
				while ( $query->have_posts() ) :
					$query->the_post(); 
					$widget_output .= '<div class="latest-post-container col-md-12" itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">';
						
					if ( has_post_thumbnail() ) :
						$widget_output .= '<div class="latest-post-img-container">';
						$widget_output .= '<a itemprop="url" href="'.esc_url(get_permalink($query->post->ID)).'">';
						$widget_output .=  get_the_post_thumbnail($query->post->ID,'anorya_small', array('class'=>'img-responsive','itemprop'=>'image'));
						$widget_output .= '</a>';
						$widget_output .= '</div>';
					endif; 	
					
					$widget_output .= '<p itemprop="name headline"><a itemprop="url" href="';
					$widget_output .= esc_url(get_permalink($query->post->ID));
					$widget_output .= '">'.esc_html(get_the_title($query->post->ID));
					$widget_output .= '</a></p>';
					$widget_output .= '<time class="latest-post-date" datetime="'.esc_html(get_the_date("Y-m-d",$query->post->ID)).'" itemprop="datePublished">';
					$widget_output .= esc_html(get_the_date(get_option( 'date_format' ),$query->post->ID));
					$widget_output .= '</time>';
						
					$widget_output .='</div>';
							
				endwhile; 
			endif;
			wp_reset_postdata();
			
			
			$widget_output .= '</div>';
			
			$widget_output .= '</div>';
			
			print $widget_output;
			
		}

    
		// save - sanitize content
		public function update( $new_instance, $old_instance ){
        
			$new_instance_array = array( 'anorya_title_widget', 'anorya_posts_number', );
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