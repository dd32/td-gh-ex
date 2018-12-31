<?php
/**
 * The template file to display the sidebar
 *
 * @package agncy
 */

$sidebar = 'archive-sidebar';

switch ( true ) {
	case is_home():
		$sidebar = 'home-sidebar';
		break;
	case is_page():
		$sidebar = 'page-sidebar';
		break;
	case is_single():
		$sidebar = 'single-sidebar';
		break;
	case is_search():
		$sidebar = 'search-sidebar';
		break;
}

$sidebar = apply_filters( 'agncy_sidebar_id', $sidebar );

$sidebar_classes = array( 'sidebar-' . $sidebar, 'sidebar' );

if ( get_theme_mod( 'agncy_sticky_sidebar' ) ) {
	$sidebar_classes[] = 'sidebar-sticky';
}

$sbc = implode( ' ', $sidebar_classes );


if ( is_active_sidebar( $sidebar ) ) :
	?>
<div class="col-xs-12 col-md-4 sidebar-wrapper">
	<ul id="singular_sidebar" class="<?php echo esc_attr( $sbc ); ?>">
		<?php dynamic_sidebar( $sidebar ); ?>
	</ul>
</div>
<?php else : ?>
	<div class="col-xs-12 col-md-4 sidebar-wrapper">
		<ul id="singular_sidebar" class="<?php echo esc_attr( $sbc ); ?>">
			<li class="widget widget_search">
				<h2 class="widgettitle"><?php esc_html_e( 'Search', 'agncy' ); ?></h2>
				<?php get_search_form(); ?>
			</li>
			<li class="widget widget_recent_entries">
				<h2 class="widgettitle"><?php esc_html_e( 'Recent Posts', 'agncy' ); ?></h2>
				<?php
				$args = array(
					'post_type'           => 'post',
					'posts_per_page'      => 5,
					'ignore_sticky_posts' => 1,
				);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					?>
				<ul>
					<?php
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
					<?php endwhile; ?>
				</ul>
					<?php
				endif;
				wp_reset_postdata();
				?>
			</li>
			<li class="widget widget_archive">
				<h2 class="widgettitle"><?php esc_html_e( 'Archive', 'agncy' ); ?></h2>
				<ul>
					<?php
					wp_get_archives(
						apply_filters(
							'widget_archives_args',
							array(
								'type'            => 'monthly',
								'show_post_count' => 0,
							)
						)
					);
					?>
				</ul>
			</li>
			<li id="meta-4" class="widget widget_meta">
				<h2 class="widgettitle"><?php esc_html_e( 'Meta', 'agncy' ); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li>
						<?php wp_loginout(); ?>
					</li>
					<li>
						<a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>">
							<?php echo wp_kses_post( 'Entries <abbr title="Really Simple Syndication">RSS</abbr>', 'agncy' ); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo esc_url( get_bloginfo( 'comments_rss2_url' ) ); ?>">
							<?php echo wp_kses_post( 'Comments <abbr title="Really Simple Syndication">RSS</abbr>', 'agncy' ); ?>
						</a>
					</li>
					<?php
					echo wp_kses_post(
						apply_filters(
							'widget_meta_poweredby',
							sprintf(
								'<li><a href="%s" title="%s">%s</a></li>',
								esc_url( __( 'https://wordpress.org/', 'agncy' ) ),
								esc_attr__( 'Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'agncy' ),
								_x( 'WordPress.org', 'meta widget link text', 'agncy' )
							)
						)
					);

					wp_meta();
					?>
				</ul>
			</li>
		</ul>
	</div>
<?php endif; ?>
