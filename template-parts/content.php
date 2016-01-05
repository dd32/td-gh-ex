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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('beyond-expectations-small-thumbnail'); ?> 
        </div>
    <?php } ?>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo (get_the_title()) ? get_the_title() : __('(No Title)', 'beyond-expectations'); ?></a></h1>
    </header>
    <small class="metadata-posted-on"><?php beyond_expectations_metadata_posted_on_setup(); ?></small>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>
    <small class="metadata-posted-in"><?php beyond_expectations_metadata_posted_in_setup(); ?></small>
</article>