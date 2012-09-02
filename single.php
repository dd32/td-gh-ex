<?php get_header(); ?>
<?php //get_search_form(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<header>
				  <h1><?php the_title(); ?><h1>
				  <br><h3 style="padding: 0 0 0 25px; margin: -20px;"><time><?php the_time(get_option('date_format')) ?></time></h3>
		    	</header>
		
				<section>
		
				<?php the_content('Read the rest of this entry &raquo;'); ?>

					<hr class="clearfix" />

        			<?php the_tags('<p class="post_tags"><mark>Tagged with:</mark> ', ' | ' ,  '</p>'); ?></p>
			        <p class="post_categories"><mark>Categorized as:</mark> <?php the_category(' | '); ?> </p>
					  <?php edit_post_link('Edit This Post', '<p class="postmetadata">', '</p>'); ?>
  				  <?php if(!comments_open()) { ?>
              <p>Comments are disabled on this post</p>
            <?php } ?>
				
					<hr class="clearfix" />

			        <?php wp_link_pages('before=<p class="pagination">&after=</p>&next_or_number=number&pagelink=page %'); ?>

				</section>

			</article>

			<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>

<?php get_footer(); ?>