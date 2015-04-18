<section id = "site-content">
    <article id = "post-<?php the_ID(); ?> <?php post_class(); ?>">
        <h3 class = "entry-title"><a href = "<?php the_permalink(); ?>"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'barista' ); ?></a></h3>
        <small class = "metadata-posted-on"><?php barista_metadata_posted_on_setup(); ?></small>
            <div class = "small-post-thumbnail cf">
                <?php the_post_thumbnail('barista-small-thumbnail'); ?>
            </div>
        <div class = "entry-content">
            <?php the_content(); ?>
                <?php
                        $defaults = array(
                                'before'           => '<p>' . __( 'Pages:', 'barista' ),
                                'after'            => '</p>',
                                'link_before'      => '',
                                'link_after'       => '',
                                'next_or_number'   => 'number',
                                'separator'        => ' ',
                                'nextpagelink'     => __( 'Next page', 'barista' ),
                                'previouspagelink' => __( 'Previous page', 'barista' ),
                                'pagelink'         => '%',
                                'echo'             => 1
                        );

                        wp_link_pages( $defaults );

                ?>
        </div>
        <small class = "metadata-posted-in"><?php barista_metadata_posted_in_setup(); ?></small>
    </article>
</section>
<?php get_sidebar('post-content'); ?>