<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Attire {

	public $attire_defaults;

	function __construct() {
		$this->RegisterNavMenus();
		$this->Filters();
		$this->Actions();

		add_action( 'after_setup_theme', array( $this, 'ThemeSetup' ) );
	}

	/**
	 * Usage: Load language file
	 */
	function LoadTextDoamin() {
		load_theme_textdomain( 'attire', get_template_directory() . '/languages' );
	}

	function Filters() {
//		add_filter( 'style_loader_tag', array( $this, 'EnqueueLessStyles' ), 5, 2 );
		add_filter( 'template_include', array( $this, 'SearchResultTemplate' ) );
		//add_filter( 'wp_seo_get_bc_title', array($this, 'BreadcrumbTitle'), 10, 2 );
	}

	function Actions() {
		add_action( 'wp_enqueue_scripts', array( $this, 'EnqueueScripts' ) );
		add_action( 'wp_head', array( $this, 'WPHead' ) );
//        add_action('wp', array($this, 'SignIn'));
	}

	function WPHead() {
		$this->LessVars();
	}

	/**
	 * @usage Load all necessary scripts & styles
	 */
	function EnqueueScripts() {
		$theme_mod = get_option( 'attire_options' );

		// Font Options ( From Customizer Typography Options )
		$family[] = sanitize_text_field( $theme_mod['heading_font'] );
		$family[] = sanitize_text_field( $theme_mod['body_font'] );
		$family[] = sanitize_text_field( $theme_mod['widget_title_font'] );
		$family[] = sanitize_text_field( $theme_mod['widget_content_font'] );
		$family[] = sanitize_text_field( $theme_mod['menu_top_font'] );
		$family[] = sanitize_text_field( $theme_mod['menu_dropdown_font'] );

		$family = array_unique( $family );

//		echo '<pre>'.json_encode($theme_mod,JSON_PRETTY_PRINT).'</pre>';

		$cssimport = '//fonts.googleapis.com/css?family=' . implode( "|", $family );
		$cssimport = str_replace( '||', '|', $cssimport );

		wp_register_style( 'attire-responsive', ATTIRE_TEMPLATE_URL . '/css/responsive.css' );
		wp_register_style( 'bootstrap', ATTIRE_TEMPLATE_URL . '/bootstrap/css/bootstrap.min.css' );
		wp_enqueue_style( 'attire-main', get_stylesheet_uri(), array( 'bootstrap', 'attire-responsive' ) );
		wp_enqueue_style( 'font-awesome', ATTIRE_TEMPLATE_URL . '/fonts/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'google-fonts', $cssimport, array(), null );


		wp_enqueue_script( 'attire-html5', get_template_directory_uri() . '/js/html5shiv.js', array(), null );
		wp_script_add_data( 'attire-html5', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'attire-respond', get_template_directory_uri() . '/js/respond.min.js', array(), null );
		wp_script_add_data( 'attire-respond', 'conditional', 'lt IE 9' );

		wp_register_script( 'popper', ATTIRE_TEMPLATE_URL . '/bootstrap/js/popper.min.js', array(), null, true );
		wp_enqueue_script( 'bootstrap', ATTIRE_TEMPLATE_URL . '/bootstrap/js/bootstrap.min.js', array(
			'jquery',
			'popper'
		), null, true );
		wp_enqueue_script( 'modernizer', ATTIRE_TEMPLATE_URL . '/js/modernizr-custom.js', array(), null, true );
		wp_enqueue_script( 'attire-site', ATTIRE_TEMPLATE_URL . '/js/site.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'comment-reply', '', array(), null, true );
	}

	function sanitize_hex_color_front( $color ) {
		if ( '' === $color ) {
			return '';
		}

		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
		}
	}

	function LessVars() {

	}

	/**
	 * @usage: Register nav menus
	 */
	function RegisterNavMenus() {
		register_nav_menus( array(
			'primary' => __( 'Top Menu', 'attire' )
		) );
		register_nav_menus( array(
			'footer_menu' => __( 'Footer Menu', 'attire' )
		) );
	}


	/**
	 * @usage Select custom template for search result page
	 *
	 * @param $template
	 *
	 * @return string
	 */
	function SearchResultTemplate( $template ) {
		global $wp_query;
		$post_type = get_query_var( 'post_type' );
		if ( $wp_query->is_search && file_exists( dirname( __FILE__ ) . '/search-' . $post_type[0] . '.php' ) ) {
			return locate_template( 'search-' . $post_type[0] . '.php' );  //  redirect to archive-search.php
		}

		return $template;
	}

	/**
	 * @usage Post Comments
	 *
	 * @param $comment
	 * @param $args
	 * @param $depth
	 */
	public static function Comment( $comment, $args, $depth ) {

		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				?>
                <li class="post pingback">
                <p>
                    Pingback: <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default :
				?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                <div class="card comment-card">

                    <div id="comment-<?php comment_ID(); ?>" class="media card-body">
                        <div class="author-box pull-left">
                            <img class="mr-3" style="border-radius: 50%;"
                                 src="<?php echo esc_url( get_avatar_url( $comment, array( 'size' => '64' ) ) ); ?>"
                                 alt="<?php _e( 'Commenter\'s Avatar', 'attire' ); ?>">
                        </div> <!-- end .avatar-box -->
                        <div class="comment-wrap media-body">
                            <b><?php printf( '<span class="fn">%s</span>', get_comment_author_link() ) ?></b>

                            <div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->

                        </div> <!-- end comment-wrap-->
                        <div class="comment-arrow"></div>
                    </div> <!-- end comment-body-->
                    <div class="card-footer">
						<?php if ( $comment->comment_approved == '0' ) : ?>
                            <em class="moderation"><?php _e( 'Your comment is awaiting moderation.', 'attire' ) ?></em>
						<?php endif; ?>
                        <small>
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( '<i class="fa fa-clock-o"></i> %1$s at %2$s', get_comment_date(), get_comment_time() ); ?></a>
                        </small>
                        <div class="comment-edit-reply">
                            <small><?php edit_comment_link( '&nbsp;<i class="fa fa-pencil"></i> ' . __( 'Edit', 'attire' ), ' ' ); ?></small>
                            <small><?php comment_reply_link( array_merge( $args, array(
									'reply_text' => '&nbsp;<i class="fa fa-reply"></i> ' . __( 'Reply', 'attire' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth']
								) ) ) ?></small>
                        </div>
                    </div>
                </div> <!-- end comment-body-->


				<?php
				break;
		endswitch;
	}

	function BreadcrumbTitle( $title, $id ) {
		return '';
	}


	/**
	 * usage: Setup Theme
	 */
	function ThemeSetup() {
		$this->LoadTextDoamin();
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'excerpt', array( 'post', 'page' ) );
		add_theme_support( 'custom-background' );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		if ( ! get_option( 'attire_options' ) ) {
			add_option( 'attire_options', $this->GetAttireDefaults() );
		}
	}


	public function GetAttireDefaults() {
		$this->attire_defaults = array(
			'footer_widget_number' => '3',
			'copyright_info'       => '&copy; Copyright ' . date( 'Y' ) . ' | All Rights Reserved.',

			'layout_front_page'   => 'no-sidebar',
			'front_page_ls'       => 'left',
			'front_page_ls_width' => '3',
			'front_page_rs'       => 'right',
			'front_page_rs_width' => '3',

			'layout_default_post'   => 'right-sidebar-1',
			'default_post_ls'       => 'left',
			'default_post_ls_width' => '3',
			'default_post_rs'       => 'right',
			'default_post_rs_width' => '3',

			'layout_default_page'   => 'no-sidebar',
			'default_page_ls'       => 'left',
			'default_page_ls_width' => '3',
			'default_page_rs'       => 'right',
			'default_page_rs_width' => '3',

			'layout_archive_page'   => 'no-sidebar',
			'archive_page_ls'       => 'left',
			'archive_page_ls_width' => '3',
			'archive_page_rs'       => 'right',
			'archive_page_rs_width' => '3',

			'nav_header'   => 'header-1',
			'footer_style' => 'footer4',

			'main_layout_type'                  => 'container-fluid',
			'header_content_layout_type'        => 'container',
			'body_content_layout_type'          => 'container',
			'footer_widget_content_layout_type' => 'container',
			'footer_content_layout_type'        => 'container',

			'heading_font'        => 'Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
			'heading_font_size'   => '25',
			'heading_font_weight' => '700',

			'body_font'        => 'Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
			'body_font_size'   => '14',
			'body_font_weight' => '400',

			'widget_title_font'        => 'Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
			'widget_title_font_size'   => '20',
			'widget_title_font_weight' => '300',

			'widget_content_font'        => 'Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
			'widget_content_font_size'   => '14',
			'widget_content_font_weight' => '300',

			'menu_top_font'        => 'Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
			'menu_top_font_size'   => '16',
			'menu_top_font_weight' => '400',

			'menu_dropdown_font'        => 'Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
			'menu_dropdown_font_size'   => '16',
			'menu_dropdown_font_weight' => '400',

			'site_header_bg_color'        => '#151515',
			'site_title_text_color'       => '#ffffff',
			'site_description_text_color' => '#ffffff',

			'site_footer_bg_color'         => '#151515',
			'site_footer_title_text_color' => '#ffffff',

			'menu_top_font_color'            => '#ffffff',
			'main_nav_bg'                    => '#151515',
			'menuhbg_color'                  => '#ffffff',
			'menuht_color'                   => '#000000',
			'menu_dropdown_font_color'       => '#000000',
			'menu_dropdown_hover_bg'         => '#151515',
			'menu_dropdown_hover_font_color' => '#ffffff',

			'footer_nav_top_font_color'            => '#ffffff',
			'footer_nav_bg'                        => '#151515',
			'footer_nav_hbg'                       => '#ffffff',
			'footer_nav_ht_color'                  => '#000000',
			'footer_nav_dropdown_font_color'       => '#000000',
			'footer_nav_dropdown_hover_bg'         => '#151515',
			'footer_nav_dropdown_hover_font_color' => '#ffffff',

			'body_bg_color' => '#F5F5F5',
			'a_color'       => '#269865',
			'ah_color'      => '#777777',
			'header_color'  => '#000000',
			'body_color'    => '#000000',

			'widget_title_font_color'   => '#000000',
			'widget_content_font_color' => '#000000',
			'widget_bg_color'           => '#ffffff',

			'footer_widget_title_font_color'   => '#000000',
			'footer_widget_content_font_color' => '#000000',
			'footer_widget_bg_color'           => '#D4D4D6',

			'attire_archive_page_post_view'      => 'excerpt',
			'attire_read_more_text'              => 'Read more',
			'attire_single_post_post_navigation' => 'show',
			'attire_single_post_meta_position'   => 'after-title',

			'container_width' => '1100',

			'copyright_info_visibility'     => 'show',
			'attire_search_form_visibility' => 'show',
			'attire_back_to_top_visibility' => 'show',
			'attire_nav_behavior'           => 'sticky',

			'site_logo_height'        => '80',
			'site_logo_footer_height' => '60'
		);

		return $this->attire_defaults;
	}
} 