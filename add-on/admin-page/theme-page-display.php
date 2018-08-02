<?php
/**
 * Render add_theme_page admin area.
 *
 * This file is used to markup the add_theme_page admin area in WordPress
 * Dashboard > Appearance > Aamla Docs.
 *
 * @package Aamla
 * @since   1.0.2
 */

$aamla_theme      = wp_get_theme( 'aamla' );
$aamla_author_uri = $aamla_theme->get( 'AuthorURI' );
$aamla_theme_uri  = $aamla_theme->get( 'ThemeURI' );
$aamla_uri        = $aamla_author_uri ? $aamla_author_uri : $aamla_theme_uri;

// Used to access different documentation links on Vedathemes website.
define( 'AAMLA_URI', trailingslashit( esc_url( $aamla_uri ) ) );

$aamla_help_sections = [
	'general' => esc_html__( 'General Information', 'aamla' ),
	'docs'    => esc_html__( 'Support Articles', 'aamla' ),
	'demo'    => esc_html__( 'Theme Demo', 'aamla' ),
];

// Load theme admin page markup helper functions.
require_once get_template_directory() . '/add-on/admin-page/functions/template-functions.php';

?>

<div class="wrap">
	<div id="aml-masthead" class="aml-masthead">
		<div class="aml-title">
			<h1><?php esc_html_e( 'Aamla Theme', 'aamla' ); ?></h1>
			<span class="aml-version"><?php echo esc_html( AAMLA_THEME_VERSION ); ?></span>
		</div><!-- .aml-title -->
		<p class="aml-description"><?php esc_html_e( 'Beautifully crafted WordPress Theme', 'aamla' ); ?></p>
	</div><!-- .aml-masthead -->

	<div id="aml-wrapper" class="aml-wrapper">
		<div id="aml-content" class="aml-content">
			<ul class="aml-section-title">
				<?php
				foreach ( $aamla_help_sections as $id => $label ) {
					printf( '<li><a href="#aml-%s">%s</a></li>', $id, $label ); // WPCS xss ok. Already escaped.
				}
				?>
			</ul>
			<?php
			foreach ( $aamla_help_sections as $id => $label ) {
				printf( '<div id="aml-%s" class="aml-section-content">', $id ); // WPCS xss ok. escaping Not required. Direct value used.
				aamla_get_template_partial( 'add-on/admin-page/partials', "page-{$id}" );
				printf( '</div><!-- #aml-%s -->', $id ); // WPCS xss ok. escaping Not required. Direct value used.
			}
			?>
		</div><!-- .aml-content -->
	</div><!-- .wrapper -->
	<div id="aml-footer" class="aml-footer">
		<div class="copyright"><span><?php esc_html_e( 'Vedathemes', 'aamla' ); ?> &copy; <?php echo esc_html( date_i18n( __( 'Y', 'aamla' ) ) ); ?></span></div>
	</div><!-- .aml-footer -->
</div><!-- .wrap -->
