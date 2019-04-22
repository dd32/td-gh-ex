<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The header for our theme
 *
 */
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<?php baw_before_header (); ?><!-- Go to /inc/before-header.php -->

		<?php baw_header (); ?><!-- Go to /inc/header-top.php -->
		<?php baw_custom_breadcrumbs(); ?>		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'baw' ); ?></a>
				<?php if (( is_front_page() or is_home()) and is_active_sidebar('home-1') ) : ?>
					<div class="h-center">
						<?php dynamic_sidebar( 'home-1' ); ?>
					</div>
				<?php endif; ?>
		<div id="content" class="site-content">