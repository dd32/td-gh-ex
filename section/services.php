<?php
if ( 'yes' === $sample_services['services_enable'] ):
  $service_title = $sample_services['title'];
  $service_tagline = $sample_services['sub_title'];
  ?>
  <section class="services mgb-lg">
    <div class="container">
      <div class="main-title">
        <span class="sub-title"><?php echo esc_html($service_tagline);?></span>
        <h1 class="title"><?php echo esc_html($service_title);?></h1>
      </div>
      <div class="row">
       <?php if($sample_services['service_items']):
        foreach($sample_services['service_items'] as $key => $item):
          ?>
          <div class="col-xl-3 col-sm-6">
            <div class="s-holder">

              <div class="icon-holder">
                <i class="<?php echo esc_attr($item['service_icon']);?>" aria-hidden="true"></i>
              </div>
            
            <h4 class="title"><?php echo esc_html($item['service_title']);?></h4>
            <p><?php echo esc_html($item['service_description']);?></p>
          </div>
        </div>
        <?php 
      endforeach;
    endif;?>
  </div>
</div>
</section>
<?php endif;?>