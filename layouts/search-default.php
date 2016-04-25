<div class="container">

	<div class="row" id="blog" >
    
	<?php if ( ( suevafree_template('sidebar') == "left-sidebar" ) || ( suevafree_template('sidebar') == "right-sidebar" ) ) : ?>
        
	<div class="<?php echo suevafree_template('span') .' '. suevafree_template('sidebar'); ?>"> 
        
		<div class="row"> 
        
    <?php 
	
		endif;
		
		if ( have_posts() ) :  
		
	?>
		
            <div <?php post_class(); ?> >
    
                <div class="post-article search">
    
                    <p><?php _e( '<span>Search </span> results for', 'suevafree' ) ?> <strong><?php echo $s; ?> </strong></p>
                    
                </div>
    
            </div>
		
	<?php while ( have_posts() ) : the_post(); ?>

			<div <?php post_class(); ?> >
    
				<?php do_action('suevafree_postformat'); ?>
        
                <div style="clear:both"></div>
            
            </div>
		
	<?php endwhile; else:  ?>

            <div class="post-container col-md-12" >
    
                <div class="post-article search">
                    
                    <p><?php _e( 'Sorry, no posts matched your criteria','suevafree' ) ?> <strong>: <?php echo $s; ?> </strong></p>
     
                </div>
    
            </div>
	
	<?php 
	
		endif;
		
		if ( ( suevafree_template('sidebar') == "left-sidebar" ) || ( suevafree_template('sidebar') == "right-sidebar" ) ) : ?>
        
		</div>
    
	</div>
        
    <?php 
	
		endif;
		
		if ( suevafree_template('span') == "col-md-8" ) :  
		
			do_action('suevafree_side_sidebar', 'search-sidebar-area');

    	endif; 
	
	?>

    </div>
    
</div>