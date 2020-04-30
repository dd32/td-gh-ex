<?php
/**
* at-custom-style.php
* @author    Franchi Design
* @package   Atomy
*/


get_template_part('classcolorskin/color',esc_attr(get_theme_mod('at_color_skin','four')));?>
<style>

/* Font Family Title */

.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6,.entry-header a{
    font-weight:<?php echo esc_attr(get_theme_mod('at_font_weight_title',400));?>!important;
    text-transform:<?php echo esc_attr(get_theme_mod('at_text_transform_title','none'));?>;
    font-style:<?php echo esc_attr(get_theme_mod('at_font_style_title','normal'));?>;
    letter-spacing:<?php echo esc_attr(get_theme_mod('at_letter_spacing_title',0));?>px;
    word-spacing:<?php echo esc_attr(get_theme_mod('at_word_spacing_title',0));?>px;
}
</style>
 
<?php if ( false ==  get_theme_mod( 'atomy_enable_custom_font_heading', true )) : ?>
<style>
.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6,.entry-header a{
   font-family:'<?php echo esc_attr( get_theme_mod('at_custom_font_heading')) ?>'<?php echo esc_attr( get_theme_mod('at_custom_font_family_heading')) ?>;
}
</style>
<?php endif;?>
<?php if ( true==  get_theme_mod( 'atomy_enable_custom_font_heading', true) ) : ?>
<style>
.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6,.entry-header a{
    font-family:'<?php echo esc_attr(get_theme_mod('atomy_title_font','Montserrat')); ?>';
}
</style>
<?php endif;?>

<style>

/* Font Family Subtitle */ 

p,.entry-meta{
        font-weight:<?php echo esc_attr(get_theme_mod('at_font_weight_title_meta',200));?>;
        text-transform:<?php echo esc_attr(get_theme_mod('at_text_transform_title_meta','none'));?>;
        font-style:<?php echo esc_attr(get_theme_mod('at_font_style_title_meta','normal'));?>;
        letter-spacing:<?php echo esc_attr(get_theme_mod('at_letter_spacing_title_meta',0));?>px;
        word-spacing:<?php echo esc_attr(get_theme_mod('at_word_spacing_title_meta',0));?>px; 
}

</style>
<?php if ( false ==  get_theme_mod( 'atomy_enable_custom_font_primary', true ) ) : ?>
<style>
p,.entry-meta{
   font-family:'<?php echo esc_attr( get_theme_mod('at_custom_font_primary')) ?>'<?php echo esc_attr( get_theme_mod('at_custom_font_family_primary')) ?>;
}
</style>
<?php endif;?>
<?php if ( true ==  get_theme_mod( 'atomy_enable_custom_font_primary', true ) ) : ?>
<style>
p,.entry-meta{
    font-family:'<?php echo esc_attr(get_theme_mod('atomy_title_font_meta','Montserrat')); ?>';
}
</style>
<?php endif;?>


<style>

/* Font Family Link */

a{
    font-style:<?php echo esc_attr(get_theme_mod('at_font_style_title_meta_a','normal'));?>;
}

a{
    text-decoration:<?php echo esc_attr(get_theme_mod('at_text_underline_title','none'));?>;
}
a:hover{
    text-decoration:<?php echo esc_attr(get_theme_mod('at_text_underline_title','none'));?>;
}

</style>   

<?php if ( false ==  get_theme_mod( 'at_text_underline_title_hover', true) ):?>
<style>
a:hover{
    text-decoration:underline!important;
}
</style>
<?php endif; ?>

<?php if ( false == get_theme_mod('atomy_enable_custom_font_link', true ) ) : ?>
<style>
a,.at_portfolio_2 span{
   font-family:'<?php echo esc_attr( get_theme_mod('at_custom_font_link')) ?>'<?php echo esc_attr( get_theme_mod('at_custom_font_family_link')) ?>;
}
</style>
<?php endif;?>
<?php if ( true == get_theme_mod('atomy_enable_custom_font_link', true ) ) : ?>
<style>
a,.at_portfolio_2 span{
    font-family:'<?php echo esc_attr(get_theme_mod('atomy_title_font_meta_a','Montserrat')); ?>';
}
</style>
<?php endif;?>

<!-- Form search product -->

<style>
.top_header_left .input-group {
	padding-top: 16px;
}
.top_header_left .input-group .input-group-btn .btn-secondary{
    padding-top:28px;
}
</style>

<!-- Enable back to top in device -->

<?php if ( true ==  get_theme_mod( 'atomy_enable_back_to_top_device', true) ):?>
<style>
@media (max-width: 799px){
.btn-back-to-top{
    display:none!important;
}
}
</style>
<?php endif; ?>	

<!-- Logo size -->

<style>
.top_header_middle img {
    max-width:<?php echo esc_attr(get_theme_mod('atomy_logo_size',350));?>px;
}

/* Block Icons */

.atom-header-ecommerce{
    padding:<?php echo esc_attr(get_theme_mod('at_padding_block_icons',2));?>em;
   
}
 
.atom-header-ecommerce {
    border:<?php echo esc_attr(get_theme_mod('at_border_block_icons',1));?>px solid;
}

.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button.alt,button.button,button.button.post-readmore.at-gen-act,button.single_add_to_cart_button.button.alt,a.checkout-button.button.alt.wc-forward,input.button.post-readmore.at-gen-act,button.button.post-readmore{
    border-radius:0px!important;
    overflow: hidden;
}

/* Category Shop */

.at-content-woocommerce-page-single-product h1{
  font-size:<?php echo esc_attr(get_theme_mod('at_font_size_title_category_shop',18));?>px;
}

</style>
                                            
<?php if ( false ==  get_theme_mod( 'atomy_enable_effect_image_category', true) ) : ?>
<style>

    
.woocommerce ul.products li.product a img:hover{                        
		box-shadow: <?php echo esc_attr(get_theme_mod('at_box_shadow_1_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_2_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_3_effect_image_category',11));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_4_effect_image_category',0));?>px  <?php echo esc_attr(get_theme_mod('at_background_color_effect_image_category','rgba(33,33,33,.2)'));?>; 
        -webkit-box-shadow:<?php echo esc_attr(get_theme_mod('at_box_shadow_1_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_2_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_3_effect_image_category',11));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_4_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_background_color_effect_image_category','rgba(33,33,33,.2)'));?>; 
        -moz-box-shadow:<?php echo esc_attr(get_theme_mod('at_box_shadow_1_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_2_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_3_effect_image_category',11));?>px <?php echo esc_attr(get_theme_mod('at_box_shadow_4_effect_image_category',0));?>px <?php echo esc_attr(get_theme_mod('at_background_color_effect_image_category','rgba(33,33,33,.2)'));?>; 
        -webkit-transition:  0.3s ease-in;
		-moz-transition:  0.3s ease-in;
        transition:  0.3s ease-in ;
        padding:<?php echo esc_attr(get_theme_mod('at_padding_effect_image_category',10));?>px;
}

.shop_cat_desc{ 
        text-align:<?php echo esc_attr(get_theme_mod('atomy_align_description_category_shop','left'));?>;
        padding-left:<?php echo esc_attr(get_theme_mod('at_padding_left_description_catyegory_shop',5));?>px;
    
 }
</style>

<?php endif; ?>

<!-- Woocommerce Category -->

<style>

h2.woocommerce-loop-category__title{
font-size:<?php echo esc_attr(get_theme_mod('at_font_size_title_single_category_shop',16));?>px!important;
}

/* Header Media */

.wp-custom-header img{
    height:<?php echo esc_attr(get_theme_mod('at_height_media_header',600));?>px;
}

.wp-custom-header iframe{
    height:<?php echo esc_attr(get_theme_mod('at_height_media_header',600));?>px;
}

.wp-custom-header img{
object-fit:<?php echo esc_attr(get_theme_mod('at_object_media_header','unset'));?>;
}

/* Write Auto */

.at-write-auto{
    top:<?php echo esc_attr(get_theme_mod('at_padding_top_write',26));?>em;
    left:<?php echo esc_attr(get_theme_mod('at_padding_left_write',20));?>em;
}

.at-write-auto h1{
    font-size:<?php echo esc_attr(get_theme_mod('at_font_size_text',22));?>px;
}

.at-button-action-static{
    top:<?php echo esc_attr(get_theme_mod('at_padding_top_call_to_action',30));?>em;
}

/* Responsive */

@media (max-width: 360px){
  .at-button-action-static{
     top:<?php echo esc_attr(get_theme_mod('at_padding_top_call_to_action_media',30));?>em;
}
}

</style>
<?php
/* Shop Image Featured Page */
 if ( true ==  get_theme_mod( 'atomy_enable_auto_cart_image', false ) ) : ?>
 <style>
.woocommerce-page img.at-img-single{
    height:auto;
}

</style>
<?php endif;?>
<style>

/* Shop Image Featured Page */
.woocommerce-page img.at-img-single {
    height:<?php echo esc_attr(get_theme_mod('at_height_image_cart',500));?>px;
    object-fit:<?php echo esc_attr(get_theme_mod('at_object_cart_image','none'));?>;
}
</style>
<?php
/* Single Product */
if (false == get_theme_mod('atomy_enable_auto_image_single', true)) : ?>
<style>
.woocommerce .woocommerce-product-gallery__image img.wp-post-image,.woocommerce .yith_magnifier_zoom_wrap img{
    height:<?php echo esc_attr(get_theme_mod('at_height_image_single_product',450));?>px!important;
    object-fit:<?php echo esc_attr(get_theme_mod('at_object_image_single_product','none'));?>;
}
</style>
<?php endif;?>
<style>
/* Single Product Title */
.summary.entry-summary{
    margin-top:<?php echo esc_attr(get_theme_mod('at_padding_top_title_single_product',2));?>em;
}

/* Border left custom area */
.woocommerce-account .woocommerce-MyAccount-navigation{
    border-left: <?php echo esc_attr(get_theme_mod('at_border_left_custom_area',2));?>px solid;
}

/* Ul List */
.woocommerce-account .woocommerce-MyAccount-navigation ul{
    list-style:<?php echo esc_attr(get_theme_mod('at_ul_list_style_custom_area','disc'));?>;
}

/* Blog single */
.entry-header{
    padding-top:<?php echo esc_attr(get_theme_mod('at_blog_single_padding_header',20));?>px;
}

/* Portfolio 2 */

#filters{
    margin-left:<?php echo esc_attr(get_theme_mod('at_margin_left_nav_portfolio2',0));?>em;
}

#portfoliolist .portfolio{
    padding-bottom:<?php echo esc_attr(get_theme_mod('at_padding_bottom_image_portfolio2',10));?>px;
}

.at-img-portfolio2 img {
    height:<?php echo esc_attr(get_theme_mod('at_height_portfolio2_image',500));?><?php if ( false == esc_attr( get_theme_mod( 'atomy_height_auto_portfolio2_image', true ) )) : ?>px<?php endif; ?>;
    object-fit:<?php echo esc_attr(get_theme_mod('at_object_portfolio2_image','cover'));?>;
}

/* Contact */

.atomy-sidebar-contact{
    border-top: <?php echo esc_attr(get_theme_mod('at_border_top_sidebar_contact',3));?>px solid <?php echo esc_attr(get_theme_mod('at_border_top_color_sidebar_contact','#ccc'));?>;
    border-right: <?php echo esc_attr(get_theme_mod('at_border_right_sidebar_contact',3));?>px solid <?php echo esc_attr(get_theme_mod('at_border_right_color_sidebar_contact','#ccc'));?>;
}


/* Parallax Section*/

.at-box-parallax{
    height:<?php echo esc_attr(get_theme_mod('at_height_parallax_image',518));?>px;
} 

.at-text-parallax{
    top:<?php echo esc_attr(get_theme_mod('at_padding_top_parallax_text',3));?>em;
}
    

.at-text-parallax h1{
        font-size:<?php echo esc_attr(get_theme_mod('at_font_size_parallax_text',42));?>px;
}
.at-second-img-parallax{
	background-image: url("<?php echo esc_url( get_theme_mod( 'at_upload_secondary_img_parallax' ) ); ?>");
	height:<?php echo esc_attr(get_theme_mod('at_height_parallax_image_secondary',300));?>px;
	max-width: <?php echo esc_attr(get_theme_mod('at_width_parallax_image_secondary',300));?>px;
	left:<?php echo esc_attr(get_theme_mod('at_padding_left_parallax_image',34));?>%;
    top: <?php echo esc_attr(get_theme_mod('at_padding_top_parallax_image',1));?>em;
    border-radius:<?php echo esc_attr(get_theme_mod('at_border_radius_parallax_image',0));?>%;
}

.at-box-parallax{
    background-image: url("<?php echo esc_url( get_theme_mod( 'at_upload_primary_img_parallax' ) ); ?>");
}

</style>

<!-- Sidebar Blog -->
<?php if ( true ==  get_theme_mod( 'at_enable_sidebar_media', false) ):?>

<style>

@media (max-width: 790px){
   .at-sidebar{
      display:none;
   }
}

</style>

<?php endif;?>

<!--  Woocommerce product -->
<?php if ( true == get_theme_mod( 'at_enable_add_basket', false) ):?>
<style>
.add-to-cart a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart{
 display:none;
}
</style>
<?php endif;?>
<?php if ( true ==  get_theme_mod( 'at_enable_preview', false) ):?>
<style>
.add-to-cart a.button.yith-wcqv-button{
 display:none;
}
</style>
<?php endif;?>


<?php if ( true == get_theme_mod('atomy_enable_full_width_static', false) ):?>
<style>
/* Button play video header image */
.wp-custom-header-video-button{
	margin-left: 1.5em;
}
</style>
<?php endif;?>

<style>

/* Section Two Image Extra */

.at-two-image-extra{
	margin-top: <?php echo esc_attr(get_theme_mod('at_margin_top_section_twoimage',12))?>em;
	margin-bottom: <?php echo esc_attr(get_theme_mod('at_margin_bottom_section_twoimage',12))?>em;
	padding-top: <?php echo esc_attr(get_theme_mod('at_padding_top_section_twoimage',10))?>em;
	padding-bottom: <?php echo esc_attr(get_theme_mod('at_padding_bottom_section_twoimage',10))?>em;
    background-color: <?php echo esc_attr(get_theme_mod('at_background_color_section_twoimage','#fff'))?>;
}

.at-two-image-left img{
	margin-left: <?php echo esc_attr(get_theme_mod('at_margin_left_img_left',-5))?>em;
    margin-top:  <?php echo esc_attr(get_theme_mod('at_margin_top_img_left',6))?>em;
    transform: rotate(<?php echo esc_attr(get_theme_mod('at_rotate_img_left',-15))?>deg);
}

.at-two-image-right img{
	right: <?php echo esc_attr(get_theme_mod('at_margin_right_img_right',0))?>em;
    margin-top: <?php echo esc_attr(get_theme_mod('at_margin_top_img_right',-6))?>em;
    transform: rotate(<?php echo esc_attr(get_theme_mod('at_rotate_img_right',15))?>deg);
}

.at-text h2{
    font-size: <?php echo esc_attr(get_theme_mod('at_font_size_title_effect_2_card_1',24))?>px;
    color: <?php echo esc_attr(get_theme_mod('at_color_title_effect_2_card_1','#fff'))?>;
}

.at-text{
    background-color:<?php echo esc_attr(get_theme_mod('at_background_color_title_effect_2_card_1','#f40101'))?>;
    border-radius:<?php echo esc_attr(get_theme_mod('at_border_title_effect_2_card_1',0))?>px;
}

.imgcover:hover .image{
    opacity: 0.<?php echo esc_attr(get_theme_mod('at_opacity_effect_2_card_1',5))?>;
}
.imgcover:hover{
    background-color:<?php echo esc_attr(get_theme_mod('at_background_color_effect_2_card_1','#fff'))?>;
}

/* Badge Promo Carousel */

.badge-promo-widget-footer img{
    width: <?php echo esc_attr(get_theme_mod('at_width_badge_promo',24))?>%;
    left: <?php echo esc_attr(get_theme_mod('at_left_badge_promo',2))?>em;
    top: <?php echo esc_attr(get_theme_mod('at_top_badge_promo',20))?>em;
}

/* Title Align Section */

/* Category/Product */

h2.at_contr_title_category_shop{
    text-align:<?php echo esc_attr(get_theme_mod('at_text_align_title_category','left'))?>;
}

/* Slide Section */

.at-col-slide:before{
    background:<?php echo esc_attr(get_theme_mod('at_background_color_first_banner_slide','#F8F8F8'))?>;
}

.at-banner-slide{
    background-color:<?php echo esc_attr(get_theme_mod('at_background_color_second_banner_slide','#82B541'))?>;
}

.at-banner-slide h2,.at-banner-slide h5,a.at-banner-slide:hover,.at-banner-slide{
    color:<?php echo esc_attr(get_theme_mod('at_color_banner_slide','#fff'))?>!important;
}

.title-img-slide h2{
    color:<?php echo esc_attr(get_theme_mod('at_color_carousel_slide','#a09f9f'))?>!important;
}

.at-slide{
    margin-top:<?php echo esc_attr(get_theme_mod('at_margin_top_slide',0))?>em;
    margin-bottom:<?php echo esc_attr(get_theme_mod('at_margin_bottom_slide',0))?>em;
}

/* Product/Categories Section */

.at-content-woocommerce-page-single-product{
    margin-top:<?php echo esc_attr(get_theme_mod('at_margin_top_category_product',0))?>em;
    margin-bottom:<?php echo esc_attr(get_theme_mod('at_margin_bottom_category_product',0))?>em;
}

/* Block Icons Section */

.at-block-icon-header-s{
    margin-top:<?php echo esc_attr(get_theme_mod('at_margin_top_block_icons',7.5))?>em;
    margin-bottom:<?php echo esc_attr(get_theme_mod('at_margin_bottom_block_icons',0))?>em;
}

/* Portfolio Section */

.at_portfolio_2{
    margin-top:<?php echo esc_attr(get_theme_mod('at_margin_top_portfolio',6))?>em;
    margin-bottom:<?php echo esc_attr(get_theme_mod('at_margin_bottom_portfolio',-1.8))?>em;
}

/* Services Section */

.at-services-margin{
    margin-top:<?php echo esc_attr(get_theme_mod('at_margin_top_services',3.5))?>em;
    margin-bottom:<?php echo esc_attr(get_theme_mod('at_margin_bottom_services',-3))?>em;
}

/* Who We Are Section */

.at-text-image-about{
    margin-top:<?php echo esc_attr(get_theme_mod('at_margin_top_whoweare',6.3))?>em;
    margin-bottom:<?php echo esc_attr(get_theme_mod('at_margin_bottom_whoweare',6))?>em;
}

/* Background Color Product */

figure.snip1418{
    background-color:<?php echo esc_attr(get_theme_mod('at_background_color_product','#fff'))?>;
}

/* Background Color Sale Badge */

.woocommerce span.onsale{
    background-color:<?php echo esc_attr(get_theme_mod('at_background_color_sale_product','#77a464'))?>!important;
    color:<?php echo esc_attr(get_theme_mod('at_color_sale_product','#fff'))?>!important;
}

/* Paddign site */

#page{
    margin-top:<?php echo esc_attr(get_theme_mod('at_margin_top_site',0))?>em;
}

/* Background Color Menu */

.shop_header_area{
    background-color:<?php echo esc_attr(get_theme_mod('at_background_color_menu','#fff'))?>;
}

/* Price Portfolio */

<?php if (true ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?>

.at-product-price.at-product-price-portfolio{
    position: absolute;
}

<?php endif?>

<?php if (false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?>

.at-product-price.at-product-price-portfolio{
    position: relative;
    line-height:15%!important;
}
<?php endif?>
/* Sidebar Blog */
#secondary{
	background-color:<?php echo esc_attr(get_theme_mod('at_background_color_sidebar_blog','#fff'))?>!important;
}

#secondary h2{
	color:<?php echo esc_attr(get_theme_mod('at_color_sidebar_blog','#2b2b2b'))?>!important;
}

#secondary a{
	color:<?php echo esc_attr(get_theme_mod('at_color_sidebar_blog_a','#5d6d7a'))?>!important ;
}

#secondary a:hover{
    color:<?php echo esc_attr(get_theme_mod('at_color_sidebar_blog_a_hover','#ccc'))?>!important ;
}


/* Menu */

.shop_header_area .navbar .navbar-nav li a{
    font-size:<?php echo esc_attr(get_theme_mod('at_font_size_menu',12))?>px; 
}

.shop_header_area .navbar .navbar-nav li {
  margin-right: <?php echo esc_attr(get_theme_mod('at_padding_menu',14))?>px; 
}

</style>





   