<?php
if ( 'yes' === $sample_query['query_enable'] ):
  $query_tagline = $sample_query['title'];
  $query_title = $sample_query['query_page_id'];
  $query_shortcode = $sample_query['contact_shortcode'];
  $query_post = get_post($query_title);
  ?>
<section class="query mgb-lg">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="main-title">
          <span class="sub-title"><?php echo esc_html($query_tagline);?></span>
          <h1 class="title"><?php echo esc_html($query_post->post_title);?></h1>
        </div>
        <p><?php echo esc_html($query_post->post_content);?></p>
        <?php wp_reset_postdata(); ?>
      </div>
      <div class="col-xl-6 col-lg-6">
       <?php if($query_shortcode):
           echo do_shortcode($query_shortcode); 
        endif;?>
      </div>
    </div>
  </div>
</section>
<?php endif;?>