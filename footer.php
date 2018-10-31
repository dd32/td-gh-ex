<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best Learner
 */

/**
 *
 * @hooked best_learner_footer_start
 */
do_action( 'best_learner_action_before_footer' );

/**
 * Hooked - best_learner_footer_top_section -10
 * Hooked - best_learner_footer_section -20
 */
do_action( 'best_learner_action_footer' );

/**
 * Hooked - best_learner_footer_end. 
 */
do_action( 'best_learner_action_after_footer' );

wp_footer(); ?>

</body>  
</html>