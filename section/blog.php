<?php
if ( 'yes' === $sample_blog['blog_enable'] ):

  $blog_title = $sample_blog['title'];
  $blog_tagline = $sample_blog['sub_title'];
  $blog_more_detail_text = $sample_blog['more_detail_btn_text'];
  ?>
  <section class="afund mgb-lg">
    <div class="container">
      <div class="main-title">
        <span class="sub-title"><?php echo esc_html( $blog_tagline );?></span>
        <h1 class="title"><?php echo esc_html($blog_title);?></h1>
      </div>
      <div class="row">

        <?php
        $blog_catId = $sample_blog['blog_cat_id'];
        $blog_number = $sample_blog['no_of_post'];
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

          <div class="col-xl-4">
            <div class="card">
             <?php 
             if(has_post_thumbnail()):?>
              <div class="img-holder">
                <?php the_post_thumbnail();?>
              </div>
            <?php endif;
            ?>
            <div class="card-body">
              <div class="date-author">
                <span class="author"><?php best_charity_posted_by();?></span>
                <span class="date"><?php echo esc_html(get_post_time('F j, Y'));?></span>
              </div>
              <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              <?php the_excerpt();?>
            </div>
            <div class="card-footer">
              <a href="<?php the_permalink();?>" class="more-detail"><?php echo esc_html( $blog_more_detail_text );?></a>
              <span class="cmnt"><span class="fa fa-comment-o" aria-hidden="true"></span><?php echo esc_html(get_comments_number());?><?php esc_html_e( 'comments', 'best-charity' );?></span>
            </div>
          </div>
        </div>

      <?php endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>
<?php endif;?>