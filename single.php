<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
 */

get_header(); ?>
	<!-- /Header End -->
	<!-- Breadcrumb -->
	<section class="breadcrumb-wrapper" style="background: #F5F5F5; margin-bottom: 0px;">
		<div class="container">
			<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
		</div>
	</section>
	<!-- /breadcrumb-wrapper -->

	<!-- Title Wrapper -->
	<section class="title-wrapper">
		<div class="container">
			<h2 class="entry-title page" itemprop="headline">

			<?php 
				if ( has_post_format( 'aside' )) {
				  echo '<i class="fa fa-file-text-o"></i> ';
				}

				elseif ( has_post_format( 'gallery' )) {
				  echo '<i class="fa fa-picture-o"></i> ';
				}

				elseif ( has_post_format( 'link' )) {
				  echo '<i class="fa fa-link"></i> ';
				}

				elseif ( has_post_format( 'image' )) {
				  echo '<i class="fa fa-picture-o"></i> ';
				}

				elseif ( has_post_format( 'quote' )) {
				  echo '<i class="fa fa-quote-left"></i> ';
				}

				elseif ( has_post_format( 'status' )) {
				  echo '<i class="fa fa-rss"></i> ';
				}

				elseif ( has_post_format( 'video ' )) {
				  echo '<i class="fa fa-video-camera"></i> ';
				}

				elseif ( has_post_format( 'audio' )) {
				  echo '<i class="fa fa-music"></i> ';
				}

				elseif ( has_post_format( 'chat' )) {
				  echo '<i class="fa fa-comments"></i> ';
				}
				else {
				  echo '<i class="fa fa-file-o"></i> ';
				}
			?>
			<?php the_title(); ?></h2>
		</div>
	</section><!-- /title-wrapper -->
	
	<!-- Content
	================================================== -->
	<section class="content post wow fadeInUp">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php
								/*
								 * Ah, post formats. Nature's greatest mystery (aside from the sloth).
								 *
								 * So this function will bting in the needed template file depending on what the post
								 * format is. The different post formats are located in the post-formats folder.
								 *
								 *
								 * REMEMBER TO ALWAYS HAVE A DEFAULT ONE NAMED "format.php" FOR POSTS THAT AREN'T
								 * A SPECIFIC POST FORMAT.
								 *
								 * If you want to remove post formats, just delete the post-formats folder and
								 * replace the function below with the contents of the "format.php" file.
								*/
								get_template_part( 'post-formats/format', get_post_format() );
								
							?>
							
						<?php endwhile; ?>

						<?php else : ?>
							<!-- Post Not Found -->
							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bnwtheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bnwtheme' ); ?></p>
									</section>
									<footer class="article-footer">
										<p><?php _e( 'This is the error message in the single.php template.', 'bnwtheme' ); ?></p>
									</footer>
							</article>
							<!-- /Post Not Found -->
						<?php endif; ?>
						
					</div>
							
				</div>
				<div class="col-lg-4">
					<div class="">
						<?php get_sidebar(); ?>
					</div>
				</div>
				
			</div>
		</div>
	</section><!-- /home-blog -->
	<!-- /Content End -->
<?php get_footer(); ?>
