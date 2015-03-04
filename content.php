<section id = "site-content" class = "cf">
    <article class = "<?php if (is_sticky()) { ?> sticky <?php } ?>" id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h3 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <small class = "metadata-posted-on"><?php silverquantum_metadata_posted_on_setup(); ?></small>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
        <small class = "metadata-posted-in"><?php silverquantum_metadata_posted_in_setup(); ?></small>
    </article>
</section>
<?php get_sidebar('post-content'); ?>