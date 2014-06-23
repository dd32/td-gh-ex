<?php
 $foodrecipes_options = get_option( 'faster_theme_options' );
?>

<!-- footer -->

<footer>
  <div class="col-md-12 footer">
    <h2>
      <?php if(!empty($foodrecipes_options['footertext'])) {
               	 echo $foodrecipes_options['footertext']; 
			}else{
				echo 'Proudly Powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.';
			}
			echo ' <a target="_blank" href="http://fasterthemes.com/themes/foodrecipes">Food Recipes</a> by FasterThemes.';
		?>
    </h2>
  </div>
</footer>
<!-- footer End-->
<?php wp_footer();?>
</body>
</html>