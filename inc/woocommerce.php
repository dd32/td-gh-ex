<?php
/**
* Change WC hooks
*/

if (! function_exists('bestblog_get_sidebar')) {
    /**
    * Display storefront sidebar
    *
    * @uses get_sidebar()
    * @since 1.0.0
    */
    function bestblog_get_sidebar()
    {
        get_sidebar();
    }
}
/**
* Layout
*
* @see  bestblog_before_content()
* @see  bestblog_after_content()
* @see  woocommerce_breadcrumb()
* @see  bestblog_shop_messages()
*/

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);  /* Remove the sidebar */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
add_action('woocommerce_before_main_content', 'bestblog_before_content', 10);
add_action('woocommerce_after_main_content', 'bestblog_after_content', 10);

/* Remove Related Products and move it below product.*/
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 20);
// attach my open 'section' function to the before product summary action
add_action('woocommerce_before_single_product_summary', 'bestblog_content_wrapper_start', 20);
// attach my close 'section' function to the after product summary action
add_action('woocommerce_after_single_product_summary', 'bestblog_content_wrapper_end', 20);

/* Remove title on shop main */
add_filter('woocommerce_show_page_title', 'bestblog_woocommerce_hide_page_title');

/**
* Layout for each product content on the shop page
*
* @see bestblog_woocommerce_before_shop_loop_item()
* @see bestblog_woocommerce_after_shop_loop_item()
* @see bestblog_woocommerce_template_loop_product_title()
*/
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10); /* Remove the default thumbnail */
add_action('woocommerce_before_shop_loop_item_title', 'bestblog_woocommerce_template_loop_product_thumbnail', 10);

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10); /* Remove unused link */
add_action('woocommerce_before_shop_loop_item', 'bestblog_woocommerce_before_shop_loop_item', 10);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5); /* Remove unused link */
add_action('woocommerce_after_shop_loop_item', 'bestblog_woocommerce_after_shop_loop_item', 20);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart'); /* Remove default add to cart on single product */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10); /* Remove default product title on single product */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5); /* Remove default rating on single product */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10); /* Remove default price on single product */
add_action('woocommerce_shop_loop_item_title', 'bestblog_woocommerce_template_loop_product_title', 10);

if (is_active_sidebar('woocommerce-sidebar-bestblog')) {
    add_filter('loop_shop_columns', 'bestblog_loop_columns');
}
/**
* Custom add to cart button for WooCommerce.
*
* @since Best Blog 1.0
*/
function bestblog_template_loop_add_to_cart($args = array())
{
    global $product;

    if ($product) {
        $defaults = array(
                          'quantity' => 1,
                          'class'    => implode(' ', array_filter(array(
                          'button',
                          'product_type_' . $product->get_type(),
                          $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                          $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
                    ))),
                    );
        $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);
        wc_get_template('loop/add-to-cart.php', $args);
    }
}


/**
* Remove title on shop main
*
* @return bool
*/
function bestblog_woocommerce_hide_page_title()
{
    return false;
}
add_filter('woocommerce_breadcrumb_defaults', 'bestblog_woocommerce_breadcrumbs');
function bestblog_woocommerce_breadcrumbs()
{
    return array(
                'delimiter'   => '  ',
                'wrap_before' => ' <ul id="breadcrumbs" class="breadcrumbs woocommerce-breadcrumb" itemprop="breadcrumb">',
                'wrap_after'  => '</ul> ',
                'before'      => '<li class="item-home">',
                'after'       => '</li>',
                'home'        => _x('Home', 'breadcrumb', 'best-blog'),
              );
            }


if (! function_exists('bestblog_before_content')) {
    /**
    * Before Content
    * Wraps all WooCommerce content in wrappers which match the theme markup
    *
    * @since   1.0.0
    * @return  void
    */
    function bestblog_before_content()
    {?>
      <div id="sub_banner">
        <div class="top-bar">
          <div class="top-bar-left">
            <h1 class="is-size-2 text-uppercase text-center medium-text-left large-text-left"><?php woocommerce_page_title(); ?></h1>
          </div>
          <div class="top-bar-right float-center-small">
            <?php woocommerce_breadcrumb(); ?>
          </div>
        </div>
      </div>
      <div class="grid-container shop-warp padding-vertical-large-3 padding-vertical-small-2 ">
        <div class="grid-x grid-margin-x">
          <div class="cell large-auto small-24">
            <?php if (is_active_sidebar('woocommerce-sidebar-bestblog')): ?>
              <div class="columns-3">
              <?php endif; ?>
    <?php
    }
}

if (! function_exists('bestblog_after_content')) {
    /**
    * After Content
    * Closes the wrapping divs
    *
    * @since   1.0.0
    * @return  void
    */
    function bestblog_after_content()
    {
      ?>
      <?php if (is_active_sidebar('woocommerce-sidebar-bestblog')): ?>
        </div>
      <?php endif; ?>
    </div>
    <?php if (is_active_sidebar('woocommerce-sidebar-bestblog')  && ! is_product()): ?>
      <div class="cell small-24 medium-22 large-7">
        <div id="woocommerce-sidebar" class="sidebar-inner" >
          <div  class="grid-x grid-margin-x ">
            <?php dynamic_sidebar('woocommerce-sidebar-bestblog'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  </div>
<?php
    }
}


if (! function_exists('bestblog_content_wrapper_start')) {
    /**
    * Before single Content
    *
    * @since   1.0.0
    * @return  void
    */
    function bestblog_content_wrapper_start()
    {
        echo ' <div class="single-product-warp z-depth-1">';
    }
}

if (! function_exists('bestblog_content_wrapper_end')) {
    /**
    * After Content
    * Closes the wrapping divs
    *
    * @since   1.0.0
    * @return  void
    */
    function bestblog_content_wrapper_end()
    {
        echo "</div>";
    }
}

if (is_active_sidebar('woocommerce-sidebar-bestblog')) {
    if (! function_exists('bestblog_loop_columns')) {
        /**
        * Default loop columns on product archives
        *
        * @return integer products per row
        * @since  1.0.0
        */
        function bestblog_loop_columns()
        {
            return apply_filters('bestblog_loop_columns', 3); // 3 products per row
        }
    }
}

/**
* Change the layout before each single product listing
*/
function bestblog_woocommerce_before_shop_loop_item()
{
    echo '<div class="card card-cascade wider">';
}

/**
* Change the layout after each single product listing
*/
function bestblog_woocommerce_after_shop_loop_item()
{
    echo '</div>';
}

/**
* Change the layout of the thumbnail on single product listing
*/
function bestblog_woocommerce_template_loop_product_thumbnail()
{
    $thumbnail = get_the_post_thumbnail(null, 'bestblog-shop');
    if (empty($thumbnail) && function_exists('wc_placeholder_img')) {
        $thumbnail = wc_placeholder_img();
    }
    if (! empty($thumbnail)) {
        ?>
<div class="view">
<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
<?php echo wp_kses_post($thumbnail); ?>
</a>
</div>
<?php
    }
}

/**
* Change the main content for single product listing
*/
function bestblog_woocommerce_template_loop_product_title()
{
    global $post;
    $current_product = wc_get_product(get_the_ID()); ?>
    <div class="card-body no-padding text-center">
      <h4 class="card-title">
        <a class="shop-item-title-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html(the_title()); ?></a>
      </h4>
      <?php woocommerce_template_loop_rating(); ?>
      <?php if ($post->post_excerpt) : ?>
        <div class="card-text"><?php echo apply_filters('woocommerce_short_description', strip_tags($post->post_excerpt)); ?></div>
      <?php endif; ?>
      <div class="footer">
        <div class="card-footer">
          <?php
          $product_price = $current_product->get_price_html();
          if (! empty($product_price)) {
              echo '<span class="left price">';

              echo wp_kses(
          $product_price,
          array(
          'span' => array(
          'class' => array(),
          ),
          'del'  => array(),
          )
          );
              echo '</span>';
          }?>

          <span class="right">
            <?php bestblog_template_loop_add_to_cart(); ?>
          </span>
        </div>
      </div>
      <?php
    }
add_filter('woocommerce_short_description', 'bestblog_product_short_description', 10, 1);

function bestblog_product_short_description($post_excerpt)
{
    if (!is_product()) {
        $pieces = explode(" ", $post_excerpt);
        $post_excerpt = implode(" ", array_splice($pieces, 0, 14));
    }
    return $post_excerpt;
}
