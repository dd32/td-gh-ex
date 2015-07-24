<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package BBird Under
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;}
?>

<div id="secondary" class="widget-area large-4 columns" role="complementary">
   
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
      </div>
    </div>