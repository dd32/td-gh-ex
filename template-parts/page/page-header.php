<?php
/**
 * The template part for displaying page-header for home, search or archive pages.
 *
 * @package Aamla
 * @since 1.0.0
 */

if ( is_home() && ! is_front_page() ) :?>

	<header<?php aamla_attr( 'page-header', array( 'class' => 'screen-reader-text' ) ); ?>>
		<h1<?php aamla_attr( 'page-header-title' ); ?>><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->

<?php
elseif ( is_archive() ) :
?>

	<header<?php aamla_attr( 'page-header', array( 'class' => 'archive-page-header' ) ); ?>>
		<?php
		the_archive_title( sprintf( '<h1%1$s><span>%2$s</span>', aamla_get_attr( 'page-header-title' ), esc_html__( 'Showing posts from ', 'aamla' ) ), '</h1>' );
		the_archive_description( sprintf( '<div%1$s>', aamla_get_attr( 'page-header-description' ) ), '</div>' );
		?>
		<a<?php aamla_attr( 'show-blog-posts' ); ?> href="<?php echo esc_url( aamla_get_blog_posts_link() ); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'show all posts', 'aamla' ); ?></span>
			<?php aamla_icon( array( 'icon' => 'close' ) ); ?>
		</a>
	</header><!-- .page-header -->

<?php
elseif ( is_search() ) :
?>

	<header<?php aamla_attr( 'page-header' ); ?>>
		<h1<?php aamla_attr( 'page-header-title' ); ?>>
			<?php
			printf(
				/* translators: %s: Search term */
				esc_html__( 'Search Results for: %s', 'aamla' ), '<span>' . get_search_query() . '</span>'
			);
			?>
		</h1>
	</header><!-- .page-header -->

<?php
endif;
