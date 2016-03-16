<?php
/**
 * Widget Recent Post
 *
 * @package Bakes And Cakes
 */
 
// register Foo_Widget widget
function bakes_and_cakes_register_recent_post_widget() {
    register_widget( 'bakes_and_cakes_Recent_Post' );
}
add_action( 'widgets_init', 'bakes_and_cakes_register_recent_post_widget' );
 
 /**
 * Adds Foo_Widget widget.
 */
class bakes_and_cakes_Recent_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'bakes_and_cakes_recent_post', // Base ID
			__( 'RARA: Recent Post', 'bakes-and-cakes' ), // Name
			array( 'description' => __( 'A Recent Post Widget', 'bakes-and-cakes' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $bakes_and_cakes_args     Widget arguments.
	 * @param array $bakes_and_cakes_instance Saved values from database.
	 */
	public function widget( $bakes_and_cakes_args, $bakes_and_cakes_instance ) {
	   
        $bakes_and_cakes_title = $bakes_and_cakes_instance['title'];
        $bakes_and_cakes_num_post = absint( $bakes_and_cakes_instance['num_post'] );
        $bakes_and_cakes_show_thumb = $bakes_and_cakes_instance['show_thumbnail'];
        $bakes_and_cakes_show_date = $bakes_and_cakes_instance['show_postdate'];
        
        $bakes_and_cakes_qry = new WP_Query( array(
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'posts_per_page'=> $bakes_and_cakes_num_post
        ) );
        if( $bakes_and_cakes_qry->have_posts() ){
            echo $bakes_and_cakes_args['before_widget'];
            echo $bakes_and_cakes_args['before_title'] . apply_filters('the_title', $bakes_and_cakes_title) . $bakes_and_cakes_args['after_title'];
            ?>
            <ul>
                <?php 
                while( $bakes_and_cakes_qry->have_posts() ){
                    $bakes_and_cakes_qry->the_post();
                ?>
                    <li>
                        <?php if( has_post_thumbnail() && $bakes_and_cakes_show_thumb ){ ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink();?>" class="post-thumbnail">
                                    <?php the_post_thumbnail( 'bakes-and-cakes-post-thumb' );?>
                                </a>
                            </div>
                        <?php }?>
                        <header class="entry-header">
                                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                    <div class="entry-meta">
                                    <?php if($bakes_and_cakes_show_date){ ?>
                                     <span class="posted-on"><a href="<?php the_permalink(); ?>">
                                        <time datetime="<?php printf( __( '%1$s', 'bakes-and-cakes' ), get_the_date('Y-m-d') ); ?>">
                                        <?php printf( __( '%1$s', 'bakes-and-cakes' ), get_the_date('F jS, Y') ); ?></time></a></span>
                                    <?php } ?>
                                    </div>
                         </header>                       
                    </li>        
                <?php    
                }
            ?>
            </ul>
            
            <?php
            echo $bakes_and_cakes_args['after_widget'];   
        }
        wp_reset_postdata();  
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $bakes_and_cakes_instance Previously saved values from database.
	 */
	public function form( $bakes_and_cakes_instance ) {
        
        $bakes_and_cakes_title = ! empty( $bakes_and_cakes_instance['title'] ) ? $bakes_and_cakes_instance['title'] : __( 'Recent Posts', 'bakes-and-cakes' );		
        $bakes_and_cakes_num_post = ! empty( $bakes_and_cakes_instance['num_post'] ) ? absint($bakes_and_cakes_instance['num_post']) : '3' ;
        $bakes_and_cakes_show_thumbnail = ! empty( $bakes_and_cakes_instance['show_thumbnail'] ) ? $bakes_and_cakes_instance['show_thumbnail'] : '';
        $bakes_and_cakes_show_postdate = ! empty( $bakes_and_cakes_instance['show_postdate'] ) ? $bakes_and_cakes_instance['show_postdate'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $bakes_and_cakes_title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php _e( 'Number of Posts', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_post' ); ?>" name="<?php echo $this->get_field_name( 'num_post' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $bakes_and_cakes_num_post ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $bakes_and_cakes_show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php _e( 'Show Post Thumbnail', 'bakes-and-cakes' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_postdate' ); ?>" name="<?php echo $this->get_field_name( 'show_postdate' ); ?>" type="checkbox" value="1" <?php checked( '1', $bakes_and_cakes_show_postdate ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_postdate' ); ?>"><?php _e( 'Show Post Date', 'bakes-and-cakes' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $bakes_and_cakes_new_instance Values just sent to be saved.
	 * @param array $bakes_and_cakes_old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $bakes_and_cakes_new_instance, $bakes_and_cakes_old_instance ) {
		$bakes_and_cakes_instance = array();
		
        $bakes_and_cakes_instance['title'] = ! empty( $bakes_and_cakes_new_instance['title'] ) ? strip_tags( $bakes_and_cakes_new_instance['title'] ) : __( 'Recent Posts', 'bakes-and-cakes' );
        $bakes_and_cakes_instance['num_post'] = intval( $bakes_and_cakes_new_instance['num_post'] ) ? absint($bakes_and_cakes_new_instance['num_post']) : '3' ;        
        $bakes_and_cakes_instance['show_thumbnail'] = ! empty( $bakes_and_cakes_new_instance['show_thumbnail'] ) ? esc_attr( $bakes_and_cakes_new_instance['show_thumbnail'] ) : '';
        $bakes_and_cakes_instance['show_postdate'] = ! empty( $bakes_and_cakes_new_instance['show_postdate'] ) ? esc_attr( $bakes_and_cakes_new_instance['show_postdate'] ) : '';
		return $bakes_and_cakes_instance;
	}

} // class Bakes_and_cakes_Recent_Post 


