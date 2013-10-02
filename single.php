<?php 

	get_header(); 
	do_action( 'wip_header_content' );

?>

<!-- start content -->

<div class="container main-content page">

	<div class="row">
       
        <div <?php post_class(array('pin-article', wip_template('span') , wip_template('sidebar'))); ?> >
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            
                do_action('wip_postformat');
    
            ?>
                
            <div style="clear:both"></div>
            
        </div>

	<?php get_sidebar(); ?>

	<?php endwhile; get_template_part('pagination'); endif;?>
           
    </div>
    
</div>

<?php

	do_action( 'wip_footer_content' ); 

	get_footer(); 

?>