<?php if(get_theme_mod('a_portfolio_contact_section_enable')):?>
<!-- Contact Us -->
<section id="contact" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 wow fadeIn">
        <div class="section-title text-center">
          <?php
            $contact_title = get_theme_mod('a_portfolio_contact_page_title');
            $queried_post = get_post($contact_title);
          ?>
          <h2><?php echo esc_html($queried_post->post_title); ?></h2>
          <p><?php echo esc_html($queried_post->post_content); ?></p>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <!-- Google Map -->
    <div class="row">
      <!-- Contact Form -->
      <div class="col-md-5 col-sm-5 col-xs-12">
        <form class="form" method="post" action="#">
            <?php if (get_theme_mod('a_portfolio_contact_form_code')):
                echo do_shortcode(wp_kses_post(get_theme_mod('a_portfolio_contact_form_code'))) ; 
            endif; ?> 
        </form>
      </div>
      <!--/ End Contact Form -->

      <div class="col-md-7 col-sm-12 col-xs-12" >
         <div id="map">
           <?php if ( is_active_sidebar( 'google-map' ) ) { ?>
            <?php dynamic_sidebar( 'google-map' );?>
           <?php } ?>
         </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Contact Us -->
<?php endif;?>