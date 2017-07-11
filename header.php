<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Business
 */

?><?php
	/**
	 * Hook - best_business_action_doctype.
	 *
	 * @hooked best_business_doctype - 10
	 */
	do_action( 'best_business_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - best_business_action_head.
	 *
	 * @hooked best_business_head - 10
	 */
	do_action( 'best_business_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - best_business_action_before.
	 *
	 * @hooked best_business_page_start - 10
	 * @hooked best_business_skip_to_content - 15
	 */
	do_action( 'best_business_action_before' );
	?>

	<?php
	  /**
	   * Hook - best_business_action_before_header.
	   *
	   * @hooked best_business_add_top_head_content - 5
	   * @hooked best_business_header_start - 10
	   */
	  do_action( 'best_business_action_before_header' );
	?>
		<?php
		/**
		 * Hook - best_business_action_header.
		 *
		 * @hooked best_business_site_branding - 10
		 */
		do_action( 'best_business_action_header' );
		?>
	<?php
	  /**
	   * Hook - best_business_action_after_header.
	   *
	   * @hooked best_business_header_end - 10
	   * @hooked best_business_add_primary_navigation - 20
	   */
	  do_action( 'best_business_action_after_header' );
	?>

	<?php
	/**
	 * Hook - best_business_action_before_content.
	 *
	 * @hooked best_business_add_custom_header - 6
	 * @hooked best_business_add_breadcrumb - 7
	 * @hooked best_business_content_start - 10
	 */
	do_action( 'best_business_action_before_content' );
	?>
	<?php
	  /**
	   * Hook - best_business_action_content.
	   */
	  do_action( 'best_business_action_content' );
