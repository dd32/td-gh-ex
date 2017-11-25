<?php
/*
================================================================================================
White Spektrum - content-none.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
404 and Search as well as recent posts.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/
?>
<article id="post-0" <?php post_class('post'); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <?php if (is_404()) {
                esc_html_e('Page Not Available', 'white-spektrum');
            } else if (is_search()) {
                printf(__('Nothing found for: <small>', 'white-spektrum') . get_search_query() . '</small>');
            } else {
                esc_html_e('Nothing Found', 'white-spektrum');
            }
            ?>
        </h1>
    </header>
    <div class="entry-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'white-spektrum' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif (is_404()) : ?>
            <p><?php esc_html_e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'white-spektrum' ); ?></p>
            <?php get_search_form(); ?>
        <?php elseif (is_search()) : ?>
            <p><?php esc_html_e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'white-spektrum' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'white-spektrum' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</article>
<div class="recent-posts">
    <?php if (is_404() || is_search()) { ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php esc_html_e('Most Recent Posts', 'white-spektrum'); ?></h1>
        </header>
        <div class="entry-content">
            <ul class="two-columns">
                <?php $posts_per_page = 2; ?>
                <?php $query = new WP_Query(array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $posts_per_page)); ?>

                <?php if ($query->have_posts()) { ?>
                    <?php while ($query->have_posts()) { ?>
                        <?php $query->the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('white-spektrum-medium-thumbnails'); ?>
                            <header class="recent-header">
                                <span><?php echo white_spektrum_entry_time_stamp_setup(); ?></span>
                                <h2 class="recent-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <div class="entry-excerpt">
                                <?php the_excerpt(); ?>
                                <?php if (!is_singular() || is_front_page()) { ?>
                                    <div class="continue-reading">
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <?php
                                                printf(
                                                    wp_kses(__('Continuing Reading %s', 'white-spektrum'), array('span' => array('class' => array()))),
                                                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                                                );
                                            ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </li> 
                    <?php } ?> 
                    <?php wp_reset_postdata(); ?>
                <?php } ?>
            </ul>
        </div>
    <?php
    }
    ?>
</div>