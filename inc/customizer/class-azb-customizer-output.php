<?php 


class AzonBooster_Customizer_Output {

	public function __construct() {

		add_filter( 'body_class', array( $this, 'body_classes' ) );
		add_filter( 'post_class', array( $this, 'thumbnail_position' ) );

		add_filter( 'azonbooster_show_excerpt', array( $this, 'show_excerpt' ) );
		add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length'), 999 );
		add_filter( 'excerpt_more', array( $this, 'custom_excerpt_more' ) );

		add_filter( 'azonbooster_show_post_thumbnail', array( $this, 'show_post_thumbnail' ));
		add_filter( 'azonbooster_show_post_thumbnail', array( $this, 'show_single_post_thumbnail' ), 999);
		add_filter( 'post_class', array( $this, 'hide_post_thumbnail' ) );
		add_filter( 'azonbooster_show_post_nav', array( $this, 'show_post_nav'));

		add_filter( 'azonbooster_show_readmore', array( $this, 'show_readmore' ) );
		add_filter( 'azonbooster_readmore_link_label', array( $this, 'change_readmore_label' ) );

		// Footer Widget
		add_filter( 'azonbooster_footer_widget_columns', array( $this, 'footer_widget_columns' ) );
		add_filter( 'azonbooster_footer_widget_rows', array( $this, 'footer_widget_rows' ) );

		
	}

	public function body_classes( $classes ) {

		$sidebar = azonbooster_get_option('blog_layout', 'right') . '-sidebar';

		$classes[] = $sidebar;

		if ( $sidebar === 'none-sidebar' ) {

			remove_action( 'azonbooster_sidebar',        'azonbooster_get_sidebar',          10 );

		} 

		return $classes;
	}

	public function thumbnail_position( $classes ) {

		if ( ! is_single() ) {

			$classes[] = 'thumbnail-on-' . azonbooster_get_option('blog_layout_thumbnail_pos', 'left');

		}

		return $classes;
	}

	public function custom_excerpt_length( $length ) {

		return azonbooster_get_option('blog_post_excerpt_length', 20);

	}

	public function show_excerpt( $show ) {

		$enable = azonbooster_get_option('blog_post_show_excerpt', 'on');

		if ( $enable == 'on' ) {
			return true;
		}

		return false;
		
	}

	public function custom_excerpt_more( $more  ) {

		return azonbooster_get_option('blog_post_show_excerpt_more', '[...]');
	}

	public function show_readmore( $show ) {

		return azonbooster_get_option( 'blog_post_show_readmore', true);
	}

	public function change_readmore_label() {

		return azonbooster_get_option( 'blog_post_show_readmore_label', __('Read More...', 'azonbooster') );
	}

	public function show_post_thumbnail( $show ) {

		return azonbooster_get_option('blog_post_show_thumbnail', true);

	}

	public function show_post_nav( $show ) {

		return azonbooster_get_option('blog_single_post_show_nav', true);
	}

	public function show_single_post_thumbnail( $show ) {

		if ( is_single() )

			return azonbooster_get_option('blog_single_post_show_thumbnail', false);

		return $show;

	}

	public function hide_post_thumbnail( $classes ) {

		if ( ! $this->show_post_thumbnail( true ) ){

			$classes[] = "disable-thumbnail";
		}

		

		return $classes;
	}

	public function footer_widget_columns( $col ) {

		return azonbooster_get_option('blog_footer_widget_cols', 4);

	}

	public function footer_widget_rows( $row ) {

		return azonbooster_get_option('blog_footer_widget_rows', 2);

	}

}

new AzonBooster_Customizer_Output();