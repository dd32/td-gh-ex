<?php 
	get_header();
	 
	$homepage_banner_img_deault = get_stylesheet_directory_uri().'/images/banner1.jpg';
?>
        <section class="ct_section ct_section_slider">
            <div id="carousel-acool-generic" class="carousel slide" data-ride="carousel" data-interval="5000" >
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo esc_url(acool_get_option( 'ct_acool','homepage_banner_img',$homepage_banner_img_deault));?> "  width="100%"/>
                        <div class="carousel-caption">
                        <h1><?php echo esc_html(acool_get_option( 'ct_acool','homepage_banner_text_h1',__( 'The jQuery slider that just slides.', 'acool' )) );?></h1><p class="ct_slider_text"><?php echo esc_html(acool_get_option( 'ct_acool','homepage_banner_text',__( 'No fancy effects or unnecessary markup.', 'acool' )) );?></p><a class="btn" href="<?php echo esc_url(acool_get_option( 'ct_acool','homepage_banner_button_url','#') );?>"><?php echo esc_html(acool_get_option( 'ct_acool','homepage_banner_button_text',__( 'Download', 'acool' )) );?></a>                       
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

                        <?php the_content(); ?>
                    </div>
                    <p class="ct_clear"></p> 
                </div><!--div class="ct_border"-->

                
            <?php endwhile;endif; ?> 

            
            <div class="download"><a class="btn" href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) ));?>"><?php _e('More Article...','acool');?></a></div>

            </div>
            
            <?php get_sidebar(); ?>
              
        
        </div></div> 

    </div><!--div id="ct_content" class="ct_acool_content"-->

<?php get_footer(); ?>