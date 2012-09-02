<?php get_header(); ?>
<?php //get_search_form(); ?>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<header>
				  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><h2>
				  <br><h3 style="padding: 0 0 0 25px; margin: -20px;"><time><?php the_time(get_option('date_format')) ?></time></h3>
		    	</header>
		
		    <section>
		
				  <?php the_content('Read the rest of this entry &raquo;'); ?>

				  <hr class="clearfix" />

          <?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>

				  <p class="postmetadata"><?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('Share your thoughts', '1 Comment', '% Comments'); ?></p>
				
			  </section>
				
			</article>

		<?php endwhile; ?>

			<ul class="prevnext">
				<li><?php next_posts_link('&lt; Older Entries') ?></li>
				<li><?php previous_posts_link('Newer Entries &gt;') ?></li>
			</ul>

	<?php else : ?>

		<article class="noposts">
			<h2>404 - Content Not Found</h2>
			<p>We don't seem to be able to find the content you have requested - why not try a search below?</p>
			<?php get_search_form(); ?>
		</article>

	<?php endif; ?>

<?php get_footer(); ?>