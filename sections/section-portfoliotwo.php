<?php
/**
* Portfolio 
* @author    Denis Franchi
* @package   Atomy
*
*/
?> 

<section class="at_portfolio_2 <?php if ( false == get_theme_mod('atomy_enable_full_width_portfolio', true) ):?>container-fluid<?php endif;?> <?php if ( true == get_theme_mod('atomy_enable_full_width_portfolio', true) ):?><?php echo esc_html( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">  
<h2 class="<?php echo esc_attr(get_theme_mod('at_text_align_title_portfolio'));?> mb-2 col-md-12" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_title_portfolio_section','no-effect'));?>" data-aos-duration="500">
<?php echo esc_html(get_theme_mod( 'at_title_portfolio_section',__('Portfolio','atomy')));?>
</h2>
<div class="row mr-0 ml-0">
<!-- Nav Portfolio -->
    <ul id="filters" class="clearfix">
      <li><span class="filter active atall" data-filter=".one, .two, .three, .four, .five">
       <?php echo esc_html(get_theme_mod( 'at_title_portfolio2_all',__('All','atomy')));?>
      </span></li>
      <li><span class="filter attab1" data-filter=".one">
      <?php echo esc_html(get_theme_mod( 'at_title_portfolio2_tab_1',__('One','atomy')));?>
      </span></li>
      <li><span class="filter attab2" data-filter=".two">
      <?php echo esc_html(get_theme_mod( 'at_title_portfolio2_tab_2',__('Two','atomy')));?>
      </span></li>
      <?php if ( false ==  get_theme_mod( 'atomy_enable_tab_3_portfolio2', false ) ) : ?>
      <li class="at-nav-portfolio-responsive-3"><span class="filter attab3" data-filter=".three">
      <?php echo esc_html(get_theme_mod( 'at_title_portfolio2_tab_3',__('Three','atomy')));?>
      </span></li>
      <?php endif;?>
      <?php if ( false ==  get_theme_mod( 'atomy_enable_tab_4_portfolio2', false ) ) : ?>
      <li class="at-nav-portfolio-responsive-4"><span class="filter attab4" data-filter=".four">
      <?php echo esc_html(get_theme_mod( 'at_title_portfolio2_tab_4',__('Four','atomy')));?>
      </span></li>
      <?php endif;?>
      <?php if ( false ==  get_theme_mod( 'atomy_enable_tab_5_portfolio2', false ) ) : ?>
      <li class="at-nav-portfolio-responsive-5"><span class="filter attab5" data-filter=".five">
      <?php echo esc_html(get_theme_mod( 'at_title_portfolio2_tab_5',__('Five','atomy')));?>
      </span></li>
      <?php endif;?>
    </ul> 

<!-- Portfolio -->
<div id="portfoliolist">
<div class="row">
<!-- Portfolio Tab One -->
<?php
if ( false ==  get_theme_mod( 'atomy_enable_featured_product_1', true ) ) :
$atomy_tax_query_1 =array(
  array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',),);
endif;
	$atomy_portfolio2_tab_1_cat = esc_attr( get_theme_mod('atomy_category_portfolio2_tab_1'));
	$atomy_post_type_portfolio2_tab_1 = esc_attr( get_theme_mod('atomy_post_type_portfolio2_tab_1','post'));
	$atomy_product_portfolio2_tab_1 = esc_attr( get_theme_mod('at_product_cat_portfolio2_tab_1'));
	$atomy_portfolio2_tab_1_count = 0;
	$atomy_args = array(
	  'cat'         => $atomy_portfolio2_tab_1_cat ,
    'post_type'   => $atomy_post_type_portfolio2_tab_1,
    'product_cat' => $atomy_product_portfolio2_tab_1, 
    'showposts'   => $atomy_portfolio2_tab_1_count ,
    'tax_query'   => $atomy_tax_query_1 );
	$atomy_portfolio2_tab_1 = new WP_Query($atomy_args);
	if( $atomy_portfolio2_tab_1->have_posts() ) :
		while ( $atomy_portfolio2_tab_1->have_posts() ) : $atomy_portfolio2_tab_1->the_post();?>
      <div class="portfolio one <?php echo esc_attr( get_theme_mod('atomy_column_portfolio2','col-md-4'));?> col-xs-12" data-cat="one">
      <a href="<?php the_permalink();?>">
        <div class="portfolio-wrapper">
            <!-- Image -->
            <?php if (has_post_thumbnail()) : the_post_thumbnail('atomy_portfolio');else :?>
              <img src="<?php echo esc_url(get_template_directory_uri()).'/images/atomy-default.jpg'; ?>"/>
               <?php endif;?>
            <?php
                global $atomy_woocommerce;
                $atomy_currency = get_woocommerce_currency_symbol();
                $atomy_price = get_post_meta( get_the_ID(), '_regular_price', true);
                $atomy_sale = get_post_meta( get_the_ID(), '_sale_price', true);
              ?>
          <!-- Text -->
          <div class="label">
            <div class="label-text <?php if (false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> text-center <?php endif?>">
            <?php if($atomy_sale) : ?>
                <p class="at-product-price at-product-price-portfolio"><del><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></del><?php echo esc_html($atomy_currency); echo esc_html($atomy_sale); ?></p>    
                <?php elseif($atomy_price) : ?>
                <p class="at-product-price at-product-price-portfolio"><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></p>    
                <?php endif; ?>	
              <a <?php if ( false == get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> style="display:none" <?php endif?> href="<?php the_permalink();?>"class="text-title"><?php the_title_attribute (); ?></a>
            </div>
            <div class="label-bg"></div>
          </div>
        </div>
        </a>  
      </div>
      <?php endwhile;
             endif;
             wp_reset_postdata(); // End Query Portfolio Tab One ?>

      <!-- Portfolio Tab Two -->
<?php
if ( false == get_theme_mod( 'atomy_enable_featured_product_2', true ) ) :
  $atomy_tax_query_2 =array(
    array(
      'taxonomy' => 'product_visibility',
      'field'    => 'name',
      'terms'    => 'featured',),);
  endif;
	$atomy_portfolio2_tab_2_cat = esc_attr( get_theme_mod('atomy_category_portfolio2_tab_2'));
	$atomy_post_type_portfolio2_tab_2 = esc_attr( get_theme_mod('atomy_post_type_portfolio2_tab_2','post'));
	$atomy_product_portfolio2_tab_2 = esc_attr( get_theme_mod('at_product_cat_portfolio2_tab_2'));
	$atomy_portfolio2_tab_2_count = 0;
	$atomy_args = array(
	  'cat'        => $atomy_portfolio2_tab_2_cat ,
    'post_type'  => $atomy_post_type_portfolio2_tab_2,
    'product_cat'=> $atomy_product_portfolio2_tab_2, 
    'showposts'  => $atomy_portfolio2_tab_2_count,
    'tax_query'  => $atomy_tax_query_2 );
	$atomy_portfolio2_tab_2 = new WP_Query($atomy_args);
	if( $atomy_portfolio2_tab_2->have_posts() ) :
		while ( $atomy_portfolio2_tab_2->have_posts() ) : $atomy_portfolio2_tab_2->the_post();?>
      <div class="portfolio two <?php echo esc_attr( get_theme_mod('atomy_column_portfolio2','col-md-4'));?> col-xs-12" data-cat="two">
      <a href="<?php the_permalink();?>">
      <div class="portfolio-wrapper">
            <!-- Image -->
            <?php if (has_post_thumbnail()) : the_post_thumbnail('atomy_portfolio');else :?>
              <img src="<?php echo esc_url(get_template_directory_uri()).'/images/atomy-default.jpg'; ?>"/>
               <?php endif;?>
            <?php
                global $atomy_woocommerce;
                $atomy_currency = get_woocommerce_currency_symbol();
                $atomy_price = get_post_meta( get_the_ID(), '_regular_price', true);
                $atomy_sale = get_post_meta( get_the_ID(), '_sale_price', true);
              ?>
          <!-- Text -->
          <div class="label">
          <div class="label-text <?php if (false == get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> text-center <?php endif?>">
            <?php if($atomy_sale) : ?>
                <p class="at-product-price at-product-price-portfolio"><del><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></del><?php echo esc_html($atomy_currency); echo esc_html($atomy_sale); ?></p>    
                <?php elseif($atomy_price) : ?>
                <p class="at-product-price at-product-price-portfolio"><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></p>    
                <?php endif; ?>	
              <a <?php if ( false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> style="display:none" <?php endif?>  href="<?php the_permalink();?>"class="text-title"><?php the_title_attribute (); ?></a>
            </div>
            <div class="label-bg"></div>
          </div>
        </div> 
       </a> 
      </div>
      <?php endwhile;
             endif;
             wp_reset_postdata(); // End Query Portfolio Tab Two ?>

  <!-- Portfolio Tab Three -->
  <?php
  if ( false ==  get_theme_mod( 'atomy_enable_tab_3_portfolio2', false ) ) : 
  if ( false ==  get_theme_mod( 'atomy_enable_featured_product_3', true ) ) :
      $atomy_tax_query_3 =array(
        array(
          'taxonomy' => 'product_visibility',
          'field'    => 'name',
          'terms'    => 'featured',),);
      endif;
	$atomy_portfolio2_tab_3_cat = esc_attr( get_theme_mod('atomy_category_portfolio2_tab_3'));
	$atomy_post_type_portfolio2_tab_3 = esc_attr( get_theme_mod('atomy_post_type_portfolio2_tab_3','post'));
	$atomy_product_portfolio2_tab_3 = esc_attr( get_theme_mod('at_product_cat_portfolio2_tab_3'));
	$atomy_portfolio2_tab_3_count = 0;
	$atomy_args = array(
	  'cat' => $atomy_portfolio2_tab_3_cat ,
    'post_type'   => $atomy_post_type_portfolio2_tab_3,
    'product_cat' => $atomy_product_portfolio2_tab_3, 
    'showposts'   => $atomy_portfolio2_tab_3_count,
    'tax_query'   => $atomy_tax_query_3 );
	$atomy_portfolio2_tab_3 = new WP_Query($atomy_args);
	if( $atomy_portfolio2_tab_3->have_posts() ) :
		while ( $atomy_portfolio2_tab_3->have_posts() ) : $atomy_portfolio2_tab_3->the_post();?>
      <div class="portfolio three <?php echo esc_attr( get_theme_mod('atomy_column_portfolio2','col-md-4'));?> col-xs-12" data-cat="three">
      <a href="<?php the_permalink();?>">
      <div class="portfolio-wrapper">
            <!-- Image -->
            <?php if (has_post_thumbnail()) : the_post_thumbnail('atomy_portfolio');else :?>
              <img src="<?php echo esc_url(get_template_directory_uri()).'/images/atomy-default.jpg'; ?>"/>
               <?php endif;?>
            <?php
                global $atomy_woocommerce;
                $atomy_currency = get_woocommerce_currency_symbol();
                $atomy_price = get_post_meta( get_the_ID(), '_regular_price', true);
                $atomy_sale = get_post_meta( get_the_ID(), '_sale_price', true);
              ?>
          <!-- Text -->
          <div class="label">
          <div class="label-text <?php if (false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> text-center <?php endif?>">
            <?php if($atomy_sale) : ?>
                <p class="at-product-price at-product-price-portfolio"><del><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></del><?php echo esc_html($atomy_currency); echo esc_html($atomy_sale); ?></p>    
                <?php elseif($atomy_price) : ?>
                <p class="at-product-price at-product-price-portfolio"><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></p>    
                <?php endif; ?>	
              <a <?php if ( false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> style="display:none" <?php endif?> href="<?php the_permalink();?>"class="text-title"><?php the_title_attribute (); ?></a>
            </div>
            <div class="label-bg"></div>
          </div>
        </div>  
       </a>
      </div>
      <?php endwhile;
             endif;
             wp_reset_postdata(); // End Query Portfolio Tab Three 
      endif; ?>

      <!-- Portfolio Tab Four -->
  <?php if ( false ==  get_theme_mod( 'atomy_enable_tab_4_portfolio2', false ) ) : 
  if ( false ==  get_theme_mod( 'atomy_enable_featured_product_4', true ) ) :
    $atomy_tax_query_4 =array(
      array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',),);
    endif;
	$atomy_portfolio2_tab_4_cat = esc_attr( get_theme_mod('atomy_category_portfolio2_tab_4'));
	$atomy_post_type_portfolio2_tab_4 = esc_attr( get_theme_mod('atomy_post_type_portfolio2_tab_4','post'));
	$atomy_product_portfolio2_tab_4 = esc_attr( get_theme_mod('at_product_cat_portfolio2_tab_4'));
	$atomy_portfolio2_tab_4_count = 0;
	$atomy_args = array(
	  'cat'         => $atomy_portfolio2_tab_4_cat ,
    'post_type'   => $atomy_post_type_portfolio2_tab_4,
    'product_cat' => $atomy_product_portfolio2_tab_4, 
    'showposts'   => $atomy_portfolio2_tab_4_count,
    'tax_query'   => $atomy_tax_query_4 );
	$atomy_portfolio2_tab_4 = new WP_Query($atomy_args);
	if( $atomy_portfolio2_tab_4->have_posts() ) :
		while ( $atomy_portfolio2_tab_4->have_posts() ) : $atomy_portfolio2_tab_4->the_post();?>
      <div class="portfolio four <?php echo esc_attr( get_theme_mod('atomy_column_portfolio2','col-md-4'));?> col-xs-12" data-cat="four">
      <a href="<?php the_permalink();?>">
      <div class="portfolio-wrapper">
            <!-- Image -->
            <?php if (has_post_thumbnail()) : the_post_thumbnail('atomy_portfolio');else :?>
              <img src="<?php echo esc_url(get_template_directory_uri()).'/images/atomy-default.jpg'; ?>"/>
               <?php endif;?>
            <?php
                global $atomy_woocommerce;
                $atomy_currency = get_woocommerce_currency_symbol();
                $atomy_price = get_post_meta( get_the_ID(), '_regular_price', true);
                $atomy_sale = get_post_meta( get_the_ID(), '_sale_price', true);
              ?>
          <!-- Text -->
          <div class="label">
          <div class="label-text <?php if (false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> text-center <?php endif?>">
            <?php if($atomy_sale) : ?>
                <p class="at-product-price at-product-price-portfolio"><del><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></del><?php echo esc_html($atomy_currency); echo esc_html($atomy_sale); ?></p>    
                <?php elseif($atomy_price) : ?>
                <p class="at-product-price at-product-price-portfolio"><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></p>    
                <?php endif; ?>	
              <a <?php if ( false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> style="display:none" <?php endif?> href="<?php the_permalink();?>"class="text-title"><?php the_title_attribute (); ?></a>
            </div>
            <div class="label-bg"></div>
          </div>
        </div> 
       </a> 
      </div>
      <?php endwhile;
             endif;
             wp_reset_postdata(); // End Query Portfolio Tab Four 
      endif; ?>

      <!-- Portfolio Tab Five -->
  <?php if ( false ==  get_theme_mod( 'atomy_enable_tab_5_portfolio2', false ) ) : 
  if ( false ==  get_theme_mod( 'atomy_enable_featured_product_5', true ) ) :
    $atomy_tax_query_5 =array(
      array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',),);
    endif;
	$atomy_portfolio2_tab_5_cat = esc_attr( get_theme_mod('atomy_category_portfolio2_tab_5'));
	$atomy_post_type_portfolio2_tab_5 = esc_attr( get_theme_mod('atomy_post_type_portfolio2_tab_5','post'));
	$atomy_product_portfolio2_tab_5 = esc_attr( get_theme_mod('at_product_cat_portfolio2_tab_5'));
	$atomy_portfolio2_tab_5_count = 0;
	$atomy_args = array(
	  'cat'         => $atomy_portfolio2_tab_5_cat ,
    'post_type'   => $atomy_post_type_portfolio2_tab_5,
    'product_cat' => $atomy_product_portfolio2_tab_5, 
    'showposts'   => $atomy_portfolio2_tab_5_count,
    'tax_query'   => $atomy_tax_query_5 );
	$atomy_portfolio2_tab_5 = new WP_Query($atomy_args);
	if( $atomy_portfolio2_tab_5->have_posts() ) :
		while ( $atomy_portfolio2_tab_5->have_posts() ) : $atomy_portfolio2_tab_5->the_post();?>
      <div class="portfolio five <?php echo esc_attr( get_theme_mod('atomy_column_portfolio2','col-md-4'));?> col-xs-12" data-cat="five">
      <a href="<?php the_permalink();?>">
      <div class="portfolio-wrapper">
            <!-- Image -->
            <?php if (has_post_thumbnail()) : the_post_thumbnail('atomy_portfolio');else :?>
              <img src="<?php echo esc_url(get_template_directory_uri()).'/images/atomy-default.jpg'; ?>"/>
               <?php endif;?>
            <?php
                global $atomy_woocommerce;
                $atomy_currency = get_woocommerce_currency_symbol();
                $atomy_price = get_post_meta( get_the_ID(), '_regular_price', true);
                $atomy_sale = get_post_meta( get_the_ID(), '_sale_price', true);
              ?>
          <!-- Text -->
          <div class="label">
          <div class="label-text <?php if (false ==  get_theme_mod( 'atomy_enable_only_price_portfolio', true ) ) :?> text-center <?php endif?>">
            <?php if($atomy_sale) : ?>
                <p class="at-product-price at-product-price-portfolio"><del><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></del><?php echo esc_html($atomy_currency); echo esc_html($atomy_sale); ?></p>    
                <?php elseif($atomy_price) : ?>
                <p class="at-product-price at-product-price-portfolio"><?php echo esc_html($atomy_currency); echo esc_html($atomy_price); ?></p>    
                <?php endif; ?>	
              <a <?php if ( false == esc_attr( get_theme_mod( 'atomy_enable_only_price_portfolio', true ) )) :?> style="display:none" <?php endif?> href="<?php the_permalink();?>"class="text-title"><?php the_title_attribute (); ?></a>
            </div>
            <div class="label-bg"></div>
          </div>
        </div>  
       </a>
      </div>
      <?php endwhile;
             endif;
             wp_reset_postdata(); // End Query Portfolio Tab Five 
      endif; ?>
</div>
</div>
</div>
</section>
<?php wp_enqueue_script('at-portfolio-js', get_template_directory_uri() . '/js/at-portfolio.js', array(), 'v1.0.5', true );?>


