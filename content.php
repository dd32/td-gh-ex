<section id = "site-content">
    <article id = "post-<?php the_ID(); ?> <?php post_class(); ?>">
        <h3 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'silverquantum' ); ?></a></h3>
        <small><?php silverquantum_metadata_posted_on_setup(); ?></small>
        <div class = "entry-content">
                <div class = "small-post-thumbnail">
                <?php the_post_thumbnail('silverquantum-small-thumbnail'); ?>
                </div>
            <?php the_content(); ?>   
                <?php wp_link_pages(); ?>
        </div>
        <small><?php silverquantum_metadata_posted_in_setup(); ?></small>
    </article>
</section>
<?php get_sidebar('post-content'); ?>