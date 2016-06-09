<?php

add_action( 'widgets_init', function(){
  register_widget( 'Ad_Mag_Lite_Advertisement' );
});

class Ad_Mag_Lite_Advertisement extends WP_Widget {
 
public function __construct() {
    $widget_ops = array('classname' => 'kopa-ads-widget', 'description' => __('To upload image for advertisement', 'ad-mag-lite'));
    $control_ops = array('width' => 'auto', 'height' => 'auto');
    parent::__construct('Ad_Mag_Lite_Advertisement', __('(AdMag) Advertisement', 'ad-mag-lite'), $widget_ops, $control_ops);
  }
 
  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_name', $instance['title'] );
    $link = apply_filters( 'widget_link', $instance['link'] );
    $image_uri = apply_filters( 'widget_image_uri', $instance['image_uri'] );
    $before_widget = '<div class="widget kopa-ads-widget">';
    $after_widget  = '</div>';
    $before_title  = '<h3 class="widget-title style2">';
    $after_title   = '</h3>';
    echo wp_kses_post($before_widget); 
    if($title)
      echo wp_kses_post($before_title.$title.$after_title); ?>
    <a href="<?php echo esc_url($instance['link']); ?>"><img src="<?php echo esc_url($instance['image_uri']); ?>" alt="" /></a>
    <?php
    echo wp_kses_post($after_widget);
  }
 
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title']     = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['link']      = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
    $instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
    return $instance;
  }
 
  public function form( $instance ) {

    $image_uri = isset( $instance[ 'image_uri' ] ) ? $instance[ 'image_uri' ] : '';
    $title     = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
    $link      = isset( $instance[ 'link' ] ) ? $instance[ 'link' ] : '#';
    ?>
    <p>
      <label for="<?php echo wp_kses_post($this->get_field_id('title')); ?>"><?php _e('Title', 'ad-mag-lite'); ?></label><br />
      <input type="text" name="<?php echo wp_kses_post($this->get_field_name('title')); ?>" id="<?php echo wp_kses_post($this->get_field_id('title')); ?>" value="<?php echo wp_kses_post($title); ?>" class="widefat" />
    </p>
    <p>
      <label for="<?php echo wp_kses_post($this->get_field_id('link')); ?>"><?php _e('Link', 'ad-mag-lite'); ?></label><br />
      <input type="text" name="<?php echo wp_kses_post($this->get_field_name('link')); ?>" id="<?php echo wp_kses_post($this->get_field_id('link')); ?>" value="<?php echo wp_kses_post($link); ?>" class="widefat" />
    </p>
    
    <p>
      <label for="<?php echo wp_kses_post($this->get_field_id('image_uri')); ?>">Image</label><br />
        <img class="custom_media_image" src="<?php echo esc_url($image_uri); ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
        <input type="text" class="widefat custom_media_url" name="<?php echo wp_kses_post($this->get_field_name('image_uri')); ?>" id="<?php echo wp_kses_post($this->get_field_id('image_uri')); ?>" value="<?php echo wp_kses_post($image_uri); ?>">
       </p>
       <p>
        <input type="button" value="<?php _e( 'Upload Image', 'ad-mag-lite' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
    </p>
    <?php 
  }
  
}

function ad_mag_lite_upload_image_enqueue_script(){
  wp_enqueue_media();
  wp_enqueue_script('ad_mag_lite_upload_image', get_template_directory_uri().'/lib/includes/widgets/js/image-upload-widget.js');
}
add_action('admin_enqueue_scripts', 'ad_mag_lite_upload_image_enqueue_script');