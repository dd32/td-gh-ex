<?php if(get_theme_mod( 'a_portfolio_testimonial_section_enable')):?>
<!-- Start Testimonials -->
<section id="testimonial">
    <div class="container">
         <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-title text-center">
              <h2><?php echo esc_html( get_theme_mod( 'a_portfolio_testimonial_title' ) );?></h2>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="testimonial-slider">
                      <?php
                      $i=1;
                      for($i=1;$i<7;$i++){
                        $testimonial[$i] = get_theme_mod('a_portfolio_testimonial_page_'.$i);    
                        $testimonialposition[$i] = get_theme_mod('a_portfolio_testimonial_position_'.$i);
                      }
                        $args = array (
                            'post_type' => 'page',
                            'posts_per_page' => $i,
                            'post__in'      => $testimonial,
                            'orderby'        =>'post__in',
                          );
                        $testimonialloop = new WP_Query($args);
                        if ($testimonialloop->have_posts()) :  while ($testimonialloop->have_posts()) : $testimonialloop->the_post(); $k=1; ?>
                        <!-- Single Testimonial -->
                        <div class="testimonial">
                            <div class="pic float-left">
                              <?php if(has_post_thumbnail()): ?>
                              <?php the_post_thumbnail(); ?> 
                          <?php endif; ?>
                            </div>
                            <div class="testimonial-content float-left text-center">
                              <span class="post"><?php echo esc_html($testimonialposition[$k]); ?></span>
                              <h3 class="title"><?php the_title(); ?></h3>
                               <?php the_content(); ?>
                             </div>
                        </div>
                        <!--/ End Single Testimonial -->  
                    <?php  $k=$k+1; endwhile;
                          wp_reset_postdata();  
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Testimonial -->
<?php endif;?>