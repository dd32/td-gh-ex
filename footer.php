<?php
/**
 * The template for displaying the footer
**/ 
?>
<footer class="main_footer">
  <div class="top_footer">
    <div class="container customize-container">
      <?php get_sidebar('footer');?>
    </div>
  </div>
  <div class="bottom_footer">
    <div class="container customize-container">
      <p><?php
  global $customizable_options;
   if($customizable_options['footertext'] != '')
  {
	  echo $customizable_options['footertext'].' ';
	  echo "Theme by <a href='http://fasterthemes.com' target='_blank'>FasterThemes</a>.";
	}
	else
	{
		echo "Powered by <a href='http://wordpress.org' target='_blank'>WordPress</a>. ";
		echo "Theme by <a href='http://fasterthemes.com' target='_blank'>FasterThemes</a>.";
	}?></p>
    <?php wp_nav_menu(array('theme_location'  => 'secondary')); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>