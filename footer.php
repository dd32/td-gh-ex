<?php
 $foodrecipes_options = get_option( 'faster_theme_options' );
?>

<!-- footer -->

<footer>
  <div class="col-md-12 footer">
    <h2>
      <?php if($foodrecipes_options['footertext'] != '') {
               	 echo $foodrecipes_options['footertext']; 
			}else{
				echo '&copy; 2014 foodrecipes Recipes. All Rights Reserved.';
			}
			echo ' <a target="_blank" href="http://fasterthemes.com/themes/foodrecipes">Food Recipes Theme</a> by FasterThemes.';
		?>
    </h2>
  </div>
</footer>
<!-- footer End-->
<?php wp_footer();?>
</body></html>