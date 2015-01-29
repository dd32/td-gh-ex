<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package AccessPress Root
 */

get_header(); ?>
<div class="page_header_wrap clearfix">
	<div class="ak-container">
	<header class="entry-header">
		<h1 class="entry-title"> 404 error </h1>
	</header><!-- .entry-header -->
	<?php accesspress_breadcrumbs() ?>
	</div>
</div>

<main id="main" class="site-main clearfix">
	<div id="primary" class="content-area">
		<section class="error-404 not-found">
			<div class="page-content">
				<div class="page-404-wrap clearfix">
					<span class="oops">Oops!!</span>
					<div class="error-num"> 
					<span class="num">404</span>
					<span class="not_found">Page Not Found</span>
					</div> 
				</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</div><!-- #primary -->
</main><!-- #main -->

<?php get_footer(); ?>
