<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 */

global $weaverx_cur_post_ID;
$weaverx_cur_post_ID = get_the_ID();
weaverx_per_post_style();
weaverx_fi( 'page', 'post-before' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>
<?php weaverx_page_title(); ?>

	<div class="entry-content clearfix">

	<?php weaverx_the_page_content( 'page' );

	// sitemap specific code
	echo("<div id=\"weaver-sitemap\">\n");
	echo("<h3>" . __('Pages','weaver-xtreme') . "</h3><ul class='xoxo sitemap-pages'>\n");
	wp_list_pages(array('title_li' => false));
	echo("</ul>\n");

	echo("<br /><h3>" .__('Posts','weaver-xtreme') . "</h3><ul class='xoxo sitemap-pages-month'>\n");
	wp_get_archives(array('type' => 'monthly', 'show_post_count' => true));
	echo("</ul>\n");

	if (!weaverx_getopt('post_hide_categories')) {
		echo("<br /><h3>" . __('Categories','weaver-xtreme') . "</h3><ul class='xoxo sitemap-categories'>\n");
		wp_list_categories(array('show_count' => true, 'use_desc_for_title' => true, 'title_li' => false));
		echo("</ul>\n");
	}


	if ( ! weaverx_getopt( 'post_hide_tags' ) ) {

		echo("<br /><h3>" . __('Tag Cloud','weaver-xtreme') . "</h3><ul class='xoxo sitemap-tag'>\n");
		wp_tag_cloud(array('number' => 0));
		echo("</ul>\n");
	}

	if ( ! weaverx_getopt( 'post_hide_author' ) ) {
		echo("<br /><h3>" . __('Authors','weaver-xtreme') ."</h3><ul class='xoxo sitemap-authors'>\n");
		wp_list_authors(array('exclude_admin' => false, 'optioncount' => true, 'title_li' => false));
		echo("</ul>\n");
	}

	echo("</div><!-- weaver-sitemap -->\n");

?>
	</div><!-- .entry-content -->
	<footer class="entry-utility-page">
<?php
	weaverx_edit_link();
?>
	</footer><!-- .entry-utility-page -->
</article><!-- #post-<?php the_ID(); ?> -->
