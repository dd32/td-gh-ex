<?php get_header(); ?>
 
    <div id="content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div class="post">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
 
 
            <div class="entry">
            <?php the_content(); ?>
		<?php wp_link_pages(); ?>

 
            </div>

    <div class="postmetadata">
        <?php edit_post_link('Edit'); ?>
    </div>
 
        </div>
         

<?php endwhile; ?>
 
    <div class="navigation">
        <?php posts_nav_link(); ?>
    </div>
 
<?php endif; ?>
</div>
 
<?php get_sidebar(); ?>
<?php get_template_part( 'sidebar2'); ?>
<?php get_footer(); ?>