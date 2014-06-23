<?php  $generator_options = get_option( 'faster_theme_options' ); ?>
<footer class="footer-menu">
  <div class="container footer-menu no-padding">
	<div class="footer-div"><?php if ( is_active_sidebar( 'footer-1' ) ) {  dynamic_sidebar( 'footer-1' ); } ?></div>
    <div class="footer-div"><?php if ( is_active_sidebar( 'footer-2' ) ) {  dynamic_sidebar( 'footer-2' ); } ?></div>
    <div class="footer-div"> <?php if ( is_active_sidebar( 'footer-3' ) ) {  dynamic_sidebar( 'footer-3' ); } ?></div>
    <div class="footer-div"><?php if ( is_active_sidebar( 'footer-4' ) ) {  dynamic_sidebar( 'footer-4' ); } ?></div>
  </div>
  <div class="copyright col-lg-12">
    <div class="container container-generator">
      <div class="col-md-12 footer-margin-top text-center">
	  	<?php if(!empty($generator_options['footertext'])) {
			 	echo $generator_options['footertext'].' '; 
			  } else {
			  	echo 'Proudly Powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.';
			  }
                echo"<span class='generator-poweredby'> <a href='http://fasterthemes.com/themes/generator'>Generator theme</a> by FasterThemes.</span>";
		 ?>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>