<section id = "site-content">
    <article id = "post-<?php the_ID(); ?> <?php post_class(); ?>">
	<div class = "medium-post-thumbnail">
	<?php the_post_thumbnail('azulsilver-medium-thumbnail'); ?>
	</div>
            <h3 class = "entry-title"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'silverquantum' ); ?></h3>
            <small><?php silverquantum_metadata_posted_on_setup(); ?></small>
            <div class = "entry-content">
                <?php the_content(); ?>            
            </div>
            <small><?php silverquantum_metadata_posted_in_setup(); ?></small>
            <?php comments_template(); ?>
    </article>
</section>
<?php get_sidebar('post-content'); ?>