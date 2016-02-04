<?php 

	/* Template Name: Left Sidebar */
	get_header(); 

?>

<div class="container">
    
    <div class="row" >
    
        <div class="post-container col-md-8 left-sidebar" >
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
                <?php if ( has_post_thumbnail() ) : ?>
                        
                    <div class="pin-container">
                        <?php the_post_thumbnail('blog'); ?>
                    </div>
                        
                <?php endif; ?>
                    
                <div class="post-article">
                
                    <h1 class="title"><?php the_title(); ?></h1>
                    
                    <div class="line"></div>
                
                    <?php 
                        
                        the_content();  
                        
                        wp_link_pages(); 
                        
                        comments_template();
                        
                    ?>
    
                </div>
                
            <div style="clear:both"></div>
            
        </div>
        
        <?php 
			
			do_action('suevafree_side_sidebar', 'sidebar-area');
			endwhile; endif;
			
		?>
           
    </div>
    
</div>

<?php get_footer(); ?>