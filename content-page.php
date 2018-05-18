<?php
/**
 * The template part for displaying page posts
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */



?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="admela_entryheader">
	
	   	<?php
		
        if(admela_get_option('admela_breadcrumb_post') != '') {
		
		admela_breadcrumb(); // Admela-BreadCrumb
		
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

	</div><!-- .entry-content -->

	
</article><!-- #post-## -->