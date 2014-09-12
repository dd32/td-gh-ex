<?php
 $foodrecipes_options = get_option( 'foodrecipes_theme_options' );
?>

<!-- footer -->

<footer>
  <div class="col-md-12 footer">
    <h2>
      <?php if(!empty($foodrecipes_options['footertext'])) {
               	 echo wp_filter_nohtml_kses($foodrecipes_options['footertext']).' '; 
			}
			echo 'Powered by <a href="http://wordpress.org" target="_blank">WordPress</a> and <a target="_blank" href="http://fasterthemes.com/wordpress-themes/foodrecipes">Food Recipes</a>.';
		?>
    </h2>
  </div>
</footer>
<!-- footer End-->
<?php wp_footer();?>
</body>
</html>