<?php
//Custom Post Title
if(!function_exists('backyard_post_title')) : 
function backyard_post_title()
{
  if ( is_single() ) :
 ?>
     <?php the_title(); ?>
      <?php else: ?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; 
}

endif;

//Social Links

if(!function_exists('backyard_social_media_link')) :
function backyard_social_media_link() { 
  if(get_theme_mod('facebook_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('facebook_url')).'" target="_blank" class="fb"><i class="fa fa-facebook"></i></a>';
  }
  if(get_theme_mod('twitter_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('twitter_url')).'" target="_blank" class="tw"><i class="fa fa-twitter"></i></a>';
  }
  if(get_theme_mod('google_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('google_url')).'" target="_blank" class="google"><i class="fa fa-google-plus"></i></a>';
  }
  if(get_theme_mod('instagram_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('instagram_url')).'"  target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>';
  }
  if(get_theme_mod('youtube_channel_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('youtube_channel_link')).'" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>';
  }
  if(get_theme_mod('linkedin_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('linkedin_link')).'"   target="_blank" class="linkdin"><i class="fa fa-linkedin"></i></a>';
  }
  if(get_theme_mod('pinterest_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('pinterest_link')).'"  target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a>';
  }
}   
endif;
// get from session your URL variable and add it to item
add_filter('woocommerce_get_cart_item_from_session', 'backyard_cart_item_from_session', 99, 3);
function backyard_cart_item_from_session( $data, $values, $key ) {
    $data['url'] = isset( $values['url'] ) ? $values['url'] : '';
    return $data;
}

// this one does the same as woocommerce_update_cart_action() in plugins\woocommerce\woocommerce-functions.php
// but with your URL variable
// this might not be the best way but it works
add_action( 'init', 'backyard_update_cart_action', 9);
function backyard_update_cart_action() {
    global $woocommerce;
    if ( ( ! empty( $_POST['update_cart'] ) || ! empty( $_POST['proceed'] ) ) && $woocommerce->verify_nonce('cart')) {
        $cart_totals = isset( $_POST['cart'] ) ? sanitize_text_field(wp_unslash($_POST['cart'])) : '';
        if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
            foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
                if ( isset( $cart_totals[ $cart_item_key ]['url'] ) ) {
                    $woocommerce->cart->cart_contents[ $cart_item_key ]['url'] = $cart_totals[ $cart_item_key ]['url'];
                }
            }
        }
    }
}

// this is in Order summary. It show Url variable under product name. Same place where Variations are shown.
add_filter( 'woocommerce_get_item_data', 'backyard_item_data', 10, 2 );
function backyard_item_data( $data, $cart_item ) {
    if ( isset( $cart_item['url'] ) ) {
        $data['url'] = array('name' => 'Url', 'value' => $cart_item['url']);
    }
    return $data;
}

// this adds Url as meta in Order for item
add_action ('woocommerce_add_order_item_meta', 'backyard_add_item_meta', 10, 2);
function backyard_add_item_meta( $item_id, $values ) {
    woocommerce_add_order_item_meta( $item_id, 'Url', $values['url'] );
}
	function backyard_load_more_posts()
{
	$the_query = new WP_Query( array('posts_per_page' =>3,'paged'=>$_POST['paged'] ) );
		while($the_query->have_posts()) : $the_query->the_post();?>
		 <?php $classes = array('post','text-center','wow','fadeInUp'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
<div class="entry-header">
<h3 class="entry-title"><span class="center-block"><?php backyard_post_title(); ?></span></h3>
<div class="entry-meta font-italic textcolor"><span class="text-uppercase"><?php the_author_posts_link() ?></span> <?php esc_html_e('-','backyard'); ?> <?php echo get_the_date(get_option( 'date_format' )); ?>  <?php esc_html_e('-','backyard'); ?> <span>
<a href="#comments"><i class="fa fa-comment-o"></i><?php comments_number(__('No Comments','backyard'), __('One Comment','backyard'), '% Comments'); ?></a></span>
</span></div>
<!--entry-meta--> 
</div>
<!--entry-header-->
<div class="post-media">
<a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>">
<?php the_post_thumbnail('backyard-post-thumb', array('class'=>'img-responsive','alt' => get_the_title() )); ?></a> 
</div>
 <!--post-media-->
<div class="entry-content"> <?php if (is_single()) : else: ?><a href="<?php the_permalink(); ?>" class="btn fillbg"><?php esc_html_e('READ MORE','backyard'); ?></a><?php endif; ?>
<div class="the_tags"><?php the_tags(); ?></div>
<!--audio-row-->
<?php the_excerpt(); ?>
</div>
<!--entry-content-->
</article>
		<?php endwhile;
	die; // here we exit the script and even no wp_reset_query() required!
}
add_action( 'wp_ajax_backyard_load_more_posts', 'backyard_load_more_posts');
add_action( 'wp_ajax_nopriv_backyard_load_more_posts', 'backyard_load_more_posts');
//header layout
add_action('backyard_header_action', 'backyard_header_layout');
function backyard_header_layout() {?>
<?php 
$logolayout=get_theme_mod('logolayout');
if(isset($logolayout)&&$logolayout=='logolayout_first')
{
?>
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-left">
             <div class="main-logo">
             <div id="logo">
           <a href="<?php echo esc_url(home_url('/')); ?>">
           <?php if(has_custom_logo()): the_custom_logo();
           else: bloginfo( 'name' ); endif; ?>
           </a>
           </div></div><!--main-logo-->
           <!--logo--></div>
          <?php if(has_nav_menu('primary_navigation')) : ?>  
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-2 pull-right">
          <nav id="nav">
    <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'container'=> false, 'menu_class' => '','depth'=> 0)); ?>
          </nav>
          <!--main-nav--> 
        </div>
        <?php endif; 
}elseif(isset($logolayout)&&$logolayout=='logolayout_second')
{?>
	  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right">
             <div class="main-logo">
             <div id="logo">
           <a href="<?php echo esc_url(home_url('/')); ?>">
           <?php if(has_custom_logo()): the_custom_logo();
           else: bloginfo( 'name' ); endif; ?>
           </a>
           </div></div><!--main-logo-->
           <!--logo--></div>
          <?php if(has_nav_menu('primary_navigation')) : ?>  
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-2  nav-left">
          <nav id="nav">
    <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'container'=> false, 'menu_class' => '','depth'=> 0)); ?>
          </nav>
          <!--main-nav--> 
        </div>
        <?php endif; 
}
elseif(isset($logolayout)&&$logolayout=='logolayout_third')
{?>
	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-logo">
             <div class="main-logo">
             <div id="logo">
           <a href="<?php echo esc_url(home_url('/')); ?>">
           <?php if(has_custom_logo()): the_custom_logo();
           else: bloginfo( 'name' ); endif; ?>
           </a>
           </div></div><!--main-logo-->
           <!--logo--></div>
          <?php if(has_nav_menu('primary_navigation')) : ?>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-logo">
          <nav id="nav">
    <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'container'=> false, 'menu_class' => '','depth'=> 0)); ?>
          </nav>
          <!--main-nav--> 
        </div>
        <?php endif; 
}
else
{?>
	 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-left">
             <div class="main-logo">
             <div id="logo">
           <a href="<?php echo esc_url(home_url('/')); ?>">
           <?php if(has_custom_logo()): the_custom_logo();
           else: bloginfo( 'name' ); endif; ?>
           </a>
           </div></div><!--main-logo-->
           <!--logo--></div>
          <?php if(has_nav_menu('primary_navigation')) : ?>  
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-2 pull-right">
          <nav id="nav">
    <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'container'=> false, 'menu_class' => '','depth'=> 0)); ?>
          </nav>
          <!--main-nav--> 
        </div>
        <?php endif; 
}
}
//end
add_action('backyard_top_header_action', 'backyard_top_header_layout');
function backyard_top_header_layout()
{
	$topheaderlayout=get_theme_mod('topheaderlayout');
	$show_top_bar=get_theme_mod('show_top_bar');
	if(isset($show_top_bar)&&$show_top_bar==1){  ?>
    <section class="header-top">
      <section class="container">
        <div class="row">
        <?php if(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_a'){?>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left">
            <?php get_search_form(); ?>
          </div>
            <div class="top-social">
            <?php backyard_social_media_link(); ?>
            </div>
            <?php }elseif(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_b'){?>
            <div class="top-social pull-left">
            <?php backyard_social_media_link(); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
            <?php get_search_form(); ?>
          </div>
            <?php }elseif(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_c'){?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left">
            <?php get_search_form(); ?>
          </div>
            <?php }elseif(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_d'){?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
            <?php get_search_form(); ?>
          </div>
            <?php }elseif(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_e'){?>
            <div class="top-social pull-left">
            <?php backyard_social_media_link(); ?>
            </div>
            <?php }elseif(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_f'){?>
            <div class="top-social pull-right">
            <?php backyard_social_media_link(); ?>
            </div>
            <?php }elseif(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_g'){?>
           <div class="col-lg-12 col-md-12 col-sm-3 col-xs-12 topheaderlayout_center">
            <?php get_search_form(); ?>
          </div>
            <?php }elseif(isset($topheaderlayout)&&$topheaderlayout=='topheaderlayout_h'){?>
           <div class="top-social topheaderlayout_center">
            <?php backyard_social_media_link(); ?>
          </div>
            <?php }?>
            <!--top-social--> 
       </div>
     </section>
    </section>
    <!--top-header-->
     <?php }}?>
<?php 
function backyard_hook_css() {
	$heading_h1=get_theme_mod('heading_h1');
	$heading_h2=get_theme_mod('heading_h2');
	$heading_h3=get_theme_mod('heading_h3');
	$heading_h4=get_theme_mod('heading_h4');
	$heading_h5=get_theme_mod('heading_h5');
	$heading_h6=get_theme_mod('heading_h6');
        ?>
            <style>
			  <?php if(isset($heading_h1)&&$heading_h1!==''){?>
                h1 {font-size:<?php echo esc_attr($heading_h1);?>px !important;}
				<?php }?>
				 <?php if(isset($heading_h2)&&$heading_h2!==''){?>
                h2 {font-size:<?php echo esc_attr($heading_h2);?>px !important;}
				<?php }?>
				 <?php if(isset($heading_h3)&&$heading_h3!==''){?>
                h3 {font-size:<?php echo esc_attr($heading_h3);?>px !important;}
				<?php }?>
				 <?php if(isset($heading_h4)&&$heading_h4!==''){?>
                h4 {font-size:<?php echo esc_attr($heading_h4);?>px !important;}
				<?php }?>
				 <?php if(isset($heading_h5)&&$heading_h5!==''){?>
                h5 {font-size:<?php echo esc_attr($heading_h5);?>px !important;}
				<?php }?>
				 <?php if(isset($heading_h6)&&$heading_h6!==''){?>
                h5 {font-size:<?php echo esc_attr($heading_h6);?>px !important;}
				<?php }?>
            </style>
        <?php
    }
    add_action('wp_head', 'backyard_hook_css');
?>