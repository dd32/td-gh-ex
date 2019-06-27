<?php
/**
 * Home widgets
 *
 * @package Agency_Ecommerce
 */

// Bail if not home page.
if ( ! is_page_template( 'templates/home-template.php' )  ) {
	return;
}

if ( ! is_active_sidebar( 'woo-featured-slider' ) ){
	return;
} 

global $sidebars_widgets;

$count = count ($sidebars_widgets['woo-featured-slider']);

if( 1 == $count ){

	$row_class = 'full-width';

}elseif( 2 == $count  ){

	$row_class = 'half-width';

}elseif( 3 == $count  ){

	$row_class = 'one-third-width';

}else{

	$row_class = 'mixed-width';

} ?>

<div id="home-page-woo-featured-slider" class="widget-area <?php echo $row_class; ?>">
	<div class="container">
		<div class="ae-inner">
			<?php dynamic_sidebar( 'woo-featured-slider' ); ?>
		</div>
	</div>
</div><!-- #home-page-woo-featured-slider -->