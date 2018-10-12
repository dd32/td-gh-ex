<?php
/**
 * The main archive view for WordPress
 *
 * @package agncy
 */

get_header(); ?>
<?php get_template_part( 'template-parts/title-bar' ); ?>
<div class="container">
	<div class="archive_wrapper">
		<div class="row has-sidebar">
			<div class="col-xs-12 col-md-8 content-wrapper">
				<?php get_template_part( 'loop/loop' ); ?>
			</div>
			<?php get_sidebar( 'archive' ); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
