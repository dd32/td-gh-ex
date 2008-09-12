<?php
/**
 * Adds Recent post Widget.
 * @package 99fy
 */
if( !class_exists('NNfy_Recent_Post') ){
	class NNfy_Recent_Post extends WP_Widget{
		/**
		 * Register widget with WordPress.
		 */
		function __construct(){

			$widget_options = array(
				'description' 					=> esc_html__('NNfy blog recent post here', '99fy'), 
				'customize_selective_refresh' 	=> true,
			);

			parent:: __construct('NNfy_Recent_Post', esc_html__( 'NNfy: Recent Post', '99fy'), $widget_options );

		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){

			if ( ! isset( $args['widget_id'] ) ) {

			$args['widget_id'] = $this->id;

		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts','99fy' );
		
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$show_item = ( ! empty( $instance['show_item'] ) ) ? absint( $instance['show_item'] ) : 3;
		$num_title_word = ( ! empty( $instance['num_title_word'] ) ) ? absint( $instance['num_title_word'] ) : 6;

	
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;


			echo wp_kses_post( $args['before_widget'] ); 
			if( $title ): 
		    echo wp_kses_post( $args['before_title'] );  
			echo wp_kses_post( $title );  
		 	echo wp_kses_post( $args['after_title'] ); 
			endif; 

				$posts = new WP_Query(array(
					'post_type'      => 'post',
					'posts_per_page' => $show_item,
				));

				?>
				<ul class="sidebar-post">
					<?php

					while($posts->have_posts()) : $posts->the_post();  ?>
						<div class="sidebar-top-rated-all">
                            <div class="sidebar-top-rated mb-30">
                                <div class="single-top-rated">
                                    <div class="top-rated-img">

                                    	<?php if ( has_post_thumbnail() ): ?>
                                       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'nnfy_widget_recent_post_thumb' ); ?></a>

                                       <?php else: ?>
                                       	<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() . '/images/placeholder90x90.png'; ?>" alt="<?php esc_html__('Thumb', '99fy'); ?>"></a>

                                       	<?php endif ?>

                                    </div>
                                    <div class="top-rated-text">
                                        <span><?php the_time('M d, Y'); ?></span>
                                        <h4><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $num_title_word,' '); ?></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

					<?php endwhile; ?>
				</ul>

			<?php echo wp_kses_post( $args['after_widget'] ); ?>
			
			<?php wp_reset_postdata();
		}
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['show_item'] = (int) $new_instance['show_item'];
		$instance['num_title_word'] = (int) $new_instance['num_title_word'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	 	/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */

		public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$show_item    = isset( $instance['show_item'] ) ? absint( $instance['show_item'] ) : 4;
		$num_title_word    = isset( $instance['num_title_word'] ) ? absint( $instance['num_title_word'] ) : 6;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
	?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:','99fy' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_item' )); ?>"><?php echo esc_html__( 'No. of Item of posts to show:','99fy' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'show_item' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_item' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($show_item); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'num_title_word' )); ?>"><?php echo esc_html__( 'Title Word','99fy' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'num_title_word' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_title_word' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($num_title_word); ?>" size="3">
		</p>
		
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php echo esc_html__( 'Display post date?','99fy' ); ?></label>
		</p>
	<?php
		}
	}
}



// register Contact  Widget widget
function NNfy_Recent_Post(){
	register_widget('NNfy_Recent_Post');
}
add_action('widgets_init','NNfy_Recent_Post');