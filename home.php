<?php
/**
 * 「投稿ページ」に設定されたページ or ホームページに指定がない場合のトップページ
 */
get_header();

$post_data = get_queried_object();
$the_id    = isset( $post_data->ID ) ? $post_data->ID : 0;
?>
<main id="main_content" class="<?php Arkhe::main_class(); ?>">
	<div class="<?php Arkhe::main_body_class(); ?>">
		<?php
			do_action( 'arkhe_start_home_main' );

			// ページタイトル
			if ( $the_id && ! Arkhe::is_show_ttltop() ) :
				Arkhe::get_part( 'page/head', array( 'post_id' => $the_id ) );
			endif;

			// コンテンツ
			do_action( 'arkhe_before_home_content' );
			Arkhe::get_part( 'home' );
			do_action( 'arkhe_after_home_content' );

			do_action( 'arkhe_end_home_main' );
		?>
	</div>
</main>
<?php
get_footer();
