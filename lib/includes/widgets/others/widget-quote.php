<?php

add_action( 'widgets_init', function(){
	register_widget( 'Ad_Mag_Lite_Quote' );
});

/**
 * Widget Quote
 */
class Ad_Mag_Lite_Quote extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'widget_text', 'description' => __('Show quote', 'ad-mag-lite'));
        $control_ops = array('width' => 'auto', 'height' => 'auto');
        parent::__construct('Ad_Mag_Lite_Quote', __('(AdMag) Quote', 'ad-mag-lite'), $widget_ops, $control_ops);
    }

    public function widget( $args, $instance ) {

        extract( $args );

        $title   = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        
        $content = $instance['content'];
        
        $desc    = $instance['desc'];

        echo wp_kses_post($before_widget);
        ?>  
            <?php if(!empty($title)) : ?>
                <h3 class="widget-title style2"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>

            <blockquote class="kopa-blockquote">
                <?php if(!empty($content)) : ?>
                    <p><?php echo esc_html($content); ?></p>
                <?php endif; ?>
                <?php if(!empty($desc)) : ?>
                    <span><?php echo esc_html($desc); ?></span>
                <?php endif; ?>
            </blockquote>
           
        <?php
        echo wp_kses_post($after_widget);
    }   

    function form($instance) {
        $default = array(
            'title'   => '',
            'content' => '',
            'desc'    => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title    = strip_tags($instance['title']);
        
        $form['content'] = esc_attr($instance['content']);
        $form['desc']    = $instance['desc'];
        ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'ad-mag-lite'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php _e('Content:', 'ad-mag-lite'); ?></label>
        <textarea class="widefat" rows="10" cols="20" id="<?php echo wp_kses_post($this->get_field_id('content')); ?>" name="<?php echo wp_kses_post($this->get_field_name('content')); ?>"><?php echo esc_textarea($instance['content']); ?></textarea>
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php _e('Description:', 'ad-mag-lite'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>" name="<?php echo esc_attr($this->get_field_name('desc')); ?>" type="text" value="<?php echo esc_attr($form['desc']); ?>" />
    </p>

    <?php
    }

    function update($new_instance, $old_instance) {
        $instance            = $old_instance;
        $instance['title']   = strip_tags($new_instance['title']);
        $instance['content'] = strip_tags($new_instance['content']);
        $instance['desc']    = strip_tags($new_instance['desc']);

        return $instance;
    }
}