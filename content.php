<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
 



global $admela_counter,$post;

$admela_bylineck = admela_get_option('admela_ebylfp');
$admela_fwidth = '264';
$admela_fheight = '176';			
$admela_thumb = get_post_thumbnail_id();
$admela_imgurl = wp_get_attachment_url( $admela_thumb,'full'); //get img URL
$admela_ytdimg = get_post_meta($post->ID, '_admela_featured_videourl', true); 
$admela_image = admela_autoresize( $admela_imgurl, $admela_fwidth, $admela_fheight, true );
if(($admela_ytdimg == "")  && ($admela_image == "") ){
	$admela_sliderwotimg = 'admela_sliderwotimg';
}
else {
	$admela_sliderwotimg = '';
}
$admela_blog_layout = ((admela_get_option('admela_blog_scheme')) ? admela_get_option('admela_blog_scheme') : 'amblyt1');
$admela_getpostfmt = get_post_format();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('admela_entry'); ?>>	
				
	<div class="admela_entryheader <?php echo esc_attr($admela_sliderwotimg); ?>">
			<?php
                admela_featuredimage();   					
			?>
				<div class="admela_postfa">	
					<?php
										
					
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

