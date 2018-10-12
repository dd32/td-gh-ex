<?php
/**
 * The default header template file.
 *
 * @package agncy
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
		// Check if JavaScript is available
		document.documentElement.className =
			document.documentElement.className.replace("no-js","js");
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php do_action( 'agncy_after_body' ); ?>

<?php get_template_part( 'template-parts/header', 'mobile' ); ?>
<?php get_template_part( 'template-parts/header', 'desktop' ); ?>

<div class="viewport" role="main">
<?php if ( is_singular() ) : ?>
	<div <?php post_class( 'page-wrapper' ); ?> >
<?php else : ?>
	<div class="page-wrapper">
<?php endif; ?>
