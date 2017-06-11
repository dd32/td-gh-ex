<?php
/**
 * @package Aplos
 * @since Aplos 1.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php aplos_post_thumbnail() ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php aplos_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(array( 'before' => '<div class="page-links">' . __('Pages:', 'aplos'), 'after' => '</div>' )); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        <?php
            $category_list = get_the_category_list(__(', ', 'aplos'));
            $tag_list = get_the_tag_list('', ', ');

            if ($tag_list != '') {
                $meta_text = __('%1$s %3$s <span class="sep"> | </span> %2$s %4$s', 'aplos');
            } else {
                $meta_text = __('%1$s %3$s', 'aplos');
            }

            printf(
                $meta_text,
                get_theme_mod('categories_text', __('Filed Under:', 'aplos')),
                get_theme_mod('tags_text', __('Tagged:', 'aplos')),
                $category_list,
                $tag_list,
                get_permalink(),
                the_title_attribute('echo=0')
            );
        ?>

        <?php edit_post_link(__('Edit', 'aplos'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

