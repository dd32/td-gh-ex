<?php if( get_theme_mod( 'a_portfolio_what_we_do_section_enable' ) ):?>
<!-- Start What we do -->
<section id="what-we-do">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="section-title text-center">
            <?php
              $what_we_do_title = get_theme_mod('a_portfolio_what_we_do_page_title');
              $queried_post = get_post($what_we_do_title);
            ?>
            <h2><?php echo esc_html($queried_post->post_title); ?></h2>
            <p><?php echo esc_html($queried_post->post_content); ?></p>
            <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
        $i=1;
        $what_we_do[1] = get_theme_mod('a_portfolio_what_we_do_page_1');
        $what_we_do[2] = get_theme_mod('a_portfolio_what_we_do_page_2');
        $what_we_do[3] = get_theme_mod('a_portfolio_what_we_do_page_3');
        $what_we_do[4] = get_theme_mod('a_portfolio_what_we_do_page_4');
        $what_we_do_title_icon[1] = get_theme_mod('a_portfolio_what_we_do_icon_1');
        $what_we_do_title_icon[2] = get_theme_mod('a_portfolio_what_we_do_icon_2');
        $what_we_do_title_icon[3] = get_theme_mod('a_portfolio_what_we_do_icon_3');
        $what_we_do_title_icon[4] = get_theme_mod('a_portfolio_what_we_do_icon_4');

          $args = array (
              'post_type' => 'page',
              'post_per_page' => 4,
              'post__in'         => $what_we_do,
              'orderby'           =>'post__in',
            );

          $what_we_do_title_icon_loop = new WP_Query($args);

          
          if ($what_we_do_title_icon_loop->have_posts()) :  while ($what_we_do_title_icon_loop->have_posts()) : $what_we_do_title_icon_loop->the_post(); ?>
          <!-- Single What we do -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="single-what-we-do">
              <i class="fa <?php echo esc_attr($what_we_do_title_icon[$i]); ?>"></i>
              <h2><?php the_title(); ?></h2>
              <?php the_excerpt(); ?>
            </div>
          </div>
          <!--/ End Single What we do -->
          <?php $i=$i+1;?> 
                <?php  endwhile; 
                  wp_reset_postdata();
          endif; ?>
    </div>
  </div>
</section>
<!--/ End What we do -->
<?php endif;?>