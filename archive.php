<?php
/**
 * The main archive view for WordPress
 *
 * @package agncy
 */

$row_classes = classNames(
	array(
		'has-sidebar' => agncy_has_sidebar(),
	)
);

$wrapper_classes = classNames(
	array(
		'col-xs-12'       => true,
		'col-md-8'        => true,
		'content-wrapper' => true,
		'col-md-offset-2' => ! agncy_has_sidebar(),
		'wide-content'    => ! agncy_has_sidebar(),
	)
);

get_header(); ?>
<?php get_template_part( 'template-parts/title-bar' ); ?>
<div class="container">
	<div class="archive_wrapper">
		<div class="<?php echo esc_attr( $row_classes ); ?>">
			<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
				<?php get_template_part( 'loop/loop' ); ?>
			</div>
			<?php get_sidebar( 'archive' ); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
