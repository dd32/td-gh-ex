<?php
/**
 * Auspicious (search.php)
 *
 * @package     Auspicious
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 * ************************************************************************************************************************
 */

?>
<?php get_header(); ?>
	<section id="main" class="site-main">
		<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
			<div class="content-area">
				<?php Benlumia007\Backdrop\MainQuery\display_content_page(); ?>
			</div>
			<?php Benlumia007\Backdrop\Sidebar\display( 'secondary' ); ?>
		</div>
	</section>
<?php get_footer(); ?>
