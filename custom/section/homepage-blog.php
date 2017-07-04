<?php
//blog
  $i=10;
  $key = 'blog';
  
  $sections = ascreen_get_section_default(); 
  
  $default = $sections[$key];
  
  $enable_parallax_background = get_theme_mod( $key.'_enable_parallax_background', 1 );	  
  $blog_background_overlay = get_theme_mod( 'blog_background_overlay',1);	
  // background
  $section_background_image  = get_theme_mod( $key.'_section_background_image',$default['img']); 
  	
  //--------------section css set-------------------
  
  $blog_article_number = get_theme_mod( 'blog_article_number',3);
  
  $blog_url = get_theme_mod( 'blog_url','');  
  
  $blog_categories = get_theme_mod( 'blog_categories','');

  $blog_button_text = get_theme_mod( 'blog_button_text',__( 'Read The Blog', 'ascreen' ));
  
  

?>    
       
<section id="ct_<?php echo $key;?>" class="ct_section ct_<?php echo $key;?> ct_section_<?php echo $i;?> <?php if($enable_parallax_background){echo 'parallax-window';}?>" <?php if($enable_parallax_background){ ?>  data-parallax="scroll" data-image-src="<?php if($section_background_image !=''){echo $section_background_image;} ?>" <?php }?>  >
	<div  id="<?php echo $key;?>" class="section_content <?php if($blog_background_overlay){echo 'overlay';}?>">

        <div class="ct-title container">
        	<?php if ( get_theme_mod( $key.'_section_title', $default['title'] ) != '' ) : ?>
            <h1 class="section_title "><?php echo esc_html( get_theme_mod( $key.'_section_title', $default['title'] ) );  ?></h1>
            
			<?php endif; ?>
			<?php if ( get_theme_mod( $key.'_section_description', $default['description'] ) != '' ) : ?>
				<p class="section_text"><?php echo esc_html( get_theme_mod( $key.'_section_description', $default['description'] ) ); ?></p>
			<?php endif; ?>
            
        </div>
        
        <div class="ct_post_list container">
            <div class="row">
			    <?php
					//Pull all the categories into an array
					$options_categories = array();
					$options_categories_obj = get_categories();
					foreach ($options_categories_obj as $category) {
						$options_categories[$category->cat_name] = $category->cat_ID;
					}

					$options_cat_id = array();
					//$p=0;

					if($options_categories){
						foreach ( $options_categories as $cat_name => $cat ) {
							if(!empty($blog_categories)){	
							if (!in_array($cat_name, $blog_categories)){$options_cat_id[]= $cat;}	
							}
								//$p++;
						}
					}
					global $wpdb;//ignore_sticky_posts //caller_get_posts 3.1 del

					if(empty($options_cat_id)){
						
						query_posts( array( 
						'showposts' => $blog_article_number,// $post_list_num
						'ignore_sticky_posts' => 1,
						
						 )); 

					}else{
					
						query_posts( array( 
						  'showposts' => $blog_article_number, 
						  'ignore_sticky_posts' => 1,
						  'category__in' => $options_cat_id,
						 ));
					}
					 
                    if (have_posts()) :  while (have_posts()) : the_post();                             
                ?>
                    <div class="col-md-4 ">  
                    
              			<div class="col-md-12 ct_clear_margin_padding ">
                            <div id="post-3420" class="ct_vertical_column ">
                                <div class="ct_post_img">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php
                                            $exclude_id = get_the_ID();
                                            $thumb_array = ascreen_get_thumbnail($exclude_id);
                                    ?>
                                            <img src="<?php if($thumb_array['fullpath'] != ''){echo $thumb_array['fullpath'];}?>" />
                                    
                                        <div class="meta">
                                            <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>


						<div class="col-md-12 ct_post_2_info ct_clear_margin_padding">
                            <div class="ct_post_info">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="post-meta-2"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> <?php the_time('M d, y');?>  </p>   
                                <div class="post-content"><a href="<?php the_permalink(); ?>"><?php the_excerpt();?> </a></div>         
                            </div>
                        </div>                    
                    
                    </div><!--div class="ct_row ct_clear_margin_padding"-->

                <?php endwhile; endif; ?>
                <p class="clear"></p>                             
				<div class="ct_post_readmore"><a class="post_readmore_bttn" href="<?php echo $blog_url; ?>"><?php if($blog_button_text!=''){echo esc_html($blog_button_text);}else{echo __( 'Read The Blog', 'ascreen' );}?></a></div>   

                                         
            </div>	
        </div>
        
        

	</div>
	<div class="clear"></div>
</section>