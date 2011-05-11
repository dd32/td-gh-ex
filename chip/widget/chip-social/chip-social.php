<?php
/*
|--------------------------
| Chip Social Widget
|--------------------------
*/

class chip_social extends WP_Widget {
	
	/*
	|--------------------------
	| Constructor
	|--------------------------
	*/
	
	function chip_social() {
		$widget_ops = array( 'classname' => 'chip_social', 'description' => 'Use this widget to add subscription and social contacts.' );
		$this->WP_Widget( 'chip_social', 'Chip Social Box', $widget_ops );
	}
	
	/*
	|--------------------------
	| Widget Print - Frontend
	|--------------------------
	*/
	
	function widget( $args, $instance ) {
		
		global $chip_life_global;
		extract( $args );		
		
		echo $before_widget;		
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };		
		locate_template( array( CHIP_LIFE_WIDGET_FSROOT . 'chip-social/widget.php' ), true, false );
		echo $after_widget;		
	
	}
	
	/*
	|--------------------------
	| Widget Update / Save
	|--------------------------
	*/	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	/*
	|--------------------------
	| Widget Form - Backend
	|--------------------------
	*/	
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Join Us' ) );
		$title = strip_tags($instance['title']);
		echo '
		<p>
		  <label for="'.$this->get_field_id( 'title' ).'">Socialbox</label>
		  <input type="text" id="'.$this->get_field_id( 'title' ).'" name="'.$this->get_field_name( 'title' ).'" value="'.esc_attr( $title ).'"  />
		</p>
		';
	}	
	
}
?>