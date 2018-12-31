<?php
/**
 * The template file for the search view
 *
 * @package agncy
 */

get_header(); ?>
<?php get_template_part( 'template-parts/title-bar' ); ?>
<div class="container">
	<div class="archive_wrapper">
		<div class="row">
			<div class="col-xs-12 research">
				<h3 class="the_research_title"><?php esc_html_e( 'Not what you\'re looking for? Try again:', 'agncy' ); ?></h3>
				<div class="the_searchform">
					<?php get_search_form( true ); ?>
				</div>
			</div>
		</div>
		<div class="row has-sidebar">
			<div class="col-xs-12 col-md-8 content-wrapper">
				<?php get_template_part( 'loop/loop' ); ?>
			</div>
			<?php get_sidebar( 'search' ); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
