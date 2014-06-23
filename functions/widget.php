<?php 
// register widget
add_action('widgets_init', create_function('', 'return register_widget("generator_widget");'));

class generator_widget extends WP_Widget {
	// constructor
		function generator_widget() {
			 parent::WP_Widget(false, $name = __('Generator Widget', '') );
		}
	
	// widget form creation
	function form($instance) {
	// Check values
	if( $instance) {
		 $generator_title = esc_attr($instance['title']);
		 $generator_description = esc_attr($instance['description']);
		 $generator_icon = esc_attr($instance['generator_icon']);
		
	} else {
		 $generator_title = '';
		 $generator_description = '';
		 $generator_icon = '';
	}
	?>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Widget Title', 'generator'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $generator_title; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('description'); ?>">
    <?php _e('Content', 'generator'); ?>
  </label>
  <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" rows="5" cols="10" ><?php echo $generator_description; ?></textarea>
 
</p>
<p><label for="<?php echo $this->get_field_id('generator_icon'); ?>">
    <?php _e('Icon', 'generator'); ?>
  </label>
<div id="generator_icon" class="section section-text mini">
            <div class="option">
                 <div class="controls">
                <input id="<?php echo $this->get_field_id('generator_icon'); ?>" class="upload" type="text" name="<?php echo $this->get_field_name('generator_icon'); ?>" value="<?php if($generator_icon != '') echo $generator_icon; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="generator-icon">
                    <?php if($generator_icon!= ''): ?>
                    <img src="<?php echo $generator_icon; ?>"/>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
          </div>
          </p>
<!--- font awesome icon ---->

<?php
	}
	
	// update widget
	function update($new_instance, $old_instance) {
		$generator_instance = $old_instance;
		// Fields
		$generator_instance['title'] = strip_tags($new_instance['title']);
		$generator_instance['description'] = strip_tags($new_instance['description']);
		$generator_instance['generator_icon'] = strip_tags($new_instance['generator_icon']);
		return $generator_instance;
	}
	
	// widget display
	function widget($args, $instance) {  
	   extract( $args );
	   // these are the widget options
	   $generator_title = apply_filters('widget_title', $instance['title']);
	   $generator_description = esc_attr($instance['description']);
	   $generator_icon = esc_attr($instance['generator_icon']);
	   
	   echo $before_widget;
	   // Check if title is set
?>
<?php if($generator_icon != ''){?>
<div class="font-icon-size ">
<img src="<?php echo $generator_icon ?>" class="fa icon-center"/>
</div>
<?php } ?>
<?php	   
	   
	   if ( $generator_title ) {
		  echo $before_title . $generator_title . $after_title;
	   }?>
       
       <p class="theme-text"><?php echo $generator_description; ?></p>
       
<?php echo $after_widget;?>
<div class="clearfix"></div>
<?php
	}
}