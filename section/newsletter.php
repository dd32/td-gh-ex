<?php
if ( 'yes' === $sample_newsletter['newsletter_enable'] ):
  $title = $sample_newsletter['title'];
  $shorcode = $sample_newsletter['newsletter_shortcode'];
  ?>
  <section class="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-6">
          <h2><?php echo esc_html($title);?></h2>
        </div>
        <div class="col-xl-7 col-lg-6">
          <?php
          if($shorcode):  
            echo do_shortcode($shorcode); 
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif;?>