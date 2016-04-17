<?php
/*
================================================================================================
Ecclesiastical - content.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed.

@package        Ecclesiastical WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
@since          0.0.1
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo (get_the_title()) ? get_the_title() : __('(No Title)', 'white-spektrum'); ?></a></h1>
    </header>
    <?php white_spektrum_entry_date(); ?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
        <div class="taxomonies">
            <?php white_spektrum_entry_meta(); ?>
            <?php white_spektrum_entry_taxonomies(); ?>
        </div>
    </div>
</article>
<?php comments_template(); ?>