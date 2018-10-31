<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best Learner
 */
/**
* Hook - best_learner_action_doctype.
*
* @hooked best_learner_doctype -  10
*/
do_action( 'best_learner_action_doctype' );
?>
<head>
<?php
/**
* Hook - best_learner_action_head.
*
* @hooked best_learner_head -  10
*/
do_action( 'best_learner_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php

/**
* Hook - best_learner_action_before.
*
* @hooked best_learner_page_start - 10
*/
do_action( 'best_learner_action_before' );

/**
*
* @hooked best_learner_header_start - 10
*/
do_action( 'best_learner_action_before_header' );

/**
*
*@hooked best_learner_site_branding - 10
*@hooked best_learner_header_end - 15 
*/
do_action('best_learner_action_header');

/**
*
* @hooked best_learner_content_start - 10
*/
do_action( 'best_learner_action_before_content' );

/**
 * Banner start
 * 
 * @hooked best_learner_banner_header - 10
*/
do_action( 'best_learner_banner_header' );  
