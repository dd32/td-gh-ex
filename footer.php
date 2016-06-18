
<?php
	if ( is_active_sidebar( 'footer_widget') ) {
		echo '<div id="footer"><ul>';
			dynamic_sidebar('footer_widget');
		echo '</ul></div>';
	}
?>
</div>
<div id="kaninsmall" class="kaninsmall"></div>
<?php
/*Add easter eggs and christmas*/
if( get_theme_mod( 'bunny_easter_eggs' ) <> '' || get_theme_mod( 'bunny_christmas' ) <> '') {
	echo '<div class="egg2"></div>
	<div class="egg1"></div>';		
}

wp_footer(); ?>
</body>
</html>