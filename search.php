<?php 
//post page

get_header(); ?>  

<div class="ct_single">
	<div class="container"><div class="row">
 		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb',1) ){ acool_breadcrumbs();} ?>  
        
        <div class="col-md-9 ct_single_content ct_post_content"> 
  
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    
            <h1 class="ct_title_h1"><a href="<?php echo esc_url(get_permalink());?>"><?php esc_html(the_title()); ?></a></h1>
            
            <?php 
				$hide_post_meta = acool_get_option( 'ct_acool','hide_post_meta',0 ); 
				if(!$hide_post_meta ){ acool_show_post_meta();}
			?> 
            
            <a href="<?php the_permalink(); ?>" class="ct_post_thumbnail">
            <?php
                if(has_post_thumbnail()) 
                {
                    $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
            ?>
                    <img src="<?php echo $img_src[0];?>" />
            <?php		

                }
            ?>		

            </a>           
                        
            <?php the_content(); ?>

            <p class="ct_clear"></p>
            <hr class="ct_hr">    
     
            
        <?php endwhile;?>
		
		<?php else: ?> 
			<h1 class="ct_title_h1"><?php _e( 'No Results', 'acool' ); ?></h1>
        
		
		<?php endif; ?> 
        
        
        <?php acool_paging_nav(); ?>
        
        </div>
        
        <?php get_sidebar( 'acool' ); ?>
          
    
	</div></div> 		      
</div>

<?php get_footer(); ?>