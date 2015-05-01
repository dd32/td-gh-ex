<?php
/**
 * Barista - The Main Content
 *
 * This content file is used to display content. 
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
?>
<div class="site-content cf">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-small-thumbnail">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('barista-small-thumbnail'); ?></a>
        </div>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo (get_the_title()) ? get_the_title() : __('(No Title)', 'barista'); ?></a></h3>
        <small class="metadata-posted-on"><?php barista_metadata_posted_on_setup(); ?></small>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>
        <small class="metadata-posted-in"><?php barista_metadata_posted_in_setup(); ?></small>
    </article>
</div>
<?php get_sidebar('post-content'); ?>