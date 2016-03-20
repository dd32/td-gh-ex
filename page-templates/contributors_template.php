<?php
/**
 * Template Name: List of contributors
 *
 * Description: This template shows the list of all contributors.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */

get_header(); ?>

<div class="inner no-sidebar">
    <div id="main-content">
    	<div class="author-section flex-container">

			<?php 
				$authors = get_users();

				foreach ($authors as $key => $value): ?>

				<div class="contributor">

				<?php 
					$author_ID = $authors[$key]->ID;
					$author_data = get_userdata($author_ID);
					$author_post_count = count_user_posts($author_ID);

					//echo '<pre>';print_r($author_meta); echo '</pre>'; echo '<br>';
						
					if  (get_avatar($author_data->user_email)):
						echo get_avatar($author_data->user_email);
					else:
						echo 'no tiene foto';
					endif;
				?>

				<h1> <?php echo $authors[$key]->data->display_name;?> </h1>				

				<p> <?php echo $author_data->description; ?> </p>

				<?php
					printf( '<div class="author-link"><a href="%1$s" rel="author">%2$s</a></div>',
						esc_url( get_author_posts_url($author_ID)  ),
						sprintf(_n('%s Article', '%s Articles', $author_post_count, 'aguafuerte'), $author_post_count));
				?>

				</div><!--/col-4-->

			<?php endforeach; ?>

		</div><!--/author-section-->   
	</div><!--/main-content-->    

</div><!--/inner-->
<div class="clearfix"></div>

<?php get_footer(); ?>

