<?php
/**
 * Template Name: List of contributors
 *
 * Description: This template shows the list of all contributors.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

get_header(); ?>

<div class="inner">
    <div id="main-content" class="main-content">
    	<div class="contributors flex-container">
<?php 
$authors = get_users();

foreach ($authors as $key => $value): 
	$author_ID = $authors[$key]->ID;
	$author_data = get_userdata($author_ID);
	$author_post_count = count_user_posts($author_ID);

	if ( $author_post_count):?>
		<div class="contributor">
<?php 		if  (get_avatar($author_data->user_email)):
			echo get_avatar($author_data->user_email);
		endif; ?>

			<h1> <?php echo esc_html( $authors[$key]->data->display_name ) ?> </h1>				

			<p> <?php echo esc_html( $author_data->description) ?> </p>

			<?php
				printf( '<div class="author-link"><a href="%1$s" rel="author">%2$s</a></div>',
					esc_url( get_author_posts_url($author_ID)  ),
					sprintf('<span class="genericon genericon-standard" aria-hidden="true"></span>'. _n('%s Article', '%s Articles', $author_post_count, 'aguafuerte'), $author_post_count));
			?>

			</div><!--/contributor-->

<?php 	endif;
endforeach; ?>

		</div><!--/contributors-->   
	</div><!--/main-content--> 
</div><!--/inner-->

<?php get_footer(); ?>

