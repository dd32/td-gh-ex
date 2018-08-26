<?php


if ( ! function_exists( 'aemi_post_thumbnail' ) )
{
	function aemi_post_thumbnail( $size )
	{
		the_post_thumbnail( $size, array( 'itemprop' => 'image' ) );
	}
}


if ( ! function_exists( 'aemi_featured_image' ) )
{
	function aemi_featured_image()
	{
		if ( has_post_thumbnail() ) { ?>

			<div class="post-attachment">

				<?php if ( ! is_singular() ) { ?>

					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php aemi_post_thumbnail( 'aemi-content' ); ?></a>

				<?php } else { ?>

					<?php aemi_post_thumbnail( 'aemi-large' ); ?>

				<?php } ?>

			</div>

		<?php } else {

			if ( ! is_singular() ) { ?>

				<div class="post-attachment">

					<a class="no-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri() . '/assets/m/placeholder.png' ?>" /></a>

				</div>

			<?php }
		}
	}
}


if ( ! function_exists( 'aemi_sticky_post' ) )
{
	function aemi_sticky_post()
	{
		if ( is_sticky() ) { ?>

			<div class="post-add">

				<div class="post-sticky">

					<?php _e( 'highlight', 'aemi' ) ?>

				</div>

			</div>

		<?php }
	}
}


if ( ! function_exists( 'aemi_posted_info' ) )
{
	function aemi_posted_info()
	{ ?>

		<span class="post-date"><?php the_time( 'j . n . y' ); ?></span>
		<span class="post-author"><?php the_author_posts_link(); ?></span>

	<?php }
}


if ( ! function_exists( 'aemi_post_meta_header' ) )
{
	function aemi_post_meta_header()
	{ ?>
		<div class="post-meta">

			<?php

			aemi_posted_info();

			if ( 'post' === get_post_type() ) {

				if ( get_the_category_list() ) { ?>

					<span class="post-cats"><?php _e( '', 'aemi' ); ?><?php the_category( ' + ' ); ?></span>

				<?php }

			}

			edit_post_link( esc_html__( 'Edit', 'aemi' ), '<span class="edit">', '</span>' ); ?>

		</div>

		<?php
	}
}

if ( ! function_exists( 'aemi_post_meta_footer' ) )
{
	function aemi_post_meta_footer()
	{ ?>
		<div class="post-meta">

			<?php

			if ( is_singular() )
			{
				foreach ( get_post_taxonomies( $post, 'name' ) as $tax )
				{
					if ( $tax === 'post_tag' )
					{
						the_tags('<span class="post-tags">','','</span>');
					}
					else if ( $tax !== 'category' )
					{
						the_terms( $post->ID, $tax, '<div class="post-cptt ' . $tax . '"><h2 class="cptt-title">' . $tax . '</h2><div class="cptt-content">', '&#8212;', '</div></div>' );
					}
				}
			}

			?>

		</div>

		<?php
	}
}
