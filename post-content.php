<?php

/* 	Searchlight Theme's Post Content
	Copyright: 2014-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/
?>

<div id="content">
          
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
    
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    
    	<div class="post-container">
        
			<div class="fpthumb"><?php the_post_thumbnail('searchlight-fpage-thumb'); ?></div>
        	<div class="entrytext">
            	<?php if ( is_single() || is_page() ): ?><h1 class="page-title"><?php the_title(); ?></h1><?php else: ?><a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a><?php endif; ?>
        		<div class="content-ver-sep"> </div>
				<?php searchlight_content(); ?>
        	</div>
            
        	<div class="clear"> </div>
            	<?php if ( !is_page() ): ?>
        		<div class="up-bottom-border">
            	<?php  wp_link_pages( array( 'before' => '<div class="page-link fa-file"><span>' . '' . '</span>', 'after' => '</div><br/>' ) ); 
            	searchlight_post_meta();
				if ( is_single() ): ?>
            	<div class="content-ver-sep"> </div>
            	<div class="content-ver-sep"> </div>
            	<div class="floatleft"><?php next_post_link('%link', '<span class="pagenavicon fa-arrow-left"></span> <strong>%title</strong>&nbsp;'); ?></div>
 				<div class="floatright"><?php previous_post_link('%link', '&nbsp;<strong>%title</strong> <span class="pagenavicon fa-arrow-right"></span>'); ?></div><br /><br />
             	<?php if ( is_attachment() ): ?>
            	<div class="floatleft"><?php next_image_link( false, '<span class="fa-arrow-left"></span> ' . esc_html__('Previous Image', 'searchlight') ); ?></div>
				<div class="floatright"><?php previous_image_link( false,  esc_html__('Next Image', 'searchlight') . ' <span class="fa-arrow-right"></span>' ); ?></div>  
           		<?php endif; endif; ?>
			</div>
            <?php endif; ?>
            
		</div>
    </div>
	<?php endwhile; ?>
	<!-- End the Loop. -->          
        	
		<?php 
		if ( is_page() || is_single() ): comments_template('', true);	endif;         
		searchlight_page_nav(); ?>
  	
	<?php else: ?>
 
 		<?php searchlight_not_found(); ?>
 
	<?php endif; ?>
          	            
            
</div>		
