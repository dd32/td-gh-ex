<?php
/*
================================================================================================
Amity - content-single.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content-single.php is the main content that will be displayed.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2014. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-thumbniail-banner">
        <?php the_post_thumbnail('silver-quantum-banner'); ?>
    </div>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title">', '</h1>')); ?>
    </header>
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
</article>
<?php comments_template(); ?>