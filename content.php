<?php
/**
 * @package Aplos
 * @since Aplos 1.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php aplos_post_thumbnail() ?>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'aplos'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

        <?php if ('post' == get_post_type()) : ?>
        <div class="entry-meta">
            <?php aplos_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if (is_search()) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
        <?php the_content(sprintf('%1$s <span class="meta-nav">&raquo;</span>', get_theme_mod('read_more_text', __('Read More', 'aplos')))); ?>
        <?php wp_link_pages(array( 'before' => '<div class="page-links">' . __('Pages:', 'aplos'), 'after' => '</div>' )); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
        <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(__(', ', 'aplos'));
                if ($categories_list) :
            ?>
            <span class="cat-links">
                <?php printf('%1$s %2$s', get_theme_mod('categories_text', __('Filed Under:', 'aplos')), $categories_list); ?>
            </span>
            <?php endif; // End if categories ?>

            <?php
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', __(', ', 'aplos'));
                if ($tags_list) :
            ?>
            <span class="sep"> | </span>
            <span class="tag-links">
                <?php printf(__('%1$s %2$s', 'aplos'), get_theme_mod('tags_text', __('Tagged:', 'aplos')),  $tags_list); ?>
            </span>
            <?php endif; // End if $tags_list ?>
        <?php endif; // End if 'post' == get_post_type() ?>

        <?php if (! post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
        <span class="sep"> | </span>
        <span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'aplos'), __('1 Comment', 'aplos'), __('% Comments', 'aplos')); ?></span>
        <?php endif; ?>

        <?php edit_post_link(__('Edit', 'aplos'), '<span class="sep"> | </span><span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

