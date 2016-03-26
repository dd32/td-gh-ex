
<?php
// Creating the widget 
class beautytemple_ads extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'beautytemple_ads', 

// Widget name will appear in UI
__('Ad widget', 'beautytemple'), 

// Widget description
array( 'description' => __( 'Ad banner widget', 'beautytemple' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$image_link = apply_filters( 'image_link', $instance['image_link'] );
$banner_link = apply_filters( 'banner_link', $instance['banner_link'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $image_link ) )?>
<a target="blank" href="<?php echo $banner_link ;?>"><img src="<?php echo $image_link;?>"></a>
<?php
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'image_link' ] ) ) {
$image_link = $instance[ 'image_link' ];
}
else {
$image_link = __( 'Image link', 'beautytemple' );
}
if ( isset( $instance[ 'banner_link' ] ) ) {
$banner_link = $instance[ 'banner_link' ];
}
else {
$banner_link = __( 'Button link', 'beautytemple' );
}
if ( isset( $instance[ 'button_text' ] ) ) {
$button_text = $instance[ 'button_text' ];
}
else {
$button_text = __( 'Button text', 'beautytemple' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'image_link' ); ?>"><?php _e( 'Image link:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'image_link' ); ?>" name="<?php echo $this->get_field_name( 'image_link' ); ?>" type="text" value="<?php echo esc_attr( $image_link ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'banner_link' ); ?>"><?php _e( 'Banner link:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'banner_link' ); ?>" name="<?php echo $this->get_field_name( 'banner_link' ); ?>" type="text" value="<?php echo esc_attr( $banner_link ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['image_link'] = ( ! empty( $new_instance['image_link'] ) ) ? strip_tags( $new_instance['image_link'] ) : '';
$instance['banner_link'] = ( ! empty( $new_instance['banner_link'] ) ) ? strip_tags( $new_instance['banner_link'] ) : '';
return $instance;
}
} // Class beautytemple_ads ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'beautytemple_ads' );
}
add_action( 'widgets_init', 'wpb_load_widget' );