<?php 

	get_header(); 
	do_action( 'wip_header_content' );

	if ( (wip_postmeta('wip_content') == "on") || (!wip_postmeta('wip_content') )): 
	
?>

<!-- START CONTENT -->

    <div class="container main-content page">
    
        <div class="row" >
        
        <div <?php post_class(array('pin-article', wip_template('span'), wip_template('sidebar'))); ?> >
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               
				<?php do_action('wip_postformat'); ?> 
        
                <?php wp_link_pages(); ?>
        
            <?php endwhile; endif;?>
        
        </div>
        
            <?php get_sidebar(); ?>
    
        </div>
    
    </div>

<!-- END CONTENT -->

<?php 
	
	endif; 
	
	do_action( 'wip_footer_content' ); 

	get_footer(); 

?>