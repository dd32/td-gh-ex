<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'socialbox'); ?></label>
  <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($title); ?>"  />
</p>