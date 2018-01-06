  <?php
  $orig_post = $post;
  global $post;
  $categories = get_the_category($post->ID);
  if ($categories) {
    $category_ids = array();
    foreach ($categories as $individual_category) {
      $category_ids[] = $individual_category->term_id;
    }
    $args=array(
      'category__in' => $category_ids,
      'post__not_in' => array($post->ID),
      'posts_per_page'=> 4, // Number of related posts that will be shown.
      'ignore_sticky_posts'   => true
    );
    $related_query = new wp_query($args);?>
    <div class="single-post-box-related">
      <div class="grid-x grid-padding-x grid-padding-y ">
        <div class="cell small-24 ">
          <div class="block-title">
            <h3 class="blog-title"><?php echo esc_attr__('You Might Also Like','best-blog'); ?></h3>
          </div>
        </div>
      </div>
      <div class="post-wrap-layout-2 ">
        <div class="grid-x grid-margin-x  ">
          <?php if ($related_query->have_posts()) : ?>
            <?php /* Start the Loop */ ?>
            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
              <div class="cell  large-12  medium-12 small-24 ">
                <div class="card card-blog">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <div class="card-image">
                      <?php the_post_thumbnail( 'bestblogtop-small',array('class' => 'img','link_thumbnail' =>TRUE)  ); ?>
                    </div>
                  <?php } ?>
                  <div class="card-content">
                    <h6 class="category text-info">
                      <?php
                      $categories = get_the_category();
                      $output = '';
                      $separator = '';
                      if (! empty($categories)) {
                        foreach ($categories as $category) {
                          $output .=
                          '<a class="hollow small button secondary radius " href="' . esc_url(get_category_link($category->term_id)) .
                          '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'best-blog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                        }
                      }
                      echo trim($output, $separator);
                      ?>
                    </h6>
                    <div class="card-title no-thumb">
                      <?php the_title( sprintf( '<h3 class="post-title is-font-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php }
