<?php
#
# BS_Social_Widget Widget
#

class BS_Social_Widget  extends WP_Widget {

    function __construct() {
        $opts =array(
                    'classname'     => 'bs_social_widget',
                    'description'   => __( 'Display Social links in your sidebar', 'blue-sky' )
                );

        $this-> WP_Widget('bs-social', '[BS]   '.__('Social Widget', 'blue-sky'), $opts);
    }


    function widget( $args, $instance ) {
        extract( $args );

        $title          =   apply_filters('widget_title', $instance['title']) ;

        echo $before_widget;
        if ($title) echo $before_title . $title . $after_title;
        //
        global $bluesky_options_settings;

        $bs_options = $bluesky_options_settings;

        echo '<div class="social-widget-wrapper">';

        $social_sites = array('facebook','twitter','googleplus','youtube','pinterest','linkedin','flickr','tumblr','dribbble','deviantart','rss','instagram','skype','digg','stumbleupon','forrst','500px','vimeo');

        foreach ($social_sites as $key => $site) {
            if('' != $bs_options["social_$site"]){
                echo '<a class="social-'.$site.'" href="'.esc_url($bs_options["social_$site"]).'"></a>';
            }
        }
        if('' != $bs_options['social_email']){
            echo '<a class="social-email" href="mailto:'.esc_attr($bs_options['social_email']).'"></a>';
        }
        echo '</div>';
        //
        echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title']  =   esc_attr( strip_tags($new_instance['title']) );

        return $instance;
    }

    function form( $instance ) {
        $title          =   isset($instance['title']) ? esc_attr($instance['title']) : '';
?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'blue-sky'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title ; ?>" />
    </p>

    <p><?php echo _e('This widget will display social links from BS Theme Options.','blue-sky');  ?></p>
    <p><?php printf('<a href="%s">%s</a>',
            admin_url('themes.php?page=theme_options'),
            __('Click here to update links.','blue-sky')
        ); ?></p>

<?php }

} ?>
