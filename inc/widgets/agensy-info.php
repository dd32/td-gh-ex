<?php
/**
Agensy Pro Contact Info
*/

add_action('widgets_init', 'agensy_contact_details');
    
function agensy_contact_details(){
    register_widget('agensy_pro_contact_info_widget');
}

   /**
   * 
   */
   class agensy_Pro_Contact_Info_Widget extends WP_Widget
   {
   			public function __construct()
		   	{
			   		parent::__construct(
	                'agensy_contact_info',
	                esc_html__('Agensy: Contact Information', 'agensy'),
	                array(
	                    'description' => __('A widget that shows contact information', 'agensy')
	                )
	           	 );
		   	}

		   	private function widget_fields() 
		   	{
		   		$fields = array(
		   			'gmap_contact_title' => array(
                    'agensy_widgets_name' => 'gmap_contact_title',
                    'agensy_widgets_title' => __('Title', 'agensy'),
                    'agensy_widgets_field_type' => 'text',
                ),
            'gmap_phone' => array(
            'agensy_widgets_name' => 'gmap_phone',
            'agensy_widgets_title' => __(' Phone', 'agensy'),
            'agensy_widgets_field_type' => 'text',
              
              ),

            'gmap_support_email' => array(
            'agensy_widgets_name' => 'gmap_support_email',
            'agensy_widgets_title' => __('Support', 'agensy'),
            'agensy_widgets_field_type' => 'text',
               ),

            'gmap_contact_email' => array(
            'agensy_widgets_name' => 'gmap_contact_email',
            'agensy_widgets_title' => __('Email', 'agensy'),
            'agensy_widgets_field_type' => 'text',
               ),

           'gmap_location' => array(
            'agensy_widgets_name' => 'gmap_location',
            'agensy_widgets_title' => __('Address', 'agensy'),
            'agensy_widgets_field_type' => 'text',
               ),
		   			);
		   		return $fields;
		   	}	

        /**
   * Front-end display of widget.
   *
   */

    public function widget($args, $instance) 
    {
              extract($args);
          if($instance!=null){   

              $gmap_contact_title = isset($instance['gmap_contact_title']) ? $instance['gmap_contact_title'] : '';
              $gmap_phone = isset($instance['gmap_phone']) ? $instance['gmap_phone'] : '';
              $gmap_support_email = isset($instance['gmap_support_email']) ? $instance['gmap_support_email'] : '';
              $gmap_contact_email = isset($instance['gmap_contact_email']) ? $instance['gmap_contact_email'] : '';
              $gmap_location = isset($instance['gmap_location']) ? $instance['gmap_location'] : '';


               echo $before_widget;
               ?>
               <div class = "agensy-contact-info-warp">
                <?php 
               //Show title
              if(!empty($gmap_contact_title)){
                   echo $before_title . $gmap_contact_title . $after_title;
               }

              if( $gmap_phone || $gmap_support_email || $gmap_contact_email || $gmap_location ){ ?>
                <div class="agensy-contact-info">
                  <span class="contact_phone">
                   <i class="fa fa-mobile" aria-hidden="true"></i>
                  <a href="tel:<?php echo esc_html($gmap_phone); ?>">
                  <?php _e('Phone:','agensy'); ?><?php echo esc_html($gmap_phone); ?>
                  </a>
                  </span>
                  <span class="contact_email">
                     <i class="fa fa-headphones" aria-hidden="true"></i>
                    <a href="mailto:<?php echo esc_attr($gmap_support_email); ?>">
                   <?php _e('Support:','agensy'); ?><?php echo esc_attr($gmap_support_email); ?>
                    </a>
                  </span>
                  <span class="contact_web">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <a href="<?php echo esc_attr($gmap_contact_email); ?>" target="_blank">
                    <?php _e('Email:','agensy'); ?><?php echo esc_attr($gmap_contact_email); ?>
                    </a>  
                  </span>
                  <span class="contact_address">
                    <i class="fa fa-map-marker" aria-hidden="true"></i><?php _e('Location:','agensy'); ?><?php echo esc_attr($gmap_location); ?>
                  </span>
                </div>
          <?php } ?>
        </div>
        <?php 
       echo $after_widget;
      }
    }


    public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    $widget_fields = $this->widget_fields();

    // Loop through fields
    foreach( $widget_fields as $widget_field ) {

      extract( $widget_field );
  
      // Use helper function to get updated field values
      $instance[$agensy_widgets_name] = agensy_widgets_updated_field_value( $widget_field, $new_instance[$agensy_widgets_name] );
      
    }
        
    return $instance;
  }



  public function form( $instance ) {
    $widget_fields = $this->widget_fields();

    // Loop through fields
    foreach( $widget_fields as $widget_field ) {
      // Make array elements available as variables 
      extract( $widget_field );
      $agensy_widgets_field_value = isset( $instance[$agensy_widgets_name] ) ? esc_attr( $instance[$agensy_widgets_name] ) : '';
      agensy_widgets_show_widget_field( $this, $widget_field, $agensy_widgets_field_value );
    } 
  }
   }