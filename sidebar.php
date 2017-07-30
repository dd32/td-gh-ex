<?php
/**
 * Sidebar
 *
 * @package ariel
 */
$ariel_example_content = ariel_get_option( 'ariel_example_content' ); ?>

<div class="sidebar sidebar-column col-md-3">
	<?php
		if ( is_front_page() && is_active_sidebar( 'sidebar-frontpage' ) ) :
			dynamic_sidebar( 'sidebar-frontpage' );
		endif;
        
        if ( is_active_sidebar( 'sidebar-default' ) ) :
			dynamic_sidebar( 'sidebar-default' );
		elseif ( $ariel_example_content == 1 ) :
			ariel_example_sidebar();
		endif;
	?>
</div><!-- sidebar sidebar-column -->
