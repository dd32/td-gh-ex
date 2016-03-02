<?php 
//single.php

get_header(); ?>   

<div class="ct_single">
	<div class="container"><div class="row">

        <div class="col-md-9 ct_single_content">    
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    
            <h1 class="ct_title_h1"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h1>
            <div class="ct_entry_meta">
                <span><i class="fa fa-clock-o"></i><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m'));?>"><?php echo get_the_date("M d, Y");?></a></span>
                <span><i class="fa fa-user"></i><?php echo get_the_author_link(); ?></span> 
                <span><i class="fa fa-file-o"></i><?php the_category(', '); ?></span>
                <?php edit_post_link( __('Edit','Acool'), '<span><i class="fa fa-pencil"></i>', '</span>', get_the_ID() ); ?>         
            </div>
    
            <?php the_content(); ?>
            
            
            <hr style="color:#CCC; margin:3em 0;">    
            
            <?php
                $withcomments = "1";
                comments_template(); 
            ?>       
  
        <?php endwhile;endif; ?> 
        </div>
        
        
        
        <?php get_sidebar( 'acool' ); ?>
          
    
	</div></div> 		      
</div>


<?php get_footer(); ?>