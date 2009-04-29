<?php /* Arclite/digitalnature */
  $options = get_option('arclite_options');
?>
  <!-- footer -->
 <div id="footer">
  <div class="block-content">
     <div class="copyright">
     <!-- please do not remove this. respect the authors :) -->
     <?php
      printf(__('Arclite theme by %s', 'arclite'), '<a href="http://digitalnature.ro/projects/arclite">digitalnature</a>');
      print ' | ';
      printf(__('powered by %s', 'arclite'), '<a href="http://wordpress.org/">WordPress</a>');
     ?>
     <br />
     <a class="rss" href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)','arclite'); ?></a> <?php _e('and','arclite');?> <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)','arclite'); ?></a> <a href="#" id="toplink">^</a>
     <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
     </div>

  </div>
 </div>
 <!-- /footer -->

 </div>
 <!-- /page -->
 <?php wp_footer(); ?>
</body>
</html>



