<?php
/**
 * Template part for displaying Featured Big posts content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */
?>
<?php 
 
$bfastmag_featured_big_disable = (bool) get_theme_mod( 'bfastmag_featured_big_disable', false );
  

   $bfast_shop_ba = get_theme_mod('bfastmag_shop_fw_slider');
  $bfast_shop_ba_ar = json_decode($bfast_shop_ba,true);

  ?>
 
 <div class="bfastmag-content-ban_wrap "> 

 <div class="bfastmag-content-fws col-md-12"> 
 <div class="row"> 
 
  <?php
 
    echo '<a href="'.esc_url($bfast_shop_ba_ar[0]['link']).'"><img src="'.esc_url($bfast_shop_ba_ar[0]['image_url']).'" title="" alt=""></a>';
    echo '<div class="bfast-caption">';
        echo '<h2>'.esc_html($bfast_shop_ba_ar[0]['title']).'</h2>';
        echo '<p>'.esc_html($bfast_shop_ba_ar[0]['description']).'</p>';
        echo '<a href="'.esc_url($bfast_shop_ba_ar[0]['link']).'" class="button">'.esc_html($bfast_shop_ba_ar[0]['button']).'</a>';
    echo "</div>";

   ?>
</div>
 
 </div>
</div>
 