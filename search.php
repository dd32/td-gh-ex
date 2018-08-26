<?php get_header();

if ( have_posts() ) { ?>

<article id="post-0" class="post">

	<div class="post-header no-split">

		<div class="post-info">

			<h1 class="post-title">

				<?php printf( __( 'Search Results for : %s', 'aemi' ), get_search_query() ); ?>

			</h1>

		</div>

	</div>

</article>

	<?php

	get_template_part( 'loop' );

	} else {

		get_template_part( 'inc/parts/content', 'none' );

	}

get_footer(); ?>
