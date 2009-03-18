<br class="clear" />
</div>
<div id="out-foot">
<div id="footer">
  <hr />
  <p>
  <strong>
    <?php bloginfo('name');?>
    </strong>&copy; 2007- <?php echo date('Y'); ?> <?php _e('All Rights Reserved, Powered By','ayumi') ?> <a href="http://www.wordpress.org">WordPress</a><br /><?php _e('Run in','ayumi') ?> <?php echo get_num_queries(); ?> <?php _e('queries.','ayumi') ?> <?php timer_stop(1); _e(' seconds.','ayumi') ?>
  </p>
  <p class="right">
  <span><a href="http://wpgpl.com/themes/ayumi" title="Free WordPress Theme: Ayumi 2.1">Ayumi 2.1</a> <?php _e('design by','ayumi') ?> <a href="http://wpgpl.com/">WP GPL</a></span>   <br /><span class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries','ayumi') ?></a></span> <?php _e('and','ayumi') ?> <span class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments','ayumi') ?></a><span>. 
  </p>
  <br class="clear" />
</div>
</div>

<?php wp_footer(); ?>
</body></html>