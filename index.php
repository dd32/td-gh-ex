<?php
/**
 * Initiator ( index.php )
 *
 * The (index.php) template file is very flexible, it can be used to include all the references for the header, content,
 * aside, footer, and other pages created in WordPress. The (index.php) can also be divided into modular template files,
 * each taking on part of the workload. If you wish to not provide any other template files, the WordPress hierarchy may
 * have default template files or functions to perform their jobs.
 *
 * @package     Initiator
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

use Benlumia007\Backdrop\View\View as sidebar;
?>
<?php get_header(); ?>
	<section id="content" class="site-content">
		<div id="layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
			<main id="main" class="content-area">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'views/content/content', get_post_format() );
						endwhile;
						the_posts_pagination();
					else :
							get_template_part( 'views/content/content', 'none' );
					endif;
				?>
			</main>
			<?php sidebar::display( 'sidebar', [ 'primary' ] ); ?>
		</div>
	</section>
<?php get_footer(); ?>
