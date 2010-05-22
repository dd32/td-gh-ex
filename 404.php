<?php
/**
 * @package WordPress
 * @subpackage Adventure
 */

get_header(); ?>

<div id="center">
	
	<?php get_sidebar(); ?>
    
    <div id="content">
        <div id="label"><a href="#" title="<?php _e('Error 404 - Not Found', 'constructor'); ?>"><?php _e('Error 404 - Not Found', 'constructor'); ?></a></div>
		<p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'constructor'); ?></p>
		<?php get_search_form(); ?>
    </div>  
	

<?php endif; ?>

<?php get_footer(); ?>

</div>

<div id="endspacer">
</div>
    
<div id="header">
    
	<div id="title">
    	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    </div>
    	
    <div id="menu">
        <ul id="menulist">
			<?php $frontpage_id = get_option('page_on_front'); wp_list_pages('sort_column=menu_order&exclude='.$frontpage_id.'&depth=1&title_li=');?>
		</ul>
    </div>
    
    <div id="slogan">
    	<h2><?php bloginfo('description');?></h2>
    </div> 
    
</div>

</body>
</html>