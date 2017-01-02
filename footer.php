</div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <?php $options = get_option( 'faster_theme_options' ); ?>
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
      <?php if(!empty($options['fburl']) || !empty($options['twitter'])) { ?>
        <h6><?php _e('Follow Us','redpro'); ?></h6>
        <ul class=" list-unstyled social">
          <?php if(!empty($options['fburl'])){ ?><li><a href="<?php echo esc_url_raw($options['fburl']); ?>" target="_blank" class="sprite facebook-icon"><?php _e('facebook','redpro') ?></a></li><?php } ?>
          <?php if(!empty($options['twitter'])){ ?><li><a href="<?php echo esc_url_raw($options['twitter']); ?>" target="_blank" class="sprite twitter-icon"><?php _e('twitter','redpro') ?></a></li><?php } ?>
        </ul>
        <?php } ?>
        <div class="copyright"> <span>
          <?php if(!empty($options['footertext'])) {
								echo wp_filter_nohtml_kses($options['footertext']).'. ';
							} ?>
			<?php _e('Powered by','redpro'); ?><a href='http://fasterthemes.com/wordpress-themes/redpro' target='_blank'>
    <?php _e('RedPro WordPress Theme.','redpro'); ?></a>						
          </span> </div>
      </aside>
    </div>
  </div>
</footer>
<!--end / footer-->
<?php wp_footer(); ?>
</body>
</html>