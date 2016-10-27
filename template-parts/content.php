<?php
/*
================================================================================================
Barista - content.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="featured-image">
        <?php the_post_thumbnail(); ?>
    </div>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
        <small><?php barista_index_entry_posted_on(); ?></small>
    </header>
    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
        <?php if (!is_singular() || is_front_page()) { ?>
            <div class="continue-reading">
                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                    <?php
                        printf(
                            wp_kses(__('Continue reading %s', 'barista'), array('span' => array('class' => array()))),
                            the_title('<span class="screen-reader-text">"', '"</span>', false)
                        );
                    ?>
                </a>
            </div>
        <?php } ?>
    </div>
</article>