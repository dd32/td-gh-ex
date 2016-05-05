<?php get_header(); ?>   

<div class="ct_single">

	<div class="container"><div class="row">
    
    	<?php get_sidebar( 'content' ); ?>   
    
 		<div style="margin-left:15px; padding:0;"><?php if(function_exists('acool_breadcrumbs') && of_get_option("show_breadcrumb") =='yes' ) acool_breadcrumbs();?></div>  
    
        <div class="col-md-9 ct_single_content" >     
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="ct_title_h1"><?php the_title(); ?></h1>
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
    
            <?php the_content(); ?>
            
            <p class="ct_clear"></p>
            <hr class="ct_hr"> 
            
          
            <?php if(has_tag()){?>
                <div id="article-tag">
                <?php the_tags('<strong>Tags:</strong> ', ' , ' , ''); ?>
                </div> 
            <?php }?> 
            
			<p></p>

			<?php acool_previous_next('normal');?>

            
            <?php
                $withcomments = "1";
                comments_template();
            ?>  
            

                 
             </div>  
        <?php endwhile;endif; ?> 
        </div>
    
        <?php get_sidebar( 'acool' ); ?>
             
	</div></div> 		      
</div>

<?php get_footer(); ?>