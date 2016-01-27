<?php
/**
 * Widget Featured Post
 *
 * @package Benevolent
 */
 
// register Benevolent_Featured_Post widget
function benevolent_register_featured_post_widget() {
    register_widget( 'Benevolent_Featured_Post' );
}
add_action( 'widgets_init', 'benevolent_register_featured_post_widget' );
 
 /**
 * Adds Benevolent_Featured_Post widget.
 */
class Benevolent_Featured_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'benevolent_featured_post', // Base ID
			__( 'RARA: Featured Post', 'benevolent' ), // Name
			array( 'description' => __( 'A Featured Post Widget', 'benevolent' ), ) // Args
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
        $benevolent_post_id = intval( $benevolent_instance['post_list'] );
        $benevolent_read_more = $benevolent_instance['readmore'];
        $benevolent_excerpt_char = absint( $benevolent_instance['excerpt_char'] );
        $benevolent_show_thumb = $benevolent_instance['show_thumbnail'];
        
        if( get_post_type( $benevolent_post_id ) == 'post' ){
            $benevolent_qry = new WP_Query( "p=$benevolent_post_id" );
        }else{
            $benevolent_qry = new WP_Query( "page_id=$benevolent_post_id" );
        }
        if( $benevolent_qry->have_posts() ){
            echo $benevolent_args['before_widget'];
            while( $benevolent_qry->have_posts() ){
                $benevolent_qry->the_post();
                echo $benevolent_args['before_title'] . apply_filters('the_title', get_the_title()) . $benevolent_args['after_title']; 
            ?>
                <?php if( has_post_thumbnail() && $benevolent_show_thumb ){ ?>                    
                <div class="img-holder">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'benevolent-featured-post' ); ?>
                    </a>
                </div>    				
                <?php } ?>
                <div class="text-holder">
                    <?php echo wpautop( benevolent_excerpt( get_the_content(), $benevolent_excerpt_char, '...', false, false ) );?>
                    <a href="<?php the_permalink();?>" class="readmore"><?php echo esc_attr( $benevolent_read_more );?></a>
                </div>        
            <?php    
            }
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
		$benevolent_postlist[0] = array(
    		'value' => 0,
    		'label' => __('--choose--', 'benevolent'),
    	);
    	$benevolent_arg = array('posts_per_page'   => -1, 'post_type' => array( 'post', 'page' ));
    	$benevolent_posts = get_posts($benevolent_arg); $benevolent_i = 1;
    	
        foreach( $benevolent_posts as $benevolent_post ){ 
    		$benevolent_postlist[$benevolent_post->ID] = array(
    			'value' => $benevolent_post->ID,
    			'label' => $benevolent_post->post_title
    		);
    		$benevolent_i++;
    	}
        
        $benevolent_read_more = !empty( $benevolent_instance['readmore'] ) ? $benevolent_instance['readmore'] : __( 'Read More', 'benevolent' );
		
        $benevolent_excerpt_char = !empty( $benevolent_instance['excerpt_char'] ) ? absint($benevolent_instance['excerpt_char']) : 200 ;
        
        $benevolent_show_thumbnail = !empty( $benevolent_instance['show_thumbnail'] ) ? $benevolent_instance['show_thumbnail'] : '' ;
        $benevolent_post_list = !empty( $benevolent_instance['post_list'] ) ? $benevolent_instance['post_list'] : 0 ;
        ?>
		<p>
            <label for="<?php echo $this->get_field_id( 'post_list' ); ?>"><?php esc_html_e( 'Posts', 'benevolent' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'post_list' ); ?>" id="<?php echo $this->get_field_id( 'post_list' ); ?>" class="widefat">
				<?php
				foreach ( $benevolent_postlist as $benevolent_single_post ) { ?>
					<option value="<?php echo $benevolent_single_post['value']; ?>" id="<?php echo $this->get_field_id( $benevolent_single_post['label'] ); ?>" <?php selected( $benevolent_single_post['value'], $benevolent_post_list ); ?>><?php echo $benevolent_single_post['label']; ?></option>
				<?php } ?>
			</select>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'readmore' ); ?>"><?php esc_html_e( 'Read More Text', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'readmore' ); ?>" name="<?php echo $this->get_field_name( 'readmore' ); ?>" type="text" value="<?php echo esc_attr( $benevolent_read_more ); ?>" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'excerpt_char' ); ?>"><?php esc_html_e( 'Excerpt Character', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'excerpt_char' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_char' ); ?>" type="text" value="<?php echo esc_attr( $benevolent_excerpt_char ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $benevolent_show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'benevolent' ); ?></label>
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
		
        $benevolent_instance['readmore'] = !empty( $benevolent_new_instance['readmore'] ) ? strip_tags( $benevolent_new_instance['readmore'] ) : __( 'Read More', 'benevolent' );
        $benevolent_instance['excerpt_char'] = !empty( $benevolent_new_instance['excerpt_char'] ) ? absint($benevolent_new_instance['excerpt_char']) : 200 ;
        $benevolent_instance['post_list'] = !empty( $benevolent_new_instance['post_list'] ) ? esc_attr( $benevolent_new_instance['post_list'] ) : '';
        $benevolent_instance['show_thumbnail'] = !empty( $benevolent_new_instance['show_thumbnail'] ) ? esc_attr( $benevolent_new_instance['show_thumbnail'] ) : '';
		return $benevolent_instance;
	}

} // class Benevolent_Featured_Post