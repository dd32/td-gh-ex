<?php
/*
================================================================================================
White Spektrum - content-archive.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
archive in many ways.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
        <span class="post-index-metadata"><?php white_spektrum_index_entry_posted_on(); ?></span>
    </header>
    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
        <?php if (!is_singular() || is_front_page()) { ?>
            <div class="continue-reading">
                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                    <?php
                        printf(
                            wp_kses(__('Continue reading %s', 'white-spektrum'), array('span' => array('class' => array()))),
                            the_title('<span class="screen-reader-text">"', '"</span>', false)
                        );
                    ?>
                </a>
            </div>
        <?php } ?>
    </div>
</article>