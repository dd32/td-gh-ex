<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 */

weaverx_fi( 'page', 'post-before' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>
<?php weaverx_page_title(); ?>
	<div class="entry-content clearfix">

	<?php weaverx_the_page_content( 'page' ); ?>

	</div><!-- .entry-content -->
	<?php weaverx_edit_link(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php weaverx_inject_area('pagecontentbottom'); ?>
