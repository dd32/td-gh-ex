<section id="slides">

	<?php if ( have_posts() ) : 

		while ( have_posts() ) : 

			the_post(); 

			?>

		<div class="slide">

			<div class="thumb">

				<a href="<?php the_permalink();?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></a>

			</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h2>

					<a href="<?php the_permalink();?>"><?php the_title();?></a>

				</h2>

				<p class="date">

					<?php 

					the_date(); 

					esc_html_e("in", "baena"); 

					the_category();

					?>

				</p>

				<p class="extract"><?php the_excerpt();?></p>

			</article>

		</div>

	<?php endwhile; else: ?>

	<h1><?php esc_html_e("No items found", "baena"); ?></h1>

	<?php endif; ?>

</section>