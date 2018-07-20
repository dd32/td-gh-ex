</div>
<footer class="footer">
  <div class="container">
    <div class="row">      
      <?php $options = get_option( 'faster_theme_options' ); 
      if(get_theme_mod('hideFooterWidgetBar','1') == 1): ?>
      <aside class="col-md-3 footer-separator widget_recent_entries" id="recent-posts-3">
      	<?php if ( is_active_sidebar( 'footer-area-1' ) ) : dynamic_sidebar( 'footer-area-1' ); endif; ?>
      </aside>
      <aside class="col-md-3 footer-separator widget_recent_comments" id="recent-comments-2">
        <?php if ( is_active_sidebar( 'footer-area-2' ) ) : dynamic_sidebar( 'footer-area-2' ); endif; ?>
      </aside>
      <aside class="col-md-3 footer-separator widget_text" id="text-3">
        <?php if ( is_active_sidebar( 'footer-area-3' ) ) : dynamic_sidebar( 'footer-area-3' ); endif; ?>
      </aside>
      <aside class="col-md-3 footer-separator" id="follow_us">
      <?php $social_flag = 0;
                    for ($i=1; $i <= 4; $i++) { 
                        if(get_theme_mod('social_icon'.$i) != '' && get_theme_mod('social_icon_link'.$i) != ''){
                            $social_flag++;
                        }
                    }
        if($social_flag > 0) { ?>
        <h6><?php esc_html_e('Follow Us','redpro'); ?></h6>
        <ul class=" list-unstyled social">         
          <?php for ($i=1; $i <= 4; $i++) { 
                if(get_theme_mod('social_icon'.$i) != '' && get_theme_mod('social_icon_link'.$i) != ''){ ?>
                    <li><a href="<?php echo esc_url(get_theme_mod('social_icon_link'.$i)); ?>" target="_blank"><i class="fa <?php echo esc_attr(get_theme_mod('social_icon'.$i)); ?>"></i></a></li>
                <?php }
            } ?>
        </ul>
        <?php } ?>
        </aside>
      <?php endif; ?>
        <aside class="col-md-12 " id="copyright_area">
        <div class="copyright"> <span>
          <?php if (get_theme_mod('copyright_text') != '') {
								echo wp_kses_post(get_theme_mod('copyright_text')).'. ';
							} ?>
			<?php esc_html_e('Powered by','redpro'); ?><a href='http://fasterthemes.com/wordpress-themes/redpro' target='_blank'>
    <?php esc_html_e('RedPro WordPress Theme','redpro'); ?></a>						
          </span> </div>
      </aside>
    </div>
  </div>
</footer>
<!--end / footer-->
<?php wp_footer(); ?>
</body>
</html>