<?php
/**
 * The template part for displaying tags of current post
 *
 * @package Aamla
 * @since 1.0.0
 */

$aamla_tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'aamla' ) );

if ( $aamla_tags_list ) :
?>
	<span<?php aamla_attr( 'meta-tags' ); ?>>
		<?php
		printf( '<span class="meta-title">%s</span>', esc_html__( 'Tagged With: ', 'aamla' ) );
		echo $aamla_tags_list; // WPCS xss ok.
		?>
	</span><!-- .meta-tags -->
<?php
endif;
