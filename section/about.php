<?php
if ( 'yes' === $sample_about['about_enable'] ):
  $about_title =$sample_about['about_page_id'];
  $about_tagline = $sample_about['title'];
  $queried_post =  get_post($about_title);
  $img_url = get_the_post_thumbnail_url($about_title);
  $about_btn_title  = $sample_about['btn_title'];
  $about_btn_url  = $sample_about['btn_url'];
  $about_brand_tagline = $sample_about['brand_tagline'];
  $about_brand_title   = $sample_about['brand_title'];
  ?>
  <section class="about mgb-lg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="text-holder">
            <div class="main-title">
              <span class="sub-title"><?php echo esc_html($about_tagline);?></span>
              <h1 class="title"><?php echo esc_html($queried_post->post_title);?></h1>
            </div>
            <p><?php echo esc_html($queried_post->post_content);?></p>
            <?php wp_reset_postdata(); ?>
            <?php if($about_btn_url):?>
              <a href="<?php echo esc_url($about_btn_url['url']);?>" class="btn btn-lg"><?php echo esc_html($about_btn_title);?></a>
            <?php endif;?>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">        
          <div class="img-holder">
            <img src="<?php echo esc_url($img_url);?>" alt="">
          </div>
        </div>
        <div class="col-xl-4">
          <div class="bar-holder">
            <div class="main-title">
              <span class="sub-title"><?php echo esc_html($about_brand_tagline);?></span>
              <h1 class="title"><?php echo esc_html($about_brand_title);?></h1>
            </div>
            <?php
            if( $sample_about['brand_items']  ){ 
             foreach( $sample_about['brand_items'] as $brand ){ ?>
              <div class="candidatos">
                <div class="parcial">
                  <div class="info">
                    <div class="nome"><?php echo esc_html($brand['item_title']);?></div>
                    <div class="percentagem-num"><?php echo esc_html($brand['item_percentage']);?></div>
                  </div>
                  <div class="progressBar">
                    <div class="percentagem" style="width: <?php echo esc_attr($brand['item_percentage']);?>;"></div>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?> 
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif;?>