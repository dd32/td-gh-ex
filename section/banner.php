<?php
if ( 'yes' === $sample_banner['banner_enable'] ):
$banner_page = $sample_banner['banner_page_id'];
$banner_img_url = get_the_post_thumbnail_url($banner_page);
$queried_post =  get_post($banner_page);
$banner_btn_title  = $sample_banner['btn_title'];
$banner_btn_url  =$sample_banner['btn_url'];?>
<section class="banner">
  <div class="item">
    <img src="<?php echo esc_url($banner_img_url);?>" alt="">
    <div class="container">
      <div class="caption">
        <div class="main-title">
          <span class="sub-title"><?php echo esc_html($sample_banner['title']);?></span>
          <h1 class="title"><?php echo esc_html($queried_post->post_title);?></h1>
        </div>
        <p><?php echo esc_html($queried_post->post_content);?></p>
        <a href="<?php echo esc_url($banner_btn_url['url']);?>" class="donate-btn btn"><?php echo esc_html($banner_btn_title);?></a>
      </div>
    </div>
  </div>
</section>
<?php endif;?>