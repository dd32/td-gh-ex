<?php
/**
 * Barista - Conten Search Results
 *
 * This is the Search Result
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
?>
    <section class="site-content">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>   
				<div><small class="metadata-posted-on"><?php barista_metadata_posted_on_setup(); ?></small></div>
					<div class="small-post-thumbnail">
					<?php the_post_thumbnail('barista-small-thumbnail'); ?>
					</div>
					<?php the_excerpt(); ?>
				<small class="metadata-posted-in"><?php barista_metadata_posted_in_setup(); ?></small>
        </article>
    </section>
<?php get_sidebar('post-content'); ?>