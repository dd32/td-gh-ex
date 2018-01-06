<?php
/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package best blog
 */



 if ( !class_exists( 'bestblog_latest_post_blog' ) ) {

    class bestblog_latest_post_blog extends WP_Widget {

      public function __construct() {
        parent::__construct(
          'latest-post-bloglist',
          __( 'Bestblog - Blog List Style', 'best-blog' ),
          array(
            'description' => __( '(blog List style) Displays latest posts or posts from a choosen category.(Home page & sidebar) ', 'best-blog' ),
            'customize_selective_refresh' => true,
          )
        );
      }

      /**
      * Display Widget
      *
      * @param $args
      * @param $instance
      */
      function widget($args, $instance) {
        extract($args);

        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 3;
        $sticky_posts = ( isset( $instance['sticky_posts'] ) ) ? $instance['sticky_posts'] : true;
        $category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
        // Latest Posts 1
        if (true == $sticky_posts ) :
        $sticky = get_option( 'sticky_posts' );
        else:
          $sticky ='';
        endif;
        $latest_bloglist_posts = new WP_Query(
          array(
            'cat'	                => $category,
            'posts_per_page'	    => $number_posts,
            'post_status'           => 'publish',
            'post__not_in' => $sticky,


            )
        );

        echo $before_widget;
        ?>

        <div class="lates-post-bloglist"  >
          <?php if( !empty($instance['title']) ): ?>
            <div class="block-header-wrap">
              <div class="block-header-inner">
                <div class="block-title">
                  <h3 class="blog-title margin-bottom-2"><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
                </div>
              </div>
            </div>
          <?php endif;?>
          <?php if ( $latest_bloglist_posts -> have_posts() ) :
            while ( $latest_bloglist_posts -> have_posts() ) : $latest_bloglist_posts -> the_post(); ?>
            <article class=" post-wrap-layout-1 radius" >
          		<div class="grid-x grid-padding-x grid-padding-y ">
          		<?php if ( has_post_thumbnail() ) { ?>
          			<div class="large-10 medium-10 small-24 align-self-middle">
          				<div class="post-thumb-warp">
          					<div class="post-thumb">
          						<?php the_post_thumbnail( 'bestblogtop-medium',array('class' => 'object-fit-images','link_thumbnail' =>TRUE)  ); ?>
          					</div>
          				</div>
          			</div>
          		<?php } ?>
          		<div class="large-auto medium-auto small-24 cell align-self-middle ">
          			<div class="post-body-warp">
          				<div class="post-header-warp">
          				<div class="entry-category">
          					<div class="meta-info meta-info-cat is-font-size-6">
          						<?php bestblog_category_list(); ?>
          					</div>
          				</div>
          					<?php the_title( sprintf( '<h3 class="post-title is-font-size-3"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
          					<div class="entry-category">
          							<?php echo bestblog_time_link(); ?>
          					</div>
          				</div>
          					<div class="post-excerpt">
          						<?php the_excerpt(); ?>
          					</div>
          			</div>
          		</div>
          	</div>
          	</article>

          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>

  <?php
  echo $after_widget;
  }



public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;
  $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
  $instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
  $instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
  $instance[ 'sticky_posts' ] = (bool)$new_instance[ 'sticky_posts' ];

  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Latest Blog ',
 'sticky_posts' => 'true',
 'number_posts' => '5',

 );
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>

  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'best-blog' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
  </p>
  <p>
    <label><?php esc_html_e( 'Select a post category', 'best-blog' ); ?></label>
    <?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts' ) ); ?>
  </p>

  <p>
    <input type="checkbox" <?php checked( $instance['sticky_posts'], true ) ?> class="checkbox" id="<?php echo $this->get_field_id('sticky_posts'); ?>" name="<?php echo $this->get_field_name('sticky_posts'); ?>" />
    <label for="<?php echo $this->get_field_id('sticky_posts'); ?>"><?php esc_html_e( 'Hide sticky posts.', 'best-blog' ); ?></label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number of posts:', 'best-blog' ); ?></label>
    <input type="number" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" value="<?php echo absint( $instance['number_posts'] ); ?>" size="3"/>
  </p>
  <?php
    }
  }
}


// register bestblog dual category posts widget
function bestblog_latest_post_blog() {
    register_widget( 'bestblog_latest_post_blog' );
}
add_action( 'widgets_init', 'bestblog_latest_post_blog' );
