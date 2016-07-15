<?php get_header(); ?>


<?php

	if ( !(defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED) )
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

		<div class="container"><div class="row">
		
		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb','1' ) ){ acool_breadcrumbs();} ?>  
			
			<div class="col-md-9 ct_single_content ct_post_content">    
			<?php
				global $wpdb;
				query_posts( array( 'showposts' => 10 ) ); 
				if (have_posts()) :  while (have_posts()) : the_post(); 
		 	?>
		
				<h1 class="ct_title_h1"><a href="<?php echo esc_url(get_permalink());?>"><?php esc_html(the_title()); ?></a></h1>
				
            <?php 
				$hide_post_meta = acool_get_option( 'ct_acool','hide_post_meta',0 ); 
				if(!$hide_post_meta ){ acool_show_post_meta();}
			?>   
				
			<?php  if(has_post_thumbnail()){ ?>               
				<div class="ct_center">
				<a href="<?php the_permalink(); ?>" class="ct_post_thumbnail" >
				<?php 						
					$exclude_id = get_the_ID();
				?>
				<img src="<?php $arr = acool_get_thumbnail($exclude_id);echo esc_url($arr['fullpath']);?>"  />
				</a> 
				</div>          
			<?php } ?>         
							
				<?php the_excerpt(); ?>

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