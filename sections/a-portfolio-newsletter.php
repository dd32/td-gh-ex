<?php if(get_theme_mod('a_portfolio_newsletter_section_enable')):?>
<!-- Newsletter -->
<section id="newsletter" class="wow fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?php
          $newsletter_title = get_theme_mod('a_portfolio_newsletter_page_title');
          $queried_post = get_post($newsletter_title);
        ?>
        <h2><?php echo esc_html($queried_post->post_title); ?></h2>
        <p><?php echo esc_html($queried_post->post_content); ?></p>
        <?php wp_reset_postdata(); ?>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="newsletter">
          <?php if (get_theme_mod('a_portfolio_newsletter_shortcode')):
              echo do_shortcode(wp_kses_post(get_theme_mod('a_portfolio_newsletter_shortcode'))); 
          endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Newslatter -->
<?php endif;?>