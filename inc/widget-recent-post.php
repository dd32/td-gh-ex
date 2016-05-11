<?php
/**
 * Widget Recent Post
 *
 * @package App_Landing_Page
 */
 
// register App_Landing_Recent_Post widget
function App_landing_page_register_recent_post_widget() {
    register_widget( 'App_Landing_Page_Recent_Post' );
}
add_action( 'widgets_init', 'app_landing_page_register_recent_post_widget' );
 
 /**
 * Adds app_Landing_Page_Recent_Post widget.
 */
class App_Landing_Page_Recent_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'app_landing_page_recent_post', // Base ID
			__( 'RARA: Recent Post', 'app-landing-page' ), // Name
			array( 'description' => __( 'A Recent Post Widget', 'app-landing-page' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $app_landing_page_args     Widget arguments.
	 * @param array $app_landing_page_instance Saved values from database.
	 */
	public function widget( $app_landing_page_args, $app_landing_page_instance ) {
	   
        $app_landing_page_title = $app_landing_page_instance['title'];
        $app_landing_page_num_post = absint( $app_landing_page_instance['num_post'] );
        $app_landing_page_show_thumb = $app_landing_page_instance['show_thumbnail'];
        $app_landing_page_show_date = $app_landing_page_instance['show_postdate'];
        
        $app_landing_page_qry = new WP_Query( array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $app_landing_page_num_post,
            'ignore_sticky_posts'   => true
        ) );
        if( $app_landing_page_qry->have_posts() ){
            echo $app_landing_page_args['before_widget'];
            echo $app_landing_page_args['before_title'] . apply_filters( 'the_title', $app_landing_page_title ) . $app_landing_page_args['after_title'];
            ?>
            <ul>
                <?php 
                while( $app_landing_page_qry->have_posts() ){
                    $app_landing_page_qry->the_post();
                ?>
                    <li>
                        <?php if( has_post_thumbnail() && $app_landing_page_show_thumb ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'app-landing-page-recent-post' );?>
                            </a>
                        <?php }?>
						<div class="entry-header">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
							<?php if( $app_landing_page_show_date ){?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <a href="<?php the_permalink(); ?>">
                                            <time><?php printf( __( '%1$s', 'app-landing-page' ), get_the_date() ); ?></time>
                                        </a>                                    
                                    </span>
                                </div>
                            <?php }?>
						</div>                        
                    </li>        
                <?php    
                }
            ?>
            </ul>
            <?php
            echo $app_landing_page_args['after_widget'];   
        }
        wp_reset_postdata();  
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $app_landing_page_instance Previously saved values from database.
	 */
	public function form( $app_landing_page_instance ) {
        
        $app_landing_page_title = !empty( $app_landing_page_instance['title'] ) ? $app_landing_page_instance['title'] : __( 'Recent Posts', 'app-landing-page' );
        $app_landing_page_num_post = !empty( $app_landing_page_instance['num_post'] ) ? absint( $app_landing_page_instance['num_post'] ) : 3 ;
        $app_landing_page_show_thumbnail = !empty( $app_landing_page_instance['show_thumbnail'] ) ? $app_landing_page_instance['show_thumbnail'] : '';
        $app_landing_page_show_postdate = !empty( $app_landing_page_instance['show_postdate'] ) ? $app_landing_page_instance['show_postdate'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $app_landing_page_title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php esc_html_e( 'Number of Posts', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_post' ); ?>" name="<?php echo $this->get_field_name( 'num_post' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $app_landing_page_num_post ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $app_landing_page_show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'app-landing-page' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_postdate' ); ?>" name="<?php echo $this->get_field_name( 'show_postdate' ); ?>" type="checkbox" value="1" <?php checked( '1', $app_landing_page_show_postdate ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_postdate' ); ?>"><?php esc_html_e( 'Show Post Date', 'app-landing-page' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $app_landing_page_new_instance Values just sent to be saved.
	 * @param array $app_landing_page_old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $app_landing_page_new_instance, $app_landing_page_old_instance ) {
		$app_landing_page_instance = array();
		
        $app_landing_page_instance['title'] = !empty( $app_landing_page_new_instance['title'] ) ? strip_tags( $app_landing_page_new_instance['title'] ) : __( 'Recent Posts', 'app-landing-page' );
        $app_landing_page_instance['num_post'] = !empty( $app_landing_page_new_instance['num_post'] ) ? absint($app_landing_page_new_instance['num_post']) : 3 ;        
        $app_landing_page_instance['show_thumbnail'] = !empty( $app_landing_page_new_instance['show_thumbnail'] ) ? esc_attr( $app_landing_page_new_instance['show_thumbnail'] ) : '';
        $app_landing_page_instance['show_postdate'] = !empty( $app_landing_page_new_instance['show_postdate'] ) ? esc_attr( $app_landing_page_new_instance['show_postdate'] ) : '';
		return $app_landing_page_instance;
	}

} // class App_Landing_Page_Recent_Post 