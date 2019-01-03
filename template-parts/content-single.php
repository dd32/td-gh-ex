<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Academic_Hub
 */

?>
<div id="post-<?php the_ID(); ?>"  <?php post_class('col-md-12 col-xs-12 single-banner-img'); ?>>
		<?php the_post_thumbnail(); ?>
	</div>
	<div class=" col-md-12 col-xs-12 single-title">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 single-description">
				<h3 class="school-topic"><?php the_title(); ?></h3>
					<?php the_content(); ?>

					<?php 
					
					$post_author_id = get_post_field( 'post_author', get_the_ID() ); 
					
					?>

					<?php get_template_part( 'template-parts/author/author', 'box' ); ?>
				
			
				<!-- Single Related Post -->
				<?php do_action('academic_hub_related',get_the_ID()); ?>

				<!-- comment box appearing -->
				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div>

			<!-- sidebar -->
			<div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="sidebar-padder right_sidebars">
					<?php
						/**
						 * Academic Hub Sidebar
						 * 
						 * @since 1.0.0
						 */
						get_sidebar();
					?>
				</div>
			</div>
		</div>
	</div>