<?php
/**
 * The template for displaying featured content
 *
 * @package Authorize
 */
$featured_posts = authorize_get_featured_posts();
/*
if ( empty( $featured_posts ) ) {
	return;
}
*/
?>

<div id="featured-content" class="featured-content">
	<div class="featured-content-inner"> 
    	        
                
		<?php 
			//If no content, tell admin where to add it
			if( empty( $featured_posts )  && current_user_can('administrator') ) {  
				//Get the tag name for featured content
				$featured_content =get_option( 'featured-content' );
		?> 
    		<div class="admin_notice">
            	<h2>Featured Content Here</h2>
                <p>Posts with the tag or category ' <strong><?php echo $featured_content['tag-name'] ?></strong> ' will be displayed here in a 2 column format.</p>
                <small style="font-style:italic">This notice only appears to site administrators. Regular site visitors do not see it.</small>
                
            </div>
		<?php } ?>

		<?php
			foreach ( $featured_posts as $post ) {
				setup_postdata( $post );

				 // Include the featured content template.
				get_template_part( 'components/features/featured-content/content', 'featured' );
			}

			wp_reset_postdata();
		?>
	</div>
</div>
