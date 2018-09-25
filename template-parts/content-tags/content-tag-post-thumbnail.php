<?php
/**
 * Displays an optional post thumbnail.
 *
 * @package BA Tours
 */


if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
	
	return;
}

$option = apply_filters( 'bathemos_option', '', 'front-header-slideshow' );

if ( is_singular() && (!is_front_page() || (is_front_page() && !$option)) ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'bathemos_wide' );
        
        if ( apply_filters( 'bathemos_page_option', true, 'page_title' ) ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
        
        ?>
	</div><!-- .post-thumbnail -->

<?php elseif (!is_singular()) : ?>

<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
	<?php
	the_post_thumbnail( 'bathemos_thumbnail', array(
		'alt' => the_title_attribute( array(
			'echo' => false,
		) ),
	) );
    
	?>
</a>

<?php
endif;