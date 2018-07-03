<?php
/**
 * The template part for displaying categories of current post
 *
 * @package Aamla
 * @since 1.0.0
 */

$aamla_categories_list = get_the_category_list( esc_html_x( ', ', 'Used between category list items, there is a space after the comma.', 'aamla' ) );

if ( $aamla_categories_list ) :
?>
	<span<?php aamla_attr( 'meta-categories' ); ?>>
		<?php
		printf( '<span class="meta-title">%s</span>',
			aamla_get_icon( [ 'icon' => 'folder' ] )
		); // WPCS xss ok. Contains HTML, other values escaped.
		echo $aamla_categories_list; // WPCS xss ok. Contains HTML, other values escaped.
		?>
	</span><!-- .meta-categories -->
<?php
endif;
