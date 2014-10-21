<?php
/**
* @Theme Name	:	wallstreet
* @file         :	footer.php
* @package      :	wallstreet
* @author       :	Harish Lodha
* @filesource   :	wp-content/themes/wallstreet/footer.php
*/
?>
<!-- Footer Widget Secton -->
<?php $current_options=get_option('wallstreet_lite_options'); ?>
<div class="footer_section">

	<?php if($current_options['footer_social_media_enabled']=='on') { ?>
				<div class="footer-social-area"><ul class="footer-social-icons">
					<?php if($current_options['social_media_twitter_link']!='') { ?>
					<li><a href="<?php echo esc_url( $current_options['social_media_twitter_link']); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php }
					if($current_options['social_media_facebook_link']!='') { ?>
					<li><a href="<?php echo esc_url( $current_options['social_media_facebook_link']); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php }					
					if($current_options['social_media_googleplus_link']!='') { ?>
					<li><a href="<?php echo esc_url( $current_options['social_media_googleplus_link']); ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php }
					if($current_options['social_media_linkedin_link']!='') { ?>
					<li><a href="<?php echo esc_url( $current_options['social_media_linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php }
					if($current_options['social_media_youtube_link']!='') { ?>
					<li><a href="<?php echo esc_url( $current_options['social_media_youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>					
					<?php } ?>
				</div></ul>
				<?php } ?>
	
	<div class="container">
		<div class="row footer-widget-section">
		<?php 
			if ( is_active_sidebar( 'footer-widget-area' ) )
			{ dynamic_sidebar( 'footer-widget-area' );	}
			else 
			{  	$args=array(
					'before_widget' => '<div class="col-md-3 col-sm-6 footer_widget_column">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="footer_widget_title">',
					'after_title' => '</h3>');
				$instance =array('title' => __('About','wallstreet'), 'text' => __('It is a long established fact that a read will be distracted by the readable cont of a page when looking at its layout. point of using Lorem Ipsum is that

it has less normal distribution letters, as opposed to using content here.','wallstreet'));
				the_widget('WP_Widget_Text',$instance,$args); 	
				the_widget('WP_Widget_Pages','',$args); 
				the_widget('WP_Widget_Archives','',$args);
				the_widget('WP_Widget_Tag_Cloud','',$args);
			} ?>
		</div>
        <div class="row">
			<div class="col-md-12">
			<?php if($current_options['footer_customizations']) { ?>
				<div class="footer-copyright">
					<p> <?php echo esc_html($current_options['footer_customizations']);?>
					 <?php if(is_home() && $current_options['created_by_webriti_text']!='') {   ?>
					<a href="<?php if($current_options['created_by_link']!='') { echo esc_url($current_options['created_by_link']); } ?>"><?php echo esc_html($current_options['created_by_webriti_text']);  ?></a>
					<?php } else { echo $current_options['created_by_webriti_text']; }?>
					</p>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<!------  Custom CSS Code --------->
<?php
if($current_options['webrit_custom_css']!='') {  ?>
<style>
<?php echo esc_html($current_options['webrit_custom_css']); ?>
</style>
<?php } ?>
</div> <!-- end of wrapper -->
<?php wp_footer(); ?>
</body>
</html>