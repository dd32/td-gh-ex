<?php
/*
================================================================================================
Beyond Expectations - content.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
@since          0.0.1
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
    <div class="post-timestamp">
        <?php beyond_expectations_post_timestamp_author_setup(); ?>
    </div>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>'); ?> 
    </header>
    <div class="entry-content-container">
        <div class="entry-metadata-container cf">
            <div class="posted-comments">
                <?php beyond_expectations_entry_meta(); ?>
            </div>
        </div>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
            <?php beyond_expectations_entry_taxonomies(); ?>
        </div>
    </div>
</article>
    <?php comments_template(); ?>