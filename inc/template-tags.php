<?php

//----------------------------------------------------------------------
//  Posted on
//----------------------------------------------------------------------

if ( ! function_exists( 'aster_post_tag_list' ) ) {
	function aster_post_tag_list() {
		$tags_list = get_the_tag_list( '', __( ', ', 'aster' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'aster' ) . '</span>', $tags_list );
		}

	}
}


if ( ! function_exists( 'aster_posted_on' ) ) {
	function aster_posted_on() { ?>
		<ul class="list-inline">
			<li>
                <span class="author vcard">
                    <?php _e( 'By ', 'aster' );
                    printf( '<a class="url fn n" href="%1$s">%2$s</a>',
                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                        esc_html( get_the_author() )
                    ) ?>
                </span>
			</li>

			<li>/</li>

			<li>
				<span class="posted-on"><?php
					$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hidden" datetime="%3$s">%4$s</time>';
					}
					printf( $time_string,
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( 'c' ) ),
						esc_html( get_the_modified_date() )
					);
					?></span>
			</li>
		</ul>
		<?php
	}
}


//----------------------------------------------------------------------
//  Single Post navigation link. <- Previous post  |   Next Post ->
//----------------------------------------------------------------------

if ( ! function_exists( 'aster_post_navigation' ) ) {

	function aster_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="next-previous-post clearfix" role="navigation">
			<!-- Previous Post -->
			<div class="previous-post pull-left">
				<?php previous_post_link( '<div class="nav-previous">%link</div>', __( '<i class="fa fa-angle-left"></i> Previous Post', 'aster' ) ); ?>
			</div>

			<!-- Next Post -->
			<div class="next-post pull-right text-right">
				<?php next_post_link( '<div class="nav-next">%link</div>', __( 'Next Post <i class="fa fa-angle-right"></i>', 'aster' ) ); ?>
			</div>
		</nav><!-- .navigation -->
		<?php
	}
}