






		
<div id="sidebar">
<h2>Popular</h2>
<?php include (TEMPLATEPATH . '/featlist.php'); ?>
<div id="sidebar_top">

            
            

    
</div> 
    <div id="sidebar_left">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_left') ) : ?>		
        <h2>Archives</h2>
        <ul>	
            <?php wp_get_archives('type=monthly'); ?>				
        </ul>	
    <?php endif; ?>
    </div>
    
    <div id="sidebar_right">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_right') ) : ?>
    
    <?php 
        if (!function_exists('wp_list_bookmarks')) { 
            echo '<h2>Links</h2><ul>';
            get_links('1','<li>','</li>','',false,'name',false);
            echo '</ul>';
        } 
        else {
            wp_list_bookmarks(array('title_before' => '<h2>', 'title_after' => '</h2>',	'category_before' => '', 'category_after' => ''));
        } 
        ?>
    <?php endif; ?>
    </div>

</div>