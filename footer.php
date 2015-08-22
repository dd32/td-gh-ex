<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
global $tweetfeedmeta,$advertica_shortname;
?>

<?php  
if($tweetfeedmeta == '1'){ ?>
<!-- full-twitter-box -->
<div id="full-twitter-box">
	<div class="container">
		<div class="row-fluid">
			<?php  get_template_part('section','twitter-panel'); ?>
		</div>
	</div>
</div>
<?php } ?>
	<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php $sktURL = 'https://www.sketchthemes.com/'; ?>
				<?php $footer_copyright = wp_kses_post(sketch_get_option($advertica_shortname."_copyright")); ?>
				<div class="copyright span6 alpha omega"> <?php echo $footer_copyright; ?></div>
				<div class="owner span6 alpha omega"><?php _e('Advertica Theme by','advertica-lite'); ?> <a href="<?php echo esc_url($sktURL); ?>" ><?php _e('SketchThemes','advertica-lite'); ?></a></div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper --> 
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="<?php _e('Back To Top', 'advertica-lite'); ?>" id="backtop"></a>
	<?php wp_footer(); ?>
</body>
</html>