<div id="footer">
  <div id="footernavmenu">
    <ul>
      <li <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>/" title="Home">Home</a></li>
      <?php wp_list_pages('title_li=&depth=1&'.$hidden_pages)?>
    </ul>
  </div>
  <div class="copyright">
    <p> Designed by <a href="http://www.wpthemerz.com" title="Free WordPress Themes" target="_blank">WPThemerz.com</a> <br />
      <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
      <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
    </p>
    
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>