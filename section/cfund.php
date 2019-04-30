<?php
if ( 'yes' === $sample_cfund['cfund_enable'] ):
  $cfund_title = $sample_cfund['title'];
  $cfund_tagline = $sample_cfund['sub_title'];
  ?>
  <section class="cfund mgb-lg">
    <div class="container">
      <div class="main-title">
        <span class="sub-title"><?php echo esc_html( $cfund_tagline );?></span>
        <h1 class="title"><?php echo esc_html( $cfund_title );?></h1>
      </div>
      <div class="row">
        <?php
        $cfund_catId = $sample_cfund['cfund_cat_id'];
        $cfund_number = $sample_cfund['no_of_post'];
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => $cfund_number,
          'post_status' => 'publish',
          'cat' => $cfund_catId,
        );

        $cfundloop = new WP_Query($args);

        while ($cfundloop->have_posts()) : 
          $cfundloop->the_post(); 
          ?>
          <div class="col-xl-3">
            <div class="thumb">
              <?php if(has_post_thumbnail()): ?>
                <div class="img-holder">
                  <?php the_post_thumbnail(); ?>
                </div>
              <?php endif;?>  
              <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              <?php the_excerpt();?>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </section>
  <?php endif;?>