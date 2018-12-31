<?php
/**
 * The template file to display the post thumbnail
 *
 * @package agncy
 */

if ( has_post_thumbnail() ) : ?>
<div class="thumbnail-wrapper">
	<div class="container">
		<div class="row">
			<div class="the_thumbnail">
				<?php the_post_thumbnail( 'agncy_sixteen_nine_medium' ); ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
