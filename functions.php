<?php 
/**
 * Register Google Fonts
 */
function arrival_store_fonts_url() {
    $fonts_url = '';

    $rubik      = esc_html_x( 'on', 'Rubik font: on or off', 'arrival-store' );
    $poppins    = esc_html_x( 'on', 'Poppins font: on or off', 'arrival-store' );

    $font_families = array();

    if ( 'off' !== $rubik ) {
        $font_families[] = 'Rubik:400,500,700&display=swap';
    }
    
    if ( 'off' !== $poppins ) {
        $font_families[] = 'Poppins:300,400,500,600,700&display=swap';
    }

    if ( in_array( 'on', array(  $poppins,$rubik ) ) ) {
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );

}


add_action( 'wp_enqueue_scripts', 'arrival_store_scripts' );
function arrival_store_scripts() {

    $themeVersion = wp_get_theme()->get('Version');
    wp_enqueue_style('arrival-store-styles', get_template_directory_uri() . '/style.css',array(), $themeVersion);
    wp_enqueue_style( 'arrival-store-fonts', arrival_store_fonts_url(), array(), null );
    
    wp_enqueue_script( 'arrival-store-custom', get_theme_file_uri( '/assets/js/custom.js' ), array('jquery'), ARRIVAL_VER, false );

}


/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
add_filter('arrival_filter_default_theme_options','arrival_store_get_default_theme_options');

function arrival_store_get_default_theme_options() {
    $prefix = 'arrival';
    $defaults = array();
    
    $defaults[$prefix.'_top_header_enable']                 = 'on';
    $defaults[$prefix.'_top_header_email']                  = '';
    $defaults[$prefix.'_top_header_phone']                  = '';
    $defaults[$prefix.'_top_right_header_content']          = 'menus';
    $defaults[$prefix.'_blog_layout']                       = 'list-layout';
    $defaults[$prefix.'_top_right_header_menus']            = 'top';
    $defaults[$prefix.'_main_nav_layout']                   = 'full';
    $defaults[$prefix.'_main_nav_right_content']            = 'none';
    $defaults[$prefix.'_main_nav_right_btn_txt']            = esc_html('Contact Us','arrival-store');
    $defaults[$prefix.'_main_nav_right_btn_url']            = '#';
    $defaults[$prefix.'_page_header_layout']                = 'default';
    $defaults[$prefix.'_menu_hover_styles']                 = 'hover-layout-one';
    $defaults[$prefix.'_one_page_menus']                    = 'no';
    $defaults[$prefix.'_footer_widget_enable']              = 'yes';
    $defaults[$prefix.'_footer_icons_enable']               = 'yes';
    $defaults[$prefix.'_lazyload_image_enable']             = 'yes';
    $defaults[$prefix.'_smooth_scroll_enable']              = 'no';
    $defaults[$prefix.'_top_header_bg_color']               = '#fcb700';
    $defaults[$prefix.'_main_nav_bg_color']                 = '#fcb700';
    $defaults[$prefix.'_footer_bg_color']                   = '#223645';
    $defaults[$prefix.'_footer_text_color']                 = '#fff';
    $defaults[$prefix.'_footer_link_color']                 = '#fff';
    $defaults[$prefix.'_footer_copyright_border_top']       = true;
    $defaults[$prefix.'_breadcrumb_overlay_disable']        = true;
    $defaults[$prefix.'_main_nav_menu_color']               = '#685217';
    $defaults[$prefix.'_link_color']                        = '#333';
    $defaults[$prefix.'_main_container_width']              = 1400;
    $defaults[$prefix.'_inner_header_image_padding_btm']    = 32;
    $defaults[$prefix.'_inner_header_img_position']         = 'initial';
    $defaults[$prefix.'_sidebar_width']                     = 440;
    $defaults[$prefix.'_header_box_shadow_disable']         = true;
    $defaults[$prefix.'_blog_excerpts']                     = 580;
    $defaults[$prefix.'_single_post_sidebars']              = 'no_sidebar';
    $defaults[$prefix.'_nav_font_weight']                   = 500;
    $defaults[$prefix.'_top_header_txt_color']              = '#6b5316';
    $defaults[$prefix.'_theme_color']                       = '#fcb700';
    $defaults[$prefix.'_top_left_content_type']             = 'text';
    $defaults[$prefix.'_top_header_txt']                    = '';
    $defaults[$prefix.'_main_nav_menu_align']               = 'default';
    $defaults[$prefix.'_main_nav_last_item_align']          = 'left';
    $defaults[$prefix.'_after_top_header_enable']           = 'yes';
    $defaults[$prefix.'_main_nav_disable_logo']             = 'no';
    $defaults[$prefix.'_after_top_header_height']           = 150;
    $defaults[$prefix.'_after_top_hdr_top_padding']         = 30;
    $defaults[$prefix.'_after_top_hdr_btm_padding']         = 75;
    $defaults[$prefix.'_after_top_header_top_border_show']  = false;
    $defaults[$prefix.'_after_top_header_align_center']     = false;
    $defaults[$prefix.'_after_top_header_bg_color']         = '#fcb700';
    $defaults[$prefix.'_after_top_header_txt_color']        = '#333';
    $defaults[$prefix.'_after_top_header_border_color']     = '#f1f1f1';
    $defaults[$prefix.'_after_top_header_icon_color']       = '#333';
    $defaults[$prefix.'_cart_display_position']             = 'top';
    $defaults[$prefix.'_site_header_type']                  = 'default';
    $defaults[$prefix.'_site_header_custom_template']       = 0;
    $defaults[$prefix.'_site_footer_type']                  = 'default';
    $defaults[$prefix.'_site_footer_custom_template']       = 0;
    $defaults[$prefix.'_nav_header_padding']                = 0;
    $defaults[$prefix.'_transparent_header_enable']         = false;
    $defaults[$prefix.'_social_icons_new_tab']              = false;
    $defaults[$prefix.'_breadcrumb_enable']                 = 'yes';
    
    $defaults[$prefix.'_main_logo_width']                   = 100;
    $defaults[$prefix.'_single_page_sidebars']              = 'no_sidebar';
    $defaults[$prefix.'_post_featured_image_enable']        = 'yes';
    $defaults[$prefix.'_blog_page_sidebars']                = 'no_sidebar';
    $defaults[$prefix.'_post_meta_enable']                  = 'yes';
    $defaults[$prefix.'_post_author_enable']                = 'yes';
    $defaults[$prefix.'_post_date_enable']                  = 'yes';
    $defaults[$prefix.'_post_comment_enable']               = 'yes';

if( class_exists('woocommerce')):
    $defaults[$prefix.'_archive_shop_sidebars']             = 'no_sidebar';
    $defaults[$prefix.'_single_shop_sidebars']              = 'no_sidebar';
endif;
    
    $defaults['arrival_store_middle_header_phone']          = '';
    $defaults['arrival_store_top_header_bg']                = '#000';
    $defaults['arrival_store_top_header_text_color']        = '#fff';
    $defaults['arrival_store_middle_header_bg']             = '#fff';
    $defaults['arrival_store_middle_header_text']           = '#333';
    $defaults['arrival_store_main_header_bg']               = '#fcb700';
    $defaults['arrival_store_main_header_text']             = '#222';


    

    return $defaults;

}


/**
* Remove action defined on parent theme
*
*/
add_action('init','arrival_store_actions');
if( ! function_exists('arrival_store_actions')){
    function arrival_store_actions(){

        remove_action('arrival_after_top_header_content','arrival_after_top_header',5);
        remove_action('arrival_header_cart_disp','arrival_header_cart_disp');  
        remove_action( 'arrival_main_nav','arrival_site_logo',5 );
        remove_action('arrival_cart_icon_disp','arrival_cart_icon_disp');
        remove_action('arrival_mob_nav','arrival_mob_nav');
    }
}

/**
* After top header display function
*
*/
add_action('arrival_after_top_header_content','arrival_store_after_top_header',10);
if(! function_exists('arrival_store_after_top_header')){
    function arrival_store_after_top_header(){

        $default                            = arrival_store_get_default_theme_options();
        $_after_top_header_enable           = get_theme_mod('arrival_after_top_header_enable',$default['arrival_after_top_header_enable']);
        $arrival_store_middle_header_phone  = get_theme_mod('arrival_store_middle_header_phone',$default['arrival_store_middle_header_phone']);
        
        if( 'no' == $_after_top_header_enable ){
            return;
        }

        ?>
        <div class="after-top-header-wrapp">
            <div class="container">
                <?php 
                    /**
                    * function defined on parent theme
                    */ 
                    if( function_exists('arrival_site_logo') ){
                        arrival_site_logo();
                    }
                ?>

                <?php if( $arrival_store_middle_header_phone ): ?>

                    <div class="phone-wrapp">
                        <div class="icon-wrapp">
                            <?php 
                            /**
                            * SVG icon function defined on parent theme
                            */
                            echo arrival_get_icon_svg('headset');
                            ?>
                        </div>
                        <div class="content-wrapp">
                            <div class="title"><?php esc_html_e('Hotline Free:','arrival-store'); ?></div>
                            <div class="phone"><?php echo esc_html($arrival_store_middle_header_phone); ?></div>
                        </div>
                    </div>
                
                <?php endif; ?>

                <div class="product-search">
                    <?php echo  arrival_store_product_search(); ?>
                </div>

                <?php do_action('arrival_store_middle_icons'); ?>

            </div>
        </div>
        <?php 
    }
}


/**
* Advance WooCommerce Product Search With Category
*
*/
if(!function_exists ('arrival_store_product_search')){
    
    function arrival_store_product_search(){
        if( ! class_exists('WooCommerce')){
            return;
        }    

        $args = array(
            'number'     => '',
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => true
        );
        $product_categories = get_terms( 'product_cat', $args ); 
        $categories_show    = '<option value="0">'.esc_html__('All Categories','arrival-store').'</option>';
        $check = '';
        if(is_search()){
            if(isset($_GET['term']) && $_GET['term']!=''){
                $check = $_GET['term']; 
            }
        }
        $checked = '';
        $allcat = esc_html__('All Categories','arrival-store');
        $categories_show .= '<optgroup class="fs-advance-search" label="'.esc_attr($allcat).'">';
        foreach($product_categories as $category){
            if(isset($category->slug)){
                if(trim($category->slug) == trim($check)){
                    $checked = 'selected="selected"';
                }
                $categories_show  .= '<option '.$checked.' value="'.esc_attr($category->slug).'">'.esc_html($category->name).'</option>';
                $checked = '';
            }
        }
        $categories_show .= '</optgroup>';
        $form = '<form role="search" method="get" id="searchform"  action="' . esc_url( home_url( '/'  ) ) . '">
                     <div class="op_search_wrap">
                        <select class="op_search_product false" name="term">'.$categories_show.'</select>
                     </div>
                     <div class="op_search_form">
                         <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' .esc_attr__('search entire store here','arrival-store'). '" autocomplete="off"/>
                         <button type="submit" id="searchsubmit">'.esc_html__('Search','arrival-store').'</button>
                         <input type="hidden" name="post_type" value="product" />
                         <input type="hidden" name="taxonomy" value="product_cat" />
                     </div>
                </form>';           
        return $form;
         
    }
}

/**
* cart icon
*/
add_action('arrival_cart_icon_disp','arrival_store_cart_icon');
    if(! function_exists('arrival_store_cart_icon') ){
        
        function arrival_store_cart_icon(){

            echo arrival_get_icon_svg('cart_v2');
    }
}

/**
* Header cart text
*/
add_action('arrival_header_cart_text','arrival_store_cart_text');
if( ! function_exists('arrival_store_cart_text') ){
    function arrival_store_cart_text(){
    ?>
        <div class="text">
            <?php esc_html_e('My Cart','arrival-store'); ?>
        </div>
    <?php
    }
}

/**
* header cart
*
*/
function arrival_store_header_cart_disp(){
    
    if( class_exists('woocommerce') ) { ?>
        <div class="cart-wrapper"><?php arrival_header_cart(); ?></div>
    <?php }
}

/**
* Compare icon for header
*/
if( ! function_exists('arrival_store_header_compare')){
    function arrival_store_header_compare(){

        if(  ! defined( 'YITH_WOOCOMPARE' ) ){
            return;
        }

        global $yith_woocompare;


        $fs_yith_count = $yith_woocompare->obj->products_list;
        $fs_yith_count = count($fs_yith_count);

        ?>
        <div class="fs-compare-wrapper fs-icon-header">
            <span class="compare-btn">
                <a class="yith-contents yith-woocompare-open" href="#" title="<?php esc_attr_e('My Compare','arrival-store')?>">
                    <?php echo arrival_get_icon_svg('stack'); ?>
                    <span id="fs-compare-count">
                        <?php echo absint($fs_yith_count); ?>
                    </span>
                </a>
                <span class="text"><?php esc_html_e('Compare','arrival-store'); ?></span>
            </span>
        </div>
<?php
    }
}

/**
* Wishlist icon 
*/
if( ! function_exists('arrival_store_header_wishlist') ){
    function arrival_store_header_wishlist(){

        if( ! function_exists( 'YITH_WCWL' ) ){
            return;
        }

        $wishlist_count = YITH_WCWL()->count_products();
        ?>
        <div class="fs-wishlist-wrap fs-icon-header">
            <a href="<?php echo esc_url(home_url('/')).'/wishlist'; ?>" title="<?php esc_attr_e('My Wishlist','arrival-store'); ?>">
                <?php echo arrival_get_icon_svg('star'); ?>
                <span class="wishlist-counter">
                    <?php echo absint($wishlist_count); ?>
                </span>
            </a>
            <div class="text"><?php esc_html_e('Wishlist','arrival-store'); ?></div>
        </div>
<?php 
    }
}

/**
* Middle header icons
*
*/
add_action('arrival_store_middle_icons','arrival_store_middle_icons');
if( ! function_exists('arrival_store_middle_icons')){
    function arrival_store_middle_icons(){
    ?>
    <div class="icons-wrapp">
        <?php arrival_store_header_compare(); ?>
        <?php  arrival_store_header_wishlist(); ?>
        <?php arrival_store_header_cart_disp(); ?>
    </div>
    <?php 
    }
}



/**
* Add browse Product categories in header
*/
add_action('arrival_main_nav','arrival_store_browse_categories_nav_menu_items',5);
if ( ! function_exists( 'arrival_store_browse_categories_nav_menu_items' ) ) {
    function arrival_store_browse_categories_nav_menu_items() {
         
         if ( ! class_exists( 'WooCommerce' ) )
            return;

        $product_categories = get_terms( 'product_cat');
        $count              = count($product_categories);  

        ?>
        <div class="browse-category-wrap">
            <div class="browse-category" tabindex="0">
                <?php echo arrival_get_icon_svg('menu-bars'); ?>
                <span class="cat-btn-title">
                <?php esc_html_e('SHOP BY DEPARTMENT','arrival-store'); ?>
                </span>
                <?php echo arrival_get_icon_svg('arrow_down'); ?>
            </div>
            <div class="categorylist">
               <ul>
                <?php 

                foreach( $product_categories as $product_category   ) {
                        $cat_name   = $product_category->name;
                        $cat_id     = $product_category->term_id;
                        $cat_count  =  $product_category->count;
                        ?>
                        <li>
                            <a href="<?php echo get_term_link($cat_id);?>">
                                <?php echo arrival_get_icon_svg('chevron_right'); ?>
                                <?php echo esc_html($cat_name); ?> <span><?php echo absint($cat_count);?></span>
                            </a>
                        </li>
                <?php } ?>
               
                </ul>
            </div>
        </div>
<?php
    }
}

/**
* mobile navigation for the theme
*
*/
add_action('arrival_main_nav','arrival_store_mob_nav',20);
if( ! function_exists('arrival_store_mob_nav')){
    function arrival_store_mob_nav(){
        ?>
        <div class="mob-outer-wrapp">
            <span class="toggle-wrapp" tabindex="0">
                <?php esc_html_e('Mobile Menu','arrival-store');?>
                <?php echo arrival_get_icon_svg('menu-toogle'); ?>
            </span>

            <div class="mob-nav-wrapp">
                <button class="toggle close-wrapp toggle-wrapp">
                    <span class="text"><?php esc_html_e('Close Menu','arrival'); ?></span>
                    <span class="icon-wrapp"><?php echo arrival_get_icon_svg('cross',18); ?></span>
                </button>
                <nav arial-label="Mobile" role="navigation" tabindex="1">
                <?php 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'container'      => 'ul',
                            'show_toggles'   => true,
                            'menu_class'     => 'mob-primary-menu clear'
                        )
                    );
                ?>
            </nav>
            </div>

        </div>
        <?php 
    }
}

/**
* Body Class for the theme
* 
*/
add_filter( 'body_class', 'arrival_store_body_class' );
if(! function_exists('arrival_store_body_class')){
    function arrival_store_body_class(){
        $classes[] = 'arrival-store-main';
        
        return $classes;
    }
}

add_filter('arrival_header_main_grid_filter','__return_false');


/**
* Register additional menu for shop exras
*/
add_filter('arrival_nav_register','arrival_store_nav_last_menu');
if(! function_exists('arrival_store_nav_last_menu')){
    function arrival_store_nav_last_menu(){
        $nav_menus = array(
            'primary'   => esc_html__( 'Primary', 'arrival-store' ),
            'top'       => esc_html__( 'Top', 'arrival-store' ),
            'shop'      => esc_html__( 'Shop Additional Menus','arrival-store'),
        );

        return $nav_menus;
    }
}

add_action('arrival_custom_item_reserve','arrival_store_nav_last_extra');
if(! function_exists('arrival_store_nav_last_extra')){
    function arrival_store_nav_last_extra(){

    wp_nav_menu(
                array(
                    'theme_location'    => 'shop',
                    'menu_id'           => 'arrival-shop-extra',
                    'container'         => 'ul',
                    'menu_class'        => 'arrival-shop-extra-nav',
                    'fallback_cb'       => false,
                )
            );
    }

}

require get_stylesheet_directory() . '/customizer.php';
require get_stylesheet_directory() . '/dynamic-styles.php';


add_action('customize_preview_init','arrival_store_customizer_scripts');
if( ! function_exists('arrival_store_customizer_scripts')){
    function arrival_store_customizer_scripts(){

        wp_enqueue_script( 'arrival-store-customizer', get_theme_file_uri( '/assets/js/customizer-scripts.js' ), array( 'customize-preview' ), '20151215', true );


    }
}