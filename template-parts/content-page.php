<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Base WP
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <?php igthemes_before_single_title(); ?>
        <?php if (get_post_meta( get_the_ID(), 'igthemes-page-title', TRUE ) !='yes') { the_title( '<h1 class="entry-title">', '</h1>'); } ?>
        <?php igthemes_after_single_title(); ?>

    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php igthemes_before_single_content(); ?>
            <?php the_content(); ?>
        <?php igthemes_after_single_content() ; ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'base-wp' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="page-entry-footer">
        <?php edit_post_link( esc_html__( 'Edit', 'base-wp' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
