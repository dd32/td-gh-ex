<?php
/**
 * The archive template file
 */

get_header();

$arzine_current_options = wp_parse_args(get_option('busiprof_theme_options', array()), theme_setup_data());

?>
<!-- Page Title -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-title archive">
					<h2><?php if (is_day()) :
							/* translators: 1. Archive Prefix, 2. date. */
                            printf(esc_html__('%1$s %2$s', 'arzine'), esc_html($arzine_current_options['archive_prefix']), esc_html(get_the_date()));

                         elseif (is_month()) :
							/* translators: 1. Archive Prefix, 2. date. */
                            printf(esc_html__('%1$s %2$s', 'arzine'), esc_html($arzine_current_options['archive_prefix']), esc_html(get_the_date()));

                         elseif (is_year()) :
							/* translators: 1. Archive Prefix, 2. date. */
                            printf(esc_html__('%1$s %2$s', 'arzine'), esc_html($arzine_current_options['archive_prefix']), esc_html(get_the_date()));

                        else :

                  			echo esc_html__("Archive Blog", "arzine");

                         endif;
                         ?>
				    </h2>

				</div>
			</div>
			<div class="col-md-6">
				<ul class="page-breadcrumb">
					<?php if (function_exists('busiprof_custom_breadcrumbs')) {
                             busiprof_custom_breadcrumbs();
                         }?>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- End of Page Title -->
<div class="clearfix"></div>

<!-- Blog & Sidebar Section -->
<div id="content">
<section>
	<div class="container">
		<div class="row">
		<?php	echo '<div class="col-md-'.(!is_active_sidebar("sidebar-primary") ?"12" :"8").'">'; ?>
			<div class="row site-content" id="blog-masonry">
				<?php
                    if (have_posts()) :
                    // Start the Loop.
                    while (have_posts()) : the_post();
                    echo '<div class="item">';
                    get_template_part('content', '');
                    echo '</div>';
                    endwhile;
                ?>

			</div>

			<!-- Pagination -->
			<div class="paginations">
				<?php
                // Previous/next page navigation.
                the_posts_pagination(array(
                'prev_text'          => esc_html__('Previous', 'arzine'),
                'next_text'          => esc_html__('Next', 'arzine'),
                'screen_reader_text' => ' ',
                )); ?>
			</div>
			<?php endif; ?>
					<!-- /Pagination -->

		</div>


		<?php get_sidebar();?>

		</div>
	</div>
</section>
</div>
<!-- End of Blog Masonry 3 Column Section -->
<div class="clearfix"></div>
<?php get_footer(); ?>
