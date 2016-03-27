<div class="footer"> 
 <div class="container">
       <div class="row">
		<?php
			$becorp_options=becorp_theme_default_data(); 
			$footer_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );
			global $k;
			$k=1;
		if ( is_active_sidebar( 'footer-widget-area' ) )
			{?>
			<div class="">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div>	
			<?php }
			else {
						$footer_widget=array(
							'name' => __( 'Footer Widget Area', 'becorp' ),
							'id' => 'footer-widget-area',
							'description' => __( 'footer widget area', 'becorp' ),
							'before_widget' => '<div class="col-md-3 col-sm-6">',
							'after_widget' => '</div>',
							'before_title' => '<div class="widget_title"><h2><i>',
							'after_title' => '</i></h2></div>', );
							
							the_widget('WP_Widget_Calendar', null, $footer_widget);
							the_widget('WP_Widget_Categories', null, $footer_widget);
							the_widget('WP_Widget_Pages', null, $footer_widget);
							the_widget('WP_Widget_Archives', null, $footer_widget);

			 }  ?>
			
      <?php  if($k%4==0) { echo "<div class='clearfix'></div>";  } $k++;
		?>
    </div>
    </div>
</div>
<!----copyright----->
<div class="copyright_info">
    <div class="container">
	  <div class="row">
        <div class="col-md-6">
            <b><?php if($footer_setting['footer_customization_text'] !='') { echo esc_attr($footer_setting['footer_customization_text']); } 
			if($footer_setting['footer_customization_develop'] !='') { echo "-" .esc_attr($footer_setting['footer_customization_develop']); } ?> 
			<a target="_blank" rel="nofollow" href="<?php if($footer_setting['develop_by_link'] !='') { echo esc_url($footer_setting['develop_by_link']); } ?>"><?php if($footer_setting['develop_by_name'] !='') { echo esc_attr($footer_setting['develop_by_name']); } ?></a></b>
        </div>
    	<div class="col-md-6">
		 <ul class="top-social footer_social_links">
           <?php if($footer_setting['social_media_twitter_link']!='') {?>
						<li><a class="icon-twitter" href="<?php echo esc_url($footer_setting['social_media_twitter_link']); ?>"<?php if( $footer_setting['twitter_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_facebook_link'] != '') { ?>
						<li><a class="icon-facebook" href="<?php echo esc_url($footer_setting['social_media_facebook_link']); ?>"<?php if( $footer_setting['facebook_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }  
						if($footer_setting['social_media_linkedin_link']!='') { ?> 
						<li><a class="icon-linkedin" href="<?php echo esc_url($footer_setting['social_media_linkedin_link']); ?>"<?php if( $footer_setting['linkedin_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_dribbble_link']!='') { ?> 
						<li><a class="icon-dribbble" href="<?php echo esc_url($footer_setting['social_media_dribbble_link']); ?>"<?php if( $footer_setting['dribbble_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_google_link']!='') { ?> 
						<li><a class="icon-google-plus" href="<?php echo esc_url($footer_setting['social_media_google_link']); ?>"<?php if( $footer_setting['google_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_rss_link']!='') { ?> 
						<li><a class="icon-rss" href="<?php echo esc_url($footer_setting['social_media_rss_link']); ?>"<?php if( $footer_setting['rss_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php } ?>
		  </ul>	
    	</div>
      </div>
    </div>
</div> 
<?php wp_footer(); ?>

<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top-->
</body>
</html>