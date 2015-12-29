<?php
add_action( 'widgets_init','becorp_footer_widget_contact'); 
   function becorp_footer_widget_contact() { return   register_widget( 'becorp_footer_contact_widget' ); }
/**
 * Adds becorp footer contact  widget.
 */
class becorp_footer_contact_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'becorp_footer_contact_widget', // Base ID
			__('becorp Footer Contact', 'becorp'), // Name
			array( 'description' => __( 'Your contact details display', 'becorp' ), ) // Args
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
		$Contact_address = apply_filters( 'widget_title', $instance['Contact_address'] );
		$Contact_phone_number = apply_filters( 'widget_title', $instance['Contact_phone_number'] );
		$Contact_print_number = apply_filters( 'widget_title', $instance['Contact_print_number'] );
		
		
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title']; 
		//$current_options = get_option('becorp_pro_theme_options');
		?>
		<ul class="contact_address">
					<li><i class="fa fa-map-marker icon-large"></i>&nbsp;&nbsp;
					<?php if($Contact_address) { echo $Contact_address; } else { echo __('2901 Marmora Road, ','becorp');?><br /><?php echo __('Glassgow,Seattle, WA 98122-1090','becorp'); } ?></li>
					<li><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php if($Contact_phone_number) { echo $Contact_phone_number; } else { echo __(' 1 -234 -456 -7890','becorp'); } ?></li>
					<li><i class="fa fa-print"></i>&nbsp;&nbsp;<?php if($Contact_print_number) { echo $Contact_print_number; } else { echo __(' 1 -234 -456 -7883','becorp'); } ?></li>
					<li><img src="<?php echo get_template_directory_uri () ?>/images/footer-wmap.png" alt="" /></li>
				</ul>		
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
		if ( isset( $instance[ 'title' ] )) { $title = $instance[ 'title' ];	}
		else {	$title = __( 'Contact Info', 'becorp' );		}
		
		if ( isset( $instance[ 'Contact_address' ] )) { $Contact_address = $instance[ 'Contact_address' ];	}
		else {	$Contact_address = __( '2901 Marmora Road, Glassgow,Seattle, WA 98122-1090 ', 'becorp' );		}
		
		if ( isset( $instance[ 'Contact_phone_number' ] )) { $Contact_phone_number = $instance[ 'Contact_phone_number' ];	}
		else {	$Contact_phone_number = __( '1 -234 -456 -7890', 'becorp' );		}
		
		if ( isset( $instance[ 'Contact_print_number' ] )) { $Contact_print_number = $instance[ 'Contact_print_number' ];	}
		else {	$Contact_print_number = __( '1 -234 -456 -7883', 'becorp' );		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','becorp' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'Contact_address' ); ?>"><?php _e( 'Contact address:','becorp' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'Contact_address' ); ?>" name="<?php echo $this->get_field_name( 'Contact_address' ); ?>" type="text" value="<?php echo $Contact_address; ?>" />
		</p>
		<p>	<label for="<?php echo $this->get_field_id( 'Contact_phone_number' ); ?>"><?php _e( 'Contact phone number:','becorp' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'Contact_phone_number' ); ?>" name="<?php echo $this->get_field_name( 'Contact_phone_number' ); ?>" type="text" value="<?php echo $Contact_phone_number ; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'Contact_print_number' ); ?>"><?php _e( 'Contact print number','becorp' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'Contact_print_number' ); ?>" name="<?php echo $this->get_field_name( 'Contact_print_number' ); ?>" type="text" value="<?php echo $Contact_print_number; ?>" />
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
		$instance['Contact_address'] = ( ! empty( $new_instance['Contact_address'] ) ) ? strip_tags( $new_instance['Contact_address'] ) : '';	
		$instance['Contact_phone_number'] = ( ! empty( $new_instance['Contact_phone_number'] ) ) ? strip_tags( $new_instance['Contact_phone_number'] ) : '';	
		$instance['Contact_print_number'] = ( ! empty( $new_instance['Contact_print_number'] ) ) ? strip_tags( $new_instance['Contact_print_number'] ) : '';	
		return $instance;
	}

} // class Foo_Widget
?>