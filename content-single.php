<?php
/**
 * Barista - The Single Post Content 
 *
 * This content file is used to display the single post. 
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
?>
<div class="site-content">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-medium-thumbnail">
            <?php the_post_thumbnail('barista-medium-thumbnail'); ?>
        </div>
        <h3 class="entry-title"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'barista' ); ?></h3>
        <small class="metadata-posted-on"></small>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        </div>
        <?php comments_template(); ?>
    </article>
</div>
<?php get_sidebar('post-content'); ?>