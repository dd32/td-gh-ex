<?php
/*
================================================================================================
Beyond Expectations - content-404.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other page.php). This file will display the page content that automatically grabs
from the single.php in a loop and displays the content here. 
 

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2015. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
@since          0.0.1
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>
    <?php comments_template(); ?>
</article>