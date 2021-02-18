<?php

add_action('widgets_init','aster_register_blog_posts_widget');

function aster_register_blog_posts_widget() {
	register_widget('Aster_Blog_Posts_Widget');
}

class Aster_Blog_Posts_Widget extends WP_Widget{

	public function __construct() {
		parent::__construct(
			'aster_blog_posts_base_widget', // Base ID
			esc_html__('Aster Recent Posts', 'aster'), // Name
			array('description' => esc_html__('Aster Recent posts widget to display recent posts', 'aster'),) // Args
		);
	}


	/*-------------------------------------------------------
	 *				Front-end display of widget
	 *-------------------------------------------------------*/

	public	function widget($args, $instance) {
		extract($args);

		$title 			= apply_filters('widget_title', $instance['title'] );
		$count 			= $instance['count'];
		
		echo $before_widget;

		$output = '';

		if ( $title )
			echo $before_title . $title . $after_title;

		global $post;

		$args = array(
			'posts_per_page' => $count,
			'order' => 'DESC'
		);

		$posts = get_posts( $args );

		if(count($posts)>0){
			$output .='<div class="latest-posts">';

			foreach ($posts as $post): setup_postdata($post);
				$output .='<div class="media">';

					if(has_post_thumbnail()):
						$output .='<div class="pull-left">';
						$output .='<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail( get_the_ID(), 'aster-recent-post', array('class' => 'img-responsive')).'</a>';
						$output .='</div>';
					endif;

					$output .='<div class="media-body">';
					$output .= '<h3 class="entry-title"><a href="'.esc_url(get_permalink()).'">'. get_the_title() .'</a></h3>';
					$output .= '<div class="entry-meta small">' . get_the_time() . ', ' . get_the_date() . '</div>';
					$output .='</div>';

				$output .='</div>';
			endforeach;

			wp_reset_postdata();

			$output .='</div>';
		}


		echo $output;

		echo $after_widget;
	}


	public	function update( $new_instance, $old_instance ){
		$instance = $old_instance;

		$instance['title'] 			= sanitize_text_field( $new_instance['title'] );
		$instance['count'] 			= absint( $new_instance['count'] );

		return $instance;
	}


	public	function form($instance) {
		$defaults = array( 
			'title' 	=> esc_html__('Latest Posts', 'aster'),
			'count' 	=> 5
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Widget Title', 'aster');
				?></label>
			<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title' )); ?>" name="<?php echo esc_html($this->get_field_name('title')); ?>" value="<?php echo esc_html($instance['title']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php esc_html_e('Count', 'aster'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count')); ?>" value="<?php echo absint($instance['count']); ?>" />
		</p>

	<?php
	}
}