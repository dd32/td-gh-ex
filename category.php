<?php 
//post page

get_header(); ?>  

<div class="ct_single">
	<div class="container"><div class="row">
 		<?php if(function_exists('ct_breadcrumbs') && of_get_option("show_breadcrumb") =='yes' ) ct_breadcrumbs();?>   
        
        <div class="col-md-9 ct_single_content ct_post_content">    
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    
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


            <hr style="color:#CCC; margin:0; padding:0;">    
     
            
        <?php endwhile;endif; ?> 
        
        
        <?php acool_paging_nav(); ?>
        
        </div>
        
        <?php get_sidebar(); ?> 
          
    
	</div></div> 		      
</div>

<?php get_footer(); ?>