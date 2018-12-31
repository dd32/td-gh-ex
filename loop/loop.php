<?php
/**
 * The template part for the main posts loop
 *
 * @package agncy
 */

?>
<div class="the_loop">
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$page_template = get_post_meta( $post->ID, '_wp_page_template', true );
		if ( is_search() && 'page_templates/pt-one-page.php' == $page_template ) {
			continue;
		}
		get_template_part( 'loop/post', get_post_format() );
	endwhile;
	get_template_part( 'loop/posts-pagination' );
else :
	?>
	<div class="no-posts the_content">
		<h2>
			<?php
				esc_html_e( 'Sorry, but there are no posts here.', 'agncy' );
			?>
		</h2>
	</div>
	<?php
endif;
?>
</div>
