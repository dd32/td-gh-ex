<?php 
	get_header();
	 
 	if( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED ){ 
		get_template_part('/includes/pro/front-page-part');
 	}
	else
	{		
		$homepage_banner_img_deault = get_stylesheet_directory_uri().'/images/banner1.jpg';			
		$homepage_banner_text_deault = '<h1>The jQuery slider that just slides.</h1><p class="ct_slider_text">No fancy effects or unnecessary markup.</p><a class="btn" href="#download">Download</a>';

?>

        <section class="ct_section ct_section_slider">
            <div id="carousel-acool-generic" class="carousel slide" data-ride="carousel" data-interval="5000" >
                <div class="carousel-inner">
                    <div class="item active">
                        <a href="#" target="_blank"><img src="<?php echo esc_url(acool_get_option( 'ct_acool','homepage_banner_img',$homepage_banner_img_deault));?> "  width="100%"/></a>
                        <div class="carousel-caption">
                            <?php echo acool_get_option( 'ct_acool','homepage_banner_text',$homepage_banner_text_deault);?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


		<br>
        <div class="container"><div class="row">        
            <div class="col-md-8 ct_single_content ct_post_content">    
                <?php 	
                    global $wpdb;
                    query_posts( array( 'showposts' => 10 ) ); 
                    if (have_posts()) :  while (have_posts()) : the_post(); 
                ?>
                <div id="ct_border_top" class="ct_border ct_list_img">
				<?php  if(has_post_thumbnail()){ ?>               
                    <div class="ct_center">
                    <a href="<?php esc_url(the_permalink()); ?>" class="ct_post_thumbnail">
                    <?php 						
                        the_post_thumbnail();
                    ?>
                    </a> 
                    </div>          
                <?php } ?>             
                    
                    <div class="ct_border_text">
                
                        <h1 class="ct_title_h1"><a href="<?php echo esc_url(get_permalink());?>"><?php esc_html(the_title()); ?></a></h1>
                        
                        <?php 
                            $hide_post_meta = acool_get_option( 'ct_acool','hide_post_meta',0 ); 
                            if(!$hide_post_meta ){ acool_show_post_meta();}
                        ?>               

                        <?php the_excerpt(); ?>
                    </div>
                    <p class="ct_clear"></p> 
                </div><!--div class="ct_border"-->

                
            <?php endwhile;endif; ?> 

            
            <div class="download"><a class="btn" href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) ));?>"><?php _e('More Article...','acool');?></a></div>

            </div>
            
            <?php get_sidebar( 'acool' ); ?>
              
        
        </div></div> 

<?php
	}
?>
    </div><!--div id="ct_content" class="ct_acool_content"-->

<?php get_footer(); ?>