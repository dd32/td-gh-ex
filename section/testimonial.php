<?php
if ( 'yes' === $sample_testimonial['testimonial_enable'] ):
  $testimonial_title = $sample_testimonial['title'];
  $testimonial_tagline = $sample_testimonial['sub_title'];
  ?>  
  <section class="testimonial mgb-lg">
    <div class="container">
      <div class="main-title">
        <span class="sub-title"><?php echo esc_html($testimonial_tagline);?></span>
        <h1 class="title"><?php echo esc_html($testimonial_title);?></h1>
      </div>
      <div class="content">
      <?php 
      for($i=0;$i<count($sample_testimonial['testimonials_items']);$i++){
        $testimonial_page[$i]=$sample_testimonial['testimonials_items'][$i]['testimonial_page'];
        $testimonial_position[$i]= $sample_testimonial['testimonials_items'][$i]['testimonial_position'];
      }

      $args = array (
        'post_type' => 'page',
        'posts_per_page'=>4,
        'post__in'         => ($testimonial_page) ? ($testimonial_page) : '',
        'orderby'           =>'post__in',
      );

      $testimonialloop = new WP_Query($args);
      $j=0;

      if ($testimonialloop->have_posts()) :  while ($testimonialloop->have_posts()) : $testimonialloop->the_post();?>
        <div class="content-holder">
         <?php the_excerpt();?>
         <div class="t-holder">
          <?php if(has_post_thumbnail()): ?>
            <div class="img">
              <?php the_post_thumbnail(); ?> 
            </div>
          <?php endif; ?>
          <div class="t-text">
            <span class="author"><?php the_title();?></span>
            <span class="prof"><?php echo esc_html($testimonial_position[$j]); ?></span>
          </div>
        </div>
      </div>
       <?php 
        $j=$j+1; endwhile;
        wp_reset_postdata();  
      endif; ?>
  </div>
</div>
</section>
<?php endif;?>