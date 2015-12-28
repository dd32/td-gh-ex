<?php get_header(); ?>   

<div class="ct_single ct_page" >
 	<?php if(function_exists('ct_breadcrumbs') && of_get_option("show_breadcrumb") =='yes' ) ct_breadcrumbs();?> 

	<div class="ct_page_content">
    
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        
            <?php the_content(); ?>
                       
        <?php endwhile;endif; ?> 
        
        <?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'Acool' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			) );
		?>
 	</div>
    	      
</div>

<?php get_footer(); ?>