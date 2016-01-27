<?php
/**
 * Widget Recent Post
 *
 * @package Benevolent
 */
 
// register Benevolent_Recent_Post widget
function benevolent_register_recent_post_widget() {
    register_widget( 'Benevolent_Recent_Post' );
}
add_action( 'widgets_init', 'benevolent_register_recent_post_widget' );
 
 /**
 * Adds Benevolent_Recent_Post widget.
 */
class Benevolent_Recent_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'benevolent_recent_post', // Base ID
			__( 'RARA: Recent Post', 'benevolent' ), // Name
			array( 'description' => __( 'A Recent Post Widget', 'benevolent' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $benevolent_args     Widget arguments.
	 * @param array $benevolent_instance Saved values from database.
	 */
	public function widget( $benevolent_args, $benevolent_instance ) {
	   
        $benevolent_title = $benevolent_instance['title'];
        $benevolent_num_post = absint( $benevolent_instance['num_post'] );
        $benevolent_show_thumb = $benevolent_instance['show_thumbnail'];
        $benevolent_show_date = $benevolent_instance['show_postdate'];
        
        $benevolent_qry = new WP_Query( array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $benevolent_num_post,
            'ignore_sticky_posts'   => true
        ) );
        if( $benevolent_qry->have_posts() ){
            echo $benevolent_args['before_widget'];
            echo $benevolent_args['before_title'] . apply_filters( 'the_title', $benevolent_title ) . $benevolent_args['after_title'];
            ?>
            <ul>
                <?php 
                while( $benevolent_qry->have_posts() ){
                    $benevolent_qry->the_post();
                ?>
                    <li>
                        <?php if( has_post_thumbnail() && $benevolent_show_thumb ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'benevolent-recent-post' );?>
                            </a>
                        <?php }?>
						<div class="entry-header">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
							<?php if( $benevolent_show_date ){?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <a href="<?php the_permalink(); ?>">
                                            <time><?php printf( __( '%1$s', 'benevolent' ), get_the_date() ); ?></time>
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
            echo $benevolent_args['after_widget'];   
        }
        wp_reset_postdata();  
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $benevolent_instance Previously saved values from database.
	 */
	public function form( $benevolent_instance ) {
        
        $benevolent_title = !empty( $benevolent_instance['title'] ) ? $benevolent_instance['title'] : __( 'Recent Posts', 'benevolent' );
        $benevolent_num_post = !empty( $benevolent_instance['num_post'] ) ? absint( $benevolent_instance['num_post'] ) : 3 ;
        $benevolent_show_thumbnail = !empty( $benevolent_instance['show_thumbnail'] ) ? $benevolent_instance['show_thumbnail'] : '';
        $benevolent_show_postdate = !empty( $benevolent_instance['show_postdate'] ) ? $benevolent_instance['show_postdate'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $benevolent_title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php esc_html_e( 'Number of Posts', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_post' ); ?>" name="<?php echo $this->get_field_name( 'num_post' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $benevolent_num_post ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $benevolent_show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'benevolent' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_postdate' ); ?>" name="<?php echo $this->get_field_name( 'show_postdate' ); ?>" type="checkbox" value="1" <?php checked( '1', $benevolent_show_postdate ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_postdate' ); ?>"><?php esc_html_e( 'Show Post Date', 'benevolent' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $benevolent_new_instance Values just sent to be saved.
	 * @param array $benevolent_old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $benevolent_new_instance, $benevolent_old_instance ) {
		$benevolent_instance = array();
		
        $benevolent_instance['title'] = !empty( $benevolent_new_instance['title'] ) ? strip_tags( $benevolent_new_instance['title'] ) : __( 'Recent Posts', 'benevolent' );
        $benevolent_instance['num_post'] = !empty( $benevolent_new_instance['num_post'] ) ? absint($benevolent_new_instance['num_post']) : 3 ;        
        $benevolent_instance['show_thumbnail'] = !empty( $benevolent_new_instance['show_thumbnail'] ) ? esc_attr( $benevolent_new_instance['show_thumbnail'] ) : '';
        $benevolent_instance['show_postdate'] = !empty( $benevolent_new_instance['show_postdate'] ) ? esc_attr( $benevolent_new_instance['show_postdate'] ) : '';
		return $benevolent_instance;
	}

} // class Benevolent_Recent_Post 