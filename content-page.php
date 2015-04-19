<section id="site-content">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h3 class="entry-title"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'barista' ); ?></h3>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
            <?php comments_template(); ?>
    </article>
</section>
<?php get_sidebar('page'); ?>