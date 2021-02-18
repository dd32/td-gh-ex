<?php
/**
 * Add inline css 
 *
 * 
 */
if ( ! function_exists( 'beshop_inline_css' ) ) :
function beshop_inline_css() {

  $style = '';

// font settings
  $beshop_topbar_bg = get_theme_mod( 'beshop_topbar_bg', '#343a40' );
  $beshop_topbar_color = get_theme_mod( 'beshop_topbar_color', '#fff' );
  $beshop_topbar_hcolor = get_theme_mod( 'beshop_topbar_hcolor', '#dedede' );
 
  if( $beshop_topbar_bg != '#343a40' ){
    $style .='.beshop-tophead.bg-dark{background-color:'.$beshop_topbar_bg.'!important;}';
  }
  if( $beshop_topbar_color != '#fff' ){
    $style .='.beshop-tophead, .beshop-tophead a, .beshop-tophead span, .beshop-tophead input{color:'.$beshop_topbar_color.';}';
  }
  if( $beshop_topbar_hcolor != '#dedede' ){
    $style .='.beshop-tophead a:hover{color:'.$beshop_topbar_hcolor.';}';
  }

// image logo width height
$beshop_logo_width = get_theme_mod( 'beshop_logo_width' );
$beshop_logo_height = get_theme_mod( 'beshop_logo_height' );
  if( $beshop_logo_width ){
      $style .='.site-branding.has-himg a img{width:'.$beshop_logo_width.'px;}';
    }
  if( $beshop_logo_height ){
      $style .='.site-branding.has-himg a img{height:'.$beshop_logo_height.'px;}';
    }
 
// title and tagline font size
$beshop_hmiddle_height = get_theme_mod( 'beshop_hmiddle_height' );
$beshop_logo_fontsize = get_theme_mod( 'beshop_logo_fontsize' );
$beshop_desc_fontsize = get_theme_mod( 'beshop_desc_fontsize' );
  if( $beshop_hmiddle_height ){
      $style .='.site-branding, .beshop-header-img img{height:'.$beshop_hmiddle_height.'px !important;}';
    }
  if( $beshop_logo_fontsize ){
      $style .='h1.site-title a{font-size:'.$beshop_logo_fontsize.'px;}';
    }
  if( $beshop_desc_fontsize ){
      $style .='p.site-description{font-size:'.$beshop_desc_fontsize.'px;}';
    }
$beshop_menu_position = get_theme_mod( 'beshop_menu_position' );
if( $beshop_menu_position ){
      $style .='.main-navigation ul{justify-content:'.$beshop_menu_position.';}';
    }
$beshop_menu_tbpadding = get_theme_mod( 'beshop_menu_tbpadding' );
if( $beshop_menu_tbpadding ){
      $style .='.beshop-main-nav{padding:'.$beshop_menu_tbpadding.'px 0;}';
    }
$beshop_menu_fontsize = get_theme_mod( 'beshop_menu_fontsize' );
if( $beshop_menu_fontsize ){
      $style .='.beshop-main-nav ul li a{font-size:'.$beshop_menu_fontsize.'px;}';
    }
$beshop_menubg_color = get_theme_mod( 'beshop_menubg_color' );
if( $beshop_menubg_color ){
      $style .='.beshop-main-nav.bg-dark{background:'.$beshop_menubg_color.'  !important;}';
      $style .='.beshop-main-nav ul li a{border-color:'.$beshop_menubg_color.'  !important;}';
    }
$beshop_menudropbg_color = get_theme_mod( 'beshop_menudropbg_color' );
if( $beshop_menudropbg_color ){
      $style .='.main-navigation ul ul{background:'.$beshop_menudropbg_color.'  !important;}';
    }
$beshop_menu_color = get_theme_mod( 'beshop_menu_color' );
if( $beshop_menu_color ){
      $style .='.beshop-main-nav ul li a,.mini-toggle, .main-navigation .page_item_has_children:before, .main-navigation .menu-item-has-children:before{color:'.$beshop_menu_color.'  !important;}';
    }

//color section style
$beshop_header_color = get_theme_mod( 'beshop_header_color' );
if( $beshop_header_color ){
      $style .='h1,h2,h3,h4,h5,h6, h2.entry-title a, h2.entry-title{color:'.$beshop_header_color.';}';
    }
$beshop_bodyfont_color = get_theme_mod( 'beshop_bodyfont_color' );
if( $beshop_bodyfont_color ){
      $style .='body,body p{color:'.$beshop_bodyfont_color.';}';
    }
$beshop_contentbg_color = get_theme_mod( 'beshop_contentbg_color' );
if( $beshop_contentbg_color ){
      $style .='.beshop-btext, .widget-area .widget, .site-footer, .archive-header, .search-header, .beshop-page, .site-main .comment-navigation, .site-main .posts-navigation, .site-main .post-navigation, .site-footer, .bshop-blog-list, .bshop-single-list, .comments-area,.bshop-simple-list.hasimg{background-color:'.$beshop_contentbg_color.';}';
    }
$beshop_basic_color = get_theme_mod( 'beshop_basic_color' );
if( $beshop_basic_color ){
      $style .='.entry-footer,h3.widget-title, h2.widget-title,.site-footer, .site-main .comment-navigation, .site-main .posts-navigation, .site-main .post-navigation,span.count.cart-contents,.widget .search-form input.search-submit:hover{background-color:'.$beshop_basic_color.';}';
      $style .='.entry-meta, .entry-meta a,widget .search-form input.search-submit{color:'.$beshop_basic_color.';}';
      $style .='.widget .search-form input.search-submit{border-color:'.$beshop_basic_color.';}';
    }
$beshop_link_color = get_theme_mod( 'beshop_link_color' );
if( $beshop_link_color ){
      $style .='a{color:'.$beshop_link_color.';}';
    }
$beshop_linkhvr_color = get_theme_mod( 'beshop_linkhvr_color' );
if( $beshop_linkhvr_color ){
      $style .='a:hover,a:visited{color:'.$beshop_linkhvr_color.';}';
    }
$beshop_topfooter_bgcolor = get_theme_mod( 'beshop_topfooter_bgcolor' );
if( $beshop_topfooter_bgcolor ){
      $style .='.footer-top.bg-dark{background:'.$beshop_topfooter_bgcolor.'  !important;}';
    }
$beshop_tftitle_color = get_theme_mod( 'beshop_tftitle_color' );
if( $beshop_tftitle_color ){
      $style .='.footer-widget .widget-title{color:'.$beshop_tftitle_color.'  !important;}';
    }
$beshop_tftext_color = get_theme_mod( 'beshop_tftext_color' );
if( $beshop_tftext_color ){
      $style .='.footer-widget, .footer-widget p, .footer-widget a, .footer-widget #wp-calendar caption, .footer-widget .search-form input.search-submit{color:'.$beshop_tftext_color.'  !important;}';
    }
$beshop_tflink_hovercolor = get_theme_mod( 'beshop_tflink_hovercolor' );
if( $beshop_tflink_hovercolor ){
      $style .='.footer-widget a:hover{color:'.$beshop_tflink_hovercolor.'  !important;}';
    }
$beshop_footer_bgcolor = get_theme_mod( 'beshop_footer_bgcolor' );
if( $beshop_footer_bgcolor ){
      $style .='footer.site-footer{background:'.$beshop_footer_bgcolor.'  !important;}';
    }
$beshop_footer_color = get_theme_mod( 'beshop_footer_color' );
if( $beshop_footer_color ){
      $style .='footer.site-footer,footer.site-footer a,footer.site-footer p{color:'.$beshop_footer_color.'  !important;}';
    }
$beshop_footerlink_hcolor = get_theme_mod( 'beshop_footerlink_hcolor' );
if( $beshop_footerlink_hcolor ){
      $style .='footer.site-footer a:hover,footer.site-footer a:focus{color:'.$beshop_footerlink_hcolor.'  !important;}';
    }
  


        wp_add_inline_style( 'beshop-main', $style );
}
add_action( 'wp_enqueue_scripts', 'beshop_inline_css' );
endif;
