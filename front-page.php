
<?php if ( 'page' == get_option( 'show_on_front' ) ) { ?>

	
	<?php include("template-front-page.php");?>

	

<?php } else {

	include( get_home_template() );

} ?>