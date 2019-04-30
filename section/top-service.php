<?php
if ( 'yes' === $sample_top_service['top_service_enable'] ):?>
 <section class="t-services mgb-lg">
  <div class="container-fluid">
    <div class="row">
      <?php 
      for($i=0;$i<count($sample_top_service['service_items']);$i++){
        $service_page[$i]=$sample_top_service['service_items'][$i]['page_for_tit_desc'];
        $service_icon[$i]= $sample_top_service['service_items'][$i]['service_icon'];
      }

      $args = array (
        'post_type' => 'page',
        'posts_per_page'=>4,
        'post__in'         => ($service_page) ? ($service_page) : '',
        'orderby'           =>'post__in',
      );

      $serviceloop = new WP_Query($args);
      $j=0;

      if ($serviceloop->have_posts()) :  while ($serviceloop->have_posts()) : $serviceloop->the_post();?>
        <div class="col-xl-3 col-sm-6">
          <div class="t-holder">
            <div class="img-holder">
              <i class="<?php echo esc_attr($service_icon[$j]);?>" aria-hidden="true"></i>
            </div>
            <h4 class="title"><?php the_title();?></h4>
            <?php the_excerpt();?>
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