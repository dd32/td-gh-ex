<?php 
//post page

get_header(); ?>  

<?php
	$mods = get_theme_mods();
	// print_r($mods['ascreen_option']);
	$enable_home_section = $mods['ascreen_option']['enable_home_section'];
	$video_youtube_id = !empty($mods['ascreen_option']['video_youtube_id']) ? $mods['ascreen_option']['video_youtube_id']:'e1c-n1dRxwc';	
	
	$video_title = !empty($mods['ascreen_option']['video_title']) ? $mods['ascreen_option']['video_title']: __('Ascreen One Page Full Screen', 'ascreen');	
	$video_decription = !empty($mods['ascreen_option']['video_decription']) ? $mods['ascreen_option']['video_decription']: __('Awesome one-page full screen WordPress theme. Support home page slides, and video background too.', 'ascreen');	
	
	$video_button_one = !empty($mods['ascreen_option']['video_button_one']) ? $mods['ascreen_option']['video_button_one']: __('View Features', 'ascreen');	
	$video_button_one_link = !empty($mods['ascreen_option']['video_button_one_link']) ? $mods['ascreen_option']['video_button_one_link']: '#';	
	
	$video_button_two = !empty($mods['ascreen_option']['video_button_two']) ? $mods['ascreen_option']['video_button_two']: __('View Features', 'ascreen');	
	$video_button_two_link = !empty($mods['ascreen_option']['video_button_two_link']) ? $mods['ascreen_option']['video_button_two_link']: '#';		
	
	
	$contact_title = !empty($mods['ascreen_option']['contact_title']) ? $mods['ascreen_option']['contact_title']: __('CONTACT US', 'ascreen');	
	$contact_decription = !empty($mods['ascreen_option']['contact_decription']) ? $mods['ascreen_option']['contact_decription']: __('Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere c.Etiam ut dui eVestibulum ante ipsum primi', 'ascreen');		
	$contact_email = !empty($mods['ascreen_option']['contact_email']) ? $mods['ascreen_option']['contact_email']: get_bloginfo( 'admin_email');	

	if($enable_home_section != '1'){
?>


<div id="video_button_wrapper">
    <div class="goto">
        <button id="togglePlay" class="command pause" onclick="jQuery('.ascreen_video_background').YTPTogglePlay(changeLabel)">&times;</button>
    </div>
</div>

<section id="ascreen_video" class="ascreen_section ascreen_video ascreen_section_0 ascreen_video_background player  ascreen-parallax" data-property="{videoURL:'<?php echo $video_youtube_id;?>', mute:false,opacity:1,containment:'.ascreen_video_background',loop:true,showControls:false,vol:30,autoPlay:true, optimizeDisplay:true, stopMovieOnBlur:false}">
	<div  id="video" class="section_content section_content_video section_width">

		<h1 class="section_title "><span><?php echo $video_title;?></span></h1>
		<p class="section_text"><?php echo $video_decription;?></p>
     	<p><a class="btn btn-lg btn-primary" href="<?php echo $video_button_one_link;?>" role="button"><?php echo $video_button_one;?></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-primary color1" href="<?php echo $video_button_two_link;?>" role="button"><?php echo $video_button_two;?></a></p>

	</div>
	<div class="clear"></div>
</section><!--id="ascreen_video" class="ascreen_section ascreen_video "-->

<?php }?>


	<div class="blog-content">
        <div class="wrap">
            
          	<?php if ( function_exists('ascreen_breadcrumbs') ) {echo ascreen_breadcrumbs();} ?>         
            <div class="main">
           
                <!--article-->
                <ul class="blog-article-list">
                	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                
                    <li id="post-1176">
                        <a href="<?php the_permalink(); ?>"  class="images newsflash">
						<?php 
							if(has_post_thumbnail())
							{
								the_post_thumbnail( array(185, 135) );
                             }else{
								 
						?>
                        
                        <img width="185"  src="<?php echo esc_url(get_template_directory_uri());?>/images/default.jpg" class="attachment-185x135 size-185x135 wp-post-image" sizes="(max-width: 185px) 100vw, 185px" />  
                        <?php 
								 
								}
						?>
                        </a>
                        
                		<div class="info">
                    		<h3><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h3>
                            
							<?php ascreen_get_author_info();?>

                    		<div class="quote">
                            	<p><?php the_excerpt(); ?></p>
							</div>
                		</div>
            		</li>
                    
                    <?php endwhile;endif; ?>                
                    
            	</ul><!--ul class="blog-article-list"-->
 
 
 				<?php //ascreen_paging_nav(); ?>

                <?php 
					the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => __( 'Previous ', 'ascreen' ),
						'next_text' => __( ' Next', 'ascreen' ),
						'screen_reader_text' => __( ' ', 'ascreen' ),
						
					) );
				?>
 
            </div><!--div class="main"-->

            <!--siedbar-->
            <?php get_sidebar(); ?>
            
            
    	</div><!--div class="wrap"-->
	</div><!--div class="blog-content"-->


<?php get_footer(); ?>