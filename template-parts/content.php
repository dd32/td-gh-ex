<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Academic_Hub
 */

?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-grid'); ?> >
	<div class="blog-details">
		<div class="blog-list">
			<?php the_post_thumbnail(); ?>
			<div class="blog-hover-part">
				<div class="blog-hover-content">
					<span class="icon-img">
						<a href="<?php the_permalink(); ?>"><i class="fa fa-external-link"></i></a>
					</span>
				</div>
			</div>
		</div>
		<div class="blog-paragraph">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php the_excerpt(); ?>
		</div>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->
