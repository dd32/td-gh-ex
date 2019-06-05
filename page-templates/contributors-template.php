<?php
/**
 * Template Name: List of contributors
 *
 * Description: This template shows the list of all contributors.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

get_header(); ?>

<div class="inner no-sidebar flex-container">
	<div id="main-content" class="main-content">
		<div class="contributors flex-container">
		<?php 
			$authors = get_users();

			foreach ($authors as $key => $value):
				$author_ID = $authors[$key]->ID;
				$author_data = get_userdata($author_ID);
				$author_post_count = count_user_posts($author_ID); ?>

			<div class="contributor">
				<div class="avatar-container">
				<?php
					if  (get_avatar($author_data->user_email)):
						echo get_avatar($author_data->user_email);
					endif;
				?>
				</div>

				<div class="author-info">
					<h1> <?php echo $authors[$key]->data->display_name;?> </h1>
					<p> <?php echo $author_data->description; ?> </p>
				</div>

			<?php
				printf( '<div class="author-link"><a href="%1$s" rel="author">%2$s</a></div>',
					esc_url( get_author_posts_url($author_ID)  ),
					sprintf('<i class="fa fa-list" aria-hidden="true"></i>'. _n('%s Article', '%s Articles', $author_post_count, 'bassist'), $author_post_count));
			?>

			</div><!--/contributor-->

			<?php endforeach; ?>

		</div><!--/contributors-->   
	</div><!--/main-content-->    

</div><!--/inner-->

<?php get_footer(); ?>

