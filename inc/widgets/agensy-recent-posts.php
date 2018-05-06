<?php
/**
 *
 * @package construction lite
 */
 if(!function_exists('agensy_recent_post_widget')){
add_action('widgets_init', 'agensy_recent_post_widget');

function agensy_recent_post_widget() {
    register_widget('agensy_recent_post');
}
}
if(!class_exists('agensy_recent_post')){
class agensy_recent_post extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'agensy_recent_post', esc_html__('Agensy : Recent Post', 'agensy'), array(
            'description' => esc_html__('Recent Posts', 'agensy')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $agensy_cat_list = agensy_cat_lists();
        $fields = array(
            'agensy_recent_post_title' => array(
                'agensy_widgets_name' => 'agensy_recent_post_title',
                'agensy_widgets_title' => esc_html__('Title', 'agensy'),
                'agensy_widgets_field_type' => 'text',
            ),
            'agensy_recent_post_cat' => array(
                'agensy_widgets_name' => 'agensy_recent_post_cat',
                'agensy_widgets_title' => esc_html__('Recent Post Category', 'agensy'),
                'agensy_widgets_field_type' => 'select',
                'agensy_widgets_field_options' => $agensy_cat_list,
            ),
            'agensy_recent_post_per_page' => array(
                'agensy_widgets_name' => 'agensy_recent_post_per_page',
                'agensy_widgets_title' => esc_html__('Posts Per Page', 'agensy'),
                'agensy_widgets_field_type' => 'number',
            ),
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        $agensy_recent_post_title = isset($instance['agensy_recent_post_title']) ? $instance['agensy_recent_post_title'] : '';
        $agensy_recent_post_cat = isset($instance['agensy_recent_post_cat']) ? $instance['agensy_recent_post_cat'] : '';
        $agensy_recent_post_per_page = isset($instance['agensy_recent_post_per_page']) ? $instance['agensy_recent_post_per_page'] : '-1';
        echo wp_kses_post($before_widget);
            if($agensy_recent_post_title || $agensy_recent_post_cat){
                if($agensy_recent_post_title){
                    ?>
                        <h2 class="widget-title"><?php echo esc_html($agensy_recent_post_title); ?></h2>
                    <?php
                }
                $agensy_recent_post_args = array(
                        'post_type' => 'post',
                        'order' => 'DESC',
                        'posts_per_page' => $agensy_recent_post_per_page,
                        'post_status' => 'publish',
                        'category_name' => $agensy_recent_post_cat
                    );
                $agensy_recent_post_query = new WP_Query($agensy_recent_post_args);
                if($agensy_recent_post_query->have_posts()):
                    ?>
                    <div class="recent-post-widget">
                        <?php
                        while($agensy_recent_post_query->have_posts()):
                            $agensy_recent_post_query->the_post();
                            $agensy_recent_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'construction-recent-post-image');
                            $agensy_recent_post_image_url = $agensy_recent_post_image[0];
                            if($agensy_recent_post_image_url || get_the_title()){
                                ?>
                                    <div class="recent-posts-content clearfix">
                                        <?php if($agensy_recent_post_image_url){ ?><div class="image-recent-post"><img src="<?php echo esc_url($agensy_recent_post_image_url) ?>" alt="<?php the_title_attribute() ?>" title="<?php the_title_attribute() ?>" /></div><?php } ?>
                                        <div class="date-title-recent-post">
                                            <?php if(get_the_title()){ ?><span class="recent-post-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(),'10','...')); ?></a></span><?php } ?>
                                            <span class="recent-post-date"><?php echo esc_html(get_the_date('d,F,Y')); ?></span>
                                        </div>
                                    </div>
                                <?php
                            }
                        endwhile;
                        //wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                endif;
            }
        echo wp_kses_post($after_widget);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$agensy_widgets_name] = agensy_widgets_updated_field_value($widget_field, $new_instance[$agensy_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    agensy_widgets_show_widget_field()      defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $agensy_widgets_field_value = !empty($instance[$agensy_widgets_name]) ? esc_html($instance[$agensy_widgets_name]) : '';
            agensy_widgets_show_widget_field($this, $widget_field, $agensy_widgets_field_value);
        }
    }
}
}