<?php
/*
 * avocation Get in touch
*/
add_action( 'widgets_init', 'avocation_widget' );

function avocation_widget() {
    register_widget( 'avocation_info_widget' );
}

class avocation_info_widget extends WP_Widget {

    function avocation_info_widget() {
        $avocation_widget_ops = array( 'classname' => 'avocation_info', 'description' => __('A widget that displays the title,contact information. ', 'avocation') );
       
        $avocation_control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'avocation-info-widget' );
       
        $this->WP_Widget( 'avocation-info-widget', __('Get In Touch', 'avocation'), $avocation_widget_ops, $avocation_control_ops );
    }
    function widget( $avocation_args, $avocation_instance ) {
        extract( $avocation_args );

		
        //Our variables from the widget settings.
        $avocation_title = isset( $avocation_instance['title'] ) ? apply_filters('widget_title', $avocation_instance['title'] ) : '' ;
        $avocation_address = isset( $avocation_instance['address'] ) ? sanitize_text_field(strip_tags($avocation_instance['address'])) : '';
       

        $avocation_phone = isset( $avocation_instance['phone'] ) ? sanitize_text_field(strip_tags($avocation_instance['phone'])) : '';
        $avocation_fax = isset( $avocation_instance['fax'] ) ? sanitize_text_field(strip_tags($avocation_instance['fax'])) : '';
        $avocation_email = isset( $avocation_instance['email'] ) ? esc_url_raw(strip_tags($avocation_instance['email'])) : '';
        $avocation_website = isset( $avocation_instance['website'] ) ? esc_url_raw(strip_tags($avocation_instance['website'])) : '';
		
        
        echo $before_widget;

        //Display widget
?>
<h3 class="footer-widget-title"><?php if(!empty($avocation_instance['title'])){ echo $avocation_instance['title']; } else { echo "Contributor"; }?></h3>
  <div class="contct-widget">
  <?php if(!empty($avocation_instance['address'])) { ?>
  <p><?php echo esc_attr($avocation_instance['address']); ?> 
  </p>
    <?php } ?>
    <?php if(!empty($avocation_instance['phone'])) { ?>
        <p><?php _e('Phone:','avocation');?> <?php echo esc_attr($avocation_instance['phone']); ?></p>
    <?php } ?>

    <?php if(!empty($avocation_instance['fax'])) { ?>
        <p><?php _e('Fax:','avocation');?> <?php echo esc_attr($avocation_instance['fax']); ?></p>
    <?php } ?>

    <?php if(!empty($avocation_instance['email'])) { ?>
        <p><?php _e('Email:','avocation');?> <a href="mailto:<?php echo $avocation_instance['email']; ?>"><?php echo $avocation_instance['email']; ?></a></p>
    <?php } ?>

    <?php if(!empty($avocation_instance['website'])) { ?>
        <p><?php _e('Web:','avocation');?><a href="<?php echo esc_url($avocation_instance['website']); ?>"><?php echo esc_url($avocation_instance['website']); ?></a></p>
    <?php } ?>
          </div>
  
<?php        
        echo $after_widget;
    }
    //Update the widget
    function update( $new_instance, $old_instance ) {
        $avocation_instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $avocation_instance['title'] = strip_tags( $new_instance['title'] );
        $avocation_instance['address'] = strip_tags( $new_instance['address'] );
        $avocation_instance['country'] = strip_tags( $new_instance['country'] );	
        $avocation_instance['phone'] = strip_tags( $new_instance['phone'] );
        $avocation_instance['fax'] = strip_tags( $new_instance['fax'] );
        $avocation_instance['website'] = esc_url_raw(strip_tags( $new_instance['website']));
        $avocation_instance['email'] = sanitize_email(strip_tags( $new_instance['email'] ));
		
        return $avocation_instance;
    }

   
    function form( $avocation_instance ) {
?>
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">
    <?php _e('Widget Title:', 'avocation'); ?>
  </label>
  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if(!empty($avocation_instance['title'])) { echo esc_attr($avocation_instance['title']); } ?>"  type="text" class="widefat" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'address' ); ?>">
    <?php _e('Address:', 'avocation'); ?>
  </label>
  <textarea id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>"  class="widefat" ><?php if(!empty($avocation_instance['address'])) { echo esc_attr($avocation_instance['address']); } ?> </textarea> 
</p>

<p>
  <label for="<?php echo $this->get_field_id( 'phone' ); ?>">
    <?php _e('Phone:', 'avocation'); ?>
  </label>
  <input id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php if(!empty($avocation_instance['phone'])) { echo esc_attr($avocation_instance['phone']); } ?>" type="text" class="widefat" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'fax' ); ?>">
    <?php _e('Fax:', 'avocation'); ?>
  </label>
  <input id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" value="<?php if(!empty($avocation_instance['fax'])) { echo esc_attr($avocation_instance['fax']); } ?>" type="text" class="widefat" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'email' ); ?>">
    <?php _e('Email Address:', 'avocation'); ?>
  </label>
  <input id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php if(!empty($avocation_instance['email'])) { echo esc_attr($avocation_instance['email']); } ?>" type="text" class="widefat" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'website' ); ?>">
    <?php _e('Website:', 'avocation'); ?>
  </label>
  <input id="<?php echo $this->get_field_id( 'website' ); ?>" name="<?php echo $this->get_field_name( 'website' ); ?>" value="<?php if(!empty($avocation_instance['website'])) { echo esc_url($avocation_instance['website']); } ?>" type="text" class="widefat" />
</p>

<?php
    }
}

?>
