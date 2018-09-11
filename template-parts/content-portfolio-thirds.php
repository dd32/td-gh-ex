<?php
$term_list = wp_get_post_terms( $post->ID, get_post_type() . '_category', array( "fields" => "slugs" ) );
$terms_to_print = '';

if ( has_post_thumbnail() ) {
	$portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'absolutte_portfolio' );
	$absolutte_portfolio_item_layout = rwmb_meta( 'absolutte_portfolio_item_layout' );
}

if ( ! is_wp_error( $term_list ) ) {
	foreach ( $term_list as $term_slug ) {
		$terms_to_print .= ' ' . $term_slug;
	}
}

echo "\t\t\t<div id='absolutte-portfolio-item-" . esc_attr( $post->ID ) . "' class='absolutte-portfolio-item " . esc_attr( $terms_to_print ) ."'>";
    echo "\t\t\t\t<a href='" . esc_url( get_permalink() ) . "'></a>\n";
	echo '<div class="absolutte-portfolio-item-hover">';
        echo '<div class="absolutte-portfolio-item-content">';
       		echo '<h4 class="portfolio-item-title">' . esc_html( get_the_title() ) . '</h4>';
       	echo "\t\t\t</div>\n";
	echo "\t\t\t</div>\n";
	the_post_thumbnail( 'absolutte_portfolio' );
echo "</div>\n";
