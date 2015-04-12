<?php
/*
 * avocation Popular Post
*/
add_action( 'widgets_init', 'avocation_widget_post' );

function avocation_widget_post() {
    register_widget( 'LatestPostWidget' );
}

class LatestPostWidget extends WP_Widget
{
function LatestPostWidget()
{
$avocation_lp_widget_ops = array('classname' => 'LatestPostWidget', 'description' => 'Displays a Latest post with thumbnail' );
$this->WP_Widget('LatestPostWidget', 'avocation Latest Post', $avocation_lp_widget_ops);
}

function form($avocation_lp_instance)
{
$avocation_lp_instance = wp_parse_args( (array) $avocation_lp_instance, array( 'title' => '' ) );
$avocation_lp_title = $avocation_lp_instance['title'];
$avocation_lp_number = isset( $avocation_lp_instance['number'] ) ? absint( $avocation_lp_instance['number'] ) : 5;
$avocation_lp_show_date = isset( $avocation_lp_instance['show_date'] ) ? (bool) $avocation_lp_instance['show_date'] : false; 
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'avocation' ); ?> <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($avocation_lp_title); ?>" /></label></p>
 <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'avocation' ); ?></label>
<input id="<?php echo $this->get_field_id( 'number' ); ?>" maxlength="2" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $avocation_lp_number; ?>" size="3" /></p> 
 <p><input class="checkbox" type="checkbox" <?php checked( $avocation_lp_show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
 <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'avocation' ); ?></label></p>
<?php
}

function update($avocation_lp_new_instance, $avocation_lp_old_instance)
{
  $avocation_lp_instance = $avocation_lp_old_instance;
        $avocation_lp_instance['title'] = sanitize_text_field(strip_tags($avocation_lp_new_instance['title']));
        $avocation_lp_instance['number'] = (int) $avocation_lp_new_instance['number']; 
       
        $avocation_lp_instance['show_date'] = (bool) $avocation_lp_new_instance['show_date'];
		return $avocation_lp_instance;

}

function widget($args, $avocation_lp_instance)
{
extract($args, EXTR_SKIP);

echo $before_widget;
$avocation_lp_title = empty($avocation_lp_instance['title']) ? ' ' : apply_filters('widget_title', $avocation_lp_instance['title']);

if (!empty($avocation_lp_title))
echo $before_title . $avocation_lp_title . $after_title;;
  $avocation_lp_show_date = isset( $avocation_lp_instance['show_date'] ) ? $avocation_lp_instance['show_date'] : false;
  $avocation_lp_number = ( ! empty( $avocation_lp_instance['number'] ) ) ? absint( $avocation_lp_instance['number'] ) : 10;


$query = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $avocation_lp_number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );?>
<ul>
		<?php if ($query->have_posts()) :
			while ( $query->have_posts() ) : $query->the_post(); ?>
			<li>
				<div class="popular-post">
				
						<a href="<?php echo get_permalink(); ?>">
            	
							<?php $avocation_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'avocation-latest-posts-widget'); ?>
				
							<?php if($avocation_image != "") 
								  { ?>
								<img src="<?php echo esc_url($avocation_image[0]); ?>" width="50" height="50" class="img-responsive" alt="<?php the_title(); ?>"/>
							<?php } 
							else
							{ ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/image.jpeg" height="50px" width="50px" alt="<?php echo get_the_title(); ?>" class="img-responsive" />
							<?php } ?>
             	
						</a>
						
					
					<div class="blog-date">					
						 <a href="<?php the_permalink() ?>" title="<?php echo  get_the_title() ? get_the_title() : get_the_ID(); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a> 
						    <?php if ( $avocation_lp_show_date ) : ?>          
								<a href=""><?php echo get_the_date(); ?></a>
								
							<?php endif; ?>
					</div>
				</div>
                
          </li>
       <?php endwhile; endif; // end of the loop.?>
</ul>
<?php echo $after_widget;
}

}
add_action( 'widgets_init', create_function('', 'return register_widget("LatestPostWidget");') );
?>