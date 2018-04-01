<?php
/**
 * The template part for displaying categories of current post
 *
 * @package Aamla
 * @since 1.0.0
 */

$aamla_categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'aamla' ) );

if ( $aamla_categories_list ) :
?>
	<span<?php aamla_attr( 'meta-categories' ); ?>>
		<?php
		printf( '<span class="meta-title">%s</span>', esc_html__( 'Filed Under: ', 'aamla' ) );
		echo $aamla_categories_list; // WPCS xss ok.
		?>
	</span><!-- .meta-categories -->
<?php
endif;
