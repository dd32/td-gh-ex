<div id="ads" class="tabdiv">

<form method="get" action="<?php bloginfo('url'); ?>/" id="srcform">
	<fieldset>
		
		<input type="text" value="Search..." name="s" id="srcinput" /> 
		<input type="submit" value="GO!" id="srcbutton" />
	</fieldset>
</form>


			</div>
<div id="sidebar">
<div id="sidebar_top">
	
    <div id="about" class="tabdiv">

<?php 
	$img = get_option('pov_img'); 
	$about = get_option('pov_about'); 
	?>			
<p class="text">
<img src="<?php echo ($img); ?>" class="avatar" alt="" />
<?php echo ($about); ?> 
</p>
			


            
            
            		
			
		
		<p>&nbsp;</p>	
			
            </div>
              <hr/>	
                 
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_full') ) : ?>	
    
        <h3>Categories</h3>
        <ul>	
            <?php wp_list_cats('sort_column=name'); ?>				
        </ul>

        
        
    <?php endif; ?>
    
    <hr/>
    
</div> 
    <div id="sidebar_left">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_left') ) : ?>		
        <h3>Archives</h3>
        <ul>	
            <?php wp_get_archives('type=monthly'); ?>				
        </ul>	
    <?php endif; ?>
    </div>
    
    <div id="sidebar_right">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_right') ) : ?>
    
    <?php 
        if (!function_exists('wp_list_bookmarks')) { 
            echo '<h3>Links</h3><ul>';
            get_links('1','<li>','</li>','',false,'name',false);
            echo '</ul>';
        } 
        else {
            wp_list_bookmarks(array('title_before' => '<h3>', 'title_after' => '</h3>',	'category_before' => '', 'category_after' => ''));
        } 
        ?>
    <?php endif; ?>
    </div>

</div>