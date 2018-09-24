<?php
/*
============================================================================================================================
Silver Quantum - content.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display content. This content.php 
is the main content that will be displayed when is on front page, home or index.
@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
============================================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php Backdrop\Entry\display_entry_post_thumbnail(); ?>
    <header class="entry-header">
        <?php Backdrop\Entry\display_entry_title(); ?>
        <span class="entry-description"><?php Backdrop\Entry\display_entry_timestamp(); ?></span>
    </header>
    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>