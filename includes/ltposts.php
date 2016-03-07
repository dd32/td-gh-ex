<?php
/**
 * Adds latestpost_Widget widget.
 */
class latestpost_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'latestpost_widget', // Base ID
			__( '*Optimize Latest Post', 'optimize' ), // Name
			array( 'description' => __( 'Optimize Theme Latest Post Widget', 'optimize' ), ) // Args
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		?>
<?php 
$argslatestnew = array( 
 'ignore_sticky_posts' => true,
 'showposts' => 5,
'orderby' => 'date',  );
$the_query = new WP_Query( $argslatestnew );
 if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();
 ?>
 <div id="ltpost">
<div class="latest-post">
		<?php if ( has_post_thumbnail() ) {the_post_thumbnail('widgetthumb');} ?>

		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
</div>	
</div>	 <div class="clear"></div>	
<?php endwhile; ?>	<?php endif; ?>	<?php wp_reset_postdata(); ?>
<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Latest Post', 'optimize' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','optimize' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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

		return $instance;
	}

} // class latestpost_Widget
// register latestpost_Widget widget
function register_latestpost_widget() {
    register_widget( 'latestpost_Widget' );
}
add_action( 'widgets_init', 'register_latestpost_widget' );