<?php
/*
============================================================================================================================
Camaraderie - content.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display content. This content.php 
is the main content that will be displayed when is on front page, home or index.

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
============================================================================================================================
        <span class="entry-timestamp"><?php echo camaraderie_entry_time_stamp(); ?></span>
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('silver-quantum-medium-thumbnails'); ?>
        </div>
    <?php } ?>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
    </header>
    <div class="entry-metadata">
        <?php silver_quantum_entry_posted_on(); ?>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array(
            'before'      => '<div class="page-links">' . esc_html__('Pages:', 'silver-quantum'),
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'silver-quantum') . ' </span>%',
            'separator'   => '<span class="screen-reader-text">,</span> ',
        ));
        ?>
    </div>
    <div class="entry-taxonomies">
        <?php silver_quantum_entry_taxonomies() ;?>
    </div>
</article>