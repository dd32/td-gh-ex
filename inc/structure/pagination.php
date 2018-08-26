<?php

if ( ! function_exists( 'aemi_posts_pagination' ) )
{
	function aemi_posts_pagination()
	{
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) { ?>

			<nav id="pagination" class="pagination" role="navigation">

				<?php if ( get_next_posts_link() ) { ?>

					<div class="nav-previous button">

						<?php next_posts_link( sprintf( __( '%s previous posts', 'aemi' ), '&larr;' ) ); ?>

					</div>

				<?php }

				if ( get_previous_posts_link() ) { ?>

					<div class="nav-next button">

						<?php previous_posts_link( sprintf( __( 'next posts %s', 'aemi' ),  '&rarr;' ) ); ?>

					</div>

				<?php } ?>

			</nav>

		<?php }
	}
}



if ( ! function_exists( 'aemi_post_navigation' ) )
{
	function aemi_post_navigation()
	{ ?>

		<nav id="pagination" class="pagination" role="navigation">

			<?php

			previous_post_link( '<div class="nav-previous button">%link</div>', '<span class="meta-nav">&larr;</span> previous post' );

			next_post_link( '<div class="nav-next button">%link</div>', 'next post <span class="meta-nav">&rarr;</span>' );

			?>

		</nav>

		<?php
	}

}
