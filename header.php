<?php /**
* The header for our theme
*
* This is the template that displays all of the header section
*
* @package Astral
* @since 0.1
*/

/* 
* Functions hooked into astral_action_doctype action
*
* @hooked astral_doctype
*/
do_action( 'astral_action_doctype' );
?>
<head>
<?php 
	/* 
	* Functions hooked into astral_head_section action
	*
	* @hooked astral_head
	*/
	do_action( 'astral_head_section' );
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); 
/*
* Functions hooked into astral_body_start action
*
* @hooked astral_page_start
*/
do_action( 'astral_body_start' );
/*
* Functions hooked into astral_top_menus action
*
* @hooked astral_menus
*/
do_action( 'astral_top_menus' );