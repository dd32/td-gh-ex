<?php
/**
 * The template part for displaying site branding text
 *
 * Display site title and site description.
 *
 * @package Aamla
 * @since 1.0.0
 */

?>

<div<?php aamla_attr( 'title-area' ); ?>>

	<?php if ( is_front_page() && is_home() ) : ?>
		<h1<?php aamla_attr( 'site-title' ); ?>>
			<a href= "<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
	<?php else : ?>
		<p<?php aamla_attr( 'site-title' ); ?>>
			<a href= "<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</p>
	<?php
	endif;

	$aamla_description = get_bloginfo( 'description', 'display' );
	?>

	<?php if ( $aamla_description || is_customize_preview() ) : ?>
		<p<?php aamla_attr( 'site-description' ); ?>>
			<?php
			echo $aamla_description; // WPCS xss ok.
			?>
		</p>
	<?php endif; ?>
</div><!-- .title-area -->
