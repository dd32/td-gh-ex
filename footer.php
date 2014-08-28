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
	  echo "<a href='http://fasterthemes.com/themes/customizable' target='_blank'>Customizable theme</a> by FasterThemes.";
	}
	else
	{
		echo "Powered by <a href='http://wordpress.org' target='_blank'>WordPress</a>. ";
		echo "<a href='http://fasterthemes.com/themes/customizable' target='_blank'>Customizable theme</a> by FasterThemes.";
	}?></p>
    <?php wp_nav_menu(array('theme_location'  => 'secondary')); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>