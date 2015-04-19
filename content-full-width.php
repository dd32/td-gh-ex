<section id="site-content-full">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h3 class="entry-title"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'barista' ); ?></h3> 
            <?php the_content(); ?>
                <?php comments_template(); ?>
    </article>
</section>