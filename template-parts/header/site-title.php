<?php
/**
 * The template part for displaying site title
 *
 * @package Aamla
 * @since 1.0.0
 */

?>

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
