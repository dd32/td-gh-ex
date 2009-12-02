<?php
/*
Template Name: Archive
*/
?>

<?php get_header(); ?>

<div id="content">
	
<?php include(TEMPLATEPATH."/breadcrumb.php");?>

<?php sidebar_alt(); ?> 

	<?php sp_content_div(); ?>
    
		<div class="post">
        
            <div class="entry">            
                						
			<h1><?php _e("Site Archives", 'studiopress'); ?></h1>
				
			<div class="archive">
                
                <h4><?php _e("by page:", 'studiopress'); ?></h4>
                    <ul>
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                    
                <h4><?php _e("by month:", 'studiopress'); ?></h4>
                    <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                    
                <h4><?php _e("by category:", 'studiopress'); ?></h4>
                    <ul>
                        <?php wp_list_categories('sort_column=name&title_li='); ?>
                    </ul>
                                        
			</div>
		
			<div class="archive">
                
                <h4><?php _e("by author:", 'studiopress'); ?></h4>
                    <ul>
                        <?php wp_list_authors('exclude_admin=0&optioncount=1'); ?>   
                    </ul>
                                    
                <h4><?php _e("by post:", 'studiopress'); ?></h4>
                    <ul>
                        <?php wp_get_archives('type=postbypost&limit=100'); ?> 
                    </ul>    
                                    
			</div>
                        
            <div class="clear"></div>
            
            </div>
                
		</div>
					
	</div>
    
<?php get_sidebar(); ?>
			
</div>

<?php get_footer(); ?>