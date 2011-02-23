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
  <?php

	wp_footer();
?>
</div>    


<script type='text/javascript'>
  $("div.post").mouseover(function() {
    $(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
    $("div.type-page").mouseover(function() {
    $(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
      $("div.type-attachment").mouseover(function() {
    $(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
  $("li.comment").mouseover(function() {
    $(this).find(".comment-edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $(this).find(".comment-edit-link").css('visibility', 'hidden');
  });
</script>







<?php $options = get_option('absolum');

if (!empty($options['abs_header_slider'])) {


  if ($options['abs_header_slider'] == "normal") { ?>

<script type="text/javascript">
	$(function(){
		$('#slide_holder').loopedSlider({
			autoStart: 7000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($options['abs_header_slider'] == "slow") { ?>

<script type="text/javascript">
	$(function(){
		$('#slide_holder').loopedSlider({
			autoStart: 10000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($options['abs_header_slider'] == "fast") { ?>

<script type="text/javascript">
	$(function(){
		$('#slide_holder').loopedSlider({
			autoStart: 3500,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } } ?>





</body>
</html>
