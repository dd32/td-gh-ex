<?php 

/*-----------------------------------------------------------------------------------*/
/* START CATEGORY
/*-----------------------------------------------------------------------------------*/    
    
class wip_googlemaps_widget extends WP_Widget
{
	public function __construct() 
    {
		parent::WP_Widget( "wip_googlemaps_widget", "Wip Google Maps Widget", array("description" => "Wip Google Maps Widget"));
	}
	
	public function form( $instance )
	{
		global $positions;

		$defaults = array( 
			'title' => 'Google Maps',
			'address' => NULL,
        );
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( "Title","wip"); ?>
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>  

		<p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>">
				<?php _e( "Address","wip"); ?>
			</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo $instance['address']; ?>" />
			
		</p>  

		<?php
	}
	
	public function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['address'] = strip_tags( $new_instance['address'] );
		
		return $instance;
	}                     
	
		public function widget( $args, $instance )
	{
		extract( $args );

		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance['title'] );
		if ( $title ) {
			echo $before_title.$title.$after_title;
		}
		
		echo do_shortcode('[googlemaps src="'.$instance['address'].'"][/googlemaps]'); 

		echo $after_widget;
	}
	
                 

	}
function add_wip_googlemaps_widget()
{
	register_widget( 'wip_googlemaps_widget' );
}
add_action( 'widgets_init', 'add_wip_googlemaps_widget' );

/*-----------------------------------------------------------------------------------*/
/* END CATEGORY
/*-----------------------------------------------------------------------------------*/    

?>