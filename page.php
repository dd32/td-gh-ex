<?php 

	get_header(); 
	do_action( 'alhena_lite_header_content' );

	if ( (alhena_lite_postmeta('wip_content') == "on") || (!alhena_lite_postmeta('wip_content') )): 
	
?>

<!-- START CONTENT -->

<div id="content" class="container main-content page">

	<div class="row" >
        
		<div class="<?php echo alhena_lite_template('span') . " " . alhena_lite_template('sidebar'); ?>">
                
			<div class="row">
        
                <div <?php post_class(); ?> >
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                       
                        <?php do_action('alhena_lite_postformat'); ?> 
                
                        <?php wp_link_pages(array('before' => '<div class="wip-pagination">' . esc_html__('Pages:',"alhena-lite"), 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>') ); ?>
                
                    <?php endwhile; endif;?>
                
                </div>
			
            </div>
		
        </div>

		<?php get_sidebar(); ?>
    
	</div>
    
</div>

<?php 
	
	endif; 
	
	do_action( 'alhena_lite_footer_content' ); 

	get_footer(); 

?>