<?php
// Creating the widget 
class beka_recent_posts extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'beka_recent_posts', 

        // Widget name will appear in UI
        __('(WPKube) Recent Posts', 'beka'), 

        // Widget description
        array( 'description' => __( 'A widget to show recent posts', 'beka' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
		$recent_posts_count = intval( $instance['recent_posts_count'] );
		$show_thumb = (int) $instance['show_thumb'];
		$show_cat = (int) $instance['show_cat'];
        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
        
        ?>
            <div class="tabs-widget">
                <ul>
                    <?php
                        $recentposts = new WP_Query('showposts='.$recent_posts_count.'&order=DESC&ignore_sticky_posts=1');
                    ?>
                    <?php if($recentposts->have_posts()) : while ($recentposts->have_posts()) : $recentposts->the_post(); ?>
                        <li>
                            <?php if ( $show_thumb == 1 ) {
                                if(has_post_thumbnail()) { ?>
                                    <div class="thumbnail">
                                        <a class="featured-thumbnail widgetthumb" href='<?php the_permalink(); ?>'>
                                            <?php the_post_thumbnail('beka-widget'); ?>
                                        </a>
                                    </div>
                                <?php }
                            } ?>
                            <div class="info">
                                <span class="meta">
                                    <?php if ( $show_cat == 1 ) { ?>
                                        <span class="post-cats"><?php the_category(', '); ?></span>
                                    <?php } ?>
                                </span>
                                <span class="widgettitle"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        $defaults = array(
			'title' => 'Recent Posts',
			'recent_posts_count' => 4,
			'show_thumb' => 1,
			'show_cat' => 1,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$show_thumb = isset( $instance[ 'show_thumb' ] ) ? esc_attr( $instance[ 'show_thumb' ] ) : 1;
		$show_cat = isset( $instance[ 'show_cat' ] ) ? esc_attr( $instance[ 'show_cat' ] ) : 1;
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'beka'  ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if(!empty($instance['title'])) { echo $instance['title']; } ?>" />
        </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'recent_posts_count' ); ?>"><?php _e('Number of posts to show:','beka' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'recent_posts_count' ); ?>" name="<?php echo $this->get_field_name( 'recent_posts_count' ); ?>" value="<?php echo $instance['recent_posts_count']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("show_thumb"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumb"); ?>" name="<?php echo $this->get_field_name("show_thumb"); ?>" value="1" <?php if (isset($instance['show_thumb'])) { checked( 1, $instance['show_thumb'], true ); } ?> />
				<?php _e( 'Show Thumbnails', 'beka'); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("show_cat"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_cat"); ?>" name="<?php echo $this->get_field_name("show_cat"); ?>" value="1" <?php if (isset($instance['show_cat'])) { checked( 1, $instance['show_cat'], true ); } ?> />
				<?php _e( 'Show Catogory', 'beka'); ?>
			</label>
		</p>
        <?php 
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['recent_posts_count'] = $new_instance['recent_posts_count'];
		$instance['show_thumb'] = intval( $new_instance['show_thumb'] );
		$instance['show_cat'] = intval( $new_instance['show_cat'] );
        return $instance;
    }
} // Class beka_recent_posts ends here

// Register and load the widget
function kube_recent_posts_load_widget() {
	register_widget( 'beka_recent_posts' );
}
add_action( 'widgets_init', 'kube_recent_posts_load_widget' );
?>