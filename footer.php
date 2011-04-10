<?php
/**
 * The template for displaying the footer.
 */
?>


 <?php $options = get_option('absolum'); if ($options['abs_pos_sidebar'] == "disable") { ?>

<?php } else { get_sidebar(); 

 } ?>


	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php

	get_sidebar( 'footer' );
?>


		</div><!-- #colophon -->
	</div><!-- #footer -->
  
</div><!-- #wrapper -->


<div style="padding-top:15px;margin:0 auto 50px auto;width:970px;">
  <?php wp_footer(); ?>

<?php absolum_footer_hook(); ?>

</div>    


 

</body>
</html>
