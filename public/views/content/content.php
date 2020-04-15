<?php
/**
 * Silver Quantum ( content.php )
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Benlumia007\Backdrop\Entry\display_title(); ?>
		<div class="entry-metadata">
			<?php Benlumia007\Backdrop\Entry\display_author(); ?>
			<?php Benlumia007\Backdrop\Entry\display_date(); ?>
			<?php Benlumia007\Backdrop\Entry\display_comments_link(); ?>
		</div>
	</header>
	<div class="post-thumbnails alignfull">
		<?php $size = 'no-sidebar' === get_theme_mod( 'global_layout', 'no-sidebar' ) ? 'large' : 'medium'; ?>
		<?php the_post_thumbnail( "silver-quantum-{$size}-thumbnails"); ?>
	</div>
	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>
