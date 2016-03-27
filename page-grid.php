<?php // Template name: Grid ?>

<?php get_header(); ?>

<?php 
// Define variables
$bnt_parent_page_id = get_the_ID();
$bnt_grid_mode = get_post_meta( $bnt_parent_page_id, 'bnt_page_grid_mode', true );
$bnt_grid_columns = get_post_meta( $bnt_parent_page_id, 'bnt_page_columns', true );
?>

<div class="bnt-container">
    
    <div class="content content-page">
        <main class="site-main grid-main grid-main-<?php echo $bnt_grid_mode; ?>" role="main">
        	
            <?php 
            // The primary Loop
            if ( have_posts() ) { 
                while ( have_posts() ) { 
                    the_post(); 
                    // Include the page content
                    get_template_part( 'content', 'page' );   					                 
                // End the Loop
                } 
            }
            ?>
			
			    
			<?php	
			// Filter for portfolio items
			if ( function_exists( 'bnt_ep_portfolio_filter' ) && implode( get_post_meta( $bnt_parent_page_id, 'bnt_page_content_types', true ) ) == 'project' ) {
				bnt_ep_portfolio_filter();
			}
			?>
            
			<?php 
            // Build the query
            $bnt_query = new WP_Query( bnt_grid_query() );
            
            // Start the Loop
            if ( $bnt_query->have_posts() ) { 
            ?>
            	
                <div class="spinner-grid">
                	<div class="spinner-grid-inner">
                    	<div class="spinner-circle">
                    	</div>
                    </div>
                </div>
                
                <div class="items-container grid-container grid-<?php echo $bnt_grid_mode; ?> grid-columns-<?php echo $bnt_grid_columns; ?>">
					
					<?php if ( get_post_meta( $bnt_parent_page_id, 'bnt_page_grid_mode', true ) != 'rows' ) { ?>
                	<div class="grid-sizer">
                    </div>
					<?php } ?>
                    
                    <?php
                    while ( $bnt_query->have_posts() ) { 
                        $bnt_query->the_post(); 
						
                        // Render the items
                    	get_template_part( 'content', 'grid' );  
                        
                    // End the Loop
                    }
                    ?>
                    
                </div>
            
            	<?php 
				if ( get_post_meta( $bnt_parent_page_id, 'bnt_page_ajax_load', true ) == 'on' ) {
					bnt_ajax_load_more(); 
				} else {
					bnt_grid_pagination();
				}
				
            }
            ?>
                   
        </main>
    </div>
    
    <?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>