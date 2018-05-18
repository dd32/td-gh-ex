<?php

/**
 * Theme slider content Section for our theme.
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
 
 ?>

<!-- #Admela-SliderSection  -## -->

<?php if(admela_get_option('hm_slideractive') != false):  ?>

<div class="admela_sliderinner" id="admela_owldemo1">
  <?php

    $admela_catidsoptn1 = admela_get_option('hm_sliderctgrsid');		
	$admela_ckthecatpst1 = admela_get_option('hm_sliderctgs');		
	$admela_ckthesldpst1 = admela_get_option('hm_sliderpstids');
	$admela_postperpage = admela_get_option('hm_sliderpostperpage');		
	$admela_latestpstck = admela_get_option('hm_sliderrandorlatst');


if($admela_latestpstck == 'Random'):

$admela_postorder = 'rand';

else:

$admela_postorder = 'date';

endif;

	



if(!empty($admela_ckthecatpst1) != ''):

$admelaheaderslider_lay1args = array( 
'category_name' => $admela_ckthecatpst1,
'orderby'=>$admela_postorder,
'posts_per_page'=>$admela_postperpage,
'ignore_sticky_posts' => 1 
);

endif;

if(!empty($admela_ckthesldpst1) != ''):
$admela_ckthesldpst_id1 = explode(',',$admela_ckthesldpst1);
$admelaheaderslider_lay1args = array( 
'post__in' => $admela_ckthesldpst_id1,
'orderby'=>$admela_postorder,
'posts_per_page'=>$admela_postperpage,
'ignore_sticky_posts' => 1
);

endif;

if(!empty($admela_catidsoptn1) != ''):	
  $admela_category_idopts1 = explode(',',$admela_catidsoptn1);
   $admelaheaderslider_lay1args = array(
   'cat'=>$admela_category_idopts1,
   'orderby'=>$admela_postorder,
   'posts_per_page'=>$admela_postperpage,
   'ignore_sticky_posts' => 1
   );
  

endif;

if(((!empty($admela_ckthecatpst1) != '') || (!empty($admela_ckthesldpst1) != '') || (!empty($admela_catidsoptn1) != '') )){
 // the query  
    $admelaheaderslider_lay1query = new WP_Query( $admelaheaderslider_lay1args );

	
	while ( $admelaheaderslider_lay1query->have_posts() ) : $admelaheaderslider_lay1query->the_post();
		
	
	$admela_fwidth = '380';
	$admela_fheight = '480';
	
	
	$admela_thumb = get_post_thumbnail_id();
 	$admela_imgurl = wp_get_attachment_url( $admela_thumb,'full'); //get img URL
	$admela_image = admela_autoresize( $admela_imgurl, $admela_fwidth, $admela_fheight, true ); //resize & crop img
	
	$admela_ytdimg = get_post_meta($post->ID, '_admela_featured_videourl', true); 
	$admela_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admela_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admela_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admela_framename = "iframe";
	    	
	if(($admela_ytdimg == "")  && ($admela_image == "") && (!empty($admela_exturl) == '')){
	$admela_sliderwotimg = 'admela_sliderwotimg';
	}
	else {
	$admela_sliderwotimg = '';
	}
			
	?>
		
	<div class="admela_slideritem <?php echo esc_attr($admela_sliderwotimg); ?>">
	   <?php
					 
			  
	if(($admela_ytdimg != "")  || ($admela_image != "")){
	
	if($admela_ytdimg != "") {
	
	if(preg_match($admela_youtube_matchexp , $admela_ytdimg)) {	
	
	$admela_yuvid = preg_replace($admela_youtube_matchexp,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"//www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_yuvid);
	
	}
	
	elseif(preg_match($admela_vimeomatchexp , $admela_ytdimg)) {
	
	$admela_vimeovideos = preg_replace( $admela_vimeomatchexp ,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"//player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_vimeovideos);
	
	}
	
	elseif(preg_match( $admela_souncloudmatchexp , $admela_ytdimg)) {	
	
	$admela_souncloudsng = preg_replace( $admela_souncloudmatchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admela_fwidth).'" height="'.absint($admela_fheight).'" scrolling="no" src="https://www.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_ytdimg); 
	
	echo wp_kses_stripslashes($admela_souncloudsng);
	
	}
	
	} 		
	
	elseif($admela_image != "" && $admela_ytdimg == "" ) { 
	
	?>
	<a href="<?php the_permalink(); ?>">
    <img src="<?php echo esc_url($admela_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admela'); ?>" />
	</a>   
   <?php 
	}

}

			  ?>
	   <div class="admela_sliderheader">
	     <h2>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
	     </h2>
		 <?php if(admela_get_option('admela_ebylfp') != TRUE){ ?>
	     <div class="admela_sliderbyline">
		  <?php if(admela_get_option('admela_ppostedby') != TRUE){ ?>
		  <span><?php esc_html_e('By','admela'); ?>
		  <?php  the_author_posts_link(); ?>		  
		  <?php } ?> 
		  </span>
		  <?php
		  if(admela_get_option('admela_ppostedon') != TRUE) { ?>
		  <span><?php esc_html_e('On','admela'); ?> <?php the_time(get_option( 'date_format')); ?></span>
		  <?php } ?>		 
		 </div>
		 <?php } ?>
	   </div>
	   
	</div>	
	
  <?php 
   endwhile; 
   wp_reset_postdata();
   }
   ?>
</div>
<?php endif; ?>