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
	  echo "<a href='http://fasterthemes.com/wordpress-themes/customizable' target='_blank'>Customizable</a> powered by WordPress.";
	}
	else
	{
		echo "<a href='http://fasterthemes.com/wordpress-themes/customizable' target='_blank'>Customizable</a> powered by WordPress.";
	}?></p>
    <?php wp_nav_menu(array('theme_location'  => 'secondary')); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>