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

function widget($avocation_args, $avocation_lp_instance)
{
extract($avocation_args, EXTR_SKIP);

echo $before_widget;
$avocation_lp_title = empty($avocation_lp_instance['title']) ? ' ' : apply_filters('widget_title', $avocation_lp_instance['title']);

if (!empty($avocation_lp_title))
echo $before_title . $avocation_lp_title . $after_title;;
  $avocation_lp_show_date = isset( $avocation_lp_instance['show_date'] ) ? $avocation_lp_instance['show_date'] : false;
  $avocation_lp_number = ( ! empty( $avocation_lp_instance['number'] ) ) ? absint( $avocation_lp_instance['number'] ) : 10;


$avocation_query = new WP_Query( apply_filters( 'widget_posts_args', 
										array( 'posts_per_page' => $avocation_lp_number, 
										'no_found_rows' => true, 
										'post_status' => 'publish', 
										'ignore_sticky_posts' => true,
										'meta_query' => array(
												array(
												'key' => '_thumbnail_id',
												'compare' => 'EXISTS'
													),
												)
										 ) ) );?>
<ul>
		<?php if ($avocation_query->have_posts()) :
			while ( $avocation_query->have_posts() ) : $avocation_query->the_post(); ?>
			<li>
				<div class="popular-post">
				
						
            		<a href="<?php echo get_permalink(); ?>">
            	 <?php if ( has_post_thumbnail() ) : ?>
						 <?php the_post_thumbnail( 'avocation-latest-posts-widget', array( 'alt' => the_title_attribute(), 'class' => 'img-responsive') ); ?>
					<?php endif; ?>	
					
             	
						</a>
						
						
					
					<div class="blog-date">					
						 <a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php the_title_attribute(); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a> 
						    <?php if ( $avocation_lp_show_date ) : ?>          
								<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_date(); ?></a>
								
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
