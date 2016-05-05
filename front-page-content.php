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
       
		if(  $sectionNum > 0 && defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED )
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
					$title_style  = "";
					$background  = "";
					$template     =  esc_attr( of_get_option('ct_select_section_temp_'.$i, ''));//Select Content Template for this section
					//$title        =  esc_attr( of_get_option('section_title_'.$i, ''));//section title					
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
					//echo $anchor ;		
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
												"playerid"=>$template
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
   
        <section  id="<?php echo $section_id ; ?>" class="ct_section ct_section_<?php echo $template?> <?php echo $class; ?>"  <?php if($background!==''){echo 'style=" '.$background.'" ';} ?>>
			<div class="container <?php if($full_width == 'yes'){ echo 'ct_full_width';} if($video_enable == 1 ){ echo ' ct_video_height';}?>"> 

				<?php                   
				  $content = do_shortcode(  $content  ) ;
				  if($template == 'post_list')
				  {
					  echo $content ;
				?>
					
                    <div class="row most">
                    <?php 
                        global $wpdb;//ignore_sticky_posts //caller_get_posts 3.1 del
                        query_posts( array( 'showposts' => 10 ) ); 
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


	<?php

		if ( !(defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED) ){

			$controller   = '';
			$slideContent = '';
			
			$slide_time       = absint(of_get_option("slide_time","5000"));
			$slide_height     = esc_attr(of_get_option("slide_height",""));
			$slide_height     = $slide_height==""?"":"height:".$slide_height.";";
			
			$anchor_0       = esc_attr(of_get_option('section_anchor_0', ''))  ;
			$anchor_1       = esc_attr(of_get_option('section_anchor_1', ''))  ;
					  
			$return = '<!---section_slide--->
				<section class="ct_section ct_section_slider">
					<div id="carousel-acool-generic" class="carousel slide" data-ride="carousel" data-interval="'.$slide_time.'" >';
		
			$active = '';
			$text       = of_get_option('acool_slide_text_1','<h1>The jQuery slider that just slides.</h1><p class="ct_slider_text">No fancy effects or unnecessary markup.</p><a class="btn" href="#download">Download</a>');
			$image      = of_get_option('acool_slide_image_1',get_stylesheet_directory_uri().'/images/banner1.jpg');
			$link       = of_get_option('acool_slide_link_1','#');	
			if( $image != "" )
			{
				
				$active     = 'active';
				$controller   .= '<li data-target="#carousel-acool-generic" data-slide-to="0" class="'.$active.'"></li>';
				
				$slideContent .= '<div class="item '.$active.'">';
				if(trim($link) == "")
				{
					$slideContent .= '<img src="'.esc_url($image).'" alt=""  width="100%"/>';
				}
				else
				{
					$slideContent .= '<a href="'.esc_url($link).'" target="_blank"><img src="'.esc_url($image).'" alt=""   width="100%"/></a>';
				}	
				
				$slideContent .= '<div class="carousel-caption">'.$text.'</div>';				
				$slideContent .= '</div>';		 
				
			}
				
	
			//$return .= '<ol class="carousel-indicators">'. $controller .'</ol>';
			$return .= '<div class="carousel-inner">'.$slideContent.'</div>';		 

			$return .= '</div></section><!---section_slide end--->';
	
	
			echo $return;
			
		?>


            <div class="container"><div class="row">
            <br>
            <?php if(function_exists('acool_breadcrumbs') && of_get_option("show_breadcrumb") =='yes' ) acool_breadcrumbs();?> 
                
                <div class="col-md-9 ct_single_content ct_post_content">    
                <?php 	global $wpdb;
            query_posts( array( 'showposts' => 10 ) ); 
            if (have_posts()) :  while (have_posts()) : the_post(); 
             ?>
            
                    <h1 class="ct_title_h1"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h1>
                    
                    <?php 
                        $hide_post_meta = of_get_option('hide_post_meta','no'); 
                        if($hide_post_meta == 'no'){
                    ?>
                    <div class="ct_entry_meta">
                        <span><i class="fa fa-clock-o"></i><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m'));?>"><?php echo get_the_date("M d, Y");?></a></span>
                        <span><i class="fa fa-user"></i><?php echo get_the_author_link(); ?></span> 
                        <span><i class="fa fa-file-o"></i><?php the_category(', '); ?></span>
                        <?php edit_post_link( __('Edit','Acool'), '<span><i class="fa fa-pencil"></i>', '</span>', get_the_ID() ); ?>         
                    </div>
                    <?php }?>  
                    
                <?php  if(has_post_thumbnail()){ ?>               
                    <div class="ct_center">
                    <a href="<?php the_permalink(); ?>" class="ct_post_thumbnail" >
                    <?php 						
						$exclude_id = get_the_ID();
					?>
                    <img src="<?php $arr = ct_get_thumbnail($exclude_id);echo $arr['fullpath'];?>"  />
                    </a> 
                    </div>          
                <?php } ?>         
                                
                    <?php the_content(); ?>
        
        
                    <p class="ct_clear"></p>
                    <hr class="ct_hr">    
             
                    
                <?php endwhile;endif; ?> 
                
                
                <?php acool_paging_nav(); ?>
                
                </div>
                
                <?php get_sidebar( 'acool' ); ?>
                  
            
            </div></div>



	<?php
		}

	?>


        
    </div><!--div id="ct_content" class="ct_acool_content"-->

<?php get_footer(); ?>