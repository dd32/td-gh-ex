<?php
/**
 *  For Static Page
 */

?>

<div class="container">

	<h1><?php single_post_title(); ?></h1>

	<?php while ( have_posts() ): ?>
				
		<?php the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-wrapper">

				<div class="entry-header">
					<div class="entry-thumb">
						<?php the_post_thumbnail( "full", array( "class" => "img-fluid" ) ); ?>
					</div>
				</div>

				<div class="entry-contents">

					<div class="entry-summary">
						<?php the_content(); ?>
					</div>

				</div>
			</div>
		</article>
		
	<?php endwhile; ?>
	
</div>