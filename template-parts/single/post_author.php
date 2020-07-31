<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * 「この記事を書いた人」
 * $parts_args['author_id'] : 著者IDが渡ってくる
 */
$author_id = isset( $parts_args['author_id'] ) ? $parts_args['author_id'] : 0;
?>
<section class="p-entry__author c-bottomSection">
	<h2 class="c-bottomSection__title"><?php esc_html_e( 'Author of this article', 'arkhe' ); ?></h2>
	<?php ARKHE_THEME::get_parts( 'others/author_box', array( 'author_id' => $author_id ) ); ?>
</section>
