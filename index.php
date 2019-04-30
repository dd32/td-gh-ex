<?php get_header(); ?>

    <!-- Main Content -->
    <div class="container">
        <div class="content">
            <div class="columns">
                <div class="column is-three-quarters">
					<?php 
					if (have_posts()) : while (have_posts()) : the_post();
						get_template_part('content', get_post_format());
					endwhile; 
					?>

					<div class="alignleft"><?php previous_posts_link( 'Newer posts' ); ?></div>
					<div class="alignright"><?php next_posts_link( 'Older posts' ); ?></div>
					
					<?php wp_link_pages(); ?>
					<?php
					endif; 
					?>
                </div>

				<div class="column">
					<?php get_sidebar(); ?>
				</div>
			</div>
        </div>
	</div>
	<!-- End of Main Content -->

<?php get_footer(); ?>