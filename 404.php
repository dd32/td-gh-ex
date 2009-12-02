<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/breadcrumb.php");?>

<?php sidebar_alt(); ?> 

<?php sp_content_div(); ?>
    
    <div class="post">
         <div class="entry">
			<h1><?php _e("Not Found, Error 404", 'studiopress'); ?></h1>
        	<p><?php _e("The page you are looking for no longer exists. Perhaps you can return back to the site's", 'studiopress'); ?> <a href="<?php bloginfo('siteurl');?>"><?php _e("homepage", 'studiopress'); ?></a> <?php _e("and see if you can find what you are looking for.", 'studiopress'); ?></p>
        </div>
	</div>
    
</div>
            		    
<?php get_sidebar(); ?>
			
</div>

<?php get_footer(); ?>