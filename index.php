<?php
get_header();
get_template_part('index', 'bannerstrip');
?>
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
<!-- End of Blog & Sidebar Section -->

<div class="clearfix"></div>
<?php get_footer(); ?>
