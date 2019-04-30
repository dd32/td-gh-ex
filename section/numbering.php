<?php
if ( 'yes' === $sample_numbering['numbering_enable'] ):
  $numbering_tagline = $sample_numbering['title'];
  $number = $sample_numbering['numbering_page_id'];
  $query_post = get_post( $number );
  $number_btn =  $sample_numbering['btn_title'];
  $number_url =  $sample_numbering['btn_url'];
  ?>
  <section class="numbering mgb-lg">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6">
          <div class="num-block">
            <div class="row">
              <?php 
              if( $sample_numbering['numbering_items']  ){ 
                foreach( $sample_numbering['numbering_items'] as $number ){ ?>
                  <div class="col-sm-6">
                    <div class="num-holder">
                      <span class="num"><?php echo absint( $number['numbering_no'] );?></span>
                      <span class="text"><?php echo esc_html( $number['numbering_title'] );?></span>
                    </div>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6">
          <div class="main-title">
            <span class="sub-title"><?php echo esc_html($numbering_tagline);?></span>
            <h1 class="title"><?php echo esc_html($query_post->post_title);?></h1>
          </div>
          <p><?php echo esc_html($query_post->post_content);?></p>
          <?php wp_reset_postdata(); ?>
          <?php if($number_url):?>
            <a href="<?php echo esc_url($number_url['url']);?>" class="btn btn-lg"><?php echo esc_html($number_btn);?></a>
          <?php endif;?>
        </div>
      </div>
    </div>
  </section>
  <?php endif;?>