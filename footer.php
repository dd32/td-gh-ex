</div><!-- center -->
<div id="footer">
      <a href="<?php bloginfo('url')?>"><?php echo get_the_time('Y')?> &copy; <?php bloginfo('name')?></a>
      <a href="http://wordpress.org/" title="<?php _e('Powered by Wordpress, state-of-the-art semantic personal publishing platform.')?>">WP</a>
      <a href="http://cembele.com/a-theme/" title="<?php _e('Theme by')?> M">A</a>
      <?php wp_register('',' '); wp_loginout()?>
</div>
<?php wp_footer()?>
</div><!-- page -->
</body>
</html>