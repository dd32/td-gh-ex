<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The template for displaying the footer.
 *
 * Contains all content after the closing of the id=main div
 *
 * @package WordPress
 * @subpackage Weaver X
 * @since Weaver Xtreme 1.0
 */

?>
</div> <!-- #wrap -->
<a id="page-bottom"></a>
<div id="weaver-final" class="weaver-final-raw">
<?php
	wp_footer();
	if ( WEAVERX_DEV_MODE ) {
		$end_time = microtime(true);
		weaverx_debug_comment ('Page generated in: '. round($end_time-$GLOBALS['wvrx_timer'], 3) . ' seconds.');
	}
?>
</div> <!-- #weaver-final -->
</body>
</html>
