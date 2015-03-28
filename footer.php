<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
global $avis_shortname, $avis_themename;
$avis_facebook  = avis_get_option($avis_shortname.'_fbook_link');
$avis_flickr     = avis_get_option($avis_shortname.'_flickr_link');
$avis_linkedin  = avis_get_option($avis_shortname.'_linkedin_link');
$avis_gpluseone = avis_get_option($avis_shortname.'_gplus_link');
$avis_twitter   = avis_get_option($avis_shortname.'_twitter_link');
?>
	<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer" class="avis-section">
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
				<?php $sktURL = 'http://www.sketchthemes.com/'; ?>
				<div class="copyright span6 alpha omega"> <?php echo stripslashes(avis_get_option($avis_shortname."_copyright")); ?><p><?php if(isset($avis_themename)){ echo $avis_themename; } _e(' By','avis'); ?> <a href="<?php echo $sktURL; ?>" title="Sketch Themes"><?php _e('SketchThemes','avis'); ?></a></p></div>
				<div class="owner span6 alpha omega">
					<!-- Footer Follow Us Section Start -->
						<div class="social-icons">
							<?php if($avis_facebook){?><li class="fb-icon"><a href="<?php echo esc_url($avis_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
							<?php if($avis_flickr){?><li class="flickr-icon"><a href="<?php echo esc_url($avis_flickr); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li><?php } ?>							
							<?php if($avis_linkedin){?><li class="linkedin-icon"><a href="<?php echo esc_url($avis_linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
							<?php if($avis_gpluseone){?><li class="gplus-icon"><a href="<?php echo esc_url($avis_gpluseone); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
							<?php if($avis_twitter){?><li class="tw-icon"><a href="<?php echo esc_url($avis_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
						</div>
					<!-- Footer Follow Us Section End -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper --> 
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="Back To Top" id="backtop"></a>
	<?php wp_footer(); ?>	
</body>
</html>