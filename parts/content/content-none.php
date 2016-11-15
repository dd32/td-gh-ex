<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<h1 class="entry-title">
			<?PHP
				echo sprintf(
					 __( 'Sorry, Nothing found for %s', 'antonine' ), $_GET['s']
				);
			?>
		</h1>
	</header>
	<div class="entry-content">
		<p><?PHP echo __( 'Search again?', 'antonine' ); ?></p>
		<?PHP get_search_form(); ?>
	</div>
</article>
