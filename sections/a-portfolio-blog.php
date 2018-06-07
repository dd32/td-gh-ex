<?php if( get_theme_mod( 'a_portfolio_blog_section_enable' ) ):?>
<!-- Start blog -->
<section id="blog" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12  wow fadeIn">
        <div class="section-title text-center">
          <?php
            $blog_title = get_theme_mod('a_portfolio_blog_page');
            $queried_post = get_post($blog_title);
          ?>
          <h2><?php echo esc_html($queried_post->post_title); ?></h2>
          <p><?php echo esc_html($queried_post->post_content); ?></p>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <div class="row">
        <?php
        $blog_catId = esc_attr(get_theme_mod( 'a_portfolio_blog_category_id'));
        $blog_number = get_theme_mod('a_portfolio_blog_number');
        $args = array(
        'post_type' => 'post',
        'posts_per_page' => $blog_number,
        'post_status' => 'publish',
        'cat' => $blog_catId,
              );
        $blogloop = new WP_Query($args);
        while ($blogloop->have_posts()) : 
          $blogloop->the_post(); 
          ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <!-- Single blog -->
            <div class="blog">
              <div class="blog-head">
                <?php if(has_post_thumbnail()): ?>
                <?php   $blog_img_url = get_the_post_thumbnail_url($post->ID, 'a-portfolio-blog-thumb2');  ?>
                  <img src="<?php echo esc_url($blog_img_url); ?>"/>
                <?php endif; ?> 
                <a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-paper-plane"></i></a>
              </div>
              <div class="blog-content">
               <h2><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h2>
                <div class="meta">
                  <span><i class="fa fa-list"></i><a href="#"><?php a_portfolio_posted_by();?></a></span>
                  <span><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'F j, Y'); ?></span>
                  <span><i class="fa fa-heart-o"></i><a href="#"><?php echo esc_html(get_comments_number());?></a></span>
                </div>
                <?php the_content();?>
                <a href="<?php the_permalink(); ?>" class="btn"><?php  echo esc_html__( 'Read More', 'a-portfolio' );?> <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>  
            <!--/ End Single blog -->
        </div>
        <?php endwhile;
          wp_reset_postdata();
        ?>
    </div>
  </div>
</section>
<!--/ End blog -->
<?php endif;?>