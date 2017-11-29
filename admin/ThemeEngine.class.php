<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once dirname( __FILE__ ) . '/Util.class.php';
require_once dirname( __FILE__ ) . '/OptionFields.class.php';


class AttireThemeEngine {

	function __construct() {
		$this->Actions();
		$this->Filters();
	}

	function Filters() {
		add_filter( 'body_class', array( $this, 'BodyClass' ), 10, 2 );
		add_filter( 'attire_layout_type', array( $this, 'PageLayout' ) );
	}

	function Actions() {
		add_action( 'admin_enqueue_scripts', array( $this, 'AdminEnqueueScripts' ) );
		add_action( 'wp_head', array( $this, 'WPHead' ) );
		add_action( 'admin_head', array( $this, 'AdminHead' ) );
		add_action( 'widgets_init', array( $this, 'InitiateWidgets' ) );
	}

	function WPHead() {
		$this->PageCSS();
		$this->CustomPageBG();
		$this->CustomPageHeader();
		$this->CustomCSS();
	}

	function AdminHead() {
		?>
        <script>var attire_theme_url = '<?php echo esc_url( ATTIRE_THEME_URL ); ?>';</script>
		<?php
	}


	function PageCSS() {
		wp_reset_query();
		global $post;

		$post_id = '';

		if ( $post ) {
			$post_id = $post->ID;
		}

		if ( ! is_front_page() && is_home() ) { // for static blog page ; meta has to be retrieved this way
			$post_id = get_option( 'page_for_posts' );
		}

		if ( ! is_404() ) {
			$data = maybe_unserialize( get_post_meta( $post_id, 'attire_post_meta', true ) );
		}


		if ( isset( $data['page_css'] ) ) {
			?>
            <!-- custom page css -->
            <style id="page_css">
                <?php echo wp_filter_nohtml_kses($data['page_css']); ?>
            </style>
            <!-- // custom page css -->
			<?php
		}

	}

	/**
	 * @usage Custom Page Background for specific pages
	 */
	function CustomPageBG() {
		global $post;
		$post_id  = '';
		$selector = '';
		if ( $post ) {
			$post_id  = $post->ID;
			$selector = 'body.page-id-' . intval( $post_id );
		}

		if ( ! is_front_page() && is_home() ) { // for static blog page ; post_id to be retrieved this way
			$post_id  = get_option( 'page_for_posts' );
			$selector = 'body.blog';

		}

		if ( ! is_404() ) {
			$data = maybe_unserialize( get_post_meta( $post_id, 'attire_post_meta', true ) );
		}

		$css = "";

		if ( isset( $data['pagebg']['image'] ) && $data['pagebg']['image'] != '' ) {
			$pbg = esc_url( $data['pagebg']['image'] );
			$css .= "background-image: url({$pbg});";
		}

		if ( isset( $data['pagebg']['color'] ) && $data['pagebg']['color'] != '' ) {
			$css .= "background-color: {$data['pagebg']['color']};";
		}
		if ( isset( $data['pagebg']['repeat'] ) && $data['pagebg']['repeat'] != '' ) {
			$css .= "background-repeat: {$data['pagebg']['repeat']};";
		}
		if ( isset( $data['pagebg']['attachment'] ) && $data['pagebg']['attachment'] != '' ) {
			$css .= "background-attachment: {$data['pagebg']['attachment']};";
		}
		if ( isset( $data['pagebg']['position_h'] ) && $data['pagebg']['position_h'] != '' ) {
			$css .= "background-position: {$data['pagebg']['position_h']} {$data['pagebg']['position_v']};";
		}
		if ( $post_id !== '' ) {
			?>
            <!-- Custom page background -->
            <style><?php echo $selector; ?>
                {
                <?php echo wp_filter_nohtml_kses($css); ?>
                }
            </style>
            <!-- / Custom page background -->
			<?php
		}
	}


	/**
	 * @usage Custom Page Header for specific pages
	 */
	function CustomPageHeader() {
		global $post;
		$post_id  = '';
		$selector = '.page_header_wrap';
		if ( $post ) {
			$post_id = $post->ID;
		}

		if ( ! is_front_page() && is_home() ) { // for static blog page ; post_id has to be retrieved this way
			$post_id = get_option( 'page_for_posts' );

		}

		if ( ! is_404() ) {
			$data = maybe_unserialize( get_post_meta( $post_id, 'attire_post_meta', true ) );
		}

		$css = "";

		if ( isset( $data['cph_image'] ) && $data['cph_image'] != '' ) {
			$pbg = esc_url( $data['cph_image'] );
			$css .= "background-image: url({$pbg});";
			$css .= "background-position: center;";
//			$css .= "background-attachment: fixed;";
			$css .= "background-repeat: no-repeat;";
		}

		if ( isset( $data['cph_bg_color'] ) && $data['cph_bg_color'] != '' ) {
			$css .= "background-color: {$data['cph_bg_color']};";
		}

		$text_color = '';
		if ( isset( $data['cph_text_color'] ) && $data['cph_text_color'] != '' ) {
			$text_color = "color:{$data['cph_text_color']};";
		}

		if ( $post_id !== '' ) {
			?>
            <!-- Custom page header -->
            <style><?php echo $selector; ?>
                {
                <?php echo wp_filter_nohtml_kses($css); ?>
                }
                <?php echo $selector.' *'; ?>
                {
                <?php echo wp_filter_nohtml_kses($text_color); ?>
                }
            </style>
            <!-- / Custom page header -->
			<?php
		}
	}


	/**
	 * @usage: Initiate Widgets
	 */
	function InitiateWidgets() {

		register_sidebar( array(
			'name'          => 'Left Sidebar',
			'id'            => 'left',
			'description'   => 'Left Sidebar',
			'before_widget' => '<div class="widget widget-default">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-heading widget-title">',
			'after_title'   => '</h4>'
		) );

		register_sidebar( array(
			'name'          => 'Right Sidebar',
			'id'            => 'right',
			'description'   => 'Right Sidebar',
			'before_widget' => '<div class="widget widget-default">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-heading widget-title">',
			'after_title'   => '</h5>'
		) );

		register_sidebar( array(
			'name'          => 'Footer1',
			'id'            => 'footer1',
			'description'   => 'Footer1',
			'before_widget' => '<div class="footer-widget  widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-heading widget-title">',
			'after_title'   => '</h5>'
		) );

		register_sidebar( array(
			'name'          => 'Footer2',
			'id'            => 'footer2',
			'description'   => 'Footer2',
			'before_widget' => '<div class="footer-widget  widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-heading widget-title">',
			'after_title'   => '</h5>'
		) );

		register_sidebar( array(
			'name'          => 'Footer3',
			'id'            => 'footer3',
			'description'   => 'Footer3',
			'before_widget' => '<div class="footer-widget  widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-heading widget-title">',
			'after_title'   => '</h5>'
		) );
		register_sidebar( array(
			'name'          => 'Footer4',
			'id'            => 'footer4',
			'description'   => 'Footer4',
			'before_widget' => '<div class="footer-widget  widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-heading widget-title">',
			'after_title'   => '</h5>'
		) );
		register_sidebar( array(
			'name'          => 'Footer5',
			'id'            => 'footer5',
			'description'   => 'Footer5',
			'before_widget' => '<div class="footer-widget  widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-heading widget-title">',
			'after_title'   => '</h5>'
		) );
	}


	function AdminEnqueueScripts( $hook ) {

		if ( ! in_array( $hook, array( 'post-new.php', 'post.php', 'profile.php', 'user-new.php' ) ) ) {
			return;
		}

		wp_enqueue_style( 'metabox', ATTIRE_TEMPLATE_URL . '/admin/css/metabox.css' );
		wp_enqueue_script( 'popper', ATTIRE_TEMPLATE_URL . '/bootstrap/js/popper.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'blockui-js', ATTIRE_TEMPLATE_URL . '/admin/js/jquery.blockUI.js', array( 'jquery' ) );
		wp_enqueue_script( 'attire-js', ATTIRE_TEMPLATE_URL . '/admin/js/attire-admin.js', array(
			'jquery',
			'blockui-js'
		) );
		wp_enqueue_script( 'bootstrap', ATTIRE_TEMPLATE_URL . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'fa', ATTIRE_TEMPLATE_URL . '/fonts/font-awesome/css/font-awesome.min.css' );
	}

	public static function Layout( $default = 'wide' ) {
		$lot = AttireThemeEngine::NextGetOption( 'main_layout_type', $default );
		echo sanitize_text_field( apply_filters( 'attire_layout_type', $lot ) );
	}

	function BodyClass( $classes, $class ) {
		if ( is_user_logged_in() ) {
			$classes[] = 'attire-logged-in';
		} else {
			$classes[] = 'attire-not-logged-in';
		}

		return $classes;
	}

	public function FontCSS() {

		$theme_mod = get_option( 'attire_options' );

		$fonts = AttireOptionFields::GetFonts();

		$css = '';

		/**
		 *
		 *  Conditional css
		 *
		 */

		$search_form_visibility = isset( $theme_mod['attire_search_form_visibility'] ) ? $theme_mod['attire_search_form_visibility'] : 'show';
		if ( $search_form_visibility === 'hide' ) {
			$css .= 'header .mainmenu > .menu-item:last-child > a{padding-right:0;}';
			$css .= 'ul.ul-search{display:none;}';
		}

		if ( isset( $theme_mod['attire_back_to_top_visibility'] ) && $theme_mod['attire_back_to_top_visibility'] !== 'show' ) {
			$css .= '.back-to-top{display:none;}';
		}

		/**
		 *
		 * Header shadow
		 *
		 */

		$css .= "header[id*=header-]{box-shadow:0 3px 10px rgba(0, 0, 0, 0.1)}";

		/**
		 *
		 * Container Width
		 *
		 */

		$container_width = $theme_mod['container_width'];
		$css             .= "@media (min-width: 1200px) {.container{max-width:{$container_width}px;}}";

		/**
		 *
		 * Body css
		 *
		 */

		$body_font_weight = intval( $theme_mod['body_font_weight'] );
		$body_font_weight = $body_font_weight != '' ? "font-weight:{$body_font_weight};" : "";
		$body_bg          = $theme_mod['body_bg_color'];
		$css              .= "body {background-color:{$body_bg}}";

		$body_font_size  = intval( $theme_mod['body_font_size'] );
		$body_font_color = $theme_mod['body_color'];
		$body_font       = sanitize_text_field( $theme_mod['body_font'] );
		$font_size       = $body_font_size != '' ? "font-size:{$body_font_size}px;" : "";
		$text_color      = $body_font_color ? "color:{$body_font_color};" : "";

		if ( $body_font != '' ) {
			$font_family = $fonts[ $body_font ]['family'] != '' ? "font-family:{$fonts[$body_font]['family']};" : "";
		} else {
			$font_family = '';
		}

		$css .= ".attire-post-and-comments,.attire-post-and-comments p,.attire-post-and-comments article,.attire-post-and-comments ul,.attire-post-and-comments ol, .attire-post-and-comments table, .attire-post-and-comments blockquote, .attire-post-and-comments pre {{$font_family}{$font_size}{$body_font_weight}{$text_color}}";
		$css .= ".site-description,.copyright-text{{$font_family}}";


		/**
		 *
		 * Headings css
		 *
		 */
		$heading_font_weight = intval( $theme_mod['heading_font_weight'] );
		$heading_font_weight = $heading_font_weight != '' ? "font-weight:{$heading_font_weight};" : "";
		$heading_font_size   = intval( $theme_mod['heading_font_size'] );
		$header_color        = $theme_mod['header_color'];
		$heading_font        = sanitize_text_field( $theme_mod['heading_font'] );
		$h1_font_size        = 'font-size:' . $heading_font_size . 'px;';
		$h2_font_size        = 'font-size:' . ceil( $heading_font_size * .75 ) . 'px;';
		$h3_font_size        = 'font-size:' . ceil( $heading_font_size * .6 ) . 'px;';
		$h4_font_size        = 'font-size:' . ceil( $heading_font_size * .56 ) . 'px;';
		$h5_font_size        = 'font-size:' . ceil( $heading_font_size * .415 ) . 'px;';
		$h6_font_size        = 'font-size:' . ceil( $heading_font_size * .375 ) . 'px;';

		$text_color = $header_color ? "color:{$header_color};" : "";

		if ( $heading_font != '' ) {
			$font_family = $fonts[ $heading_font ]['family'] != '' ? "font-family:{$fonts[$heading_font]['family']};" : "";
		} else {
			$font_family = '';
		}

		$css .= "h1, h1 *{{$font_family}{$h1_font_size}{$heading_font_weight}{$text_color}}";
		$css .= "h2, h2 *{{$font_family}{$h2_font_size}{$heading_font_weight}{$text_color}}";
		$css .= "h3, h3 *{{$font_family}{$h3_font_size}{$heading_font_weight}{$text_color}}";
		$css .= "h4, h4 *{{$font_family}{$h4_font_size}{$heading_font_weight}{$text_color}}";
		$css .= "h5, h5 *{{$font_family}{$h5_font_size}{$heading_font_weight}{$text_color}}";
		$css .= "h6, h6 *{{$font_family}{$h6_font_size}{$heading_font_weight}{$text_color}}";
		$css .= ".footer-logo, .navbar-brand{{$font_family}{$h1_font_size}}";

		/**
		 *
		 * Site title/description css
		 *
		 */

		$body_font_weight    = intval( $theme_mod['body_font_weight'] );
		$body_font_weight    = $body_font_weight != '' ? "font-weight:{$body_font_weight};" : "";
		$heading_font_weight = intval( $theme_mod['heading_font_weight'] );
		$heading_font_weight = $heading_font_weight != '' ? "font-weight:{$heading_font_weight};" : "";

		$site_title_text_color        = 'color:' . $theme_mod['site_title_text_color'];
		$site_footer_title_text_color = 'color:' . $theme_mod['site_footer_title_text_color'];
		$site_description_text_color  = 'color:' . $theme_mod['site_description_text_color'];

		$css .= ".navbar-light .navbar-brand,.navbar-dark .navbar-brand,.logo-header .site-logo{{$heading_font_weight}{$site_title_text_color}}";
		$css .= ".footer-logo{{$heading_font_weight}{$site_footer_title_text_color}}";
		$css .= ".logo-header .site-logo:hover,.footer-logo:hover{{$site_title_text_color}}";
		$css .= ".site-description,.copyright-text{{$body_font_weight}{$site_description_text_color}}";
		$css .= ".social-link i,.info-link > li > span{{$site_description_text_color}}";


		/**
		 *
		 * Site header/footer bg css
		 *
		 */

		$site_header_bg = 'background-color:' . $theme_mod['site_header_bg_color'];
		$css            .= ".header-div{ {$site_header_bg}}";
		$css            .= ".sticky-menu{ {$site_header_bg}}";
		$site_footer_bg = 'background-color:' . $theme_mod['site_footer_bg_color'];
		$css            .= ".footer-div{ {$site_footer_bg}}";


		/**
		 *
		 * Sidebar/Footer Widget Content css
		 *
		 */

		$font_size                  = intval( $theme_mod['widget_content_font_size'] );
		$widget_content_font_weight = intval( $theme_mod['widget_content_font_weight'] );
		$font_weight                = $widget_content_font_weight != '' ? "font-weight:{$widget_content_font_weight};" : "";
		$font                       = sanitize_text_field( $theme_mod['widget_content_font'] );
		$color                      = "color:" . $theme_mod['widget_content_font_color'];
		$font_size                  = $font_size != '' ? "font-size:{$font_size}px;" : "";

		if ( $font != '' ) {
			$font_family = $fonts[ $font ]['family'] != '' ? "font-family:{$fonts[$font]['family']};" : "";
		} else {
			$font_family = '';
		}

		$css .= ".widget, .widget li, .widget p {{$font_family}{$font_size}{$font_weight}}";
		$css .= ".attire-content .widget, .attire-content .widget li, .attire-content  .widget p {{$color}}";


		/**
		 *
		 * Sidebar/Footer Widget title css
		 *
		 */

		$widget_title_font_weight = intval( $theme_mod['widget_title_font_weight'] );
		$font_size                = intval( $theme_mod['widget_title_font_size'] );
		$font_weight              = $widget_title_font_weight != '' ? "font-weight:{$widget_title_font_weight};" : "";
		$font                     = sanitize_text_field( $theme_mod['widget_title_font'] );
		$color                    = "color:" . $theme_mod['widget_title_font_color'];

		if ( $font != '' ) {
			$font_family = $fonts[ $font ]['family'] != '' ? "font-family:{$fonts[$font]['family']};" : "";
		} else {
			$font_family = '';
		}

		$font_size = $font_size != '' ? "font-size:{$font_size}px;" : "";
		$css       .= ".widget .widget-title {{$font_family}{$font_size}{$font_weight}}";
		$css       .= ".attire-content .widget .widget-title {{$color}}";


		/**
		 *
		 * Main nav / Footer nav font face
		 *
		 */

		$font                 = sanitize_text_field( $theme_mod['menu_top_font'] );
		$font_size            = intval( $theme_mod['menu_top_font_size'] );
		$menu_top_font_weight = intval( $theme_mod['menu_top_font_weight'] );
		$font_weight          = $menu_top_font_weight != '' ? "font-weight:{$menu_top_font_weight};" : "";
		$font_size            = $font_size != '' ? "font-size:{$font_size}px;" : "";

		if ( $font != '' ) {
			$font_family = $fonts[ $font ]['family'] != '' ? "font-family:{$fonts[$font]['family']};" : "";
		} else {
			$font_family = '';
		}

		$css .= "header .mainmenu > .menu-item a,footer .footermenu > .menu-item a{{$font_family}{$font_size}{$font_weight}}";

		/**
		 *
		 * Main nav / Footer nav dropdown font face
		 *
		 */
		$menu_dropdown_font_weight = intval( $theme_mod['menu_dropdown_font_weight'] );
		$font_size                 = intval( $theme_mod['menu_dropdown_font_size'] );
		$font_weight               = $menu_dropdown_font_weight != '' ? "font-weight:{$menu_dropdown_font_weight};" : "";
		$font                      = sanitize_text_field( $theme_mod['menu_dropdown_font'] );
		$font_size                 = $font_size != '' ? "font-size:{$font_size}px;" : "";

		if ( $font != '' ) {
			$font_family = $fonts[ $font ]['family'] != '' ? "font-family:{$fonts[$font]['family']};" : "";
		} else {
			$font_family = '';
		}

		$css .= "header .dropdown ul li a.dropdown-item, footer .dropdown ul li a.dropdown-item{{$font_family}{$font_size}{$font_weight}}";

		/**
		 *
		 * Main nav color css
		 *
		 */

		$color = "color:{$theme_mod['menu_top_font_color']};";
		$css   .= "header .mainmenu > .menu-item:not(.active) > a, header .nav i.fa.fa-search, header .dropdown-toggler, header .mobile-menu-toggle{{$color}}";

		$main_nav_bg = 'background-color:' . $theme_mod['main_nav_bg'];
		$css         .= ".short-nav .collapse.navbar-collapse,.long-nav{ {$main_nav_bg};}";

		$main_nav_hover_active_bg = 'background-color:' . $theme_mod['menuhbg_color'];
		$css                      .= "header .mainmenu > .menu-item:hover, header .mainmenu > .menu-item.active{ {$main_nav_hover_active_bg};}";


		$main_nav_hover_active_text_color = 'color:' . $theme_mod['menuht_color'];
		$css                              .= "header .mainmenu > .menu-item:hover > a, header .mainmenu > .menu-item.active > a, header .mainmenu > .menu-item:hover > .dropdown-toggler, header .mainmenu > .menu-item.active > .dropdown-toggler,#search-top:hover i{ {$main_nav_hover_active_text_color};}";


		/**
		 *
		 * Main nav dropdown color css
		 *
		 */

		$main_nav_dd_bg = 'background-color:' . $theme_mod['menuhbg_color'];
		$css            .= "header .mainmenu > .dropdown > li, .default-menu.navbar-light .nav-search .form-control{{$main_nav_dd_bg};}"; // Search box bg color + main nav dd bg

		$main_nav_dd_text = 'color:' . $theme_mod['menu_dropdown_font_color'];
		$css              .= "header .mainmenu > .dropdown li *, .default-menu.navbar-light .nav-search .form-control{{$main_nav_dd_text};}"; // Dropdown + search field input text color

		$css                  .= '@media (min-width: 1000px) {';
		$main_nav_dd_hover_bg = 'background-color:' . $theme_mod['menu_dropdown_hover_bg'];
		$css                  .= "header .mainmenu > .dropdown li:hover{{$main_nav_dd_hover_bg};}";

		$main_nav_dd_hover_text = 'color:' . $theme_mod['menu_dropdown_hover_font_color'];
		$css                    .= "header .mainmenu > .dropdown li:hover > *{{$main_nav_dd_hover_text};}";
		$css                    .= '}';


		/**
		 *
		 * Footer nav color css
		 *
		 */

		$color = "color:" . $theme_mod['footer_nav_top_font_color'] . ";";
		$css   .= "footer .footermenu > .menu-item:not(.active) > a, footer .dropdown-toggler{{$color}}";

		$footer_nav_bg = 'background-color:' . $theme_mod['footer_nav_bg'];
		$css           .= "footer .footermenu { {$footer_nav_bg};}";

		$footer_nav_hover_active_bg = 'background-color:' . $theme_mod['footer_nav_hbg'];
		$css                        .= "footer .footermenu > .menu-item:hover,footer .footermenu > .menu-item.active{{$footer_nav_hover_active_bg};}";

		$footer_nav_hover_active_text = 'color:' . $theme_mod['footer_nav_ht_color'];
		$css                          .= "footer .footermenu > .menu-item:hover > a,footer .footermenu > .menu-item.active > a, footer .footermenu > .menu-item:hover > .dropdown-toggler,footer .footermenu > .menu-item.active > .dropdown-toggler{{$footer_nav_hover_active_text};}";


		/**
		 *
		 * Footer nav dropdown color css
		 *
		 */

		$footer_nav_dd_bg = 'background-color:' . $theme_mod['footer_nav_hbg'];
		$css              .= "footer .footermenu .dropdown li{ {$footer_nav_dd_bg};}";

		$footer_dropdown_font_color = "color:" . $theme_mod['footer_nav_dropdown_font_color'] . ";";
		$css                        .= "footer .footermenu .dropdown li *{{$footer_dropdown_font_color}}";

		$footer_nav_dd_hover_bg = 'background-color:' . $theme_mod['footer_nav_dropdown_hover_bg'];
		$css                    .= "footer .footermenu > .dropdown li:hover{ {$footer_nav_dd_hover_bg};}";

		$footer_nav_dd_hover_text = 'color:' . $theme_mod['footer_nav_dropdown_hover_font_color'];
		$css                      .= "footer .footermenu > .dropdown li:hover *{{$footer_nav_dd_hover_text};}";


		/**
		 *
		 * Footer widget css
		 *
		 */

		$css .= ".footer-widgets-area {background-color : " . $theme_mod['footer_widget_bg_color'] . "}";
		$css .= ".footer-widgets .widget-title, .footer-widgets-area .widget-heading {color : " . $theme_mod['footer_widget_title_font_color'] . "}";
		$css .= ".footer-widgets .widget *:not(.widget-title){color : " . $theme_mod['footer_widget_content_font_color'] . "}";

		/**
		 *
		 * Link (<a>) color
		 *
		 */
		$a_color = 'color:' . $theme_mod['a_color'];
		$css     .= ".attire-content a,.small-menu a{{$a_color};}";

		$a_hover_color = 'color:' . $theme_mod['ah_color'];
		$css           .= ".attire-content a:hover,.small-menu a:hover{{$a_hover_color};}";

		return apply_filters( ATTIRE_THEME_PREFIX . 'customisation_css', $css );
	}

	/**
	 * @usage Generate custom css
	 */
	function CustomCSS() {
		// Custom CSS ( From Customizer Custom CSS )
		$attire_custom_css = wp_filter_nohtml_kses( AttireThemeEngine::NextGetOption( 'custom_css' ) );
		$attire_custom_css = stripslashes( $attire_custom_css );
		$font_css         = self::FontCSS();
		echo "<style type='text/css'> {$attire_custom_css}{$font_css}</style>";

	}

	public static function AsinsioBodySchema() {

		$blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

		$itemtype = 'WebPage';

		$itemtype = ( $blog ) ? 'Blog' : $itemtype;

		$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;

		$result = apply_filters( 'attire_body_itemtype', $itemtype );

		echo "itemtype='http://schema.org/$result' itemscope='itemscope'";
	}

	public static function NextGetOption( $index = null, $default = null ) {
		global $attire_options;

		$attire_options = get_option( 'attire_options' );
		if ( ! empty( $attire_options[ $index ] ) ) {
			return $attire_options[ $index ];
		} else {
			return $default;
		}
	}


	public static function SiteLogo() {
		$logourl = esc_url( self::NextGetOption( 'site_logo' ) );

		if ( $logourl ) {
			return "<img src='{$logourl}' title='" . get_bloginfo( 'name' ) . "' alt='" . get_bloginfo( 'name' ) . "' />";
		} else {
			return get_bloginfo( 'name' );
		}
	}

	public static function FooterLogo() {
		$logourl = esc_url( self::NextGetOption( 'site_logo_footer' ) );

		if ( $logourl ) {
			return "<img src='{$logourl}' title='" . get_bloginfo( 'sitename' ) . "' alt='" . get_bloginfo( 'sitename' ) . "' />";
		} else {
			return get_bloginfo( 'sitename' );
		}
	}


	function PageLayout( $type ) {
		global $post;
		$data = maybe_unserialize( get_post_meta( $post->ID, 'attire_post_meta', true ) );

		if ( is_page() && $post->ID != '' && isset( $data['pagelayout'] ) && $data['pagelayout'] != '' ) {
			$type = sanitize_text_field( $data['pagelayout'] );
		}

		return $type;
	}


	public static function HeaderStyle() {


		$style = '';
		if ( is_page() || is_single() ) {
			$attire_post_meta = get_post_meta( get_the_ID(), 'attire_post_meta', true );
			$style           = isset( $attire_post_meta['nav_header'] ) ? sanitize_text_field( $attire_post_meta['nav_header'] ) : '';
		}

		if ( ! isset( $style ) || $style == '' ) {
			$style = sanitize_text_field( self::NextGetOption( 'nav_header', 'header-1' ) );
		}

		if ( ! locate_template( "templates/headers/" . $style . ".php" ) ) {
			$style = 'header-1';
		}
		load_template( locate_template( "templates/headers/" . $style . ".php" ) );
		wp_reset_query();

	}


	public static function FooterStyle() {


		$style = '';
		if ( is_page() || is_single() ) {
			$attire_post_meta = get_post_meta( get_the_ID(), 'attire_post_meta', true );
			$style           = isset( $attire_post_meta['footer_style'] ) ? sanitize_text_field( $attire_post_meta['footer_style'] ) : '';
		}

		if ( ! isset( $style ) || $style == '' ) {
			$style = sanitize_text_field( self::NextGetOption( 'footer_style', 'footer4' ) );
		}

		if ( ! locate_template( "templates/footers/" . $style . ".php" ) ) {
			$style = 'footer4';
		}
		load_template( locate_template( "templates/footers/" . $style . ".php" ) );
		wp_reset_query();
	}

}

new AttireThemeEngine();
 

