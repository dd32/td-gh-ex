<?php if ( 'yes' === $sample_discover['discover_enable'] ):
  $discover_page = $sample_discover['discover_page_id'];
  $discover_img_url = get_the_post_thumbnail_url($discover_page);
  $discover_second_img_url = $sample_discover['discover_second_image'];
  $queried_post =  get_post($discover_page);
  $discover_btn_title  = $sample_discover['btn_title'];
  $discover_btn_url  = $sample_discover['btn_url'];?>
  <section class="discover mgb-lg">
    <div class="container">
      <div class="row">
        
        <div class="col-xl-6 col-lg-6">
          <div class="img-holder">
            <div class="first-img">
              <img src="<?php echo esc_url($discover_img_url);?>">
            </div>
            
            <div class="second-img">
              <?php echo wp_get_attachment_image( $discover_second_img_url['id'], 'large' );?>
              <!-- <img src="<?php //echo esc_url($discover_second_img_url['url']);?>" alt=""> -->
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6">
          <div class="content">
            <div class="main-title">
              <span class="sub-title"><?php echo esc_html($sample_discover['title']);?></span>
              <h1 class="title"><?php echo esc_html($queried_post->post_title);?></h1>
            </div>
            <p><?php echo esc_html($queried_post->post_content);?></p>
            <?php wp_reset_postdata(); ?>
            <a href="<?php echo esc_url($discover_btn_url['url']);?>" class="btn btn-lg"><?php echo esc_html($discover_btn_title);?></a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <?php endif;?>