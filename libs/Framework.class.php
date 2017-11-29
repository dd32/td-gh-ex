<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AttireFramework {
	private $theme_mod;

	/**
	 * @usage Prints Page Heading in Single Page/Post
	 */
	public static function PageHeadingMain() {

		$PgaeHeadingMain = '';

		if ( is_day() ) :
			$PgaeHeadingMain = get_the_date();

        elseif ( is_month() ) :
			$PgaeHeadingMain = "Monthly Archives: " . get_the_date( 'F Y' );

        elseif ( is_404() ) :
			$PgaeHeadingMain = "404";

        elseif ( is_year() ) :
			$PgaeHeadingMain = get_the_date( 'Y' );

        elseif ( is_category() ) :
			$PgaeHeadingMain = single_cat_title( '', false );

        elseif ( is_tag() ) :
			$PgaeHeadingMain = single_tag_title();

        elseif ( is_page() ) :
			$PgaeHeadingMain = get_the_title();

        elseif ( is_single() ) :
			$PgaeHeadingMain = get_the_title();

        elseif ( is_singular( 'wpdmpro' ) ) :
			$PgaeHeadingMain = get_the_title();

        elseif ( is_search() ):
			$PgaeHeadingMain = "Search Result For:  " . esc_attr( get_query_var( 's' ) );

        elseif ( is_tax() ):
			$PgaeHeadingMain = single_term_title( '', false );

        elseif ( is_home() ):
			$pageid          = get_query_var( 'page_id' );
			$page            = get_post( $pageid );
			$PgaeHeadingMain = esc_attr( $page->post_title );
		endif;
		rewind_posts();

		echo apply_filters( "attire_page_heading_main", $PgaeHeadingMain );

	}

	/**
	 * @usage Render Dynamic Sidebars
	 */
	public static function DynamicSidebars( $pos ) {
		global $post;

		$theme_mod = get_option( 'attire_options' );

		$left_sidebar_style  = "default";
		$right_sidebar_style = "default";

//		Defaults
		$sidebar_layout      = 'right-sidebar-1';
		$left_sidebar        = 'left';
		$right_sidebar       = 'right';
		$left_sidebar_width  = 3;
		$right_sidebar_width = 3;

		if ( is_home() || is_front_page() ) {
			// if is_home() || is_front_page() default theme option is the top priority
			$sidebar_layout      = sanitize_text_field( $theme_mod['layout_front_page'] );
			$left_sidebar        = sanitize_text_field( $theme_mod['front_page_ls'] );
			$right_sidebar       = sanitize_text_field( $theme_mod['front_page_rs'] );
			$left_sidebar_width  = intval( $theme_mod['front_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['front_page_rs_width'] );
		} elseif ( is_page() ) {
			// else post meta is is the top priority

			$meta = maybe_unserialize( get_post_meta( $post->ID, 'attire_post_meta', true ) );
//			echo '<pre>' . json_encode( $meta, JSON_PRETTY_PRINT ) . '</pre>';


			$page_layout['sidebar_layout']      = sanitize_text_field( $theme_mod['layout_default_page'] );
			$page_layout['left_sidebar']        = sanitize_text_field( $theme_mod['default_page_ls'] );
			$page_layout['right_sidebar']       = sanitize_text_field( $theme_mod['default_page_rs'] );
			$page_layout['left_sidebar_width']  = intval( $theme_mod['default_page_ls_width'] );
			$page_layout['right_sidebar_width'] = intval( $theme_mod['default_page_rs_width'] );


			$sidebar_layout = isset( $meta['sidebar_layout'] ) && $meta['sidebar_layout'] !== '' ? $meta['sidebar_layout'] : $page_layout['sidebar_layout'];

			$left_sidebar        = isset( $meta['left_sidebar'] ) && $meta['left_sidebar'] !== 'default' ? $meta['left_sidebar'] : $page_layout['left_sidebar'];
			$right_sidebar       = isset( $meta['right_sidebar'] ) && $meta['right_sidebar'] !== 'default' ? $meta['right_sidebar'] : $page_layout['right_sidebar'];
			$left_sidebar_width  = isset( $meta['left_sidebar_width'] ) && (int) $meta['left_sidebar_width'] !== 0 ? $meta['left_sidebar_width'] : $page_layout['left_sidebar_width'];
			$right_sidebar_width = isset( $meta['right_sidebar_width'] ) && (int) $meta['right_sidebar_width'] !== 0 ? $meta['right_sidebar_width'] : $page_layout['right_sidebar_width'];

		} elseif ( is_single() ) {
			$sidebar_layout      = sanitize_text_field( $theme_mod['layout_default_post'] );
			$left_sidebar        = sanitize_text_field( $theme_mod['default_post_ls'] );
			$right_sidebar       = sanitize_text_field( $theme_mod['default_post_rs'] );
			$left_sidebar_width  = intval( $theme_mod['default_post_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['default_post_rs_width'] );
		} elseif ( is_archive() || is_search() || is_category() ) {
			$sidebar_layout = sanitize_text_field( $theme_mod['layout_archive_page'] );

			$left_sidebar        = sanitize_text_field( $theme_mod['archive_page_ls'] );
			$right_sidebar       = sanitize_text_field( $theme_mod['archive_page_rs'] );
			$left_sidebar_width  = intval( $theme_mod['archive_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['archive_page_rs_width'] );
		}


		if ( $pos == 'left' ) {

			if ( $left_sidebar != 'no_sidebar' && in_array( $sidebar_layout, array(
					'left-sidebar-1',
					'left-sidebar-2',
					'sidebar-2'
				) ) ) {
				self::Sidebar( $left_sidebar, $left_sidebar_width, $left_sidebar_style, "left" );
			} elseif ( in_array( $sidebar_layout, array(
				'left-sidebar-1',
				'left-sidebar-2',
				'sidebar-2'
			) ) ) {
				echo '<div class="col-lg-' . $left_sidebar_width . '"></div>';

			}

			if ( $right_sidebar != 'no_sidebar' && $sidebar_layout == 'left-sidebar-2' ) {
				self::Sidebar( $right_sidebar, $right_sidebar_width, $right_sidebar_style, "right" );
			} elseif ( $sidebar_layout == 'left-sidebar-2' ) {
				echo '<div class="col-lg-' . $right_sidebar_width . '"></div>';

			}
		} elseif ( $pos == 'right' ) {
			if ( $left_sidebar != 'no_sidebar' && $sidebar_layout == 'right-sidebar-2' ) {
				self::Sidebar( $left_sidebar, $left_sidebar_width, $left_sidebar_style, "left" );
			} elseif ( $sidebar_layout == 'right-sidebar-2' ) {
				echo '<div class="col-lg-' . $left_sidebar_width . '"></div>';

			}

			if ( $right_sidebar != 'no_sidebar' && in_array( $sidebar_layout, array(
					'right-sidebar-1',
					'right-sidebar-2',
					'sidebar-2'
				) ) ) {
				self::Sidebar( $right_sidebar, $right_sidebar_width, $right_sidebar_style, "right" );
			} elseif ( in_array( $sidebar_layout, array(
				'right-sidebar-1',
				'right-sidebar-2',
				'sidebar-2'
			) ) ) {
				echo '<div class="col-lg-' . $right_sidebar_width . '"></div>';

			}
		}

	}

	/**
	 * @usage Render Sidebar
	 *
	 * @param $id
	 * @param $width
	 * @param $style
	 * @param $pos
	 */
	public static function Sidebar( $id, $width, $style, $pos ) {

		$style = sanitize_text_field( $style );
		$pos   = sanitize_text_field( $pos );
		?>
        <div class="sidebar-area col-lg-<?php echo sanitize_text_field( $width ); ?>">
            <div class="sidebar <?php echo $style; ?>">
				<?php do_action( "attire_before_sidebar_{$style}" ); ?>

				<?php do_action( "attire_before_{$pos}_sidebar" ); ?>


				<?php dynamic_sidebar( $id ); ?>

				<?php do_action( "attire_after_{$pos}_sidebar" ); ?>

				<?php do_action( "attire_after_sidebar_{$style}" ); ?>
            </div>
        </div>
		<?php
	}


	/**
	 * @usage Calculate Content Area Width
	 */
	public static function ContentAreaWidth() {
		global $post;
		$theme_mod = get_option( 'attire_options' );

		$sidebar_layout      = "right-sidebar-1";
		$content_width       = 12;
		$right_sidebar_width = 3;
		$defaults            = array(
			'sidebar_layout'      => 'right-sidebar-1',
			'left_sidebar_width'  => 3,
			'right_sidebar_width' => 3
		);
		if ( is_home() || is_front_page() ) {
			$sidebar_layout      = sanitize_text_field( $theme_mod['layout_front_page'] );
			$left_sidebar_width  = intval( $theme_mod['front_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['front_page_rs_width'] );
		} elseif ( is_single() || is_page() ) {
			$meta = maybe_unserialize( get_post_meta( $post->ID, 'attire_post_meta', true ) );

			if ( is_page() ) {
				$page_layout['sidebar_layout']      = sanitize_text_field( $theme_mod['layout_default_page'] );
				$page_layout['left_sidebar_width']  = intval( $theme_mod['default_page_ls_width'] );
				$page_layout['right_sidebar_width'] = intval( $theme_mod['default_page_rs_width'] );
				$page_layout['page_width']          = intval( $theme_mod['default_page_rs_width'] );
			} else {
				$page_layout['sidebar_layout']      = sanitize_text_field( $theme_mod['layout_default_post'] );
				$page_layout['left_sidebar_width']  = intval( $theme_mod['default_post_ls_width'] );
				$page_layout['right_sidebar_width'] = intval( $theme_mod['default_post_rs_width'] );
			}

			$sidebar_layout      = isset( $meta['sidebar_layout'] ) && $meta['sidebar_layout'] != '' ? $meta['sidebar_layout'] : $page_layout['sidebar_layout'];
			$left_sidebar_width  = isset( $meta['left_sidebar_width'] ) && $meta['left_sidebar_width'] != '' ? $meta['left_sidebar_width'] : $page_layout['left_sidebar_width'];
			$right_sidebar_width = isset( $meta['right_sidebar_width'] ) && $meta['right_sidebar_width'] != '' ? $meta['right_sidebar_width'] : $page_layout['right_sidebar_width'];

		} elseif ( is_archive() || is_category() || is_search() ) {
			$sidebar_layout      = sanitize_text_field( $theme_mod['layout_archive_page'] );
			$left_sidebar_width  = intval( $theme_mod['archive_page_ls_width'] );
			$right_sidebar_width = intval( $theme_mod['archive_page_rs_width'] );
		}

		if ( $sidebar_layout == "no-sidebar" ) {
			$content_width = 12;
		} elseif ( $sidebar_layout == "right-sidebar-1" ) {
			$content_width = 12 - $right_sidebar_width;
		} elseif ( $sidebar_layout == "left-sidebar-1" ) {
			$content_width = 12 - $left_sidebar_width;
		} else {
			$content_width = 12 - $left_sidebar_width - $right_sidebar_width;
		}

		echo apply_filters( "attire_content_area_width", "$sidebar_layout col-lg-" . $content_width );

	}


}