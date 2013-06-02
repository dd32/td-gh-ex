<?php
/** The home widget area
 * @package advantage
 * @since advantage 1.0
 */
	global $advantage_options;	 
	if (  0 == $advantage_options['column_home1'] && 0 == $advantage_options['column_home2'] && 0 == $advantage_options['column_home3'] && 0 == $advantage_options['column_home4'] && 0 == $advantage_options['column_home5'] )
		return;
	$flag = 1;
?>
<div id="home-widget-area"">
<?php
	if ( is_active_sidebar( 'first-home-widget-area' ) && $advantage_options['column_home1'] > 0 ) {
		$flag = 0; ?>
		<div id="first-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home1'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'first-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'second-home-widget-area' ) && $advantage_options['column_home2'] > 0) {
		$flag = 0; ?>
		<div id="second-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home2'] ); ?> widget-area home-widget">	
			<ul class="xoxo">
				<?php dynamic_sidebar( 'second-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'third-home-widget-area' ) && $advantage_options['column_home3'] ) {
		$flag = 0; ?>
		<div id="third-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home3'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'third-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'fourth-home-widget-area' ) && $advantage_options['column_home4'] ) {
		$flag = 0; ?>
		<div id="fourth-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home4'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'fourth-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	}
	if ( is_active_sidebar( 'fifth-home-widget-area' ) && $advantage_options['column_home5'] ) {
		$flag = 0; ?>
		<div id="fifth-home" class="<?php echo advantage_grid_columns( $advantage_options['column_home5'] ); ?> widget-area home-widget">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'fifth-home-widget-area' ); ?>
			</ul>
		</div>
<?php
	} ?>
</div>
<?php 
	if ( $flag && ! is_page_template( 'pages/widgetsonly.php' ) ) { //No widget in home page
		echo '<div class="container-fluid content-area"><div class="row-fluid content-area">';
		get_template_part( 'pages/blog' );
	}
?>
