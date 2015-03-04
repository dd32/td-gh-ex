<section id = "site-content">
    <article class = "<?php if (is_sticky()) { ?> sticky <?php } ?>" id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h3 class = "entry-title"><?php the_title(); ?></h3>
        <small class = "metadata-posted-on"><?php silverquantum_metadata_posted_on_setup(); ?></small>
        <?php the_content(); ?>
        <small class = "metadata-posted-in"><?php silverquantum_metadata_posted_in_setup(); ?></small>
        <?php comments_template(); ?>
    </article>
</section>
<?php get_sidebar('post-content'); ?>