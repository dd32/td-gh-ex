<?php
/**
 *
 * @package construction
 */
 if(!function_exists('agensy_team_widget')){
add_action('widgets_init', 'agensy_team_widget');

function agensy_team_widget() {
    register_widget('agensy_team');
}
}
if(!class_exists('agensy_team')){
class agensy_team extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'agensy_team', 'Agensy : Team',
             array(
                'description' => esc_html__('Team Members', 'agensy')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $agensy_page_lists = agensy_page_lists();
        $fields = array(
            'agensy_team_member_page' => array(
                'agensy_widgets_name' => 'agensy_team_member_page',
                'agensy_widgets_title' => esc_html__('Team Member Page', 'agensy'),
                'agensy_widgets_field_type' => 'select',
                'agensy_widgets_field_options' => $agensy_page_lists,

            ),
            'agensy_team_member_designation' => array(
                'agensy_widgets_name' => 'agensy_team_member_designation',
                'agensy_widgets_title' => esc_html__('Member Designation', 'agensy'),
                'agensy_widgets_field_type' => 'text',
            ),
            'agensy_team_member_facebook' => array(
                'agensy_widgets_name' => 'agensy_team_member_facebook',
                'agensy_widgets_title' => esc_html__('Facebook Link', 'agensy'),
                'agensy_widgets_field_type' => 'url',
            ),
            'agensy_team_member_twitter' => array(
                'agensy_widgets_name' => 'agensy_team_member_twitter',
                'agensy_widgets_title' => esc_html__('Twitter Link', 'agensy'),
                'agensy_widgets_field_type' => 'url',
            ),
            'agensy_team_member_google' => array(
                'agensy_widgets_name' => 'agensy_team_member_google',
                'agensy_widgets_title' => esc_html__('Google Plus Link', 'agensy'),
                'agensy_widgets_field_type' => 'url',
            ),
            'agensy_team_member_youtube' => array(
                'agensy_widgets_name' => 'agensy_team_member_youtube',
                'agensy_widgets_title' => esc_html__('Youtube Link', 'agensy'),
                'agensy_widgets_field_type' => 'url',
            ),
            'agensy_team_member_instagram' => array(
                'agensy_widgets_name' => 'agensy_team_member_instagram',
                'agensy_widgets_title' => esc_html__('Instagram Link', 'agensy'),
                'agensy_widgets_field_type' => 'url',
            ),
            'agensy_team_member_linkedin' => array(
                'agensy_widgets_name' => 'agensy_team_member_linkedin',
                'agensy_widgets_title' => esc_html__('LinkedIn', 'agensy'),
                'agensy_widgets_field_type' => 'url',
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
        $agensy_team_member_page = $instance['agensy_team_member_page'];
        $agensy_member_designatoin = $instance['agensy_team_member_designation'];
        
        $agensy_facebook_link = $instance['agensy_team_member_facebook'];
        $agensy_twitter_link = $instance['agensy_team_member_twitter'];
        $agensy_google_link = $instance['agensy_team_member_google'];
        $agensy_youtube_link = $instance['agensy_team_member_youtube'];
        $agensy_instagram_link = $instance['agensy_team_member_instagram'];
        $agensy_linkedin_link = $instance['agensy_team_member_linkedin'];
        
        echo wp_kses_post($before_widget);
        if($agensy_team_member_page ||  $agensy_member_designatoin ||  $agensy_google_link || $agensy_twitter_link ||  $agensy_facebook_link || $agensy_youtube_link || $agensy_instagram_link ||  $agensy_linkedin_link){
            
            $agensy_team_pages = new WP_Query(array('post_type' => 'page', 'p' => ($agensy_team_member_page)));
            if($agensy_team_pages->have_posts()){
                while($agensy_team_pages->have_posts()){
                    $agensy_team_pages->the_post();
                    $agensy_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'agensy-team-image');
                ?>
                    <div class="team-members wow fadeInUp">
                        <?php if($agensy_image_src[0]){ ?>
                        <div class="member-image">
                            <img src="<?php echo esc_url($agensy_image_src[0]); ?>" title="<?php the_title_attribute();?>" alt="<?php the_title_attribute();?>" />
                        <div class = "agensy-team-logo-icon"></div>   
                            
                            <div class="team-desc-social-wrap">
                                <?php if(get_the_content()){ ?>
                                    <div class="member-description">
                                        <?php echo esc_html(wp_trim_words(get_the_content(),'20','...')); ?>
                                    </div>
                                <?php } ?>

                                <?php if($agensy_google_link || 
                                        $agensy_twitter_link || 
                                        $agensy_facebook_link || 
                                        $agensy_youtube_link || 
                                        $agensy_instagram_link || 
                                        $agensy_linkedin_link){ ?>
                                            <div class="member-social-profile">
                                                <?php if($agensy_facebook_link){ ?><a target="_blank" href="<?php echo esc_url($agensy_facebook_link); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agensy_twitter_link){ ?><a target="_blank" href="<?php echo esc_url($agensy_twitter_link); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agensy_google_link){ ?><a target="_blank" href="<?php echo esc_url($agensy_google_link); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agensy_youtube_link){ ?><a target="_blank" href="<?php echo esc_url($agensy_youtube_link); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agensy_instagram_link){ ?><a target="_blank" href="<?php echo esc_url($agensy_instagram_link); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agensy_linkedin_link){ ?><a target="_blank" href="<?php echo esc_url($agensy_linkedin_link); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php } ?>
                                            </div>
                                <?php } ?>
                            </div><!-- .team-desc-social-wrap -->
                        </div>
                        <?php } ?>
                        <div class="team-sub-wrap">
                            <div class="member-name-designation">
                                <?php if(get_the_title()){ ?>
                                    <div class="member-name">
                                        <h5><?php the_title(); ?></h5>
                                    </div>
                                <?php } ?>
                                <?php if($agensy_member_designatoin){ ?>
                                    <div class="member-designation">
                                        <?php echo esc_html($agensy_member_designatoin); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                         
                    </div>
            <?php
                }
            }
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
     * @param	array $instance Previously saved values from database.
     *
     * @uses	agensy_widgets_show_widget_field()		defined in widget-fields.php
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