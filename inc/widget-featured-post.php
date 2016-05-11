<?php
/**
 * Widget Featured Post
 *
 * @package App_Landing_Page
 */
 
// register App_Landing_Page_Featured_Post widget
function app_landing_page_register_featured_post_widget() {
    register_widget( 'app_landing_page_Featured_Post' );
}
add_action( 'widgets_init', 'app_landing_page_register_featured_post_widget' );
 
 /**
 * Adds App_Landing_Page_Featured_Post widget.
 */
class App_Landing_Page_Featured_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'app_landing_page_featured_post', // Base ID
			__( 'RARA: Featured Post', 'app-landing-page' ), // Name
			array( 'description' => __( 'A Featured Post Widget', 'app-landing-page' ), ) // Args
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
        $app_landing_page_post_id = intval( $app_landing_page_instance['post_list'] );
        $app_landing_page_read_more = $app_landing_page_instance['readmore'];
        $app_landing_page_excerpt_char = absint( $app_landing_page_instance['excerpt_char'] );
        $app_landing_page_show_thumb = $app_landing_page_instance['show_thumbnail'];
        
        if( get_post_type( $app_landing_page_post_id ) == 'post' ){
            $app_landing_page_qry = new WP_Query( "p=$app_landing_page_post_id" );
        }else{
            $app_landing_page_qry = new WP_Query( "page_id=$app_landing_page_post_id" );
        }
        if( $app_landing_page_qry->have_posts() ){
            echo $app_landing_page_args['before_widget'];
            while( $app_landing_page_qry->have_posts() ){
                $app_landing_page_qry->the_post();
                echo $app_landing_page_args['before_title'] . apply_filters('the_title', get_the_title()) . $app_landing_page_args['after_title']; 
            ?>
                <?php if( has_post_thumbnail() && $app_landing_page_show_thumb ){ ?>                    
                <div class="img-holder">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'app-landing-page-featured-post' ); ?>
                    </a>
                </div>    				
                <?php } ?>
                <div class="text-holder">
                    <?php echo wpautop( app_landing_page_excerpt( get_the_content(), $app_landing_page_excerpt_char, '...', false, false ) );?>
                    <a href="<?php the_permalink();?>" class="readmore"><?php echo esc_attr( $app_landing_page_read_more );?></a>
                </div>        
            <?php    
            }
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
		$app_landing_page_postlist[0] = array(
    		'value' => 0,
    		'label' => __('--choose--', 'app-landing-page'),
    	);
    	$app_landing_page_arg = array('posts_per_page'   => -1, 'post_type' => array( 'post', 'page' ));
    	$app_landing_page_posts = get_posts($app_landing_page_arg); $app_landing_page_i = 1;
    	
        foreach( $app_landing_page_posts as $app_landing_page_post ){ 
    		$app_landing_page_postlist[$app_landing_page_post->ID] = array(
    			'value' => $app_landing_page_post->ID,
    			'label' => $app_landing_page_post->post_title
    		);
    		$app_landing_page_i++;
    	}
        
        $app_landing_page_read_more = !empty( $app_landing_page_instance['readmore'] ) ? $app_landing_page_instance['readmore'] : __( 'Read More', 'app-landing-page' );
		
        $app_landing_page_excerpt_char = !empty( $app_landing_page_instance['excerpt_char'] ) ? absint($app_landing_page_instance['excerpt_char']) : 200 ;
        
        $app_landing_page_show_thumbnail = !empty( $app_landing_page_instance['show_thumbnail'] ) ? $app_landing_page_instance['show_thumbnail'] : '' ;
        $app_landing_page_post_list = !empty( $app_landing_page_instance['post_list'] ) ? $app_landing_page_instance['post_list'] : 0 ;
        ?>
		<p>
            <label for="<?php echo $this->get_field_id( 'post_list' ); ?>"><?php esc_html_e( 'Posts', 'app-landing-page' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'post_list' ); ?>" id="<?php echo $this->get_field_id( 'post_list' ); ?>" class="widefat">
				<?php
				foreach ( $app_landing_page_postlist as $app_landing_page_single_post ) { ?>
					<option value="<?php echo $app_landing_page_single_post['value']; ?>" id="<?php echo $this->get_field_id( $app_landing_page_single_post['label'] ); ?>" <?php selected( $app_landing_page_single_post['value'], $app_landing_page_post_list ); ?>><?php echo $app_landing_page_single_post['label']; ?></option>
				<?php } ?>
			</select>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'readmore' ); ?>"><?php esc_html_e( 'Read More Text', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'readmore' ); ?>" name="<?php echo $this->get_field_name( 'readmore' ); ?>" type="text" value="<?php echo esc_attr( $app_landing_page_read_more ); ?>" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'excerpt_char' ); ?>"><?php esc_html_e( 'Excerpt Character', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'excerpt_char' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_char' ); ?>" type="text" value="<?php echo esc_attr( $app_landing_page_excerpt_char ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $app_landing_page_show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'app-landing-page' ); ?></label>
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
		
        $app_landing_page_instance['readmore'] = !empty( $app_landing_page_new_instance['readmore'] ) ? strip_tags( $app_landing_page_new_instance['readmore'] ) : __( 'Read More', 'app-landing-page' );
        $app_landing_page_instance['excerpt_char'] = !empty( $app_landing_page_new_instance['excerpt_char'] ) ? absint($app_landing_page_new_instance['excerpt_char']) : 200 ;
        $app_landing_page_instance['post_list'] = !empty( $app_landing_page_new_instance['post_list'] ) ? esc_attr( $app_landing_page_new_instance['post_list'] ) : '';
        $app_landing_page_instance['show_thumbnail'] = !empty( $app_landing_page_new_instance['show_thumbnail'] ) ? esc_attr( $app_landing_page_new_instance['show_thumbnail'] ) : '';
		return $app_landing_page_instance;
	}

} // class App_Landing_Page_Featured_Post