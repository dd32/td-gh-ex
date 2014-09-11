<?php
/**
 * @package Aplos
 * @since Aplos 1.0.0
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
 
        <div class="entry-meta">
            <?php aplos_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
 
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'aplos' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
 
    <footer class="entry-meta">
        <?php
            $category_list = get_the_category_list( __( ', ', 'aplos' ) );
            $tag_list = get_the_tag_list( '', ', ' );
 
            if ( ! aplos_categorized_blog() ) {
                // Blog with 1 category
                if ( '' != $tag_list ) {
                    $meta_text = __( 'Filed Under: %1$s Tagged: %2$s', 'aplos' );
                } else {
                    $meta_text = __( 'Filed Under: %1$s', 'aplos' );
                }
 
            } else {
                // Blog with multiple categories gets displayed
                if ( '' != $tag_list ) {
                    $meta_text = __( 'Filed under: %1$s Tagged: %2$s', 'aplos' );
                } else {
                    $meta_text = __( 'Filed under: %1$s', 'aplos' );
                }
 
            } // end check for categories on this blog
 
            printf(
                $meta_text,
                $category_list,
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
            );
        ?>
 
        <?php edit_post_link( __( 'Edit', 'aplos' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->