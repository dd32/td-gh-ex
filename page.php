<?php
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

		while ( have_posts() ) : the_post();

			get_template_part( 'parts/content/page' );

			?><div class="links"><div class="linkprevious"><?PHP previous_post_link() ?></div><div class="linknext"><?PHP next_post_link() ?></div><div id="gradient"></div></div><?PHP

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>
		</main>
	</div>
<?php 
	get_footer(); 
?>
