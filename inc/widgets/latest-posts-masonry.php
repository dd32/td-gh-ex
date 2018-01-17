<?php
/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package best blog
 */



 if ( !class_exists( 'bestblog_post_masonry' ) ) {

    class bestblog_post_masonry extends WP_Widget {

      public function __construct() {
        parent::__construct(
          'latest-post-masonry',
          __( 'Bestblog - Blog Masonry Style', 'best-blog' ),
          array(
            'description' => __( '(blog masonry style) Displays latest posts or posts from a choosen category.(Home page & sidebar) ', 'best-blog' ),
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

        $show_post_row = ( ! empty( $instance['show_post_row'] ) ) ? wp_kses_post( $instance['show_post_row'] ) : '';
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

        <div class="lates-post-cardmission"  >
          <?php if( !empty($instance['title']) ): ?>
            <div class="grid-x grid-padding-x grid-padding-y ">
              <div class="cell small-24 ">
                <div class="block-title widget-title">
                  <h3 class="blog-title"><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
                </div>
              </div>
            </div>
          <?php endif;?>
          <div class="post-wrap-layout-2" >
            <div class="grid-x grid-padding-x grid-padding-y ">
              <?php if ( $latest_bloglist_posts -> have_posts() ) :
                while ( $latest_bloglist_posts -> have_posts() ) : $latest_bloglist_posts -> the_post(); ?>
                <div class="cell <?php echo $show_post_row;?> medium-12 small-24 ">
                  <div class="card card-blog">
                    <?php if ( has_post_thumbnail() ) { ?>
                      <div class="card-image">
                        <div class="post-thumb-overlay"></div>
                        <?php the_post_thumbnail( 'bestblog-small',array('class' => 'img','link_thumbnail' =>TRUE)  ); ?>
                        <div class="card-title">
                          <?php if ( 'large-22' == $instance['show_post_row'] ): ?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-1"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php else:?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php endif;?>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="card-content">
                      <?php if (! has_post_thumbnail() ) { ?>
                        <div class="card-title no-thumb">
                          <?php if ( 'large-22' == $instance['show_post_row'] ): ?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-1"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php else:?>
                          <?php the_title( sprintf( '<h3 class="post-title is-font-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                        <?php endif;?>
                        </div>
                      <?php } ?>
                      <h6 class="category text-info"><?php bestblog_category_widgtesmission(); ?></h6>
                      <div class="card-description">
                        <?php the_excerpt(); ?>
                      </div>
                      <div class="card-footer">
                        <div class="author">
                          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
                            <?php echo get_avatar(get_the_author_meta('ID'), '40'); ?>
                            <span><?php echo get_the_author();?></span>
                          </a>
                          </div>
                          <div class="stats">
                            <i class="fa fa-clock-o"></i> <?php echo bestblog_time_ago(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
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
  $instance[ 'show_post_row' ]	= wp_kses_post( $new_instance[ 'show_post_row' ] );

  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Latest Blog ',
 'sticky_posts' => 'true',
 'number_posts' => '5',
 'show_post_row'=>'large-8'

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
  <p>
  <label for="<?php echo $this->get_field_id('show_post_row'); ?>"><?php _e('Show post in row', 'best-blog') ?></label>
  <select id="<?php echo $this->get_field_id('show_post_row'); ?>" name="<?php echo $this->get_field_name('show_post_row'); ?>" class="widefat">
    <option value="large-22" <?php if ( 'large-22' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('one', 'best-blog') ?></option>
    <option value="large-12" <?php if ( 'large-12' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('two', 'best-blog') ?></option>
    <option value="large-8" <?php if ( 'large-8' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('three', 'best-blog') ?></option>
    <option value="large-6" <?php if ( 'large-6' == $instance['show_post_row'] ) echo 'selected="selected"'; ?>><?php esc_html_e('four', 'best-blog') ?></option>
  </select>
  </p>
  <?php
    }
  }
}


// register bestblog dual category posts widget
function bestblog_latest_post_masonry() {
    register_widget( 'bestblog_post_masonry' );
}
add_action( 'widgets_init', 'bestblog_latest_post_masonry' );
