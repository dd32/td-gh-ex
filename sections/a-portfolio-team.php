<?php if(get_theme_mod('a_portfolio_team_section_enable')): ?>
<!-- Start Team -->
<section id="team" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 wow fadeIn">
        <div class="section-title text-center">
          <?php
            $team_title = get_theme_mod('a_portfolio_team_page_title');
            $queried_post = get_post($team_title);
          ?>
          <h2><?php echo esc_html($queried_post->post_title); ?></h2>
          <p><?php echo esc_html($queried_post->post_content); ?></p>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <div class="row"> 
      <div class="col-md-12 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.4s">
        <div class="team-slider">
          <?php for($i=1;$i<5;$i++){
                  $team[$i] = get_theme_mod('a_portfolio_team_page_'.$i);    
                  $teamposition[$i] = get_theme_mod('a_portfolio_team_position_'.$i);
            }
             $args = array (
                'post_type' => 'page',
                'posts_per_page' => $i,
                'post__in'      => $team,
                'orderby'        =>'post__in'
              );
            $teamloop = new WP_Query($args); $i=1;
          if ($teamloop->have_posts()) :  while ($teamloop->have_posts()) : $teamloop->the_post(); ?>
          <!-- Single Team -->
          <div class="team">
            <div class="team-head">
             <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('a-portfolio-team-thumb'); ?> 
            <?php endif; ?>
            </div>
             <div class="team-content">
              <div class="name">
                <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a><span><?php echo esc_html( $teamposition[$i] ); ?></span></h4>
              </div>
            </div>
          </div>
          <!--/ End Single Team -->
          <?php  $i=$i+1; endwhile;
              wp_reset_postdata();  
            endif; ?> 
        </div>
      </div>
   
    </div>
  </div>
</section>   
<!--/ End Team --> 
<?php endif;?>