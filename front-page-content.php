<?php get_header(); ?>
<?php

	global $allowedposttags;
	
	$allowedposttags  = array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
	);

	$sectionNum               = absint(of_get_option('section_num', 0));
	$section_1_content        = esc_attr(of_get_option('section_1_content','content'));
	
	
	$video_id                 = esc_attr(of_get_option('youtube_background_video',''));
	$video_controls           = absint(of_get_option('video_controls',1));
	$video_background_section = absint(of_get_option('video_background_section',1));
	$default_volum            = absint(of_get_option('default_volum',10));
	$youtube_seekto           = absint(of_get_option('youtube_seekto',3));
	$youtube_video_loop       = absint(of_get_option('youtube_video_loop',1));	
	
?>


    <div id="ct_content" class="ct_acool_content"> 
	<?php
       
		if(  $sectionNum > 0 )
		{
			for( $i=0; $i<$sectionNum; $i++ )
			{
				if( defined( 'CT_ACOOL_COOTHEMES' ) && CT_ACOOL_COOTHEMES === true  && $i == 0)
				{
					echo ct_acool_coothemes();
				}
				else if( $section_1_content == 'slider' && $i == 0 && defined( 'CT_HOMEPAGE_SLIDER_USED' ) && CT_HOMEPAGE_SLIDER_USED )
				{		 
					echo acool_get_slider(); 
				}
				else
				{
					$title_style  = "";$background  = "";
					$title        =  esc_attr( of_get_option('section_title_'.$i, ''));//section title					
					$post_list_link  =  esc_attr( of_get_option('section_post_list_'.$i, ''));
					
					$title_color    = esc_attr(of_get_option('section_title_color_'.$i, '') );//title_color
					//$title_border   = esc_attr(of_get_option('section_title_border_color_'.$i, ''));//title_border_color
					$content_color  = esc_attr(of_get_option('section_content_color_'.$i, ''));
					if( $title_color  != "" ) $title_style .= 'color:'.$title_color.';';
					//if( $title_border != "" ) $title_style .= 'border-color:'.$title_border.';';
					if( $content_color  != "" ) $background .= 'color:'.$content_color.';';
					
					$anchor       =  esc_attr( of_get_option('section_anchor_'.($i), '')) ;	
					if( $anchor == "" )$anchor       =  sanitize_title( esc_attr( of_get_option('section_title_'.($i), '')) );
					if( $anchor == "" )$anchor = "section-".($i+1);   					
					$section_id  = uniqid("section-id-");
							
					$section_background       = of_get_option( 'section_background_'.$i );
					$background               = acool_get_background( $section_background , 1);
										
					$section_background_size  = of_get_option( 'background_size_'.$i, 'no' );//100% Width Background Image	
					if( $section_background_size == 'yes')
					{
						 $background .= '-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-size:100% 100%;';
					}
					
					//Full Width   full_width_
					$full_width   =  esc_attr( of_get_option('full_width_'.$i, 'yes'));
														
					$class        =  esc_attr( of_get_option('section_css_class_'.$i, ''));//Section Css Class
					$content	  =  of_get_option('section_content_'.$i, '');//Section Content
					
					// video background						
					$video_enable   = 0;
					$detect         = new Mobile_Detect;
					if( $video_id  != "" && $video_background_section == ($i+1) && !$detect->isMobile() && !$detect->isTablet() && defined( 'CT_VIDEO_BACKGROUND_USED' ) && CT_VIDEO_BACKGROUND_USED )
					{
						$video_enable      = 1;  
						$background_video  = array(
												"videoId"=>$video_id, 
												"start"=>$youtube_seekto ,
												'repeat'=> ($youtube_video_loop==1)?true:false,
												'defaultVolum'=>$default_volum ,
												"container" =>"section.section-video-background",
												"playerid"=>$title
												);
						$background        = "";
						$class            .= " section-video-background";
						
						get_video_background($background_video);
					}
					

					if( $content_color || $title_color )
					{
						echo '<style>';
						if ($title_color )
						{
							echo 'section#'.$section_id.' h2{color:'.esc_attr($title_color).'; text-transform:uppercase;}';							
						}				
						if ($content_color )
						{
							echo 'section#'.$section_id.',section#'.$section_id.' h3{color:'.esc_attr($content_color).';}';
						}
                        echo '</style>';
					}
	?>
   
        <section  id="<?php echo $section_id ; ?>" class="ct_section ct_section_<?php echo $title?><?php echo $class; ?>" style=" <?php echo $background; ?>">
			<div class="container <?php if($full_width == 'yes'){ echo 'ct_full_width';} if($video_enable == 1 ){ echo ' ct_video_height';}?>"> 

				<?php                   
				  $content = do_shortcode(  $content  ) ;
				  if($title == 'post_list')
				  {
					  echo $content ;
				?>
					
                    <div class="row most">
                    <?php 
                        global $wpdb;//ignore_sticky_posts //caller_get_posts 3.1 del
                        query_posts( array( 'showposts' => 4, 'ignore_sticky_posts' => 1 ) ); 
                        if (have_posts()) :  while (have_posts()) : the_post(); 
                                                    
                    ?> 
                        <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding">                
                            <div id="post-3420" class="ct_vertical_column ct_clear_margin_padding">
                                <div class="ct_post_img">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php
                                        if(has_post_thumbnail()) 
                                        {
                                            $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
                                    ?>
                                            <img src="<?php echo $img_src[0];?>" />
                                    <?php
                                        }
										else if(of_get_option('default-featured-image')!="")
										{
									?>		
										<img src="<?php echo esc_url(of_get_option('default-featured-image')); ?>" />	
									<?php		
										}else{
                                    ?>		
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.jpg" />									
                                    <?php	
                                        }
                                    ?>
                                        <div class="meta">
                                            <span class="glyphicon glyphicon-search ct_search_icon" ></span>
                                            <h3><?php the_title(); ?></h3>
                                            <p class="post-meta"><?php the_time('M d, y');?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!--div class="ct_row ct_clear_margin_padding"-->
                        
     
                    <?php endwhile; endif; ?>                             
                   
                    </div>					
					
                	<div class="ct_post_more">
                    	<a href="<?php if($post_list_link == ''){echo esc_url(home_url('/')).'blog/'; }else{echo $post_list_link;} ?>" class="casems"><span>MORE</span><i></i></a>
                	</div> 				
					
				<?php
				  }else{ 
				                       
				  	echo $content ;
					
				  }
                ?>						
			</div>
            
            <?php 
				if( $video_enable == 1 && $video_controls == 1 ){
					get_video_button();
				}
	 		?>

		</section>                   
	<?php					
				}//if( $section_1_content == 'slider' && $i == 0 )
			}//for( $i=0; $i<$sectionNum; $i++ )
		}//if(  $sectionNum > 0 )
    ?>    
             
    </div><!--div id="ct_content" class="ct_acool_content"-->

<?php get_footer(); ?>