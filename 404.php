<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
 */

get_header(); ?>
	<!-- /Header End -->
	<section class="breadcrumb-wrapper" style="background: #F5F5F5; margin-bottom: 0px;">
		<div class="container">
			<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
		</div>
	</section>
	<!-- /breadcrumb End -->
	
	<!-- Title Wrapper -->
	<section class="title-wrapper">
		<div class="container">
			<h2><?php _e( 'Epic 404 - Article Not Found', 'bnwtheme' ); ?></h2>
		</div>
	</section>
	<!-- /Title Wrapper -->
	
	<!-- Content -->
	<section class="content post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<!-- Article Area -->
					<article id="post-not-found" class="">
						<header class="entry-header">
							<h1><?php _e( 'Epic 404 - Article Not Found', 'bnwtheme' ); ?></h1>
						</header><!-- /article-header -->
						<section class="entry-content">
							<p>
								<?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bnwtheme' ); ?>
							</p>
						</section><!-- /entry-content -->
						<section class="search">
							<p>
								<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
									<div class="form-group center-block">
										<label for="">Search for:</label>
										<input type="search" class="search-field form-control no-border-radius" placeholder="Search" value="" name="s" title="Search for:" />
									</div>
										<input type="submit" class="search-submit" value="Search" />
								</form>
							</p>
						</section><!-- /search -->
						<footer class="entry-footer">
							<p><?php _e( 'This is the 404.php template.', 'bnwtheme' ); ?></p>
						</footer><!-- /article-footer -->
					</article><!-- /Article Area -->
				</div>
				<!-- Sidebar -->
				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div><!-- /Sidebar -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section>
	<!-- /Content -->
<?php get_footer(); ?>
