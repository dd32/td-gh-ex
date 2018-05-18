<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */



/*
* Include the Before Single Post Content Section Ad Template.			
*/
			
get_template_part('tempad-parts/singlepostbf','ad');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		

	
	
	
	<header class="admela_entryheader">
	
	   	<?php
		
        if(admela_get_option('admela_breadcrumb_post') != '') {
		
		admela_breadcrumb(); // Admela-BreadCrumb
		
		}
        if(admela_get_option('admela_pcategory') != TRUE) {
		?>
		<div class="admela_entrybyline admela_entrybymeta">
			<?php the_category(','); ?>
		</div>	
		<?php
		}
		the_title( '<h1 class="admela_entrytitle" itemprop="headline">', '</h1>' ); 
		
		admela_entrymeta(); // Admela-EntryMeta
		
		admela_featuredimage(); 
		
		?>
		
	 
	</header><!-- .entry-header -->

    <div id="admela_postinfobar">		  
		    <div id="admela_postredbar">		  
			</div>
			<div class="admela_headerinner">
				
				<?php
				
				global $post,$admela_counter;
	$admela_fwidth = '50';
	$admela_fheight = '50';
			    $admela_thumb = get_post_thumbnail_id();
 	            $admela_imgurl = wp_get_attachment_url( $admela_thumb,'full'); //get img URL
	
				$admela_ytdimg = get_post_meta($post->ID, '_admela_featured_videourl', true); 
				$admela_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
				$admela_youtube_matchexp1 = "/\s*[a-zA-Z\/\/:\.]*youtu.be\/([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";
				$admela_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
				$admela_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
				$admela_framename = "iframe";
				
				
				
				$admela_image = admela_autoresize( $admela_imgurl, $admela_fwidth, $admela_fheight, true ); //resize & crop img

	if(($admela_ytdimg != "")  || ($admela_image != "")){
	
	if($admela_ytdimg != "") {
	
	if(preg_match($admela_youtube_matchexp , $admela_ytdimg)) {	
	
	$admela_yuvid = preg_replace($admela_youtube_matchexp,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"https://www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_yuvid);
	
	}
	
	elseif(preg_match($admela_youtube_matchexp1 , $admela_ytdimg)) {	
	
	$admela_yuvid = preg_replace($admela_youtube_matchexp1,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"https://www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_yuvid);
	
	}
	
	elseif(preg_match($admela_vimeomatchexp , $admela_ytdimg)) {
	
	$admela_vimeovideos = preg_replace( $admela_vimeomatchexp ,"<".esc_attr($admela_framename)." width=\"".absint($admela_fwidth)."\" height=\"".absint($admela_fheight)."\" src=\"https://player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admela_ytdimg);
	
	echo wp_kses_stripslashes($admela_vimeovideos);
	
	}
	
	elseif(preg_match( $admela_souncloudmatchexp , $admela_ytdimg)) {	
	
	$admela_souncloudsng = preg_replace( $admela_souncloudmatchexp ,'<'.esc_attr($admela_framename).' width="'.absint($admela_fwidth).'" height="'.absint($admela_fheight).'" scrolling="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admela_ytdimg); 
	
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
				<span><?php esc_html_e('You are Reading..','admela'); ?></span>
				<?php  the_title( '<h4>', '</h4>' ); ?>
				    </div>
	</div>
	<div class="admela_entrycontent">
	    <?php
		
		/*
		* Include the Before Single Post Content Section Ad Template.			
		*/
			
		get_template_part('tempad-parts/postpagetop','ad');
		
		 the_content();

	      wp_link_pages( array(
				'before'      => '<div class="admela_pagelinks"><span class="admela_pagelinkstitle">' . esc_html__( 'Pages:', 'admela' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="admela_screenreadertext">' . esc_html__( 'Page', 'admela' ) . ' </span><span class="admela_pglnlksaf">%</span>',
				'separator'   => '<span class="admela_screenreadertext">, </span>',
			) );
			
			
			
			?>
			<div class="admela_tag">
	
				<span class="admela_tagslinks">
					<?php the_tags('');?>
				</span>
					
		    </div>
			
			<?php
			
			/*
			* Include the Before Single Post Content Section Bottom Ad Template.			
			*/

			get_template_part('tempad-parts/postpagebtm','ad');
			
		?>

	</div><!-- .entry-content -->

	<footer class="admela_entryfooter admela_entrypgfooter">
		
		
		   <div class="admela_postsharecnt">
    
    <?php
					
				if(admela_get_option('admela_active_postsocialshare') != false) {	
				
				?>
				
				<div class="admela_singleshare">					
				  
					<ul class="admela_postsocial admela_socialsharecount">
						
					                     		  
						<?php if(admela_get_option('admela_postsocialfb') != false){ ?>
						<li class="admela_share_fb"> <a href="//www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800');return false;"> <i class="fa fa-facebook"></i><span class="admela_sharetext"><?php esc_html_e('Facebook','admela'); ?></span></a>
						</li>
						<!--facebook-->
						<?php						
						}
						if(admela_get_option('admela_postsocialtwitter') != false) {?>
						  <li class="admela_share_tweet"><a href="//twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;url=<?php esc_url(the_permalink()); ?>" target="_blank" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;"> <i class="fa fa-twitter"></i><span class="admela_sharetext"><?php esc_html_e('Twitter','admela'); ?></span></a>
						  </li>
						<!--twitter-->	
						<?php }if(admela_get_option('admela_postsocialgplus') != false){ ?>
						<li class="admela_share_plus"> <a href="//plus.google.com/share?url=<?php esc_url(the_permalink()); ?>" target="_blank" title="<?php esc_html_e('Click to share','admela'); ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;"> <i class="fa fa-google-plus"></i><span class="admela_sharetext"><?php esc_html_e('Google+','admela'); ?></span>
						</a> 
						</li>
						<!--gplus-->
						  
						<?php }if(admela_get_option('admela_postsociallinkedin') != false){ ?>
						<li class="admela_share_linkedin"> <a target="_blank" href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;"> <i class="fa fa-linkedin"></i><span class="admela_sharetext"><?php esc_html_e('Linkedin','admela'); ?></span></a> 
						</li>
						<!--linkedin--> 
						  
						<?php }if(admela_get_option('admela_postsocialpinterest') != false){
											
						$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						$pinImage = $pinterestimage[0];
						?>
						<li class="admela_share_pintrest"> <a target="_blank" href="//pinterest.com/pin/create/bookmarklet/?url=<?php echo urlencode(esc_url(get_permalink( $post->ID ))).'&amp;media='. $pinImage .'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title( $post->ID )), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;"> <i class="fa fa-pinterest"></i><span class="admela_sharetext"><?php esc_html_e('Pinterest','admela'); ?></span></a>
						
						</li>
						 <!--pinterest-->
						  
						<?php } 
						
						if(admela_get_option('admela_postsocialbuffer') != false){ 
						?>
                        
                        <li class="admela_share_buffer">      
 <a target="_blank" href="//bufferapp.com/add?url=<?php esc_url(the_permalink()); ?>&amp;text=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;utm_source=<?php esc_url(the_permalink()); ?>&amp;utm_medium=<?php esc_url(the_permalink()); ?>&amp;utm_campaign=buffer&amp;source=button" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;">
<i class="fa-stack-exchange fa"></i>
<span class="admela_sharetext"><?php esc_html_e('Buffer','admela'); ?></span>
</a>
</li>
<?php } if(admela_get_option('admela_postsocialpocket') != false){ ?>
 <li class="admela_share_pocket">       
      <a target="_blank" href="//getpocket.com/save?title=<?php echo 
	 esc_html(get_the_title()); ?>&amp;url=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;">
     <i class="admela-icon-pckt fa"></i>
	 <span class="admela_sharetext"><?php esc_html_e('Pocket','admela'); ?></span>
     </a>     
    </li>
    <?php }
    if(admela_get_option('admela_postsocialstumble') != false){ ?>
     <li class="admela_share_stumble"> 
	 <a target="_blank" href="//www.stumbleupon.com/submit?url=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;"> <i class="fa fa-stumbleupon"></i><span class="admela_sharetext"><?php esc_html_e('stumbleupon','admela'); ?></span></a> </li>
         <?php }
			if(admela_get_option('admela_postsocialredit') != false) {
				?>
		 <li class="admela_share_reddit"> <a target="_blank" href="//www.reddit.com/submit?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;"> <i class="fa-reddit fa"></i><span class="admela_sharetext"><?php esc_html_e('Reddit','admela'); ?></span></a> </li>
        <?php
			
				}
			 if(admela_get_option('admela_postsocialwhatsapp') != false && wp_is_mobile()){ ?>            
                        
                        <div class="admela_whatsup"> <a href="whatsapp://send?text=<?php echo esc_html(the_title());?> <?php echo urlencode(esc_url(get_permalink())); ?>" data-action="share/whatsapp/share" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=800'); return false;"><i class="icon fa fa-whatsapp"></i><span class="admela_sharetext"><?php esc_html_e('Whatsapp','admela'); ?></span></a></div>
						<?php } ?>  
						</ul>					
				

				</div>

				<!--End of the Single post social share section--> 
				  <?php } ?>

    </div>
	
	</footer><!-- .entry-footer -->
		
		<?php
		
        /*
		 *  Include the author bio template		
		 */
		
		get_template_part( 'author','bio' );
	
	    
       
		?>
        <div class="admela_reltdwthad">
			<?php	                
				admela_relatedpost(); // Related post 					
			?>
		</div>
		<?php
	         if(admela_get_option('admela_snglpaginationpn') != true) {		
				
				admela_postnav(); // single post nav
		
			}			
			
			?>
		
	
</article><!-- #post-## -->
