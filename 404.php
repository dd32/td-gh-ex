<?php
/**
 * The 404 file template
 *
 * @package agncy
 */

get_header();

$image_404 = get_theme_mod( 'image_404' );
$title_404 = get_theme_mod( 'title_404', __( 'ooops... it seems that the page you\'re looking for does not exist :/', 'agncy' ) );
$text_404  = get_theme_mod( 'text_404' );

$header_style_tag = null;
$header_styles    = array();

if ( $image_404 ) {
	$header_styles[] = 'background-image:url(' . esc_url( $image_404 ) . ');';
}

if ( count( $header_styles ) > 0 ) {
	$header_style_tag = 'style="' . implode( '', $header_styles ) . '"';
}
?>

<div class="container-fluid header_404" <?php echo wp_kses_post( $header_style_tag ); ?>>
	<div class="row">
		<div class="col-xs-12">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<h1 class="the_title <?php echo ( $image_404 ? 'has_image' : null ); ?>">
							<?php
							echo wp_kses_post( __( '<span>Error</span><br>404', 'agncy' ) );
							?>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container content_404">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<h2 class="the_title color-primary"><?php echo esc_html( $title_404 ); ?></h2>
			<div class="the_content">
				<?php
				if ( $text_404 ) {
					echo esc_html( $text_404 );
				}
				?>
			</div>
		</div>
	</div>
	<?php if ( is_active_sidebar( 'error404-sidebar' ) ) : ?>
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<ul id="error404_sidebar" class="sidebar color-primary--before">
				<?php dynamic_sidebar( 'error404-sidebar' ); ?>
			</ul>
		</div>
	</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
