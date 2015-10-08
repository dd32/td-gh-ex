<?php
/*
***** Becorp Template Tags
	* Add Class Gravtar
*/
if(! function_exists('becorp_gravatar_class')) :
	add_filter('get_avatar','becorp_gravatar_class');
	function becorp_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='author-image", $class);
    return $class;
	}
 endif;
 
 /*
 * Becorp Archive Title
 */
 if ( ! function_exists( 'becorp_archive_title' ) ) :
function becorp_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category Archives: %s', 'becorp' ), '<span>' . single_cat_title( '', false ) . '</span>' );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag Archives: %s', 'becorp' ), '<span>' . single_tag_title( '', false ) . '</span>' ); 
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author Archives: %s', 'becorp' ), '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>' ); 
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Yearly Archives: %s', 'becorp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'becorp' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Monthly Archives: %s', 'becorp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'becorp' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Daily Archives: %s', 'becorp' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'becorp' ) ) );
	}  elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'becorp' ), post_type_archive_title( '', false ) );
	}
	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;
 
// Site Footer Function
// Contains the closing of the #content div and all content after
function becorp_wp_footer () { ?>
	</div><!-- #content -->
    <div class="footer"> 
 <div class="container">
       <div class="row">
		<?php
			$becorp_options=theme_default_data(); 
			$footer_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );
			global $k;
			$k=1;
		if ( is_active_sidebar( 'footer-widget-area' ) )
			{?>
			<div class="">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div>	
			<?php }else { ?> 
   		<div class="col-md-3 col-sm-6">
           <h2><?php _e('About','becorp'); ?> <i><?php _e('Us','becorp'); ?></i></h2>    
           <p><?php _e('Excellent feature! I love it. One day I am definitely going to put this Bootstrap component into use and I will let you know once I I will let you know once Ido .Excellent feature! I love it. One day I am definitely going to put this Bootstrap component','becorp'); ?></p> 
        </div>
        
        <div class="col-md-3 col-sm-6 ">
            <h2><?php _e('Useful','becorp'); ?> <i><?php _e('Links','becorp');?></i></h2>
            <ul class="list">
                <li><a href="#"><i class="fa fa-angle-right"></i> <?php _e('Home Page Variations','becorp'); ?></a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> <?php _e('Awsome Slidershows','becorp'); ?></a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> <?php _e('Features and Typography','becorp'); ?></a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> <?php _e('Different &amp; Unique Pages','becorp'); ?></a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> <?php _e('Single and Portfolios','becorp'); ?></a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i><?php _e(' Recent Blogs or News','becorp'); ?></a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i><?php _e(' Layered PSD Files','becorp'); ?></a></li>
            </ul>
        </div>
         
        <div class="col-md-3 col-sm-6">
           <h2><?php _e('Latest','becorp'); ?> <i><?php _e('Post','becorp'); ?></i></h2>
			<ul>
				<li>
					<div class="widget-thumb">
						<a href="#"><img src="<?php echo get_template_directory_uri () ?>/images/thumb/3.jpg" alt="" /></a>
					</div>
					<div class="widget-content">
						<h5><a href="#"><?php _e('How To Download The Google Fonts Catalog','becorp'); ?></a></h5>
						<span><?php _e('Jul 29 2013','becorp'); ?></span>
					</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="widget-thumb">
						<a href="#"><img src="<?php echo get_template_directory_uri () ?>/images/thumb/1.jpg" alt="" /></a>
					</div>
					<div class="widget-content">
						<h5><a href="#"><?php _e('Google Fonts Catalog','becorp'); ?></a></h5>
						<span><?php _e('Jul 29 2013','becorp'); ?></span>
					</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="widget-thumb">
						<a href="#"><img src="<?php echo get_template_directory_uri () ?>/images/thumb/2.jpg" alt="" /></a>
					</div>
					<div class="widget-content">
						<h5><a href="#"><?php _e('How To Download The Google Fonts Catalog','becorp'); ?></a></h5>
						<span><?php _e('Jul 29 2013','becorp'); ?></span>
					</div>
					<div class="clearfix"></div>
				</li>
			</ul>
         </div>
       
         <div class="col-md-3 col-sm-6">
            <h2><?php _e('Contact','becorp'); ?> <i><?php _e('Info','becorp'); ?></i></h2>
					
				<ul class="contact_address">
					<li><i class="fa fa-map-marker icon-large"></i>&nbsp;<?php _e('2901 Marmora Road Glassgow','becorp'); ?>
					<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Seattle WA 98122-1090','becorp'); ?></li>
					<li><i class="fa fa-phone"></i>&nbsp;<?php _e('1 -234 -456 -7890','becorp'); ?></li>
					<li><i class="fa fa-print"></i>&nbsp;<?php _e('1 -234 -456 -7890','becorp'); ?></li>
					<li><img src="<?php echo get_template_directory_uri () ?>/images/footer-wmap.png" alt="" /></li>
				</ul>
         </div>
		<div class="clearfix"></div> 
        <?php }
       if($k%4==0) { echo "<div class='clearfix'></div>";  } $k++;
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
<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top-->
<?php
} // end of becorp_wp_footer
?>