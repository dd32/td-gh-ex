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
		$widget_ops = array( 'classname' => 'chip_social', 'description' => 'Use this widget to add subscription and social bookmarking sites as a widget.' );
		$this->WP_Widget( 'chip_social', 'Chip Social Box', $widget_ops );
	}
	
	/*
	|--------------------------
	| Widget Print - Frontend
	|--------------------------
	*/
	
	function widget( $args, $instance ) {
		
		global $theme_options;
		
		extract( $args );
		
		echo $before_widget;
		
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		
		require(WIDGET_FSROOT . 'chip-social/widget.php');
		
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
		require(WIDGET_FSROOT . 'chip-social/form.php');		
	}	
	
}
?>