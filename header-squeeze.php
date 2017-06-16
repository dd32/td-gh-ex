<?php
/**
* The Header for our Header Squeeze Template.
*
* Displays all of the <head> section
*
* @package beam
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 

	<div id="page" class="hfeed site">
		<?php do_action( 'beam_before_header' ); ?>
		<header id="masthead" class="site-header">
			<div class="centeralign-header">
			</div><!-- centeralign-header -->
		</header><!-- #header-->
		<?php do_action( 'beam_after_header' );