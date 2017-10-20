<?php
/**
 * latest post single Widget
 *
 * @since 1.0.0
 *
 * @package bestblog
 */



 if ( !class_exists( 'latest_post_single' ) ) {

    class latest_post_single extends WP_Widget {

      public function __construct() {
        parent::__construct(
          'latest-post-single',
          __( 'bestblog - News style', 'best-blog' ),
          array(
            'description' => __( '(News style) Displays latest posts or posts from a choosen category. ', 'best-blog' ),
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
        $viewall_text = ( ! empty( $instance['viewall_text'] ) ) ? $instance['viewall_text'] : '';
        // Latest Posts 1
        $latest_big_posts = new WP_Query(
          array(
            'cat'	                => $category,
            'posts_per_page'	    => 1,
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => $sticky_posts,
            )
        );

        echo $before_widget;
        ?>


  <div class="lates-post-warp" data-equalizer-watch>
    <?php if( !empty($instance['title']) ): ?>
      <div class="block-header-wrap">
        <div class="block-header-inner">
          <div class="block-title">
            <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
          </div>
        </div>
      </div>
    <?php endif;?>

    <div class="block-content-wrap">
      <div class="block-content-inner">
        <?php if ( $latest_big_posts -> have_posts() ) :
          while ( $latest_big_posts -> have_posts() ) : $latest_big_posts -> the_post(); ?>
          <?php  $postid = get_the_ID();
          $firstPosts[] = $postid;?>
          <article class="post-wrap-big ">
            <?php if ( has_post_thumbnail() ) { ?>
              <div class="post-thumb-outer">
                <div class="post-thumb-overlay"></div>
                <div class=" post-thumb thumbnail-resize">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'bestblog-medium' ); ?>
                  </a>
                </div>
              </div>
            <?php } ?>
            <div class="post-header-outer is-absolute">
              <div class="post-header">
                <div class="post-cat-info ">
                  <?php bestblog_category_list(); ?>
                </div>
                <?php the_title( sprintf( '<h3 class="post-title is-size-3 is-lite"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                <div class="post-meta-info ">
                  <div class="post-meta-info-left">
                    <span class="meta-info-el meta-info-author">
                      <a class="vcard author is-lite" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                        <?php the_author(); ?>
                      </a>
                    </span>
                    <span class="meta-info-el meta-info-date">
                      <time class="date is-lite update" ><?php the_time( get_option('date_format') ); ?></time>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>

      <?php
      $latest_list_posts = new WP_Query(
        array(
          'cat'	                => $category,
          'posts_per_page'	    => $number_posts,
          'post_status'           => 'publish',
          'ignore_sticky_posts'   => $sticky_posts,
          'post__not_in' => $firstPosts,
        )
      );
      ?>
      <?php if ( $latest_list_posts -> have_posts() ) :
        while ( $latest_list_posts -> have_posts() ) : $latest_list_posts -> the_post(); ?>
        <article class="post-list">
          <div class="post-thumb-outer">
            <?php the_post_thumbnail( 'bestblog-listpost-small' ); ?>
          </div>
          <div class="post-body">
            <?php the_title( sprintf( '<h3 class="post-title is-size-5"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            <div class="post-meta-info ">
              <span class="meta-info-el ">
                <i class="fa fa-clock-o"></i>
                <time>
                  <span><?php the_time( get_option('date_format') ); ?></span>
                </time>
              </span>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
      <?php if( !empty($instance['viewall_text']) ): ?>
        <?php
        $get_cat        = get_the_category($postid);
        $first_cat      = $get_cat[0];
        $category_name  = $first_cat->cat_name;
        $category_link  = get_category_link( $first_cat->cat_ID ); ?>

          <div class="viewall-text"><a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr( $category_name ); ?>"><button type="button" class="button shadow secondary"><?php echo  $instance['viewall_text']; ?></button></a></div>
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
  $instance[ 'viewall_text' ] = sanitize_text_field( $new_instance[ 'viewall_text' ] );

  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Latest News',
 'sticky_posts' => 'true',
 'number_posts' => '5',
 'viewall_text' => 'View All',

 );
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>
  <!-- Form for category 1 -->
  <h5><?php esc_html_e( 'News style', 'best-blog' ); ?></h5>
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
    <label for="<?php echo $this->get_field_id( 'viewall_text' ); ?>"><?php esc_html_e( 'View All Text:', 'best-blog' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'viewall_text' ); ?>" name="<?php echo $this->get_field_name( 'viewall_text' ); ?>" value="<?php echo esc_attr( $instance['viewall_text'] ); ?>"/>
  </p>
  <?php
    }
  }
}
// register bestblog dual category posts widget
function bestblog_latest_post_single() {
    register_widget( 'latest_post_single' );
}
add_action( 'widgets_init', 'bestblog_latest_post_single' );
