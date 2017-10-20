<div class="single-post-box-related " >
    <div class="box-related-header block-header-wrap">
        <div class="block-header-inner">
            <div class="block-title">
                <h3>You Might Also Like</h3></div>
        </div>
    </div>
    <div class="block-content-wrap ">
    <div class="grid-x grid-margin-x medium-margin-collapse ">
      <?php
      $category_show = get_theme_mod( 'category_toppost_show');
      $post_order_by = get_theme_mod( 'top_post_order_by', array( 'none', 'date','ID','author','title','rand' ) );

      $args=array(
                  'post_type' => 'post',
                  'posts_per_page'=>4,
                  'cat' => $category_show,
                  'orderby' => $post_order_by,
                  'ignore_sticky_posts'   => true
      );
      $top_right_post = new WP_Query($args);?>


          <?php if ( $top_right_post->have_posts() ) : ?>
            <?php /* Start the Loop */ ?>
            <?php while ( $top_right_post->have_posts() ) : $top_right_post->the_post(); ?>
            <?php $featured_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'bestblogtop-medium' );   ?>
            <div class="cell large-6 medium-6 small-12  ">
            <article class="post-wrap ">
              <div class="post-image-warp">
                <div class="post-thumb-overlay"></div>
                <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title(  ) );?>" rel="bookmark">
                  <span class="thumbnail-post">
                    <img class="thumbnail" src="<?php echo esc_url( $featured_img_url ); ?>"  alt="<?php echo esc_attr( get_the_title(  ) );?>">
                  </span>
                </a>
              </div>
              <div class="post-header-outer  is-absolute ">
                <div class="post-header">
                  <?php if( has_category() ) { ?>
                    <div class="post-cat-info ">
                      <?php bestblog_firstcategory_link(); ?>
                    </div>
                  <?php } ?>
                  <?php the_title( sprintf( '<h3 class="post-title is-size-4 entry-title is-lite"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                  <div class="post-meta-info ">
                    <span class="meta-info-el meta-info-author">
                      <a class="vcard author is-lite" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                        <?php the_author(); ?>
                      </a>
                    </span>
                    <span class="meta-info-el meta-info-date ">
                      <time class="date is-lite update" >
                        <span><?php the_time( get_option('date_format') ); ?></span>
                      </time>
                    </span>
                  </div>
                </div>
              </div>
            </article>
          </div>
          <?php endwhile; ?>
        <?php else : ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
</div>
</div>
</div>
