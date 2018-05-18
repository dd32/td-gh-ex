<?php
/**
 * The template for displaying admela bloglayout1 content
 *
 * @package WordPress
 * @subpackage admela
 * @since Admela 1.0
 */
  

get_header(); 


echo '<main id="admela_maincontent" class="admela_maincontent">';
 
			  
		/*
		* Include the Home Page After Slider Section Ad Template.			
		*/
	             
			
 
        
 
?>

<div class="admela_contentarea">
<div class="admela_contentlist">
  
    <?php if(!is_paged()){ 
	
	$admela_cat1name = admela_get_option('hm_catbx1name');
	$admela_latestpstck1 = admela_get_option('hm_catbx1rpst');

	if($admela_latestpstck1 == 'Random'):
		$admela_postorder = 'rand';
	else:
		$admela_postorder = 'date';
	endif;
	
	$admela_cat2name = admela_get_option('hm_catbx2name');
	$admela_latestpstck2 = admela_get_option('hm_catbx2rpst');

	if($admela_latestpstck2 == 'Random'):
		$admela_postorder2 = 'rand';
	else:
		$admela_postorder2 = 'date';
	endif;
	
	$admela_cat3name = admela_get_option('hm_catbx3name');
	$admela_latestpstck3 = admela_get_option('hm_catbx3rpst');

	if($admela_latestpstck3 == 'Random'):
		$admela_postorder3 = 'rand';
	else:
		$admela_postorder3 = 'date';
	endif;
	
	
	if($admela_cat1name != ''){
	$admela_cat1slug = get_category_by_slug($admela_cat1name); 
	$admela_cat1nme = $admela_cat1slug->name;
	
	?>
    
    <div class="admela_contentlistmain">
		<div class="admela_contentlisttitle">
		  <h4><?php echo esc_html($admela_cat1nme); ?></h4>
		  <p><?php echo esc_html(admela_get_option('hm_catbx1subtittxt')); ?></p>
		</div>
		<div class="admela_contentlistinner">
		   
		    <?php
		   
  		    global $post;
			
			if(admela_get_option('admela_lyt1ct1sn1pstad_act') != false){
				$admela_cat1postcnt = 5;
			}
	        else {
			    $admela_cat1postcnt = 6;
			}
			
			if(admela_get_option('admela_lyt1ct1sn1pstadno') == ''){
				$admela_cat1pslpcnt = 2;
			}
	        else {
			    $admela_cat1pslpcnt = admela_get_option('admela_lyt1ct1sn1pstadno');
			}
						
			$admela_cat1args = array(
			'post_type' => 'post',	
			'category_name' => $admela_cat1name,
			'orderby'=> $admela_postorder,
			'posts_per_page'=>$admela_cat1postcnt,
			'ignore_sticky_posts' => 1, 
			);
			
			$admela_cat1_query = new WP_Query($admela_cat1args);
			
			$loop_counter = 0;
			global $post;
			
			if ( $admela_cat1_query->have_posts() ) : while ( $admela_cat1_query->have_posts() ) : $admela_cat1_query->the_post(); /* Start Posts */
			
			$admela_fwidth = '264';
			$admela_fheight = '176';
		
			$admela_thumb = get_post_thumbnail_id();
			$admela_imgurl = wp_get_attachment_url( $admela_thumb,'full'); //get img URL
			$admela_image = admela_autoresize( $admela_imgurl, $admela_fwidth, $admela_fheight, true ); //resize & crop img
			
			$admela_ytdimg = get_post_meta($post->ID, '_admela_featured_videourl', true); 
			$admela_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
			$admela_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
			$admela_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
			$admela_framename = "iframe";
			if(($admela_ytdimg == "")  && ($admela_image == "")){
				$admela_sliderwotimg = 'admela_sliderwotimg';
			}
			else {
				$admela_sliderwotimg = '';
			}
			$loop_counter++;
			
			if(admela_get_option('admela_lyt1ct1sn1pstad_act') != false){
			if(($loop_counter == $admela_cat1pslpcnt)){			
			?>
			<div class="admela_entry admela_adentry">
				<?php get_template_part('tempad-parts/lay1catsec1pst','ad'); ?>
			</div>
			<?php			
			}
			}
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('admela_entry'); ?>>					
				<div class="admela_entryheader <?php echo esc_attr($admela_sliderwotimg); ?>">
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
							
							$admela_souncloudsng = preg_replace( $admela_souncloudmatchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admela_fwidth).'" height="'.absint($admela_fheight).'" scrolling="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_ytdimg); 
							
							echo wp_kses_stripslashes($admela_souncloudsng);
							
							}
	
						} 		
	               
						elseif(($admela_image != "") && ($admela_ytdimg == "")) { ?>
						<a href="<?php the_permalink(); ?>">							
							<img src="<?php echo esc_url($admela_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admela'); ?>" />
						</a>
						<?php 
						}
						}
					$admela_getpostfmt = get_post_format();  
					switch ($admela_getpostfmt) {

					case 'aside':

						if ($admela_getpostfmt == 'aside'):

						  echo '<i class="fa fa-file-text admela_postfa"></i>';

						 endif;

						break;

					case 'chat':

						if ($admela_getpostfmt == 'chat'):

						   echo '<i class="fa fa-comments admela_postfa"></i>';

						 endif;

						break;

					case 'audio':

						if ($admela_getpostfmt == 'audio'):

						   echo '<i class="fa fa-music admela_postfa"></i>';

						 endif;

						break;

					case 'gallery':

						if ($admela_getpostfmt == 'gallery'):

						  echo '<i class="fa fa-files-o admela_postfa"></i>';

						 endif;

						break;

					case 'video':

						if ($admela_getpostfmt == 'video'):

						   echo '<i class="fa fa-video-camera admela_postfa"></i>';

						 endif;

					break;


					case 'image':

						if ($admela_getpostfmt == 'image'):

						   echo '<i class="fa fa-image admela_postfa"></i>';

						 endif;

					break;

					case 'link':

						if ($admela_getpostfmt == 'link'):

						  echo '<i class="fa fa-link admela_postfa"></i>';

						 endif;

					break;

					case 'quote':

						if ($admela_getpostfmt == 'quote'):

						   echo '<i class="fa fa-quote-left admela_postfa"></i>';

						 endif;

					break;

					case 'status':

						if ($admela_getpostfmt == 'status'):

						   echo '<i class="fa fa-commenting admela_postfa"></i>';

						 endif;

					break;

                    default:
						echo '<i class="fa fa-thumb-tack admela_postfa"></i>';                  				
					}
					?>
				</div>
				<div class="admela_entrycontent">
					<?php  the_title('<h2 itemprop="headline"><a href="'.esc_url(get_permalink()).'">','</a></h2>'); ?>
				    <?php if(admela_get_option('admela_ebylfp') != TRUE){ ?>
					<div class="admela_entrymeta">
						<?php if(admela_get_option('admela_ppostedby') != TRUE){ ?>
							<span><?php esc_html_e('By','admela'); ?> <?php  the_author_posts_link(); ?></span> 
						<?php } 
						if(admela_get_option('admela_ppostedon') != TRUE) { ?>
							<span><?php esc_html_e('On','admela'); ?> <?php the_time(get_option( 'date_format')); ?></span>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</article>	
			<?php
			
			endwhile; /** end of one post **/ else : /** if no posts exist **/ endif; /** end loop **/
			wp_reset_postdata();
			?>
        </div>
		<div class="admela_entrycontentad">
			<?php get_template_part('tempad-parts/lay1catsec1afpst','ad'); ?>
		</div>
    </div>
	
	<?php 
	}
	if($admela_cat2name != ''){
	$admela_cat2slug = get_category_by_slug($admela_cat2name); 
	$admela_cat2nme = $admela_cat2slug->name;
	?>
	<div class="admela_contentlistmain">
		<div class="admela_contentlisttitle">
		  <h4><?php echo esc_html($admela_cat2nme); ?></h4>
		  <p><?php echo esc_html(admela_get_option('hm_catbx2subtittxt')); ?></p>
		</div>
		<div class="admela_contentlistinner">
		   
		    <?php
		   
  		    global $post;
			
			if(admela_get_option('admela_lyt1ct2sn2pstad_act') != false){
				$admela_cat2postcnt = 5;
			}
	        else {
			    $admela_cat2postcnt = 6;
			}
			
			if(admela_get_option('admela_lyt1ct2sn2pstadno') == ''){
				$admela_cat2pslpcnt = 2;
			}
	        else {
			    $admela_cat2pslpcnt = admela_get_option('admela_lyt1ct2sn2pstadno');
			}
	
			$admela_cat2args = array(
			'post_type' => 'post',	
			'category_name' => $admela_cat2name,
			'orderby'=> $admela_postorder2,
			'posts_per_page'=>$admela_cat2postcnt,
			'ignore_sticky_posts' => 1, 
			);
			
			$admela_cat2_query = new WP_Query($admela_cat2args);
			
			$loop_counter = 0;
			global $post;
			
			if ( $admela_cat2_query->have_posts() ) : while ( $admela_cat2_query->have_posts() ) : $admela_cat2_query->the_post(); /* Start Posts */
			
			$admela_fwidth = '264';
			$admela_fheight = '176';
		
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
			$loop_counter++;
			if(admela_get_option('admela_lyt1ct2sn2pstad_act') != false){
			if(($loop_counter == $admela_cat2pslpcnt)){			
			?>
			<div class="admela_entry admela_adentry">
				<?php get_template_part('tempad-parts/lay1catsec2pst','ad'); ?>
			</div>
			<?php			
			}
			}
			?>			
			<article id="post-<?php the_ID(); ?>" <?php post_class('admela_entry'); ?>>					
				<div class="admela_entryheader <?php echo esc_attr($admela_sliderwotimg); ?>">
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
							
							$admela_souncloudsng = preg_replace( $admela_souncloudmatchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admela_fwidth).'" height="'.absint($admela_fheight).'" scrolling="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_ytdimg); 
							
							echo wp_kses_stripslashes($admela_souncloudsng);
							
							}
	
						} 		
	               
						elseif(($admela_image != "") && ($admela_ytdimg == "")) { ?>
						<a href="<?php the_permalink(); ?>">							
							<img src="<?php echo esc_url($admela_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admela'); ?>" />
						</a>
						<?php 
						}
						}					
					?>
					<div class="admela_postcat"><?php the_category(','); ?></div>
				</div>
				<div class="admela_entrycontent">
					<?php  the_title('<h2 itemprop="headline"><a href="'.esc_url(get_permalink()).'">','</a></h2>'); ?>
				    <?php if(admela_get_option('admela_ebylfp') != TRUE){ ?>
					<div class="admela_entrymeta">
						<?php if(admela_get_option('admela_ppostedby') != TRUE){ ?>
							<span><?php esc_html_e('By','admela'); ?> <?php  the_author_posts_link(); ?></span> 
						<?php } 
						if(admela_get_option('admela_ppostedon') != TRUE) { ?>
							<span><?php esc_html_e('On','admela'); ?> <?php the_time(get_option( 'date_format')); ?></span>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</article>	
			<?php
			
			endwhile; /** end of one post **/ else : /** if no posts exist **/ endif; /** end loop **/
			wp_reset_postdata();
			?>
        </div>		
		<div class="admela_entrycontentad">
			<?php get_template_part('tempad-parts/lay1catsec2afpst','ad'); ?>
		</div>
    </div>
	<?php 
	}
	if($admela_cat3name != ''){
	$admela_cat3slug = get_category_by_slug($admela_cat3name); 
	$admela_cat3nme = $admela_cat3slug->name;
	?>
	<div class="admela_contentlistmain">
		<div class="admela_contentlisttitle">
		 <h4><?php echo esc_html($admela_cat3nme); ?></h4>
		  <p><?php echo esc_html(admela_get_option('hm_catbx3subtittxt')); ?></p>
		</div>
		<div class="admela_contentlistinner">
		   
		    <?php
		   
  		    global $post;
			
	        if(admela_get_option('admela_lyt1ct3sn3pstad_act') != false){
				$admela_cat3postcnt = 5;
			}
	        else {
			    $admela_cat3postcnt = 6;
			}
			
			if(admela_get_option('admela_lyt1ct3sn3pstadno') == ''){
				$admela_cat3pslpcnt = 2;
			}
	        else {
			    $admela_cat3pslpcnt = admela_get_option('admela_lyt1ct3sn3pstadno');
			}
			$admela_cat3args = array(
			'post_type' => 'post',	
			'category_name' => $admela_cat3name,
			'orderby'=> $admela_postorder3,
			'posts_per_page'=>$admela_cat3postcnt,
			'ignore_sticky_posts' => 1, 
			);
			
			$admela_cat3_query = new WP_Query($admela_cat3args);
			
			$loop_counter = 0;
			global $post;
			
			if ( $admela_cat3_query->have_posts() ) : while ( $admela_cat3_query->have_posts() ) : $admela_cat3_query->the_post(); /* Start Posts */
			
			$admela_fwidth = '264';
			$admela_fheight = '176';
		
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
			$loop_counter++;
			
			if(admela_get_option('admela_lyt1ct3sn3pstad_act') != false){
			if(($loop_counter == $admela_cat3pslpcnt)){			
			?>
			<div class="admela_entry admela_adentry">
				<?php get_template_part('tempad-parts/lay1catsec3pst','ad'); ?>
			</div>
			<?php			
			}
			}
            ?>			
			<article id="post-<?php the_ID(); ?>" <?php post_class('admela_entry'); ?>>					
				<div class="admela_entryheader <?php echo esc_attr($admela_sliderwotimg); ?>">
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
							
							$admela_souncloudsng = preg_replace( $admela_souncloudmatchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admela_fwidth).'" height="'.absint($admela_fheight).'" scrolling="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_ytdimg); 
							
							echo wp_kses_stripslashes($admela_souncloudsng);
							
							}
	
						} 		
	               
						elseif(($admela_image != "") && ($admela_ytdimg == "")) { ?>
						<a href="<?php the_permalink(); ?>">							
							<img src="<?php echo esc_url($admela_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admela'); ?>" />
						</a>
						<?php 
						}
						}					
					?>
					<div class="admela_postauthor"> <?php echo get_avatar( get_the_author_meta( 'user_email' ), 20 ); ?></div>
				</div>
				<div class="admela_entrycontent">
					<?php  the_title('<h2 itemprop="headline"><a href="'.esc_url(get_permalink()).'">','</a></h2>'); ?>
				    <?php if(admela_get_option('admela_ebylfp') != TRUE){ ?>
					<div class="admela_entrymeta">
						<?php if(admela_get_option('admela_ppostedby') != TRUE){ ?>
							<span><?php esc_html_e('By','admela'); ?> <?php  the_author_posts_link(); ?></span> 
						<?php } 
						if(admela_get_option('admela_ppostedon') != TRUE) { ?>
							<span><?php esc_html_e('On','admela'); ?> <?php the_time(get_option( 'date_format')); ?></span>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</article>	
			<?php			
			endwhile; /** end of one post **/ else : /** if no posts exist **/ endif; /** end loop **/
			wp_reset_postdata();
			?>
        </div>
		<div class="admela_entrycontentad">
			<?php get_template_part('tempad-parts/lay1catsec3afpst','ad'); ?>
		</div>
    </div>
	
	<?php } } ?>
	
	<div class="admela_contentlistmain">
		<div class="admela_contentlisttitle">
		  <h4><?php echo esc_html(admela_get_option('hm_latesttittxt') ? admela_get_option('hm_latesttittxt') :'Latest Stories...!'); ?></h4>
		  <p><?php echo esc_html(admela_get_option('hm_latestsubtittxt') ? admela_get_option('hm_latestsubtittxt') :'Maecenas vitae diam sed magna scelerisque ultrices non eget est. Nam ac dui pellentesque, volutpat tortor et ultricies turpis.'); ?></p>
		</div>
		<div class="admela_contentlistinner">
	      
    <?php
						
        if ( have_posts() ) : 
		    if(admela_get_option('admela_lyt1latstpst1adno') == ''){
				$admela_lyt1ltpst1pcnt = 2;
			}
	        else {
			    $admela_lyt1ltpst1pcnt = admela_get_option('admela_lyt1latstpst1adno');
			}
			
			if(admela_get_option('admela_lyt1latstpst2adno') == ''){
				$admela_lyt1ltpst2pcnt = 8;
			}
	        else {
			    $admela_lyt1ltpst2pcnt = admela_get_option('admela_lyt1latstpst2adno');
			}
		    $admela_bylineck = admela_get_option('admela_ebylfp');
		
		    $admela_counter = 0;
		
			//Start the loop.
			while ( have_posts() ) : the_post();
			
			$admela_counter++;
            
			$admela_fwidth = '264';
			$admela_fheight = '176';
		
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
			
				if(($admela_counter == $admela_lyt1ltpst1pcnt)){
					get_template_part('tempad-parts/lay1latestpst','ad1'); 
				}
				if(($admela_counter == $admela_lyt1ltpst2pcnt)){
					get_template_part('tempad-parts/lay1latestpst','ad2'); 
				}
				/*
				 * Include the Post-Format-specific template for the content.			
				 */
                ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('admela_entry'); ?>>					
				<div class="admela_entryheader <?php echo esc_attr($admela_sliderwotimg); ?>">
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
							
							$admela_souncloudsng = preg_replace( $admela_souncloudmatchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admela_fwidth).'" height="'.absint($admela_fheight).'" scrolling="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_ytdimg); 
							
							echo wp_kses_stripslashes($admela_souncloudsng);
							
							}
	
						} 		
	               
						elseif(($admela_image != "") && ($admela_ytdimg == "")) { ?>
						<a href="<?php the_permalink(); ?>">							
							<img src="<?php echo esc_url($admela_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admela'); ?>" />
						</a>
						<?php 
						}
						}
						
										
					
					?>
					<div class="admela_postfa">	
					<?php
										
					$admela_getpostfmt = get_post_format();  	
					switch ($admela_getpostfmt) {

					case 'aside':

						if ($admela_getpostfmt == 'aside'):

						  echo '<i class="fa fa-file-text"></i>';

						 endif;

						break;

					case 'chat':

						if ($admela_getpostfmt == 'chat'):

						   echo '<i class="fa fa-comments"></i>';

						 endif;

						break;

					case 'audio':

						if ($admela_getpostfmt == 'audio'):

						   echo '<i class="fa fa-music"></i>';

						 endif;

						break;

					case 'gallery':

						if ($admela_getpostfmt == 'gallery'):

						  echo '<i class="fa fa-files-o"></i>';

						 endif;

						break;

					case 'video':

						if ($admela_getpostfmt == 'video'):

						   echo '<i class="fa fa-video-camera"></i>';

						 endif;

					break;


					case 'image':

						if ($admela_getpostfmt == 'image'):

						   echo '<i class="fa fa-image"></i>';

						 endif;

					break;

					case 'link':

						if ($admela_getpostfmt == 'link'):

						  echo '<i class="fa fa-link"></i>';

						 endif;

					break;

					case 'quote':

						if ($admela_getpostfmt == 'quote'):

						   echo '<i class="fa fa-quote-left"></i>';

						 endif;

					break;

					case 'status':

						if ($admela_getpostfmt == 'status'):

						   echo '<i class="fa fa-commenting"></i>';

						endif;

					break;

                    default:
						echo '<i class="fa fa-thumb-tack"></i>';                  				
					}		
                    
                    ?>
					</div>
					
					<?php
					if ( is_sticky() && is_home() ){
					?>
					<div class="admela_sticky">						
						<?php esc_html_e( 'Featured', 'admela' ); ?>
					</div>
					<?php
					}						
					?>
				</div>
				<div class="admela_entrycontent">
					<?php  the_title('<h2 itemprop="headline"><a href="'.esc_url(get_permalink()).'">','</a></h2>'); ?>
				    <?php if(admela_get_option('admela_ebylfp') != TRUE){ ?>
					<div class="admela_entrymeta">
						<?php if(admela_get_option('admela_ppostedby') != TRUE){ ?>
							<span><?php esc_html_e('By','admela'); ?> <?php  the_author_posts_link(); ?></span> 
						<?php } 
						if(admela_get_option('admela_ppostedon') != TRUE) { ?>
							<span><?php esc_html_e('On','admela'); ?> <?php the_time(get_option( 'date_format')); ?></span>
						<?php } ?>
					</div>
					<?php } 
                    $admela_contentlmt = get_the_excerpt(); 	
                    if($admela_contentlmt != ''){
					?>
					<p>
                    <?php					
					echo wp_kses_stripslashes(wp_trim_words($admela_contentlmt,30,'..'));
					 
					 wp_link_pages( array(
								'before'      => '<div class="admela_pagelinks"><span class="admela_pagelinkstitle">' . esc_html__( 'Pages:', 'admela' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="admela_screenreadertext">' . esc_html__( 'Page', 'admela' ) . ' </span><span class="admela_pglnlksaf">%</span>',
								'separator'   => '<span class="admela_screenreadertext">, </span>',
							) );
					?>
					</p>
					<?php
					}
					?>
				
				</div>
			    </article>
				<?php				
			    // End the loop.
			    endwhile;			

			    // If no content, include the "No posts found" template.
			    else :
		
			    esc_html_e('Sorry No Posts Were Found','admela');		

			    endif;
										
			    admela_paging_nav(); // admela-pagination
						
			    /*
			     * Include the Before Footer Section Ad Template.			
			    */			
			    get_template_part('tempad-parts/lay1latestafpst','ad');
			
			?>
  </div>
  </div>
  <!-- .content-area-inner -->

  <div class="admela_contentareafooter">
	<div class="screen-reader-text"><?php esc_html_e('This div height required for the sticky sidebar','admela'); ?></div>
  </div>
  </div>
<!-- .content-area -->

<div class="admela_primarycontentarea">

        <?php
		

		get_sidebar('right'); // Theme Right Sidebar

		?>
</div>
</div>

<?php 

echo '</main>';  //site-main 

get_footer(); 