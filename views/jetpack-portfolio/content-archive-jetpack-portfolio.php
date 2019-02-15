<?php
/**
 * Auspicious (content-archive-jetpack-portfolio.php)
 *
 * @package     Auspicious
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 * ************************************************************************************************************************
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="jetpack-portfolio-grid">
			<?php Benlumia007\Backdrop\CustomQuery\display( 'custom-jetpack-portfolio' ); ?>
		</div>
	</div>
</article>
