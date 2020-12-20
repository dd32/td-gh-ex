<?php
/**
 * 固定ページテンプレート
 */
get_header();
while ( have_posts() ) :
	the_post();
	$the_id = get_the_ID();
?>
	<main id="main_content" class="<?php Arkhe::main_class(); ?>">
		<article <?php post_class( Arkhe::get_main_body_class() ); ?> data-postid="<?php the_ID(); ?>">
			<?php
				do_action( 'arkhe_start_page_main', $the_id );
				Arkhe::get_part( 'page', array( 'post_id' => $the_id ) );
				do_action( 'arkhe_end_page_main', $the_id );
			?>
		</article>
	</main>
<?php
endwhile;
get_footer();
