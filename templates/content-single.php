<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 */

global $weaverx_cur_post_ID;
$weaverx_cur_post_ID = get_the_ID();
weaverx_per_post_style();
weaverx_fi( 'post', 'post-before' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-single post-content ' . weaverx_post_class(true)); ?>>
	<?php weaverx_single_title( '' ); ?>
	<div class="entry-content clearfix">
		<?php weaverx_the_post_full_single(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','weaver-xtreme') . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-utility entry-author-info">
	<?php
	weaverx_post_bottom_info('single');
	weaverx_author_info();
	?>

	</footer><!-- .entry-utility -->
<?php   weaverx_inject_area('postpostcontent');	// inject post comment body ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php weaverx_inject_area('pagecontentbottom'); ?>
