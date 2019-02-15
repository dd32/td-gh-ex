<?php
/**
 * Auspicious (content.php)
 *
 * @package     Auspicious
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 * ************************************************************************************************************************
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-thumbnail">
		<?php Benlumia007\Backdrop\Entry\display( 'entry-post-thumbnail' ); ?>
	</div>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<?php printf( '<span class="sticky-post">%1$s</span>', esc_html__( 'Featured', 'auspicious' ) ); ?>
		<?php } ?>
		<?php Benlumia007\Backdrop\Entry\display( 'entry-title' ); ?>
		<span class="entry-metadata"><?php Benlumia007\Backdrop\Entry\display( 'entry-posted-on' ); ?></span>
	</header>
	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
	<div class="entry-taxonomies">
		<?php Benlumia007\Backdrop\Entry\display( 'entry-taxonomies' ); ?>
	</div>
</article>
