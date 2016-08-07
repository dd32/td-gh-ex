<?php 
//post page

get_header(); ?>  

<div class="ct_single">
	<div class="container"><div class="row">
 		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb',1) ){ acool_breadcrumbs();} ?>  
        
        <div class="col-md-8 ct_single_content ct_post_content"> 
  		
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    		<div id="ct_border_top" class="ct_border ct_list_img">
				<?php  if(has_post_thumbnail()){ ?>               
                    <div class="ct_center">
                    <a href="<?php the_permalink(); ?>" class="ct_post_thumbnail">
                    <?php 						
                        the_post_thumbnail();
                    ?>
                    </a> 
                    </div>          
                <?php } ?>            
            	
                <div class="ct_border_text">
            
                    <h1 class="ct_title_h1"><a href="<?php echo esc_url(get_permalink());?>"><?php the_title(); ?></a></h1>
                    
                    <?php 
                        $hide_post_meta = acool_get_option( 'ct_acool','hide_post_meta',0 ); 
                        if(!$hide_post_meta ){ acool_show_post_meta();}
                    ?>               

                    <?php the_content(); ?>
                </div>
				<p class="ct_clear"></p> 
			</div><!--div class="ct_border"-->
            
        <?php endwhile;?>
		
		<?php else: ?> 
            <div class="ct_border">
                <h1 class="ct_title_h1"><?php _e( 'No Results', 'acool' ); ?></h1>
            </div>
		
		<?php endif; ?> 
        
        
        <?php acool_paging_nav(); ?>
        
        </div>
        
        <?php get_sidebar(); ?>
          
    
	</div></div> 		      
</div>

<?php get_footer(); ?>