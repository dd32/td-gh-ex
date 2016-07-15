<?php 
//post page

get_header(); ?>  

<div class="ct_single">
	<div class="container"><div class="row">
 		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb',1 ) ){ acool_breadcrumbs();} ?>  
        
        <div class="col-md-9 ct_single_content ct_post_content">    
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    
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
</div>

<?php get_footer(); ?>