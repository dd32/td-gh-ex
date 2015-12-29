<?php
add_action( 'widgets_init','becorp_footer_usefullink_widget'); 
   function becorp_footer_usefullink_widget() { return   register_widget( 'becorp_footer_usefull_link_widget' ); }
/**
 * Adds becorp_footer_usefull_link_widget widget.
 */
class becorp_footer_usefull_link_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'becorp_footer_usefull_link_widget', // Base ID
			__('Becorp Footer Usefull Links', 'becorp'), // Name
			array( 'description' => __( 'The most Usefull page link on your site', 'becorp' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number_of_pages = apply_filters( 'widget_title', $instance['number_of_pages'] );
		if($number_of_pages=='') { $number_of_pages = 5; }
		
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title']; ?>
		<div class="usefull_link">
		<?php	$loop = new WP_Query(array( 'post_type' => 'page', 'showposts' => $number_of_pages ));
				if( $loop->have_posts() ) : 
				  while ( $loop->have_posts() ) : $loop->the_post();?>				
					<ul class="list">
						<li><a href="<?php the_permalink(); ?>"> <i class="fa fa-angle-right"></i> <?php the_title(); ?></a></li>
					</ul>
					<?php endwhile; ?>			
				<?php endif; ?>
		</div>
		<?php		
		echo $args['after_widget']; // end of footer usefull links widget		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] )  && isset( $instance[ 'number_of_pages' ] )) {
			$title = $instance[ 'title' ];
			$number_of_pages = $instance[ 'number_of_pages' ];
		}
		else {
			$title = __( 'Usefull Links', 'becorp' );
			$number_of_pages = 5;
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','becorp' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number_of_pages' ); ?>"><?php _e( 'Number of pages to show:','becorp' ); ?></label> 
		<input size="3" maxlength="2"id="<?php echo $this->get_field_id( 'number_of_pages' ); ?>" name="<?php echo $this->get_field_name( 'number_of_pages' ); ?>" type="text" value="<?php echo esc_attr( $number_of_pages ); ?>" />
		</p>		
		<?php 
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number_of_pages'] = ( ! empty( $new_instance['number_of_pages'] ) ) ? strip_tags( $new_instance['number_of_pages'] ) : '';
		return $instance;
	}

} // class Foo_Widget
?>