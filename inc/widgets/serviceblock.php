<?php

/**************************/
/******service block widget */
/************************/



class safreen_serviceblock extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ctUp-ads-servicewidget',
			__( 'Safreen - Service Block', 'safreen' )
		);
	}

    function widget($args, $instance) {

        extract($args);
			

        echo $before_widget;

        ?>


  
<div  class="bg-service-1 box-one-third light-text" >

<?php if( !empty($instance['image_uri']) ): ?>

        
        <img class="matchhe"  src="<?php echo esc_url($instance['image_uri']);?>" alt="<?php echo apply_filters('widget_title', $instance['title']); ?>"  />

        <?php endif; ?>
        <div class="wow animated matchhe">
<div class="inner">

        <?php if( !empty($instance['title']) ): ?>
        
        <h2 class="wow fadeIn"> <?php echo esc_attr(apply_filters('widget_title', $instance['title'])); ?> </h2>
        
        <?php endif; ?>
        

<?php 
				if( !empty($instance['text']) ):
				
					echo '<p class="wow fadeIn">';
						echo esc_html( htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])));
					echo '</p>';
				endif;
			?>
            <div class="divider-single"></div>	
		<?php if( !empty($instance['link']) ): ?>
		<a href="<?php  echo esc_url($instance['link']);?>" class="btn-border-light wow fadeInUp"><?php  echo esc_attr(($instance['link_name']));?> </a>
        
        <?php endif; ?>
</div></div></div>

		
<?php
        echo $after_widget;
		

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['link_name'] = strip_tags( $new_instance['link_name'] );

        $instance['image_uri'] = strip_tags($new_instance['image_uri']);

        return $instance;

    }

    function form($instance) {
		
		/* Set up some default widget settings. */
		$defaults = array(
		'title' => esc_attr__('Modern Design', 'safreen'),
		'text' =>  esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'safreen'),
		'link' => '#',
		'link_name' => esc_attr__('Read More','safreen'),
		'image_uri'=> esc_url (get_template_directory_uri()."/images/bg_service_1.jpg") ,
		
				
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'safreen'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'safreen'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link','safreen'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php if( !empty($instance['link']) ): echo $instance['link']; endif; ?>" class="widefat">
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('link_name'); ?>"><?php _e('Link Name','safreen'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('link_name'); ?>" id="<?php echo $this->get_field_id('link_name'); ?>" value="<?php if( !empty($instance['link_name']) ): echo $instance['link_name']; endif; ?>" class="widefat">
		</p>
        
        <p>
            <div class="widget_input_wrap">
                <label for="<?php echo $this->get_field_id( 'image_uri' ); ?>"><?php _e('Image', 'safreen') ?></label>
                <div class="media-picker-wrap">
                <?php if(!empty($instance['image_uri'])) { ?>
                    <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri' ); ?>" name="<?php echo $this->get_field_name( 'image_uri' ); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri' ).'mpick'; ?>"><?php _e('Select Image', 'safreen') ?></a>
                </div>
            </div>
        </p>
        
        <p >
			<label for="<?php echo $this->get_field_id( 'content_bg' ); ?>"></label>
            <span><strong><?php _e('Background Image size ', 'safreen') ?></strong></span>
			
		</p> 
    <?php

    }

}
