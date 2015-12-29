<?php
add_action( 'widgets_init','becorp_search_widget'); 
   function becorp_search_widget() { return   register_widget( 'becorp_search_page_widget' ); }
/**
 * Adds becorp_search_page_widget widget.
 */
class becorp_search_page_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'becorp_search_page_widget', // Base ID
			__('Becorp Search Content', 'becorp'), // Name
			array( 'description' => __( 'The most Usefull searching contents', 'becorp' ), ) // Args
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
		<div class="widget search">
				<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control search_box" autocomplete="off" placeholder="<?php esc_attr_e('Blog Search...','becorp');?>">
						<button class="btn btn-search"><i class="fa fa-search"></i></button>
				</form>
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