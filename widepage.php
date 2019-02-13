<?php
/*
Template Name: Wide, no sidebars
*/
?>

<?php get_header(); ?>
 
    <div id="content2">

        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
	<div class="post">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
 
		<div class="postmetadata">
        	<?php edit_post_link('EDIT'); ?><br/>
    		</div>
 
            <div class="entry">
            <?php the_content(); ?>
            </div>
			
		<div class="pagenumber">  
			<?php wp_link_pages(); ?> 
		</div>
 

	</div>

<?php endwhile; ?>
 
<?php endif; ?>
		
</div>

<?php get_footer(); ?>