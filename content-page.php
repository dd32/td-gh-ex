<?php
/**
 * Barista - The Content Page displays the content for pages
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
        <h3 class="entry-title"><?php echo ( get_the_title() ) ? get_the_title() : __( '(No Title)', 'barista' ); ?></h3>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php comments_template(); ?>
    </article>
</div>
<?php get_sidebar('page'); ?>